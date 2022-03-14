<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\HomeAboutTitle;
use App\Model\HomeAbout;
use App\Model\Homeservice;
use App\Model\Slider;
use App\Model\Product;
use App\Model\HomeInfo;
use App\Model\ProductColor;
use App\Model\ProductSize;
use App\Model\Size;
use App\Model\Color;
use App\User;
use Cart;
use DB;
use Mail;


//use Illuminate\Support\Facades\Mail;
class CheckoutController extends Controller
{
    public function customerLogin(){

        return view('frontend.single_pages.customer-login');
    }

    public function customerSignup(){

        return view('frontend.single_pages.customer-signup');
    }

    public function signupStore(Request $request){

        DB::transaction(function() use($request){

            $code = rand(0000,9999);
            $user = new User();
            $user->name = $request->name ;
            $user->email = $request->email ;
            $user->mobile = $request->mobile ;
            $user->password = bcrypt($request->password) ;
            $user->code = $code;
            $user->status = '0';
            $user->usertype = 'customer';
            $user->save();

            $data = array(
                'email' => $request->email,
                'code' => $code,
            );

            Mail::send('frontend.emails.verify-email',$data,function($message)
              use($data){
                $message->from('anmtanvir872@gmail.com','Flip Mart');
                $message->to($data['email']);
                $message->subject('Please verify your address');
            });
        });

        return redirect()->route('email.verify')->with('success','you have successfully signed up,please verify your email');

    }


    public function emailVerify(){

        return view('frontend.single_pages.email-verify');
    }



    public function VerifyStore(Request $request){

        $checkData = User::where('email',$request->email)->where('code',$request->code)->first();
        if($checkData){
            $checkData->status ='1';
            $checkData->save();
            return redirect()->route('customer.login')->back()->with('success','successfully verified,please login');
        }else{
            return redirect()->back()->with('error','sorry email and code does not match');
        }
    }



}
