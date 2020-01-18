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
        $user = factory(User::class)->create();
        $publishedPosts = factory(Post::class, 3)->state('published')->create();
        dump($publishedPosts[0]->toArray());
        dump($publishedPosts[1]->toArray());
        dump($publishedPosts[2]->toArray());
        $response = $this->json('GET', $this->apiV1Url . 'posts');
        dd(json_decode($response->getContent(), true));
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
                    'author' => [
                        'id' => 1,
                        'name' => 'Davor Minchorov'
                    ],
                    'published_at' => $publishedPosts[0]['published_at']->format('F j, Y H:i'),
                ],
                [
                    'id' => $publishedPosts[1]['id'],
                    'title' => $publishedPosts[1]['title'],
                    'slug' => $publishedPosts[1]['slug'],
                    'body' => $publishedPosts[1]['body'],
                    'excerpt' => $publishedPosts[1]['excerpt'],
                    'author' => [
                        'id' => 1,
                        'name' => 'Davor Minchorov'
                    ],
                    'published_at' => $publishedPosts[1]['published_at']->format('F j, Y H:i'),
                ],
                [
                    'id' => $publishedPosts[2]['id'],
                    'title' => $publishedPosts[2]['title'],
                    'slug' => $publishedPosts[2]['slug'],
                    'body' => $publishedPosts[2]['body'],
                    'excerpt' => $publishedPosts[2]['excerpt'],
                    'author' => [
                        'id' => 1,
                        'name' => 'Davor Minchorov'
                    ],
                    'published_at' => $publishedPosts[2]['published_at']->format('F j, Y H:i'),
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
        $user = factory(User::class)->create();
        $publishedPost = factory(Post::class)->state('published')->create();
        $unpublishedPost = factory(Post::class)->state('unpublished')->create();

        $response = $this->json('GET', $this->apiV1Url . 'posts');

        $response->assertDontSeeText($unpublishedPost->title);
        $response->assertSeeText($publishedPost->title);
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function it_shows_a_single_blog_post(): void
    {
        $user = factory(User::class)->create();
        $publishedPost = factory(Post::class)->state('published')->create();

        $response = $this->json('GET', $this->apiV1Url . 'posts/' . $publishedPost->slug);

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
                'published_at' => $publishedPost->published_at->format('F j, Y H:i'),
            ],
        ]);

        $response->assertStatus(200);
    }
}
