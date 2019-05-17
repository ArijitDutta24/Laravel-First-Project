<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    public function index()
    {
    	//get product by decending order in product table
    	$product = Product::orderBy('id', 'desc')->paginate(1); 

    	return view('frontend.pages.product.index')->with('products', $product);
    }


    public function show($slug)
    {
    	$product = Product::where('slug', $slug)->first();

        if(!is_null($product))
        {
            return view('frontend.pages.product.show', compact('product'));
        }
        else
        {
            session()->flash('error', 'Sorry!! There Is No Product');
            return redirect()->route('products');
        }
    }
}

