<?php
    include_once 'ApiEstado.php';

    $apiEstado = new ApiEstado();
    if(isset($_GET['pais_id'])){
        $countryId = $_GET['pais_id'];
        if(is_numeric($countryId)){
            $apiEstado->getByCountryId($countryId);
        }else{
            $apiEstado->error("Parámetro no permitido");
        }
    }else{
        $apiEstado->getAll();
    }
    
?>