<?php
//Modelo para secciones

class NewsLikes extends Dbh
{

    protected function setLike($newsId, $userEmail)
    {

        $sql = "CALL abcLikes(?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        try{
            $insertSucc = $stmt->execute(["set", $newsId, $userEmail]);
            return $insertSucc;
        }
        catch(Exception $e){
            return FALSE;
        }
    }

    protected function delLike($newsId, $userEmail)
    {

        $sql = "CALL abcLikes(?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(["delete", $newsId, $userEmail]);
    }

    protected function getLikesByNews($newsId)
    {

        $sql = "CALL abcLikes(?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $result = $stmt->execute(["getByNews", $newsId, 0]);
        return $result;
    }

    protected function getLikeUserNews($newsId,$userId)
    {

        $sql = "CALL abcLikes(?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $result = $stmt->execute(["getByUser", $newsId, $userId]);
        return $result;
    }
}