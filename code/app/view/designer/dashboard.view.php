<?php include APPROOT . '/view/include-designer/header.php'; ?>

<div class="dashboard-client">
<div class="dashborad-menu-client">
        <button class="all_jobs_menu_btn_client" type="submit" onclick="action('all')"><a>All rendered</a></button>
        <button class="accepted_jobs_menu_btn_client" type="submit" onclick="action('accepted')"><a>Accepted Jobs</a></button>
        <button class="waiting_jobs_menu_btn_client" type="submit" onclick="action('waiting')"><a>Jobs Waiting</a></button>
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
            <p><?php echo $job->creator; ?></p>
            <p> <?php echo $job->description; ?></p>
            <p>Type :  <?php echo $job->type; ?></p>
            <p>Max Time :  <?php echo $job->delay; ?> </p>
            <p> <?php echo $job->price; ?></p>
            <p class="see-more"><a href="<?php echo URLROOT; ?>pages/request_job/<?php echo $job->id; ?>">See More</a></p>
        </div>

    <?php }}?>
    </div>
    <div class="filter">
        <h3>Filter search :</h3>
        <form>
            <label for="p">Price :</label>
            <div class="price-filter">
                <div class="price-choice"><input type="radio" name="price"><p>5$ - 10$</p></div>
                <div class="price-choice"><input type="radio" name="price"><p>20$ - 25$</p></div>
                <div class="price-choice"><input type="radio" name="price"><p>15$ - 20$</p></div>
                <div class="price-choice"><input type="radio" name="price"><p>30$ -  .....</p></div>
            </div>
            <div class="hr"></div><br>
            <label for="p">Type :</label><br><br>
            <select>
                <option selected>Choose Type</option>
                <option value="1">option1</option>
                <option>option2</option>
                <option>option3</option>
            </select>
            <div class="hr"></div>
            <button" class="apply-filter">Apply</button>
        </form>
    </div>
    </div>
</div>



<div class="accepted-jobs">
    <div class="accepted-job-content">
        <div class="job-accept">
            <p>Mr. Abdellah</p>
            <p>Type : Create Logo</p>
            <p>Max Time : 2 days</p>
            <a href="<?php echo URLROOT; ?>pages/submit_rendu"><img class="icon-download" src="<?php echo URLROOT ?>img/rendu.png" ></a>
        </div>
        <div class="job-accept">
            <p>Mr. Abdellah</p>
            <p>Type : Create Logo</p>
            <p>Max Time : 2 days</p>
            <a><img class="icon-download" src="<?php echo URLROOT ?>img/rendu.png"></a>
        </div>        
        <div class="job-accept">
            <p>Mr. Abdellah</p>
            <p>Type : Create Logo</p>
            <p>Max Time : 2 days</p>
            <a><img class="icon-download" src="<?php echo URLROOT ?>img/rendu.png" ></a>
        </div>        <div class="job-accept">
            <p>Mr. Abdellah</p>
            <p>Type : Create Logo</p>
            <p>Max Time : 2 days</p>
            <a><img class="icon-download" src="<?php echo URLROOT ?>img/rendu.png"></a>
        </div>
    </div>
</div>



<div class="waiting-jobs">
        <div class="content-alljobs-waiting">
            <div class="posted-job">
                <p>Mr. abdellah</p>
                <p>I need bla bla bla bla bla bla bla bla bla<br/>bla bla bla bla bla bla bla bla .</p>
                <p>Type : Create Logo</p>
                <p>Max Time : 2 days </p>
                <p>10$</p>
                <p class="see-more"><a href="<?php echo URLROOT; ?>pages/details_job">See More</a></p>
            </div>
            <div class="posted-job">
                <p>Mr. abdellah</p>
                <p>I need bla bla bla bla bla bla bla bla bla<br/>bla bla bla bla bla bla bla bla .</p>
                <p>Type : Create Logo</p>
                <p>Max Time : 2 days </p>
                <p>10$</p>
                <p class="see-more"><a href="<?php echo URLROOT; ?>pages/details_job">See More</a></p>
            </div>
            <div class="posted-job">
                <p>Mr. abdellah</p>
                <p>I need bla bla bla bla bla bla bla bla bla<br/>bla bla bla bla bla bla bla bla .</p>
                <p>Type : Create Logo</p>
                <p>Max Time : 2 days </p>
                <p>10$</p>
                <p class="see-more"><a href="<?php echo URLROOT; ?>pages/details_job">See More</a></p>
            </div>
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