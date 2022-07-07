
<?php include APPROOT . '/view/includes/header.php'; ?>


<body class="loginPage">

    <nav>
        <img src="<?php echo URLROOT ?>public/img/logo.png" alt="logo" id="logo">
    </nav>
    <div class="loginForm" id="">
        
        <h3>Welcom Again, Login</h3>
        <hr/>
        <?php if(isset($_SESSION["error"])){ ?>
        <p class ="err"><?php echo $_SESSION["error"]; ?></p>
        <?php }
        $_SESSION['error'] = null;
         ?>
        <form action="<?php echo URLROOT; ?>users/login" method="post">
        <div class="row"><input type="email" placeholder="E-mail Address" name="email" required/></div>
        <div class="row"><input type="password" placeholder="password" name="pwd" required/></div>
        <div class="btnForm"><button class="log" type="submit" name="login" onclick="fire()">Log In</button>
        <p>Don't have an Account</p>
        
        </form>
        <button type="button" class="creer"><a href="<?php echo URLROOT; ?>pages/signup">Create My Account</a></button></div>
    </div>
</body>

<script>
    var session = <?php echo $_SESSION['alert']; ?> 

    if(session == 1){
        swal({
            title: "User created!",
            text: "Your a ccount has been created succesfuly!!",
            icon: "success",
            button: "Ok",
        });
    }else{
        console.log(session);
    }
    <?php 
    $_SESSION['alert'] = null;
     ?>
</script>

    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
            var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
            (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/62a1c74e7b967b117993a64d/1g53v52r0';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
            })();

        </script>
    <!--End of Tawk.to Script-->