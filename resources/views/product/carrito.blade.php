@extends('layouts.detail')

@section('content')

@if(count($productos)==0)
<div class="text-justify">
<h3 >Aún no has seleccionado ningún producto para comprar. Entra en nuestra sección de novedades</h3>
<a class="text-right" href="/">Novedades</a>
</div>
@else
    
<form action="#" method="post">
    <div class="tituloCategoria">
        <h1>LISTADO DEL CARRITO</h1>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Unidades</th>
                <th>Precio</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @php
            @endphp
            @foreach($productos as $producto)
            <tr>
                <td>{{$producto->brand}} {{$producto->model}} </td>
                @php
                $id = $producto->id;
                $price = $producto->price;
                @endphp


                <td class="text-center">
                    <span id="uds{{$producto->id}}" class="cantidad ">
                        <span class="d-none priceDB">{{$producto->price}}</span>
                        <span class="valor">{{$producto->cant}}</span>
                        <span class="btn btn-sm btn-success mas text-center">+</span> 
                        <span class="btn btn-sm btn-danger menos">-</span>
                    </span>
                <td class="text-center">
                    <span id="price{{$producto->id}}" >{{$producto->cant*$producto->price}}</span>
                </td>
                <td class="text-center">
                    <span class="btn btn-danger borrarLinea" >Borrar</span>
                </td>
            </tr>
        </tbody>
        @endforeach
        <tfoot>
            <tr>

                <td>€</td>
                <td></td>
                <td></td>
                <td class="text-center"><input type="submit" value="Realizar compra" name="compra" id="compra"></td>
            </tr>
        </tfoot>
    </table>

</form>

@endif

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

@stop