<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Supplier; 
use Auth; 

class SupplierController extends Controller
{
    public function view(){
        $allData = Supplier::all(); 
        return view('backend.supplier.view-supplier',compact('allData')); 
    }

    public function add(){ 
        return view('backend.supplier.add-supplier'); 
    }
    public function store(Request $request){
         $supplier = new Supplier(); 
         $supplier->name = $request->name; 
         $supplier->mobile_no = $request->mobile_no; 
         $supplier->email = $request->email; 
         $supplier->address = $request->address; 
         $supplier->created_at = Auth::user()->id; 
         $supplier->save(); 
         return redirect()->route('suppliers.view')->with('success','Data saved successfully'); 
       }


}
