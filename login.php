<?php
  include "inc/koneksi.php";
   
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login | S.I Data Pegawai dan Tenaga</title>
	<link rel="icon" href="dist/img/logo.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<link rel="stylesheet" href="dist/css/adminlte.min.css">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page" style="background-color: #040D12;">
<a href="login.php">
						<font color="white">
							<center style="font-weight: bold; font-size:xx-large;">SISTEM INFORMASI</center>
							<center style="font-weight: bold; font-size:xx-large;">DATA PEGAWAI DAN TENAGA KONTRAK</center>
						</font>
					</a>
	<div class="login-box">
		<div class="card">
			<div class="card-body login-card-body" style="background-color: #040D12; color: white;">
				<div class="login-logo">
				</div>
				<center>
					<img src="dist/img/logosatpolpp.png" width=180px />
					<br>
					<br>
				</center>
				<br>
				<form action="" method="post">
					<div class="input-group mb-3">
						<input type="text" class="form-control" name="username" placeholder="NIP/NRPK" required>
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-user"></span>
							</div>
						</div>
					</div>
					<div class="input-group mb-3">
						<input type="password" class="form-control" name="password" placeholder="Password" required>
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<button type="submit" class="btn btn-block btn-flat" style="background-color: #16FF00;" name="btnLogin" title="Masuk Sistem">
								<b style="font-weight: bold;">LOGIN</b>
							</button>
						</div>
				</form>

				</div>
			</div>
		</div>
		<script src="plugins/jquery/jquery.min.js"></script>
		<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="dist/js/adminlte.min.js"></script>
		<script src="plugins/alert.js"></script>

</body>

</html>
<?php
if (isset($_POST['btnLogin'])) {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);

    $sql_login = "SELECT * FROM tb_pengguna WHERE BINARY username='$username'";
    $query_login = mysqli_query($koneksi, $sql_login);

    if ($query_login) {
        $data_login = mysqli_fetch_array($query_login, MYSQLI_ASSOC);
        $stored_password = $data_login['password'];

        if ($password == $stored_password) {
            session_start();
            $_SESSION["ses_id"] = $data_login["id_pengguna"];
            $_SESSION["ses_nama"] = $data_login["nama_pengguna"];
            $_SESSION["ses_username"] = $data_login["username"];
            $_SESSION["ses_level"] = $data_login["level"];

            echo "<script>
                Swal.fire({title: 'Login Berhasil', text: '', icon: 'success', confirmButtonText: 'OK'
                }).then((result) => {if (result.value)
                    {window.location = 'index.php';}
                })</script>";
        } else {
            echo "<script>
                Swal.fire({title: 'Login Gagal', text: 'NIP/NRPK atau Password salah', icon: 'error', confirmButtonText: 'OK'
                }).then((result) => {if (result.value)
                    {window.location = 'login.php';}
                })</script>";
        }
    } else {
        echo "<script>
            Swal.fire({title: 'Login Gagal', text: 'Terjadi kesalahan dalam mengakses database', icon: 'error', confirmButtonText: 'OK'
            }).then((result) => {if (result.value)
                {window.location = 'login.php';}
            })</script>";
    }
}
?>
