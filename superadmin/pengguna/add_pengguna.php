<div class="card" style="background-color: #EEEDED; color: black;">
	<div class="card-header" style="background-color: #0E21A0; color: white;">
		<h3 class="card-title" style="font-weight: bold;">
			<i class="fa fa-edit"></i> Tambah Pengguna</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Pengguna</label>
				<div class="col-sm-6">
					<input type="text" style="background-color: transparent; color: black; border-radius: 10px" id="keterangan" class="form-control" id="nama_pengguna" name="nama_pengguna" placeholder="Nama Pengguna" required>
				</div>
			</div>

			<div class="form-group row">
                <label class="col-sm-2 col-form-label">NIK/NRPK</label>
                <div class="col-sm-6">
                    <input type="text" style="background-color: transparent; color: black; border-radius: 10px" id="keterangan" class="form-control" id="username" name="username" placeholder="NIK/NRPK" onkeypress="return hanyaAngkaTitikSpasi(event)" required>
                </div>
            </div>

            <script>
            function hanyaAngkaTitikSpasi(event) {
                var charCode = (event.which) ? event.which : event.keyCode;
                if (charCode != 46 && charCode != 32 && charCode > 31 && (charCode < 48 || charCode > 57)) {
                    event.preventDefault();
                    return false;
                }
                return true;
            }
            </script>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Password</label>
				<div class="col-sm-6">
					<input type="password" style="background-color: transparent; color: black; border-radius: 10px" id="keterangan" class="form-control" id="password" name="password" placeholder="Password">
				</div>
			</div>
			<script>
			function validateInput() {
				let usernameInput = document.getElementById('username').value;
				let passwordInput = document.getElementById('password').value;

				let regex = /^[A-Za-z0-9]{12,}$/;

				if (regex.test(usernameInput)) {
				document.getElementById('username').classList.remove('is-invalid');
				document.getElementById('username').classList.add('is-valid');
				} else {
				document.getElementById('username').classList.remove('is-valid');
				document.getElementById('username').classList.add('is-invalid');
				}

				if (regex.test(passwordInput)) {
				document.getElementById('password').classList.remove('is-invalid');
				document.getElementById('password').classList.add('is-valid');
				} else {
				document.getElementById('password').classList.remove('is-valid');
				document.getElementById('password').classList.add('is-invalid');
				}
			}
			document.getElementById('username').addEventListener('input', validateInput);
			document.getElementById('password').addEventListener('input', validateInput);
			</script>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Level</label>
				<div class="col-sm-6">
					<select name="level" style="background-color: transparent; color: black; border-radius: 10px" id="keterangan" id="level" class="form-control" required>
						<option>- Pilih -</option>
						<option>Super Admin</option>
						<option>Admin</option>
					</select>
				</div>
			</div>
		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="SIMPAN" class="btn" style="background-color: #F4CE14; color: black; font-weight: bold;">
			<a href="?page=data-pengguna" title="Batal" class="btn" style="background-color: #CD1818; color: black; font-weight: bold;">BATAL</a>
		</div>
	</form>
</div>
<?php
if (isset($_POST['Simpan'])) {
    $nama_pengguna = $_POST['nama_pengguna'];
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password_plain = $_POST['password'];
    $level = $_POST['level'];

    $sql_check_existing_username = "SELECT * FROM tb_pengguna WHERE username = '$username'";
    $query_check_existing_username = mysqli_query($koneksi, $sql_check_existing_username);

    $sql_check_existing_nama_pengguna = "SELECT * FROM tb_pengguna WHERE nama_pengguna = '$nama_pengguna'";
    $query_check_existing_nama_pengguna = mysqli_query($koneksi, $sql_check_existing_nama_pengguna);

    if (mysqli_num_rows($query_check_existing_username) > 0) {
        echo "<script>
            Swal.fire({title: 'Username sudah digunakan', text: '', icon: 'error', confirmButtonText: 'OK'})
        </script>";
    } elseif (mysqli_num_rows($query_check_existing_nama_pengguna) > 0) {
        echo "<script>
            Swal.fire({title: 'Nama Pengguna sudah digunakan', text: '', icon: 'error', confirmButtonText: 'OK'})
        </script>";
    } elseif ($level == "Super Admin") {
        $sql_check_super_admin = "SELECT * FROM tb_pengguna WHERE level = 'Super Admin'";
        $query_check_super_admin = mysqli_query($koneksi, $sql_check_super_admin);

        if (mysqli_num_rows($query_check_super_admin) > 0) {
            echo "<script>
                Swal.fire({title: 'Level Super Admin sudah ada', text: '', icon: 'error', confirmButtonText: 'OK'})
            </script>";
        } else {
            // Jika level Super Admin belum ada, maka simpan data
            $password = $password_plain;
            $sql_simpan = "INSERT INTO tb_pengguna (nama_pengguna, username, password, level) VALUES (
                '$nama_pengguna',
                '$username',
                '$password',
                '$level')";
            $query_simpan = mysqli_query($koneksi, $sql_simpan);

            if ($query_simpan) {
                echo "<script>
                    Swal.fire({title: 'Tambah Pengguna Berhasil', text: '', icon: 'success', confirmButtonText: 'OK'}).then((result) => {
                        if (result.value) {
                            window.location = 'index.php?page=data-pengguna';
                        }
                    })
                </script>";
            } else {
                echo "<script>
                    Swal.fire({title: 'Tambah Pengguna Gagal', text: 'Terjadi kesalahan dalam menyimpan data', icon: 'error', confirmButtonText: 'OK'}).then((result) => {
                        if (result.value) {
                            window.location = 'index.php?page=add-pengguna';
                        }
                    })
                </script>";
            }
        }
    } else {
        // Jika level bukan Super Admin, simpan data seperti biasa
        $password = $password_plain;
        $sql_simpan = "INSERT INTO tb_pengguna (nama_pengguna, username, password, level) VALUES (
            '$nama_pengguna',
            '$username',
            '$password',
            '$level')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);

        if ($query_simpan) {
            echo "<script>
                Swal.fire({title: 'Tambah Pengguna Berhasil', text: '', icon: 'success', confirmButtonText: 'OK'}).then((result) => {
                    if (result.value) {
                        window.location = 'index.php?page=data-pengguna';
                    }
                })
            </script>";
        } else {
            echo "<script>
                Swal.fire({title: 'Tambah Pengguna Gagal', text: 'Terjadi kesalahan dalam menyimpan data', icon: 'error', confirmButtonText: 'OK'}).then((result) => {
                    if (result.value) {
                        window.location = 'index.php?page=add-pengguna';
                    }
                })
            </script>";
        }
    }

    mysqli_close($koneksi);
}
?>




