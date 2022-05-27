<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="<?= URLROOT ?>img/D.png">
    <link rel="stylesheet" href="<?= URLROOT ?>public/css/dashboard.css">
    <link rel="stylesheet" href="<?= URLROOT ?>public/css/profile.css">
    <link rel="stylesheet" href="<?= URLROOT ?>public/css/details.css">
    <link rel="stylesheet" href="<?= URLROOT ?>public/css/jobpage.css">
    <link rel="stylesheet" href="<?= URLROOT ?>public/css/deposit.css">
    <link rel="stylesheet" href="<?= URLROOT ?>public/css/rendu.css">
    <link rel="stylesheet" href="<?= URLROOT ?>public/css/test.css">
    <title>Document</title>
</head>
<body class="dashboard-page">

    <nav>
        <img class="logo" src="<?php echo URLROOT ?>public/img/logo.png" alt="logo" id="logo">
        <div class="menu">
            <a href="<?php echo URLROOT; ?>pages/designer_profile">Profile</a>
            <a href="<?php echo URLROOT; ?>pages/designer_dashboard" class="active">Dashboard</a>
        </div>
        <img class="icon-menu" id="icon-open" onclick="openMenu()" src="<?php echo URLROOT ?>public/img/icon-menu.png">
        <img class="exit-menu" id="icon-exit" onclick="exitMenu()" src="<?php echo URLROOT ?>public/img/exit-menu.png">
        <div class="menu-items">
                    <p class="row-menu"><img src="<?php echo URLROOT ?>public/img/profile-menu.png"><a href="<?php echo URLROOT; ?>pages/designer_profile">Profile</a></p>
                    <p class="row-menu"><img src="<?php echo URLROOT ?>public/img/dash-menu.png"><a href="<?php echo URLROOT; ?>pages/designer_dashboard">Dashboard</a></p>
                    <p class="row-menu"><img src="<?php echo URLROOT ?>public/img/depo.png"><a href="<?php echo URLROOT; ?>pages/withdraw">Withdraw</a></p>
                    <p class="row-menu"><img src="<?php echo URLROOT ?>public/img/logout.png"><a  href="<?php echo URLROOT; ?>users/logout ">Log Out</a></p>
                    <p class="footer"><a>drawsupport@gmail.com</a><a>Copyright©Draw_it</a></p>
                  </div>
    </nav>

    <script>
        function openMenu(){
            document.querySelector(".menu-items").classList.toggle("open-menu");
            document.getElementById('icon-exit').style.display = "block";           
            document.getElementById('icon-open').style.display = "none";
        }
        function exitMenu(){
            document.querySelector(".menu-items").classList.toggle("open-menu");
            document.getElementById('icon-exit').style.display = "none";
            document.getElementById('icon-open').style.display = "block"; 
        }

    </script>