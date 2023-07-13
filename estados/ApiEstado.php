<?php
    include_once 'Estado.php';

    class ApiEstado{

        function getByCountryId($countryId){
            $state = new Estado();
            $states = array();
           // $states['estados'] = array();

            $res = $state->getStatesByCountryId($countryId);
            if($res->rowCount()){
                while($row = $res->fetch(PDO::FETCH_ASSOC)){
                    $stateItem = array(
                                    "id_estado"=>$row['id_estado'],
                                    "nombre" => $row['nombre'],
                                    "pais_id" => $row['pais_id'],
                                    "crated_at" => $row['created_at'],
                                    "updated_at" => $row['updated_at'],
                                    );
                    array_push($states,$stateItem);
                }
                echo json_encode($states);
            }else{
                echo json_encode(array("message" => "Sin estados"));
            }
        }
        function getAll(){
            $state = new Estado();
            $states = array();
            //$states['estados'] = array();

            $res = $state->getStates();
            if($res->rowCount()){
                while($row = $res->fetch(PDO::FETCH_ASSOC)){
                    $stateItem = array(
                                    "id_estado"=>$row['id_estado'],
                                    "nombre" => $row['nombre'],
                                    "pais_id" => $row['pais_id'],
                                    "crated_at" => $row['created_at'],
                                    "updated_at" => $row['updated_at'],
                                    );
                    array_push($states,$stateItem);
                }
                echo json_encode($states);
            }else{
                echo json_encode(array("message" => "Sin estados"));
            }
        }

        function getById($id){
            $state = new Estado();
            $states = array();
            //$states['estado'] = array();

            $res = $state->getStateById($id);
            if($res->rowCount() == 1){
                $row = $res->fetch();
                $stateItem = array(
                                "id_estado"=>$row['id_estado'],
                                "nombre" => $row['nombre'],
                                "pais_id" => $row['pais_id'],
                                "crated_at" => $row['created_at'],
                                "updated_at" => $row['updated_at'],
                                );
                array_push($states,$stateItem);
                
                //echo json_encode($states);
                $this->printJSON($states);
            }else{
                //echo json_encode(array("message" => "Sin estados"));
                $this->error("Sin estado");
            }
        }

        function add($item){
            $state = new Estado();
    
            $res = $state->newState($item);
            $this->exito('Nuevo estado agregado');
        }

        function edit($item){
            $state = new Estado();
    
            $res = $state->updateState($item);
            $this->exito('Estado actualizado');
        }

        function remove($id){
            $state = new Estado();
    
            $res = $state->deleteState($id);
            $this->exito('Estado eliminado');
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
