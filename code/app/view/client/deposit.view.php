<?php include APPROOT . '/view/include-client/header.php'; ?>

<div class="deposit-page">
<?php
    if (isset($data["request"])){
     foreach ($data["request"] as $item){ ?>
    <div class="header-depose">
        <h3>Deposit</h3>
        <p>You have :   <?php echo $item->wallet; ?> $</p>
    </div>
    <?php }} ?>
    <div class="depo-content">
        <form  action="<?php echo URLROOT; ?>moneys/depos" method="POST">
        <label for="method">Choose the method :</label><br/>
        <div class="methods">
        <div><input class="method" type="radio" name="method" value="paypal"><img class="method-icon" src="<?php echo URLROOT ?>img/paypal.png"></div>
        <div><input class="method" type="radio" name="method" value="payoneer"><img class="method-icon" src="<?php echo URLROOT ?>img/payoneer.png"></div>
        </div><br/>
        <label for="account">Enter your account number :</label><br/>
        <input class="account" type="text" name="account" placeholder=""><br/>
        <label for="depos">Enter the depos :</label><br/>
        <input class="depos" type="text" name="depos" placeholder=""><br/>
        <button class="deposit" type="submit" name="get_money"><a>Deposit</a></button>
        </form>

    </div>
</div>