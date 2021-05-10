@extends('adminlte::page')

@section('title',  'Edit product ' . $product->name)

@section('content_header')
    <h1>Edit: {{$product->name}}</h1>
@endsection

@section('plugins.Summernote', true)
@section('plugins.Select2', true)

@section('content')
    <div class="container">
        @include('partials.errors')
        <form action="{{route('products.update', $product)}}" method="POST" enctype="multipart/form-data">
            @method('PATCH')
            @include('products._form', ['btnText' => 'Update', 'action' => 'edit'])
        </form>
    </div>
@endsection

@section('js')
    <script>
        $('#description').summernote({
            placeholder: 'Product description',
            tabsize: 2,
            height: 100
        });
        $('#category_id').select2();
    </script>
@endsection

