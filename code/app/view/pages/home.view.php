<?php include APPROOT . '/view/includes/header.php'; ?>




<body class="homePage">
    <nav>
        <img src="<?php echo URLROOT ?>public/img/logo.png" alt="logo" id="logo">
        <div>
        <button class="login"><a href="<?php echo URLROOT; ?>pages/login ">Log In</a></button><button class="signup"><a href="<?php echo URLROOT; ?>pages/signup ">Sign Up</a></button>
    </div>
    </nav>
    <div class="content">
        <h1>HOW WORK<br/>SHOULD WORK</h1>
        <p>Forget the old rules. You can have the best people.<br/>Right now. Right here.</p>
        <button onclick="client()" class="btn1">Find Talent</button><button onclick="designer()" class="btn2">Find Work</button>
    </div>
    
    <div class="popUp1" id="addC">
        <img onclick="hideC()" class="x" src="<?php echo URLROOT ?>public/img/x.png" alt="x">
        <h3>Get in-demand talent on demand</h3><hr/>
        <form action="<?php echo URLROOT; ?>users/newclient" method="post">
        <div class="row1"><input type="text" placeholder="First name" name="fname" required/>
        <input class="mar" class="lname" type="text" placeholder="Last name" name="lname" required/></div>
        <div class="row2"><input type="email" placeholder="E-mail Address" name="email" required/></div>
        <div class="row2"><input type="password" placeholder="password" name="pwd" required/></div>
        <input type="hidden" name="role" value="client"/>
        <div class="row3"><input class="check" type="checkbox" name="rules" required/><p>Yes, I understand and agree to the DrawIt Terms of Service, <br/>including the User Agreement and <a class="pp" href="https://www.privacypolicygenerator.info/live.php?token=3VRv6K7ozYOyn04DZmTCZ82FEoDdrrup">Privacy Policy</a>.</p></div>
        <div class="btnPop"><button class="creerHome" type="submit" name="addclient" onclick="added()">Create My Account</button>
        <button class="Log" type="submit">Log In</button></div>
        </form>
    </div>
    <div>
    <div class="popUp2" id="addD">
        <img onclick="hideD()" class="x" src="<?php echo URLROOT ?>public/img/x.png" alt="x">
        <h3>Build your career right here.</h3><hr/>
        <form action="<?php echo URLROOT; ?>users/newdesigner" method="post">
        <div class="row1"><input type="text" placeholder="First name" name="fname" required/>
        <input class="mar" class="lname" type="text" placeholder="Last name" name="lname" required/></div>
        <div class="row2"><input type="email" placeholder="E-mail Address" name="email" required/></div>
        <div class="row2"><input type="password" placeholder="password" name="pwd" required/></div>
        <input type="hidden" name="role" value="designer"/>
        <div class="row3"><input class="check" type="checkbox" name="rules" required/><p>Yes, I understand and agree to the DrawIt Terms of Service, <br/>including the User Agreement and <a class="pp" href="https://www.privacypolicygenerator.info/live.php?token=3VRv6K7ozYOyn04DZmTCZ82FEoDdrrup">Privacy Policy</a>.</p></div>
        <div class="btnPop"><button class="creerHome" type="submit" name="adddesigner">Create My Account</button>
        <button class="Log" type="submit">Log In</button></div>
        </form>
    </div>
</div>
    <footer>
        <p>powered by :</p>
        <div class="powered-icon"><img src="<?php echo URLROOT ?>public/img/youcode.png"  alt="" id=""><img class="simp" src="<?php echo URLROOT ?>public/img/simplon.png" alt="" id=""></div>
    </footer>


    <script>
        function client(){
            document.getElementById("addC").classList.toggle("show");
        }
        function hideC() {
        document.getElementById("addC").classList.remove("show");
        }
        function designer(){
            document.getElementById("addD").classList.toggle("show");
        }
        function hideD() {
        document.getElementById("addD").classList.remove("show");
        }
        // function added() {
        // // document.getElementById("addD").classList.remove("show");
        // // alert("Your account has been craeated seccessfuly , Welcome !");
        // swal({
        //     title: "User created!",
        //     text: "Suceess message sent!!",
        //     icon: "success",
        //     button: "Ok",
        //     timer: 2000
        // });
        // }
        
    

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

    <script>
        var session = <?php echo $_SESSION['alert']; ?> 

if(session == 1){
    swal({
        title: "Error!",
        text: "E-mail Already Exist!!",
        icon: "error",
        button: "Ok",
    });
}
<?php 
$_SESSION['alert'] = null;
 ?>
    </script>


</body>
</html>