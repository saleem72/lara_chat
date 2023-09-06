<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ChatMessageResource extends JsonResource
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
            'chat' => $this->whenLoaded('room', function() {
                return $this->room->name;
            }),
            'sender' => $this->whenLoaded('sender', function() {
                return $this->sender->name;
            }),
            'message' => $this->message,
            'sentAt' => $this->sent_at,
        ];
    }
}
