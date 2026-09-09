<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductSizeResource;
use App\Models\Product_Size;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ProductSizeController extends Controller
{
    use ApiResponseTrait;

    /**
     * Display a listing of the resource.
     */
public function index()
    {
        try {
            $sizes = Product_Size::with('product')->get();
            return $this->success(ProductSizeResource::collection($sizes), 'Sizes retrieved successfully');
        }catch (\Exception $e) {
           return $this->error($e->getMessage(), 'Failed to retrieve sizes', 500); // مؤقتًا للتشخيص
            }
    }
    /**
     * Store a newly created resource in storage.
     */
  public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'product_id' => 'required|exists:products,id',
                'size_key' => 'required|string',
                'label_en' => 'required|string',
                'label_ar' => 'required|string',
                'price' => 'required|numeric',
            ]);

            // إنشاء السجل الجديد في قاعدة البيانات
            $productSize = Product_Size::create($data);

            return $this->success(new ProductSizeResource($productSize), 'Size created successfully');

        } catch (ValidationException $e) {
            // في حال وجود أخطاء في الـ Validation يرجع كود 422 مع تفاصيل الأخطاء
            return response()->json([
                'success' => false,
                'message' => 'Validation errors',
                'errors' => $e->errors(),
            ], 422);

        } catch (\Exception $e) {
            // في حال حدث أي خطأ آخر يرجع كود 500 مع رسالة الخطأ واضحة
            return response()->json([
                'success' => false,
                'message' => 'Failed to create size: ' . $e->getMessage()
            ], 500);
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(Product_Size $productSize)
    {
        return $this->success(new ProductSizeResource($productSize), 'Size retrieved successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $data = $request->validate([
                'product_id' => 'required|exists:products,id',
                'size_key' => 'required|string',
                'label_en' => 'required|string',
                'label_ar' => 'required|string',
                'price' => 'required|numeric',
            ]);

            // 1. البحث عن الحجم المراد تحديثه أو إرجاع 404 إن لمש يكن موجوداً
            $productSize = Product_Size::findOrFail($id);

            // 2. تحديث البيانات
            $productSize->update($data);

            return $this->success(new ProductSizeResource($productSize), 'Size updated successfully');

        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation errors',
                'errors' => $e->errors(),
            ], 422);

        } catch (\Exception $e) {
            // استخدام استجابة JSON مباشرة لتجنب خطأ دالة error()
            return response()->json([
                'success' => false,
                'message' => 'Failed to update size: ' . $e->getMessage()
            ], 500);
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product_Size $productSize)
    {
        try {
            $productSize->delete();

            return $this->success(null, 'Size deleted successfully');
        } catch (\Exception $e) {
            return $this->error(null, 'Failed to delete size', 500);
        }
    }
}
