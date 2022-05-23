<?php
//Controlador para secciones

class NewsCommsContr extends NewsComms
{

    public function createComment($isMainComment, $commentReplied, $commentOwnerNews, $commentOwnerUser, $commentText)
    {

        $result = $this->setComment($isMainComment, $commentReplied, $commentOwnerNews, $commentOwnerUser, $commentText);
        return $result;
    }

    public function deleteComment($commentId){

        $this->delComment($commentId);
    }
}