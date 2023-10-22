<?php


namespace App\Model;

use PDO;
class Blog extends Model
{
    private static $results;
    private static $image,$imageArr,$newImageName,$uploadPath;


    public static function insetIntoDB(){
        $title=$_POST['title'];
        $slug=$_POST['slug'];
        $category=$_POST['category_id'];
        $description=$_POST['description'];
        $author=$_POST['author_id'];
        $time=$_POST['created_at'];
        try{
            $admin=new Model();
            $img=self::setImage();
            $query="INSERT INTO blogs(title,slug,category_id,description,author_id,image,created_at) VALUES 
                    (:title,:slug,:category,:description,:author,:image,:created_at);";
            $smt=$admin->con->prepare($query);
            $smt->bindParam(":title",$title);
            $smt->bindParam(":slug",$slug);
            $smt->bindParam(":category",$category);
            $smt->bindParam(":description",$description);
            $smt->bindParam(":author",$author);
            $smt->bindParam(":image",$img);
            $smt->bindParam(":created_at",$time);
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
            $query="SELECT * FROM blogs WHERE blog_id=:id;";
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


    public static function updateDB($id){
        $title=$_POST['title'];
        $slug=$_POST['slug'];
        $category=$_POST['category_id'];
        $description=$_POST['description'];
        $author=$_POST['author_id'];
        $time=$_POST['created_at'];

        try{
            $image=self::setImage();
            $img=self::find($id);
            if(file_exists($img['image'])){
                unlink($img['image']);
            }
            $admin=new Model();
            $query="UPDATE blogs SET title=:title,slug=:slug,category_id=:category,description=:description,author_id=:author,image=:image,created_at=:created_at WHERE blog_id=:id;";
            $smt=$admin->con->prepare($query);
            $smt->bindParam(":id",$id);
            $smt->bindParam(":title",$title);
            $smt->bindParam(":slug",$slug);
            $smt->bindParam(":category",$category);
            $smt->bindParam(":description",$description);
            $smt->bindParam(":author",$author);
            $smt->bindParam(":image",$image);
            $smt->bindParam(":created_at",$time);
            $smt->execute();
            $admin=null;
            $smt=null;
        }catch (PDOException $e){
            die("Query failed ".$e->getMessage());
        }
    }

    public static function all(){
        try{
            $admin=new Model();
            $query="SELECT * FROM blogs INNER JOIN categories ON blogs.category_id=categories.id INNER JOIN authors ON blogs.author_id=authors.id";
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
            $query="DELETE from blogs WHERE id=:id;";
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
        self::$image=$_FILES["blog_image"]["name"];
        self::$imageArr=explode('.',self::$image);
        if(strlen(self::$imageArr[0])>30){
            self::$imageArr[0]=substr(self::$imageArr[0],0,30);
        }
        $rand=rand(10000,99999);
        self::$newImageName=self::$imageArr[0].$rand.'.'.self::$imageArr[1];
        self::$uploadPath="public/admin-assets/blog-img/".self::$newImageName;
        move_uploaded_file($_FILES["blog_image"]["tmp_name"],self::$uploadPath);
        return self::$uploadPath;
    }

}