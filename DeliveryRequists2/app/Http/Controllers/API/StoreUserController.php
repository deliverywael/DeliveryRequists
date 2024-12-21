<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Stores;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StoreUserController extends Controller
{
    public function attachUserToStore(Request $request, $userId, $storeId): JsonResponse {
        $user = User::findOrFail($userId);
        $store = Stores::findOrFail($storeId);
        $user->stores()->attach($store);
        return response()->json(['message' => 'User attached to store successfully.'], 200);
    }

    public function detachUserFromStore(Request $request, $userId, $storeId): JsonResponse {
        $user = User::findOrFail($userId);
        $store = Stores::findOrFail($storeId);
        $user->stores()->detach($store);
        return response()->json(['message' => 'User detached from store successfully.'], 200);
    }
}
