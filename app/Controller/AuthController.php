<?php


namespace App\Controller;
use App\middleware\Authentication;
use App\Session;


class AuthController extends Controller
{
    public static function index()
    {
        header("Location:route.php?login");
    }

    public static function login(){
        include_once "resources/auth/login.auth.php";
    }

    public static function signup(){
        include_once "resources/auth/signup.auth.php";
    }

    public static function store(){
        $email=$_POST["email"];
        $password=$_POST['password'];
        $username=$_POST['username'];
        Authentication::insetIntoDB($username,$email,$password);
    }

    public static function match(){
        $email=$_POST["email"];
        $password=$_POST['password'];
        if(!isset($email)){
            die("enter email");
        }
        if(!isset($password)){
            die("enter password");
        }
        $admin=Authentication::find($email);
        if(isset($admin["email"]) && isset($admin["pwd"])){
            if($password==$admin["pwd"]){
                $session=new Session();
                $session->put("email",$email);
                header("Location:route.php?dashboard");
                exit();
            }
            else{
                die("pass doesnt match");
            }
        }
        else{
            die("email not found");
        }
    }

}