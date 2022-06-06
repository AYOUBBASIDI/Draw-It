<?php include APPROOT . '/view/include-designer/header.php'; ?>

<div class="dashboard-client">
<div class="dashborad-menu-client">
        <button class="all_jobs_menu_btn_client" type="submit" onclick="action('all')"><a class="txt-btn">All rendered</a></button>
        <button class="accepted_jobs_menu_btn_client" type="submit" onclick="action('accepted')"><a class="txt-btn">Accepted Jobs</a></button>
        <button class="waiting_jobs_menu_btn_client" type="submit" onclick="action('waiting')"><a class="txt-btn">Jobs Waiting</a></button>
    </div>
</div>
<div class="all-job">
    <div class="all-jobs">
    <div class="content-alljobs">
    <?php
    if (isset($data["jobs"])){
            foreach ($data["jobs"] as $job){     
         ?>
        <div class="posted-job">
            <p><?php echo $job->fname;?> <?php echo $job->lname; ?></p>
            <p> <?php echo $job->description; ?></p>
            <p>Type :  <?php echo $job->type; ?></p>
            <p>Max Time :  <?php echo $job->delay; ?> </p>
            <p> <?php echo $job->price; ?> $</p>
            <p class="see-more"><a href="<?php echo URLROOT; ?>pages/request_job/<?php echo $job->id_job; ?>">See More</a></p>
        </div>

    <?php }}?>
    </div>
</div>
</div>



<div class="accepted-jobs">
    <div class="accepted-job-content">
    <?php
    if (isset($data["accepted"])){
        // echo "hello";
            foreach ($data["accepted"] as $item){     
         ?>
        <div class="job-accept">
            <p class="first-row"><?php echo $item->fname;?> <?php echo $item->lname; ?></p>
            <p class="second-row">Type : <?php echo $item->type;?></p>
            <p class="second-row">Max Time : <?php echo $item->delay;?></p>
            <a href="<?php echo URLROOT; ?>pages/submit_rendu/<?php echo $item->id_job;?>"><img class="icon-download" src="<?php echo URLROOT ?>img/rendu.png" ></a>
        </div>
        <?php } }?>
    </div>
</div>



<div class="waiting-jobs">
        <div class="content-alljobs-waiting">
        <?php
    if (isset($data["requests"])){
            foreach ($data["requests"] as $request){  
         ?>
            <div class="posted-job">
                <p><?php echo $request->fname ?> <?php echo $request->lname ?></p>
                <p><?php echo $request->description ?></p>
                <p>Type : <?php echo $request->type ?></p>
                <p>Max Time : <?php echo $request->delay ?> </p>
                <p><?php echo $request->price ?> $</p>
                <p class="see-more"><a href="<?php echo URLROOT; ?>pages/details_job">See More</a></p>
            </div>

            <?php }} ?>
        </div>
</div>
</div>








<script>
    var btn1_menu = document.querySelector('.all_jobs_menu_btn_client');
    var btn2_menu = document.querySelector('.accepted_jobs_menu_btn_client');
    var btn3_menu = document.querySelector('.waiting_jobs_menu_btn_client');
     function action(page){
        if(page == "all"){
            document.getElementsByClassName("all-job")[0].style.display = "block";
            document.getElementsByClassName("accepted-jobs")[0].style.display = "none";
            document.getElementsByClassName("waiting-jobs")[0].style.display = "none";
            btn1_menu.style="background-color: #F3A1FF;";
            btn2_menu.style="background-color: #F9CDFF;";
            btn3_menu.style="background-color: #F9CDFF;";
    }else if(page == "accepted"){
        document.getElementsByClassName("all-job")[0].style.display = "none";
        document.getElementsByClassName("accepted-jobs")[0].style.display = "block";
        document.getElementsByClassName("waiting-jobs")[0].style.display = "none";
        btn1_menu.style="background-color: #F9CDFF;";
        btn2_menu.style="background-color: #F3A1FF;";
        btn3_menu.style="background-color: #F9CDFF;";
    }
    else if(page == "waiting"){
        document.getElementsByClassName("all-job")[0].style.display = "none";
        document.getElementsByClassName("accepted-jobs")[0].style.display = "none";
        document.getElementsByClassName("waiting-jobs")[0].style.display = "block";
        btn1_menu.style="background-color: #F9CDFF;";
        btn2_menu.style="background-color: #F9CDFF;";
        btn3_menu.style="background-color: #F3A1FF;";
    }
}
</script>