@extends('backend.layout.master')

@section('content')

<div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
            <div class="card-header">
              <h3>Edit Category</h3>
            </div>
            <div class="card-body">
              <form method="post" action="{{ route('admin.category.update', $category->id) }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                @include('backend.partial.messege')
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Enter Category Title" value="{{ $category->name }}"> 
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Description</label>
                  <textarea name="description" rows="8" cols="80" class="form-control" placeholder="Category Description Here....">{{ $category->description }}</textarea>
                </div>


                <div class="form-group">
                  <label for="exampleInputEmail1">Primary Category(Optional)</label>
                  <select class="form-control" name="parent_id">
                    <option value="">--Please Select Primary Category--</option>
                    @foreach($main_category as $mcat)
                      
                      <option value="{{ $mcat->id }}" {{ $mcat->id == $category->parent_id ? 'selected="selected"' : '' }}>{{ $mcat->name }}</option>  
                    @endforeach                    
                  </select>
                </div>
                
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Category Image</label>
                  <br>
                  <img src="{{ asset('images/category/'. $category->image) }}" style="height: 100px; width: 150px;">
                  <input type="file" class="form-control" name="catimage" id="catimage">                     
                </div>

                
                <button type="submit" class="btn btn-primary">Update Category</button>
              </form>
            </div>
          </div>
        </div>
        
      <!-- main-panel ends -->

@endsection
