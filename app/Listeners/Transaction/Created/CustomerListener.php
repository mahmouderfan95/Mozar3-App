<?php

namespace App\Listeners\Transaction\Created;

use App\Events\Transaction;
use App\Jobs\CustomerSms\Services\TransactionCreated as ServicesTransactionCreated;
use App\Jobs\CustomerSms\TransactionCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CustomerListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Transaction\Created  $event
     * @return void
     */
    public function handle(Transaction\Created $event)
    {
        if($event->getTransaction()->type == 'order')
        {
            TransactionCreated::dispatch($event->getTransaction())->onQueue("customer-sms");
        }else{
            ServicesTransactionCreated::dispatch($event->getTransaction())->onQueue("customer-sms-services");
        }
        // $job = $event->getTransaction()->type == 'order' ? new TransactionCreated($event->getTransaction()) : new ServicesTransactionCreated($event->getTransaction());
        // dispatch($job)->delay(5)->onQueue("customer-sms");
    }
}
