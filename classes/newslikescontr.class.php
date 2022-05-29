<?php
//Controlador para secciones

class NewsLikesContr extends NewsLikes
{

    public function createLike($newsId, $userEmail)
    {

        $result = $this->setLike($newsId, $userEmail);
        return $result;
    }

    public function deleteLike($newsId, $userEmail){

        $this->delLike($newsId, $userEmail);
    }
}