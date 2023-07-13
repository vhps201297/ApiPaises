<?php
    include_once 'Pais.php';

    class ApiPais{

        function getAll(){
            $country = new Pais();
            $countries = array();
            $countries = array();

            $res = $country->getCountries();
            if($res->rowCount()){
                while($row = $res->fetch(PDO::FETCH_ASSOC)){
                    $countryItem = array(
                                    "id_pais"=>$row['id_pais'],
                                    "nombre" => $row['nombre'],
                                    "capital_id" => $row['capital_id'],
                                    "crated_at" => $row['created_at'],
                                    "updated_at" => $row['updated_at'],
                                    );
                    array_push($countries,$countryItem);
                }
                echo json_encode($countries);
            }else{
                echo json_encode(array("message" => "Sin paises"));
            }
        }

        function getById($id){
            $country = new Pais();
            $countries = array();
            $countries['pais'] = array();

            $res = $country->getCountryById($id);
            if($res->rowCount() == 1){
                $row = $res->fetch();
                $countryItem = array(
                                "id_pais"=>$row['id_pais'],
                                "nombre" => $row['nombre'],
                                "capital_id" => $row['capital_id'],
                                "crated_at" => $row['created_at'],
                                "updated_at" => $row['updated_at'],
                                );
                array_push($countries['pais'],$countryItem);
                
                //echo json_encode($countries);
                $this->printJSON($countries);
            }else{
                //echo json_encode(array("message" => "Sin paises"));
                $this->error("Sin paises");
            }
        }

        function add($nombre){
            $country = new Pais();
    
            $res = $country->newCountry($nombre);
            $this->exito('Nuevo País agregado');
        }

        function edit($item){
            $country = new Pais();
    
            $res = $country->updateCountry($item);
            $this->exito('País actualizado');
        }

        function remove($id){
            $country = new Pais();
    
            $res = $country->deleteCountry($id);
            $this->exito('País eliminado');
        }

        function error($mensaje){
            echo json_encode(array('mensaje' => $mensaje)); 
        }
    
        function exito($mensaje){
            echo json_encode(array('mensaje' => $mensaje)); 
        }
    
        function printJSON($array){
            echo json_encode($array);
        }
    }
?>
