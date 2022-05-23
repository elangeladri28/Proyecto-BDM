<?php
//Modelo para secciones

class NewsComms extends Dbh
{

    protected function getCommentById($commentId)
    {

        $sql = "CALL abcNewscomms(?,?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(["getById", $commentId, 0, 0, 0, 0, 0]);

        $results = $stmt->fetchAll();
        return $results;
    }

    protected function getCommentByNews($commentOwnerNews)
    {

        $sql = "CALL abcNewscomms(?,?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(["getByNews", 0, 0, 0, $commentOwnerNews, 0, 0]);

        $results = $stmt->fetchAll();
        return $results;
    }

    protected function setComment($isMainComment, $commentReplied, $commentOwnerNews, $commentOwnerUser, $commentText)
    {

        $sql = "CALL abcNewscomms(?,?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $insertSucc = $stmt->execute(["set", 0, $isMainComment, $commentReplied, $commentOwnerNews, $commentOwnerUser, $commentText]);
        return $insertSucc;
    }

    protected function delComment($commentId){
        $sql = "CALL abcNewscomms(?,?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(["delete", $commentId, 0, 0, 0, 0, 0]);
    }
}