<?php

namespace Tests\Feature;

use App\Models\Post;
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
        $publishedPosts = factory(Post::class, 3)->states('published')->create();
        $response = $this->json('GET', $this->apiV1Url . 'posts');

        $response->assertJson([
            'status_code' => Response::HTTP_OK,
            'status_message' => 'OK',
            'status' => 'success',
            'message' => 'The posts were retrieved successfully!',
            'data' => [
                [
                    'id' => $publishedPosts[0]['id'],
                    'title' => $publishedPosts[0]['title'],
                    'slug' => $publishedPosts[0]['slug'],
                    'body' => $publishedPosts[0]['body'],
                    'excerpt' => $publishedPosts[0]['excerpt'],
                    'published_at' => $publishedPosts[0]['published_at']->format('F j, Y H:i:s'),
                ],
                [
                    'id' => $publishedPosts[1]['id'],
                    'title' => $publishedPosts[1]['title'],
                    'slug' => $publishedPosts[1]['slug'],
                    'body' => $publishedPosts[1]['body'],
                    'excerpt' => $publishedPosts[1]['excerpt'],
                    'published_at' => $publishedPosts[1]['published_at']->format('F j, Y H:i:s'),
                ],
                [
                    'id' => $publishedPosts[2]['id'],
                    'title' => $publishedPosts[2]['title'],
                    'slug' => $publishedPosts[2]['slug'],
                    'body' => $publishedPosts[2]['body'],
                    'excerpt' => $publishedPosts[2]['excerpt'],
                    'published_at' => $publishedPosts[2]['published_at']->format('F j, Y H:i:s'),
                ],
            ],
        ]);

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function it_does_not_show_a_list_of_unpublished_posts(): void
    {
        $publishedPost = factory(Post::class)->states('published')->create();
        $unpublishedPost = factory(Post::class)->states('unpublished')->create();

        $response = $this->json('GET', $this->apiV1Url . 'posts');

        $response->assertDontSeeText($unpublishedPost->title);
        $response->assertSeeText($publishedPost->title);
        $response->assertStatus(200);
    }
}
