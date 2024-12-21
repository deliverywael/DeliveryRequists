<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Favourite;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FavouriteController extends Controller
{
    public function index(): JsonResponse {
        return response()->json(Favourite::with(['user', 'product'])->get(), 200);
    }

    public function show($id): JsonResponse {
        return response()->json(Favourite::with(['user', 'product'])->find($id), 200);
    }

    public function store(Request $request): JsonResponse {
        $favourite = Favourite::create($request->all());
        return response()->json($favourite, 201);
    }

    public function delete($id): JsonResponse {
        Favourite::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
