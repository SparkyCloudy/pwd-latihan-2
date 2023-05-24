<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once "../tableConnect.php";
$deleteId = $_POST['deleteDosen'] ?? null;
$editDosenId = $_POST['editDosen'] ?? null;
$addDosen = $_POST['addDosen'] ?? null;

$id = $_POST['id'] ?? null;
$editId = $_POST['editId'] ?? null;

$nip = $_POST['nip'] ?? null;
$nama = $_POST['nama'] ?? null;
$alamat = $_POST['alamat'] ?? null;

if (isset($addDosen)) {
    addQuery($nip, $nama, $alamat);
    header("location: ../tableApp.php");
}

if (isset($deleteId)) {
    deleteQuery($deleteId);
    header("location: ../tableApp.php");
}

if (isset($editDosenId)) {
    header("location: ../tableEdit.php?id=$editDosenId");
}

if (isset($editId)) {
    updateQuery($editId, $nip, $nama, $alamat);
    header("location: ../tableApp.php");
}
