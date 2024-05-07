<?php
session_start();

require_once "Util.php";

$util = new Util();

require_once "authCookieSessionValidate.php";

if ($isLoggedIn) {
    $util->redirect("dashboard.php?member_name=".$_COOKIE["member_login"]);
}

if (! empty($_POST["login"])) {
    $isAuthenticated = false;
    
    $username = $_POST["member_name"];
    $password = $_POST["member_password"];

    if ($username == 'Alice' && $password == 'in wonderland') {
        $isAuthenticated = true;
    }
    
    if ($isAuthenticated) {
        setcookie("member_login", $username, $cookie_expiration_time);
        $random_password = $util->getToken(16);
        setcookie("random_token", $random_password, $cookie_expiration_time);
		
        $util->redirect("dashboard.php?member_name=".$username);
    } else {
		$util->clearAuthCookie();
        $message = "Invalid Login for " . $username;
    }
}
?>
<style>
body {
    font-family: Arial;
}

#frmLogin {
    padding: 20px 40px 40px 40px;
    background: #d7eeff;
    border: #acd4f1 1px solid;
    color: #333;
    border-radius: 2px;
    width: 300px;
}

.field-group {
    margin-top: 15px;
}

.input-field {
    padding: 12px 10px;
    width: 100%;
    border: #A3C3E7 1px solid;
    border-radius: 2px;
    margin-top: 5px
}

.form-submit-button {
    background: #3a96d6;
    border: 0;
    padding: 10px 0px;
    border-radius: 2px;
    color: #FFF;
    text-transform: uppercase;
    width: 100%;
}

.error-message {
    text-align: center;
    color: #FF0000;
}
</style>

<form action="" method="post" id="frmLogin">
    <div class="error-message"><?php if(isset($message)) { echo $message; } ?></div>
    <div class="field-group">
        <div>
            <label for="login">Username</label>
        </div>
        <div>
            <input name="member_name" type="text"
                value="<?php if(isset($_COOKIE["member_login"])) { echo $_COOKIE["member_login"]; } ?>"
                class="input-field">
        </div>
    </div>
    <div class="field-group">
        <div>
            <label for="password">Password</label>
        </div>
        <div>
            <input name="member_password" type="password"
                value="<?php if(isset($_COOKIE["member_password"])) { echo $_COOKIE["member_password"]; } ?>"
                class="input-field">
        </div>
    </div>
    <div class="field-group">
        <div>
            <input type="submit" name="login" value="Login"
                class="form-submit-button"></span>
        </div>
    </div>
</form>