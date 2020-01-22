<?php

namespace App\Api\V1\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Response;

class PostsCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'status_code' => Response::HTTP_OK,
            'status_message' => 'OK',
            'status' => 'success',
            'message' => 'The posts were retrieved successfully!',
            'data' => PostResource::collection($this->collection),
        ];
    }
}
