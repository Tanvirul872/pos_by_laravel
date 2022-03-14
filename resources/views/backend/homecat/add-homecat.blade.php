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
                                <div class="card-body">

                                    <form method="post" action="{{route('headsubmenu.store')}}" id="myForm">
                                        {{csrf_field()}}

                                        <div class="form-group">
                                            <label> Name </label>
                                            <input type="text" name="name" class="form-control" id="name">
                                            <small style="color:red"> {{($errors->has('name'))?($errors->first('name')):''}}</small>
                                        </div>

                                        <div class="form-group">
                                            <label> Link </label>
                                            <input type="text" name="link" class="form-control" id="link">
                                            <small style="color:red"> {{($errors->has('link'))?($errors->first('link')):''}}</small>
                                        </div>

                                        <label> Category </label>
                                        <select id="status" name="menu_item_id" class="form-control mb-4">

                                            @foreach($menuItems as $item)
                                                <option value="{{$item->id}}"> {{$item->name}} </option>
                                            @endforeach
                                        </select>

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
