<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;
use App\Jobs\GetIndicator;
use App\Traits\StorePayment;
use Carbon\Carbon;

class PaymentController extends ApiController
{
    use StorePayment;
    
    /**
     * @api           {get} /api/payments/client/:id Check payments related to a user
     * @apiVersion    2.0.0
     * @apiName       getPayment
     * @apiGroup      Payment
     *
     * @apiSuccess {Object}    data                response data object.
     * @apiSuccess {Object[]}  data.uuid                payment identifier
     * @apiSuccess {Number}    data.payment_date        date of payment
     * @apiSuccess {Number}    data.expires_at          expiration date
     * @apiSuccess {Number}    data.clp_usd             amount in dollars canceled
     * @apiSuccess {Date}      data.status              payment status
     * @apiSuccess {Number}    data.user_id             customer id related to payment
     * @apiSuccess {Number}    data.created_at          registration creation date
     * @apiSuccess {Number}    data.updated_at          registration update date
     * @apiSuccess {Number}    data.deleted_at          record deletion date
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
     *       "data": {
     *           "uuid": "356e74ac-b00d-4eb3-8097-2daf52452909"
     *           "payment_date": "2020-05-22 19:19:19"
     *           "expires_at": "2020-05-22 19:19:19"
     *           "clp_usd": "6887.0"
     *           "status": "pending"
     *           "user_id": "2"
     *           "created_at": "2020-05-22T19:19:19.000000Z"
     *           "updated_at": "2020-05-22T19:19:19.000000Z"
     *           "deleted_at": null
     *        }
     *     }
     *
     *
     * @apiErrorExample userNotFound:
     *     HTTP/1.1 404 Not Found
     *     {
     *       "error": "userNotFound"
     *     }
     */
    public function getPayment($id)
    {
        $paiments = Payment::where('user_id',$id)->get();
        return $this->showAll($paiments);
    }

    /**
     * @api      {post} /api/payments/:ref Create a new Payment
     * @apiName  store
     * @apiGroup Payment
     *
     * @apiParam {String} user_id Client id.*
     * @apiSuccess {Object} user User Profile Information.
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 201 OK
     *     {
     *       "message": "Payment registration is in process"
     *     }
     *
     * @apiError {json} message The list of errors fields not provided or well formatted.
     *
     *     HTTP/1.1 422 Not Processible
     *     {
     *       "message.error": "List of errors occurred"
     *     }
     */
    public function store(Request $request)
    {
        $messages = [
            'user_id.required' => 'The User is required.',
            'user_id.number'   => 'The user id must be numeric.',
        ];

        $validator = \Validator::make(
            $request->all(),
            [
                'user_id'  => 'required|numeric'
            ],
            $messages
        );

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors()->all(),422);
        }
        
        $date = Carbon::now();
        $result = Payment::whereDate('payment_date',$date->format('Y-m-d'))->first();
        
        if (empty($result)) {
          $value=  GetIndicator::dispatch($request->input('user_id'));
        }else {
            $dollars = $result->clp_usd;
            $result = $this->storePayment($dollars, $request->input('user_id'));
        }

        return response()->json(
            [
                'message' => 'Payment registration is in process'
            ],
            201
        );
    }
}
