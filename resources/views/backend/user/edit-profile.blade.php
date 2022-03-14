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
                                <h3> Update  User
                                    <a class="btn btn-success float-right" href="{{route('profiles.view')}}"> View profile </a>
                                </h3>

                                <div class="card-body">

                                    <form method="post" action="{{route('profiles.update')}}" id="myForm" enctype="multipart/form-data">
                                        {{csrf_field()}}

                                        <div class="form-group">
                                            <label> Name </label>
                                            <input type="text" name="name" class="form-control" id="name" value="{{$editdata->name}}" placeholder="Enter name">
                                            <small style="color:red"> {{($errors->has('name'))?($errors->first('name')):''}}</small>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input type="email" name="email" class="form-control" value="{{$editdata->email}}"  placeholder="Enter email">
                                            <small style="color:red"> {{($errors->has('email'))?($errors->first('email')):''}}</small>

                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1"> Mobile no </label>
                                            <input type="text" name="mobile" class="form-control" value="{{$editdata->mobile}}"  placeholder="Enter mobile no">
                                            <small style="color:red"> {{($errors->has('mobile'))?($errors->first('mobile')):''}}</small>

                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1"> Address  </label>
                                            <input type="text" name="address" class="form-control" value="{{$editdata->address}}"  placeholder="Enter address">
                                            <small style="color:red"> {{($errors->has('address'))?($errors->first('address')):''}}</small>

                                        </div>

                                        <div class="form-group">
                                            <label for="usertype"> Gender </label>
                                            <select class="form-control" name="gender" id="usertype">
                                                <option value=""> Select Gender </option>
                                                <option value="admin" {{($editdata->gender=="male")?"selected":''}} > Male </option>
                                                <option value="user" {{($editdata->gender=="female")?"selected":''}}> Female </option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="image"> Image </label>
                                            <input type="file" name="image" class="form-control" id="image1">
                                        </div>

                                        <div class="form-group">

                                         <img id="showImage" src="{{(!empty($editdata->image))?url('upload/user_images/'.$editdata->image):url('upload/no-image.png')}}"  alt="" width="100px" height="70px">

                                        </div>

                                        <button type="submit" value="submit" class="btn btn-primary"> Update</button>
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
