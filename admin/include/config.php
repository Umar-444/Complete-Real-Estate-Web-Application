<?php
$con = mysqli_connect('localhost', 'root', '', 'real_estate');
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>