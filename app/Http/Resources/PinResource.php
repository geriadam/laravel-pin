<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PinResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $isLike = false;
        $user = auth('sanctum')->user();
        if ($user && $this !== null && $this->isLikedBy($user)) {
            $isLike = true;
        }
        return [
            'id' => $this->id,
            'user' => $this->user,
            'title' => $this->title,
            'description' => $this->description,
            'image' => $this->image,
            'is_publish' => $this->is_publish,
            'like_count' => $this->likers()->count(),
            'is_like' => $isLike,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
