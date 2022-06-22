<?php if($_SESSION['id'] == null){
    redirect("pages/index");
}else{
?>


<?php include APPROOT . '/view/include-designer/header.php'; ?>

<div class="profile-content">
    <?php 
            if (isset($data["user"])){
            foreach ($data["user"] as $info){ ?>


<?php if(isset($_SESSION["status"])){ ?>
        <p class ="status_profile"><?php echo $_SESSION["status"]; ?></p>
        <?php }
        $_SESSION['status'] = null;
?>
<div class="info-profile" id="part1">
        <h3>Personal Information :</h3>
        
        <div class="info">
            <div>
            <p>Full name :</p>
            <p><?php echo $info->fname;?>&nbsp;<?php echo $info->lname; ?></p><br>
            <p>E-mail :</p>
            <p><?php echo $info->email; ?></p><br>
            <p>Phone Number :</p>
            <p><?php echo $info->phone; ?></p></div>
        </div>
        <div class="icon_update">
            <a onclick="update()"><img src="<?php echo URLROOT ?>img/update.png" alt="update"></a>
        </div>
        
        <!-- <button class="update-info" onclick="update()">Update Profile</button> -->
    </div>

    <div class="info-profile update" id="part2">
        <h3>Personal Information :</h3>

        <div class="info inputs ">
        <form action="<?php echo URLROOT; ?>jobs/update" method="post">
        <div><input type="text"  name="fname" class="fname" value="<?php echo $info->fname;?>" required/><span class="div"></span><input type="text"  name="lname" class="lname" value="<?php echo $info->lname; ?>" required/></div>
        <div><input type="text"  name="email" class="input" value="<?php echo $info->email; ?>" required/></div>
        <div><input type="password"  name="pwd" class="input" placeholder="Change Password or keep it"></div>
        <input type="hidden"  name="oldpwd" value="<?php echo $info->pwd;?>">
        <input type="hidden"  name="oldphone" value="<?php echo $info->phone;?>">
        <?php if($info->phone != "Add a number phone"){ ?>
        <div><input type="tel"  name="phone" class="input" value="<?php echo $info->phone;?>"></div>
        <?php }else{ ?>
        <div><input type="tel"  name="phone" class="input" placeholder="Add a number phone"></div>
        <?php } ?>
        </div>
        <div class="btn_update">
        <button class="update_btn" name="update">Update</button>
        </form>
        <button class="cancel_btn" onclick="profile()">Cancel</button>
        </div>
    </div>

    <div class = "vertical"></div>
    <div class="jobs-profile">
    <h3>Your Jobs :</h3>
        <div class="all-jobs-profile">
            <div class="head-jobs">
                <p><?php echo $info->num_job_complet; ?> Job Completed</p>
                <p>Money Earned : <?php echo $info->wallet; ?> $</p>
            </div>
            <div class="single-jobs">
            <?php 
            if (isset($data["job_complete"])){
            $i=1;
            foreach ($data["job_complete"] as $item){  ?>
                <div class="job">
                    <p># <?php echo $i++;  ?></p>
                    <p><?php echo $item->type; ?></p>
                    <p><?php echo $item->price; ?> $</p>
                </div>
                <?php }}?>
                    
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
    function update(){
        document.getElementById("part1").style.display = "none";
        document.getElementById("part2").style.display = "block";
    }
    function profile(){
        document.getElementById("part1").style.display = "block";
        document.getElementById("part2").style.display = "none";
    }
</script>


<?php } ?>

