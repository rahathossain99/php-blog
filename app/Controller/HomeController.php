<?php


namespace App\Controller;

class HomeController extends Controller
{
    public static function index()
    {
        header("Location:route.php?home");
    }
    public static function home(){
        include_once "resources/front-end/home/home.view.php";
    }
    public static function about(){
        include_once "resources/front-end/about/about.view.php";
    }
    public static function category(){
        include_once "resources/front-end/categories/categories.view.php";
    }
    public static function contact(){
        include_once "resources/front-end/contact/contact.view.php";
    }

}