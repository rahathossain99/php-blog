<?php


namespace App\Model;
use PDO;

class Category extends Model
{
    private static $results;
    public static function insetIntoDB($category){
        try{
            $admin=new Model();
            $query="INSERT INTO categories(category_name) VALUES 
                    (:category);";

            $smt=$admin->con->prepare($query);
            $smt->bindParam(":category",$category);
            $smt->execute();
            $admin=null;
            $smt=null;
        }catch (PDOException $e){
            die("Query failed ".$e->getMessage());
        }
    }

    public static function updateDB($category,$id){
        try{
            $admin=new Model();
            $query="UPDATE categories SET category_name=:category WHERE id=:id;";
            $smt=$admin->con->prepare($query);
            $smt->bindParam(":id",$id);
            $smt->bindParam(":category",$category);
            $smt->execute();
            $admin=null;
            $smt=null;
        }catch (PDOException $e){
            die("Query failed ".$e->getMessage());
        }
    }

    public static function find($id){
        try{
            $admin=new Model();
            $query="SELECT * FROM categories WHERE id=:id;";
            $smt=$admin->con->prepare($query);
            $smt->bindParam(":id",$id);
            $smt->execute();
            self::$results=$smt->fetch(PDO::FETCH_ASSOC);
            $smt=null;
            $admin=null;
            return self::$results;
        }catch (PDOException $e){
            die("Query failed ".$e->getMessage());
        }

    }

    public static function all(){
        try{
            $admin=new Model();
            $query="SELECT * FROM categories";
            $smt=$admin->con->prepare($query);
            $smt->execute();
            self::$results=$smt->fetchAll(PDO::FETCH_ASSOC);
            $smt=null;
            $admin=null;
            return self::$results;
        }catch (PDOException $e){
            die("Query failed ".$e->getMessage());
        }

    }
    public static function deleteInfo($id){
        try{
            $admin=new Model();
            $query="DELETE from categories WHERE id=:id;";
            $smt=$admin->con->prepare($query);
            $smt->bindParam(":id",$id);
            $smt->execute();
            $admin=null;
            $smt=null;
        }catch (PDOException $e){
            die("Query failed ".$e->getMessage());
        }
    }
}