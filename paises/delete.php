<?php

    include_once 'ApiPais.php';
    
    $api = new ApiPais();

    if(isset($_POST['id'])){

        $id = $_POST['id'];
        $api->remove($id);
    }else{
        $api->error('Error al llamar a la API');
    }


    
?>