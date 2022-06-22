<?php include APPROOT . '/view/includes/header.php'; ?>


<body class="choicePage">

    <nav>
        <img src="<?php echo URLROOT ?>public/img/logo.png" alt="logo" id="logo">
    </nav>
    <div class="choice-content" id="">
        <h3>Sign up to hire talent</h3>
        <hr/>
        <form action="<?php echo URLROOT; ?>users/newdesigner" method="post">
        <div class="choice-row"><input type="text" placeholder="First name" name="fname" required/>
        <input class="choice-row" class="lname" type="text" placeholder="Last name" name="lname" required/></div>
        <div class="choice-row2"><input type="email" placeholder="E-mail Address" name="email" required/></div>
        <div class="choice-row2"><input type="password" placeholder="password" name="pwd" required/></div>
        <input type="hidden" name="role" value="designer"/>
        <div class="choice-row3"><input class="choice-check" type="checkbox" name="rules" required/><p>Yes, I understand and agree to the DrawIt Terms of Service, including the User Agreement and  <a class="pp" href="https://www.privacypolicygenerator.info/live.php?token=3VRv6K7ozYOyn04DZmTCZ82FEoDdrrup">Privacy Policy</a>.</p></div>
        <div class="choice-btn"><button class="choice-signup" type="submit" name="adddesigner">Create My Account</button>
        </form>
        <div class="choice-log"><p>Already have an account ?</p><a href="<?php echo URLROOT; ?>pages/login">Log In </a><div>
    </div>
</body>

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