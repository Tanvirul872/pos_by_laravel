<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Model\Customer;
use Auth;

class CustomerController extends Controller
{

    public function view(){
        $allData = Customer::all();
        return view('backend.customer.view-customer',compact('allData'));
    }

    public function add(){
        return view('backend.customer.add-customer');
    }
    public function store(Request $request){
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->mobile_no = $request->mobile_no;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->created_at = Auth::user()->id;
        $customer->save();
        return redirect()->route('customers.view')->with('success','Data saved successfully');
    }


    public function edit($id){
        $editData =Customer::find($id);
        return view('backend.customer.edit-customer',compact('editData'));

    }

    public function update(Request $request,$id){

        $customer = Customer::find($id);
        $customer->name = $request->name;
        $customer->mobile_no = $request->mobile_no;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->updated_by = Auth::user()->id;
        $customer->save();
        return redirect()->route('customers.view')->with('success','Data updated successfully');

    }

    public function delete($id){

        $customer = Customer::find($id);
        $customer->delete();
        return redirect()->route('customers.view')->with('success','Data deleted successfully');

    }

}
