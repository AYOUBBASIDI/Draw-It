<?php include APPROOT . '/view/include-client/header.php'; ?>

<div class="requests-page">
    <p class="budget">You have : 240 $</p>
    <?php
    if (!empty($data["request"])){
        foreach ($data["request"] as $item){?>
    <div class="notif">
        <ul>
            <li>Click here to accepte request .</li>
            <li>You can accepte than one . </li>
            <li>You will pay for each acceptation .</li>
        </ul>
        <img src="<?php echo URLROOT ?>img/notif.png">
    </div>
    <?php

      ?>
    <div class="requests">
        <div class="request">
            <p><?php echo $item->fname; ?> <?php echo $item->lname; ?></p>
            <p><?php echo $item->num_job_complet; ?> job complet</p>
            <p><?php echo $item->price; ?></p>
            <a href="<?php echo URLROOT; ?>jobs/acceptJob/<?php echo $item->id_user; ?>/<?php echo $item->fname; ?>/<?php echo $item->id_job; ?>/<?php echo $item->id; ?>/<?php echo $item->price; ?>"><img class="icon-delete" src="<?php echo URLROOT ?>img/take-designer.png" ></a>
        </div>
    </div>
    <?php }}else{ ?>
    <div class="no request">
        <p>You have no request</p>
    </div>
    <?php } ?>

</div>