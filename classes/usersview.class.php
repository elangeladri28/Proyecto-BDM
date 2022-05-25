<?php
//Vista para usuarios

class UsersView extends Users
{

    public function showUserByEmail($Email)
    {
        
        $results = $this->getUserByEmail($Email);
        return $results;
    }

    public function showReporterosNoAut()
    {
        
        $results = $this->getReporterosNoAut();
        return $results;
    }
}