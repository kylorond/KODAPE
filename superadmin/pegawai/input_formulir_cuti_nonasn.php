<?php
    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_pegawaisatpolpp WHERE nip='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>
<div class="card" style="background-color: #EEEDED; color: blakc;">
	<div class="card-header" style="background-color: #FB2576; color: white;">
		<h3 class="card-title" style="font-weight: bold;">
			<i class="fa fa-edit"></i> Input Cuti Tenaga Kontrak</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
        <div class="card-body">
		<div class="form-group row">
				<label class="col-sm-3 col-form-label">NRPK</label>
				<div class="col-sm-5">
					<input type="text" style="background-color: transparent; color: black; border-radius: 10px" class="form-control" id="nip" name="nip" value="<?php echo $data_cek['nip']; ?>"
					readonly/>
				</div>
			</div>
		<div class="form-group row">
				<label class="col-sm-3 col-form-label">Nama Pegawai</label>
				<div class="col-sm-5">
					<input type="text" style="background-color: transparent; color: black; border-radius: 10px" class="form-control" id="nama" name="nama" value="<?php echo $data_cek['nama']; ?>"
					readonly/>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Sisa Cuti 2 Tahun Sebelumnya</label>
				<div class="col-sm-5">
					<input type="text" style="background-color: transparent; color: black; border-radius: 10px" class="form-control" id="sisaduatahun" name="sisaduatahun" placeholder="Sisa Cuti 2 Tahun Sebelumnya" pattern="[0-9]+" title="Hanya angka yang diperbolehkan">
				</div>
			</div>
			<script>
				var inputElement = document.getElementById('sisaduatahun');
				inputElement.addEventListener('input', function() {
					var inputValue = parseInt(inputElement.value);
					if (inputValue > 12) {
						inputElement.setCustomValidity('Nilai tidak boleh melebihi 12');
					} else {
						inputElement.setCustomValidity('');
					}
				});
			</script>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Sisa Cuti 1 Tahun Sebelumnya</label>
				<div class="col-sm-5">
					<input type="text" style="background-color: transparent; color: black; border-radius: 10px" class="form-control" id="sisasatutahun" name="sisasatutahun" placeholder="Sisa Cuti 1 Tahun Sebelumnya" pattern="[0-9]+" title="Hanya angka yang diperbolehkan">
				</div>
			</div>

			<script>
				// Ambil elemen input
				var inputElement = document.getElementById('sisasatutahun');

				// Tambahkan event listener untuk memeriksa nilai saat pengguna mengetik
				inputElement.addEventListener('input', function() {
					var inputValue = parseInt(inputElement.value);

					// Periksa apakah nilai melebihi 12
					if (inputValue > 12) {
						inputElement.setCustomValidity('Nilai tidak boleh melebihi 12');
					} else {
						inputElement.setCustomValidity('');
					}
				});
			</script>

			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Sisa Cuti Tahun Berjalan*</label>
				<div class="col-sm-5">
					<input type="text" style="background-color: transparent; color: black; border-radius: 10px" class="form-control" id="sisasekarang" name="sisasekarang" placeholder="Sisa Cuti Tahun Berjalan" pattern="[0-9]+" title="Hanya angka yang diperbolehkan" required>
				</div>
			</div>

			<script>
				// Ambil elemen input
				var inputElement = document.getElementById('sisasekarang');

				// Tambahkan event listener untuk memeriksa nilai saat pengguna mengetik
				inputElement.addEventListener('input', function() {
					var inputValue = parseInt(inputElement.value);

					// Periksa apakah nilai melebihi 12
					if (inputValue > 12) {
						inputElement.setCustomValidity('Nilai tidak boleh melebihi 12');
					} else {
						inputElement.setCustomValidity('');
					}
				});
			</script>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Penyetuju*</label>
				<div class="col-sm-5">
					<input type="text" style="background-color: transparent; color: black; border-radius: 10px" class="form-control" id="penyetuju" name="penyetuju" placeholder="Penyetuju" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Nama Penyetuju*</label>
				<div class="col-sm-5">
					<input type="text" style="background-color: transparent; color: black; border-radius: 10px" class="form-control" id="nama_penyetuju" name="nama_penyetuju" placeholder="Nama Penyetuju" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">NIP Penyetuju*</label>
				<div class="col-sm-5">
					<input type="text" style="background-color: transparent; color: black; border-radius: 10px" class="form-control" id="nip_penyetuju" name="nip_penyetuju" placeholder="NIP Penyetuju" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Jenis Cuti*</label>
				<div class="col-sm-5">
					<select name="jenis_cuti" style="background-color: transparent; color: black; border-radius: 10px" id="jenis_cuti" class="form-control" required>
						<option>-- Pilih --</option>
						<option>Cuti Tahunan</option>
						<option>Cuti Besar</option>
                        <option>Cuti Sakit</option>
                        <option>Cuti Melahirkan</option>
                        <option>Cuti Karena Alasan Penting</option>
						<option>Cuti Diluar Tanggungan Negara</option>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Alasan Cuti*</label>
				<div class="col-sm-5">
					<input type="text" style="background-color: transparent; color: black; border-radius: 10px" class="form-control" id="alasan_cuti" name="alasan_cuti" placeholder="Alasan Cuti" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Mulai Tanggal*</label>
				<div class="col-sm-5">
					<input type="date" style="background-color: transparent; color: black; border-radius: 10px" class="form-control" id="mulai_cuti" name="mulai_cuti" required oninput="validateDate()" required>
				</div>
			</div>
			<script>
				function validateDate() {
					var startDate = new Date(document.getElementById('mulai_cuti').value);
					var endDate = new Date(document.getElementById('sampai_cuti').value);
					var currentDate = new Date();

					if (startDate < currentDate) {
						alert('Tanggal mulai tidak boleh sebelum tanggal sekarang.');
						document.getElementById('mulai_cuti').value = ''; // Mengosongkan input jika tidak valid
					} else if (startDate > endDate) {
						alert('Tanggal mulai tidak boleh setelah tanggal sampai.');
						document.getElementById('mulai_cuti').value = ''; // Mengosongkan input jika tidak valid
					}
				}
			</script>

			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Sampai Tanggal*</label>
				<div class="col-sm-5"> 
					<input type="date" style="background-color: transparent; color: black; border-radius: 10px" class="form-control" id="sampai_cuti" name="sampai_cuti" required oninput="validateDate()" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Alamat Cuti*</label>
				<div class="col-sm-5">
					<input type="text" style="background-color: transparent; color: black; border-radius: 10px" class="form-control" id="alamat_cuti" name="alamat_cuti" placeholder="Alamat Cuti" required>
				</div>
			</div>
		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="SIMPAN" class="btn" style="background-color: #F4CE14; color: black; font-weight: bold;">
			<a href="?page=data-cuti-nonasn" title="Kembali" class="btn" style="background-color: #CD1818; color: white; font-weight: bold;">BATAL</a>
		</div>
	</form>
