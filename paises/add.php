<?php

    include_once 'ApiPais.php';
    
    $api = new ApiPais();

    if(isset($_POST['nombre'])){

        $nombre = $_POST['nombre'];
        $api->add($nombre);
    }else{
        $api->error('Error al llamar a la API');
    }


    
?>