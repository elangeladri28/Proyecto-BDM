<?php
//Vista para secciones

class NewsImgsView extends NewsImgs
{
    public function showNewsImgById($newsImageId)
    {
        
        $results = $this->getNewsImgById($newsImageId);
        return $results;
    }

    public function showNewsImgByNews($imageOwnerNews)
    {

        $results = $this->getNewsImgByNews($imageOwnerNews);
        return $results;
    }
}