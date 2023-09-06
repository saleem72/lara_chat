<?php

namespace App\Http\Resources;

use App\Enums\UserRoleEnum;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'role' => UserRoleEnum::from($this->role_id)->label(),
            'JoinAt' => $this->whenPivotLoaded('chat_user', function() {
               return $this->pivot->created_at;
            }),
        ];
    }
}
