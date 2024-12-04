<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class ProductController extends Controller
{
    public function index(){


    }


    public function create()
    {

    }

    public function store(StoreProductRequest $request)
    {

    }
    public function show(Product $product)
    {

    }
    public function edit(Product $product)
    {

    }
    public function update(UpdateProductRequest $request, Product $product)
    {

    }
    public function destroy(Product $product)
    {

    }
    public function search(Request $request,$storeId){
        $value=$request->input("value");


    }

}
