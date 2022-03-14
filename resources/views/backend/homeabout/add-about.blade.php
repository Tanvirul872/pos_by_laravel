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
                                <h3> Add  about us
                                    <a class="btn btn-success float-right" href="{{route('habout_us.view')}}"> View about us </a>
                                </h3>

                                <div class="card-body">

                                    <form method="post" action="{{route('habout_us.store')}}" id="myForm">
                                        {{csrf_field()}}  

                                        <div class="form-group">
                                            <label> title </label>
                                            <input type="text" name="title" class="form-control" id="title" aria-describedby="emailHelp"  placeholder="Enter title">
                                            <small style="color:red"> {{($errors->has('title'))?($errors->first('title')):''}}</small>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1"> Left title </label>
                                            <input type="text" name="left_title" class="form-control"  placeholder="Enter left title">
                                            <small style="color:red"> {{($errors->has('left_title'))?($errors->first('left_title')):''}}</small>
                                        </div> 

                                        <div class="form-group">
                                            <label>Left Subtitle</label>
                                            <input type="text" name="left_subtitle"  class="form-control" id="left_subtitle">
                                            <small style="color:red"> {{($errors->has('left_subtitle'))?($errors->first('left_subtitle')):''}}</small>

                                        </div>

                                        <div class="form-group">
                                            <label>Right Description</label>
                                            <textarea type="text" name="right_desc"  class="form-control" id="right_desc"></textarea>
                                            <small style="color:red"> {{($errors->has('right_desc'))?($errors->first('right_desc')):''}}</small>

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
