<?php
include "../loginConnect.php";
global $bConnectSql, $username;

$cek = mysqli_num_rows(queryCheckLogin());
$result = mysqli_fetch_array(queryCheckLogin());

if ($cek > 0) {
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['role'] = $result['role'];
    header("location: ../loginApp.php?message=success");
} else {
    header("location: ../loginApp.php?message=failed");
}