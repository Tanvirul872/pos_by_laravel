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
                                 Edit Supplier
                                    <a class="btn btn-success float-right" href="{{route('customers.view')}}"> View customers</a>
                                </h3>

                                <div class="card-body">

                                    <form method="post" action="{{route('customers.update',$editData->id)}}" id="myForm">
                                        {{csrf_field()}}

                                        <div class="form-group">
                                            <label> Supplier name </label>
                                            <input type="text" name="name" class="form-control" id="name" value="{{$editData->name}}"  placeholder="Enter customer name"> <br/>
                                            <label> Supplier mobile no </label>
                                            <input type="text" name="mobile_no" class="form-control" id="mobile_no" value="{{$editData->mobile_no}}" placeholder="Enter customer mobile">  <br/>
                                            <label> Supplier Email </label>
                                            <input type="email" name="email" class="form-control" id="email" value="{{$editData->email}}" placeholder="Enter customer email"> <br/>
                                            <label> Supplier address </label>
                                            <input type="text" name="address" class="form-control" id="address" value="{{$editData->address}}" placeholder="Enter address"> <br/>



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
