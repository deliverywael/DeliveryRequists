<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
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

    public function show($id): JsonResponse {
        return response()->json(Product::find($id), 200);
    }

    public function store(ProductRequest $request): JsonResponse {
        $product = Product::create($request->all());
        return response()->json($product, 201);
    }

    public function update(Request $request, $id): JsonResponse {
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return response()->json($product, 200);
    }

    public function delete($id): JsonResponse {
        Product::findOrFail($id)->delete();
        return response()->json(null, 204);
    }

    public function searchProductsInStore(Request $request, $storeId): JsonResponse
    {
        // بدء استعلام جديد على نموذج المنتجات داخل المتجر المحدد
        $query = Product::query()
            ->where('store_id', $storeId)  // تقييد البحث بالمتجر المحدد
            ->select('product_name')  // تحديد جلب أسماء المنتجات فقط
            ->orderBy('product_name');

        // إضافة شرط البحث في عمود name باستخدام LIKE للإشارة إلى بداية النص
        $query->where('product_name', 'LIKE', $request->value . '%');

        // جلب النتائج
        $products = $query->get();

        // التحقق من وجود نتائج للاستعلام
        if ($products->count()) {
            // إنشاء مصفوفة جديدة لأسماء المنتجات فقط
            $productNames = $products->pluck('product_name');
            return response()->json(['Search Results' => $productNames]); // إرجاع النتائج كاستجابة JSON
        } else {
            return response()->json(['message' => 'No Results Found']); // إذا لم توجد نتائج، إرجاع رسالة بعدم وجود نتائج
        }


    }
}
