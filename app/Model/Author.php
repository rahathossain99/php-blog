<?php


namespace App\Model;
use PDO;

class Author extends Model
{
    private static $results;
    private static $image,$imageArr,$newImageName,$uploadPath;


    public static function insetIntoDB(){
        try{
            $admin=new Model();
            $query="INSERT INTO authors(author_name,author_image) VALUES 
                    (:author_name,:image);";
            $smt=$admin->con->prepare($query);
            $author=$_POST['author_name'];
            $smt->bindParam(":author_name",$author);
            $img=self::setImage();
            $smt->bindParam(":image",$img);
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
            $query="SELECT * FROM authors WHERE id=:id;";
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
            $query="SELECT * FROM authors";
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


    public static function updateDB($id){
        try{
            $author=$_POST['author_name'];
            $image=self::setImage();
            $img=self::find($id);
            if(file_exists($img['image'])){
                unlink($img['image']);
            }
            $admin=new Model();
            $query="UPDATE authors SET author_name=:author,author_image=:image WHERE id=:id;";
            $smt=$admin->con->prepare($query);
            $smt->bindParam(":id",$id);
            $smt->bindParam(":author",$author);
            $smt->bindParam(":image",$image);
            $smt->execute();
            $admin=null;
            $smt=null;
        }catch (PDOException $e){
            die("Query failed ".$e->getMessage());
        }
    }


    public static function deleteInfo($id){
        try{
            $admin=new Model();
            $query="DELETE from authors WHERE id=:id;";
            $smt=$admin->con->prepare($query);
            $smt->bindParam(":id",$id);
            $smt->execute();
            $admin=null;
            $smt=null;
        }catch (PDOException $e){
            die("Query failed ".$e->getMessage());
        }
    }


    private static function setImage(){
        self::$image=$_FILES['author_image']['name'];
        self::$imageArr=explode('.',self::$image);
        if(strlen(self::$imageArr[0])>30){
            self::$imageArr[0]=substr(self::$imageArr[0],0,30);
        }
        $rand=rand(10000,99999);
        self::$newImageName=self::$imageArr[0].$rand.'.'.self::$imageArr[1];
        self::$uploadPath="public/admin-assets/author-img/".self::$newImageName;
        move_uploaded_file($_FILES["author_image"]["tmp_name"],self::$uploadPath);
        return self::$uploadPath;
    }

}