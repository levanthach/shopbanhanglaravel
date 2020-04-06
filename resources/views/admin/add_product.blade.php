@extends('admin_layout')
@section('admin_content')
<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
				Thêm sản phẩm 
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
					<form role="form" method="post" action="{{ URL::to('save-product') }}" enctype="multipart/form-data">
						{{ csrf_field() }}
						<div class="form-group">
							<label for="exampleInputName">Tên sản phẩm</label>
							<input type="text" class="form-control" id="exampleInputEmail1" name="product_name">
						</div>
						<div class="form-group">
							<label for="exampleInputPrice">Giá sản phẩm</label>
							<input type="text" class="form-control" id="exampleInputEmail1" name="product_price">
						</div>
						<div class="form-group">
							<label for="exampleInputImage">Hình ảnh</label>
							<input type="file" class="form-control" id="exampleInputEmail1" name="product_image">
						</div>
						<div class="form-group">
							<label for="exampleInputDesc">Mô tả sản phẩm</label>
							<textarea style="resize: none;" rows="8" class="form-control"  name="product_desc" id="exampleInputPassword1"></textarea>
						</div>
							<div class="form-group">
							<label for="exampleInputContent">Nội dung sản phẩm</label>
							<textarea style="resize: none;" rows="8" class="form-control"  name="product_content" id="exampleInputPassword1"></textarea>
						</div>
						
						<div class="form-group">
							<label for="exampleInputCate">Danh mục sản phẩm</label>
	                        <select class="form-control m-bot15" name="category_product">
	                        	@foreach ($cate_product as $key => $value)
	                        		 <option value="{{ $value->category_id }}">{{ $value->category_name }}</option>
	                        	@endforeach
	                        </select>
	                    </div>

	                    <div class="form-group">
							<label for="exampleInputBrand">Thương hiệu sản phẩm</label>
	                        <select class="form-control m-bot15" name="brand_product">
	                        	@foreach ($brand_product as $key => $value)
	                        		 <option value="{{ $value->brand_id }}">{{ $value->brand_name }}</option>
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
						<button type="submit" name="add_product" class="btn btn-info">Thêm sản phẩm</button>
					</form>
				</div>

			</div>
		</section>
	</div>
</div>
@endsection