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
                <td class="text-center">
                    <span id="priceStatic{{$producto->id}}">{{$producto->price}}</span>€
                </td>



                <td class="text-center">
                    <span id="uds{{$producto->id}}" class="cantidad ">
                        <span class="d-none priceDB">{{$producto->price}}</span>
                        <span class="valor text-center">{{$producto->cant}}</span>
                        <span class="btn btn-sm btn-success mas text-center">+</span> 
                        <span class="btn btn-sm btn-danger menos text-center">-</span>
                    </span>
                <td class="text-center">
                    <span id="price{{$producto->id}}" class="subtotal" >{{$producto->totalProducto}}</span>
                </td>
                <td class="text-right ">
                    <span class="btn btn-sm btn-danger borrarLinea" >Borrar</span>
                </td>
            </tr>
            @php
            $i++;
            @endphp

            @endforeach 
        </tbody>
        <tfoot class="border bg-dark">
            <tr>                
                <td colspan="5"></td>
            </tr>
        </tfoot>
    </table>



    <table class="border border-info float-right col-lg-4">
        <thead>
        <th colspan="2" class="bg-info text-center text-white">Detalle Compra</th>
        </thead>
        <tbody class="border border-info">
            <tr class="border border-info">
                <td class="col-lg-2">Subtotal</td>
                <td class="text-right col-lg-2" >
                    <span class="text-right" id="totalBeforeTax">{{number_format(($total/1.21),2)}}</span>€
                </td>
            </tr>
            <tr class="border border-info">
                <td class="col-lg-2">Iva </td>
                <td class="text-right col-lg-2" >
                    <span class="text-right" id="totalTax">{{number_format((($total/1.21)*0.21 ),2)}}</span>€
                </td>

            </tr>
            <tr class="border border-info">
                <td class=" col-lg-2">Total</td>
                <td class="text-right col-lg-2" >
                    <span class="totalPrice" id="totalPrice">{{number_format($total ,2)}}</span>€
                </td>
            </tr>
            <tr class="border border-info col-lg-4">

                <td colspan="2" class="text-center"><input class="btn btn-dark text-white" type="submit" value="Realizar compra" name="compra" id="compra"></td>
            </tr>
        </tbody>
        <tfoot></tfoot>
    </table>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

@stop