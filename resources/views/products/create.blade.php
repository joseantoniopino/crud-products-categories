@extends('adminlte::page')

@section('title',  'Create new product')

@section('content_header')
    <h1>Create new product</h1>
@endsection

@section('plugins.Summernote', true)
@section('plugins.Select2', true)

@section('content')
    <div class="container">
        @include('partials.errors')
        <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
            @include('products._form', ['btnText' => 'Save', 'action' => 'create'])
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
