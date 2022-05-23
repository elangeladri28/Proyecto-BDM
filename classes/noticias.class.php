<?php
//Modelo para noticias

class Noticias extends Dbh
{

    protected function getNoticiaById($newsId)
    {

        $sql = "CALL abcNoticia(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(["get", $newsId, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]);

        $results = $stmt->fetchAll();
        return $results;
    }

    protected function setNoticia($newsTitle, $newsDesc, $newsText, $newsCreator, $newsStatus, $newsPlace, $newsDate, $newsSign, $newsKeywords, $newsImportant)
    {

        $sql = "CALL abcNoticia(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $insertSucc = $stmt->execute(["set", 0, $newsTitle, $newsDesc, $newsText, $newsCreator, $newsStatus, 0, $newsPlace, $newsDate, $newsSign, $newsKeywords, $newsImportant, 0]);
        $results = $stmt->fetchAll();
        return $results;
    }

    protected function editNoticia($newsId, $newsTitle, $newsDesc, $newsText, $newsStatus, $editorComment, $newsPlace, $newsDate, $newsSign, $newsKeywords, $newsImportant, $newsLikes)
    {
        $sql = "CALL abcNoticia(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(["edit", $newsId, $newsTitle, $newsDesc, $newsText, 0, $newsStatus, $editorComment, $newsPlace, $newsDate, $newsSign, $newsKeywords, $newsImportant, $newsLikes]);
    }

    protected function acceptNoticia($newsId)
    {

        $sql = "CALL abcNoticia(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(["accept",$newsId, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]);
    }

    protected function delNoticia($newsId)
    {

        $sql = "CALL abcNoticia(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(["delete", $newsId, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]);
    }

    protected function getNoticiasRecientes()
    {

        $sql = "CALL abcNoticia(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(["getRec",0,0,0,0,0,0,0,0,0,0,0,0,0]);
        $results = $stmt->fetchAll();
        return $results;
    }

    protected function getNextId()
    {

        $sql = "CALL abcNoticia(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(["getNextId",0,0,0,0,0,0,0,0,0,0,0,0,0]);
        $results = $stmt->fetchAll();
        return $results;
    }
}
