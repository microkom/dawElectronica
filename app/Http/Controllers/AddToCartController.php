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
        return view('product.carrito'); //, array('productos' => \Session::get('carrito')));
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
                    $num = count(\Session::get('carrito'));
                    return $num;
                }
            }
            $producto->cant = 1;
            array_push($productos, $producto);
            \Session::put('carrito', $productos);
            $num = count(\Session::get('carrito'));
            return $num;
        } else {
            $producto->cant = 1;
            $productos = [$producto];
            \Session::put('carrito', $productos);
            $num = count(\Session::get('carrito'));
            return $num;
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
                $num = count(\Session::get('carrito'));
                return $num;
            }
        }
        return 1;
    }

    public function updateCartItemNumber() {
        return count(\Session::get('carrito'));
    }

}
