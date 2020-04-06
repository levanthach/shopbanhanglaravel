@extends('layouts')
@section('main-content')

<section id="cart_items">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{ URL::to('/') }}">Trang chủ</a></li>
				  <li class="active">Giỏ hàng của bạn</li>
				</ol>
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
	</section> <!--/#cart_items-->

	<section id="do_action">
	
				<div class="col-sm-6 pull-right">
					<div class="total_area">
						<ul>
							<li>Tổng <span>{{ Cart::total() . ' VND' }}</span></li>
							<li>Thuế <span>{{ Cart::tax() . ' VND' }}</span></li>
							<li>Phí vận chuyển <span>Free</span></li>
							<li>Thành tiền <span>{{ Cart::subtotal() . 'VND' }}</span></li>
						</ul>
						 <?php 
                            $customer_id = Session::get('customer_id');
                            if($customer_id != NULL){   
                        ?>
                        <a class="btn btn-default check_out pull-right" href="{{ URL::to('/checkout') }}">Thanh toán</a>
                         <?php 
                          }else{  
                         ?>
                         <a class="btn btn-default check_out pull-right" href="{{ URL::to('login-checkout') }}">Thanh toán</a>
                         <?php } ?>
							
					</div>
				</div>
			</div>
	</section><!--/#do_action-->
@endsection 