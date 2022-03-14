<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Model\MenuItem;
use Illuminate\Http\Request;

class HeadeMenuController extends Controller
{

    public function view(){
        $data ['alldata'] = MenuItem::all();
        return view('backend.headmenu.view-menu', $data);
    }

    public function add(){

        return view('backend.headmenu.add-menu');
    }

    public function store(Request $request){
        //validation of form start
        $this->validate($request,[
            'name' => 'required',
            'link' => 'required',
        ]);
        //validation of form end
        $data = new MenuItem();
        $data->name = $request->name;
        $data->link = $request->link;
        $data->save();

        return redirect()->route('headmenu.view')->with('success','Header menu inserted successfully');

    }

    public function edit($id){
        $editdata = MenuItem::find($id);
        return view('backend.headmenu.edit-menu',compact('editdata'));
    }

    public function update(Request $request,$id){
        $data = MenuItem::find($id);
        $data->name = $request->name;
        $data->link = $request->link;
        $data->save();
        return redirect()->route('headmenu.view')->with('success','Menu updated successfully');
    }

    public function delete($id){
        $Menu = MenuItem::find($id);
        $Menu-> delete();
        return redirect()->route('headmenu.view')->with('success','Menu deleted successfully');
    }


}
