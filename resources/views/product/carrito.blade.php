@extends('layouts.detail')

@section('content')

<form action="#" method="post">
    <div class="tituloCategoria">
        <h1>LISTADO DEL CARRITO</h1>
    </div>
    <table class="table table-hover col-lg-12">
        <thead class="text-white bg-info text-center">
            <tr>
                <th>Producto</th>
                <th>Unidades</th>
                <th>Precio</th>
                <th>Subtotal</th>
                 <th></th>
            </tr>
        </thead>
        <tbody>
            @php
                $total = 
            @endphp
            @foreach($productos as $producto)
            <tr>
                <td><a href="/product/{{$producto->id}}">{{$producto->brand}} {{$producto->model}} </a></td>
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
       
        @endforeach 
        </tbody>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

@stop