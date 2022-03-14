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
                                    <a class="btn btn-success float-right" href="{{route('users.view')}}"> View User List </a>
                                </h3>

                                <div class="card-body">

                                    <form method="post" action="{{route('users.update',$editdata->id)}}" id="myForm">
                                        {{csrf_field()}}

                                        <div class="form-group">
                                            <label for="role"> User Type </label>
                                            <select class="form-control" name="role" id="role">
                                                <option value=""> Select Role </option>
                                                <option value="admin" {{($editdata->role=="admin")?"selected":''}} > Admin </option>
                                                <option value="user" {{($editdata->role=="user")?"selected":''}}> User </option>
                                            </select>
                                        </div>

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
