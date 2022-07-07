<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="<?= URLROOT ?>img/D.png">
    <link rel="stylesheet" href="<?= URLROOT ?>public/css/admin.css">
    <title>Document</title>
</head>
<body>




<nav>
  <div class="menu">
  <a class="user active" id="user" onclick = "users()">Users</a>
  <a class="rende" onclick = "rend()" id="rende">Rendered</a>
  <a id="test" class="test" onclick = "tests()">Test</a>
</div>
<div class="logout"><a href="<?php echo URLROOT; ?>pages/index">Log Out</a></div>
</nav>

<div class="content">
  <div id="part1">
  <h2>User Management</h2>
<table class="rwd-table">
  <tr>
    <th>First Name</th>
    <th>Last Name</th>
    <th>E-mail</th>
    <th>Role</th>
    <th>Situation</th>
    <th>To Delete</th>
    <th>Test</th>
  </tr>
  <?php
    if (isset($data["users"])){
     foreach ($data["users"] as $item){ ?>
  <tr>
    <td data-th="fname"> <?php echo $item->fname; ?></td>
    <td data-th="lname"><?php echo $item->lname; ?></td>
    <td data-th="email"><?php echo $item->email; ?></td>
    <td data-th="role"><?php echo $item->role; ?></td>
    <td data-th="situation"><?php echo $item->situation; ?></td>
    <td data-th="operation"><a class="delete" href="<?php echo URLROOT; ?>admins/delete_user/<?php echo $item->id_user; ?>">Delete</a></a></td>
    <td data-th="test">
      <?php if($item->situation === 'sub'){ ?>
        <p>Rendred is send</p>
      <?php }else if($item->situation === 'att' || $item->situation === 'fr'){  ?>
        <p>Waiting for rendred</p>
        <?php }else if($item->situation === 'yes'){  ?>
        <p>Designer is accepted</p>
        <?php }else if($item->situation === 'no'){  ?>
        <p>Designer is rejected</p>
        <?php }else{  ?>
        <p>Nothing to say</p>
      <?php } ?>
    </td>
  </tr>
  <?php }} ?>
</table><br/>
        </div>


<div id="part2">
<h2>Tests Management</h2>
<form action="<?php echo URLROOT; ?>admins/add_test" method="POST">
<div>
<label for="title">Titel :</label><br/>
<input type="text" name="title" ><br/><br/>
</div>
<div>
<label for="slug">Slug :</label><br/>
<input type="text" name="slug" ><br/><br/>
</div>
<div>
<label for="color">Color :</label><br/>
<input type="text" name="color" ><br/><br/>
</div>
<div>
<label for="genre">Genre :</label><br/>
<input type="text" name="genre" ><br/><br/>
</div>
<div class="text">
<label for="description">Description :</label><br/>
<textarea name="description" ></textarea><br/><br/>
</div>
<div>
<input class="btn" type="submit" name="submit" value="Add Test"><br/><br/>
</div>

</form>
        </div>



<div id="part3">
<h2>rendred</h2>
<div class="all-rendred">
<?php
    if (isset($data["rendu"])){
     foreach ($data["rendu"] as $item){ ?>
<div class="cart">
  <h4>designer name :</h4>
  <p><?php echo $item->fname; ?><?php echo $item->lname; ?></p>
  <h4>Messsage :</h4>
  <p><?php echo $item->message; ?></p>
  <h4>rendred</h4>
  <a href="<?php echo URLROOT; ?>admins/download/<?php echo $item->rendu;?>">Click here to upload it</a>
  <h4>Test Result</h4>
  <button class="accept"><a href="<?php echo URLROOT; ?>admins/accept_designer/<?php echo $item->id_user; ?>/<?php echo $item->id_rendu; ?>">Accept</a></button>
  <button class="reject"><a href="<?php echo URLROOT; ?>admins/reject_designer/<?php echo $item->id_user; ?>/<?php echo $item->id_rendu; ?>">Reject</a></button>
</div>



<?php }} ?>
</div>
</div>


     </div>



</body>
<script>
      part3 = document.getElementById("part3");
      part2 = document.getElementById("part2");
      part1 = document.getElementById("part1");
      test = document.getElementById("test");
      rende = document.getElementById("rende");
      user = document.getElementById("user");

function rend(){
part1.style.display = "none";
part2.style.display = "none";
part3.style.display = "block";
rende.classList.toggle("active");
user.classList.remove("active");
test.classList.remove("active");
}

function users(){
part1.style.display = "block";
part2.style.display = "none";
part3.style.display = "none";
rende.classList.remove("active");
user.classList.toggle("active");
test.classList.remove("active");
}

function tests(){
part1.style.display = "none";
part2.style.display = "block";
part3.style.display = "none";
rende.classList.remove("active");
user.classList.remove("active");
test.classList.toggle("active");
}



     </script>

