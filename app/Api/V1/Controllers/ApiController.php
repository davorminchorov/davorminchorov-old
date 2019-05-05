<?php

namespace App\Api\V1\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class ApiController
{
    /**
     * Get the token array structure.
     *
     * @param string $token
     *
     * @return JsonResponse
     */
    protected function respondWithToken($token): JsonResponse
    {
        return response()->json([
            'status_code' => Response::HTTP_OK,
            'status_message' => 'OK',
            'status' => 'success',
            'message' => 'You logged in successfully!',
            'data' => [
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => auth()->factory()->getTTL() * 60
            ],
        ]);
    }

    /**
     * Get the error response for wrong credentials.
     *
     * @return JsonResponse
     */
    protected function respondWithUnauthorized(): JsonResponse
    {
        return response()->json([
            'status_code' => Response::HTTP_UNAUTHORIZED,
            'status_message' => 'Unauthorized',
            'status' => 'error',
            'message' => 'Wrong email address or password.',
        ], Response::HTTP_UNAUTHORIZED);
    }

    /*
     * Respond with the status code of 200 and data if applicable
     */
    /**
     * @param $message
     * @param array $data
     * @return JsonResponse
     */
    protected function respondWithOk($message, $data = []): JsonResponse
    {
        return response()->json([
            'status_code' => Response::HTTP_OK,
            'status_message' => 'OK',
            'status' => 'success',
            'message' => $message,
            'data' => $data,
        ], Response::HTTP_OK);
    }
}
