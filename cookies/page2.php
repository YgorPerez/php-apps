<?php
setcookie('username', 'Frank', time() + 86400 * 30);

// delete cookie
setcookie('username', 'Frank', time() - 3600);

if (count($_COOKIE) > 0) {
	echo 'there are ' . count($_COOKIE) . ' cookies';
} else {
	echo 'no cookies';
}

if (isset($_COOKIE['username'])) {
	$username = $_COOKIE['username'];
	echo "Welcome back, $username";
} else {
	echo 'Username not found';
}
?>
