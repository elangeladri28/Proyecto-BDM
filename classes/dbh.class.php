<?php
//Clase para la conexión con la base de datos

class Dbh
{

    private $host = "localhost";
    private $user = "root";
    private $pwd = "";
    private $dbName = "sportcity_db";
    /*private $host = "sql102.epizy.com";
    private $user = "epiz_31772596";
    private $pwd = "Y1ebcf8Xeo";
    private $dbName = "epiz_31772596_sportcity_db";*/

    protected function connect()
    {

        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
        $pdo = new PDO($dsn, $this->user, $this->pwd);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $pdo;
    }
}