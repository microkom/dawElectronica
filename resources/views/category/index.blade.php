@extends('layouts.master')

@section('content')
<div class="tituloCategoria font-b612">
    <h1>
        @if (isset($subCategory))
        {{$subCategory}}
        @else
        {{$category}}
        @endif
    </h1>

</div> 
@stop
@section('content1')

<p id="status"></p>
@foreach ($arrayProductos as $producto)
<div class="mx-auto">

    <div class="card ">
        <span class="hidden productId" >{{$producto->id}}</span>

        <div>
            <a href="{{url('product/'.$producto->id)}}"><img class="card-img-top" src="{{url('images/'.$producto->id)}}.png" alt="Card image cap"></a></div>
        <div class="card-body">
            <a href="{{url('product/'.$producto->id)}}"><h5 class="card-title">{{$producto->brand}} {{$producto->model}}</h5></a>
            
        </div>
        
        <div class="align-text-bottom ">   
            <p class="card-text text-center font-orbitron" id="product-price">{{$producto->price}}€</p>
        </div>
        
        
        <div class="card-footer">
            <a class="btn btn-primary shop">Comprar</a>
            <small class="text-muted">Stock {{$producto->stock}}</small>

        </div>
    </div>

</div>

@endforeach 
@stop
