<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "comments" => $this->comments,
            "comments_mail" => $this->comments_mail,
            "blog_slug" => $this->blog_slug,
            "status" => $this->status,
        ];
    }
}
