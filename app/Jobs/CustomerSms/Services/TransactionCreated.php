<?php

namespace App\Jobs\CustomerSms\Services;

use App\Enums\AppointmentTimes;
use App\Models\Transaction;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\ClientMessage;
use App\Enums\ClientMessageEnum;
use App\Enums\ServiceOrderStatus;
use Error;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Services\NotificationCenterService;
class TransactionCreated implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(private Transaction $transaction)
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
$invoice_number = implode(', ', $this->transaction->orderServices()->pluck('code')->toArray());
                #make each in transaction -> orderServices -> services - and get service_provider_phone
                $service_provider_phone = [];
                $this->transaction->orderServices->each(function ($orderService) use (&$service_provider_phone) {
                    $orderService->services->each(function ($service) use (&$service_provider_phone) {
                        $service_provider_phone[] = $service->service_provider_phone; });
                    });
                $service_provider_phone_string = implode(', ', $service_provider_phone);
                $appointment_dates = [];
                foreach ($this->transaction->orderServices as $orderService) {
                    foreach ($orderService->orderServices as $detail) {
                        $appointment_dates[] = $detail->appointment_date . ' ' . AppointmentTimes::getStatus($detail->appointment_time);
                    }
                }

                $service_appointment = implode(', ', $appointment_dates);
                $customer = $this->transaction->customer;
                $msg = "::var_client_name::،\n" .
                    "تم إستلام طلب الخدمة رقم: ::var_order_id::\n" .
                    "بقيمة: ::var_order_amount:: ر.س \n".
                    "رقم الطلب: ::var_order_invoice_no:: \n" .
                    "موعد الخدمة ::var_service_appointment:: \n";
                    "رقم مزود الخدمة ::var_service_provider_phone:: \n";

                $invoice_number = implode(', ', $this->transaction->orderServices()->pluck('code')->toArray());

                $clientMessage = ClientMessage::messageFor(ClientMessageEnum::CreatedServiceTransaction)->first();

                if ($clientMessage) $msg = $clientMessage->getTransMessage($customer->lang ?? "");
                    $msg = str_replace("::var_client_name::", $this->transaction->client->name, $msg);
                    $msg = str_replace("::var_order_id::", $this->transaction->code, $msg);
                    $msg = str_replace("::var_order_amount::", $this->transaction->total, $msg);
                    $msg = str_replace("::var_order_invoice_no::", $invoice_number, $msg);
                    $msg = str_replace("::var_service_appointment::", $service_appointment, $msg);
                    $msg = str_replace("::var_service_provider_phone::", $service_provider_phone_string, $msg);
                (new NotificationCenterService)->toSms(['user' => $customer, 'message' => $msg]);
        } catch (Exception|Error $e) {
            Log::channel("customer-sms-errors")->error("Exception in TransactionCreated: " . $e->getMessage());
        }
    }
}
