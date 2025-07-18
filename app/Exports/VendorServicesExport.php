<?php

namespace App\Exports;

use App\Enums\AppointmentDays;
use Carbon\Carbon;
use App\Models\Service;
use App\Enums\ServiceStatus;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Events\AfterSheet;
// use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

class VendorServicesExport implements FromQuery, WithHeadings , WithMapping, WithColumnFormatting,WithColumnWidths,WithEvents
{
    use Exportable;

    private $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function query()
    {
        // dd($this->request->all());
        $search =  $this->request->has('search') ? $this->request->search : null;
         return Service::query()->where('vendor_id' , auth()->user()->vendor_id)->when(
            $search,
            fn($q) => $q->where(
                fn($subQ) => $subQ->where('name->ar', 'like', "%$search%")
                    ->orWhere('name->en', 'like', "%$search%")
            )

        )->when($this->request->has('type') && $this->request->filled('type') && $this->request->type == 'temp',
            fn($q) => $q->has('temp')
        )->when(
            $this->request->has('type') && $this->request->type == 'pending',
            fn($q) => $q->where('status',ServiceStatus::PENDING)
        )->when(
            $this->request->has('is_active') && $this->request->is_active != 'all',
            fn($q) => $q->where('is_active',$this->request->is_active)
        )
        // ->when(
        //     $this->request->has('status') && $this->request->status != 'all',
        //     fn($q) => $q->where('is_active', $this->request->status == "active" ? 1 : 0)
        // )
        ->when(
            $this->request->has('created_date'),
            function ($q) {
                $dateRange = explode(" to " ,$this->request->created_date);
                if (count($dateRange) == 2) {
                    $dateFrom = Carbon::parse($dateRange[0])->format("Y-m-d");
                    $dateTo = Carbon::parse($dateRange[1])->format("Y-m-d");
                    $dateFrom = $dateFrom ." 00:00:00";
                    $dateTo = $dateTo ." 23:59:59";
                    $q->when(
                        $dateFrom && $dateTo,
                        fn($subQ) => $subQ->where('created_at', '>=', $dateFrom)->where('created_at', '<=', $dateTo)
                    );
                }
            }
        );
    }

    public function headings(): array
    {
        return [
            'معرف الخدمة',
            'اسم الخدمة بالعربي',
            'صوره الخدمة',
            'القسم',
            'رقم مقدم الخدمة',
            'ايام الخدمة',
            'المتجر' ,
            'مرئي' ,
            'الحاله' ,
        ];
    }




    public function map($service): array
    {
        $appointment_days = [];
        if(isset($service->appointment_days)){
            foreach ($service->appointment_days as $day) {
                $appointment_days[] = AppointmentDays::getStatus($day);
            }
        }

        return [
            $service->id,
            $service->getTranslation('name', 'ar'),
            asset($service->image),
            $service->category?->name,
            $service->service_provider_phone,
            isset($service->appointment_days) ? implode(",",$appointment_days) : null,
            $service->vendor?->name,
            $service->is_visible == 1 ? 'نعم' : 'لا',
            $service->is_active == 1 ? 'مفعل' : 'غير مفعل',

        ];
    }

    public function columnFormats(): array
    {
        return [
            'B' => NumberFormat::FORMAT_TEXT,
            'C' => NumberFormat::FORMAT_TEXT,
            'D' => NumberFormat::FORMAT_TEXT,
            'E' => NumberFormat::FORMAT_TEXT,

        ];
    }


    public function columnWidths(): array
    {
        return [
            'A' => 15,
            'B' => 30,
            'C' => 30,
            'D' => 15,
            'E' => 15,
            'F' => 15,
            'G' => 15,
            'H' => 15,
            'H' => 15,
            'H' => 15,


        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getDelegate()->getStyle('A:H')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            },
        ];
    }
}
