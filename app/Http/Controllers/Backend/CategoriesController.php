<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Image;
use File;

class CategoriesController extends Controller
{
    public function index()
    {
    	$category = Category::orderBy('id', 'desc')->get();
    	return view('backend.pages.category.index', compact('category'));
    }

    public function create()
    {
    	$main_category = Category::orderBy('name', 'desc')->where('parent_id', NULL)->get();
    	return view('backend.pages.category.create', compact('main_category'));
    }


    public function store(Request $request)
    {

    	$this->validate($request, 
    		[
    		'name'        => 'required|max:150',
    		'description' => 'required',
    		'catimage'    => 'nullable|image'
    		],
    		
    		[
    		'name.required'  => 'Plaese Provide Category Name',
    		'catimage.image' => 'Plaese Select An Image'
    		]);


    	$category = new Category;

    	$category->name        = $request->name;
    	$category->description = $request->description;
    	$category->parent_id   = $request->parent_id;
    	$category->save();

    	//Category Model Insert Images
    	if(count($request->catimage) > 0)
    	{
    		//Inasert That Image
    		$image = $request->file('catimage');
    		$img = time().'.'.$image->getClientOriginalExtension(); //Create Image Name
    		$location = public_path('images/category/'.$img);
    		Image::make($image)->save($location);
			
			$data = array('image' => $img);
			Category::where('id', $category->id)->update($data);
    	}

    	session()->flash('success', 'Category Has Create Successfully');
    	return redirect()->route('admin.categories');

    }


    public function edit($id)
    {
        //Fetch All Data
    	$main_category = Category::orderBy('name', 'desc')->where('parent_id', NULL)->get();

        //Fetch Single Row
    	$category = Category::find($id);

    	return view('backend.pages.category.edit', compact('main_category', 'category'));
    }



    public function update(Request $request, $id)
    {

    	
    	$this->validate($request, 
		[
		'name'        => 'required|max:150',
		'description' => 'required',
		'catimage'    => 'nullable|image'
		],
		
		[
		'name.required'  => 'Plaese Provide Category Name',
		'catimage.image' => 'Plaese Select An Image'
		]);

        $categ = Category::find($id);

    	if(count($request->catimage) > 0)
    	{
            //Delete Old Images
            if(File::exists('images/category/'.$categ->image))
            {
                File::delete('images/category/'.$categ->image);
            }
    		//Inasert That Image
    		$image = $request->file('catimage');
    		//Create Image Name
    		$img = time().'.'.$image->getClientOriginalExtension(); 

    		$location = public_path('images/category/'.$img);
    		Image::make($image)->save($location);
			
				$data = array(
	    		'name'        => $request->input('name'),
	    		'description' => $request->input('description'),
	    		'parent_id'   => $request->input('price'),
	    		'image'       => $img
	    		);
				Category::where('id', $id)->update($data);
    	}

	    	$data = array(
	    		'name'        => $request->input('name'),
	    		'description' => $request->input('description'),
	    		'parent_id'   => $request->input('price')
	    	);
			Category::where('id', $id)->update($data);

    	session()->flash('success', 'Category Has Update Successfully');
		return redirect()->route('admin.categories');


    	
    }



    public function delete($id)
    {
  
    	// Product::where('id', $id)->delete();
    	// return redirect()->route('admin.products');
        
    	$cat = Category::find($id);
    	if(!is_null($cat))
    	{
            //Delete Sub Category
            if($cat->parent_id == NULL)
            {
                $sub_category = Category::orderBy('name', 'desc')->where('parent_id', $cat->id)->get();

                foreach ($sub_category as $sub) 
                {
                    //Delete Category Image
                    if(File::exists('images/category/'.$sub->image))
                    {
                        File::delete('images/category/'.$sub->image);
                    }
                    $sub->delete();
                }
            }

            //Delete Category Image
            if(File::exists('images/category/'.$cat->image))
            {
                File::delete('images/category/'.$cat->image);
            }
    		$cat->delete();
    	}
    	session()->flash('success', 'Category Has Deleted Successfully');
    	return back();
    }
}
