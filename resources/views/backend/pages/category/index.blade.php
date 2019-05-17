@extends('backend.layout.master')

@section('content')

<div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
            <div class="card-header">
              <h3>Manage Category</h3>
              <a href="{{ route('admin.category.create') }}" style="float: right;">New Category<i class="mdi mdi-plus"></i></a>
            </div>
            <div class="card-body">
              @include('backend.partial.messege')
              
                
              
              <table class="table table-hover table-striped">
                <tr>
                  <th>Sl. No.</th>
                  <th>Category Name</th>
                  <th>Category Image</th>
                  <th>Parent Category</th>
                  <th>Action</th>
                </tr>
                @php $i=0; @endphp
                @foreach($category as $cat)
                @php $i++; @endphp
                <tr>
                  <td>{{ $i }}</td>
                  <td>{{ $cat->name }}</td>
                  <td>
                    <img src="{{ asset('images/category/'.$cat->image) }}" style="width: 120px; height: 80px;"></td>
                  <td>
                    @if($cat->parent_id == NULL)
                    Primary Category
                    @else
                    {{ $cat->parent->name }}
                    @endif
                    </td>
                  <td>
                    <a href="{{ route('admin.category.edit', $cat->id) }}" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                    
                    <a href="#deleteModal{{ $cat->id}}" data-toggle="modal"><i class="fa fa-trash-o" aria-hidden="true"></i></a>

                    @include('backend.partial.category.cat_del_modal')

                  </td>
                </tr>
                @endforeach
              </table>
            </div>
          </div>
        </div>
        
      <!-- main-panel ends -->

@endsection
