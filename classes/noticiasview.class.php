<?php
//Vista para secciones

class NoticiasView extends Noticias
{
    public function showNoticiaById($newsId)
    {
        
        $results = $this->getNoticiaById($newsId);
        return $results;
    }

    public function showNoticiasRecientes()
    {
        
        $results = $this->getNoticiasRecientes();
        return $results;
    }

    public function showNoticiasTerminadas()
    {
        
        $results = $this->getNoticiasTerminadas();
        return $results;
    }

    public function showTermUser($creatorUser)
    {
        
        $results = $this->getTerminadasUser($creatorUser);
        return $results;
    }

    public function showPubUser($creatorUser)
    {
        
        $results = $this->getPublicadasUser($creatorUser);
        return $results;
    }

    public function showRedUser($creatorUser)
    {
        
        $results = $this->getEnRedaccionUser($creatorUser);
        return $results;
    }

    public function showNoticiasSearch($searchFechaDesde, $searchFechaHasta, $searchText, $searchKeyword)
    {
        
        $results = $this->searchNews($searchFechaDesde, $searchFechaHasta, $searchText, $searchKeyword);
        return $results;
    }
}