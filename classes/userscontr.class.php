<?php
//Controlador para usuarios

class UsersContr extends Users
{

    public function createUser($NombreUsuario, $ApPatUsuario, $ApMatUsuario, $Email, $TelUsuario, $Contrasena, $TipoUsuario, $FotoUsuario)
    {

        $result = $this->setUser($NombreUsuario, $ApPatUsuario, $ApMatUsuario, $Email, $TelUsuario, $Contrasena, $TipoUsuario, $FotoUsuario);
        return $result;
    }

    public function modifyUser($NombreUsuario, $FotoUsuario, $Email, $Contrasena)
    {

        $this->editUser($NombreUsuario, $FotoUsuario, $Email, $Contrasena);
    }

    public function deleteUser($Email)
    {

        $this->delUser($Email);
    }

    public function editProfile($NombreUsuario, $ApPatUsuario, $ApMatUsuario, $telUsuario, $FotoUsuario, $Email, $Contrasena)
    {

        $this->editUser($NombreUsuario, $ApPatUsuario, $ApMatUsuario, $telUsuario, $FotoUsuario, $Email, $Contrasena);
    }

    public function validateUser()
    {

        $email = $_POST['emailLogin'];
        $password = $_POST['passLogin'];
        $userInfo = $this->getUserByEmail($email);
        if (!empty($userInfo)) {
            if ($userInfo[0]['userPass'] == $password) {

                return $userInfo;
            } else {

                return false;
            }
        }
        else{

            return false;
        }
    }
}
