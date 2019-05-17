<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class PagesController extends Controller
{
    public function index()
    {
    	$products = Product::orderBy('id', 'desc')->paginate(1);
    	return view('frontend.pages.index', compact('products'));
    }


    public function contact()
    {
    	return view('frontend.pages.contact');
    }

     
}
