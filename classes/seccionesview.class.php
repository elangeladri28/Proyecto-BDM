<?php
//Vista para secciones

class SeccionesView extends Secciones
{
    public function showSeccionById($categoryId)
    {
        
        $results = $this->getSeccionById($categoryId);
        return $results;
    }

    public function showSecciones()
    {
        
        $results = $this->getSecciones();
        return $results;
    }
}