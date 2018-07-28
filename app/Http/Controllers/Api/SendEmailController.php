<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SendEmail;
use App\Services\EmailService;

class SendEmailController extends Controller
{
    /**
     * @param SendEmail $request
     * @header {"test":"test"}
     * @return mixed
     * @response {
     *      "error" : {
     *             "status":false,
     *             "message":""
     *      },
     *      "data":{
     *          "emails": ["fake@mail.com"]
     *     }
     *}
     */
    public function send(SendEmail $request) {
        $emails = (new EmailService())->send($request);
        return response()->success([
            'emails' => $emails
        ]);
    }
}
