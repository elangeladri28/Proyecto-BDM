<?php
//Modelo para secciones

class NewsVids extends Dbh
{

    protected function getNewsVidById($newsVideoId)
    {

        $sql = "CALL abcNewsvids(?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(["getById",$newsVideoId,0,0,0]);

        $results = $stmt->fetchAll();
        return $results;
    }

    protected function getNewsVidByNews($videoOwnerNews)
    {

        $sql = "CALL abcNewsvids(?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(["getByNews",0,0,$videoOwnerNews,0]);

        $results = $stmt->fetchAll();
        return $results;
    }

    protected function setNewsVid($videoPath, $videoOwnerNews, $videoDescription)
    {

        $sql = "CALL abcNewsvids(?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $insertSucc = $stmt->execute(["set", 0, $videoPath, $videoOwnerNews, $videoDescription]);
        return $insertSucc;
    }

    protected function editNewsVid($newsVideoId, $videoPath, $videoDescription)
    {
        $sql = "CALL abcNewsvids(?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(["edit",$newsVideoId, $videoPath, 0, $videoDescription]);
    }

    protected function delNewsVid($newsVideoId){
        $sql = "CALL abcNewsvids(?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(["delete",$newsVideoId, 0, 0, 0]);
    }

    protected function getNextVideoId()
    {

        $sql = "CALL abcNewsvids(?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(["getNextId", 0, 0, 0, 0]);
        $results = $stmt->fetchAll();
        return $results;
    }
}