<?php
//Vista para secciones

class SeccionesView extends Secciones
{
    public function showNewscatsById($newsCategoryId)
    {
        
        $results = $this->getNewscatsById($newsCategoryId);
        return $results;
    }
}