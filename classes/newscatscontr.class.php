<?php
//Controlador para secciones

class SeccionesContr extends Secciones
{

    public function createNewscats($newsRelation, $categoryRelation)
    {

        $result = $this->setNewscats($newsRelation, $categoryRelation);
        return $result;
    }

    public function modifyNewsCats($newsCategoryId, $newsRelation, $categoryRelation)
    {

        $this->editNewscats($newsCategoryId, $newsRelation, $categoryRelation);
    }
}