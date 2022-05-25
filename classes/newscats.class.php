<?php
//Modelo para secciones

class Newscats extends Dbh
{

    protected function getNewscatsById($newsCategoryId)
    {

        $sql = "CALL abcNewscats(?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(["getById",$newsCategoryId,0,0]);

        $results = $stmt->fetchAll();
        return $results;
    }

    protected function getNewscatsByNews($newsId)
    {

        $sql = "CALL abcNewscats(?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(["getByNews",0,$newsId,0]);

        $results = $stmt->fetchAll();
        return $results;
    }

    protected function getNewscatsByCat($categoryRelation)
    {

        $sql = "CALL abcNewscats(?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(["getByCat",0,0,$categoryRelation]);

        $results = $stmt->fetchAll();
        return $results;
    }

    protected function exists($newsId,$categoryId)
    {

        $sql = "CALL abcNewscats(?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $results = $stmt->execute(["exists",0,$newsId,$categoryId]);
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

    protected function delNewsCatsByNews($newsId){
        $sql = "CALL abcNewscats(?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(["delByNews", 0, $newsId, 0]);
    }
}