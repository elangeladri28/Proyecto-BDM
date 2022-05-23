<?php
//Vista para secciones

class NewsVidsView extends NewsVids
{
    public function showNewsVidById($newsVideoId)
    {
        
        $results = $this->getNewsVidById($newsVideoId);
        return $results;
    }

    public function showNewsVidByNews($videoOwnerNews)
    {

        $results = $this->getNewsVidByNews($videoOwnerNews);
        return $results;
    }
}