<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends ApiController
{
    /**
     * @api           {get} /api/clients client list
     * @apiVersion    2.0.0
     * @apiName       index
     * @apiGroup      Client
     *
     * @apiSuccess {Object}    data                     response data object.
     * @apiSuccess {Object[]}  data.id                  client identifier
     * @apiSuccess {Number}    data.name                name of client
     * @apiSuccess {Number}    data.email               email of client
     * @apiSuccess {Number}    data.join_date           join date of client
     * @apiSuccess {Date}      data.email_verified_at   email verification date
     * @apiSuccess {Number}    data.created_at          registration creation date
     * @apiSuccess {Number}    data.updated_at          registration update date
     * @apiSuccess {Number}    data.deleted_at          record deletion date
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
     *       "data": {
     *          "current_page": 1
     *          "data": {
     *              "id": 1
     *              "name": "Brando Flatley IV"
     *              "email": "micah.luettgen@example.org"
     *              "join_date": "2020-05-22 19:34:40"
     *              "email_verified_at": "2020-05-22T19:34:40.000000Z"
     *              "created_at": "2020-05-22T19:19:19.000000Z"
     *              "updated_at": "2020-05-22T19:19:19.000000Z"
     *              "deleted_at": null
     *          }
     *          "first_page_url": "http://localhost?page=1"
     *          "from": 1
     *          "last_page": 1
     *          "last_page_url": "http://localhost?page=1"
     *          "next_page_url": null
     *          "path": "http://localhost"
     *          "per_page": 10
     *          "prev_page_url": null
     *          "to": 10
     *          "total": 10
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
    public function index(Request $request)
    {
        $search    = '';
        $orderBy   = $request->orderBy == null ? 'id' : $request->orderBy;
        $type      = $request->type == 'true' ? 'DESC' : 'ASC';
        $perPage   = $request->perPage == null ? 10 : $request->perPage;
        
        if (!empty($request->search)) {
            $search = $request->search;
        }

        $users = User::search($search)->orderBy($orderBy, $type)->paginate($perPage);
        return $this->showAll($users);
    }
}
