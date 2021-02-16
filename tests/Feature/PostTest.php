<?php

namespace Tests\Feature;

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
    public function it_shows_a_list_of_published_posts(): void
    {
        $user = User::factory()->create();
        $publishedPosts = Post::factory()->times(3)->published()->create();
        $response = $this->json('GET', $this->apiV1Url.'posts');

        $response->assertJson([
            'status_code' => Response::HTTP_OK,
            'status_message' => 'OK',
            'status' => 'success',
            'message' => 'The posts were retrieved successfully!',
            'data' => [
                [
                    'id' => $publishedPosts[2]['id'],
                    'title' => $publishedPosts[2]['title'],
                    'slug' => $publishedPosts[2]['slug'],
                    'body' => $publishedPosts[2]['body'],
                    'excerpt' => $publishedPosts[2]['excerpt'],
                    'author' => [
                        'name' => 'Davor Minchorov',
                    ],
                    'published_at' => $publishedPosts[2]['published_at']->format('Y-m-d H:i:s'),
                    'created_at' => $publishedPosts[2]['created_at']->format('Y-m-d H:i:s'),
                    'updated_at' => $publishedPosts[2]['updated_at']->format('Y-m-d H:i:s'),
                ],
                [
                    'id' => $publishedPosts[1]['id'],
                    'title' => $publishedPosts[1]['title'],
                    'slug' => $publishedPosts[1]['slug'],
                    'body' => $publishedPosts[1]['body'],
                    'excerpt' => $publishedPosts[1]['excerpt'],
                    'author' => [
                        'name' => 'Davor Minchorov',
                    ],
                    'published_at' => $publishedPosts[1]['published_at']->format('Y-m-d H:i:s'),
                    'created_at' => $publishedPosts[1]['created_at']->format('Y-m-d H:i:s'),
                    'updated_at' => $publishedPosts[1]['updated_at']->format('Y-m-d H:i:s'),
                ],
                [
                    'id' => $publishedPosts[0]['id'],
                    'title' => $publishedPosts[0]['title'],
                    'slug' => $publishedPosts[0]['slug'],
                    'body' => $publishedPosts[0]['body'],
                    'excerpt' => $publishedPosts[0]['excerpt'],
                    'author' => [
                        'name' => 'Davor Minchorov',
                    ],
                    'published_at' => $publishedPosts[0]['published_at']->format('Y-m-d H:i:s'),
                    'created_at' => $publishedPosts[0]['created_at']->format('Y-m-d H:i:s'),
                    'updated_at' => $publishedPosts[0]['updated_at']->format('Y-m-d H:i:s'),                ],
            ],
        ]);

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function it_does_not_show_a_list_of_unpublished_posts(): void
    {
        $user = User::factory()->create();
        $publishedPost = Post::factory()->published()->create();
        $unpublishedPost = Post::factory()->unpublished()->create();

        $response = $this->json('GET', $this->apiV1Url.'posts');

        $response->assertDontSeeText($unpublishedPost->title);
        $response->assertSeeText($publishedPost->title);
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function it_shows_a_single_blog_post(): void
    {
        $user = User::factory()->create();
        $publishedPost = Post::factory()->published()->create();

        $response = $this->json('GET', $this->apiV1Url.'posts/'.$publishedPost->slug);

        $response->assertJson([
            'status_code' => Response::HTTP_OK,
            'status_message' => 'OK',
            'status' => 'success',
            'message' => 'The post was retrieved successfully!',
            'data' => [
                'id' => $publishedPost->id,
                'title' => $publishedPost->title,
                'slug' => $publishedPost->slug,
                'body' => $publishedPost->body,
                'excerpt' => $publishedPost->excerpt,
                'published_at' => $publishedPost->published_at->format('Y-m-d H:i:s'),
                'created_at' => $publishedPost->created_at->format('Y-m-d H:i:s'),
                'updated_at' => $publishedPost->updated_at->format('Y-m-d H:i:s'),
            ],
        ]);

        $response->assertStatus(200);
    }
}
