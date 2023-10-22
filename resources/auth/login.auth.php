<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Sign Up</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Template Main CSS Files -->
    <link href="<?php asset("auth-assets"); ?>/login/index.css" rel="stylesheet">

    <!-- =======================================================
    * Template Name: ZenBlog
    * Updated: Sep 18 2023 with Bootstrap v5.3.2
    * Template URL: https://bootstrapmade.com/zenblog-bootstrap-blog-template/
    * Author: BootstrapMade.com
    * License: https:///bootstrapmade.com/license/
    ======================================================== -->
</head>

<body id="particles-js"></body>
<div class="animated bounceInDown">
    <div class="container">
        <span class="error animated tada" id="msg"></span>
        <form action="<?php route("login"); ?>" method="post" class="box" onsubmit="return checkStuff()">
            <h4>Admin<span>Dashboard</span></h4>
            <h5>Sign in to your account.</h5>
            <input type="text" name="email" placeholder="Email" autocomplete="off">
            <i class="typcn typcn-eye" id="eye"></i>
            <input type="password" name="password" placeholder="Passsword" id="pwd" autocomplete="off">
            <label>
                <input type="checkbox">
                <span></span>
                <small class="rmb">Remember me</small>
            </label>
            <a href="#" class="forgetpass">Forget Password?</a>
            <input type="submit" value="Sign in" name="login" class="btn1">
        </form>
        <a href="<?php route("signup"); ?>" class="dnthave">Don’t have an account? Sign up</a>
    </div>
    <div class="footer">
        <span>Made with <i class="fa fa-heart pulse"></i> <a href="https://www.google.de/maps/place/Augsburger+Puppenkiste/@48.360357,10.903245,17z/data=!3m1!4b1!4m2!3m1!1s0x479e98006610a511:0x73ac6b9f80c4048f"><a href="https://codepen.io/lordgamer2354">By Anees Khan</a></span>
    </div>
</div>

<script src="<?php asset('auth-assets'); ?>/login/main.js"></script>
</body>

</html>