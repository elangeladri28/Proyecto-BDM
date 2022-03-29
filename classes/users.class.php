<?php
//Modelo para usuarios

class Users extends Dbh
{

    protected function getUserByEmail($Email)
    {

        $sql = "CALL getUserByEmail(?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$Email]);

        $results = $stmt->fetchAll();
        return $results;
    }

    protected function setUser($NombreUsuario, $ApPatUsuario, $ApMatUsuario, $Email, $TelUsuario, $Contrasena, $TipoUsuario, $FotoUsuario)
    {

        $sql = "CALL setUser(?,?,?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $insertSucc = $stmt->execute([$NombreUsuario, $ApPatUsuario, $ApMatUsuario, $Email, $TelUsuario, $Contrasena, $TipoUsuario, $FotoUsuario]);
        return $insertSucc;
    }

    protected function editUser($NombreUsuario, $ApPatUsuario, $ApMatUsuario, $telUsuario, $FotoUsuario, $Email, $Contrasena)
    {
        if ($FotoUsuario == 0) {
            $sql = "CALL editUserWithoutPicture(?,?,?,?,?,?)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$NombreUsuario, $ApPatUsuario, $ApMatUsuario, $telUsuario, $Contrasena, $Email]);
        } else {
            $sql = "CALL editUserWithPicture(?,?,?,?,?,?,?)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$NombreUsuario, $ApPatUsuario, $ApMatUsuario, $telUsuario, $FotoUsuario, $Contrasena, $Email]);
        }
    }

    protected function delUser($Email)
    {

        $sql = "CALL deleteUser(?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$Email]);
    }

    protected function getAllUsersSchool()
    {

        $sql = "SELECT Email, NombreUsuario, FotoUsuario, Rol, FechaMod FROM usuario WHERE Rol='Escuela' ORDER BY NombreUsuario";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();
        return $results;
    }

    protected function getContactsChat($Email, $IdCurso){

        $sql = "CALL getContactsChat(?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$Email, $IdCurso]);

        $results = $stmt->fetchAll();
        return $results;
    }
}
