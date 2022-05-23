<?php
//Controlador para secciones

class NewsImgsContr extends NewsImgs
{

    public function createNewsImg($imageFile, $imageOwnerNews, $imageDescription)
    {

        $result = $this->setNewsImg($imageFile, $imageOwnerNews, $imageDescription);
        return $result;
    }

    public function modifyNewsImg($newsImageId, $imageFile, $imageDescription)
    {

        $this->editNewsImg($newsImageId, $imageFile, $imageDescription);
    }

    public function deleteNewsImg($newsImageId){

        $this->delNewsImg($newsImageId);
    }
}