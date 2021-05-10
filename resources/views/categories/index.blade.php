@extends('adminlte::page')

@section('title', 'Products table')

@section('content_header')
    <h1>Categories</h1>
@endsection

@section('content')
@if(session('status'))
    <div class="alert alert-success">{{session('status')}}</div>
@endif
@php($i = 0)
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="accordion" id="accordionExample">
                @foreach($categories as $category)
                    <div class="card">
                        <div class="card-header" id="cat_{{$i}}">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#{{$category->name}}" aria-controls="{{$category->name}}">
                                    {{$category->name}} ({{$category->products->count()}})
                                </button>
                            </h2>
                        </div>
                        <div id="{{$category->name}}" class="collapse" data-parent="#cat_{{$i}}">
                            <div class="card-body">
                                <ul>
                                    @foreach($category->products as $product)
                                        <li>{{$product->name}}: {{$product->price}}€</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="card-header">
                            <a class="btn btn-success" href="{{route('categories.edit', $category)}}"><i class="fa fa-edit"> Edit</i></a>
                            <form action="{{route('categories.destroy', $category)}}" method="POST" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" href="{{route('categories.destroy', $category)}}"><i class="fa fa-trash"> Delete</i></button>
                            </form>
                        </div>
                    </div>
                    @php($i++)
                @endforeach
                    <a class="btn btn-primary float-right" href="{{route('categories.create')}}"><i class="fa fa-plus"> New</i></a>
            </div>
        </div>
    </div>
</div>




@endsection
