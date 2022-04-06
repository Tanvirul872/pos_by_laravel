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
                                    Add purchase
                                    <a class="btn btn-success float-right" href="{{route('products.view')}}"> View Purchase </a>
                                </h3>

                                <div class="card-body">

                                        <div class="form-group">
                                            <div class="row">

                                                <div class="col-md-4">
                                                    <label> Date </label>
                                                    <input  type="date" name="date" id="date" class="form-control"  placeholder="Enter product name"> <br/>

                                                </div>
                                                <div class="col-md-4">
                                                    <label class="col-md-6"> Purchase No </label>
                                                    <input type="text" name="purchase_no" id="purchase_no" class="form-control"  placeholder="Enter product code"> <br/>
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="supplier_id"> Supplier name </label>
                                                    <select name="supplier_id" id="supplier_id" class="form-control">
                                                        <option value="">Select Supplier</option>
                                                        @foreach($suppliers as $supplier)
                                                            <option value="{{$supplier->id}}"> {{$supplier->name}}  </option>
                                                        @endforeach
                                                    </select>

                                                </div>

                                            </div>

                                            <div class="row">


                                                <div class="col-md-4">

                                                    <label for="category_id"> Category name </label>
                                                    <select name="category_id" id="category_id" class="form-control">
                                                        <option value="">Select Category</option>
                                                        @foreach($categories as $category)
                                                            <option value="{{$category->id}}"> {{$category->name}}  </option>
                                                        @endforeach
                                                    </select>

                                                </div>

                                                <div class="col-md-4">

                                                    <label for="category_id"> Product name </label>
                                                    <select name="product_id" id="product_id" class="form-control">
                                                        <option value=""> Select Product </option>

                                                        @foreach($products as $product)
                                                            <option value="{{$product->id}}"> {{$product->name}}  </option>
                                                        @endforeach

                                                    </select>
                                                </div>

                                                <div class="form-group col-md-2 addeventmore" onclick="myFunction()" style="padding-top:32px; ">
                                                    <i class="btn btn-primary"> + Add Item </i>
                                                </div>
                                            </div>
                                        </div>

{{--                                        <button type="submit" value="submit" class="btn btn-primary"> submit </button>--}}

                                </div>

                                <div class="card-body">
                                    <form method="post" action="{{route('purchase.store')}}" id="myForm">
                                      @csrf
{{--                                        <table id="myTable">--}}
{{--                                            <tr>--}}
{{--                                                <td>Row1 cell1</td>--}}
{{--                                                <td>Row1 cell2</td>--}}
{{--                                            </tr>--}}
{{--                                            <tr>--}}
{{--                                                <td>Row2 cell1</td>--}}
{{--                                                <td>Row2 cell2</td>--}}
{{--                                            </tr>--}}
{{--                                            <tr>--}}
{{--                                                <td>Row3 cell1</td>--}}
{{--                                                <td>Row3 cell2</td>--}}
{{--                                            </tr>--}}
{{--                                        </table>--}}

                                        <table class="table table-bordered" id="myTable">
                                            <thead>
                                            <tr>
                                                <th>Category<th>
                                                <th>Product name<th>
                                                <th>Pcs/Kg<th>
                                                <th> Unit Price <th>
                                                <th> Description <th>
                                                <th> Total price <th>
                                                <th> Action <th>
                                            </tr>
                                            </thead>

                                            <tbody id="addRow" class="addRow">

                                            </tbody>
                                            <tbody>
                                            <tr>
                                                <td colspan="10"></td>
                                                <td>
                                                    <input type="text" name="estimated_amount" value="0" id="estimated_amount"
                                                    class="form-control text-right estimated_amount" readonly style="background:yellow; "
                                                    >
                                                </td>

                                            </tr>
                                            </tbody>
                                        </table>
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



<script id="document-template" type="text/x-handlebars-template">

    <tr class="delete_add_more_item" id="delete_add_more_item">
        <input type="hidden" name="date[]" value="@{{date}}">
        <input type="hidden" name="purchase_no[]" value="@{{purchase_no}}">
        <input type="hidden" name="supplier_id[]" value="@{{supplier_id}}">
        <td>
            <input type="hidden" name="category_id[]" value="@{{category_id}}">
            @{{  category_name }}
        </td>
        <td>
            <input type="hidden" name="product_id[]" value="@{{product_id}}">
            @{{  product_name }}
        </td>
        <td>
            <input type="number" min="1" class="form-control text-right buying_qty" name="buying_qty[]" value="1">
        </td>
        <td>
            <input type="number" min="1" class="form-control text-right unit_price" name="unit_price[]" value="">
        </td>
        <td>
            <input type="number" min="1" class="form-control text-right unit_price" name="description[]" value="">
        </td>
        <td>
            <input type="number" min="1" class="form-control text-right unit_price" name="buying_price[]" value="0">
        </td>
        <td>
            <i class="btn btn-danger btn-sm fa fa-window-close removeeventmore"></i>
        </td>

    </tr>

