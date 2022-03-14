<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;


class FrontenController extends Controller
{
    public function index(){

      return view ('auth.login');
    }

    public function productdetails($slug){

        $data ['product'] = Product::where('slug',$slug)->first();
        $data ['product_colors'] = ProductColor::where('product_id',$data ['product']->id)->get();
        $data ['product_sizes'] = ProductSize::where('product_id',$data ['product']->id)->get();

        return view ('frontend.single_pages.product-details',$data);

    }

    public function aboutus(){
        return view ('frontend.single_pages.about-us');
      }
    public function contactus(){
        return view ('frontend.single_pages.contact-us');
      }

      public function ourblog(){
        return view ('frontend.single_pages.our-blog');
      }
       public function ourportfolio(){
        return view ('frontend.single_pages.our-portfolio');
      }
     public function ourpricing(){
        return view ('frontend.single_pages.our-pricing');
      }

    public function ourservice(){
        return view ('frontend.single_pages.our-service');
      }

    public function ourteam(){
        return view ('frontend.single_pages.our-team');
      }
    public function ourtestimonial(){
        return view ('frontend.single_pages.our-testimonial');
      }


}
