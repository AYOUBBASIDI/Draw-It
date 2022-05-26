<?php include APPROOT . '/view/include-client/header.php'; ?>

<div class="profile-content">

    <div class="info-profile">
        <h3>Personal Information :</h3>
        <?php 
            if (isset($data["user"])){
            foreach ($data["user"] as $info){ ?>
        <div class="info">
            <div><p><?php echo $info->fname;?>&nbsp;<?php echo $info->lname; ?></p></div>
            <div><p><?php echo $info->email; ?></p></div>
            <div class="pwd-hide"><p>*************</p><a onclick="showPwd()"><img src="<?php echo URLROOT ?>img/vue.png"></a></div>
            <div class="pwd-show" style="display:none;"><p><?php echo $info->pwd; ?></p><a onclick="hidePwd()"><img src="<?php echo URLROOT ?>img/cacher.png"></a></div>
            <div><p>Add a number phone</p></div>
        </div>
        <?php }} ?>
        <button class="update-info">Update Profile</button>
    </div>
    <div class = "vertical"></div>
    <div class="jobs-profile">
    <h3>Your Jobs :</h3>
        <div class="all-jobs-profile">
            <div class="head-jobs">
                <p>15 Job Completed</p>
                <p>remaining money : 135 $</p>
            </div>
            <div class="single-jobs">
                <div class="job">
                    <p>#1</p>
                    <p>Create a Logo</p>
                    <p>10$</p>
                </div>
                <div class="job">
                    <p>#1</p>
                    <p>Create a Logo</p>
                    <p>10$</p>
                </div>
                <div class="job">
                    <p>#1</p>
                    <p>Create a Logo</p>
                    <p>10$</p>
                </div>
                <div class="job">
                    <p>#1</p>
                    <p>Create a Logo</p>
                    <p>10$</p>
                </div>
                <div class="job">
                    <p>#1</p>
                    <p>Create a Logo</p>
                    <p>10$</p>
                </div>
            <div>
        </div>
    </div>
</div>

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