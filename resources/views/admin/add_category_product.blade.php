@extends('admin_layout')
@section('admin_content')
<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
				Thêm danh mục sản phẩm 
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
					<form role="form" method="post" action="{{ URL::to('save-category-product') }}">
						{{ csrf_field() }}
						<div class="form-group">
							<label for="exampleInputEmail1">Tên danh mục</label>
							<input type="text" class="form-control" id="exampleInputEmail1" name="category_product_name" placeholder="Tên danh mục">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Mô tả danh mục</label>
							<textarea style="resize: none;" rows="8" class="form-control"  name="category_product_desc" id="exampleInputPassword1" placeholder="Mô tả danh mục"></textarea>
						</div>
						<div class="form-group">
	                        <select class="form-control m-bot15" name="category_product_status">
	                            <option value="1">Hiện</option>
	                            <option value="0">Ẩn</option>
	                        </select>
	                    </div>
						<button type="submit" name="add_category_product" class="btn btn-info">Thêm danh mục</button>
					</form>
				</div>

			</div>
		</section>
	</div>
</div>
@endsection