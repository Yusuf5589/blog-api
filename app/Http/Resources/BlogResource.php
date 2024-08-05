<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
                'id' => $this->id,
                'title' => $this->title,
                'slug' => $this->slug,
                'description' => $this->description,
                'beginning_date' => $this->beginning_date,
                'finish_date' => $this->finish_date,
                'category_id' => $this->category_id,
                'tags' => $this->tags,
                'view_count' => $this->view_count,
                'img_url' => $this->img_url,
                'status' => $this->status,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
                'image_url' => $this->image_url,
        ];
    }
}
