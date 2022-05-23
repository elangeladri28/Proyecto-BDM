<?php
//Vista para secciones

class NoticiasView extends Noticias
{
    public function showNoticiasRecientes()
    {
        
        $results = $this->getNoticiasRecientes();
        return $results;
    }

    public function showNoticiaById($newsId)
    {
        
        $results = $this->getNoticiaById($newsId);
        return $results;
    }
}