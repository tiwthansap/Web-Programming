<?php

$db_host = 'localhost';
$db_user = 'its66040233151';
$db_pass = 'I3ahB4L0';
$db_name = 'its66040233151';

$base_url = "https://hosting.udru.ac.th/{$db_name}/ShoppingCart/";

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
