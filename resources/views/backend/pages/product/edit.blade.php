@extends('backend.layout.master')

@section('content')

<div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
            <div class="card-header">
              <h3>Edit Product</h3>
            </div>
            <div class="card-body">
              <form method="post" action="{{ route('admin.product.update', $product->id) }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                @include('backend.partial.messege')
                <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                  <input type="text" class="form-control" name="title" id="exampleInputEmail1" placeholder="Enter Product Title" value="{{ $product->title }}"> 
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Description</label>
                  <textarea name="description" rows="8" cols="80" class="form-control" placeholder="Product Description Here....">{{ $product->description }}</textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Price</label>
                  <input type="number" class="form-control" name="price" id="exampleInputEmail1" placeholder="Product Price" value="{{ $product->price }}"> 
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Quantity</label>
                  <input type="number" class="form-control" name="qty" id="exampleInputEmail1" placeholder="Product Quantity" value="{{ $product->quantity }}"> 
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Product Image</label>
                  <div class="row">
                    <div class="col-md-4">
                      <input type="file" class="form-control" name="productimage" id="productimage">  
                    </div>
                  </div>
                   
                </div>


                <div class="form-group">
                  <label for="exampleInputEmail1">More Product Images</label>
                  <div class="row">
                    <div class="col-md-4">
                      <input type="file" class="form-control" name="product_image[]" id="product_image" multiple>  
                    </div>
                  </div>
                   
                </div>
                
                <button type="submit" class="btn btn-primary">Update Product</button>
              </form>
            </div>
          </div>
        </div>
        
      <!-- main-panel ends -->

@endsection
