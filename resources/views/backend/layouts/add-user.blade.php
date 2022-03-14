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
                                <h3> Add  User
                                    <a class="btn btn-success float-right" href="{{route('users.view')}}"> View User List </a>
                                </h3>

                                <div class="card-body">

                                    <form method="post" action="{{route('users.store')}}" id="myForm">
                                        {{csrf_field()}}


                                        <div class="form-group">
                                            <label for="role"> User Type </label>
                                            <select class="form-control" name="role" id="role">
                                                <option value=""> Select Role </option>
                                                <option value="admin"> Admin </option>
                                                <option value="user"> User </option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label> Name </label>
                                            <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp"  placeholder="Enter name">
                                            <small style="color:red"> {{($errors->has('name'))?($errors->first('name')):''}}</small>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input type="email" name="email" class="form-control"  placeholder="Enter email">
                                            <small style="color:red"> {{($errors->has('email'))?($errors->first('email')):''}}</small>

                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" name="password"  class="form-control" id="password">
                                        </div>

                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <input type="password" name="password2" class="form-control" >
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
