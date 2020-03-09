<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Customer;
use App\Bill;
use App\Bill_detail;
use Cart;
use Brian2694\Toastr\Facades\Toastr;
use Mail;
use DB;

class CartController extends Controller
{
    public function getAddCart($id){
        $product = Product::find($id);
        $price = $product ->price;
        if($product->discount)
        {
            $price =  $price * (100 - $product->discount)/100;
        }
        if($product->quantity <= 0)
        {
            Toastr::warning('Sản phẩm đã hết hàng', 'XIN LỖI Không thành công', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }
        Cart::add(['id' => $id, 'name' => $product->name, 'qty' => 1, 
        'price' => $price, 'options' => ['image' => $product->image, 'qty_pro' => $product->quantity]]);
        
        Toastr::success('Đã thêm sản phẩm vào giỏ hàng', 'Success', ["positionClass" => "toast-top-right"]);

    	return redirect()->back();
    }

    public function getAddWishlist(Request $request, $id){
        $product = Product::find($id);
        $duplicates = Cart::instance('wishlist')->search(function ($cartItem, $rowId)use ($request)  {
            return $cartItem->id === $request->id;
        });
        if (!$duplicates->isEmpty()) {
            return redirect()->back()->with('danger','Sản phẩm đã có trong danh sách của bạn');
        }
        Cart::instance('wishlist')->add(['id' => $id, 'qty' => 1, 'name' => $product->name,
            'price' => $product->price, 'options' => ['image' => $product->image ]]);
        Toastr::success('Đã thêm sản phẩm vào danh sách wishlist', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }

    public function getShowCart(){
        $data['carts'] = Cart::content();
        
    	return view('home.cart', $data);
    }

    public function getshowWishList(){
        $wishlist = Cart::instance('wishlist')->content();

        return view('home.wishlist', compact('wishlist'));
    }

    public function getDeleteCart($id){
    	if($id =='all'){
    		Cart::destroy();
    	}else{
    		Cart::remove($id);
        }
        Toastr::warning('Đã xóa sản phẩm trong giỏ hàng', 'Delete', ["positionClass" => "toast-top-right"]);
        
    	return back();
    }

    public function getDeleteWishlist($id){
        if ($id === null) {
            return redirect()->route('wishlist');
        }

        if (array_key_exists($id, Cart::instance('wishlist')->content()->toArray())) {
            Cart::instance('wishlist')->remove($id);
        }
        return redirect()->route('wishlist');
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
        DB::beginTransaction();
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
                    $pro = Product::where('id', $item->id)->first()->quantity;
                    if($item->qty < $pro)
                    {
                        $billDetail->bill_id = $bill->id;
                        $billDetail->product_id = $item->id;
                        $billDetail->quantity = $item->qty;
                        $billDetail->price = $item->price;
                        $billDetail->save(); 
                    }
                    else
                    return redirect('/cart')->with('error','Đặt hàng không thành công, MỜI XEM LẠI SỐ LƯỢNG');
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
            $message->subject('Xác nhận đơn hàng');
            });

            DB::commit();
            
            Cart::destroy();
            return redirect('/checkout')->with('notif','Đặt hàng thành công');
        } 
        catch (Exception $e) {
            DB::rollBack();

            throw new Exception($e->getMessage());
        }
    }    
}
