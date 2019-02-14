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
                <th>Precio</th>
                <th>Unidades</th>
                <th>Subtotal</th>
                 <th></th>
            </tr>
        </thead>
        <tbody>
            @php
                $total = 0;
                $i = 0;
            @endphp
            @foreach($productos as $producto)
            @php
                $total = $total + $producto->totalProducto;
            @endphp
            <tr>
                <td><a href="/product/{{$producto->id}}">{{$producto->brand}} {{$producto->model}} </a></td>
                <td>
                    <span id="priceStatic{{$producto->id}}">{{$producto->price}}</span>€
                </td>
                


                <td class="text-center">
                    <span id="uds{{$producto->id}}" class="cantidad ">
                        <span class="d-none priceDB">{{$producto->price}}</span>
                        <span class="valor">{{$producto->cant}}</span>
                        <span class="btn btn-sm btn-success mas text-center">+</span> 
                        <span class="btn btn-sm btn-danger menos">-</span>
                    </span>
                <td class="text-center">
                    <span id="price{{$producto->id}}" class="subtotal" >{{$producto->totalProducto}}</span>
                </td>
                <td class="text-center">
                    <span class="btn btn-sm btn-danger borrarLinea" >Borrar</span>
                </td>
            </tr>
            @php
                $i++;
            @endphp
       
        @endforeach 
        </tbody>
        <tfoot>
            <tr>

                <td></td>
                <td></td>
                <td></td>
                <td>Precio total: <span class="totalPrice" id="totalPrice">{{$total}}</span>€</td>
                <td class="text-center"><input type="submit" value="Realizar compra" name="compra" id="compra"></td>
                
            </tr>
        </tfoot>
    </table>

</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

@stop