<?php

$data = json_decode(file_get_contents('php://input'));

$_SESSION['listaCarrito'] = array(
    array(
        $data->ob[0]->id,
        $data->ob[0]->cant,
        $data->ob[0]->price
    )
);
$_SESSION['listas'][] = $_SESSION['listaCarrito'];

$_SESSION['listaCarrito'] = null;
$data = null;
//$_SESSION['listas']=null;
return response(rand(2, 6));
?>
