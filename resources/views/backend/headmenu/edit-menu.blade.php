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
                                <h3> Edit  header menu
                                    <a class="btn btn-success float-right" href="{{route('headmenu.view')}}"> View menu List </a>
                                </h3>

                                <div class="card-body">

                                    <form method="post" action="{{route('headmenu.update',$editdata->id)}}" id="myForm">
                                        {{csrf_field()}}

                                        <div class="form-group">
                                            <label> Name </label>
                                            <input type="text" value="{{$editdata->name}}" name="name" class="form-control" id="name">
                                            <small style="color:red"> {{($errors->has('name'))?($errors->first('name')):''}}</small>
                                        </div>

                                        <div class="form-group">
                                            <label> Link </label>
                                            <input type="text" name="link" value="{{$editdata->link}}" class="form-control" id="link">
                                            <small style="color:red"> {{($errors->has('link'))?($errors->first('link')):''}}</small>
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
