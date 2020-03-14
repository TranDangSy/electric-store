<?php

namespace App\Http\Controllers;

use App\Post;
use App\Product;
use App\ProductFilters;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(ProductFilters $filters)
    {
        $products =Product::filter($filters)->get();
        $productPay = Product::where('pay','>=',2)->get();
        return view('home.index', compact('products','productPay'));
        
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
        $productPay = Product::where('pay','>=',2)->get();

        return view('home.detai', compact('product', 'productPay'));
    }

    public function getCategory(Request $request, $id)
    {
        $products = Product::where('category_id', $id);
        $products = $products->orderBy('id','desc')->paginate(10);

        return view('home.detail_category',compact('products'));
    }

    public function getBrand(Request $request, $id)
    {
        $products = Product::where('brand_id', $id);
        $products = $products->orderBy('id','desc')->paginate(10);
        
        return view('home.detail_brand',compact('products'));
    }

    public function indexpost()
    {
        $posts = Post::all();

        return view('post.index', compact('posts'));
    }

    public function getPost(Request $request, $id)
    {
        $post = Post::find($id);

        return view('post.show', compact('post'));
    }

    public function searchByName(Request $request)
    {
        $products = Product::where('name', 'like', '%' . $request->value . '%')->get();

        return response()->json($products);
    }

    public function getIndexAdmin()
    {
        $range = \Carbon\Carbon::now()->subMonths(12);
        $orderMonth = DB::table('bills')
                    ->select(DB::raw('month(date_order) as getMonth'), DB::raw('COUNT(*) as value'))
                    ->where('date_order', '>=', $range)
                    ->groupBy('getMonth')
                    ->orderBy('getMonth', 'ASC')
                    ->get();
        $totalProducts = DB::table('products')->count();
        $totalCategory = DB::table('categories')->count();
        $totalUser = DB::table('users')->count();
        $totalBill = DB::table('bills')->where('status', '0')->count();

        return view('admin.home.index', compact('orderMonth', 'totalProducts', 'totalCategory', 'totalUser', 'totalBill'));
    }
}
