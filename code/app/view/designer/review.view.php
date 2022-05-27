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
        <p>Thank you for passing <br/>the exam. We'll review your <br/>work and respond soon.<br/>Stay informed ..</p>
        <button class="btn2"><a href="<?php echo URLROOT; ?>users/log_out">Log Out</a></button>
    </div>
</body>
<script>
window.history.forward();
</script>