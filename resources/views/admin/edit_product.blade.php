@extends('admin_layout')
@section('admin_content')
<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
				Cập nhật sản phẩm 
			</header>
			<div class="panel-body">
				<div class="position-center">
					<?php 
						$message = Session::get('message');
						if($message){
							echo '<p style="color: red; font-weight:bold">' .$message .'</p>';
							Session::put('message',null);
						}
					?>
					@foreach ($edit_product as $key => $pro)
						<form role="form" method="post" action="{{ URL::to('/update-product/' .$pro->product_id) }}" enctype="multipart/form-data">
							{{ csrf_field() }}
							<div class="form-group">
								<label for="exampleInputName">Tên sản phẩm</label>
								<input type="text" class="form-control" id="exampleInputEmail1" name="product_name" value="{{ $pro->product_name }}">
							</div>
							<div class="form-group">
								<label for="exampleInputPrice">Giá sản phẩm</label>
								<input type="text" class="form-control" id="exampleInputEmail1" name="product_price" value="{{ $pro->product_price }}">
							</div>
							<div class="form-group">
								<label for="exampleInputImage">Hình ảnh</label>
								<input type="file" class="form-control" id="exampleInputEmail1" name="product_image">
								<img src="{{ URL::to('public/uploads/product/'.$pro->product_image )}}" width="100" height="100">
							</div>
							<div class="form-group">
								<label for="exampleInputDesc">Mô tả sản phẩm</label>
								<textarea style="resize: none;" rows="8" class="form-control"  name="product_desc" id="exampleInputPassword1">{{ $pro->product_desc }}</textarea>
							</div>
								<div class="form-group">
								<label for="exampleInputContent">Nội dung sản phẩm</label>
								<textarea style="resize: none;" rows="8" class="form-control"  name="product_content" id="exampleInputPassword1">{{ $pro->product_content }}</textarea>
							</div>
							
							<div class="form-group">
								<label for="exampleInputCate">Danh mục sản phẩm</label>
		                        <select class="form-control m-bot15" name="category_product">
		                        	@foreach ($cate_product as $key => $value)
		                        		@if ($value->category_id == $pro->category_id)
		                        			<option selected value="{{ $value->category_id }}">{{ $value->category_name }}</option>
		                        		@else
		                        			<option selected value="{{ $value->category_id }}">{{ $value->category_name }}</option>
		                        		@endif
		                        		 
		                        	@endforeach
		                        </select>
		                    </div>

		                    <div class="form-group">
								<label for="exampleInputBrand">Thương hiệu sản phẩm</label>
		                        <select class="form-control m-bot15" name="brand_product">
		                        	@foreach ($brand_product as $key => $value)
		                        		@if ($value->brand_id == $pro->brand_id)
		                        			<option selected value="{{ $value->brand_id }}">{{ $value->brand_name }}</option>
		                        		@else
		                        			<option value="{{ $value->brand_id }}">{{ $value->brand_name }}</option>
		                        		@endif
		                        	@endforeach
		                        </select>
		                    </div>
		                   
							<div class="form-group">
								<label for="exampleInputStatus">Hiển thị</label>
		                        <select class="form-control m-bot15" name="product_status">
		                            <option value="1">Hiện</option>
		                            <option value="0">Ẩn</option>
		                        </select>
		                    </div>
							<button type="submit" name="all_product" class="btn btn-info">Cập nhật sản phẩm</button>
						</form>
					@endforeach
				</div>

			</div>
		</section>
	</div>
</div>
@endsection