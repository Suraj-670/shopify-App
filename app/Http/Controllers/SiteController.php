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
        if ($request->ajax()) {
            if (!$request->collection) {
                $products = Product::paginate(20);
            } else {
                $products = Product::where('product_type', $request->collection)->paginate(20);
            }
            return view('pages.products', compact('products'));
        }
        return view('welcome')->with(compact('products', 'collections'));
    }
}
