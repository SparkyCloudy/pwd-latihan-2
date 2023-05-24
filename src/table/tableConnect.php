<?php
$szUser = "root";
$szPass = "0934";
$szDb = "db_latihan-2";
$szHost = "localhost";

$bConnectSql = mysqli_connect($szHost, $szUser, $szPass, $szDb);

function dataQuery(): bool|mysqli_result {
    global $bConnectSql;
    return mysqli_query($bConnectSql, "SELECT * FROM dosen");
}

function deleteQuery(int $id): bool|mysqli_result {
    global $bConnectSql;
    return mysqli_query($bConnectSql, "DELETE FROM dosen WHERE id='$id'");
}

function editQuery(int $id): bool|mysqli_result {
    global $bConnectSql;
    return mysqli_query($bConnectSql, "SELECT * FROM dosen WHERE id='$id'");
}

function updateQuery(int $id, string $nip, string $nama, string $alamat): bool|mysqli_result {
    global $bConnectSql;
    return mysqli_query($bConnectSql,
        "UPDATE dosen SET nama='$nama', nip='$nip', alamat='$alamat' WHERE id='$id'"
    );
}

function addQuery(string $nip, string $nama, string $alamat): bool|mysqli_result {
    global $bConnectSql;
    return mysqli_query($bConnectSql, "INSERT INTO dosen VALUES(DEFAULT, '$nip', '$nama', '$alamat')");
}