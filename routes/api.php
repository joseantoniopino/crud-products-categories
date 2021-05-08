<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('products', function (){
    $data = datatables()
        ->eloquent(\App\Models\Product::query())
        ->addColumn('btn', 'products.partials.actions')
        ->rawColumns(['btn'])
        ->toJson();
    return $data;
});
