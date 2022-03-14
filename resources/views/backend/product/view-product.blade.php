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
                                <h3> View Product
                                    <a class="btn btn-success float-right" href="{{route('product.add')}}"> Add Product </a>
                                </h3>

                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th> Sl No </th>
                                            <th> category </th>
                                            <th> Brand  </th>
                                            <th> Product name </th>
                                            <th> Price </th>
                                            <th> Image </th>
                                            <th> Short Description </th>
                                            <th> Long Description  </th>
                                            <th> Action </th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach( $alldata as $key=> $product )

                                            <tr>
                                                <td>{{ $key+1}}</td>
                                                <td>  {{$product['category']['name']}} </td>
                                                <td>  {{$product['brand']['name'] }}    </td>
                                                <td>  {{$product->name }}   </td>
                                                <td>  {{$product->price }}   </td>
                                                <td>
                                                    <img id="showImage" src="{{(!empty($product->image))?url('upload/product_images/'.$product->image):url('upload/no-image.png')}}"  alt="" width="100px" height="70px">

                                                </td>
                                                <td>  {{$product->short_desc }}   </td>
                                                <td>  {{$product->long_desc }}   </td>

                                                <td>
                                                    <a title="edit" class="btn btn-success" href="{{route('product.edit',$product->id)}}" ><i class="fa fa-edit"></i></a>
                                                    <a title="details" class="btn btn-success" href="{{route('product.details',$product->id)}}" ><i class="fa fa-eye"></i></a>
                                                    <a title="delete" id="delete" class="btn btn-danger" href="{{route('product.delete',$product->id)}}" ><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>

                                        @endforeach

                                        </tbody>

                                    </table>

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
