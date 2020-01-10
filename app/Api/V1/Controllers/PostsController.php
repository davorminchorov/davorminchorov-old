<?php

namespace App\Api\V1\Controllers;

use App\Api\V1\Resources\PostsCollection;
use App\Api\V1\Resources\SinglePostResource;
use App\Models\Post;

class PostsController extends ApiController
{
    /**
     * @var Post
     */
    private $post;

    /**
     * PostsController constructor.
     * @param Post $post
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Displays a list of blog posts.
     *
     * @return PostsCollection
     */
    public function index(): PostsCollection
    {
        return new PostsCollection($this->post->where('published_at', '<', now())->latest('id')->get());
    }

    /**
     * Show a single blog post.
     *
     * @param string $slug
     * @return SinglePostResource
     */
    public function show(string $slug): SinglePostResource
    {
        $post = $this->post->where('slug', $slug)->where('published_at', '<', now())->firstOrFail();

        return new SinglePostResource($post);
    }
}
