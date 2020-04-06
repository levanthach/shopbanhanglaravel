@extends('admin_layout')
@section('admin_content')
<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
				Sửa danh mục sản phẩm 
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
						@foreach ($edit_category_product as $key => $edit_value)
					<form role="form" method="post" action="{{ URL::to('/update-category-product/' .$edit_value->category_id)}}">
						{{ csrf_field() }}
					
						<div class="form-group">
							<label for="exampleInputEmail1">Tên danh mục</label>
							<input type="text" value="{{ $edit_value->category_name }}" class="form-control" id="exampleInputEmail1" name="category_product_name" placeholder="Tên danh mục">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Mô tả danh mục</label>
							<textarea  style="resize: none;" rows="8" class="form-control"  name="category_product_desc" id="exampleInputPassword1" placeholder="Mô tả danh mục">{{ $edit_value->category_desc }}</textarea>
						</div>
						<button type="submit" name="add_category_product" class="btn btn-info">Sửa danh mục</button>
						@endforeach
					</form>
				</div>

			</div>
		</section>
	</div>
</div>
@endsection