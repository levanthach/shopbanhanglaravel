@extends('admin_layout')
@section('admin_content')
<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
				Sửa danh mục thương hiệu
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
						@foreach ($edit_brand_product as $key => $edit_value)
					<form role="form" method="post" action="{{ URL::to('/update-brand-product/' .$edit_value->brand_id)}}">
						{{ csrf_field() }}
					
						<div class="form-group">
							<label for="exampleInputEmail1">Tên thương hiệu</label>
							<input type="text" value="{{ $edit_value->brand_name }}" class="form-control" id="exampleInputEmail1" name="brand_product_name" placeholder="Tên thương hiệu">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Mô tả thương hiệu</label>
							<textarea  style="resize: none;" rows="8" class="form-control"  name="brand_product_desc" id="exampleInputPassword1" placeholder="Mô tả thương hiệu">{{ $edit_value->brand_desc }}</textarea>
						</div>
						<button type="submit" name="add_brand_product" class="btn btn-info">Sửa thương hiệu</button>
						@endforeach
					</form>
				</div>

			</div>
		</section>
	</div>
</div>
@endsection