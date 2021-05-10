@extends('adminlte::page')

@section('title',  $product->name)

@section('content_header')
    <h1>Product: {{$product->name}}</h1>
@endsection

@section('content')
    @if(session('status'))
        <div class="alert alert-success">{{session('status')}}</div>
    @endif
    <div class="row">
        <div class="offset-2 col-8">

            <div class="card">
                <img class="card-img-top" style="width: 100%; height: 300px" src="/images/products/{{$product->image}}" alt="">
                <div class="card-body">
                    <h5 class="card-title"><strong>{{$product->name}}</strong></h5>
                    <p class="card-text">{!! $product->description !!}</p>
                    <ul>
                        <li><strong>Category:</strong> {{$product->category->name}}</li>
                        <li><strong>Price:</strong> {{$product->price}}</li>
                        <li><strong>In Stock:</strong> {{$product->with_stock ? "Yes" : "No"}}</li>
                    </ul>
                </div>
                <div class="card-footer">
                    <a href="{{route('products.index')}}" class="btn btn-info float-right ml-1"><i class="fa fa-list"></i> List</a>
                    <a href="{{route('products.edit', $product->id)}}" class="btn btn-primary float-right"><i class="fa fa-edit"></i> Edit</a>
                </div>
            </div>
        </div>
    </div>
@endsection
