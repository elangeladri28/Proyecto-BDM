<?php
//Modelo para secciones

class Secciones extends Dbh
{

    protected function getSeccionById($categoryId)
    {

        $sql = "CALL abcSeccion(?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(["get",$categoryId,0,0,0,0]);

        $results = $stmt->fetchAll();
        return $results;
    }

    protected function setSeccion($categoryName, $categoryColor, $categoryOrder)
    {

        $sql = "CALL abcSeccion(?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        try{
            $insertSucc = $stmt->execute(["set", 0, $categoryName, $categoryColor, $categoryOrder, 1]);
            return $insertSucc;
        }
        catch(Exception $e){
            return FALSE;
        }
    }

    protected function editSeccion($categoryId, $categoryName, $categoryColor, $categoryOrder)
    {
        $sql = "CALL abcSeccion(?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        try{
            $stmt->execute(["edit",$categoryId, $categoryName, $categoryColor, $categoryOrder, 0]);
            return TRUE;
        }
        catch(Exception $e){
            return FALSE;
        }
    }

    protected function delSeccion($seccionId)
    {

        $sql = "CALL abcSeccion(?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(["delete",$seccionId,0,0,0,0]);
    }

    protected function getSecciones()
    {

        $sql = "CALL abcSeccion(?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(["getAll",0,0,0,0,0]);
        $results = $stmt->fetchAll();
        return $results;
    }
}