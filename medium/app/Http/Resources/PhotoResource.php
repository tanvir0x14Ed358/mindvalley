<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PhotoResource extends JsonResource
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
            'article_id' => $this->article_id,
            'photo' => $this->photo,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
            'article' => $this->article,
        ];
    }
}
