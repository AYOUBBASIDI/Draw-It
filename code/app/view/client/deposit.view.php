<?php include APPROOT . '/view/include-client/header.php'; ?>

<div class="deposit-page">
    <div class="header-depose">
        <h3>Deposit</h3>
        <p>You have :   15$</p>
    </div>
    <div class="depo-content">
        <form>
        <label for="method">Choose the method :</label><br/>
        <div class="methods">
        <div><input class="method" type="radio" name="method" value="paypal"><img class="method-icon" src="<?php echo URLROOT ?>img/paypal.png"></div>
        <div><input class="method" type="radio" name="method" value="payoneer"><img class="method-icon" src="<?php echo URLROOT ?>img/payoneer.png"></div>
        </div><br/>
        <label for="account">Enter your account number :</label><br/>
        <input class="account" type="text" name="account" placeholder=""><br/>
        <label for="depos">Enter the depos :</label><br/>
        <input class="depos" type="text" name="depos" placeholder=""><br/>
        <button class="deposit" type="submit"><a href="<?php echo URLROOT; ?>pages/client_dashboard">Deposit</a></button>
        </form>

    </div>
</div>