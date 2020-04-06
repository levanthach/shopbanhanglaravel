@extends('admin_layout')
@section('admin_content')
<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
				Thêm danh mục thương hiệu
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
					<form role="form" method="post" action="{{ URL::to('save-brand-product') }}">
						{{ csrf_field() }}
						<div class="form-group">
							<label for="exampleInputEmail1">Tên thương hiệu</label>
							<input type="text" class="form-control" id="exampleInputEmail1" name="brand_product_name" placeholder="Tên thương hiệu">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Mô tả thương hiệu</label>
							<textarea style="resize: none;" rows="8" class="form-control"  name="brand_product_desc" id="exampleInputPassword1" placeholder="Mô tả thương hiệu"></textarea>
						</div>
						<div class="form-group">
	                        <select class="form-control m-bot15" name="brand_product_status">
	                            <option value="1">Hiện</option>
	                            <option value="0">Ẩn</option>
	                        </select>
	                    </div>
						<button type="submit" name="add_brand_product" class="btn btn-info">Thêm thương hiệu</button>
					</form>
				</div>

			</div>
		</section>
	</div>
</div>
@endsection