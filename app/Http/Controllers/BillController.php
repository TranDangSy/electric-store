<?php

namespace App\Http\Controllers;

use App\Bill;
use App\Bill_detail;
use Illuminate\Http\Request;
use App\Product;

class BillController extends Controller
{
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

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
