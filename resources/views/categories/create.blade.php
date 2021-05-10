@extends('adminlte::page')

@section('title',  'Create category')

@section('content_header')
    <h1>Create new category</h1>
@endsection

@section('content')
    <div class="container">
        @include('partials.errors')
        <form action="{{route('categories.store')}}" method="POST">
            @include('categories._form', ['btnText' => 'Save', 'action' => 'create'])
        </form>
    </div>
@endsection
