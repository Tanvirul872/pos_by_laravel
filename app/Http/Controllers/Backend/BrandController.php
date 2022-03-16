<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Model\Brand;
use Illuminate\Http\Request;
use Auth;

class BrandController extends Controller
{

    public function view(){
        $allData = Brand::all();
        return view('backend.brand.view-brand',compact('allData'));
    }

    public function add(){
        return view('backend.brand.add-brand');
    }
    public function store(Request $request){
        $brand = new Brand();
        $brand->name = $request->name;
        $brand->created_at = Auth::user()->id;
        $brand->save();
        return redirect()->route('brands.view')->with('success','Data saved successfully');
    }


    public function edit($id){
        $editData =Brand::find($id);
        return view('backend.brand.edit-brand',compact('editData'));

    }

    public function update(Request $request,$id){

        $brand = Brand::find($id);
        $brand->name = $request->name;
        $brand->updated_by = Auth::user()->id;
        $brand->save();
        return redirect()->route('brands.view')->with('success','Data updated successfully');

    }

    public function delete($id){

        $brand = Brand::find($id);
        $brand->delete();
        return redirect()->route('brands.view')->with('success','Data deleted successfully');

    }


}
