<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\User;
use App\Models\Comment;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'description' => $this->description,
            'image_path' => $this->image_path,
            'video_path' => $this->video_path,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
            'view_count' => $this->view_count,
            'user' => User::find($this->user_id),
            'comments' => $this->comments,
            'likes' => $this->likes
          ];
    }
}
