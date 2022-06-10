<?php include APPROOT . '/view/includes/header.php'; ?>


<body class="signupPage">

    <nav>
        <img src="<?php echo URLROOT ?>public/img/logo.png" alt="logo" id="logo">
    </nav>

    <div class="signup-content">
        <h2>Join as a client or freelancer</h2>
        <div class="signup-choice">
            <div class="choice" onclick="asclient()">
                <img src="<?php echo URLROOT ?>public/img/client_icon.png" alt="icon-client">
                <p>I’m a client, hiring<br/> for a project</p>
            </div>
            <div class="choice" onclick="asdesigner()">
                <img src="<?php echo URLROOT ?>public/img/freelance_icon.png" alt="icon-freelancer">
                <p>I’m a freelancer, looking<br/> for work</p>
            </div>
        </div>
        <div class="for_login"><p>Already have an account ?</p><a href="<?php echo URLROOT; ?>pages/login">Log In </a><div>
    </div>
        </div>

</body>

<script>
function asclient(){
    window.location.href="<?php echo URLROOT; ?>pages/asClient";
}

function asdesigner(){
    window.location.href="<?php echo URLROOT; ?>pages/asdesigner";
}


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
