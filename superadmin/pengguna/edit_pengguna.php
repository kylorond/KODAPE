<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_pengguna WHERE id_pengguna='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<div class="card" style="background-color: #EEEDED; color: black;">
	<div class="card-header" style="background-color: #068FFF; color: white;">
		<h3 class="card-title" style="font-weight: bold;">
			<i class="fa fa-edit"></i> Ubah Data Pengguna</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<input type='hidden' class="form-control" name="id_pengguna" value="<?php echo $data_cek['id_pengguna']; ?>"
			 readonly/>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama User</label>
				<div class="col-sm-6">
					<input type="text" style="color: black; border-radius: 10px;" class="form-control" id="nama_pengguna" name="nama_pengguna" value="<?php echo $data_cek['nama_pengguna']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NIP/NRPK</label>
				<div class="col-sm-6">
					<input type="text" style="color: black; border-radius: 10px;" class="form-control" id="username" name="username" onkeypress="return hanyaAngkaTitikSpasi(event)" value="<?php echo $data_cek['username']; ?>"
					/>
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
					<input type="password" style="color: black; border-radius: 10px;" class="form-control" id="pass" name="password" value="<?php echo $data_cek['password']; ?>"
					/>
					<input id="mybutton" onclick="change()" type="checkbox" class="form-checkbox"> Lihat Password
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Level</label>
				<div class="col-sm-2">
					<select name="level" id="level" class="form-control">
						<option value="">-- Pilih Level --</option>
						<?php
                            if ($data_cek['level'] == "Super Admin") echo "<option value='Super Admin' selected>Super Admin</option>";
                            else echo "<option value='Super Admin'>Super Admin</option>";

                            if ($data_cek['level'] == "Admin") echo "<option value='Admin' selected>Admin</option>";
                            else echo "<option value='Admin'>Admin</option>";
                        ?>
					</select>
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Ubah" value="SIMPAN" class="btn" style="background-color: #F4CE14; color: black; font-weight: bold;">
			<a href="?page=data-pengguna" title="Kembali" class="btn" style="background-color: #CD1818; color: black; font-weight: bold;">BATAL</a>
		</div>
	</form>
</div>

<?php
if (isset($_POST['Ubah'])) {
    $nama_pengguna = $_POST['nama_pengguna'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];
    $id_pengguna = $_POST['id_pengguna'];
    $sql_cek = "SELECT id_pengguna FROM tb_pengguna WHERE (username='$username' OR password='$password') AND id_pengguna<>'$id_pengguna'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    if (mysqli_num_rows($query_cek) > 0) {
        echo "<script>
              Swal.fire({title: 'Username atau Password sudah ada!', text: '', icon: 'error', confirmButtonText: 'OK'}).then((result) => {
                  if (result.value) {
                      window.location = 'index.php?page=data-pengguna';
                  }
              });
              </script>";
    } else {
        $sql_ubah = "UPDATE tb_pengguna SET
            nama_pengguna='$nama_pengguna',
            username='$username',
            password='$password',
            level='$level'
            WHERE id_pengguna='$id_pengguna'";
        $query_ubah = mysqli_query($koneksi, $sql_ubah);
        mysqli_close($koneksi);
        if ($query_ubah) {
            echo "<script>
                  Swal.fire({title: 'Ubah Pengguna Berhasil', text: '', icon: 'success', confirmButtonText: 'OK'}).then((result) => {
                      if (result.value) {
                          window.location = 'index.php?page=data-pengguna';
                      }
                  });
                  </script>";
        } else {
            echo "<script>
                  Swal.fire({title: 'Ubah Pengguna Gagal', text: '', icon: 'error', confirmButtonText: 'OK'}).then((result) => {
                      if (result.value) {
                          window.location = 'index.php?page=data-pengguna';
                      }
                  });
                  </script>";
        }
    }
}

?>



<script type="text/javascript">
    function change()
    {
    let x = document.getElementById('pass').type;

    if (x == 'password')
    {
        document.getElementById('pass').type = 'text';
        document.getElementById('mybutton').innerHTML;
    }
    else
    {
        document.getElementById('pass').type = 'password';
        document.getElementById('mybutton').innerHTML;
    }
    }
</script>