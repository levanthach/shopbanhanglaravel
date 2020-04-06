<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use Cart;
use App\Htttp\Request as HttpRequest;
use Illuminate\Support\Facades\Redirect;
session_start();

class CheckoutController extends Controller
{
    public function login_checkout(){
    	$cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '1')->orderby('brand_id', 'desc')->get();
   		return view('page.checkout.login_checkout')->with('cate', $cate_product)->with('brand', $brand_product);
    }

    public function add_customer(Request $request){
    	$data = array();
    	$data['customer_name'] = $request->customer_name;
    	$data['customer_email'] = $request->customer_email;
    	$data['customer_password'] = md5($request->customer_password);
    	$data['customer_phone'] = $request->customer_phone;

    	$customer_id = DB::table('tbl_customers')->insertGetId($data);
    	Session::put('customer_id', $customer_id);
    	Session::put('customer_name', $request->customer_name);
    	return redirect('/checkout');
    }

    public function checkout(){
    	$cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '1')->orderby('brand_id', 'desc')->get();
   		return view('page.checkout.show_checkout')->with('cate', $cate_product)->with('brand', $brand_product);
    	
    }

    public function save_checkout_customer(Request $request){
        $data = array();
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['shipping_address'] = $request->shipping_address;
        $data['shipping_notes'] = $request->shipping_notes;

        $shipping_id = DB::table('tbl_shipping')->insertGetId($data);
        Session::put('shipping_id', $shipping_id);
        return redirect('/payment');
    }

    public function payment(){
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '1')->orderby('brand_id', 'desc')->get();
        return view('page.checkout.payment')->with('cate', $cate_product)->with('brand', $brand_product);
    }
    public function logout_checkout(){
        Session::flush();
        return Redirect::to('login-checkout');
    }

    public function login_customer(Request $request){
        $email = $request->email_account;
        $password = md5($request->password_account);
        $result = DB::table('tbl_customers')->where('customer_email', $email)->where('customer_password', $password)->first();
        if($result){
            Session::put('customer_id', $result->customer_id);
            return Redirect::to('/checkout');
        }
        else {
            return Redirect::to('/login-checkout');
        }
    }

    public function order_place(Request $request){
        //Insert payment
        $data = array();
        $data['payment_method'] = $request->payment_option;
        $data['payment_status'] = 'Đang chờ xử lý';
        $payment_id = DB::table('tbl_payment')->insertGetId($data);

        //Insert order
        $order_data = array();
        $order_data['customer_id'] = Session::get('customer_id');
        $order_data['shipping_id'] = Session::get('shipping_id');
        $order_data['payment_id'] = $payment_id;
        $order_data['order_total'] = Cart::total();
        $order_data['order_status'] = 'Đang chờ xử lý';;
        $order_id = DB::table('tbl_order')->insertGetId($order_data);


        //Insert order_details
        $content = Cart::content();
        foreach($content as $v_content) {
            $order_d_data['order_id'] = $order_id;
            $order_d_data['product_id'] = $v_content->id;
            $order_d_data['product_name'] = $v_content->name;
            $order_d_data['product_price'] = $v_content->price;
            $order_d_data['product_sales_quantity'] = $v_content->qty;
            DB::table('tbl_order_details')->insert($order_d_data);
        }

        if($data['payment_method'] == 1){
            echo "Thanh toán ATM";
        }
        elseif($data['payment_method'] == 2){
            Cart::destroy();
            $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'desc')->get();
            $brand_product = DB::table('tbl_brand')->where('brand_status', '1')->orderby('brand_id', 'desc')->get();
            return view('page.checkout.handcash')->with('cate', $cate_product)->with('brand', $brand_product);
        }
        else {
            echo "Thẻ ghi nợ";
        }
    }

    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }
        else {
            return Redirect::to('admin')->send();
        }
    }

    public function manage_order(){
        $this->AuthLogin();
        $all_order = DB::table('tbl_order')->join('tbl_customers','tbl_customers.customer_id', 'tbl_order.customer_id')
        ->select('tbl_order.*', 'tbl_customers.customer_name')
        ->orderBy('tbl_order.order_id')->get();
        $manager_order = view('admin.manage_order')->with('all_order', $all_order);
        return view('admin_layout')->with('admin.manage_order', $manager_order);
    }

    public function view_order($orderId){
        $this->AuthLogin();
        $order_by_id = DB::table('tbl_order')
        ->join('tbl_customers','tbl_customers.customer_id', 'tbl_order.customer_id')
        ->join('tbl_shipping','tbl_shipping.shipping_id', 'tbl_order.shipping_id')
        ->join('tbl_order_details','tbl_order_details.order_id', 'tbl_order.order_id')
        ->select('tbl_order.*', 'tbl_customers.*', 'tbl_shipping.*', 'tbl_order_details.*')->where('tbl_order.order_id', $orderId)->get();
        // echo '<pre>';
        // print_r($order_by_id);
        // echo '</pre>';
        $manager_order_by_id = view('admin.view_order')->with('order_by_id', $order_by_id);
        return view('admin_layout')->with('admin.view_order', $manager_order_by_id);
    }
}
