<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoresRequest;
use App\Models\Stores;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StoreController extends Controller
{

    public function index()
    {
        return response()->json(Stores::with('products')->get(), 200);
    }

    public function create()
    {

    }

    public function store(StoresRequest $request)
    {
        $store = Stores::create($request->all());
        return response()->json($store, 201);
    }

    public function show($id)
    {
        return response()->json(Stores::with('products')->find($id), 200);
    }



    public function update(Request $request,$id)
    {
        $store = Stores::findOrFail($id);
        $store->update($request->all());
        return response()->json($store, 200);
    }

    public function destroy($id)
    {
        Stores::findOrFail($id)->delete();
        return response()->json(null, 204);
    }

    public function search_store(Request $request): JsonResponse {
        $value = $request->input('value');
        $stores = Stores::where('StoreCategory', 'LIKE', $value . '%')->pluck('StoreCategory');
        if ($stores->isEmpty()) {
            return response()->json(['message' => 'No Results Found'], 404);
        }
        return response()->json(['Search Results' => $stores], 200);
    }



}
