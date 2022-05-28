<?php include APPROOT . '/view/include-client/header.php'; ?>

<div class="dashboard-content">
    <div class="dashborad-menu">
        <button class="rendred-menu-btn" type="submit" onclick="action('rendred')"><a>All rendered</a></button>
        <button class="jobs-menu-btn" type="submit" onclick="action('job')"><a>Posted jobs</a></button>
    </div>
    <div class="all-rendred">
    <?php
    if (isset($data["rendu"])){
     foreach ($data["rendu"] as $rendu){ ?>
        <div class="rendred">
            <p><?php echo $rendu->fname; ?> <?php echo $rendu->lname; ?></p>
            <p>Type :  <?php echo $rendu->type; ?></p>
            <p><a href="<?php echo URLROOT; ?>pages/details/<?php echo $rendu->rendu_for; ?>">See Details</a></p>
            <a href="<?php echo URLROOT; ?>users/uploadfile/<?php echo $rendu->rendu_client; ?>"><img class="icon-download" src="<?php echo URLROOT ?>img/download.png"></a>
            <a href="<?php echo URLROOT; ?>users/goodjob/<?php echo $rendu->id_job; ?>/<?php echo $rendu->id_user; ?>"><img class="icon-accept" src="<?php echo URLROOT ?>img/accept.png"></a>
            <a><img class="icon-denied" src="<?php echo URLROOT ?>img/denied.png"></a>
        </div>
    <?php }} ?>
    </div>
    <div class="jobs">
    
    <?php
    if (isset($data["jobs"])){
     foreach ($data["jobs"] as $job){ ?>
        <div class="rendred">
            <p>Type : <?php echo $job->type; ?></p>
            <p><a href="<?php echo URLROOT; ?>pages/details/<?php echo $job->id_job; ?>">See Details</a></p>
            <p><a href="<?php echo URLROOT; ?>pages/requests/<?php echo $job->id_job; ?>"><?php echo $job->requests; ?> request</a></p>
            <a><img class="icon-delete" src="<?php echo URLROOT ?>img/delete.png"></a>
        </div>
        <?php }} ?>

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