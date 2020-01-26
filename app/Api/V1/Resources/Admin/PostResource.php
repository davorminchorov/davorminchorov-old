<?php

namespace App\Api\V1\Resources\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'excerpt' => $this->excerpt,
            'body' => $this->body,
            'published_at' => $this->published_at->format('F j, Y H:i'),
            'created_at' => $this->created_at->format('F j, Y H:i'),
            'updated_at' => $this->updated_at->format('F j, Y H:i'),
        ];
    }
}
