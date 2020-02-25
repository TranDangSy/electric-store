<?php

namespace App\Http\Controllers;

use App\Bill;
use App\Bill_detail;
use App\Exports\BillsExport;
use Illuminate\Http\Request;
use App\Product;
use Maatwebsite\Excel\Facades\Excel;

class BillController extends Controller
{
    function __construct()
    {
        $this->middleware('checklevel')->only(['destroy']);
        $this->middleware('checklevel2')->only(['update', 'destroy']);
    }
    
    public function index()
    {
        $bills = Bill::all();

        return view('admin.bill.index', compact('bills'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    { 
        $bill_details = Bill_detail::where('bill_id',$id)->get();
        $bill = Bill::find($id);
        
        return view('admin.bill.show', compact('bill_details', 'bill'));
    }

    public function destroy($id)
    {
        //
    }

    public function updatebill(Request $res, $id)
    {
        $bill = Bill::find($id);
        $bill_details = Bill_detail::where('bill_id',$id)->get();
        
        foreach($bill_details as $item)
        {
            $product = Product::where('id', '=' , $item->product_id)->first();
            $bill->status = $res->status;
            
            switch($res->status){
                case 0:
                    $res->status = 0;
                break;
                case 1:
                    $res->status = 1;
                break;
                case 2:
                    $res->status = 2;
                    $product->quantity = $product->quantity - $item->quantity;
                    $product->save();
                break;
            }
            $bill->save();
        }
        return back();
    }
}
