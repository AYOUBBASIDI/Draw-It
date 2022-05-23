<?php include APPROOT . '/view/includes/header.php'; ?>


<body class="choicePage">

    <nav>
        <img src="<?php echo URLROOT ?>public/img/logo.png" alt="logo" id="logo">
    </nav>
    <div class="choice-content" id="">
        <h3>Sign up to find talent</h3>
        <hr/>
        <form>
        <div class="choice-row"><input type="text" placeholder="First name" name="fname" required/>
        <input class="choice-row" class="lname" type="text" placeholder="Last name" name="Lname" required/></div>
        <div class="choice-row2"><input type="email" placeholder="E-mail Address" name="email" required/></div>
        <div class="choice-row2"><input type="password" placeholder="password" name="passe" required/></div>
        <div class="choice-row3"><input class="choice-check" type="checkbox" name="rules" required/><p>Yes, I understand and agree to the DrawIt Terms of Service, including the User Agreement and Privacy Policy.</p></div>
        <div class="choice-btn"><button class="choice-signup" type="submit"><a href="<?php echo URLROOT; ?>pages/hello_Client">Create My Account</a></button>
        </form>
        <div class="choice-log"><p>Already have an account ?</p><a href="<?php echo URLROOT; ?>pages/login">Log In </a><div>
    </div>
</body>