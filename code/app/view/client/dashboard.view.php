<?php if($_SESSION['id'] == null){
    redirect("pages/index");
}else{
?>


<?php include APPROOT . '/view/include-client/header.php'; ?>

<div class="dashboard-content">

<?php if(isset($_SESSION["status"])){ ?>
        <p class ="status"><?php echo $_SESSION["status"]; ?></p>
        <?php }
        $_SESSION['status'] = null;
         ?>

    <div class="dashborad-menu">
        <button class="rendred-menu-btn" type="submit" onclick="action('rendred')"><a>All rendered</a></button>
        <button class="jobs-menu-btn" type="submit" onclick="action('job')"><a>Posted jobs</a></button>
    </div>
    <div class="all-rendred">
    <?php
    if (!empty($data["rendu"])){
     foreach ($data["rendu"] as $rendu){ ?>
        <div class="rendred">
            <p class="first-line"><?php echo $rendu->fname; ?> <?php echo $rendu->lname; ?></p>
            <p class="second-line">Type :  <?php echo $rendu->type; ?></p>
            <p class="third-line"><a href="<?php echo URLROOT; ?>pages/details/<?php echo $rendu->rendu_for; ?>">See Details</a></p>
            <a class="line-icon" href="<?php echo URLROOT; ?>users/uploadfile/<?php echo $rendu->rendu_client; ?>"><img class="icon-download" src="<?php echo URLROOT ?>img/download.png"></a>
            <?php if($rendu->status_rendu == 0){ ?> 
                <a class="line-icon" href="<?php echo URLROOT; ?>users/goodjob/<?php echo $rendu->id_job; ?>/<?php echo $rendu->id_user; ?>/<?php echo $rendu->price; ?>/<?php echo $rendu->id_rendu; ?>"><img class="icon-accept" src="<?php echo URLROOT ?>img/accept.png"></a>
            <?php }else{ ?>
            <a style="cursor:not-allowed;"><img class="icon-accept" src="<?php echo URLROOT ?>img/accept.png"></a>
            <?php } ?>

            <?php if($rendu->status_rendu == 0){ ?> 
            <a href="<?php echo URLROOT; ?>jobs/rejected/<?php echo $rendu->id_user; ?>/<?php echo $rendu->id_job; ?>/<?php echo $rendu->id_rendu; ?>"><img class="icon-denied" src="<?php echo URLROOT ?>img/denied.png"></a>
            <?php }else{ ?>
            <a style="cursor:not-allowed;"><img class="icon-denied" src="<?php echo URLROOT ?>img/denied.png"></a>
            <?php } ?>
        </div>
    <?php }}else{ ?>
        <div class="no rendred">
            <p class="norow">You don't have any rendred</p>
        </div>
        <?php } ?>

    <div class="newjob">
            <a href="<?php echo URLROOT; ?>pages/new_job">Add New Job <img src="<?php echo URLROOT ?>img/newjob.png"></a>
        </div>

    </div>
    <div class="jobs">
    
    <?php
    if (!empty($data["jobs"])){
     foreach ($data["jobs"] as $job){ ?>
        <div class="rendred">
            <p class="row">Type : <?php echo $job->type_sh; ?></p>
            <p class="row"><a href="<?php echo URLROOT; ?>pages/details/<?php echo $job->id_job_sh; ?>">See Details</a></p>
            <p class="row"><a href="<?php echo URLROOT; ?>pages/requests/<?php echo $job->id_job_sh; ?>"><?php echo $job->requests_sh; ?> request</a></p>
            <a href="<?php echo URLROOT; ?>jobs/deletejob/<?php echo $job->id_job_sh; ?>"><img class="icon-delete" src="<?php echo URLROOT ?>img/delete.png"></a>
        </div>
        <?php }}else{ ?>
        <div class="no rendred">
            <p class="norow">You don't have any post <a href="<?php echo URLROOT; ?>pages/new_job">add one</a></p>
        </div>
        <?php } ?>


        <div class="newjob">
            <a href="<?php echo URLROOT; ?>pages/new_job">Add New Job <img src="<?php echo URLROOT ?>img/newjob.png"></a>
        </div>
    </div>
</div>

<script>
    //get rendred-menu-btn and jobs-menu-btn
    var rendred_menu_btn = document.querySelector('.rendred-menu-btn');
    var jobs_menu_btn = document.querySelector('.jobs-menu-btn');

    // function rendred(){
    //     document.getElementsByClassName("all-rendred")[0].style.display = "block";
    //     document.getElementsByClassName("jobs")[0].style.display = "none";
    //     rendred_menu_btn.classList.add("open");
    //     jobs_menu_btn.classList.add("close");
    // }
    // function jobs(){
    //     document.getElementsByClassName("all-rendred")[0].style.display = "none";
    //     document.getElementsByClassName("jobs")[0].style.display = "block";
    //     rendred_menu_btn.classList.add("close");
    //     jobs_menu_btn.classList.add("open");
    // }
    function action(page){
        if(page == "rendred"){
            document.getElementsByClassName("all-rendred")[0].style.display = "block";
            document.getElementsByClassName("jobs")[0].style.display = "none";
            rendred_menu_btn.style="background-color: #F3A1FF;";
            jobs_menu_btn.style="background-color: #F9CDFF;";
    }else if(page == "job"){
        document.getElementsByClassName("all-rendred")[0].style.display = "none";
        document.getElementsByClassName("jobs")[0].style.display = "block";
        rendred_menu_btn.style="background-color: #F9CDFF;";
            jobs_menu_btn.style="background-color: #F3A1FF;";
    }
}
</script>


<?php } ?>

