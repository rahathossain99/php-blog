<?php


namespace App\Controller;


class DashboardController extends Controller
{
    public static function index()
    {
       include_once "resources/admin/dashboard/dashboard.view.php";
    }

}