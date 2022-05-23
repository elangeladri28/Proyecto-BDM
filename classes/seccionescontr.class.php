<?php
//Controlador para secciones

class SeccionesContr extends Secciones
{

    public function createSeccion($categoryName, $categoryImage, $categoryOrder)
    {

        $result = $this->setSeccion($categoryName, $categoryImage, $categoryOrder);
        return $result;
    }

    public function modifySeccion($categoryId, $categoryName, $categoryImage, $categoryOrder)
    {

        $this->editSeccion($categoryId, $categoryName, $categoryImage, $categoryOrder);
    }

    public function deleteSeccion($seccionId)
    {

        $this->delSeccion($seccionId);
    }
}