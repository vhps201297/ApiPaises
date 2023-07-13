<?php

    include_once 'ApiEstado.php';
    
    $api = new ApiEstado();

    if(isset($_POST['nombre']) && isset($_POST['pais_id'])){
        $item = array(
                "nombre" => $_POST['nombre'],
                "pais_id" => $_POST['pais_id']
                );
        $api->add($item);
    }else{
        $api->error('Error al llamar a la API');
    }


    
?>