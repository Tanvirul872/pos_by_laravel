<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Homecat;
use Illuminate\Http\Request;

class HomeCatController extends Controller
{

    public function view(){
        $categories = Category::all();
        return view('backend.homecat.view-homecat', compact('categories'));
    }


    public function store(Request $request){

        $data = new Homecat();
        $data->category_one = $request->category_one;
        $data->category_two = $request->category_two;
        $data->category_three = $request->category_three;
        $data->category_four = $request->category_four;
        $data->save();
        return redirect()->back()->with('success','product category selected');
    }


}
