<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Models\Orders;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OrdersController extends Controller
{public function index(): JsonResponse {
    return response()->json(Orders::with('products')->get(), 200);
}

public function show($id): JsonResponse {
    return response()->json(Orders::with('products')->find($id), 200);
}

public function store(Request $request): JsonResponse {
    $order = Orders::create($request->all());
    return response()->json($order, 201);
}

public function update(Request $request, $id): JsonResponse {
    $order = Orders::findOrFail($id);
    $order->update($request->all());
    return response()->json($order, 200);
}

public function delete($id): JsonResponse {
    Orders::findOrFail($id)->delete();
    return response()->json(null, 204);
}
}
