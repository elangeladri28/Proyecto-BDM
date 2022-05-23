<?php
//Vista para secciones

class NewsCommsView extends NewsComms
{
    public function showCommentById($commentId)
    {
        
        $results = $this->getCommentById($commentId);
        return $results;
    }

    public function showCommentByNews($commentOwnerNews)
    {

        $results = $this->getCommentByNews($commentOwnerNews);
        return $results;
    }
}