<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Model\Brand;
use Illuminate\Http\Request;
use Auth;
Use DB;

class BrandController extends Controller
{

    public function view(){
        $data ['alldata'] = Brand::all();
        return view('backend.brand.view-brand', $data);
    }

    public function add(){

        return view('backend.brand.add-brand');
    }

    public function store(Request $request){

        //validation of form start
        $this->validate($request,[
            'name' => 'required|unique:brands,name',

        ]);
        //validation of form end

        $data = new Brand();
        $data->name = $request->name;
        $data->created_by = Auth::user()->id;

        $data->save();
        return redirect()->route('brand.view')->with('success','Brand inserted successfully');

    }

    public function edit($id){
        $editdata = Brand::find($id);
        return view('backend.brand.add-brand',compact('editdata'));
    }

    public function update(BrandRequest $request,$id){
        $data =  Brand::find($id);
        $data->name = $request->name;
        $data->updated_by = Auth::user()->id;

        $data->save();
        return redirect()->route('brand.view')->with('success','Brand updated successfully');
    }



    public function delete($id){
        $data = Brand::find($id);
        $data-> delete();
        return redirect()->route('brand.view')->with('success','Brand deleted successfully');
    }

}
