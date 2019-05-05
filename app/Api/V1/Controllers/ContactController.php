<?php

namespace App\Api\V1\Controllers;

use App\Api\V1\Requests\ContactRequest;
use App\Mail\SendContactEmail;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Http\JsonResponse;

class ContactController extends ApiController
{

    /**
     * Send contact email to website owner.
     *
     * @param ContactRequest $contactRequest
     * @param Mailer $mailer
     * @return JsonResponse
     */
    public function sendContactEmail(ContactRequest $contactRequest, Mailer $mailer): JsonResponse
    {
        $mailer->send(new SendContactEmail($contactRequest->only(['name', 'email', 'message'])));

        return $this->respondWithOk('Thank you! Your message was sent successfully. I will respond as soon as possible.');
    }
}
