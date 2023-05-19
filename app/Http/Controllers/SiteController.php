<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Product;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::paginate(30);
        $collections = Collection::all();
        return view('welcome')->with(compact('products', 'collections'));
    }

    public function getProductByCollection(Request $request)
    {
        if ($request->product_type == '0') {
            $products = Product::paginate(30);
        } else {
            $products = Product::where('product_type', $request->product_type)->paginate(30);
        }
        $selectedType = $request->product_type;
        $collections = Collection::all();
        return view('pages.products')->with(compact('products', 'collections', 'selectedType'));
    }
}
