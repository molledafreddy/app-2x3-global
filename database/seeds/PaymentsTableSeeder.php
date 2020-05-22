<?php

use App\Payment;
use Illuminate\Database\Seeder;

// @codingStandardsIgnoreLine
class PaymentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Payment::class)->times(2)->create();
    }
}
