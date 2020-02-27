<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    function __construct()
    {
        $this->middleware('checklevel')->only(['destroy']);
        $this->middleware('checklevel2')->only(['update', 'destroy']);
    }
    
    public function index()
    {
        $customers = Customer::all();

        return view('admin.customer.index', compact('customers'));
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
        //
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
