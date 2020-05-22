<?php

namespace App\Traits;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Payment;
use App\Events\PaymentSaved;

trait StorePayment{

	private function storePayment($dollars, $user_id)
	{
		$date = Carbon::now();
		$payment               = new Payment();
        $payment->uuid         = (string) Str::uuid();
        $payment->payment_date = $date->format('Y-m-d');
        $payment->expires_at   = $date->format('Y-m-d');
        $payment->clp_usd      = $dollars;
        $payment->user_id      = $user_id;
        $payment->status       = 'pending';
        if ($payment->save()) {
            event(new PaymentSaved($payment));
		}
		return response()->json($payment);
	}
}
















