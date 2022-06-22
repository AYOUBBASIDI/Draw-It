<?php include APPROOT . '/view/include-client/header.php'; ?>


<div class="newjob-content">
    <h1>Complete the form to add a new job</h1>
    <form action="<?php echo URLROOT; ?>pages/job_create" method="post">
        <div class="row-type-one">
            <input type="text" name="type" placeholder="Type of Job" required/>
            <label for="color" class="some">Choose colors :</label><input type="color" id="favcolor" name="favcolor" value="#ff0000" class="color" required>
        </div>
        <div class="row-type-one">
        <input type="number" min="1" name="delay" placeholder="Max Time per hour" required>
        <input type="number" min="5" name="price" placeholder="Labor price per $" class="some" required>
        </div>
        <div class="row-type-two">
            <textarea id="story" name="description" rows="5" cols="60" maxlenght placeholder="Description" required></textarea>
        </div>
        <button class="addjob" type="submit" name="newjob"><a>Create Job</a></button>
        <button class="cancel" type="submit"><a href="<?php echo URLROOT; ?>pages/client_dashboard">Cancel</a></button>
    </form>
</div>
<script>
    var color = document.getElementById("favcolor").value;
    
    var colors = [];
    function addcolor(){
        console.log(color);
        colors.push(color);
        console.log(colors);
    }
    for (var i = 0; i < colors.length; i++) {
        document.getElementById("color").innerHTML = colors[i];
    }
    
</script>