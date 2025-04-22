<?php

namespace App\Listeners\ServiceTransaction\Created;

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
        dispatch(new ServicesTransactionCreated($event->getTransaction()))->delay(5)->onQueue("customer-sms");
    }
}
