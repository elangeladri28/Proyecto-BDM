<?php
//Controlador para secciones

class NewsCatsContr extends NewsCats
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

    public function deleteNewsCatsByNews($newsId){

        $this->delNewsCatsByNews($newsId);
    }
}