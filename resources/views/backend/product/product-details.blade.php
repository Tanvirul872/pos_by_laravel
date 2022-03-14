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
                                <h3> View Product details
                                    <a class="btn btn-success float-right" href="{{route('product.view')}}"> View Product </a>
                                </h3>

                                <div class="card-body">

                                    <table class="table table-bordered table-striped">
                                        <tbody>
                                        <tr>
                                            <td> Category </td>
                                            <td> {{$details['category']['name']}} </td>
                                        </tr>
                                        <tr>
                                            <td> Brand </td>
                                            <td> {{$details['brand']['name'] }}   </td>
                                        </tr>

                                        <tr>
                                            <td> name </td>
                                            <td>  {{$details->name }} </td>
                                        </tr>

                                        <tr>
                                            <td> Price </td>
                                            <td>  {{$details->price }}  </td>
                                        </tr>

                                        <tr>
                                            <td> Image </td>
                                            <td>
                                                <img id="showImage" src="{{(!empty($details->image))?url('upload/product_images/'.$details->image):url('upload/no-image.png')}}"  alt="" width="100px" height="70px">

                                            </td>
                                        </tr>

                                        <tr>
                                            <td> Short Description </td>
                                            <td> {{$details->short_desc }}  </td>
                                        </tr>

                                        <tr>
                                            <td> Long Description </td>
                                            <td> {{$details->long_desc }} </td>
                                        </tr>

                                        <tr>
                                            <td> Color  </td>
                                            <td>
                                                @php
                                                  $colors = App\Model\ProductColor::where('product_id',$details->id)->get() ;
                                                @endphp

                                                @foreach($colors as $c)
                                                    {{$c['color']['name']}} ,
                                                @endforeach
                                            </td>
                                        </tr>

                                        <tr>
                                            <td> Size </td>
                                            <td>
                                                @php
                                                    $sizes = App\Model\ProductSize::where('product_id',$details->id)->get() ;
                                                @endphp
                                                @foreach($sizes as $s)
                                                    {{$s['size']['name']}} ,
                                                @endforeach
                                            </td>
                                        </tr>


                                        <tr>
                                            <td> Sub Image </td>
                                            <td>
                                                @php
                                                    $sub_img = App\Model\ProductSubImage::where('product_id',$details->id)->get() ;
                                                @endphp
                                                @foreach($sub_img as $img)
                                                    <img src="{{url('upload/product_images/product_sub_images/.$img->sub_image')}}">
                                                @endforeach
                                            </td>
                                        </tr>

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
