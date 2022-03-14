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
                                <h3> Edit  about title </h3>

                                <div class="card-body">

                                    <form method="post" action="{{route('habout_title.update',$editdata->id)}}" id="myForm">
                                        {{csrf_field()}}

                                        <div class="form-group">
                                            <label> Title </label>
                                            <input type="text" name="title" value="{{$editdata->title}}"  class="form-control" id="title" aria-describedby="emailHelp"  placeholder="Enter title">
                                            <small style="color:red"> {{($errors->has('title'))?($errors->first('title')):''}}</small>
                                        </div>

                                        <div class="form-group">
                                            <label> Sub title </label>
                                            <input type="text" name="subtitle" value="{{$editdata->subtitle}}" class="form-control"  placeholder="Enter left title">
                                            <small style="color:red"> {{($errors->has('subtitle'))?($errors->first('subtitle')):''}}</small>
                                        </div>

                                        <button type="submit" value="submit" class="btn btn-primary">update</button>
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
