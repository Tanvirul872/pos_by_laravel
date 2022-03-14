@extends('backend.layouts.master')
@section ('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">

            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <!-- Main row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3>
                                    @if(isset($editdata))
                                        Edit  Product
                                    @else
                                        Add  Product
                                    @endif



                                    <a class="btn btn-success float-right" href="{{route('product.view')}}"> View Product</a>
                                </h3>

                                <div class="card-body">

                                    <form method="post" action="{{(@$editdata)?route('product.update',$editdata->id):route('product.store')}}" id="myForm" enctype="multipart/form-data">
                                        {{csrf_field()}}


                                        <div class="form-group">
                                            <label> Product Name </label>
                                            <input type="text" name="name" class="form-control" id="category" value="{{@$editdata->name}}" placeholder="Enter name">
                                            <small style="color:red"> {{($errors->has('name'))?($errors->first('name')):''}}</small>
                                        </div>

                                        <div class="form-group">
                                            <label for="category_id"> Category Name </label>
                                            <select class="form-control" name="category_id" id="category_id">
                                                <option value=""> Select category </option>
                                                @foreach($categories as $category)
                                                   <option value="{{$category->id}}" {{(@$editdata->category_id==$category->id)?"selected":"" }}> {{$category->name}} </option>
                                                @endforeach
                                            </select>
                                            <small style="color:red"> {{($errors->has('category_id'))?($errors->first('category_id')):''}}</small>

                                        </div>


                                        <div class="form-group">
                                            <label for="usertype"> Brand Name </label>
                                            <select class="form-control" name="brand_id" id="brand_id">
                                                <option value=""> Select brand </option>
                                                @foreach($brands as $brand)
                                                    <option value="{{$brand->id}}" {{(@$editdata->brand_id==$brand->id)?"selected":"" }}> {{$brand->name}} </option>
                                                @endforeach

                                            </select>
                                            <small style="color:red"> {{($errors->has('brand_id'))?($errors->first('brand_id')):''}}</small>

                                        </div>

                                        <div class="form-group">
                                            <label for="usertype"> Color Name </label>
                                            <select class="form-control select2"  name="color_id[]" id="color_id" multiple>
                                                <option value=""> Select color </option>
                                                @foreach($colors as $color)
                                                    <option value="{{$color->id}}" {{@in_array(['color_id'=> $color->id],$color_array)?"selected":""}} > {{$color->name}} </option>
                                                @endforeach
                                            </select>
                                            <small style="color:red"> {{($errors->has('color_id'))?($errors->first('color_id')):''}}</small>
                                        </div>

                                        <div class="form-group">
                                            <label for="usertype"> Size Name </label>
                                            <select class="form-control select2"  name="size_id[]" id="size_id" multiple>
                                                <option value=""> Select size </option>
                                                @foreach($sizes as $size)
                                                    <option value="{{$size->id}}" {{@in_array(['size_id'=> $size->id],$size_array)?"selected":""}}> {{$size->name}} </option>
                                                @endforeach
                                            </select>
                                            <small style="color:red"> {{($errors->has('size_id'))?($errors->first('size_id')):''}}</small>
                                        </div>

                                        <div class="form-group">
                                            <label> Short Description  </label>
                                            <textarea type="text" name="short_desc" class="form-control" placeholder="Enter short description"> {{@$editdata->short_desc}} </textarea>
                                            <small style="color:red"> {{($errors->has('short_desc'))?($errors->first('short_desc')):''}}</small>
                                        </div>

                                        <div class="form-group">
                                            <label> Long Description  </label>
                                            <textarea type="text" name="long_desc" class="form-control" placeholder="Enter long description"> {{@$editdata->long_desc}} </textarea>
                                            <small style="color:red"> {{($errors->has('long_desc'))?($errors->first('long_desc')):''}}</small>
                                        </div>

                                        <div class="form-group">
                                            <label> Price  </label>
                                            <input type="number" name="price" id="price"  class="form-control" value="{{@$editdata->price}}" placeholder="Enter price">
                                            <small style="color:red"> {{($errors->has('price'))?($errors->first('price')):''}}</small>
                                        </div>

                                        <div class="form-group">
                                            <label> Image  </label>
                                            <input type="file" name="image" id="image" class="form-control">
                                            <img id="showImage" src="{{(!empty($editdata->image))?url('upload/product_images/'.$editdata->image):url('upload/no-image.png')}}"  alt="" width="100px" height="70px">
                                            <small style="color:red"> {{($errors->has('image'))?($errors->first('image')):''}}</small>

                                        </div>


                                          <div class="form-group">
                                            <label>Sub Image  </label>
                                            <input type="file" name="sub_image" class="form-control" multiple>
                                          </div>

                                        <button type="submit" value="submit" class="btn btn-primary">{{(@$editdata)?"Update":"Submit"}}   </button>
                                    </form>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection
