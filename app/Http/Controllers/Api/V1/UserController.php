<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Services\AppPaginator;
use App\Http\Controllers\Controller;
use App\JsonResponses\V1\CustomJson;
use App\Http\Resources\V1\ChatResource;
use App\JsonResponses\V1\CustomPaginatedJson;

class UserController extends Controller
{
    public function userRooms(Request $request)
    {
        $perPage = $request->has('perPage') ? $request['perPage'] : 8;
        if ($perPage == Null) {
            $perPage = 8;
        }
        $page = $request->has('page') ? $request['page'] : 1;
        if ($page == Null) {
            $page = 1;
        }
        $user = auth()->user();
        if ($user instanceof \App\Models\User) {
            $user = $user->loadMissing('rooms');
            $rooms = AppPaginator::paginate($user->rooms, $perPage, $page);
            if ($page > $rooms->lastPage()) {
                $data = new CustomJson(
                    status: false,
                    message: 'You have exceeded the limits, the last page is ' . $rooms->lastPage(),
                    data: Null
                );
                return response()->json($data->toArray(), 400);
            }
            $modify = ChatResource::collection($rooms);
            $results = CustomPaginatedJson::toArray($rooms, $modify);
            return response()->json($results, 200);
        }
        $data = new CustomJson(
            status: false,
            message: 'Some thing wrong happend, please try again later.',
            data: Null
        );
        return response()->json($data->toArray(), 500);
    }
}
