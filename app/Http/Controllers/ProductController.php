<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * List all products with category info.
     */
    public function index()
    {
        return Product::with('category')->get();
    }

    /**
     * Store a new product.
     */
    public function store(Request $request)
    {
        try {
            // Validate incoming data
            $request->validate([
                'product_name' => 'required|string|max:255',
                'price'        => 'required|numeric',
                'quantity'     => 'required|integer',
                'category_id'  => 'required|exists:categories,id',
                'image'        => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
                'description'  => 'nullable|string',
            ]);

            $data = $request->only([
                'product_name', 'price', 'quantity', 'category_id', 'description'
            ]);
            $data['admin_id'] = Auth::id() ?? 1;
            

            // Handle image upload
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('images/products'), $imageName);
                $data['image'] = 'images/products/' . $imageName;
            }

            $product = Product::create($data);

            return response()->json([
                'success' => true,
                'product' => $product
            ], 201);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors'  => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Show a single product
     */
    public function show($id)
    {
        $product = Product::with('category')->findOrFail($id);
        return response()->json($product);
    }

    /**
     * Update an existing product
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        try {
            $request->validate([
                'product_name' => 'required|string|max:255',
                'price'        => 'required|numeric',
                'quantity'     => 'required|integer',
                'category_id'  => 'required|exists:categories,id',
                'image'        => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
                'description'  => 'nullable|string',
            ]);

            $data = $request->only([
                'product_name', 'price', 'quantity', 'category_id', 'description'
            ]);

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('images/products'), $imageName);
                $data['image'] = 'images/products/' . $imageName;
            }

            $product->update($data);

            return response()->json([
                'success' => true,
                'product' => $product
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors'  => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Delete a product
     */
    public function destroy($id)
    {
        try {
            $product = Product::findOrFail($id);
            $product->delete();

            return response()->json([
                'success' => true,
                'message' => 'Product deleted successfully'
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
