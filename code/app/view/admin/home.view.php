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
<table class="rwd-table">
  <tr>
    <th>First Name</th>
    <th>Last Name</th>
    <th>E-mail</th>
    <th>Role</th>
    <th>Situation</th>
    <th>Operation</th>
  </tr>
  <?php
    if (isset($data["users"])){
     foreach ($data["users"] as $item){ ?>
  <tr>
    <td data-th="fname"> <?php echo $item->fname; ?></td>
    <td data-th="lname"><?php echo $item->lname; ?></td>
    <td data-th="email"><?php echo $item->email; ?></td>
    <td data-th="role"><?php echo $item->role; ?></td>
    <td data-th="situation"></td>
    <td data-th="operation">att</td>
  </tr>
  <?php }} ?>
</table>