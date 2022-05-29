<?php
//Vista para secciones

class NewsLikesView extends NewsLikes
{
    public function showLikesByNews($newsId)
    {
        
        $results = $this->getLikesByNews($newsId);
        return $results;
    }

    public function showLikeUserNews($newsId,$userId)
    {

        $results = $this->getLikeUserNews($newsId,$userId);
        return $results;
    }
}