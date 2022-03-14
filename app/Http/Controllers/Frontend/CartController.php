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
use Cart; 



class CartController extends Controller
{
    public function addtocart(Request $request){

        $this->validate($request,[
            'size_id' => 'required',
            'color_id' => 'required',
        ]);
        $product = Product::where('id',$request->id)->first();
        $product_size = Size::where('id',$request->size_id)->first();
        $product_color = Color::where('id',$request->color_id)->first();
        Cart::add([
            'id' =>$product->id,
            'qty' =>$request->qty,
            'price' =>$product->price,
            'name' =>$product->name,
            'weight' =>550,
            'options' =>[
                'size_id' => $request->size_id,
                'size_name' => $product_size->name,
                'color_id' => $request->color_id,
                'color_name' => $product_color->name,
                'image' => $product->image,
            ],
        ]);
        return redirect()->route('show.cart')->with('success','Product added successfully');
    }

    public function showcart(){

        return view('frontend.single_pages.shopping-cart');
    }
    public function deletecart($rowId){

        Cart::remove($rowId);
        return redirect()->route('show.cart')->with('success','Product Deleted Successfully');
    }
}
