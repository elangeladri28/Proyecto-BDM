<?php
//Vista para usuarios

class UsersView extends Users
{

    public function showUserByEmail($Email)
    {
        
        $results = $this->getUserByEmail($Email);
        return $results;
    }

    public function showAllUsersSchool()
    {

        $results = $this->getAllUsersSchool();
        return $results;
    }

    public function showContactsChat($Email, $IdCurso){

        $results = $this->getContactsChat($Email,$IdCurso);
        return $results;
    }
}