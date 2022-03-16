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
                                <h3> View Product section
                                    <a class="btn btn-success float-right" href="{{route('products.add')}}"> Add Product </a>
                                </h3>

                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th> Sl No </th>
                                            <th> Product Name </th>
                                            <th> Product Code </th>
                                            <th> Category Name </th>
                                            <th> Product Price </th>
                                            <th> Product Cost </th>
                                            <th> Product Profit </th>
                                            <th> Profit Percent </th>
                                            <th> Product details </th>
                                            <th> Action </th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach( $allData as $key=> $product )

                                            <tr>
                                                <td>{{ $key+1}}</td>

                                                <td> {{ $product->name }}   </td>
                                                <td>  {{ $product->product_code }}  </td>
                                                <td>  {{ $product['category']['name'] }} </td>
                                                <td>  {{ $product->product_price }}  </td>
                                                <td>  {{ $product->product_cost }}  </td>
                                                <td>  {{ $product->product_profit }}  </td>
                                                <td>  {{ $product->product_profit_percent }} % </td>
                                                <td>  {{ $product->product_details }}  </td>

                                                <td>
                                                    <a title="edit" class="btn btn-success" href="{{route('products.edit',$product->id)}}" ><i class="fa fa-edit"></i></a>


                                                    <a title="delete" id="delete" class="btn btn-danger" href="{{route('products.delete',$product->id)}}" ><i class="fa fa-trash"></i></a>

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
