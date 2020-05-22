<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use GuzzleHttp\Client;
use App\Traits\StorePayment;

class GetIndicator implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, StorePayment;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    public $user_id;
   
    public function __construct($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // https://mindicador.cl/api/dolar
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://mindicador.cl',
            // You can set any number of default request options.
            'timeout'  => 9.0,
        ]);
        
        $response = $client->request('GET', '/api/dolar');
        $data = json_decode($response->getBody()->getContents());
        $dollars = $data->serie[0]->valor;
        
        return $this->storePayment($dollars,$this->user_id);
    }
}
