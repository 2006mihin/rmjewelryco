<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductPageController extends Controller
{
    public function rings()
    {
        $products = Product::where('category_id', 1)->get();
        return view('products.rings', compact('products'));
    }

    public function pendants()
    {
        $products = Product::where('category_id', 2)->get(); 
        return view('products.pendants', compact('products'));
    }

    public function earrings()
    {
        $products = Product::where('category_id', 3)->get(); 
        return view('products.earrings', compact('products'));
    }

    public function bracelets()
    {
        $products = Product::where('category_id', 4)->get(); 
        return view('products.bracelets', compact('products'));
    }
}
