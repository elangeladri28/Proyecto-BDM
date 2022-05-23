<?php
//Modelo para secciones

class Newscats extends Dbh
{

    protected function getNewscatsById($newsCategoryId)
    {

        $sql = "CALL abcNewscats(?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(["get",$newsCategoryId,0,0]);

        $results = $stmt->fetchAll();
        return $results;
    }

    protected function setNewscats($newsRelation, $categoryRelation)
    {

        $sql = "CALL abcNewscats(?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $insertSucc = $stmt->execute(["set", 0, $newsRelation, $categoryRelation]);
        return $insertSucc;
    }

    protected function editNewscats($newsCategoryId, $newsRelation, $categoryRelation)
    {
        $sql = "CALL abcNewscats(?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(["edit",$newsCategoryId, $newsRelation, $categoryRelation]);
    }
}