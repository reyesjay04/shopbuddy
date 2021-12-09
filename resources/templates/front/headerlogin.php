<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shop Homepage - Start Bootstrap Template</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet"> 
    <link href="css/loginstyle.css" rel="stylesheet">
    <style>
    
    body {

        font-size: 12px;
        padding-top: 31px;
        background-image: url("bg.png");
        background-repeat: no-repeat;
        background-position: center; 

    }
    .navbar-inverse {
    background-color: #083746;
    border-color: #080808;
    max-height: 20;
    border-radius: 0px;
    margin-bottom: 20px;

    }
    .navbar-inverse .navbar-nav>li>a {
    color: #d4d4d4;
    padding-top: 5px;
    padding-bottom: 5px;


    }

    .navbar-inverse .navbar-brand {
    color: #ffffff;
    }
    .navbar {
            min-height: 32px;
            margin-bottom: 0px;
    }

    div.fixed {
    position: fixed;
    z-index: 1030;
    background-color: #003e52;
    margin-bottom: 20px;
       width: 1366px;
    }
    a {
    color: #ffffff;
    text-decoration: none;
    }
    .navbar-brand {
    float: left;
    height: 50px;
    padding: 15px 15px;
    font-size: 30px;
    line-height: 20px;
    }
    .wrapper {
        text-align: center;
    }

    .button {
        position: absolute;
        top: 50%;
        border: none;
        color: white;
        padding: 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
    }
    .button5 {
        border-radius: 50px;
        background-color: #003e52;
    }
    .h1, h1{
        font-size: 36px;
        color: white;
        margin-left: 10px;
        margin-right: 10px;
    }
    .h3, h3{
        
        color: white;
        margin-left: 10px;
        margin-right: 10px;
    }

    .glyphicon-shopping-cart {
    font-size: 30px;
    font-size: 50px;
    }


    </style>

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <?php include(TEMPLATE_FRONT . DS . "top_nav.php") ?>
        <!-- /.container -->
    </nav>
    <div class="fixed" role="navigation">
      <?php include(TEMPLATE_FRONT . DS . "top_nav_2nd.php") ?>
    </div>
    <br>
    <br> 
    <br>
    <br>
  
