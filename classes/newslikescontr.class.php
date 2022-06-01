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

        $result = $this->delLike($newsId, $userEmail);
        return $result;
    }
}