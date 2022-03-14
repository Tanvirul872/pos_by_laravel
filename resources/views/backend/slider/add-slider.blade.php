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
                                <h3> Add  Slider
                                    <a class="btn btn-success float-right" href="{{route('sliders.view')}}"> View Slider List </a>
                                </h3>

                                <div class="card-body">

                                    <form method="post" action="{{route('sliders.store')}}" id="myForm" enctype="multipart/form-data">
                                        {{csrf_field()}}


                                        <div class="form-group">
                                            <label> Title </label>
                                            <input type="text" name="title" class="form-control" id="title">
                                            <small style="color:red"> {{($errors->has('title'))?($errors->first('title')):''}}</small>
                                        </div>

                                        <div class="form-group">
                                            <label>Main Title </label>
                                            <input type="text" name="main_title" class="form-control" id="main_title">
                                            <small style="color:red"> {{($errors->has('main_title'))?($errors->first('main_title')):''}}</small>
                                        </div>

                                        <div class="form-group">
                                            <label> Description </label>
                                            <input type="text" name="description" class="form-control" id="description">
                                            <small style="color:red"> {{($errors->has('description'))?($errors->first('description')):''}}</small>
                                        </div>

                                        <div class="form-group">
                                            <label> Button Title </label>
                                            <input type="text" name="btn_title" class="form-control" id="btn_title">
                                            <small style="color:red"> {{($errors->has('btn_title'))?($errors->first('btn_title')):''}}</small>
                                        </div>

                                        <div class="form-group">
                                            <label> Button Link </label>
                                            <input type="text" name="btn_link" class="form-control" id="btn_link">
                                            <small style="color:red"> {{($errors->has('btn_link'))?($errors->first('btn_link')):''}}</small>
                                        </div>

                                        <div class="form-group">
                                            <label for="image"> Image </label>
                                            <input type="file" name="image" class="form-control" id="image1">
                                        </div>

                                        <div class="form-group">
                                            <img id="showImage" src="{{(!empty($slider->image))?url('upload/user_images/'.$slider->image):url('upload/no-image.png')}}"  alt="" width="100px" height="70px">
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
