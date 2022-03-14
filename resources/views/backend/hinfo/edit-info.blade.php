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
                                <h3> Edit  Info
                                    <a class="btn btn-success float-right" href="{{route('hinfo.view')}}"> View info List </a>
                                </h3>

                                <div class="card-body">

                                    <form method="post" action="{{route('hinfo.update',$editdata->id)}}" id="myForm">
                                        {{csrf_field()}}

                                        <div class="form-group">
                                            <label> Title </label>
                                            <input type="text" value="{{$editdata->title}}" name="title" class="form-control" id="title">
                                            <small style="color:red"> {{($errors->has('title'))?($errors->first('title')):''}}</small>
                                        </div>

                                        <div class="form-group">
                                            <label> Description </label>
                                            <input type="text" name="description" value="{{$editdata->description}}" class="form-control" id="description">
                                            <small style="color:red"> {{($errors->has('description'))?($errors->first('description')):''}}</small>
                                        </div>

                                        <button type="submit" value="submit" class="btn btn-primary">Submit</button>
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
