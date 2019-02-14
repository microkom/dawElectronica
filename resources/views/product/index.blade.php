@extends('layouts.master')


@section('content1')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 titulo-centrado">
        <h1>{{$product->brand}} {{$product->model}}</h1>

    </div>
    <span class="productIdDetail d-none">{{$product->id}}</span>
    <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center border border-danger">
        <img src="{{url('images/'.$product['id'])}}.png" style="width: 390px; heigth: 200px" alt="prueba">
        <div class="row price">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4 border border-danger">
                {{$product->price}} € 
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4 border border-danger">
                <!--<a class="heart"></a>-->
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4 border border-danger"> 
                <button class="btn btn-warning">
                    <span class="glyphicon glyphicon-shopping-cart shopDetail">Carrito</span>
                </button>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-xs-12 border border-danger">

        <h4>Especificaciones: </h4>
        @php
        echo nl2br(htmlentities($product->specifications,ENT_QUOTES,'UTF-8'))
        @endphp 
        <br>
        <h4>Descripción: </h4>
        {{$product->description}}



    </div>

</div>

@stop