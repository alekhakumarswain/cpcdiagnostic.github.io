<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard - Client area</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style type="text/css">
        body {
        background-color: #f8f9fa;
        font-family: Arial, sans-serif;
        }
        
        .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
        }
        
        .form {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
        }
        
        h1 {
        font-size: 24px;
        margin-bottom: 20px;
        text-align: center;
        }
        
        .row {
        margin-bottom: 20px;
        }
        
        .col-md-3 {
        padding: 10px;
        }
        
        .img-fluid {
        width: 100%;
        height: auto;
        cursor: pointer;
        border-radius: 5px;
        transition: all 0.3s ease;
        }
        
        .img-fluid:hover {
        transform: scale(1.1);
        }
        
        @media screen and (max-width: 768px) {
        .col-md-3 {
        width: 50%;
        }
        }
        
    </style>
</head>
<body>
<div class="container">
    <div class="form">
        <p>Hey, <?php echo $_SESSION['username']; ?>!</p>
        <p>You are now on the user dashboard page.</p>
        <p><a href="logout.php">Logout</a></p>
    </div>
    <h1 class="text-center">WELCOME TO THE ADMIN PANEL</h1>
    <div class="row">
        <div class="col-md-3">
            <img onclick="openPage('page1.html')" src="https://cdn3.f-cdn.com/contestentries/1733723/42113248/5e47d289f1335_thumb900.jpg" class="img-fluid">
        </div>
        <div class="col-md-3">
            <img onclick="openPage('page2.html')" src="https://miro.medium.com/max/1100/1*-ExxDAPl4rciaENKd8QSBw.webp" class="img-fluid">
        </div>
        <div class="col-md-3">
            <img onclick="openPage('page3.html')" src="https://cdn-icons-png.flaticon.com/512/1088/1088537.png" class="img-fluid">
        </div>
        <div class="col-md-3">
            <img onclick="openPage('page4.html')" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRHKAc0vWz6WnQbpqUvXZ62LqoAT6GDm-M8fA&usqp=CAU" class="img-fluid">
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <img onclick="openPage('page5.html')" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTk97ADS3eh5j5qHJ2_V_tjnTI-P9suDmWYrQ&usqp=CAU" class="img-fluid">
        </div>
        <div class="col-md-3">
            <img onclick="openPage('page6.html')" src="https://cdn.pixabay.com/photo/2016/06/15/15/25/loudspeaker-1459128__480.png" class="img-fluid">
        </div>
        <div class="col-md-3">
            <img onclick="openPage('page7.html')" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTFmbo14XBSi0mBkabrkVLlwXW4WCvCAAWHCg&usqp=CAU" class="img-fluid">
            </div>
            <div class="col-md-3">
            <img onclick="openPage('page8.html')" src="https://corkboardconcepts.com/wp-content/uploads/2021/04/GFLogo-1024x965.png" class="img-fluid">
            </div>
            <div class="col-md-3">
            <img onclick="openPage('page9.html')" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT6mXFACHMvRBHCqqE4iP3rhuPBD7Lkz3hlCg&usqp=CAU" class="img-fluid">
            </div>
            </div>
            </div>
            <script>
            function openPage(url) {
            window.location.href = url;
            }
            </script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
            </body>
            </html>
            
