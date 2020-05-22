<?php

namespace App\Listeners;

use App\Events\PaymentSaved;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\NewPayment;
use Mail;

class SendPaymentSavedNotification
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
     * @param  PaymentSaved  $event
     * @return void
     */
    public function handle(PaymentSaved $event)
    {
        Mail::to($event->payment->user->email)->send(new NewPayment($event->payment));
    }
}
