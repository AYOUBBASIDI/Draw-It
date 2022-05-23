<?php include APPROOT . '/view/include-client/header.php'; ?>


<div class="newjob-content">
    <h1>Complete the form to add a new job</h1>
    <form>
        <div class="row-type-one">
            <input type="text" name="typejob" placeholder="Type of Job">
            <label for="color" class="some">Choose colors :</label><input type="color" id="favcolor" name="favcolor" value="#ff0000" class="color">
        </div>
        <div class="row-type-one">
        <input type="text" name="typejob" placeholder="Max Time per hour">
        <input type="text" name="typejob" placeholder="Labor price per $" class="some">
        </div>
        <div class="row-type-two">
            <textarea id="story" name="story" rows="5" cols="60" maxlenght></textarea>
        </div>
        <button class="addjob" type="submit"><a href="<?php echo URLROOT; ?>pages/job_create">Create Job</a></button>
        <button class="cancel" type="submit"><a href="<?php echo URLROOT; ?>pages/client_dashboard">Cancel</a></button>
    </form>
    <div class="newColor">
        <p>add color first<p><a><img src="<?php echo URLROOT ?>img/newjob.png"></a>
    </div>
    <div class="colors-added">
        <h4>color added :</h4>
        <li>red #fffffff</li>
        <li>red #fffffff</li>
        <li>red #fffffff</li>
    </div>
</div>