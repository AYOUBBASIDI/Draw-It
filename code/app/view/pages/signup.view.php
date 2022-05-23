<?php include APPROOT . '/view/includes/header.php'; ?>


<body class="signupPage">

    <nav>
        <img src="<?php echo URLROOT ?>public/img/logo.png" alt="logo" id="logo">
    </nav>

    <div class="signup-content">
        <h2>Join as a client or freelancer</h2>
        <div class="signup-choice">
            <div class="choice">
                <input id="client" class="radio-choice" type="radio" name="choice" id="choice-client" value="as_client">
                <img src="<?php echo URLROOT ?>public/img/client_icon.png" alt="icon-client">
                <p>I’m a client, hiring<br/> for a project</p>
            </div>
            <div class="choice">
                <input id="freelance" class="radio-choice" type="radio" name="choice" id="choice-freelancer" value="as_freelancer">
                <img src="<?php echo URLROOT ?>public/img/freelance_icon.png" alt="icon-freelancer">
                <p>I’m a freelancer, looking<br/> for work</p>
            </div>
        </div>
        <button class="btn-signup" id="btn-signup"><a href="<?php echo URLROOT; ?>pages/asClient">Apply as a </a></button>
        <div class="for_login"><p>Already have an account ?</p><a href="<?php echo URLROOT; ?>pages/login">Log In </a><div>
    </div>
        </div>

</body>

<script>
var test = document.getElementById("client");
var test2 = document.getElementById("freelance").checked;

//if client is checked
    if(test == true) {
        console.log("client");
    };
//if freelance is checked
    if(test2 == true) {
        console.log("freelance");
    };

</script>
