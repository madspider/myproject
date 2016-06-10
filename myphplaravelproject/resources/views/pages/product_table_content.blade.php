<table
	class="tablesorter table table-striped table-bordered table-hover"
	id="tblproductlist">
	<thead>
		<tr>
			<th>ID</th>
			<th>Tên Sản Phẩm</th>
			<th>Mô Tả</th>
			<th>Giá Bán</th>
			<th>Giá Cũ (Nếu có)</th>
			<th>Số lượng</th>
			<th>Loại Sản Phẩm</th>
			<th>Avatar</th>
			<th>Ngày Tạo</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($products as $product)
		<tr>
			<td class="product_id">{{$product->product_id}}</td>
			<td class="product_name">{{$product->product_name}}</td>
			<td class="description">{{$product->description}}</td>
			<td class="current_price">{{$product->current_price}}</td>
			<td class="old_price">{{$product->old_price}}</td>
			<td class="amount">{{$product->amount}}</td>
			<td class="category_name">{{$product->getCategory()[0]['category_name']}}</td>
			<td class="image_id">{{$product->image_id}}</td>
			<td class="created_at">{{$product->created_at}}</td>
		</tr>
		@endforeach
	</tbody>
</table>
{{ $products->links() }}
