<?php
//Modelo para secciones

class NewsImgs extends Dbh
{

    protected function getNewsImgById($newsImageId)
    {

        $sql = "CALL abcNewsimgs(?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(["getById",$newsImageId,0,0,0]);

        $results = $stmt->fetchAll();
        return $results;
    }

    protected function getNewsImgByNews($imageOwnerNews)
    {

        $sql = "CALL abcNewsimgs(?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(["getByNews",0,0,$imageOwnerNews,0]);

        $results = $stmt->fetchAll();
        return $results;
    }

    protected function setNewsImg($imageFile, $imageOwnerNews, $imageDescription)
    {

        $sql = "CALL abcNewsimgs(?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $insertSucc = $stmt->execute(["set", 0, $imageFile, $imageOwnerNews, $imageDescription]);
        return $insertSucc;
    }

    protected function editNewsImg($newsImageId, $imageFile, $imageDescription)
    {
        $sql = "CALL abcNewsimgs(?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(["edit",$newsImageId, $imageFile, 0, $imageDescription]);
    }

    protected function delNewsImg($newsImageId){
        $sql = "CALL abcNewsimgs(?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(["delete",$newsImageId, 0, 0, 0]);
    }
}