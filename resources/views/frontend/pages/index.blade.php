@extends('frontend.layouts.master')


@section('content')

<!-- Sidebar + Content -->

			<div class="container margin-top-20">
				<div class="row">
					<div class="col-md-4">
					@include('frontend.partial.product-sidebar')
					</div>

					<div class="col-md-8">
						<div class="widget">
							<h3>Feature Product</h3>
							 @include('frontend.pages.product.partial.all_product')
						</div>
					</div>
				</div>
			</div>	

<!-- End Sidebar + Content -->

@endsection