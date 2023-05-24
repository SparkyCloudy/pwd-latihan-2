<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../node_modules/bootstrap5/src/css/bootstrap.min.css">
    <title>Tabel User</title>
</head>
<body>
<div class="container-sm mt-5">
    <div>
        <?php
        include "tableConnect.php";
        session_start();
        if (!isset($_SESSION['username'])) {
            header("location: ../login/loginApp.php");
        }
        ?>

        <div>
            <div class="d-flex align-items-center">
                <b style="font-size: 30px; margin-right: auto" class="align-items-start">List Dosen</b>

                <div class="ms-auto align-items-end me-2">
                    <?php printf("Logged as <b>%s</b>", $_SESSION['username']); ?>
                </div>

                <div class="align-items-end">
                    <form action="../login/action/logoutAction.php">
                        <button type="submit" class="btn btn-outline-danger">Logout </button>
                    </form>
                </div>
            </div>

            <?php
            if ($_SESSION['role'] == "dosen") {
            ?>
                <form action="tableApp.php" method="post">
                    <button name="addDosen" value="add" type="submit" class="btn btn-primary">
                        Add Dosen
                    </button>
                </form>
            <?php
            }
            ?>

            <?php
            if ($_POST['addDosen'] == "add") {
            ?>
                <div class="col-sm-6 mb-sm-5">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center mb-sm-0">
                                <b>Tambah Dosen</b>
                                <div class="ms-auto align-items-end">
                                    <form action="tableApp.php" method="post">
                                        <button name="addDosen" value="close" type="submit" class="btn btn-close">
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <form action="action/tableAction.php" method="post">
                                <label class="col-form-label" for="Nama Dosen">
                                    Nama
                                </label>
                                <input class="form-control" id="Nama Dosen" name="nama" type="text">

                                <label class="col-form-label" for="NIP Dosen">
                                    NIP
                                </label>
                                <input class="form-control" id="NIP Dosen" name="nip" type="text">

                                <label class="col-form-label" for="Alamat Dosen">
                                    Alamat
                                </label>
                                <textarea class="form-control mb-sm-3"
                                          id="Alamat Dosen"
                                          name="alamat"></textarea>

                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-success mt-3"
                                            name="addDosen" value="add">
                                        Kirim</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>

            <table class="table table-bordered table-responsive mt-3">
                <tr>
                    <td>No</td>
                    <td>NIP</td>
                    <td>Nama</td>
                    <td>Alamat</td>
                    <?php
                    if ($_SESSION['role'] == "dosen") {
                        ?>
                        <td>Action</td>
                        <?php
                    }
                    ?>
                </tr>

                <?php
                $noTable = 0;
                $query = dataQuery();
                while ($result = mysqli_fetch_array($query)) {
                ?>
                <tr>
                    <td><?php echo ++$noTable ?></td>
                    <td><?php echo $result['nip'] ?></td>
                    <td><?php echo $result['nama'] ?></td>
                    <td><?php echo $result['alamat'] ?></td>
                    <?php
                        if ($_SESSION['role'] == "dosen") {
                        ?>
                            <td>
                                <div class="gap-1 d-grid">
                                    <form action="action/tableAction.php" method="post">
                                        <div class="btn-group-sm d-grid">
                                            <button class="btn btn-outline-dark"
                                                    type="submit"
                                                    value="<?php echo $result['id']; ?>"
                                                    name="editDosen">
                                                Edit</button>
                                        </div>
                                    </form>


                                    <form action="action/tableAction.php" method="post">
                                        <div class="btn-group-sm d-grid">
                                            <button class="btn btn-danger"
                                                    type="submit"
                                                    value="<?php echo $result['id']; ?>"
                                                    name="deleteDosen">
                                                Delete</button>
                                        </div>
                                    </form>
                                </div>
                            </td>
                        <?php
                        }
                    }
                    ?>
                </tr>
            </table>
        </div>
    </div>
</div>
</body>
</html>