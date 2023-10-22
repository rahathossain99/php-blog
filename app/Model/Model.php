<?php


namespace App\Model;

use PDO;

class Model
{
    private $dsn="mysql:host=localhost;dbname=raw_project";
    private $dbusername="root";
    private $dbpassword="";
    protected $con;

    public function __construct(){
        try{
            $this->con=new PDO($this->dsn,$this->dbusername,$this->dbpassword);
            $this->con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e){
            echo "connection failed " . $e->getMessage();
        }
    }
}