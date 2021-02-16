<?php

namespace Tests\Feature;

use App\Mail\SendContactEmail;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContactTest extends TestCase
{
    /**
     * @test
     */
    public function a_user_can_send_a_contact_email(): void
    {
        Mail::fake();

        Mail::assertNotQueued(SendContactEmail::class);

        $response = $this->json('post', $this->apiV1Url.'contact', [
            'test' => 'test',
            'name' => 'John Doe',
            'email' => 'test@gmail.com',
            'message' => 'This is a test message',
        ]);

        $response->assertStatus(Response::HTTP_OK);
        $response->assertExactJson([
            'status_code' => Response::HTTP_OK,
            'status_message' => 'OK',
            'status' => 'success',
            'message' => 'Thank you! Your message was sent successfully. I will respond as soon as possible.',
            'data' => [],
        ]);

        Mail::assertQueued(SendContactEmail::class);
    }

    /**
     * @test
     */
    public function a_name_is_required(): void
    {
        $response = $this->json('post', $this->apiV1Url.'contact', [
            'test' => 'test',
            'email' => 'test@gmail.com',
            'message' => 'This is a test message',
        ]);

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        $response->assertExactJson([
            'message' => 'The given data was invalid.',
            'errors' => [
                'name' => [
                    'The name field is required.',
                ],
            ],
        ]);
    }

    /**
     * @test
     */
    public function an_email_is_required(): void
    {
        $response = $this->json('post', $this->apiV1Url.'contact', [
            'test' => 'test',
            'name' => 'John Doe',
            'message' => 'This is a test message',
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
    public function an_email_must_be_a_valid_email_address(): void
    {
        $response = $this->json('post', $this->apiV1Url.'contact', [
            'test' => 'test',
            'name' => 'John Doe',
            'email' => 'test',
            'message' => 'This is a test message',
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

    /**
     * @test
     */
    public function an_email_must_be_a_valid_email_address_with_a_valid_email_domain(): void
    {
        $response = $this->json('post', $this->apiV1Url.'contact', [
            'test' => 'test',
            'name' => 'John Doe',
            'email' => 'test@adomainthatdoesnotexist.com',
            'message' => 'This is a test message',
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

    /**
     * @test
     */
    public function an_email_must_be_a_valid_email_address_with_a_valid_rfc_format(): void
    {
        $response = $this->json('post', $this->apiV1Url.'contact', [
            'test' => 'test',
            'name' => 'John Doe',
            'email' => 'op[p[p[opopl;[@gmail.com',
            'message' => 'This is a test message',
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

    /**
     * @test
     */
    public function a_message_is_required(): void
    {
        $response = $this->json('post', $this->apiV1Url.'contact', [
            'test' => 'test',
            'name' => 'John Doe',
            'email' => 'test@gmail.com',
        ]);

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        $response->assertExactJson([
            'message' => 'The given data was invalid.',
            'errors' => [
                'message' => [
                    'The message field is required.',
                ],
            ],
        ]);
    }
}
