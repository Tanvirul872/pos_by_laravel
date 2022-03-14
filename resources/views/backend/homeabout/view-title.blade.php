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
                                <h3> View  about us title </h3>

                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>

                                            <th> Title </th>
                                            <th> Sub title </th>
                                            <th> Action </th>

                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach( $alldata as $key=> $title)

                                            <tr>
                                                <td>  {{ $title->title }}  </td>
                                                <td> {{ $title->subtitle }} </td>

                                                <td>
                                                    <a title="edit" class="btn btn-success" href="{{route('habout_title.edit',$title->id)}}" ><i class="fa fa-edit"></i></a>
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
