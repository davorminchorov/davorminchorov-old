<?php

namespace App\Api\V1\Controllers\Admin;

use App\Api\V1\Controllers\ApiController;
use App\Api\V1\Requests\Admin\PublishNewPostRequest;
use App\Api\V1\Resources\Admin\PublishNewPostResource;
use App\Api\V1\Resources\PostsCollection;
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
        return new PostsCollection($this->post->latest()->get());
    }

    /**
     * Publish a new blog post.
     *
     * @param PublishNewPostRequest $request
     * @return PublishNewPostResource
     */
    public function store(PublishNewPostRequest $request): PublishNewPostResource
    {
        $post = $this->post->create($request->only([
            'user_id',
            'title',
            'slug',
            'body',
            'excerpt',
            'published_at',
        ]));

        return new PublishNewPostResource($post);
    }
}
