<?php 
require_once "Util.php";

$util = new Util();

// Get Current date, time
$current_time = time();
$current_date = date("Y-m-d H:i:s", $current_time);

// Set Cookie expiration for 1 month
$cookie_expiration_time = $current_time + (30 * 24 * 60 * 60);  // for 1 month

$isLoggedIn = false;

// Check if loggedin session exists
if (! empty($_COOKIE["member_login"]) && !empty($_COOKIE["random_token"])) {
        $isLoggedIn = true;
}
?>