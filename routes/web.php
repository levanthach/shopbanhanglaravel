<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// FRONT-END
Route::get('/', 'HomeController@index' );
Route::get('trang-chu', 'HomeController@index' );
Route::post('tim-kiem', 'HomeController@search' );

// Danh muc san pham trang chu
Route::get('danh-muc-san-pham/{category_id}', 'CategoryProducts@show_category_home' );
Route::get('thuong-hieu-san-pham/{brand_id}', 'BrandProduct@show_brand_home' );
Route::get('chi-tiet-san-pham/{product_id}', 'ProductController@show_details' );



// BACK-END
Route::get('admin', 'AdminController@index' );
Route::get('dashboard', 'AdminController@showDashboard' );
Route::get('logout', 'AdminController@logout' );
Route::post('admin_dashboard', 'AdminController@dashboard' );

//Category Product
Route::get('add-category-product', 'CategoryProducts@add_category_product' );
Route::get('all-category-product', 'CategoryProducts@all_category_product' );
Route::get('active-category-product/{cate_product_id}', 'CategoryProducts@active_category_product' );
Route::get('unactive-category-product/{cate_product_id}', 'CategoryProducts@unactive_category_product' );
Route::get('edit-category-product/{cate_product_id}', 'CategoryProducts@edit_category_product' );
Route::get('delete-category-product/{cate_product_id}', 'CategoryProducts@delete_category_product' );
Route::post('save-category-product', 'CategoryProducts@save_category_product' );
Route::post('update-category-product/{cate_product_id}', 'CategoryProducts@update_category_product' );

// Brand Product 
Route::get('add-brand-product', 'BrandProduct@add_brand_product' );
Route::get('all-brand-product', 'BrandProduct@all_brand_product' );
Route::get('active-brand-product/{brand_product_id}', 'BrandProduct@active_brand_product' );
Route::get('unactive-brand-product/{brand_product_id}', 'BrandProduct@unactive_brand_product' );
Route::get('edit-brand-product/{brand_product_id}', 'BrandProduct@edit_brand_product' );
Route::get('delete-brand-product/{brand_product_id}', 'BrandProduct@delete_brand_product' );
Route::post('save-brand-product', 'BrandProduct@save_brand_product' );
Route::post('update-brand-product/{brand_product_id}', 'BrandProduct@update_brand_product' );

// Product
Route::get('add-product', 'ProductController@add_product' );
Route::get('all-product', 'ProductController@all_product' );
Route::get('active-product/{product_id}', 'ProductController@active_product' );
Route::get('unactive-product/{product_id}', 'ProductController@unactive_product' );
Route::get('edit-product/{product_id}', 'ProductController@edit_product' );
Route::get('delete-product/{product_id}', 'ProductController@delete_product' );
Route::post('save-product', 'ProductController@save_product' );
Route::post('update-product/{product_id}', 'ProductController@update_product' );

//CART
Route::post('save-cart', 'CartController@save_cart' );
Route::post('update-cart-quantity', 'CartController@update_cart_quantity');
Route::get('show-cart', 'CartController@show_cart' );
Route::get('delete-to-cart/{rowId}', 'CartController@delete_to_cart' );

//Checkout
Route::get('login-checkout', 'CheckoutController@login_checkout');
Route::get('logout-checkout', 'CheckoutController@logout_checkout');
Route::post('add-customer', 'CheckoutController@add_customer');
Route::post('login-customer', 'CheckoutController@login_customer');
Route::post('order-place', 'CheckoutController@order_place');
Route::get('checkout', 'CheckoutController@checkout');
Route::get('payment', 'CheckoutController@payment');
Route::post('save-checkout-customer', 'CheckoutController@save_checkout_customer');
Route::get('payment', 'CheckoutController@payment');

//Order
Route::get('manage-order', 'CheckoutController@manage_order');
Route::get('view-order/{orderId}', 'CheckoutController@view_order');

