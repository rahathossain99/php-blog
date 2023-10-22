<?php


namespace App\Controller;
use App\Model\Category;

class CategoryController extends Controller
{

    public static function index(){
        $categories=Category::all();
        include_once "resources/admin/category/index.view.php";
    }
    public static function create(){
        include_once "resources/admin/category/create.view.php";
    }
    public static function store(){
        $category=$_POST['category_name'];
        Category::insetIntoDB($category);
        header("Location:route.php?dashboard&category=manage");
    }
    public static function edit($id){
        $category=Category::find($id);
        include_once "resources/admin/category/edit.view.php";
    }
    public static function update(){
        $id=$_POST['id'];
        $category=$_POST['category_name'];
        Category::updateDB($category,$id);
        header("Location:route.php?dashboard&category=manage");
    }
    public static function destroy(){
        $id=$_POST['id'];
        Category::DeleteInfo($id);
        header("Location:route.php?dashboard&category=manage");
    }
}