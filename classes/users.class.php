<?php
//Modelo para usuarios

class Users extends Dbh
{

    protected function getUserByEmail($Email)
    {

        $sql = "CALL abcUser(?,?,?,?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(["get",0,0,0,$Email,0,0,0,0]);

        $results = $stmt->fetchAll();
        return $results;
    }

    protected function setUser($NombreUsuario, $ApPatUsuario, $ApMatUsuario, $Email, $TelUsuario, $Contrasena, $TipoUsuario, $FotoUsuario)
    {

        $sql = "CALL abcUser(?,?,?,?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $insertSucc = $stmt->execute(["set",$NombreUsuario, $ApPatUsuario, $ApMatUsuario, $Email, $TelUsuario, $Contrasena, $TipoUsuario, $FotoUsuario]);
        return $insertSucc;
    }

    protected function editUser($NombreUsuario, $ApPatUsuario, $ApMatUsuario, $telUsuario, $FotoUsuario, $Email, $Contrasena)
    {
        if ($FotoUsuario == 0) {
            $sql = "CALL abcUser(?,?,?,?,?,?,?,?,?)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute(["editNoPic",$NombreUsuario, $ApPatUsuario, $ApMatUsuario, $Email, $telUsuario, $Contrasena,0,0]);
        } else {
            $sql = "CALL abcUser(?,?,?,?,?,?,?,?,?)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute(["editPic",$NombreUsuario, $ApPatUsuario, $ApMatUsuario, $Email, $telUsuario, $Contrasena, 0, $FotoUsuario]);
        }
    }

    protected function delUser($Email)
    {

        $sql = "CALL abcUser(?,?,?,?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(["delete",0,0,0,$Email,0,0,0,0]);
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
