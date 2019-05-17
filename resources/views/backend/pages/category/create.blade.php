@extends('backend.layout.master')

@section('content')

<div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
            <div class="card-header">
              <h3>Add Category</h3>
            </div>
            <div class="card-body">
              <form method="post" action="{{ route('admin.category.store') }}" enctype="multipart/form-data">
                @csrf
                @include('backend.partial.messege')
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Enter Category Name"> 
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Description</label>
                  <textarea name="description" rows="8" cols="80" class="form-control" placeholder="Category Description Here...."></textarea>
                </div>


                <div class="form-group">
                  <label for="exampleInputPassword1">Parent Category</label>
                  <select class="form-control" name="parent_id">
                    <option value="">--Please Select Primary Category--</option>
                    @foreach($main_category as $main_cat)

                    <option value="{{ $main_cat->id }}">{{ $main_cat->name }}</option>

                    @endforeach
                    
                  </select>
                </div>
                
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Category Image</label>
                  
                  <input type="file" class="form-control" name="catimage" id="catimage">  
                </div>


                
                <button type="submit" class="btn btn-primary">Add Category</button>
              </form>
            </div>
          </div>
        </div>
        
      <!-- main-panel ends -->

@endsection
