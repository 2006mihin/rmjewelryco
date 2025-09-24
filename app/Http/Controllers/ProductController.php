<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return ProductResource::collection(Product::with(['category','admin'])->get());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'product_name' => 'required|string',
            'description'  => 'nullable|string',
            'price'        => 'required|numeric',
            'quantity'     => 'required|integer',
            'image'        => 'nullable|string',
            'category_id'  => 'required|exists:categories,id',
            'admin_id'     => 'required|exists:admins,id',
        ]);

        $product = Product::create($data);
        return new ProductResource($product);
    }

    public function show($id)
    {
        return new ProductResource(Product::with(['category','admin'])->findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $data = $request->validate([
            'product_name' => 'sometimes|string',
            'description'  => 'nullable|string',
            'price'        => 'sometimes|numeric',
            'quantity'     => 'sometimes|integer',
            'image'        => 'nullable|string',
            'category_id'  => 'sometimes|exists:categories,id',
            'admin_id'     => 'sometimes|exists:admins,id',
        ]);

        $product->update($data);
        return new ProductResource($product);
    }

    public function destroy($id)
    {
        Product::findOrFail($id)->delete();
        return response()->json(['message' => 'Product deleted successfully']);
    }
}
