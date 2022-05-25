<?php include APPROOT . '/view/include-client/header.php'; ?>


<div class="content-jobcreate">
    <h2>Work summary</h2>
    <div class="jobCreate">
        <div class="line">
        <label for="type">Type :</label>
        <p class="line-content"><?php echo $data["type"]; ?></p>
        </div>  
        <div class="">
        <label for="Details">Details :</label><br/>
        <p><?php echo $data["description"]; ?></p>
        </div>  
        <div class="line">
        <label for="type">Max time :</label>
        <p class="line-content"><?php echo $data["delay"]; ?></p>
        </div>  
        <div class="">
        <label for="Color">Color :</label>
        <p><?php echo $data["favcolor"]; ?></p>
        <p>Black : #000000</p>
        </div>  
        <div class="line">
        <label for="Price">Price :</label>
        <p class="line-content"><?php echo $data["price"]; ?></p>
        <button class="cancel-job">Cancel</button>
        </div>  
        <div class="div-form-hidden">
        <form class="hidden-form"  action="<?php echo URLROOT; ?>jobs/newjob" method="post">
            <input type="hidden" name="type" value="<?php echo $data["type"]; ?>">
            <input type="hidden" name="favcolor" value="<?php echo $data["favcolor"]; ?>">
            <input type="hidden" name="delay" value="<?php echo $data["delay"]; ?>">
            <input type="hidden" name="price" value="<?php echo $data["price"]; ?>">
            <input type="hidden" name="description" value="<?php echo $data["description"]; ?>">
            <input type="hidden" name="creator" value="<?php echo $_SESSION["lname"]; ?>">
        <button type="submit" name="addjob" class="submit-job">Submit</button>
        </form>
        
        </div>   
    </div>
</div>