</div>
<?php
    if (isset ($_POST['Simpan'])){
        $sql_simpan = "INSERT INTO tb_cuti (nip, nama, sisaduatahun, sisasatutahun, sisasekarang, 
		penyetuju, nama_penyetuju, nip_penyetuju, jenis_cuti, alasan_cuti, mulai_cuti, sampai_cuti, 
		alamat_cuti) VALUES (
            '".$_POST['nip']."',
            '".$_POST['nama']."',
			'".$_POST['sisaduatahun']."',
			'".$_POST['sisasatutahun']."',
			'".$_POST['sisasekarang']."',
			'".$_POST['penyetuju']."',
			'".$_POST['nama_penyetuju']."',
			'".$_POST['nip_penyetuju']."',
			'".$_POST['jenis_cuti']."',
			'".$_POST['alasan_cuti']."',
			'".$_POST['mulai_cuti']."',
			'".$_POST['sampai_cuti']."',
			'".$_POST['alamat_cuti']."')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);

    if ($query_simpan) {
		echo "<script>
		Swal.fire({
		  title: 'Input Formulir Cuti Berhasil',
		  text: '',
		  icon: 'success',
		  confirmButtonText: 'OK'
		}).then((result) => {
		  if (result.value) {
			// Membuka halaman dalam tab baru
			window.open('report/cetak-formulir-cuti-nonasn.php?nip=" . $data_cek['nip'] . "');
		  }
		})
  	</script>";
      }else{
		echo "<script>
		Swal.fire({
		  title: 'Input Formulir Cuti Gagal',
		  text: '',
		  icon: 'error',
		  confirmButtonText: 'OK'
		}).then((result) => {
		  if (result.value) {
			// Membuka halaman dalam tab baru
			window.open('report/cetak-formulir-cuti-nonasn.php?nip=" . $data_cek['nip'] . "');
		  }
		})</script>";
	}
	}
	?>
