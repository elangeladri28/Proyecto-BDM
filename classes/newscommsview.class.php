<?php
//Vista para secciones

class NewsCommsView extends NewsComms
{
    public function showCommentById($commentId)
    {
        
        $results = $this->getCommentById($commentId);
        return $results;
    }

    public function showMainCommentByNews($commentOwnerNews)
    {

        $results = $this->getMainCommentByNews($commentOwnerNews);
        return $results;
    }

    public function showReplyByMainComment($commentReplied)
    {

        $results = $this->getReplyByMainComment($commentReplied);
        return $results;
    }
}