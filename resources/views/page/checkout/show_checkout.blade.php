@extends('layouts')
@section('main-content')
	<section id="cart_items">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{ URL::to('/') }}">Trang chủ</a></li>
				  <li class="active">Thanh toán đơn hàng</li>
				</ol>
			</div>

			<div class="register-req">
				<p>(*) Làm ơn đăng ký hoặc đăng nhập để thanh toán giỏ hàng và xem lại lịch sử mua hàng</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-12 clearfix">
						<div class="bill-to">
							<p>Điền thông tin gửi hàng</p>
							<div class="form-one" style="width: 100%">
								<form action="{{ URL::to('/save-checkout-customer') }}" method="POST">
									{{ csrf_field() }}
									<input type="email" name="shipping_email" required placeholder="Email*">
									<input type="text" name="shipping_name" placeholder="Họ và tên">
									<input type="text" name="shipping_address" placeholder="Địa chỉ">
									<input type="text" name="shipping_phone" placeholder="Phone">
									<textarea name="shipping_notes"  placeholder="Ghi chú đơn hàng của bạn" rows="10"></textarea>
									<input type="submit" name="send_order" value="Gửi" class="btn btn-primary">
								</form>
							</div>
							
						</div>
					</div>
					
				</div>
			</div>
			<br><br>
			{{-- <div class="review-payment">
				<h2>Xem lại giỏ hàng</h2>
			</div>

			@php
				$content = Cart::content();
			@endphp
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Hình ảnh</td>
							<td class="description">Mô tả</td>
							<td class="price">Giá</td>
							<td class="quantity">Số lượng</td>
							<td class="total">Tổng tiền</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						@foreach ($content as $value)
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{ url('public/uploads/product/' .$value->options->image) }}" width="50" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{ $value->name }}</a></h4>
								<p>Web ID: {{ $value->id }}</p>
							</td>
							<td class="cart_price">
								<p>{{ number_format($value->price) . ' VND' }}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<form action="{{ URL::to('/update-cart-quantity') }}" method="POST">
										{{ csrf_field() }}
										<input type="hidden" name="rowId_cart" value="{{ $value->rowId }}" class="form-control">
										<input class="cart_quantity_input" type="number" name="cart_quantity" value="{{ $value->qty }}">
										<input type="submit" name="update_qty" value="Cập nhật" class="btn btn-default">
									</form>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">
									@php
										$total = $value->price * $value->qty;
										echo $total . ' VND';
									@endphp
								</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{ URL::to('/delete-to-cart/' .$value->rowId) }}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<h4 style="margin: 40px 0; font-size: 20px">Chọn hình thức thanh toán</h4>
			<div class="payment-options">
				<span>
					<label><input name="payment_option" value="bằng ATM" type="checkbox"> Trả bằng thẻ ATM</label>
				</span>
				<span>
					<label><input name="payment_option" value="tiền mặt" type="checkbox"> Nhận tiền mặt</label>
				</span>
				<span>
					<label><input name="payment_option" value="thẻ ghi nợ" type="checkbox"> Thanh toán thẻ ghi nợ</label>
				</span>
				
			</div> --}}
	</section> <!--/#cart_items-->
@endsection