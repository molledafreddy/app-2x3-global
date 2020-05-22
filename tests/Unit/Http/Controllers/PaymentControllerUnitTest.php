<?php declare(strict_types=1);

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Http\Controllers\PaymentController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\Request;
use App\Payment;
use Illuminate\Support\Facades\Event;
use App\Events\PaymentSaved;
use Illuminate\Support\Facades\Queue;

class PaymentControllerUnitTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function setUp(): void
    {
        parent::setUp();

        $this->controller = new PaymentController;

        $this->requestSearch = new Request(
            [
                'type'          => 'DESC',
                'perPage'       => 10,
                'orderBy'       => 'id',
                'search'        => '',
            ]
        );
        $this->user = factory(\App\User::class)->create();
        $this->request = new Request(
            [
                'user_id' => $this->user->id,
            ]
        );

    }//end setUp()

     public function testIndexAllValuesSuccess()
    {
        factory(\App\Payment::class, 10)->create();
        $payment = Payment::first();

        $response = $this->controller->getPayment($payment->user->id);
        $this->assertEquals(200, $response->getStatusCode());

    }//end testIndexAllValuesSuccess()

    public function testIndexAllValidateuuidSuccess()
    {
        factory(\App\Payment::class, 5)->create();
        $payment = Payment::first();
        $response = $this->controller->getPayment($payment->user->id);
        
        $this->assertEquals($payment->uuid, json_decode($response->getContent())->data[0]->uuid);
        $this->assertEquals(200, $response->getStatusCode());

    }//end testIndexAllValidateuuidSuccess()


    public function testStorePaymentUserIdNoNumericFailed()
    {
        Event::fake();
        $this->request['user_id'] = 'rr2';
        $response = $this->controller->store($this->request);
        $this->assertEquals(422, $response->getStatusCode());
        $this->assertEquals("The user id must be a number.", json_decode($response->getContent())->error[0]);

        
    }//end testStorePaymentUserIdNoNumericFailed()

    public function testStorePaymentUserIdNullFailed()
    {
        Event::fake();
        $this->request['user_id'] = '';
        
        $response = $this->controller->store($this->request);
        $this->assertEquals(422, $response->getStatusCode());
        $this->assertEquals("The User is required.", json_decode($response->getContent())->error[0]);

        
    }//end testStorePaymentUserIdNullFailed()

    public function testStorePaymentPreviousRecordsSuccess()
    {
        Event::fake();
        Queue::fake();
        factory(\App\Payment::class, 5)->create();
        $response = $this->controller->store($this->request);
        $this->assertEquals(201, $response->getStatusCode());
        $this->assertEquals("Payment registration is in process", json_decode($response->getContent())->message);
        
    }//end testStorePaymentPreviousRecordsSuccess()

    public function testStorePaymentNoPreviousRecordsSuccess()
    {
        Event::fake();
        Queue::fake();
        $response = $this->controller->store($this->request);
        $this->assertEquals(201, $response->getStatusCode());
        $this->assertEquals("Payment registration is in process", json_decode($response->getContent())->message);
        
    }//end testStorePaymentNoPreviousRecordsSuccess()

}//end class
