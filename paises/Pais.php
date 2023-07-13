<?php
    include_once '../db.php';
    class Pais extends DB{
        function getCountries(){
            $query = $this->connect()->query("SELECT * FROM Pais");
            return $query;
        }

        function getCountryById($id){
            $query = $this->connect()->prepare("SELECT * FROM Pais WHERE id_pais = :id");
            $query->execute(['id' => $id]);
            return $query;
        }

        function updateCountry($item){
            $query = $this->connect()->prepare("UPDATE Pais SET nombre = :nombre, capital_id = :capital_id, updated_at=now() WHERE id_pais = :id");
            $query->execute(['nombre' => $item['nombre'], 
                            'capital_id' => $item['capital_id'], 
                            'id' => $item['id']]);
            return $query;
        }

        function newCountry($nombre){
            $query = $this->connect()->prepare("INSERT INTO Pais (nombre,created_at) VALUES (:nombre, now())");
            $query->execute(['nombre' => $nombre]);
            return $query;
        }

        function deleteCountry($id){
            $query = $this->connect()->prepare("DELETE FROM Pais WHERE id_pais= :id");
            $query->execute(['id' => $id]);
            return $query;
        }
    }
?>