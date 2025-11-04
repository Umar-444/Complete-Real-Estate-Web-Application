<?php
/**
 * Delete Property Handler (Admin)
 * Deletes a property and associated images from DB and filesystem, with CSRF validation.
 * For Codecanyon Real Estate product.
 */
if (session_status() == PHP_SESSION_NONE) { session_start(); }
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
// Check if admin is logged in
if (!isset($_SESSION['email'])) {
    header('location:index.php');
    exit();
}
include('include/header.php');

$sid = $_GET['x'] ?? null;
$csrf = $_GET['csrf'] ?? null;
if (!$sid || !isset($csrf) || $csrf !== $_SESSION['csrf_token']) {
    exit('<div class="alert alert-danger">Invalid delete request or CSRF token. <a href="view_property.php">Back to Properties</a></div>');
}

// Secure select for main image
$stmt1 = $con->prepare("SELECT image FROM property WHERE id = ?");
$stmt1->bind_param('i', $sid);
$stmt1->execute();
$stmt1->bind_result($img);
$stmt1->fetch();
$stmt1->close();
if ($img) { unlink("images/property_image/$img"); }

// Secure select for gallery images
$stmt2 = $con->prepare("SELECT image1, image2, image3, image4 FROM images WHERE property_id = ?");
$stmt2->bind_param('i', $sid);
$stmt2->execute();
$stmt2->bind_result($img1, $img2, $img3, $img4);
$stmt2->fetch();
$stmt2->close();
foreach ([$img1, $img2, $img3, $img4] as $gimg) { if ($gimg) { unlink("images/property_image/$gimg"); }}

// Secure deletes
$stmt3 = $con->prepare("DELETE FROM property WHERE id = ?");
$stmt3->bind_param('i', $sid);
$stmt3->execute();
$stmt3->close();
$stmt4 = $con->prepare("DELETE FROM images WHERE property_id = ?");
$stmt4->bind_param('i', $sid);
$stmt4->execute();
$stmt4->close();
echo"<script>window.location.href='view_property.php';</script>";		
	

?>