<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\SizeRequest;
use App\Model\Size;
use Illuminate\Http\Request;
use Auth;

class SizeController extends Controller
{
    public function view(){
        $data ['alldata'] = Size::all();
        return view('backend.size.view-size', $data);
    }

    public function add(){

        return view('backend.size.add-size');
    }

    public function store(Request $request){

        //validation of form start
        $this->validate($request,[
            'name' => 'required|unique:sizes,name',

        ]);
        //validation of form end

        $data = new Size();
        $data->name = $request->name;
        $data->created_by = Auth::user()->id;

        $data->save();
        return redirect()->route('size.view')->with('success','Size inserted successfully');

    }

    public function edit($id){
        $editdata = Size::find($id);
        return view('backend.size.add-size',compact('editdata'));
    }

    public function update(SizeRequest $request,$id){
        $data =  Size::find($id);
        $data->name = $request->name;
        $data->updated_by = Auth::user()->id;

        $data->save();
        return redirect()->route('size.view')->with('success','Size updated successfully');
    }

    public function delete($id){
        $data = Size::find($id);
        $data-> delete();
        return redirect()->route('size.view')->with('success','Size deleted successfully');
    }

}
