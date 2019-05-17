@extends('backend.layout.master')

@section('content')

<div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
            <div class="card-header">
              <h3>Manage Products</h3>
              <a href="{{ route('admin.product.create') }}" style="float: right;">New Product<i class="mdi mdi-plus"></i></a>
            </div>
            <div class="card-body">
              @include('backend.partial.messege')
              
                
              
              <table class="table table-hover table-striped">
                <tr>
                  <th>Sl. No.</th>
                  <th>Product Title</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Action</th>
                </tr>
                @php $i=0; @endphp
                
                @foreach($products as $product)
                @php $i++; @endphp
                <tr>
                  <td>{{ $i }}</td>
                  <td>{{ $product->title }}</td>
                  <td>{{ $product->price }}</td>
                  <td>{{ $product->quantity }}</td>
                  <td>
                    <a href="{{ route('admin.product.edit', $product->id) }}" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <!-- <a href="{{ route('admin.product.delete', $product->id) }}" ><i class="fa fa-trash-o" aria-hidden="true"></i></a> -->
                    <a href="#deleteModal{{ $product->id}}" data-toggle="modal"><i class="fa fa-trash-o" aria-hidden="true"></i></a>

                    @include('backend.partial.product.prod_del_modal')

                  </td>
                </tr>
                @endforeach
              </table>
            </div>
          </div>
        </div>
        
      <!-- main-panel ends -->

@endsection
