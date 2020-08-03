<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function a_user_gets_an_access_token_when_trying_to_login_with_valid_credentials(): void
    {
        $this->withExceptionHandling();

        $user = factory(User::class)->create();

        $response = $this->json('post', $this->apiV1Url.'auth/login', [
            'test' => 'test',
            'email' => $user->email,
            'password' => 'secret',
        ]);
        $jsonResponse = $response->json();

        $response->assertStatus(Response::HTTP_OK);
        $response->assertExactJson([
            'status_code' => Response::HTTP_OK,
            'status_message' => 'OK',
            'status' => 'success',
            'message' => 'You logged in successfully!',
            'data' => [
                'access_token' => $jsonResponse['data']['access_token'],
                'token_type' => 'bearer',
                'expires_in' => $jsonResponse['data']['expires_in'],
            ],
        ]);
    }

    /**
     * @test
     */
    public function a_user_gets_unauthorized_error_with_when_trying_to_login_with_invalid_credentials(): void
    {
        $this->withExceptionHandling();

        $user = factory(User::class)->create();

        $response = $this->json('post', $this->apiV1Url.'auth/login', [
            'test' => 'test',
            'email' => 'test@example.com',
            'password' => 'secret',
        ]);

        $response->assertStatus(Response::HTTP_UNAUTHORIZED);
        $response->assertExactJson([
            'status_code' => Response::HTTP_UNAUTHORIZED,
            'status_message' => 'Unauthorized',
            'status' => 'error',
            'message' => 'Wrong email address or password.',
        ]);
    }

    /**
     * @test
     */
    public function a_user_can_logout(): void
    {
        $this->withExceptionHandling();

        $user = factory(User::class)->create();

        $response = $this->json('post', $this->apiV1Url.'auth/login', [
            'test' => 'test',
            'email' => $user->email,
            'password' => 'secret',
        ]);
        $jsonResponse = $response->json();

        $response->assertStatus(Response::HTTP_OK);
        $response->assertExactJson([
            'status_code' => Response::HTTP_OK,
            'status_message' => 'OK',
            'status' => 'success',
            'message' => 'You logged in successfully!',
            'data' => [
                'access_token' => $jsonResponse['data']['access_token'],
                'token_type' => 'bearer',
                'expires_in' => $jsonResponse['data']['expires_in'],
            ],
        ]);

        $response = $this->json('post', $this->apiV1Url.'auth/logout', [], [
            'Authorization' => 'Bearer '.$jsonResponse['data']['access_token'],
        ]);

        $response->assertStatus(Response::HTTP_OK);
        $response->assertExactJson([
            'status_code' => Response::HTTP_OK,
            'status_message' => 'OK',
            'status' => 'success',
            'message' => 'You logged out successfully!',
        ]);

        $response = $this->json('post', $this->apiV1Url.'auth/me', [], [
            'Authorization' => 'Bearer '.$jsonResponse['data']['access_token'],
        ]);

        $response->assertStatus(Response::HTTP_UNAUTHORIZED);
        $response->assertExactJson([
            'message' => 'Unauthenticated.',
        ]);
    }

    /**
     * @test
     */
    public function a_user_gets_his_or_her_personal_information_when_he_or_she_goes_to_profile()
    {
        $this->withExceptionHandling();

        $user = factory(User::class)->create();

        $response = $this->json('post', $this->apiV1Url.'auth/login', [
            'test' => 'test',
            'email' => $user->email,
            'password' => 'secret',
        ]);
        $jsonResponse = $response->json();

        $response->assertStatus(Response::HTTP_OK);
        $response->assertExactJson([
            'status_code' => Response::HTTP_OK,
            'status_message' => 'OK',
            'status' => 'success',
            'message' => 'You logged in successfully!',
            'data' => [
                'access_token' => $jsonResponse['data']['access_token'],
                'token_type' => 'bearer',
                'expires_in' => $jsonResponse['data']['expires_in'],
            ],
        ]);

        $response = $this->json('post', $this->apiV1Url.'auth/me', [], [
            'Authorization' => 'Bearer '.$jsonResponse['data']['access_token'],
        ]);

        $response->assertStatus(Response::HTTP_OK);
        $response->assertExactJson([
            'status_code' => Response::HTTP_OK,
            'status_message' => 'OK',
            'status' => 'success',
            'message' => 'This is my profile.',
            'data' => [
                'user' => [
                    'name' => $user->name,
                    'email' => $user->email,
                ],
            ],
        ]);
    }

    /**
     * @test
     */
    public function a_user_can_refresh_his_or_her_token(): void
    {
        $this->withExceptionHandling();

        $user = factory(User::class)->create();

        $response = $this->json('post', $this->apiV1Url.'auth/login', [
            'test' => 'test',
            'email' => $user->email,
            'password' => 'secret',
        ]);

        $jsonResponse = $response->json();
        $accessToken = $jsonResponse['data']['access_token'];

        $response->assertStatus(Response::HTTP_OK);
        $response->assertExactJson([
            'status_code' => Response::HTTP_OK,
            'status_message' => 'OK',
            'status' => 'success',
            'message' => 'You logged in successfully!',
            'data' => [
                'access_token' => $accessToken,
                'token_type' => 'bearer',
                'expires_in' => $jsonResponse['data']['expires_in'],
            ],
        ]);

        $response = $this->json('post', $this->apiV1Url.'auth/refresh', [], [
            'Authorization' => 'Bearer '.$accessToken,
        ]);

        $jsonResponse = $response->json();

        $newAccessToken = $jsonResponse['data']['access_token'];

        $response->assertStatus(Response::HTTP_OK);
        $response->assertExactJson([
            'status_code' => Response::HTTP_OK,
            'status_message' => 'OK',
            'status' => 'success',
            'message' => 'You logged in successfully!',
            'data' => [
                'access_token' => $newAccessToken,
                'token_type' => 'bearer',
                'expires_in' => $jsonResponse['data']['expires_in'],
            ],
        ]);

        $this->assertNotEquals($accessToken, $newAccessToken);

        $response = $this->json('post', $this->apiV1Url.'auth/refresh', [], [
            'Authorization' => 'Bearer '.$accessToken,
        ]);

        $response->assertStatus(Response::HTTP_UNAUTHORIZED);
        $response->assertExactJson([
            'status_code' => Response::HTTP_UNAUTHORIZED,
            'status_message' => 'The token has been blacklisted',
            'status' => 'error',
            'message' => 'The provided token was invalid.',
        ]);
    }

    /**
     * @test
     */
    public function guests_cannot_access_unauthenticated_routes(): void
    {
        $this->withExceptionHandling();

        $response = $this->json('post', $this->apiV1Url.'auth/me');

        $response->assertStatus(Response::HTTP_UNAUTHORIZED);
        $response->assertExactJson([
            'message' => 'Unauthenticated.',
        ]);
    }

    /**
     * @test
     */
    public function the_email_field_is_required(): void
    {
        $this->withExceptionHandling();

        $response = $this->json('post', $this->apiV1Url.'auth/login', [
            'test' => 'test',
            'password' => 'secret',
        ]);

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);

        $response->assertExactJson([
            'message' => 'The given data was invalid.',
            'errors' => [
                'email' => [
                    'The email field is required.',
                ],
            ],
        ]);
    }

    /**
     * @test
     */
    public function the_password_field_is_required()
    {
        $this->withExceptionHandling();

        $response = $this->json('post', $this->apiV1Url.'auth/login', [
            'test' => 'test',
            'email' => 'test@example.com',
        ]);

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);

        $response->assertExactJson([
            'message' => 'The given data was invalid.',
            'errors' => [
                'password' => [
                    'The password field is required.',
                ],
            ],
        ]);
    }

    /**
     * @test
     */
    public function the_email_field_must_be_an_email()
    {
        $this->withExceptionHandling();

        $response = $this->json('post', $this->apiV1Url.'auth/login', [
            'test' => 'test',
            'email' => 'test',
            'password' => 'secret',
        ]);

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);

        $response->assertExactJson([
            'message' => 'The given data was invalid.',
            'errors' => [
                'email' => [
                    'The email must be a valid email address.',
                ],
            ],
        ]);
    }
}
