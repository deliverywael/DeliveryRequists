<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse {
        return response()->json(Product::all(), 200);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

  /*  public function searchProductsInStore(Request $request, $storeId): JsonResponse {
        $value = $request->input('value');
        $products = Product::where('store_id', $storeId)
            ->where('name', 'LIKE', $value . '%')
            ->pluck('name');
        if ($products->isEmpty()) {
            return response()->json(['message' => 'No Results Found'], 404);
        }
        return response()->json(['Search Results' => $products], 200);
    }
*/
    public function searchProductsInStore(Request $request, $storeId): JsonResponse
    {
        // بدء استعلام جديد على نموذج المنتجات داخل المتجر المحدد
        $query = Product::query()
            ->where('store_id', $storeId)  // تقييد البحث بالمتجر المحدد
            ->select('name')  // تحديد جلب أسماء المنتجات فقط
            ->orderBy('name');

        // إضافة شرط البحث في عمود name باستخدام LIKE للإشارة إلى بداية النص
        $query->where('name', 'LIKE', $request->value . '%');

        // جلب النتائج
        $products = $query->get();

        // التحقق من وجود نتائج للاستعلام
        if ($products->count()) {
            // إنشاء مصفوفة جديدة لأسماء المنتجات فقط
            $productNames = $products->pluck('name');
            return response()->json(['Search Results' => $productNames]); // إرجاع النتائج كاستجابة JSON
        } else {
            return response()->json(['message' => 'No Results Found']); // إذا لم توجد نتائج، إرجاع رسالة بعدم وجود نتائج
        }

    }










}
