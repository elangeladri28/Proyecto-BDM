<?php
//Controlador para secciones

class NewsVidsContr extends NewsVids
{

    public function createNewsVid($videoPath, $videoOwnerNews, $videoDescription)
    {

        $result = $this->setNewsVid($videoPath, $videoOwnerNews, $videoDescription);
        return $result;
    }

    public function modifyNewsVid($newsVideoId, $videoPath, $videoDescription)
    {

        $this->editNewsVid($newsVideoId, $videoPath, $videoDescription);
    }

    public function deleteNewsVid($newsVideoId){

        $this->delNewsVid($newsVideoId);
    }

    public function showNextVideoId()
    {

        $result = $this->getNextVideoId();
        return $result;
    }
}