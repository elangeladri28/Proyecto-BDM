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

    protected function setSeccion($categoryName, $categoryImage, $categoryOrder)
    {

        $sql = "CALL abcSeccion(?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $insertSucc = $stmt->execute(["set", 0, $categoryName, $categoryImage, $categoryOrder, 1]);
        return $insertSucc;
    }

    protected function editSeccion($categoryId, $categoryName, $categoryImage, $categoryOrder)
    {
        if ($categoryImage == 0) {
            $sql = "CALL abcSeccion(?,?,?,?,?,?)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute(["editNoPic",$categoryId,$categoryName,$categoryImage,$categoryOrder,0]);
        } else {
            $sql = "CALL abcSeccion(?,?,?,?,?,?)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute(["editPic",$categoryId, $categoryName, $categoryImage, $categoryOrder, 0]);
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
