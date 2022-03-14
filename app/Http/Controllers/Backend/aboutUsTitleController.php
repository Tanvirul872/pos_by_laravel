<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Model\HomeAboutTitle;
use Illuminate\Http\Request;
class aboutUsTitleController extends Controller
{

    public function view(){
        $data ['alldata'] = HomeAboutTitle::all();
        return view('backend.homeabout.view-title', $data);
    }

    public function edit($id){
        $editdata = HomeAboutTitle::find($id);
        return view('backend.homeabout.edit-title',compact('editdata'));
    }


    public function update(Request $request,$id){
        $data = HomeAboutTitle::find($id);
        $data->title = $request->title;
        $data->subtitle = $request->subtitle;
        $data->save();
        return redirect()->route('habout_title.view')->with('success','Data updated successfully');

    }



//    public function store(Request $request){
//
//        //validation of form start
//        $this->validate($request,[
//            'title' => 'required',
//            'description' => 'required',
//            'icon' => 'required',
//            'link' => 'required',
//
//        ]);
//        //validation of form end
//
//        $data = new Homeservice();
//        $data->title = $request->title;
//        $data->desc = $request->description;
//        $data->icon_class = $request->icon;
//        $data->link_url = $request->link;
//        $data->save();
//        return redirect()->route('hservice.view')->with('success','Data inserted successfully');
//
//    }
//
//    public function delete($id){
//        $data = Homeservice::find($id);
//        $data-> delete();
//        return redirect()->route('hservice.view')->with('success','Data deleted successfully');
//    }

}
