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

    protected function editUser($NombreUsuario, $FotoUsuario, $Email, $Contrasena)
    {

        if ($FotoUsuario == 0) {

            $sql = "UPDATE usuario SET NombreUsuario = ?, Contrasena = ?, FechaMod = now() WHERE Email = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$NombreUsuario, $Contrasena, $Email]);
        } else {

            $sql = "UPDATE usuario SET NombreUsuario = ?, FotoUsuario = ?, Contrasena = ?, FechaMod = now() WHERE Email = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$NombreUsuario, $FotoUsuario, $Contrasena, $Email]);
        }
    }

    protected function delUser($Email)
    {

        $sql = "DELETE FROM usuario WHERE Email = ?";
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
