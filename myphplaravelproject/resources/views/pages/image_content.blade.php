<div class="slider1">
	@foreach ( $product->getImages() as $image)
	<div class="slide">
		<div class="hovereffect thumbnail">
			<img class="img-responsive"
				src="{{$image['directory']}}/{{$image['image_name']}}" alt="">
			<div class="overlay">
				<h2>
					{{$image['image_name']}}</br>abcxyz
				</h2>
				<a class="info" href="#">link here</a>
			</div>
		</div>
	</div> @endforeach
</div>