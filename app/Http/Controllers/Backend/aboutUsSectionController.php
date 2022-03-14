<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\HomeAbout;

class aboutUsSectionController extends Controller
{

    public function view(){
        $data ['alldata'] = HomeAbout::all();
        return view('backend.homeabout.view-about', $data);
    }

    public function add(){

        return view('backend.homeabout.add-about');
    }

    public function store(Request $request){

        //validation of form start
        $this->validate($request,[
            'title' => 'required',
            'left_title' => 'required',
            'left_subtitle' => 'required',
            'right_desc' => 'required',

        ]);
        //validation of form end

        $data = new HomeAbout();
        $data->title = $request->title;
        $data->left_title = $request->left_title;
        $data->left_subtitle = $request->left_subtitle;
        $data->right_desc = $request->right_desc;
        $data->save();
        return redirect()->route('habout_us.view')->with('success','Data inserted successfully');

    }

    public function edit($id){
        $editdata = HomeAbout::find($id);
        return view('backend.homeabout.edit-about',compact('editdata'));
    }

    public function update(Request $request,$id){
        $data = HomeAbout::find($id);
        $data->title = $request->title;
        $data->left_title = $request->left_title;
        $data->left_subtitle = $request->left_subtitle;
        $data->right_desc = $request->right_desc;
        $data->save();
        return redirect()->route('habout_us.view')->with('success','Data updated successfully');
    }

    public function delete($id){
        $data = HomeAbout::find($id);
        $data-> delete();
        return redirect()->route('habout_us.view')->with('success','Data deleted successfully');
    }



}
