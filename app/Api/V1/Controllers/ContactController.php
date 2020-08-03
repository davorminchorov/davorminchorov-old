<?php

namespace App\Api\V1\Controllers;

use App\Api\V1\Requests\ContactRequest;
use App\Mail\SendContactEmail;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Http\JsonResponse;
use TimeHunter\LaravelGoogleReCaptchaV3\GoogleReCaptchaV3;

class ContactController extends ApiController
{
    /**
     * Send contact email to website owner.
     *
     * @param ContactRequest $contactRequest
     * @param Mailer $mailer
     * @param GoogleReCaptchaV3 $googleReCaptchaV3
     * @return JsonResponse
     */
    public function sendContactEmail(ContactRequest $contactRequest, Mailer $mailer, GoogleReCaptchaV3 $googleReCaptchaV3): JsonResponse
    {
        $googleRecaptchaResponse = $googleReCaptchaV3->verifyResponse($contactRequest->get('recaptcha'), $contactRequest->getClientIp());
        $googleRecaptchaIsSuccessful = $contactRequest->has('test') || $googleRecaptchaResponse->isSuccess();

        if (! $googleRecaptchaIsSuccessful) {
            return $this->respondWithBadRequest('It looks like you are a robot or you did something a robot would do.');
        }

        $mailer->to('davorminchorov@gmail.com')
               ->send(new SendContactEmail($contactRequest->only(['name', 'email', 'message'])));

        return $this->respondWithOk('Thank you! Your message was sent successfully. I will respond as soon as possible.');
    }
}
