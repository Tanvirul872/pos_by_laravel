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
                                <h3> View  about us section
                                    <a class="btn btn-success float-right" href="{{route('habout_us.add')}}"> Add about </a>
                                </h3>

                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th> Sl No </th>
                                            <th> Title </th>
                                            <th> Left title </th>
                                            <th> Left subtitle </th>
                                            <th> Right description </th>
                                            <th> Action </th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach( $alldata as $key=> $about)

                                        <tr>
                                            <td>{{ $key+1}}</td>
                                            <td>  {{ $about->title }}  </td>
                                            <td> {{ $about->left_title }} </td>
                                            <td>  {{ $about->left_subtitle }} </td>
                                            <td>  {{ $about->right_desc }} </td>
                                            <td>
                                                <a title="edit" class="btn btn-success" href="{{route('habout_us.edit',$about->id)}}" ><i class="fa fa-edit"></i></a>
                                                <a title="delete" id="delete" class="btn btn-danger" href="{{route('habout_us.delete',$about->id)}}" ><i class="fa fa-trash"></i></a>
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
