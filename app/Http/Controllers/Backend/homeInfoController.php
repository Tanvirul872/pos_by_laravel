<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Model\HomeInfo;
use Illuminate\Http\Request;

class homeInfoController extends Controller
{

    public function view(){
        $data ['alldata'] = HomeInfo::all();
        return view('backend.hinfo.view-info', $data);
    }

    public function add(){

        return view('backend.hinfo.add-info');
    }

    public function store(Request $request){
        //validation of form start
        $this->validate($request,[
            'title' => 'required',
            'description' => 'required',
        ]);
        //validation of form end
        $data = new HomeInfo();
        $data->title = $request->title;
        $data->description = $request->description;
        $data->save();

        return redirect()->route('hinfo.view')->with('success','Information inserted successfully');

    }

    public function edit($id){
        $editdata = HomeInfo::find($id);
        return view('backend.hinfo.edit-info',compact('editdata'));
    }

    public function update(Request $request,$id){
        $data = HomeInfo::find($id);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->save();
        return redirect()->route('hinfo.view')->with('success','Information updated successfully');
    }

    public function delete($id){
        $Slider = HomeInfo::find($id);
        $Slider-> delete();
        return redirect()->route('hinfo.view')->with('success','Data deleted successfully');
    }


}
