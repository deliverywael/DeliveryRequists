<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ShoppingCard;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ShoppingCardController extends Controller
{
    public function index(): JsonResponse {
        return response()->json(ShoppingCard::with(['user', 'product'])->get(), 200);
    }

    public function show($id): JsonResponse {
        return response()->json(ShoppingCard::with(['user', 'product'])->find($id), 200);
    }

    public function store(Request $request): JsonResponse {
        $shoppingCard = ShoppingCard::create($request->all());
        return response()->json($shoppingCard, 201);
    }

    public function update(Request $request, $id): JsonResponse {
        $shoppingCard = ShoppingCard::findOrFail($id);
        $shoppingCard->update($request->all());
        return response()->json($shoppingCard, 200);
    }

    public function delete($id): JsonResponse {
        ShoppingCard::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
