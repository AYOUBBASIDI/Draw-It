<?php include APPROOT . '/view/include-client/header.php'; ?>

<div class="dashboard-content">
    <div class="dashborad-menu">
        <button class="rendred-menu-btn" type="submit" onclick="action('rendred')"><a>All rendered</a></button>
        <button class="jobs-menu-btn" type="submit" onclick="action('job')"><a>Posted jobs</a></button>
    </div>
    <div class="all-rendred">
        <div class="rendred">
            <p>Ayoub Basidi</p>
            <p>Type : Create Logo</p>
            <p><a href="<?php echo URLROOT; ?>pages/details">See Details</a></p>
            <a><img class="icon-download" src="<?php echo URLROOT ?>img/download.png"></a>
            <a><img class="icon-accept" src="<?php echo URLROOT ?>img/accept.png"></a>
            <a><img class="icon-denied" src="<?php echo URLROOT ?>img/denied.png"></a>
        </div>
        <div class="rendred">
            <p>Ayoub Basidi</p>
            <p>Type : Create Logo</p>
            <p><a href="<?php echo URLROOT; ?>pages/details">See Details</a></p>
            <a><img class="icon-download" src="<?php echo URLROOT ?>img/download.png"></a>
            <a><img class="icon-accept" src="<?php echo URLROOT ?>img/accept.png"></a>
            <a><img class="icon-denied" src="<?php echo URLROOT ?>img/denied.png"></a>
        </div>
    </div>
    <div class="jobs">
    
    <?php
    if (isset($data["jobs"])){
     foreach ($data["jobs"] as $job){ ?>
        <div class="rendred">
            <p>Type : <?php echo $job->type; ?></p>
            <p><a href="<?php echo URLROOT; ?>pages/details/<?php echo $job->id; ?>">See Details</a></p>
            <p><a href="<?php echo URLROOT; ?>pages/requests">15 request</a></p>
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