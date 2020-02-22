<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Product;
use App\Customer;
use App\Bill;
use App\Bill_detail;
use Cart;
use Brian2694\Toastr\Facades\Toastr;
use Mail;

class CartController extends Controller
{
    public function getAddCart($id){
    	$product = Product::find($id);
        Cart::add(['id' => $id, 'name' => $product->name, 'qty' => 1, 
        'price' => $product->price, 'options' => ['image' => $product->image, 'qty_pro' => $product->quantity]]);
        
        Toastr::success('Đã thêm sản phẩm vào giỏ hàng', 'Success', ["positionClass" => "toast-top-right"]);

    	return redirect()->back();
    }

    public function getShowCart(){
        $data['carts'] = Cart::content();
        
    	return view('home.cart', $data);
    }

    public function getDeleteCart($id){
    	if($id =='all'){
    		Cart::destroy();
    	}else{
    		Cart::remove($id);
        }
        Toastr::warning('Đã xóa sản phẩm vào giỏ hàng', 'Delete', ["positionClass" => "toast-top-right"]);
        
    	return back();
    }

    public function getUpdateCart(Request $request){
        Cart::update($request->rowId, $request->qty);
    }

    public function getCheckOut(){
        $this->data['cart'] = Cart::content();
        $this->data['total'] = Cart::total();

        return view('home.checkout', $this->data);
    }

    public function postCheckOut(Request $request) {
        $cartInfor = Cart::content();
        
        try {
            // save
            $customer = new Customer;
            $customer->name = $request->fullName;
            $customer->email = $request->email;
            $customer->address = $request->address;
            $customer->phone_number = $request->phoneNumber;
            $customer->note = $request->note;
            $customer->save();

            $bill = new Bill;
            $bill->customer_id = $customer->id;
            $bill->date_order = date('Y-m-d H:i:s');
            $bill->total = str_replace(',', '', Cart::total());
            $bill->note = $request->note;
            $bill->save();

            if (count($cartInfor) >0) {
                foreach ($cartInfor as $key => $item) {
                    $billDetail = new Bill_detail;
                    $billDetail->bill_id = $bill->id;
                    $billDetail->product_id = $item->id;
                    $billDetail->quantity = $item->qty;
                    $billDetail->price = $item->price;
                    $billDetail->save();
                }
            }
            $data['infor'] = $request->all();
            $email = $request->email;
            $data['carttotal'] = Cart::total();
            $data['cartinfor'] = Cart::content();
            Mail::send('home.email', $data, function($message) use($email)
            {
            $message->from('dangsy23498@gmail.com','binhansiCompanny');
            $message->to($email, $email);
            $message->cc('nvthuan45@gmail.com', 'Thuần Đz');
            $message->subject('Xác nhận bill');
            });
            Cart::destroy();
            return redirect('/checkout')->with('notif','Thanh toán thành công');
        } 
        catch (Exception $e) {
            echo $e->getMessage();
        }
    }    
}
