<?php

namespace App\Http\Controllers\backend; 

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Customer;
use App\Model\Supplier;
use App\Model\Brand;
use App\Model\Unit;
use App\Model\Category;
use App\Model\Product;
use Auth;

class ProductController extends Controller
{

    public function view(){
        $allData = Product::all();
        return view('backend.product.view-product',compact('allData'));
    }

    public function add(){
        $data['suppliers'] = Supplier::all();
        $data['brands'] = Brand::all();
        $data['units'] = Unit::all();
        $data['categories'] = Category::all();

        return view('backend.product.add-product',$data);
    }
    public function store(Request $request){
//        dd($request->all());

        $product = new Product();
        $product->supplier_id = $request->supplier_id;
        $product->unit_id = $request->unit_id;
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->product_code = $request->product_code;
        $product->product_price = $request->product_price;
        $product->product_cost = $request->product_cost;
        $product_profit= ($product->product_price-$product->product_cost);
        $product->product_profit = $product_profit;
        $profit_percent = (($product_profit/$product->product_cost)*100);
        $product->product_profit_percent = $profit_percent;
        $product->product_details = $request->product_details;
        $product->product_img = $request->product_img;
        $product->created_at = Auth::user()->id;
        $product->save();
        return redirect()->route('products.view')->with('success','Data saved successfully');
    }


    public function edit($id){
        $data['editData']  =Product::find($id);        
        $data['suppliers'] = Supplier::all();
        $data['brands'] = Brand::all();
        $data['units'] = Unit::all();
        $data['categories'] = Category::all();

        return view('backend.product.edit-product',$data);

    }

    public function update(Request $request,$id){

        $product = Product::find($id); 
        $product->supplier_id = $request->supplier_id;
        $product->unit_id = $request->unit_id;
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->product_code = $request->product_code;
        $product->product_price = $request->product_price;
        $product->product_cost = $request->product_cost;
        $product_profit= ($product->product_price-$product->product_cost);
        $product->product_profit = $product_profit;
        $profit_percent = (($product_profit/$product->product_cost)*100);
        $product->product_profit_percent = $profit_percent;
        $product->product_details = $request->product_details;
        $product->product_img = $request->product_img;
        $product->created_at = Auth::user()->id;
        $product->save();
        return redirect()->route('products.view')->with('success','Data updated successfully');

    }

    public function delete($id){

        $product = Product::find($id);
        $product->delete();
        return redirect()->route('products.view')->with('success','Data deleted successfully');

    }



}
