<?php
require('recaptcha/autoload.php');
if(isset($_POST['submitpost'])){
    if(isset($_POST['g-recaptcha-response'])){
        $recaptcha = new \ReCaptcha\ReCaptcha('6LcquNckAAAAAOeoV_yJUC3vSK_hZZ_aAs_raAAB');
        $resp = $recaptcha->verify($_POST['g-recaptcha-response']);
        if ($resp->isSuccess()) {
            var_dump('Captcha Valide');
        } else {
            $errors = $resp->getErrorCodes();
            var_dump('Captcha Invalide');
            var_dump('$errors');
        }
        }else{var_dump('Captcha non rempli');}
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <title> Login</title>

</head>
<body>
   <div class="box">
    <div class="container">

        <div class="top">
            <span>Have an account?</span>
            <header>Login</header>
        </div>

        <div class="input-field">
            <input type="text" class="input" placeholder="Username" id="">
            <i class='bx bx-user' ></i>
        </div>

        <div class="input-field">
            <input type="Password" class="input" placeholder="Password" id="">
            <i class='bx bx-lock-alt'></i>
        </div>

        <div class="input-field">
            <input type="submit" class="submit" value="Login" id="">
        </div>
         

        <div class="two-col">
            <div class="one">
               <input type="checkbox" name="" id="check">
               <label for="check"> Remember Me</label>
            </div>
            <div class="two">
                <label><a href="#">Forgot password?</a></label>
            </div>
        </div>
        <form action="/login" method="POST">
            <div class="g-recaptcha" data-sitekey="6LcquNckAAAAAB1WMl8G_pYGrb7HoQL9dQvZM4_U" >Submit</div>
            <br/>
            <input type="submit" value="Valider" name="submitpost">
        </form>
    </div>
</div>
 
</body>
</html>