<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <?php
  session_start();
  include "config/koneksi.php";

  if(isset($_POST['register'])){
        $sql = mysqli_query($con,"INSERT INTO register(username,pass,nis,nama) VALUES ('$_POST[username]','$_POST[pass]','$_POST[nis]','$_POST[nama]')");

    $eksekusi = mysqli_query($con, $sql);
  echo "<script>alert('Berhasil tersimpan');document.location.href='index.php'</script>";
  } 
  ?>


</head>

<body class="bg-gradient-primary">
    <div class="container">   
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Register Form</h1>
                            </div>
                            <form method="post" class="user">
                                <div class="form-group">
                                <input type="text" name="username" class="form-control form-control-user" placeholder="Username">
                                </div>
                                <div class="form-group">
                                <input type="password" name="pass" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                                </div>
                                <div class="form-group">
                                <input type="text" name="nis" class="form-control form-control-user" placeholder="Nis">
                                </div>
                                <div class="form-group">
                                <input type="text" name="nama" class="form-control form-control-user" placeholder="Nama">
                                </div>
                                <input type="submit" name="register" value="register" class="btn btn-primary btn-user btn-block">
                             </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
