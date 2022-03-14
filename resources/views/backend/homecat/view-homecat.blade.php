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
                    {{--  category 1--}}
                        <div class="card">
                            <div class="card-header">
                                <div class="card-body">

                                    <form method="post" action="{{route('homecat.store')}}" id="myForm">
                                        {{csrf_field()}}


                                        <label> Home Product Category 1 </label>
                                        <select id="status" name="category_one" class="form-control mb-4">

                                            @foreach($categories as $category)
                                                <option  value="{{$category->id}}"> {{$category->name}} </option>
                                            @endforeach

                                        </select>

                                        <label> Home Product Category 2 </label>
                                        <select id="status" name="category_two" class="form-control mb-4">

                                            @foreach($categories as $category)
                                                <option  value="{{$category->id}}"> {{$category->name}} </option>
                                            @endforeach

                                        </select>


                                        <label> Home Product Category 3 </label>
                                        <select id="status" name="category_three" class="form-control mb-4">

                                            @foreach($categories as $category)
                                                <option  value="{{$category->id}}"> {{$category->name}} </option>
                                            @endforeach


                                        </select>


                                        <label> Home Product Category 4 </label>
                                        <select id="status" name="category_four" class="form-control mb-4">
                                            @foreach($categories as $category)
                                                <option  value="{{$category->id}}"> {{$category->name}} </option>
                                            @endforeach


                                        </select>

                                        <button type="submit" value="submit" class="btn btn-primary">Save</button>
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
