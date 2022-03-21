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
                                    Add purchase
                                    <a class="btn btn-success float-right" href="{{route('products.view')}}"> View Purchase </a>
                                </h3>

                                <div class="card-body">



                                        <div class="form-group">

                                            <div class="row">

                                                <div class="col-md-4">
                                                    <label> Date </label>
                                                    <input  type="date" name="date" id="date" class="form-control"  placeholder="Enter product name"> <br/>

                                                </div>
                                                <div class="col-md-4">
                                                    <label class="col-md-6"> Purchase No </label>
                                                    <input type="text" name="purchase_no" id="purchase_no" class="form-control"  placeholder="Enter product code"> <br/>
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="supplier_id"> Supplier name </label>
                                                    <select name="supplier_id" id="supplier_id" class="form-control">
                                                        <option value="">Select Supplier</option>
                                                        @foreach($suppliers as $supplier)
                                                            <option value="{{$supplier->id}}"> {{$supplier->name}}  </option>
                                                        @endforeach
                                                    </select>

                                                </div>

                                            </div>

                                            <div class="row">


                                                <div class="col-md-4">

                                                    <label for="category_id"> Category name </label>
                                                    <select name="category_id" id="category_id" class="form-control">
                                                        <option value="">Select Category</option>
                                                        @foreach($categories as $category)
                                                            <option value="{{$category->id}}"> {{$category->name}}  </option>
                                                        @endforeach
                                                    </select>

                                                </div>

                                                <div class="col-md-4">

                                                    <label for="category_id"> Product name </label>
                                                    <select name="product_id" id="product_id" class="form-control">
                                                        <option value=""> Select Product </option>

                                                        {{--                                                @foreach($products as $product)--}}
                                                        {{--                                                    <option value="{{$product->id}}"> {{$product->name}}  </option>--}}
                                                        {{--                                                @endforeach--}}
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-2" style="padding-top:32px; ">
                                                    <i class="btn btn-primary addeventmore"> + Add Item </i>
                                                </div>

                                            </div>











                                            <!-- <small style="color:red">  sdsd</small> -->
                                        </div>

{{--                                        <button type="submit" value="submit" class="btn btn-primary"> submit </button>--}}

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