</script>


<script>

    function myFunction() {

        $(document).ready(function(){

                var table = document.getElementById("myTable");
                var row = table.insertRow(0);
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);
                var cell4 = row.insertCell(3);
                var cell5 = row.insertCell(4);
                var cell6 = row.insertCell(5);
                var cell7 = row.insertCell(6);
                var cell8 = row.insertCell(7);

            cell1.innerHTML = date;
            cell2.innerHTML = purchase_no;
            cell3.innerHTML = product_name;
            cell4.innerHTML = supplier_name;
            cell5.innerHTML = category_id;
            cell6.innerHTML = category_name;
            cell7.innerHTML = product_id;
            cell8.innerHTML = product_name;


                var date = $('#date').val();
                var purchase_no = $('#purchase_no').val();
                var supplier_id = $('#supplier_id').val();
                var supplier_name = $('#supplier_name').find('option:selected').text();
                var category_id = $('#category_id').val();
                var category_name = $('#category_name').find('option:selected').text();
                var product_id = $('#product_id').val();
                var product_name = $('#product_name').find('option:selected').text();



                if(date==''){
                    $.notify("Date is required", {globalposition: 'top right',classname: 'error'});
                    return false;
                }
                if(purchase_no == ''){
                    $.notify("Purchase no is required", {globalposition: 'top right',classname: 'error'});
                    return false;
                }
                if(supplier_id == ''){
                    $.notify("Supplier Id no is required", {globalposition: 'top right',classname: 'error'});
                    return false;
                }

                if(category_id == ''){
                    $.notify("Category id no is required", {globalposition: 'top right',classname: 'error'});
                    return false;
                }
                if(product_id == ''){
                    $.notify("Product  id no is required", {globalposition: 'top right',classname: 'error'});
                    return false;
                }




                var source = $("#document-template").html();
                var template = Handlebars.compile(source);
                var data = {
                    date:date,
                    purchase_no:purchase_no,
                    supplier_id:supplier_id,
                    supplier_name:supplier_name,
                    category_id:category_id,
                    category_name:category_name,
                    product_id:product_id,
                    product_name:product_name
                };
                var html = template(data);

                alert(html);

                $("#addRow").append(html);


            $(document).on("click",".removeeventmore",function(event){
                $(this).closest(".delete_add_more_item").remove();
                totalAmountPrice();
            });





        });

    }



</script>



<script type="text/javascript">

    // $(document).on("click",".addeventmore",function(){
    //
    //     alert('hello world');
    //
    // });

    $(document).ready(function(){
        $(document).on("click",".addeventmore",function(){

            alert('hello world');

            var date = $('#date').val();
            var purchase_no = $('#purchase_no').val();
            var supplier_id = $('#supplier_id').val();
            var supplier_name = $('#supplier_name').find('option:selected').text();
            var category_id = $('#category_id').val();
            var category_name = $('#category_name').find('option:selected').text();
            var product_id = $('#product_id').val();
            var product_name = $('#product_name').find('option:selected').text();

            if(date==''){
                $.notify("Date is required", {globalposition: 'top right',classname: 'error'});
                return false;
            }
            if(purchase_no == ''){
                $.notify("Purchase no is required", {globalposition: 'top right',classname: 'error'});
                return false;
            }
            if(supplier_id == ''){
                $.notify("Supplier Id no is required", {globalposition: 'top right',classname: 'error'});
                return false;
            }

            if(category_id == ''){
                $.notify("Category id no is required", {globalposition: 'top right',classname: 'error'});
                return false;
            }
            if(product_id == ''){
                $.notify("Product  id no is required", {globalposition: 'top right',classname: 'error'});
                return false;
            }
            var source = $("#document-template").html();
            var template = Handlebars.compile(source);
            var data = {
                date:date,
                purchase_no:purchase_no,
                supplier_id:supplier_id,
                supplier_name:supplier_name,
                category_id:category_id,
                category_name:category_name,
                product_id:product_id,
                product_name:product_name
            };
            var html = template(data);
            $("#addRow").append(html);
        });

        $(document).on("click",".removeeventmore",function(event){
            $(this).closest(".delete_add_more_item").remove();
            totalAmountPrice();
        });

    });

</script>



