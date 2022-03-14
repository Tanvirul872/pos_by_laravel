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
                                    @if(isset($editdata))
                                        Edit  Brand
                                    @else
                                        Add  Brand
                                    @endif

                                    <a class="btn btn-success float-right" href="{{route('brand.view')}}"> View Brand</a>
                                </h3>

                                <div class="card-body">

                                    <form method="post" action="{{(@$editdata)?route('brand.update',$editdata->id):route('brand.store')}}" id="myForm">
                                        {{csrf_field()}}

                                        <div class="form-group">
                                            <label> Category name </label>
                                            <input type="text" name="name" class="form-control" id="name" value="{{@$editdata->name}}" placeholder="Enter name">
                                            <small style="color:red"> {{($errors->has('name'))?($errors->first('name')):''}}</small>
                                        </div>

                                        <button type="submit" value="submit" class="btn btn-primary">{{(@$editdata)?"Update":"Submit"}}   </button>
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
