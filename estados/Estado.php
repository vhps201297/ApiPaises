<?php
    include_once '../db.php';
    class Estado extends DB{
        function getStates(){
            $query = $this->connect()->query("SELECT * FROM estado");
            return $query;
        }

        function getStatesByCountryId($countryId){
            $query = $this->connect()->prepare("SELECT * FROM estado WHERE pais_id= :id");
            $query->execute(['id' => $countryId]);
            return $query;
        }

        function getStateById($id){
            $query = $this->connect()->prepare("SELECT * FROM estado WHERE id_estado = :id");
            $query->execute(['id' => $id]);
            return $query;
        }

        function updateState($item){
            $query = $this->connect()->prepare("UPDATE estado SET nombre = :nombre, pais_id = :pais_id, updated_at=now() WHERE id_estado = :id");
            $query->execute(['nombre' => $item['nombre'], 
                            'pais_id' => $item['pais_id'], 
                            'id' => $item['id']]);
            return $query;
        }

        function newState($item){
            $query = $this->connect()->prepare("INSERT INTO estado (nombre,pais_id,created_at) VALUES (:nombre, :pais_id, now())");
            $query->execute(['nombre' => $item['nombre'], 'pais_id' => $item['pais_id']]);
            return $query;
        }

        function deleteState($id){
            $query = $this->connect()->prepare("DELETE FROM estado WHERE id_estado= :id");
            $query->execute(['id' => $id]);
            return $query;
        }
    }
?>