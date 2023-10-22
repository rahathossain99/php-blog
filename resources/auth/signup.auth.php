<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Sign Up</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Template Main CSS Files -->
    <link href="<?php asset("auth-assets"); ?>/signup/index.css" rel="stylesheet">

    <!-- =======================================================
    * Template Name: ZenBlog
    * Updated: Sep 18 2023 with Bootstrap v5.3.2
    * Template URL: https://bootstrapmade.com/zenblog-bootstrap-blog-template/
    * Author: BootstrapMade.com
    * License: https:///bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>


<div class='bold-line'></div>
<div class='container'>
    <div class='window'>
        <div class='overlay'></div>
        <div class='content'>
            <div class='welcome'>Hello There!</div>
            <div class='subtitle'>We're almost done. Before using our services you need to create an account.</div>
            <form action="<?php route("signup"); ?>" method="post">
            <div class='input-fields'>
                <input type='hidden' name="submit"></input>
                <input type='text' placeholder='Username' name="username" class='input-line full-width'></input>
                <input type='email' placeholder='Email' name="email" class='input-line full-width'></input>
                <input type='password' placeholder='Password' name="password" class='input-line full-width'></input>

            </div>
            <div class='spacing'>or continue with <span class='highlight'>Facebook</span></div>
            <div><button type="submit" class='ghost-round full-width'>Create Account</button></div>
            </form>
        </div>
    </div>
</div>

</body>

</html>