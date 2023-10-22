<?php


namespace App\Controller;


use App\Model\Author;
use App\Model\Blog;
use App\Model\Category;

class BlogController extends Controller
{

    public static function index()
    {
        $blogs=Blog::all();
        include_once "resources/admin/blog/index.view.php";
    }
    public static function create(){
        $categories=Category::all();
        $authors=Author::all();
        include_once "resources/admin/blog/create.view.php";
    }
    public static function store()
    {
        Blog::insetIntoDB();
        header("Location:route.php?dashboard&blog=manage");
    }
    public static function edit($id){

        $categories=Category::all();
        $authors=Author::all();
        $blog=Blog::find($id);
        include_once "resources/admin/blog/edit.view.php";
    }
    public static function update()
    {
        $id=$_POST['id'];
        Blog::updateDB($id);
        header("Location:route.php?dashboard&blog=manage");
    }
    public static function destroy()
    {
        $id=$_POST['id'];
        Blog::updateDB($id);
        header("Location:route.php?dashboard&blog=manage");
    }
}