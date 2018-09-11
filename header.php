<?php 
session_start();
include_once('includes/db_connect.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport"content="width=device-width, initial-scale=1.0">
        <title>Faculty Information System</title>
        <link href='img/logo.png' rel='icon'/>
        <link rel="stylesheet" type="text/css" href="css/global.css">
        <link rel="stylesheet" type="text/css" href="css/fontawesome/css/all.css">
        <script>
        // document.addEventListener('DOMContentLoaded', function() {
        //     document.getElementById('overlay').style.opacity = 0;
        //     document.getElementById('overlay').style.display = 'none';
        // }, true);
        </script>
    </head>
    <body>
        <div id="overlay"></div>
        <div class="header center">
            <a href="home.php">
                <img class="logo" src="img/logo.png" alt="university logo">
                <h1>Faculty Information System</h1>
            </a>
        </div>