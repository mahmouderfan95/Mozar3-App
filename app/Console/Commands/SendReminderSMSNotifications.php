<?php

namespace App\Console\Commands;

use App\Jobs\SendSmsJob;
use App\Models\OrderServiceDetail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class SendReminderSMSNotifications extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sendReminder:smsNotifications';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send reminder SMS notifications to (Farmers and Vendors)';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            OrderServiceDetail::whereDate('appointment_date', now()->addDays(1))
                ->whereHas('orderService', function ($query) {
                    $query->whereNotIn('status', ['completed', 'canceled']);
                })
                ->with([
                    'orderService' => function ($query) {
                        $query->select('id', 'code', 'transaction_id', 'vendor_id');
                    },
                    'orderService.transaction.client' => function ($query) {
                        $query->select('id', 'phone');
                    },
                    'orderService.vendor.user' => function ($query) {
                        $query->select('id', 'phone');
                    }
                ])
                ->chunk(100, function ($order_details) {
                    foreach ($order_details as $index => $order_detail) {
                        $customer_phone = $order_detail->orderService->transaction->client->phone;
                        $vendor_phone = $order_detail->orderService->vendor->user->phone;
                        $msg = "عزيزي مستفيد منصة مًزارع\n" .
                            "تذكير يوجد لديك طلب خدمة رقم " . $order_detail->orderService->code . " موعدها غدأ ";

                        $delay = now()->addSeconds($index * 0.2);
                        dispatch(new SendSmsJob($msg, $customer_phone))->delay($delay)->onQueue("customer-sms");
                        dispatch(new SendSmsJob($msg, $vendor_phone))->delay($delay)->onQueue("vendor-sms");
                    }
                });

        } catch (\Exception $e) {
            Log::error('Error sending reminder SMS notifications: ' . $e->getMessage());
            $this->error('Error sending reminder SMS notifications. Check the logs for details.');
        }
    }
}
