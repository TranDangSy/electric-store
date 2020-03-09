<?php

namespace App\Http\Controllers;
use App\Category;
use App\Brand;
use App\Product;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $products = Product::paginate(6);
        $productPay = Product::where('pay','>=',2)->get();
        return view('home.index', compact('products','productPay'));
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
