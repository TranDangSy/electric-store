<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Product;
use Cart;

class CartController extends Controller
{
    public function getAddCart($id){
    	$product = Product::find($id);
    	Cart::add(['id' => $id, 'name' => $product->name, 'qty' => 1, 'price' =>$product->price, 'options' => ['img' => $product->image]]);
    	return redirect('cart/');
    }

    public function getShowCart(){

    	$data['carts'] = Cart::content();
    	return view('home.cart',$data);
    }

    public function getDeleteCart($id){
    	if($id =='all'){
    		Cart::destroy();
    	}else{
    		Cart::remove($id);
        }
        
    	return back();
    }

    public function getUpdateCart(Request $request){
        Cart::update($request->rowId, $request->qty);
    }
}