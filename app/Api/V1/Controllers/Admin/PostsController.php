<?php

namespace App\Api\V1\Controllers\Admin;

use App\Api\V1\Controllers\ApiController;
use App\Api\V1\Requests\Admin\PublishNewPostRequest;
use App\Api\V1\Requests\Admin\UpdateExistingPostRequest;
use App\Api\V1\Resources\Admin\DeleteExistingPostResource;
use App\Api\V1\Resources\Admin\PublishNewPostResource;
use App\Api\V1\Resources\Admin\UpdateExistingPostResource;
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
        $post = $this->post->create(array_merge($request->only([
            'title',
            'slug',
            'body',
            'excerpt',
            'published_at',
        ]), ['user_id' => auth('api')->id()]));

        return new PublishNewPostResource($post);
    }

    /**
     * Update an existing blog post by ID.
     *
     * @param UpdateExistingPostRequest $request
     * @param int $id
     * @return UpdateExistingPostResource
     */
    public function update(UpdateExistingPostRequest $request, int $id): UpdateExistingPostResource
    {
        $post = $this->post->findOrFail($id);

        $post->update(array_merge($request->only([
            'title',
            'slug',
            'body',
            'excerpt',
            'published_at',
        ]), ['user_id' => auth('api')->id()]));

        return new UpdateExistingPostResource($post->fresh());
    }

    /**
     * Delete an existing blog post by ID.
     *
     * @param int $id
     * @return DeleteExistingPostResource
     */
    public function destroy(int $id): DeleteExistingPostResource
    {
        $post = $this->post->findOrFail($id);

        $post->delete();

        return new DeleteExistingPostResource($post);
    }

    /**
     * Show a single blog post.
     *
     * @param int $id
     * @return SinglePostResource
     */
    public function show(int $id): SinglePostResource
    {
        $post = $this->post->findOrFail($id);

        return new SinglePostResource($post);
    }
}
