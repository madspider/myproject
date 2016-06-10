<div class="slider1">
	@foreach ( $category->getProducts() as $product)
	<div class="slide">
		<div class="hovereffect thumbnail">
			<img class="img-responsive"
				src="{{$product->directory}}/{{$product->image_name}}" alt="">
			<div class="overlay">
				<h2>
					{{$product->product_name}}</br>
				</h2>
				<a class="info" href="#">link here</a>
			</div>
		</div>
	</div>
	@endforeach
</div>