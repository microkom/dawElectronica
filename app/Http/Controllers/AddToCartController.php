<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

class AddToCartController extends Controller {

    public function __construct() {

        \Session::forget('carrito');

        if (!\Session::has('carrito')) {
            \Session::put('carrito', array());
        }
    }

    public function getCarrito() {
        //$this->eachProductCart();
        return view('product.carrito');//, array('productos' => \Session::get('carrito')));
    }

    public function addCarrito($id) {
        $producto = Product::find($id);
        if ($producto == null)
            return 1;

        if (count(\Session::get('carrito')) != 0) {
            $productos = \Session::get('carrito');
            foreach ($productos as $key => $valor) {
                if ($valor->id == $id) {
                    $productos[$key]->cant++;
                    \Session::put('carrito', $productos);
                    return 0;
                }
            }
            $producto->cant = 1;
            array_push($productos, $producto);
            \Session::put('carrito', $productos);

            return 0;
        } else {
            $producto->cant = 1;
            $productos = [$producto];
            \Session::put('carrito', $productos);
            return 0;
        }
    }

    /**
     * Resta una unidad del producto seleccionado
     * @param type $id Id del producto
     * @return int
     */
    public function unoMenosCarrito($id) {
        /**
         * Comprobación en base de datos de existencia
         */
        $producto = Product::find($id);
        if ($producto == null)
            return 1;
   
        if (count(\Session::get('carrito')) != 0) {

            /**
             * Recorre todos el carrito comprobando si el producto ya está agregado
             */
            $productos = \Session::get('carrito');     
            foreach ($productos as $key => $valor) {    
                if ($valor->id == $id) {                
                    
                     /**
                     * Resta una unidad al producto seleccionado
                     */
                    $productos[$key]->cant--;
                    if ($productos[$key]->cant == 0) {
                        $this->delCarrito($id);
                        return 2;
                    }
                    return 0;
                }
            }
            return 1;
      /*      foreach ($_SESSION['carrito'] as $key => $valor) {
                if ($valor->id == $id) {
                    $_SESSION['carrito'][$key]->cant--;
                    if ($_SESSION['carrito'][$key]->cant == 0) {
                        return 2;
                    }
                    return 0;
                }
            }
            return 1;*/
        } else {
            return 1;
        }
    }

    /**
     * Borra el producto sin importar la cantidad
     * @param type $id Id del producto
     * @return int Resultado de la operación
     */
    public function delCarrito($id) {
        $productos = \Session::get('carrito');     
            foreach ($productos as $key => $valor) {    
            if ($valor->id == $id) {

                /**
                 * Elimiina del array un producto
                 */
                unset($productos[$key]);
                \Session::put('carrito', $productos);
                return 0;
            }
        }
        return 1;
    }

    /**
     * Calcula el precio de cada producto en relación con la cantidad dentro 
     * del carrito
     */
    public function eachProductCart() {
        $total = 0;
        foreach ($_SESSION['carrito'] as $key => $valor) {
            $total = ($valor->cant * $valor->price);

            /**
             * Guarda en el array el calculo del valor del producto 
             */
            $_SESSION['carrito'][$key]->totalProducto = $total;
        }
    }

}
