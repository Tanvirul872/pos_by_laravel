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
                                    Add Category
                                    <a class="btn btn-success float-right" href="{{route('categories.view')}}"> View Category </a>
                                </h3>

                                <div class="card-body">

                                    <form method="post" action="{{route('categories.store')}}" id="myForm">
                                        {{csrf_field()}}

                                        <div class="form-group">

                                            <label> Customer name </label>
                                            <input type="text" name="name" class="form-control" id="name"  placeholder="Enter category name"> <br/>

                                            <!-- <small style="color:red">  sdsd</small> -->
                                        </div>

                                        <button type="submit" value="submit" class="btn btn-primary"> submit </button>
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
