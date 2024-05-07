<?php 
session_start();
require_once "authCookieSessionValidate.php";
if(!$isLoggedIn) {
	header("Location: ./");
}
?>
<style>
.member-dashboard {
    padding: 40px;
    background: #D2EDD5;
    color: #555;
    border-radius: 4px;
    display: inline-block;
}

.member-dashboard a {
    color: #09F;
    text-decoration: none;
}
</style>
<div class="member-dashboard">
   Welcome <?php if(isset($_GET["member_name"])) { echo $_GET["member_name"]; } ?>! Your token is <?php if(isset($_COOKIE["random_token"])) { echo $_COOKIE["random_token"]; } ?> <a href="logout.php">Logout</a>
</div>