<?php include APPROOT . '/view/include-client/header.php'; ?>


<div class="newjob-content">
    <h1>Complete the form to add a new job</h1>
    <form action="<?php echo URLROOT; ?>pages/job_create" method="post">
        <div class="row-type-one">
            <input type="text" name="type" placeholder="Type of Job" >
            <label for="color" class="some">Choose colors :</label><input type="color" id="favcolor" name="favcolor" value="#ff0000" class="color">
        </div>
        <div class="row-type-one">
        <input type="text" name="delay" placeholder="Max Time per hour">
        <input type="text" name="price" placeholder="Labor price per $" class="some">
        </div>
        <div class="row-type-two">
            <textarea id="story" name="description" rows="5" cols="60" maxlenght placeholder="Description"></textarea>
        </div>
        <button class="addjob" type="submit" name="newjob"><a>Create Job</a></button>
        <button class="cancel" type="submit"><a href="<?php echo URLROOT; ?>pages/client_dashboard">Cancel</a></button>
    </form>
    <div class="newColor">
        <p>add color first<p><a onclick="addcolor()"><img src="<?php echo URLROOT ?>img/newjob.png"></a>
    </div>
    <div class="colors-added">
        <h4>color added :</h4>
        <li>red #fffffff</li>
        <li>red #fffffff</li>
        <li>red #fffffff</li>
    </div>
</div>
<script>
    
    function addcolor(){
        var newcolor = document.getElementById("favcolor").value;
        var oldcolor = newcolor;
        let colors = ["red", "bleu"];
        console.log('Array before push: ' + colors);
        // append new value to the array
        colors.push(oldcolor);
        console.log(colors);




    }
</script>