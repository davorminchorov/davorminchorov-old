<?php

namespace App\Api\V1\Controllers;

use App\Api\V1\Requests\LoginRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use TimeHunter\LaravelGoogleReCaptchaV3\GoogleReCaptchaV3;

class AuthenticationController extends ApiController
{
    /**
     * Get a JWT via given credentials.
     *
     * @param LoginRequest $loginRequest
     * @param GoogleReCaptchaV3 $googleReCaptchaV3
     * @return JsonResponse
     */
    public function login(LoginRequest $loginRequest, GoogleReCaptchaV3 $googleReCaptchaV3) : JsonResponse
    {
        $googleRecaptchaResponse = $googleReCaptchaV3->verifyResponse($loginRequest->get('recaptcha'), $loginRequest->getClientIp());
        $googleRecaptchaIsSuccessful = $loginRequest->has('test') || $googleRecaptchaResponse->isSuccess();

        if (! $googleRecaptchaIsSuccessful) {
            return $this->respondWithBadRequest('It looks like you are a robot or you did something a robot would do.');
        }

        if (!$token = auth()->attempt($loginRequest->only(['email', 'password']))) {
            return $this->respondWithUnauthorized();
        }

        return $this->respondWithToken($token);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return JsonResponse
     */
    public function logout() : JsonResponse
    {
        auth()->logout();

        return response()->json([
            'status_code' => Response::HTTP_OK,
            'status_message' => 'OK',
            'status' => 'success',
            'message' => 'You logged out successfully!',
        ]);
    }

    /**
     * Get the authenticated User.
     *
     * @return JsonResponse
     */
    public function me() : JsonResponse
    {
        $authenticatedUser = auth()->user();

        return response()->json([
            'status_code' => Response::HTTP_OK,
            'status_message' => 'OK',
            'status' => 'success',
            'message' => 'This is my profile.',
            'data' => [
                'user' => [
                    'name' => $authenticatedUser->name,
                    'email' => $authenticatedUser->email,
                ],
            ],
        ]);
    }

    /**
     * Refresh a token.
     *
     * @return JsonResponse
     */
    public function refresh() : JsonResponse
    {
        return $this->respondWithToken(auth()->refresh());
    }
}
