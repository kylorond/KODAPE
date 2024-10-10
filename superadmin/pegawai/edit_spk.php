<?php
    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_pegawaisatpolpp WHERE nip='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>
<div class="card" style="background-color: #EEEDED; color: black;">
	<div class="card-header" style="background-color: #FB2576; color: white;">
		<h3 class="card-title" style="font-weight: bold;">
			<i class="fa fa-edit"></i> Input SPK</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
        <div class="card-body">
		<div class="form-group row">
				<label class="col-sm-3 col-form-label">NRPK</label>
				<div class="col-sm-5">
					<input type="text" style="background-color: transparent; color: black; border-radius: 10px" class="form-control" id="nip" name="nip" value="<?php echo $data['nip']; ?>"
					readonly/>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Nama Pegawai</label>
				<div class="col-sm-5">
					<input type="text" style="background-color: transparent; color: black; border-radius: 10px" class="form-control" id="nama" name="nama" value="<?php echo $data['nama']; ?>"
					readonly/>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Pendidikan</label>
				<div class="col-sm-5">
					<input type="text" style="background-color: transparent; color: black; border-radius: 10px" class="form-control" id="pendidikan" name="pendidikan" value="<?php echo $data['pendidikan']; ?>"
					readonly/>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Jurusan</label>
				<div class="col-sm-5">
					<input type="text" style="background-color: transparent; color: black; border-radius: 10px" class="form-control" id="jurusan" name="jurusan" value="<?php echo $data['jurusan']; ?>"
					readonly/>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Alamat</label>
				<div class="col-sm-5">
					<input type="text" style="background-color: transparent; color: black; border-radius: 10px" class="form-control" id="alamat" name="alamat" value="<?php echo $data['alamat']; ?>"
					readonly/>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Gaji</label>
				<div class="col-sm-5">
					<input type="text" style="background-color: transparent; color: black; border-radius: 10px" class="form-control" id="gaji" name="gaji" value="<?php echo $data['gaji']; ?>"
					readonly/>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Nomor Rekening</label>
				<div class="col-sm-5">
					<input type="text" style="background-color: transparent; color: black; border-radius: 10px" class="form-control" id="no_rek" name="no_rek" value="<?php echo $data['no_rek']; ?>"
					readonly/>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Lama Perjanjian*</label>
				<div class="col-sm-5">
					<select name="perjanjian" style="background-color: transparent; color: black; border-radius: 10px" id="perjanjian" class="form-control" required>
						<option>-- Pilih --</option>
						<option>Januari - Desember</option>
						<option>Januari - Juni</option>
						<option>Juli - Desember</option>
						<option>Januari - Maret</option>
						<option>April - Juni</option>
						<option>Juli - September</option>
						<option>Oktober - Desember</option>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Kode Surat*</label>
				<div class="col-sm-5">
					<input type="text" style="background-color: transparent; color: black; border-radius: 10px" class="form-control" id="kode_surat" name="kode_surat" placeholder="Kode Surat" pattern="[0-9]+" title="Hanya angka yang diperbolehkan" onkeypress="return angka(event)" required>
				</div>
			</div>
			<script>
            function angka(event) {
                var charCode = (event.which) ? event.which : event.keyCode;
                if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                    event.preventDefault();
                    return false;
                }
                return true;
            }
            </script>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Nomor Surat*</label>
				<div class="col-sm-5">
					<input type="text" style="background-color: transparent; color: black; border-radius: 10px" class="form-control" id="no_surat" name="no_surat" placeholder="Nomor Surat" pattern="[0-9]+" title="Hanya angka yang diperbolehkan" onkeypress="return number(event)" required>
				</div>
			</div>
			<script>
            function number(event) {
                var charCode = (event.which) ? event.which : event.keyCode;
                if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                    event.preventDefault();
                    return false;
                }
                return true;
            }
            </script>
		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="SIMPAN" class="btn" style="background-color: #F4CE14; color: black; font-weight: bold;">
			<a href="?page=data-spk" title="Kembali" class="btn" style="background-color: #CD1818; color: white; font-weight: bold;">BATAL</a>
		</div>
	</form>
