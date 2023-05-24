<!doctype html>
<html lang="en">
<head>
    <?php
    require_once "tableConnect.php";
    $query = editQuery($_GET['id']);
    $editResult = mysqli_fetch_array($query);
    ?>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../node_modules/bootstrap5/src/css/bootstrap.min.css">
    <title>Edit Data <?php echo $editResult['nama'] ?></title>
</head>
<body>
<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location: ../login/loginApp.php");
}
?>
<div class="container">
    <div class="d-flex align-items-center justify-content-center vh-100">
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <form action="action/tableAction.php" method="post">
                        <div class="card-text">
                            <label class="form-label mb-0" for="NIP Dosen">NIP</label>
                            <input class="form-control mb-4" id="NIP Dosen" name="nip"
                                   type="text" value="<?php echo $editResult['nip']; ?>">
                        </div>

                        <div class="card-text">
                            <label class="form-label mb-0" for="Nama Dosen">Nama</label>
                            <input class="form-control mb-4" id="Nama Dosen"  name="nama"
                                   type="text" value="<?php echo $editResult['nama']; ?>">
                        </div>

                        <div class="card-text">
                            <label class="form-label mb-0" for="Alamat Dosen">Alamat</label>
                            <textarea name="alamat" id="Alamat Dosen" class="form-control"
                                      rows="3"><?php echo $editResult['alamat']; ?></textarea>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary mt-3" name="editId"
                                    value="<?php echo $editResult['id']; ?>">
                                Ubah
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>