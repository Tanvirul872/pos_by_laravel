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
                                <h3> View color section
                                    <a class="btn btn-success float-right" href="{{route('color.add')}}"> Add Color </a>
                                </h3>

                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th> Sl No </th>
                                            <th> Brand Name </th>
                                            <th> Created by  </th>
                                            <th> Updated by </th>
                                            <th> Action </th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach( $alldata as $key=> $color )
                                            @php
                                                $color_count = App\Model\ProductColor::where('color_id',$color->id)->count();
                                            @endphp

                                            <tr>
                                                <td>{{ $key+1}}</td>
                                                <td>  {{ $color->name }}  </td>
                                                <td>  {{ $color->created_by }}  </td>
                                                <td>  {{ $color->updated_by }}  </td>

                                                <td>
                                                    <a title="edit" class="btn btn-success" href="{{route('color.edit',$color->id)}}" ><i class="fa fa-edit"></i></a>
                                                     @if($color_count<1)
                                                        <a title="delete" id="delete" class="btn btn-danger" href="{{route('color.delete',$color->id)}}" ><i class="fa fa-trash"></i></a>
                                                     @endif
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
