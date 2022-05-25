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

    protected function getMainCommentByNews($commentOwnerNews)
    {

        $sql = "CALL abcNewscomms(?,?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(["mainByNews", 0, 0, 0, $commentOwnerNews, 0, 0]);

        $results = $stmt->fetchAll();
        return $results;
    }

    protected function getReplyByMainComment($commentReplied)
    {

        $sql = "CALL abcNewscomms(?,?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(["repByMain", 0, 0, $commentReplied, 0, 0, 0]);

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
        $sql = "SELECT deleteComment(?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$commentId]);
        $sql = "CALL abcNewscomms(?,?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(["delete", $commentId, 0, 0, 0, 0, 0]);
    }
}