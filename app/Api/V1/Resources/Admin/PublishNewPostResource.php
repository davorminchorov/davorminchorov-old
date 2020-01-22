<?php

namespace App\Api\V1\Resources\Admin;

use App\Api\V1\Resources\PostResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;

class PublishNewPostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request) : array
    {
        return [
            'status_code' => Response::HTTP_CREATED,
            'status_message' => 'Created',
            'status' => 'success',
            'message' => 'The post was published successfully!',
            'data' => new PostResource($this->resource),
        ];
    }
}
