<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Brand;
use App\Model\Category;
use App\Model\Product;
use App\Model\Supplier;
use App\Model\Purchase;
use App\Model\Unit;
use Illuminate\Http\Request;
use Auth;


class PurchaseController extends Controller
{

    public function view(){
        $allData = Purchase::orderby('date','desc')->orderby('id','desc')->get();
        return view('backend.purchase.view-purchase',compact('allData'));
    }

    public function add(){
        $data['suppliers'] = Supplier::all();
        $data['brands'] = Brand::all();
        $data['units'] = Unit::all();
        $data['categories'] = Category::all();
        $data['products'] = Product::all();

        return view('backend.purchase.add-purchase',$data);
    }
    public function store(Request $request){
//        dd($request->all());

        $purchase = new Purchase();
        $purchase->supplier_id = $request->supplier_id;
        $purchase->unit_id = $request->unit_id;
        $purchase->brand_id = $request->brand_id;
        $purchase->category_id = $request->category_id;
        $purchase->name = $request->name;
        $purchase->product_code = $request->product_code;
        $purchase->product_price = $request->product_price;
        $purchase->product_cost = $request->product_cost;
        $purchase_profit= ($purchase->product_price-$purchase->product_cost);
        $purchase->product_profit = $purchase_profit;
        $profit_percent = (($purchase_profit/$purchase->product_cost)*100);
        $purchase->product_profit_percent = $profit_percent;
        $purchase->product_details = $request->product_details;
        $purchase->product_img = $request->product_img;
        $purchase->created_at = Auth::user()->id;
        $purchase->save();
        return redirect()->route('purchase.view')->with('success','Data saved successfully');
    }


    public function edit($id){
        $data['editData']  =Purchase::find($id);
        $data['suppliers'] = Supplier::all();
        $data['brands'] = Brand::all();
        $data['units'] = Unit::all();
        $data['categories'] = Category::all();

        return view('backend.product.edit-product',$data);

    }

    public function update(Request $request,$id){

        $purchase = Purchase::find($id);
        $purchase->supplier_id = $request->supplier_id;
        $purchase->unit_id = $request->unit_id;
        $purchase->brand_id = $request->brand_id;
        $purchase->category_id = $request->category_id;
        $purchase->name = $request->name;
        $purchase->product_code = $request->product_code;
        $purchase->product_price = $request->product_price;
        $purchase->product_cost = $request->product_cost;
        $purchase_profit= ($purchase->product_price-$purchase->product_cost);
        $purchase->product_profit = $purchase_profit;
        $profit_percent = (($purchase_profit/$purchase->product_cost)*100);
        $purchase->product_profit_percent = $profit_percent;
        $purchase->product_details = $request->product_details;
        $purchase->product_img = $request->product_img;
        $purchase->created_at = Auth::user()->id;
        $purchase->save();
        return redirect()->route('purchase.view')->with('success','Data updated successfully');

    }

    public function delete($id){

        $purchase = Purchase::find($id);
        $purchase->delete();
        return redirect()->route('purchase.view')->with('success','Data deleted successfully');

    }


}
