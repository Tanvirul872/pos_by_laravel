<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Model\MenuItem;
use App\Model\SubMenuItem;
use Illuminate\Http\Request;

class HeadeSubMenuController extends Controller
{

    public function view(){
        $data ['alldata'] = SubMenuItem::all();
        return view('backend.headsubmenu.view-menu', $data);
    }

    public function add(){
        $menuItems = MenuItem::all();
        return view('backend.headsubmenu.add-menu',compact('menuItems'));
    }


    public function store(Request $request){

        //validation of form start
        $this->validate($request,[
            'name' => 'required',
            'link' => 'required',
        ]);

        //validation of form end
        $data = new SubMenuItem();
        $data->name = $request->name;
        $data->link = $request->link;
        $data->menu_item_id = $request->menu_item_id;
        $data->save();

        return redirect()->route('headsubmenu.view')->with('success','Header Submenu inserted successfully');

    }


    public function edit($id){
        $editdata ['data'] = SubMenuItem::find($id);
        $editdata ['menuitems'] = MenuItem::all();
        //dd($editdata);
        return view('backend.headsubmenu.edit-menu',$editdata);
    }

    public function update(Request $request,$id){
        $data = SubMenuItem::find($id);
        $data->name = $request->name;
        $data->link = $request->link;
        $data->menu_item_id = $request->menu_item_id;
        $data->save();
        return redirect()->route('headsubmenu.view')->with('success','SubMenu updated successfully');
    }

    public function delete($id){
        $Menu = SubMenuItem::find($id);
        $Menu-> delete();
        return redirect()->route('headsubmenu.view')->with('success','SubMenu deleted successfully');
    }

}
