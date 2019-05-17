<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;
use Image;

class ProductsController extends Controller
{
    
    public function index()
    {
    	//get product by decending order in product table
    	$product = Product::orderBy('id', 'desc')->get(); 
    	return view('backend.pages.product.index')->with('products', $product);
    }



    public function create()
    {
    	return view('backend.pages.product.create');
    }


    public function store(Request $request)
    {

    	$request->validate([
    		'title'        => 'required|max:150',
    		'description'  => 'required',
    		'price'        => 'required',
    		'qty'     => 'required',
    		'productimage' => 'required'
    	]);
    	$product = new Product;
    	$product->title       = $request->title;
    	$product->description = $request->description;
    	$product->price       = $request->price;
    	$product->slug        = str_slug($request->title);
    	$product->quantity    = $request->qty;
    	$product->category_id = 1;
    	$product->brand_id    = 1;
    	$product->admin_id    = 1;

    	$product->save();


    	//Multi Image Insert
    	if(count($request->product_image) > 0)
    	{
    		foreach ($request->product_image as $image) 
    		{
    				//Create Image Name
		    		$img = time().'.'.$image->getClientOriginalExtension(); 
		    		$location = public_path('images/'.$img);
		    		Image::make($image)->save($location);

		    		$productimage = new ProductImage;
		    		$productimage->product_id = $product->id;
		    		$productimage->image = $img;
		    		$productimage->save();
		    	
    		}
    	}


    	//ProductImage Model Insert Images
    	if($request->hasFile('productimage'))
    	{
    		//Inasert That Image
    		$image = $request->file('productimage');
    		$img = 'Main_'.time().'.'.$image->getClientOriginalExtension(); //Create Image Name
    		$location = public_path('images/'.$img);
    		Image::make($image)->save($location);

    		$productimage = new ProductImage;
    		$productimage->product_id = $product->id;
    		$productimage->image = $img;
    		$productimage->save();
    	}
    	session()->flash('success', 'Product Has Create Successfully');
    	return redirect()->route('admin.products');


    	
    }

    public function edit($id)
    {
    	$product = Product::find($id);
    	return view('backend.pages.product.edit')->with('product', $product);
    }


    public function update(Request $request, $id)
    {

    	$request->validate([
    		'title'        => 'required|max:150',
    		'description'  => 'required',
    		'price'        => 'required',
    		'qty'          => 'required'
    		
    	]);

    	

    	$data = array(
    		'title'       => $request->input('title'),
    		'description' => $request->input('description'),
    		'price'       => $request->input('price'),
    		'quantity'    => $request->input('qty')
    	);
    	

    	Product::where('id', $id)->update($data);
    	session()->flash('success', 'Product Has Update Successfully');
		return redirect()->route('admin.products');


    	
    }


   
    public function delete($id)
    {
  
    	// Product::where('id', $id)->delete();
    	// return redirect()->route('admin.products');
    	$product = Product::find($id);
    	if(!is_null($product))
    	{
    		$product->delete();
    	}
    	session()->flash('success', 'Product Has Deleted Successfully');
    	return back();
    }
}
