<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Model\Color;
use App\Model\Size;
use App\Model\Brand;
use App\Model\Category;
use App\Model\Product;
use App\Model\ProductSize;
use App\Model\ProductColor;
use App\Model\ProductSubImage;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{

    public function view(){
        $data ['alldata'] = Product::all();
        return view('backend.product.view-product', $data);
    }

    public function add(){
        $data ['categories'] = Category::all();
        $data ['brands'] = Brand::all();
        $data ['colors'] = Color::all();
        $data ['sizes'] = Size::all();

        return view('backend.product.add-product',$data);
    }

    public function store(Request $request){

        DB::transaction(function() use($request){
            $this->validate($request,[
                'name' => 'required|unique:products,name',
                'color_id' => 'required',
                'size_id' => 'required',
                'short_desc' => 'required',
                'long_desc' => 'required',
                'price' => 'required',
            ]);

            $product = new Product();
            $product->category_id = $request->category_id;
            $product->brand_id = $request->brand_id;
            $product->name = $request->name;
            $product->slug = str_slug($request->name);
            $product->short_desc = $request->short_desc;
            $product->long_desc = $request->long_desc;
            $product->price = $request->price;
            if($request->file('image')) {
                $file = $request->file('image');
                @unlink(\public_path('upload/product_images/'.$product->image));
                $filename = date('YMDHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/product_images'), $filename);
                $product['image'] = $filename;
            }
            if($product->save()){

                //product-sub-image-table-data-insert
                $files = $request->sub_image;
                if(!empty($files)){
                    foreach ($files as $file ){
                        $imgName = date('YmdHi').$file->getClientOriginaName();
                        $file->move('upload/product_images/product_sub_images',$imgName);
                        $submimage['sub_image'] =$imgName;
                        $subimage = new ProductSubImage();
                        $subimage->product_id = $product->id;
                        $subimage->sub_image = $imgName;
                        $subimage->save();
                    }
                }
                //color-table-data-insert
                $colors = $request->color_id;
                if(!empty($colors)){
                    foreach ($colors as $color) {
                        $mycolor = new ProductColor();
                        $mycolor->product_id= $product->id;
                        $mycolor->color_id= $color;
                        $mycolor->save();
                    }
                }

                //Size-table-data-insert
                $sizes = $request->size_id;
                if(!empty($sizes)){
                    foreach ($sizes as $size){
                        $mysize = new ProductSize();
                        $mysize->product_id = $product->id;
                        $mysize->size_id = $size;
                        $mysize->save();
                    }
                }

            }else{
              return redirect()->back()->with('error','Sorry!Data no saved');
            }
        });

        return redirect()->route('product.view')->with('success','Product inserted successfully');

    }

    public function edit($id){
        $data ['editdata']= Product::find($id);
        $data ['categories'] = Category::all();
        $data ['brands'] = Brand::all();
        $data ['colors'] = Color::all();
        $data ['sizes'] = Size::all();
        $data['color_array'] = ProductColor::select('color_id')->where('product_id',$data['editdata']->id)->orderBy('id','asc')->get()->toArray();
        $data['size_array'] = ProductSize::select('size_id')->where('product_id',$data['editdata']->id)->orderBy('id','asc')->get()->toArray();

        return view('backend.product.add-product',$data);
    }

    public function update(ProductRequest $request,$id){
        DB::transaction(function() use($request,$id){
            $this->validate($request,[
                'color_id' => 'required',
                'size_id' => 'required',
                'short_desc' => 'required',
                'long_desc' => 'required',
                'price' => 'required',
            ]);

            $product = Product::find($id);
            $product->category_id = $request->category_id;
            $product->brand_id = $request->brand_id;
            $product->name = $request->name;
            $product->slug = str_slug($request->name);
            $product->short_desc = $request->short_desc;
            $product->long_desc = $request->long_desc;
            $product->price = $request->price;

            if($request->file('image')) {
                $file = $request->file('image');
                @unlink(\public_path('upload/product_images/'.$product->image));
                $filename = date('YMDHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/product_images'), $filename);
                $product['image'] = $filename;
            }

            if($product->save()){

                //product-sub-image-table-data-update
                $files = $request->sub_image;
                if(!empty($files)){
                    $subImage = ProductSubImage::where('product_id',$id)->get()->toArray();
                    foreach($subImage as $value){
                        if(!empty($value)){
                            unlink('upload/product_images/product_sub_images/'.$value['sub_image']);
                        }
                    }
                    ProductSubImage::where('product_id',$id)->delete();
                }

                if(!empty($files)){
                    foreach ($files as $file ){
                        $imgName = date('YmdHi').$file->getClientOriginaName();
                        $file->move('upload/product_images/product_sub_images',$imgName);
                        $submimage['sub_image'] =$imgName;
                        $subimage = new ProductSubImage();
                        $subimage->product_id = $product->id;
                        $subimage->sub_image = $imgName;
                        $subimage->save();
                    }
                }
                //color-table-data-update
                $colors = $request->color_id;
                if(!empty($colors)){
                    ProductColor::where('product_id',$id)->delete();
                }
                if(!empty($colors)){
                    foreach ($colors as $color) {
                        $mycolor = new ProductColor();
                        $mycolor->product_id = $product->id;
                        $mycolor->color_id = $color;
                        $mycolor->save();
                    }
                }


                //Size-table-data-update
                $sizes = $request->size_id;
                if(!empty($sizes)){
                    ProductSize::where('product_id',$id)->delete();
                }
                if(!empty($sizes)){
                    foreach ($sizes as $size){
                        $mysize = new ProductSize();
                        $mysize->product_id = $product->id;
                        $mysize->size_id = $size;
                        $mysize->save();
                    }
                }

            }else{
                return redirect()->back()->with('error','Sorry!Data no saved');
            }
        });

        return redirect()->route('product.view')->with('success','Product updated successfully');
    }

    public function delete(Request $request){
       $product= Product::find($request->id);
       if(file_exists('/upload/product_images/'.$product->image) AND ! empty($product->image)){
           unlink('upload/product_images/'.$product->image);
       }
       $subImage = productSubImage::where('product_id',$product->id)->get()->toArray();
       if(!empty($subImage)){
           foreach ($subImage as $value){
               if(!empty($value)){
                   unlink('upload/product_images/product_sub_images/'.$value['sub_image']);
               }
           }
       }
       ProductSubImage::where('product_id',$product->id)->delete();
       ProductColor::where('product_id',$product->id)->delete();
       ProductSize::where('product_id',$product->id)->delete();
       $product->delete();
       return redirect()->route('product.view')->with('success','Data Deleted Successfully');
    }

    public function details($id){
        $details = Product::find($id);
        return view('backend.product.product-details',compact('details'));
    }


}
