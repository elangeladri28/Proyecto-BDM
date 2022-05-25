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

    protected function returnNoticia($newsId, $editorComment)
    {

        $sql = "CALL abcNoticia(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(["return",$newsId, 0, 0, 0, 0, 0, $editorComment, 0, 0, 0, 0, 0, 0]);
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

    protected function getNoticiasTerminadas()
    {

        $sql = "CALL abcNoticia(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(["getTerm",0,0,0,0,0,0,0,0,0,0,0,0,0]);
        $results = $stmt->fetchAll();
        return $results;
    }

    protected function getTerminadasUser($creatorUser)
    {

        $sql = "CALL abcNoticia(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(["termUser",0,0,0,0,$creatorUser,0,0,0,0,0,0,0,0]);
        $results = $stmt->fetchAll();
        return $results;
    }

    protected function getPublicadasUser($creatorUser)
    {

        $sql = "CALL abcNoticia(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(["pubUser",0,0,0,0,$creatorUser,0,0,0,0,0,0,0,0]);
        $results = $stmt->fetchAll();
        return $results;
    }
    
    protected function getEnRedaccionUser($creatorUser)
    {

        $sql = "CALL abcNoticia(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(["redUser",0,0,0,0,$creatorUser,0,0,0,0,0,0,0,0]);
        $results = $stmt->fetchAll();
        return $results;
    }

    protected function getNoticiasUrgentes()
    {

        $sql = "CALL abcNoticia(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(["getUrg",0,0,0,0,0,0,0,0,0,0,0,0,0]);
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

    protected function searchNews($searchFechaDesde, $searchFechaHasta, $searchText, $searchKeyword)
    {

        if ($searchFechaDesde == "") {

            $fechaDesdeString = "";
        } else {

            $fechaDesdeString = " AND publishDate > '" . $searchFechaDesde . "'";
        }
        if ($searchFechaHasta == "") {

            $fechaHastaString = "";
        } else {

            $fechaHastaString = " AND publishDate < '" . $searchFechaHasta . "'";
        }
        if ($searchText == "") {

            $textString = "";
        } else {

            $textString = " AND (newsTitle LIKE '%$searchText%' OR newsDescription LIKE '%$searchText%' OR newsText LIKE '%$searchText%')";
        }
        if ($searchKeyword == "") {

            $keywordString = "";
        } else {

            $keywordString = " AND keyWords LIKE '%$searchKeyword%'";
        }
        $sql = "SELECT newsId, newsTitle, newsDescription, newsText, creatorUser, newsStatus, editorComment, newsPlace, newsDate, publishDate,
        signature, keyWords, important, likes, active FROM news WHERE newsTitle!=''" . $fechaDesdeString . $fechaHastaString . $textString . $keywordString . " AND newsStatus='Publicada' ORDER BY publishDate DESC";
        //echo $sql;
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();
        return $results;
    }
}
