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
                                <h3> View  Slider
                                    <a class="btn btn-success float-right" href="{{route('sliders.add')}}"> Add Slider </a>
                                </h3>

                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th> Sl No </th>
                                            <th> Title </th>
                                            <th> Main Title </th>
                                            <th> Description </th>
                                            <th> Button Title </th>
                                            <th> Button Link </th>
                                            <th> Image </th>
                                            <th> Action </th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach( $alldata as $key=> $slider)

                                            <tr>
                                                <td>{{ $key+1}}</td>
                                                <td>  {{ $slider->title }}  </td>
                                                <td>  {{ $slider->main_title }}  </td>
                                                <td> {{ $slider->description }} </td>
                                                <td>  {{ $slider->btn_title }} </td>
                                                <td>  {{ $slider->btn_link }} </td>
                                                <td>
                                                    <img class="profile-user-img img-fluid img-circle"
                                                         src="{{(!empty($slider->image))?url('upload/user_images/'.$slider->image):url('upload/no-image.png')}}"
                                                         alt="User profile picture">
                                                </td>
                                                <td>
                                                    <a title="edit" class="btn btn-success" href="{{route('sliders.edit',$slider->id)}}" ><i class="fa fa-edit"></i></a>
                                                    <a title="delete" id="delete" class="btn btn-danger" href="{{route('sliders.delete',$slider->id)}}" ><i class="fa fa-trash"></i></a>

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
