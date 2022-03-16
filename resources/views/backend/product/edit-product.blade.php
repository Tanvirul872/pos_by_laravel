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
                                 Edit Brand
                                    <a class="btn btn-success float-right" href="{{route('brands.view')}}"> View Brand</a>
                                </h3>

                                <div class="card-body">

                                    <form method="post" action="{{route('brands.update',$editData->id)}}" id="myForm">
                                        {{csrf_field()}}

                                        <div class="form-group">

                                            <label> Supplier name </label>
                                            <input type="text" name="name" class="form-control" id="name" value="{{$editData->name}}"  placeholder="Enter category name"> <br/>

                                        </div>

                                        <button type="submit" value="submit" class="btn btn-primary"> Update </button>
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
