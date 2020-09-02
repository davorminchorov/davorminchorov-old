<?php

namespace Tests\Feature\Admin;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_shows_a_list_of_admin_blog_posts(): void
    {
        $posts = Post::factory()->times(3)->create();

        $user = User::factory()->create();

        $response = $this->json('POST', $this->apiV1Url.'auth/login', [
            'test' => 'test',
            'email' => $user->email,
            'password' => 'secret',
        ]);

        $jsonResponse = $response->json();

        $response = $this->json('GET', $this->apiV1Url.'admin/posts', [], [
            'Authorization' => 'Bearer '.$jsonResponse['data']['access_token'],
        ]);

        $response->assertJson([
            'status_code' => Response::HTTP_OK,
            'status_message' => 'OK',
            'status' => 'success',
            'message' => 'The admin posts were retrieved successfully!',
            'data' => [
                [
                    'id' => $posts[0]['id'],
                    'title' => $posts[0]['title'],
                    'slug' => $posts[0]['slug'],
                    'body' => $posts[0]['body'],
                    'excerpt' => $posts[0]['excerpt'],
                    'published_at' => $posts[0]['published_at']->format('Y-m-d H:i:s'),
                    'created_at' => $posts[0]['created_at']->format('Y-m-d H:i:s'),
                    'updated_at' => $posts[0]['updated_at']->format('Y-m-d H:i:s'),
                ],
                [
                    'id' => $posts[1]['id'],
                    'title' => $posts[1]['title'],
                    'slug' => $posts[1]['slug'],
                    'body' => $posts[1]['body'],
                    'excerpt' => $posts[1]['excerpt'],
                    'published_at' => $posts[1]['published_at']->format('Y-m-d H:i:s'),
                    'created_at' => $posts[1]['created_at']->format('Y-m-d H:i:s'),
                    'updated_at' => $posts[1]['updated_at']->format('Y-m-d H:i:s'),
                ],
                [
                    'id' => $posts[2]['id'],
                    'title' => $posts[2]['title'],
                    'slug' => $posts[2]['slug'],
                    'body' => $posts[2]['body'],
                    'excerpt' => $posts[2]['excerpt'],
                    'published_at' => $posts[2]['published_at']->format('Y-m-d H:i:s'),
                    'created_at' => $posts[2]['created_at']->format('Y-m-d H:i:s'),
                    'updated_at' => $posts[2]['updated_at']->format('Y-m-d H:i:s'),
                ],
            ],
        ]);

        $response->assertStatus(Response::HTTP_OK);
    }

    /**
     * @test
     */
    public function it_shows_a_list_of_both_published_and_unpublished_posts(): void
    {
        $publishedPost = Post::factory()->published()->create();
        $unpublishedPost = Post::factory()->unpublished()->create();

        $user = User::factory()->create();

        $response = $this->json('POST', $this->apiV1Url.'auth/login', [
            'test' => 'test',
            'email' => $user->email,
            'password' => 'secret',
        ]);

        $jsonResponse = $response->json();

        $response = $this->json('GET', $this->apiV1Url.'admin/posts', [], [
            'Authorization' => 'Bearer '.$jsonResponse['data']['access_token'],
        ]);

        $response->assertSeeText($unpublishedPost->title);
        $response->assertSeeText($publishedPost->title);
        $response->assertStatus(Response::HTTP_OK);
    }

    /**
     * @test
     */
    public function the_admin_can_publish_a_new_blog_post(): void
    {
        $this->withExceptionHandling();

        $user = User::factory()->create();

        $response = $this->json('POST', $this->apiV1Url.'auth/login', [
            'test' => 'test',
            'email' => $user->email,
            'password' => 'secret',
        ]);
        $jsonResponse = $response->json();

        $response = $this->json('POST', $this->apiV1Url.'admin/posts', [
            'title' => $title = 'A new title',
            'slug' => str_slug($title),
            'body' => 'This is test body text',
            'excerpt' => 'This is test excerpt test',
            'published_at' => now()->subDays(3)->format('Y-m-d H:i:s'),
        ], [
            'Authorization' => 'Bearer '.$jsonResponse['data']['access_token'],
        ]);

        $this->assertDatabaseHas('posts', [
            'id' => 1,
            'title' => $title = 'A new title',
            'slug' => str_slug($title),
            'body' => 'This is test body text',
            'excerpt' => 'This is test excerpt test',
            'published_at' => now()->subDays(3)->format('Y-m-d H:i:s'),
            'created_at' => now()->format('Y-m-d H:i:s'),
            'updated_at' => now()->format('Y-m-d H:i:s'),
        ]);

        $response->assertJson([
            'status_code' => Response::HTTP_CREATED,
            'status_message' => 'Created',
            'status' => 'success',
            'message' => 'The post was published successfully!',
            'data' => [
                'id' => 1,
                'title' => $title = 'A new title',
                'slug' => str_slug($title),
                'body' => 'This is test body text',
                'excerpt' => 'This is test excerpt test',
                'published_at' => now()->subDays(3)->format('Y-m-d H:i:s'),
                'created_at' => now()->format('Y-m-d H:i:s'),
                'updated_at' => now()->format('Y-m-d H:i:s'),
            ],
        ]);

        $response->assertStatus(Response::HTTP_CREATED);
    }

    /**
     * @test
     */
    public function a_title_is_required_when_publishing_a_new_post(): void
    {
        $this->withExceptionHandling();

        $user = User::factory()->create();

        $response = $this->json('POST', $this->apiV1Url.'auth/login', [
            'test' => 'test',
            'email' => $user->email,
            'password' => 'secret',
        ]);
        $jsonResponse = $response->json();

        $response = $this->json('POST', $this->apiV1Url.'admin/posts', [
            'slug' => str_slug('A new title'),
            'body' => 'This is test body text',
            'excerpt' => 'This is test excerpt test',
            'published_at' => now()->subDays(3)->format('Y-m-d H:i:s'),
        ], [
            'Authorization' => 'Bearer '.$jsonResponse['data']['access_token'],
        ]);

        $response->assertJsonValidationErrors('title');
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * @test
     */
    public function a_slug_is_required_when_publishing_a_new_post(): void
    {
        $this->withExceptionHandling();

        $user = User::factory()->create();

        $response = $this->json('POST', $this->apiV1Url.'auth/login', [
            'test' => 'test',
            'email' => $user->email,
            'password' => 'secret',
        ]);
        $jsonResponse = $response->json();

        $response = $this->json('POST', $this->apiV1Url.'admin/posts', [
            'title' => 'A new title',
            'body' => 'This is test body text',
            'excerpt' => 'This is test excerpt test',
            'published_at' => now()->subDays(3)->format('Y-m-d H:i:s'),
        ], [
            'Authorization' => 'Bearer '.$jsonResponse['data']['access_token'],
        ]);

        $response->assertJsonValidationErrors('slug');
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * @test
     */
    public function an_excerpt_is_required_when_publishing_a_new_post(): void
    {
        $this->withExceptionHandling();

        $user = User::factory()->create();

        $response = $this->json('POST', $this->apiV1Url.'auth/login', [
            'test' => 'test',
            'email' => $user->email,
            'password' => 'secret',
        ]);
        $jsonResponse = $response->json();

        $response = $this->json('POST', $this->apiV1Url.'admin/posts', [
            'title' => 'A new title',
            'slug' => str_slug('A new title'),
            'body' => 'This is test body text',
            'published_at' => now()->subDays(3)->format('Y-m-d H:i:s'),
        ], [
            'Authorization' => 'Bearer '.$jsonResponse['data']['access_token'],
        ]);

        $response->assertJsonValidationErrors('excerpt');
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * @test
     */
    public function a_body_is_required_when_publishing_a_new_post(): void
    {
        $this->withExceptionHandling();

        $user = User::factory()->create();

        $response = $this->json('POST', $this->apiV1Url.'auth/login', [
            'test' => 'test',
            'email' => $user->email,
            'password' => 'secret',
        ]);
        $jsonResponse = $response->json();

        $response = $this->json('POST', $this->apiV1Url.'admin/posts', [
            'title' => 'A new title',
            'slug' => str_slug('A new title'),
            'excerpt' => 'This is test excerpt test',
            'published_at' => now()->subDays(3)->format('Y-m-d H:i:s'),
        ], [
            'Authorization' => 'Bearer '.$jsonResponse['data']['access_token'],
        ]);

        $response->assertJsonValidationErrors('body');
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * @test
     */
    public function a_published_at_date_is_required_when_publishing_a_new_post(): void
    {
        $this->withExceptionHandling();

        $user = User::factory()->create();

        $response = $this->json('POST', $this->apiV1Url.'auth/login', [
            'test' => 'test',
            'email' => $user->email,
            'password' => 'secret',
        ]);
        $jsonResponse = $response->json();

        $response = $this->json('POST', $this->apiV1Url.'admin/posts', [
            'title' => 'A new title',
            'slug' => str_slug('A new title'),
            'body' => 'This is test body text',
            'excerpt' => 'This is test excerpt test',
        ], [
            'Authorization' => 'Bearer '.$jsonResponse['data']['access_token'],
        ]);

        $response->assertJsonValidationErrors('published_at');
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * @test
     */
    public function a_published_at_date_needs_to_be_in_proper_format_when_publishing_a_new_post(): void
    {
        $this->withExceptionHandling();

        $user = User::factory()->create();

        $response = $this->json('POST', $this->apiV1Url.'auth/login', [
            'test' => 'test',
            'email' => $user->email,
            'password' => 'secret',
        ]);
        $jsonResponse = $response->json();

        $response = $this->json('POST', $this->apiV1Url.'admin/posts', [
            'title' => 'A new title',
            'slug' => str_slug('A new title'),
            'body' => 'This is test body text',
            'excerpt' => 'This is test excerpt test',
            'published_at' => now()->subDays(3)->format('Y/m/d H:i:s'),
        ], [
            'Authorization' => 'Bearer '.$jsonResponse['data']['access_token'],
        ]);

        $response->assertJsonValidationErrors('published_at');
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * @test
     */
    public function the_admin_can_update_an_existing_blog_post(): void
    {
        $this->withExceptionHandling();

        $user = User::factory()->create();
        $post = Post::factory()->create();

        $response = $this->json('POST', $this->apiV1Url.'auth/login', [
            'test' => 'test',
            'email' => $user->email,
            'password' => 'secret',
        ]);
        $jsonResponse = $response->json();

        $response = $this->json('PATCH', $this->apiV1Url.'admin/posts/'.$post->id, [
            'title' => $title = 'A new updated title',
            'slug' => str_slug($title),
            'body' => 'This is test body updated text',
            'excerpt' => 'This is test excerpt updated text',
            'published_at' => now()->subDays(3)->format('Y-m-d H:i:s'),
        ], [
            'Authorization' => 'Bearer '.$jsonResponse['data']['access_token'],
        ]);

        $this->assertDatabaseHas('posts', [
            'id' => 1,
            'title' => $title = 'A new updated title',
            'slug' => str_slug($title),
            'body' => 'This is test body updated text',
            'excerpt' => 'This is test excerpt updated text',
            'published_at' => now()->subDays(3)->format('Y-m-d H:i:s'),
            'created_at' => now()->format('Y-m-d H:i:s'),
            'updated_at' => now()->format('Y-m-d H:i:s'),
        ]);

        $response->assertJson([
            'status_code' => Response::HTTP_OK,
            'status_message' => 'OK',
            'status' => 'success',
            'message' => 'The post was updated successfully!',
            'data' => [
                'id' => 1,
                'title' => $title = 'A new updated title',
                'slug' => str_slug($title),
                'body' => 'This is test body updated text',
                'excerpt' => 'This is test excerpt updated text',
                'published_at' => now()->subDays(3)->format('Y-m-d H:i:s'),
                'created_at' => now()->format('Y-m-d H:i:s'),
                'updated_at' => now()->format('Y-m-d H:i:s'),

            ],
        ]);

        $response->assertStatus(Response::HTTP_OK);
    }

    /**
     * @test
     */
    public function a_title_is_required_when_updating_an_existing_post(): void
    {
        $this->withExceptionHandling();

        $user = User::factory()->create();
        $post = Post::factory()->create();

        $response = $this->json('POST', $this->apiV1Url.'auth/login', [
            'test' => 'test',
            'email' => $user->email,
            'password' => 'secret',
        ]);
        $jsonResponse = $response->json();

        $response = $this->json('PATCH', $this->apiV1Url.'admin/posts/'.$post->id, [
            'slug' => str_slug('A new title'),
            'body' => 'This is test body text',
            'excerpt' => 'This is test excerpt test',
            'published_at' => now()->subDays(3)->format('Y-m-d H:i:s'),
        ], [
            'Authorization' => 'Bearer '.$jsonResponse['data']['access_token'],
        ]);

        $response->assertJsonValidationErrors('title');
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * @test
     */
    public function a_slug_is_required_when_updating_an_existing_post(): void
    {
        $this->withExceptionHandling();

        $user = User::factory()->create();
        $post = Post::factory()->create();

        $response = $this->json('POST', $this->apiV1Url.'auth/login', [
            'test' => 'test',
            'email' => $user->email,
            'password' => 'secret',
        ]);
        $jsonResponse = $response->json();

        $response = $this->json('PATCH', $this->apiV1Url.'admin/posts/'.$post->id, [
            'title' => 'A new title',
            'body' => 'This is test body text',
            'excerpt' => 'This is test excerpt test',
            'published_at' => now()->subDays(3)->format('Y-m-d H:i:s'),
        ], [
            'Authorization' => 'Bearer '.$jsonResponse['data']['access_token'],
        ]);

        $response->assertJsonValidationErrors('slug');
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * @test
     */
    public function an_excerpt_is_required_when_updating_an_existing_post(): void
    {
        $this->withExceptionHandling();

        $user = User::factory()->create();
        $post = Post::factory()->create();

        $response = $this->json('POST', $this->apiV1Url.'auth/login', [
            'test' => 'test',
            'email' => $user->email,
            'password' => 'secret',
        ]);
        $jsonResponse = $response->json();

        $response = $this->json('PATCH', $this->apiV1Url.'admin/posts/'.$post->id, [
            'title' => 'A new title',
            'slug' => str_slug('A new title'),
            'body' => 'This is test body text',
            'published_at' => now()->subDays(3)->format('Y-m-d H:i:s'),
        ], [
            'Authorization' => 'Bearer '.$jsonResponse['data']['access_token'],
        ]);

        $response->assertJsonValidationErrors('excerpt');
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * @test
     */
    public function a_body_is_required_when_updating_an_existing_post(): void
    {
        $this->withExceptionHandling();

        $user = User::factory()->create();
        $post = Post::factory()->create();

        $response = $this->json('POST', $this->apiV1Url.'auth/login', [
            'test' => 'test',
            'email' => $user->email,
            'password' => 'secret',
        ]);
        $jsonResponse = $response->json();

        $response = $this->json('PATCH', $this->apiV1Url.'admin/posts/'.$post->id, [
            'title' => 'A new title',
            'slug' => str_slug('A new title'),
            'excerpt' => 'This is test excerpt test',
            'published_at' => now()->subDays(3)->format('Y-m-d H:i:s'),
        ], [
            'Authorization' => 'Bearer '.$jsonResponse['data']['access_token'],
        ]);

        $response->assertJsonValidationErrors('body');
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * @test
     */
    public function a_published_at_date_is_required_when_updating_an_existing_post(): void
    {
        $this->withExceptionHandling();

        $user = User::factory()->create();
        $post = Post::factory()->create();

        $response = $this->json('POST', $this->apiV1Url.'auth/login', [
            'test' => 'test',
            'email' => $user->email,
            'password' => 'secret',
        ]);
        $jsonResponse = $response->json();

        $response = $this->json('PATCH', $this->apiV1Url.'admin/posts/'.$post->id, [
            'title' => 'A new title',
            'slug' => str_slug('A new title'),
            'body' => 'This is test body text',
            'excerpt' => 'This is test excerpt test',
        ], [
            'Authorization' => 'Bearer '.$jsonResponse['data']['access_token'],
        ]);

        $response->assertJsonValidationErrors('published_at');
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * @test
     */
    public function a_published_at_date_needs_to_be_in_proper_format_when_updating_an_existing_post(): void
    {
        $this->withExceptionHandling();

        $user = User::factory()->create();
        $post = Post::factory()->create();

        $response = $this->json('POST', $this->apiV1Url.'auth/login', [
            'test' => 'test',
            'email' => $user->email,
            'password' => 'secret',
        ]);
        $jsonResponse = $response->json();

        $response = $this->json('PATCH', $this->apiV1Url.'admin/posts/'.$post->id, [
            'title' => 'A new title',
            'slug' => str_slug('A new title'),
            'body' => 'This is test body text',
            'excerpt' => 'This is test excerpt test',
            'published_at' => now()->subDays(3)->format('Y/m/d H:i:s'),
        ], [
            'Authorization' => 'Bearer '.$jsonResponse['data']['access_token'],
        ]);

        $response->assertJsonValidationErrors('published_at');
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * @test
     */
    public function the_admin_can_delete_an_existing_blog_post(): void
    {
        $this->withExceptionHandling();

        $user = User::factory()->create();
        $post = Post::factory()->create();

        $response = $this->json('POST', $this->apiV1Url.'auth/login', [
            'test' => 'test',
            'email' => $user->email,
            'password' => 'secret',
        ]);
        $jsonResponse = $response->json();

        $response = $this->json('DELETE', $this->apiV1Url.'admin/posts/'.$post->id, [], [
            'Authorization' => 'Bearer '.$jsonResponse['data']['access_token'],
        ]);

        $this->assertDatabaseMissing('posts', [
            'id' => $post->id,
        ]);

        $response->assertJson([
            'status_code' => Response::HTTP_OK,
            'status_message' => 'OK',
            'status' => 'success',
            'message' => 'The post was deleted successfully!',
            'data' => [],
        ]);

        $response->assertStatus(Response::HTTP_OK);
    }
}
