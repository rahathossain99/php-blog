<?php


namespace App\Controller;


use App\Model\Author;
use App\Model\Blog;

class AuthorController extends Controller
{
    public static function index()
    {
       $authors=Author::all();
        include_once "resources/admin/author/index.view.php";
    }
    public static function create()
    {
        include_once "resources/admin/author/create.view.php";
    }
    public static function store()
    {
        Author::insetIntoDB();
        header("Location:route.php?dashboard&author=manage");
    }
    public static function edit()
    {
        $id=$_GET['id'];
        $author=Author::find($id);
        include_once "resources/admin/author/edit.view.php";
    }
    public static function update()
    {
        $id=$_POST['id'];
        Author::updateDB($id);
        header("Location:route.php?dashboard&author=manage");
    }
    public static function destroy()
    {
        $id=$_POST['id'];
        Blog::deleteInfo($id);
        header("Location:route.php?dashboard&author=manage");
    }

}