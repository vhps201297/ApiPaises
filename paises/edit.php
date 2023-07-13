<?php

    include_once 'ApiPais.php';
    
    $api = new ApiPais();

    if(isset($_POST['nombre']) && isset($_POST['capital_id']) && isset($_POST['id'])){
        $item = array(
                    'nombre' => $_POST['nombre'],
                    'capital_id' => $_POST['capital_id'],
                    'id' => $_POST['id']
                );
        $api->edit($item);
    }else{
        $api->error('Error al llamar a la API');
    }
    
?>