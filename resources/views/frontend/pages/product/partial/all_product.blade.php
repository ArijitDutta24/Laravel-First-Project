<div class="row">

					@foreach($products as $product)
								
					<div class="col-md-4">
						<div class="card">
						@php $i=1; @endphp
						@foreach($product->images as $image)
						@if($i>0)
						@if(strrchr($image->image,'Main_'))
						  	<img class="card-img-top feature-img" src="{{ asset('images/'. $image->image) }}" alt="Card image">
						@endif
						@endif
						<!-- @php $i++; @endphp -->
						@endforeach
						  <div class="card-body">
						    <h4 class="card-title">{{ $product->title }}</h4>
						    <p class="card-text">Rs. {{ $product->price }}/-</p>
						    <a href="#" class="btn btn-outline-primary">Add To Cart</a>
						  </div>
						</div>
					</div>

					@endforeach 
</div>

<div class="mt-4 pagination">
	{{ $products->links() }}
</div>