<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ColorRequest;
use App\Model\Color;
use Illuminate\Http\Request;
use Auth;

class ColorController extends Controller
{

    public function view(){
        $data ['alldata'] = Color::all();
        return view('backend.color.view-color', $data);
    }

    public function add(){

        return view('backend.color.add-color');
    }

    public function store(Request $request){

        //validation of form start
        $this->validate($request,[
            'name' => 'required|unique:colors,name',

        ]);
        //validation of form end

        $data = new Color();
        $data->name = $request->name;
        $data->created_by = Auth::user()->id;

        $data->save();
        return redirect()->route('color.view')->with('success','Color inserted successfully');

    }

    public function edit($id){
        $editdata = Color::find($id);
        return view('backend.color.add-color',compact('editdata'));
    }

    public function update(ColorRequest $request,$id){
        $data =  Color::find($id);
        $data->name = $request->name;
        $data->updated_by = Auth::user()->id;

        $data->save();
        return redirect()->route('color.view')->with('success','Color updated successfully');
    }

    public function delete($id){
        $data = Color::find($id);
        $data-> delete();
        return redirect()->route('color.view')->with('success','Color deleted successfully');
    }

}