</div>
<?php
    if (isset ($_POST['Simpan'])){
        $sql_simpan = "INSERT INTO tb_spk (nip, nama, pendidikan, jurusan, alamat, 
		gaji, no_rek, perjanjian, kode_surat, 
		no_surat) VALUES (
            '".$_POST['nip']."',
            '".$_POST['nama']."',
			'".$_POST['pendidikan']."',
			'".$_POST['jurusan']."',
			'".$_POST['alamat']."',
			'".$_POST['gaji']."',
			'".$_POST['no_rek']."',
			'".$_POST['perjanjian']."',
			'".$_POST['kode_surat']."',
			'".$_POST['no_surat']."')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);
		if ($query_simpan) {
			$perjanjian = $_POST['perjanjian'];
			$nip = $data['nip'];
			if ($perjanjian == 'Januari - Desember') {
				echo "<script>
						Swal.fire({
							title: 'Input SPK Berhasil',
							text: '',
							icon: 'success',
							confirmButtonText: 'OK'
						}).then((result) => {
							if (result.value) {
								// Menggunakan window.open untuk membuka halaman dalam tab baru
								window.open('report/cetak-spk-satutahun.php?nip=$nip');
							}
						})
					</script>";
			} elseif ($perjanjian == 'Januari - Juni') {
				echo "<script>
						Swal.fire({
							title: 'Input SPK Berhasil',
							text: '',
							icon: 'success',
							confirmButtonText: 'OK'
						}).then((result) => {
							if (result.value) {
								// Menggunakan window.open untuk membuka halaman dalam tab baru
								window.open('report/cetak-spk-enambulan1.php?nip=$nip');
							}
						})
					</script>";
			} elseif ($perjanjian == 'Juli - Desember') {
				echo "<script>
						Swal.fire({
							title: 'Input SPK Berhasil',
							text: '',
							icon: 'success',
							confirmButtonText: 'OK'
						}).then((result) => {
							if (result.value) {
								// Menggunakan window.open untuk membuka halaman dalam tab baru
								window.open('report/cetak-spk-enambulan2.php?nip=$nip');
							}
						})
					</script>";
			} elseif ($perjanjian == 'Januari - Maret') {
				echo "<script>
						Swal.fire({
							title: 'Input SPK Berhasil',
							text: '',
							icon: 'success',
							confirmButtonText: 'OK'
						}).then((result) => {
							if (result.value) {
								// Menggunakan window.open untuk membuka halaman dalam tab baru
								window.open('report/cetak-spk-tigabulan1.php?nip=$nip');
							}
						})
					</script>";
			} elseif ($perjanjian == 'April - Juni') {
				echo "<script>
						Swal.fire({
							title: 'Input SPK Berhasil',
							text: '',
							icon: 'success',
							confirmButtonText: 'OK'
						}).then((result) => {
							if (result.value) {
								// Menggunakan window.open untuk membuka halaman dalam tab baru
								window.open('report/cetak-spk-tigabulan2.php?nip=$nip');
							}
						})
					</script>";
			} elseif ($perjanjian == 'Juli - September') {
				echo "<script>
						Swal.fire({
							title: 'Input SPK Berhasil',
							text: '',
							icon: 'success',
							confirmButtonText: 'OK'
						}).then((result) => {
							if (result.value) {
								// Menggunakan window.open untuk membuka halaman dalam tab baru
								window.open('report/cetak-spk-tigabulan3.php?nip=$nip');
							}
						})
					</script>";
			} elseif ($perjanjian == 'Oktober - Desember') {
				echo "<script>
						Swal.fire({
							title: 'Input SPK Berhasil',
							text: '',
							icon: 'success',
							confirmButtonText: 'OK'
						}).then((result) => {
							if (result.value) {
								// Menggunakan window.open untuk membuka halaman dalam tab baru
								window.open('report/cetak-spk-tigabulan4.php?nip=$nip');
							}
						})
					</script>";
			} else {
				// Handle kasus lain jika diperlukan
				echo "Perjanjian lainnya, tidak ada cetakan yang sesuai.";
			}
		}		
	}
	?>



