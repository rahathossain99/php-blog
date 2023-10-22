<?php


namespace App\middleware;

use PDO;
use App\Model\Model;

class Authentication extends Model
{
    private static $results;
    public static function insetIntoDB($username,$email,$password){
        try{
            $admin=new Model();
            $query="INSERT INTO admin(username,pwd,email) VALUES 
                    (:username,:pwd,:email);";
            $smt=$admin->con->prepare($query);
            $smt->bindParam(":username",$username);
            $smt->bindParam(":pwd",$password);
            $smt->bindParam(":email",$email);
            $smt->execute();
            $admin=null;
            $smt=null;
        }catch (PDOException $e){
            die("Query failed ".$e->getMessage());
        }
    }
    public static function find($email){
        try{
            $admin=new Model();
            $query="SELECT * FROM admin WHERE email=:email;";
            $smt=$admin->con->prepare($query);
            $smt->bindParam(":email",$email);
            $smt->execute();
            self::$results=$smt->fetch(PDO::FETCH_ASSOC);
            $smt=null;
            $admin=null;
            return self::$results;
        }catch (PDOException $e){
            die("Query failed ".$e->getMessage());
        }

    }
}