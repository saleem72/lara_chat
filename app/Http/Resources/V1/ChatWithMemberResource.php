<?php

namespace App\Http\Resources\V1;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ChatWithMemberResource extends JsonResource
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
            'name' => $this->name,
            'owner' => $this->whenLoaded('owner', function() {
                return $this->owner->name;
            }),
            'isPrivate' => $this->is_private,
            'members' => $this->whenLoaded('members', function() {
                return UserResource::collection($this->members);
                // return $this->members;
            })

        ];
    }
}
