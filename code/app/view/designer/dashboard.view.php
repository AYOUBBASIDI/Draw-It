<?php if($_SESSION['id'] == null){
    redirect("pages/index");
}else{
?>


<?php include APPROOT . '/view/include-designer/header.php'; ?>

<div class="dashboard-client">
    
<?php if(isset($_SESSION["status"])){ ?>
        <p class ="status"><?php echo $_SESSION["status"]; ?></p>
        <?php }
        $_SESSION['status'] = null;
         ?>

<div class="dashborad-menu-client">
        <button class="all_jobs_menu_btn_client" type="submit" onclick="action('all')"><a class="txt-btn">All Jobs</a></button>
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
            <p><em>Client</em> : <?php echo $job->fname;?> <?php echo $job->lname; ?></p>
            <p class="desdiv"> - <?php echo $job->description_sh; ?></p>
            <p><em>Type :</em>  <?php echo $job->type_sh; ?></p>
            <p><em>Delay :</em>  <?php echo $job->delay_sh; ?> </p>
            <p><em>Color :</em>  <?php echo $job->favcolor_sh; ?> </p>
            <div class="seemore">
                <div class="content-seemore">
                  <div class="prix"><p><?php echo $job->price_sh; ?> $</p></div> 
                  <a href = "<?php echo URLROOT; ?>pages/request_job/<?php echo $job->id_job_sh; ?>" class="btn btn-2">Submit a request</a>
                </div>
                <p class="see">See More</p>
            </div>
        </div>
    <?php }}?>
    </div>
</div>
</div>



<div class="accepted-jobs">
    <div class="accepted-job-content">
    <?php
    if (isset($data["accepted"])){
            foreach ($data["accepted"] as $item){     
         ?>
        <div class="forreject" >
        <div class="job-accept">
            <p class="first-row"><?php echo $item->fname;?> <?php echo $item->lname; ?></p>
            <p class="second-row">Type : <?php echo $item->type;?></p>
            <p class="second-row">Max Time : <?php echo $item->delay;?></p>
            <a href="<?php echo URLROOT; ?>pages/submit_rendu/<?php echo $item->id_job;?>"><img class="icon-download" src="<?php echo URLROOT ?>img/rendu.png" ></a>
        </div>
        </div>
        <?php 
        if( $item->rejected == 1){
        ?>
        <p class="reject">rejected</p></div>

        <?php }}} ?>
    </div>
</div>



<div class="waiting-jobs">
        <div class="content-alljobs-waiting">
        <?php
    if (isset($data["requests"])){
            foreach ($data["requests"] as $request){  
         ?>
            <div class="posted-job">
            <p><em>Client</em> : <?php echo $request->fname;?> <?php echo $request->lname; ?></p>
            <p class="desdiv"> - <?php echo $request->description_sh; ?></p>
            <p><em>Type :</em>  <?php echo $request->type_sh; ?></p>
            <p><em>Max Time :</em>  <?php echo $request->delay_sh; ?> </p>
            <p><em>Color :</em>  <?php echo $request->favcolor_sh; ?> </p>
            <div class="seemore">
                <div class="content-seemore">
                  <div class="prix"><p><?php echo $request->price_sh; ?> $</p></div> 
                  <a style="top: 45%;left: 36%;" href = "<?php echo URLROOT; ?>pages/details_job/<?php echo $request->id_job_sh; ?>" class="btn btn-2">See Details</a>
                </div>
                <p class="see">See More</p>
            </div>
        </div>

            <?php }}else ?>
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

// let test = document.getElementsByClassName("posted-job")[];

// test.addEventListener("mouseenter", function( event ) {
//   event.target.style.color = "purple";
// }, false);

// Ce gestionnaire sera exécuté à chaque fois que le curseur
// se déplacera sur un autre élément de la liste
// test.addEventListener("mouseover", function( event ) {
//   // on met l'accent sur la cible de mouseover
//   event.target.style.color = "orange";

// }, false);

// function seemore(event){
    
// }

</script>


<?php } ?>