<?php
$user = ['name' => 'brad', 'email' => 'azaz22155@gmail.com', 'age' => 30];
$user = serialize($user);
setcookie('user', $user, time() + 86400 * 30);

$user = unserialize($_COOKIE['user']);
echo $user['name'];
?>
