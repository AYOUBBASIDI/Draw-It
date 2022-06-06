<?php include APPROOT . '/view/include-client/header.php'; ?>
<?php 
            if (isset($data["user"])){
            foreach ($data["user"] as $info){ ?>
<div class="profile-content">

    <div class="info-profile">
        <h3>Personal Information :</h3>
        
        <div class="info">
            <div><p><?php echo $info->fname;?>&nbsp;<?php echo $info->lname; ?></p></div>
            <div><p><?php echo $info->email; ?></p></div>
            <div><p>Add a number phone</p></div>
        </div>
        
        <button class="update-info">Update Profile</button>
    </div>
    <div class = "vertical"></div>
    <div class="jobs-profile">
    <h3>Your Jobs :</h3>
        <div class="all-jobs-profile">
            <div class="head-jobs">
                <p><?php echo $info->num_job_complet; ?> Job Completed</p>
                <p>Wallet : <?php echo $info->wallet; ?> $</p>
            </div>
            <div class="single-jobs">
            <?php 
            if (isset($data["job_complete"])){
            $i=1;
            foreach ($data["job_complete"] as $item){ 
                ?>
                <div class="job">
                    <p># <?php echo $i++;  ?></p>
                    <p><?php echo $item->type; ?></p>
                    <p><?php echo $item->price; ?> $</p>
                </div>
                <?php  }} ?> 
            <div>
        </div>
    </div>
</div>
<?php }} ?>
<script>
    function showPwd(){
        document.getElementsByClassName("pwd-hide")[0].style.display = "none";
        document.getElementsByClassName("pwd-show")[0].style.display = "flex";
    }
    function hidePwd(){
        document.getElementsByClassName("pwd-hide")[0].style.display = "flex";
        document.getElementsByClassName("pwd-show")[0].style.display = "none";
    }
</script>