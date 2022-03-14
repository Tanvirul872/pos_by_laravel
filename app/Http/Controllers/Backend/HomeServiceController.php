<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use App\Model\Homeservice;


class HomeServiceController extends Controller
{

    public function view(){
        $data ['alldata'] = Homeservice::all();
        return view('backend.homeservice.view-service', $data);
    }

    public function add(){
        return view('backend.homeservice.add-service');
    }

    public function store(Request $request){

        //validation of form start
        $this->validate($request,[
            'title' => 'required',
            'description' => 'required',
            'icon' => 'required',
            'link' => 'required',

        ]);
        //validation of form end

        $data = new Homeservice();
        $data->title = $request->title;
        $data->desc = $request->description;
        $data->icon_class = $request->icon;
        $data->link_url = $request->link;
        $data->save();
        return redirect()->route('hservice.view')->with('success','Data inserted successfully');

    }

    public function edit($id){
        $editdata = Homeservice::find($id);
        return view('backend.homeservice.edit-service',compact('editdata'));
    }

    public function update(Request $request,$id){
        $data = Homeservice::find($id);
        $data->title = $request->title;
        $data->desc = $request->description;
        $data->icon_class = $request->icon;
        $data->link_url = $request->link;
        $data->save();
        return redirect()->route('hservice.view')->with('success','Data updated successfully');

    }

    public function delete($id){
        $data = Homeservice::find($id);
        $data-> delete();
        return redirect()->route('hservice.view')->with('success','Data deleted successfully');
    }


}
