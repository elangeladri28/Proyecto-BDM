<?php
//Vista para secciones

class NewsCatsView extends NewsCats
{
    public function showNewscatsById($newsCategoryId)
    {
        
        $results = $this->getNewscatsById($newsCategoryId);
        return $results;
    }

    public function showNewscatsByNews($newsId)
    {
        
        $results = $this->getNewscatsByNews($newsId);
        return $results;
    }

    public function showNewscatsByCat($categoryRelation)
    {
        
        $results = $this->getNewscatsByCat($categoryRelation);
        return $results;
    }

    public function newsCatExists($newsId,$categoryId)
    {
        
        $results = $this->exists($newsId,$categoryId);
        return $results;
    }
}