<?php include APPROOT . '/view/include-designer/header.php'; ?>

<div class="content-jobcreate">
    <?php
if (isset($data["job"])){
     foreach ($data["job"] as $item){ ?>
    <div class="requestAjob jobCreate">
        <div class="line">
        <label for="owner">Owner :</label>
        <p class="line-content"><?php echo $item->creator; ?></p>
        </div>  
        <div class="line">
        <label for="type">Type :</label>
        <p class="line-content"><?php echo $item->type; ?></p>
        </div>  
        <div class="">
        <label for="Details">Details :</label><br/>
        <p><?php echo $item->description; ?></p>
        </div>  
        <div class="line">
        <label for="type">Max time :</label>
        <p class="line-content"><?php echo $item->delay; ?></p>
        </div>  
        <div class="">
        <label for="Color">Color :</label>
        <p><?php echo $item->favcolor; ?></p>
        <p>Black : #000000</p>
        </div>  
        <div class="line">
        <label for="Price">Price :</label>
        <p class="line-content"><?php echo $item->price; ?></p>
        <button class="submit-job btn-request" onclick="request()">Request</button>
        </div>   
        <?php }} ?>
    </div>
</div>

<script>
    function request(){
        location.href = "<?php echo URLROOT; ?>jobs/new_request/<?php echo $item->id; ?>";
    }
</script>