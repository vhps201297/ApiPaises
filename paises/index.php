<?php
    include_once 'ApiPais.php';

    $apiPais = new ApiPais();
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        if(is_numeric($id)){
            $apiPais->getById($id);
        }else{
            $apiPais->error("Parámetro no permitido");
        }
    }else{
        $apiPais->getAll();
    }
    
?>