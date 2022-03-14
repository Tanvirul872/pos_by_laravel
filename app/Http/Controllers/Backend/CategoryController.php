<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Model\HomeAbout;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Model\Category;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function view(){
        $data ['alldata'] = Category::all();
        return view('backend.category.view-category', $data);
    }

    public function add(){

        return view('backend.category.add-category');
    }

    public function store(Request $request){

        //validation of form start
        $this->validate($request,[
            'name' => 'required|unique:categories,name',

        ]);
        //validation of form end

        $data = new Category();
        $data->name = $request->name;
        $data->created_by = Auth::user()->id;

        $data->save();
        return redirect()->route('category.view')->with('success','Category inserted successfully');

    }

    public function edit($id){
        $editdata = Category::find($id);
        return view('backend.category.add-category',compact('editdata'));
    }

    public function update(CategoryRequest $request,$id){
        $data =  Category::find($id);
        $data->name = $request->name;
        $data->updated_by = Auth::user()->id;
        $data->save();
        return redirect()->route('category.view')->with('success','Category updated successfully');
    }

    public function delete($id){
        $data = Category::find($id);
        $data-> delete();
        return redirect()->route('category.view')->with('success','Category deleted successfully');
    }

}
