<?php 
session_start();
error_reporting(0);
// YOU CAN ONLY EDIT HERE
$url = 'XSS attack url here...';
// Feel free to write code here 

// END OF EDIT
sleep(1);

// READ the token from here
$data = file_get_contents('./token.txt', true);
parse_str(strtr($data, array('&' => '%26', '+' => '%2B', ';' => '&')), $cookies);
$name = $cookies['member_login'];
$token = $cookies['random_token'];
unlink('./token.txt');
?>
<script>
	function openWindowReload(link) {
		var href = link.href;
		window.open(href,'_blank');
		document.location.reload(true)
	}
</script>
<div class="member-dashboard">
   Name = <?php echo $name; ?> <br> Random_token=<?php echo $token; ?>
</div>
<a href=<?php echo $url;?> target="_blank" id="attack" onClick="openWindowReload(this)">attack</a>
<style>
.member-dashboard {
    padding: 40px;
    background: #A22E24;
    color: black;
    border-radius: 4px;
    display: inline-block;
}

.member-dashboard a {
    color: #09F;
    text-decoration: none;
}
</style>