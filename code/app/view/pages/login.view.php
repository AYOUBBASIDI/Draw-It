
<?php include APPROOT . '/view/includes/header.php'; ?>


<body class="loginPage">

    <nav>
        <img src="<?php echo URLROOT ?>public/img/logo.png" alt="logo" id="logo">
    </nav>
    <div class="loginForm" id="">
        <h3>Welcom Again, Login</h3>
        <hr/>
        <form action="<?php echo URLROOT; ?>users/login" method="post">
        <div class="row"><input type="email" placeholder="E-mail Address" name="email" required/></div>
        <div class="row"><input type="password" placeholder="password" name="pwd" required/></div>
        <div class="btnForm"><button class="log" type="submit" name="login"><a>Log In</a></button>
        <p>Don't have an Account</p>
        
        </form>
        <button type="button" class="creer"><a href="<?php echo URLROOT; ?>pages/signup">Create My Account</a></button></div>
    </div>
</body>