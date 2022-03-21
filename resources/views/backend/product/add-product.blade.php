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
                                    Add product
                                    <a class="btn btn-success float-right" href="{{route('products.view')}}"> View product </a>
                                </h3>

                                <div class="card-body">

                                    <form method="post" action="{{route('products.store')}}" id="myForm">
                                        {{csrf_field()}}

                                        <div class="form-group">

                                            <label> Product name </label>
                                            <input type="text" name="name" class="form-control"  placeholder="Enter product name"> <br/>

                                            <label> Product Code </label>
                                            <input type="text" name="product_code" class="form-control"  placeholder="Enter product code"> <br/>


                                            <label for="supplier_id"> Supplier name </label>
                                            <select name="supplier_id" class="form-control">
                                                <option value="">Select Supplier</option>
                                                @foreach($suppliers as $supplier)
                                                <option value="{{$supplier->id}}"> {{$supplier->name}}  </option>
                                                 @endforeach
                                            </select>

                                            <label for="brand_id"> Brand name </label>
                                            <select name="brand_id" class="form-control">
                                                <option value="">Select Brand</option>
                                                @foreach($brands as $brand)
                                                    <option value="{{$brand->id}}"> {{$brand->name}}  </option>
                                                @endforeach
                                            </select>

                                            <label for="unit_id"> Unit name </label>
                                            <select name="unit_id" class="form-control">
                                                <option value="">Select Unit</option>
                                                @foreach($units as $unit)
                                                    <option value="{{$unit->id}}"> {{$unit->name}}  </option>
                                                @endforeach
                                            </select>

                                            <label for="category_id"> Category name </label>
                                            <select name="category_id" class="form-control">
                                                <option value="">Select Category</option>
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}"> {{$category->name}}  </option>
                                                @endforeach
                                            </select>




                                            <label> Product Price </label>
                                            <input type="text" name="product_price" class="form-control"  placeholder="Enter product price"> <br/>

                                            <label> Product Cost </label>
                                            <input type="text" name="product_cost" class="form-control"  placeholder="Enter product cost"> <br/>

                                            <label> Product Details </label>
                                            <input type="text" name="product_details" class="form-control"  placeholder="Enter product details"> <br/>

                                            <label> Product Image </label>
                                            <input type="text" name="product_img" class="form-control"  placeholder="Enter product img url"> <br/>


                                            <!-- <small style="color:red">  sdsd</small> -->
                                        </div>

                                        <button type="submit" value="submit" class="btn btn-primary"> submit </button>
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
