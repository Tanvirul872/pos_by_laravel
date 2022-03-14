<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Slider;

class SliderController extends Controller
{
    public function view(){
        $data ['alldata'] = Slider::all();
        return view('backend.slider.view-slider', $data);
    }

    public function add(){

        return view('backend.slider.add-slider');
    }

    public function store(Request $request){

        //validation of form start
        $this->validate($request,[
            'title' => 'required',
            'description' => 'required',
            'btn_link' => 'required',

        ]);
        //validation of form end

        $data = new Slider();
        $data->title = $request->title;
        $data->main_title = $request->main_title;
        $data->description = $request->description;
        $data->btn_title = $request->btn_title;
        $data->btn_link = $request->btn_link;

        if($request->file('image')) {
            $file = $request->file('image');
            @unlink(\public_path('upload/user_images/'.$data->image));
            $filename = date('YMDHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/user_images'), $filename);
            $data['image'] = $filename;
        }

        $data->save();
        return redirect()->route('sliders.view')->with('success','Slider inserted successfully');

    }

    public function edit($id){
        $editdata = Slider::find($id);
        return view('backend.slider.edit-slider',compact('editdata'));
    }

    public function update(Request $request,$id){
        $data = Slider::find($id);
        $data->title = $request->title;
        $data->main_title = $request->main_title;
        $data->description = $request->description;
        $data->btn_title = $request->btn_title;
        $data->btn_link = $request->btn_link;

        if($request->file('image')) {
            $file = $request->file('image');
            @unlink(\public_path('upload/user_images/'.$data->image));
            $filename = date('YMDHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/user_images'), $filename);
            $data['image'] = $filename;
        }

        $data->save();
        return redirect()->route('sliders.view')->with('success','Data updated successfully');
    }

    public function delete($id){
        $Slider = Slider::find($id);
        $Slider-> delete();
        return redirect()->route('sliders.view')->with('success','Data deleted successfully');
    }



}
