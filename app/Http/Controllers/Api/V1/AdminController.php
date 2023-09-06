<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Chat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\JsonResponses\V1\CustomJson;
use App\Http\Resources\V1\ChatWithMemberResource;
use App\Http\Requests\Admin\V1\AdminSendMessageRequest;
use App\Http\Resources\ChatMessageResource;
use App\Models\ChatMessage;

class AdminController extends Controller
{
    public function allRooms(Request $request) {
        $query = Chat::with(['members','owner'])->get();
        $rooms = ChatWithMemberResource::collection($query);
        $data = new CustomJson(
            status: true,
            message: 'Success',
            data: $rooms
        );
        return response()->json($data->toArray(), 200);
    }

    public function sendMessageToChat(AdminSendMessageRequest $request) {

        $chatId = $request['chatId'];
        $message = $request['message'];
        // $input = [
        //     'chat_id' => $chatId,
        //     'message' => $message,
        // ];

        $chat_message = ChatMessage::create([
            'chat_id' => $chatId,
            'user_id' => auth()->user()->id,
            'message' => $message,
            'sent_at' => now(),
        ]);
        $chat_message = $chat_message->loadMissing(['sender', 'room']);
        $data = new CustomJson(
            status: true,
            message: 'Success',
            data: new ChatMessageResource($chat_message)
        );
        return response()->json($data->toArray(), 201);
    }
}
