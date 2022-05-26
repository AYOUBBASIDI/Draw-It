<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="<?= URLROOT ?>img/D.png">
    <link rel="stylesheet" href="<?= URLROOT ?>public/css/hello.css">
    <title>Document</title>
</head>
<body class="hello-page">

    <nav>
        <img src="<?php echo URLROOT ?>public/img/logo.png" alt="logo" id="logo">
    </nav>
    <div class="hello-content">
        <p>Thank you for joining <br/>us hopefully you will find <br/> what you want on our <br/> website . <?php $_SESSION['lname']; ?></p>
        <button class="btn1"><a href="<?php echo URLROOT; ?>pages/client_dashboard">Continue</a></button>
    </div>
</body>