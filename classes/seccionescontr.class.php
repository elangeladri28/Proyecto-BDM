<?php
//Controlador para secciones

class SeccionesContr extends Secciones
{

    public function createSeccion($categoryName, $categoryColor, $categoryOrder)
    {

        $result = $this->setSeccion($categoryName, $categoryColor, $categoryOrder);
        return $result;
    }

    public function modifySeccion($categoryId, $categoryName, $categoryColor, $categoryOrder)
    {

        $this->editSeccion($categoryId, $categoryName, $categoryColor, $categoryOrder);
    }

    public function deleteSeccion($seccionId)
    {

        $this->delSeccion($seccionId);
    }
}