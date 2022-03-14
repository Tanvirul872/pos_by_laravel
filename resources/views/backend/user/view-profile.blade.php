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
                    <div class="col-md-4 offset-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h3> View  Profile
{{--                                    <a class="btn btn-success float-right" href="{{route('users.add')}}"> Add User </a>--}}
                                </h3>

                            </div>
                            <!-- Profile Image -->
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle"
                                             src="{{(!empty($user->image))?url('upload/user_images/'.$user->image):url('upload/no-image.png')}}"
                                             alt="User profile picture">
                                    </div>

                                    <h3 class="profile-username text-center"> {{$user->name}}  </h3>

                                    <p class="text-muted text-center"> {{$user->address}}  </p>

                                    <table class="table table-bordered" >
                                        <tbody>
                                        <tr>
                                            <td> Mobile No </td>
                                            <td> {{$user->mobile}} </td>
                                        </tr>

                                        <tr>
                                            <td> Email </td>
                                            <td> {{$user->email}} </td>
                                        </tr>

                                        <tr>
                                            <td> Gender </td>
                                            <td> {{$user->gender}} </td>
                                        </tr>


                                        </tbody>
                                    </table>

                                    <a href="{{route('profiles.edit')}}" class="btn btn-primary btn-block"><b> Edit Profile </b></a>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>


@endsection
