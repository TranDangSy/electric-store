<?php

namespace App\Http\Controllers;

use App\Post;
use App\Product;
use App\ProductFilters;
use App\User;
use App\Bill;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Event;

class FrontendController extends Controller
{
    public function index(ProductFilters $filters)
    {
        $products = Product::filter($filters)
            ->where('status', 1)
            ->paginate(6);
        $productPay = Product::where('pay', '>=', 1)->get();

        return view('home.index', compact('products', 'productPay'));

        // $product = (new Product)->newQuery();

        // if($request->exists('price')){
        //     $product->orderBy('price', 'desc');
        // }

        // if($request->has('quantity')) {
        //     $product->where('quantity', $request->quantity);
        // }

        // return $product->get();
        // return Product::filter($filters)->get();
    }

    public function getProduct($id)
    {
        $product = Product::find($id);
        $productPay = Product::where('pay', '>=', 2)->get();

        return view('home.detai', compact('product', 'productPay'));
    }

    public function getCategory(Request $request, $id)
    {
        $products = Product::where('category_id', $id);
        $products = $products->orderBy('id', 'desc')->paginate(10);

        return view('home.detail_category', compact('products'));
    }

    public function getBrand(Request $request, $id)
    {
        $products = Product::where('brand_id', $id);
        $products = $products->orderBy('id', 'desc')->paginate(10);

        return view('home.detail_brand', compact('products'));
    }

    public function indexpost()
    {
        $posts = Post::all();

        return view('post.index', compact('posts'));
    }

    public function getPost(Request $request, $id)
    {
        $post = Post::find($id);
        Event::dispatch('post.show', $post);

        // return view('post.show', compact('post'));
        return View::make('post.show')->withPost($post);
    }

    public function searchByName(Request $request)
    {
        $products = Product::where('name', 'like', '%' . $request->value . '%')->get();

        return response()->json($products);
    }

    public function getIndexAdmin()
    {
        $orders = Bill::where('status', '=', 2)
            ->select(
                DB::raw('sum(total) as sums'),
                DB::raw("DATE_FORMAT(created_at,'%m') as monthKey")
            )
            ->whereYear('created_at', date('Y'))
            ->groupBy('monthKey')
            ->orderBy('created_at', 'ASC')
            ->get();
        $data = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

        foreach ($orders as $order) {
            $data[$order->monthKey - 1] = $order->sums;
        }
        $totalProducts = DB::table('products')->count();
        $totalCategory = DB::table('categories')->count();
        $totalUser = DB::table('users')->count();
        $totalBill = DB::table('bills')->where('status', '0')->count();
        $productPay = DB::table('products')->where('pay', '>=', 1)->count();
        $viewData = [
          
            'totalProducts' => $totalProducts,
            'totalCategory' => $totalCategory,
            'totalUser' => $totalUser,
            'totalBill' => $totalBill,
            'productPay' => $productPay,
            'data'     => json_encode($data,JSON_NUMERIC_CHECK)
        ];
        return view('admin.home.index',$viewData);
    }

    public function ajaxLike(Request $request)
    {
        if (!auth()->check()) {
            return response()->json(['failed' => 'Bạn chưa đăng nhập !']);
        }
        $product = Product::find($request->id);

        $response = Auth()->user()->toggleLike($product);

        return response()->json(['success' => $response]);
    }

    public function postProduct(Request $request)
    {
        if (!auth()->check()) {
            return response()->json(['failed' => 'Bạn chưa đăng nhập !']);
        }
        request()->validate(['rate' => 'required']);
        $product = Product::find($request->id);
        $rating = new \willvincent\Rateable\Rating;
        $rating->rating = $request->rate;
        $rating->user_id = auth()->user()->id;
        $product->ratings()->save($rating);

        return redirect()->back();
    }
}
