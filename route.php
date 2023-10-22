<?php
require_once "vendor/autoload.php";

use App\Controller\HomeController;
use App\Controller\AuthController;
use App\Controller\DashboardController;
use App\Controller\CategoryController;
use App\Controller\AuthorController;
use App\Controller\BlogController;
use App\Model\Category;
use App\Session;

if($_SERVER["REQUEST_METHOD"]=="POST") {
    if (isset($_POST["signup"])) {
        AuthController::store();
    }
    if (isset($_POST["login"])) {
        AuthController::match();
    }

    if(isset($_POST["category"])){
        if($_POST["category"]=="store"){
            CategoryController::store();
        }
        elseif ($_POST["category"]=="update"){
            CategoryController::update();
        }
        elseif($_POST["category"]=="delete"){
            CategoryController::destroy();
        }
    }
    if(isset($_POST["author"])){
        if($_POST["author"]=="store"){
            AuthorController::store();
        }
        if($_POST["author"]=="update"){
            AuthorController::update();
        }
        if($_POST["author"]=="delete"){
            AuthorController::destroy();
        }

    }
    if(isset($_POST["blog"])){
        if($_POST["blog"]=="store"){
            BlogController::store();
        }
        if($_POST["blog"]=="update"){
            BlogController::update();
        }
        if($_POST["blog"]=="delete"){
            BlogController::destroy();
        }
    }
//    AuthController::index();
}

else{
        if(isset($_GET["home"])){
            HomeController::home();
        }
        elseif(isset($_GET["categories"])){
            HomeController::category();
        }
        elseif(isset($_GET["about"])){
            HomeController::about();
        }
        elseif (isset($_GET["contact"])){
            HomeController::contact();
        }
        if(isset($_GET["login"])){
            AuthController::login();
        }
        elseif(isset($_GET["signup"])){
            AuthController::signup();
        }
        elseif(isset($_GET["dashboard"])){
            $session =new Session();
            $email=$session->fetch('email');
            if(isset($email)){
                if(isset($_GET["category"])){
                    if($_GET["category"]=="store"){
                        CategoryController::create();
                    }
                    elseif($_GET["category"]=="manage"){
                        CategoryController::index();
                    }
                    elseif($_GET["category"]=="update"){
                        if(isset($_GET["id"])) {
                            CategoryController::edit($_GET["id"]);
                        }
                    }

                }
                elseif(isset($_GET["author"])){
                    if($_GET["author"]=="store"){
                        AuthorController::create();
                    }
                    if($_GET["author"]=="manage"){
                        AuthorController::index();
                    }
                    if($_GET["author"]=="update"){
                        AuthorController::edit();
                    }
                }
                elseif(isset($_GET["blog"])){
                    if($_GET["blog"]=="store"){
                        BlogController::create();
                    }
                    elseif (($_GET["blog"]=="manage")) {
                        BlogController::index();
                    }
                    elseif (($_GET["blog"]=="update")) {
                        if(isset($_GET["id"])) {
                            BlogController::edit($_GET["id"]);
                        }
                    }
                }

                else{
                    DashboardController::index();
                }
            }
            else{
                AuthController::index();
            }
        }
}




