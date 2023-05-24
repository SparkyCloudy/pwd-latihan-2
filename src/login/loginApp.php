<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../node_modules/bootstrap5/src/css/bootstrap.min.css">
    <title>Login Page</title>
</head>
<body>
<section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <div class="mb-md-5 mt-md-4 pb-5">
                            <form action="action/loginAction.php" method="post">
                                <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                                <p class="text-dark-50 mb-5">Please enter your login and password!</p>

                                <div class="form-outline form-dark mb-4">
                                    <input type="text" id="typeEmailX" name="usernameForm" class="form-control form-control-lg" />
                                    <label class="form-label" for="typeEmailX">Username</label>
                                </div>

                                <div class="form-outline form-dark mb-4">
                                    <input type="password" id="typePasswordX" name="passwordForm" class="form-control form-control-lg" />
                                    <label class="form-label" for="typePasswordX">Password</label>
                                </div>

                                <button class=" btn btn-outline-dark btn-lg px-5" type="submit">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
$message = $_GET['message'] ?? null;
if ($message == "success") {
    header("location: ../table/tableApp.php");
} elseif ($message == "failed") {
?>
    <script>
        alert("Username/Password salah!");
        window.location = "loginApp.php";
    </script>
<?php
}
?>
</body>
