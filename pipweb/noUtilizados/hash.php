<?php
$password = "123abc";
$hash = password_hash($password, PASSWORD_DEFAULT);
echo $hash;
?>