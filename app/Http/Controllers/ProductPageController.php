<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductPageController extends Controller
{
    public function rings()
    {
        $products = Product::where('category_id', 1)->get(); // Assuming Rings = category_id 1
        return view('products.rings', compact('products'));
    }

    public function pendants()
    {
        $products = Product::where('category_id', 2)->get(); // Pendants
        return view('products.pendants', compact('products'));
    }

    public function earrings()
    {
        $products = Product::where('category_id', 3)->get(); // Earrings
        return view('products.earrings', compact('products'));
    }

    public function bracelets()
    {
        $products = Product::where('category_id', 4)->get(); // Bracelets
        return view('products.bracelets', compact('products'));
    }
}
