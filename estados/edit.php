<?php

    include_once 'ApiEstado.php';
    
    $api = new ApiEstado();

    if(isset($_POST['nombre']) && isset($_POST['pais_id']) && isset($_POST['id'])){
        $item = array(
                    'nombre' => $_POST['nombre'],
                    'pais_id' => $_POST['pais_id'],
                    'id' => $_POST['id']
                );
        $api->edit($item);
    }else{
        $api->error('Error al llamar a la API');
    }
    
?>