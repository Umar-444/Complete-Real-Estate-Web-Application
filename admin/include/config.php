<?php
// Property Dealer - Codecanyon Edition | Version: 2.0.0 | License: Envato/Codecanyon Standard | Author: WorldWebTree
$con = mysqli_connect('localhost', 'root', '', 'real_estate');
if (!$con) {
    $error = "Connection failed: " . mysqli_connect_error();
    file_put_contents(__DIR__ . '/db_error.log', date('Y-m-d H:i:s') . ' - ' . $error . "\n", FILE_APPEND);
    echo '<div style="color:red;text-align:center;margin:2em;font-family:sans-serif;font-size:1.2em">Unable to connect to the database. Please contact support.</div>';
    exit();
}
?>