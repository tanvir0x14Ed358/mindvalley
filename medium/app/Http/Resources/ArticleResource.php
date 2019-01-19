<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'details' => $this->details,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
            'user_id' => $this->user_id,
            'tag_id' => $this->tag->id,
            'photos' => $this->photos,
        ];
    }
}
