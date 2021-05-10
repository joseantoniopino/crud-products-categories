@extends('adminlte::page')

@section('title', 'Products table')

@section('plugins.Datatables', true)
@section('plugins.Sweetalert2', true)

@section('content_header')
    <h1>Products</h1>
@endsection

@section('content')
    <a href="{{route('products.create')}}" class="btn btn-primary float-right"><i class="fa fa-plus"></i> New</a>
    <div class="box">
        <table id="products" class="table table-responsive">
            <thead>
            <tr>
                <th>Image</th>
                <th style="width: 10%;">Name</th>
                <th style="width: 50%">Description</th>
                <th>Price</th>
                <th>Stock</th>
                <th>&nbsp;</th>
            </tr>
            </thead>
        </table>
        </div>
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $('#products').DataTable({
                'serverSide': true,
                'ajax': "{{url('api/products')}}",
                'columns': [
                    {   data: 'image',
                        render: function (data, type, row){
                            return '<img class="img-bordered-sm img-thumbnail img-size-64" src="/images/products/' + data + '"/>'
                        }
                    },
                    {data: 'name'},
                    {
                        data: 'description',
                        render: function (data, type, row){
                            return $("<div/>").html(data).text();
                        }
                    },
                    {data: 'price'},
                    {
                        data: 'with_stock',
                        render: function (data, type, row) {
                            switch (data) {
                                case 1:
                                    return '<i style="color: green" class="fa fa-check">'
                                case 0:
                                    return '<i style="color: red" class="fa fa-exclamation-triangle">'
                            }
                        }
                    },
                    {data: 'btn'},
                ]
            });
        });

        function callDeleteAlert(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                console.log(result)
                if (result.isConfirmed) {
                    $.ajax({
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "id": id,
                        },
                        type: "DELETE",
                        dataType: "json",
                        url: '{{route('products.destroy')}}',
                    })
                        .done(function (data, textStatus, jqXHR) {
                            if (data.success) {
                                $('#products').DataTable().ajax.reload(null, false);
                                Swal.fire(
                                    'Deleted!',
                                     data.message,
                                    'success'
                                )
                            } else {
                                console.log(data)
                            }
                        })
                        .fail(function (jqXHR, textStatus, errorThrown) {
                            if (console && console.log) {
                                console.log("Error " + textStatus);
                            }
                        });

                }
            })
        }
    </script>

@endsection
