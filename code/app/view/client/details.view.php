<?php include APPROOT . '/view/include-client/header.php'; ?>

<div class="content-details">
<!-- <div class="dashborad-menu">
        <button class="rendred-menu-btn" type="submit" onclick="action('rendred')"><a>All rendered</a></button>
        <button class="jobs-menu-btn" type="submit" onclick="action('job')"><a>Posted jobs</a></button>
    </div> -->
    <?php
    if (isset($data["job"])){
     foreach ($data["job"] as $item){ ?>
    <div class="details">
        <div class="line">
        <label for="type">Type :</label>
        <p class="line-content"><?php echo $item->type_sh; ?></p>
        </div>  
        <div class="">
        <label for="Details">Details :</label><br/>
        <p><?php echo $item->description_sh; ?></p>
        </div>  
        <div class="line">
        <label for="type">Max time :</label>
        <p class="line-content"><?php echo $item->delay_sh; ?> hour (s)</p>
        </div>  
        <div class="">
        <label for="Color">Color :</label>
        <p><?php echo $item->favcolor_sh; ?></p>
        </div>  
        <div class="line">
        <label for="Price">Price :</label>
        <p class="line-content"><?php echo $item->price_sh; ?> $</p>
        </div>   
        <?php }}?>
    </div>
</div>