<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function view(){   
        $data ['alldata'] = User::where('usertype','admin')->where('status','1')->get(); 
        return view('backend.layouts.view-user', $data);
    }

    public function add(){
        
        return view('backend.layouts.add-user');
    }

    public function store(Request $request){

        //validation of form start
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|unique:users,email'
        ]);
        //validation of form end

        $data = new User();
        $data->usertype = 'admin';
        $data->role = $request->role;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->save();
        return redirect()->route('users.view')->with('success','Data inserted successfully');

    }

    public function edit($id){
        $editdata = User::find($id);
        return view('backend.layouts.edit-user',compact('editdata'));
    }

    public function update(Request $request,$id){
        $data = User::find($id);
        $data->role = $request->role;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->save();
        return redirect()->route('users.view')->with('success','Data updated successfully');
    }

    public function delete($id){
        $user = User::find($id);
        $user-> delete();
        return redirect()->route('users.view')->with('success','Data deleted successfully');
    }


}
