@extends('adminlte::page')

@section('title',  'Edit category ' . $category->name)

@section('content_header')
    <h1>Edit: {{$category->name}}</h1>
@endsection

@section('content')
    <div class="container">
        @include('partials.errors')
        <form action="{{route('categories.update', $category)}}" method="POST">
            @method('PATCH')
            @include('categories._form', ['btnText' => 'Update', 'action' => 'edit'])
        </form>
    </div>
@endsection
