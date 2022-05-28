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

<hr/>
<hr/><br/><br/>

<h2>Tests Management</h2>
<form action="<?php echo URLROOT; ?>admins/add_test" method="POST">
<label for="title">Titel :</label><br/>
<input type="text" name="title" placeholder="title"><br/><br/>
<label for="slug">Slug :</label><br/>
<input type="text" name="slug" placeholder="slug"><br/><br/>
<label for="color">Color :</label><br/>
<input type="text" name="color" placeholder="color"><br/><br/>
<label for="genre">Genre :</label><br/>
<input type="text" name="genre" placeholder="genre"><br/><br/>
<label for="description">Description :</label><br/>
<textarea name="description" placeholder="description"></textarea><br/><br/>
<input type="submit" name="submit" value="Add Test"><br/><br/>
</form>


<hr/>
<hr/>



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
  <a href="<?php echo URLROOT; ?>admins/upload/<?php echo $item->rendu;?>">Click here to upload it</a>
  <h4>Test Result</h4>
  <button class="accept"><a href="<?php echo URLROOT; ?>admins/accept_designer/<?php echo $item->id_user; ?>/<?php echo $item->id_rendu; ?>">Accept</a></button>
  <button class="reject"><a href="<?php echo URLROOT; ?>admins/reject_designer/<?php echo $item->id_user; ?>/<?php echo $item->id_rendu; ?>">Reject</a></button>
</div>

<?php }} ?>
</div>

