<?php
//Controlador para noticias

class NoticiasContr extends Noticias
{

    public function createNoticia($newsTitle, $newsDesc, $newsText, $newsCreator, $newsStatus, $newsPlace, $newsDate, $newsSign, $newsKeywords, $newsImportant)
    {

        $result = $this->setNoticia($newsTitle, $newsDesc, $newsText, $newsCreator, $newsStatus, $newsPlace, $newsDate, $newsSign, $newsKeywords, $newsImportant);
        return $result;
    }

    public function modifyNoticia($newsId, $newsTitle, $newsDesc, $newsText, $newsStatus, $editorComment, $newsPlace, $newsDate, $newsSign, $newsKeywords, $newsImportant, $newsLikes)
    {

        $this->editNoticia($newsId, $newsTitle, $newsDesc, $newsText, $newsStatus, $editorComment, $newsPlace, $newsDate, $newsSign, $newsKeywords, $newsImportant, $newsLikes);
    }

    public function publishNoticia($newsId)
    {

        $this->acceptNoticia($newsId);
    }

    public function deleteNoticia($newsId)
    {

        $this->delNoticia($newsId);
    }

    public function showNextId()
    {

        $result = $this->getNextId();
        return $result;
    }
}