<?php
$szUser = "root";
$szPass = "0934";
$szDb = "db_latihan-2";
$szHost = "localhost";

$username = $_POST['usernameForm'] ?? null;
$password = $_POST['passwordForm'] ?? null;

$bConnectSql = mysqli_connect($szHost, $szUser, $szPass, $szDb);
$sqlQuery = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";

function queryCheckLogin(): bool|mysqli_result {
    global $bConnectSql, $sqlQuery;
    return mysqli_query($bConnectSql, $sqlQuery);
}
