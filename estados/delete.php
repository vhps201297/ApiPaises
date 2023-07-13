<?php

    include_once 'ApiEstado.php';
    
    $api = new ApiEstado();

    if(isset($_POST['id'])){

        $id = $_POST['id'];
        $api->remove($id);
    }else{
        $api->error('Error al llamar a la API');
    }


    
?>