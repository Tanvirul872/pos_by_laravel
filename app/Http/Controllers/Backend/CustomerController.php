<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
class CustomerController extends Controller
{
   public function view(){
       $alldata = User::where('usertype','customer')->where('status','1')->get();
       return view('backend.customer.view-customer',compact('alldata'));
   }

   public function draftview(){
       $alldata = User::where('usertype','customer')->where('status','0')->get();
       return view('backend.customer.draft-customer',compact('alldata'));

   }

    public function delete(Request $request){
        $customer = User::find($request->id);
        $customer->delete();
        return redirect()->route('customer.draft.view')->with('success','Data deleted111 successfully');

    }

}
