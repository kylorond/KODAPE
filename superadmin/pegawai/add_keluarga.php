<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_pegawaisatpolpp WHERE nip='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>
<div class="card" style="background-color: #EEEDED; color: black;">
	<div class="card-header" style="background-color: #FB2576; color: black;">
		<h3 class="card-title" style="font-weight: bold;">
			<i class="fa fa-edit"></i> Tambah Data Keluarga</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
        <div class="card-body">
		<div class="form-group row">
				<label class="col-sm-3 col-form-label">Nama Pegawai</label>
				<div class="col-sm-5">
					<input type="text" style="background-color: transparent; color: black; border-radius: 10px" class="form-control" id="nama" name="nama" value="<?php echo $data_cek['nama']; ?>"
					readonly/>
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-3 col-form-label">Nama Keluarga*</label>
				<div class="col-sm-5">
					<input type="text" style="background-color: transparent; color: black; border-radius: 10px" class="form-control" id="nama_keluarga" name="nama_keluarga" placeholder="Nama" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Keterangan*</label>
				<div class="col-sm-5">
					<select name="keterangan" style="background-color: transparent; color: black; border-radius: 10px" id="keterangan" class="form-control" required>
						<option>-- Pilih --</option>
						<option>Istri</option>
						<option>Suami</option>
                        <option>AK</option>
                        <option>AT</option>
                        <option>AA</option>
					</select>
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-3 col-form-label">Jenis Kelamin*</label>
				<div class="col-sm-5">
					<select name="jk" style="background-color: transparent; color: black; border-radius: 10px" id="keterangan" id="jk" class="form-control" required>
                        <option>-- Pilih --</option>
						<option>Laki-laki</option>
						<option>Perempuan</option>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Kelahiran*</label>
				<div class="col-sm-5">
					<input type="date" style="background-color: transparent; color: black; border-radius: 10px" id="keterangan" class="form-control" id="kelahiran" name="kelahiran"required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Status</label>
				<div class="col-sm-5">
					<select name="perkawinan" style="background-color: transparent; color: black; border-radius: 10px" id="keterangan" id="perkawinan" class="form-control">
						<option>-- Pilih --</option>
						<option>Menikah</option>
						<option>Cerai Hidup</option>
                        <option>Cerai Mati</option>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Tanggal Status</label>
				<div class="col-sm-5">
					<input type="date" style="background-color: transparent; color: black; border-radius: 10px" id="keterangan" class="form-control" id="tgl_perkawinan" name="tgl_perkawinan">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Pekerjaan</label>
				<div class="col-sm-5">
					<select name="pekerjaan" style="background-color: transparent; color: black; border-radius: 10px" id="keterangan" id="pekerjaan" class="form-control">
						<option>-- Pilih --</option>
						<option>ASN/TNI/POLRI</option>
                        <option>Wiraswasta</option>
						<option>Ibu Rumah Tangga</option>
                        <option>Pelajar</option>
                        <option>Mahasiswa</option>
					</select>
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-3 col-form-label">Lainnya</label>
				<div class="col-sm-5">
					<select name="lainnya" style="background-color: transparent; color: black; border-radius: 10px" id="keterangan" id="lainnya" class="form-control">
						<option>-- Pilih --</option>
						<option>Tertunjang</option>
						<option>Tidak Tertunjang</option>
                        <option>Cerai Hidup</option>
                        <option>Cerai Mati</option>
                        <option>Meninggal Dunia</option>
					</select>
				</div>
			</div>
			
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Tanggal Keterangan Lainnya</label>
				<div class="col-sm-5">
					<input type="date" style="background-color: transparent; color: black; border-radius: 10px" id="keterangan" class="form-control" id="tgl_keterangan" name="tgl_keterangan">
				</div>
			</div>
		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="SIMPAN" class="btn" style="background-color: #F4CE14; color: black; font-weight: bold;">
		</div>
	</form>
</div>
<?php
    if (isset ($_POST['Simpan'])){
		$nama_keluarga = $_POST['nama_keluarga'];
		$sql_check_existing = "SELECT nama_keluarga FROM tb_keluarga WHERE nama_keluarga = '$nama_keluarga'";
		$query_check_existing = mysqli_query($koneksi, $sql_check_existing);
		if (mysqli_num_rows($query_check_existing) > 0) {
			echo "<script>
				Swal.fire({title: 'Nama Keluarga sudah ada', text: '', icon: 'error', confirmButtonText: 'OK'})
			</script>";
		} else {
        $sql_simpan = "INSERT INTO tb_keluarga (nama, nama_keluarga, jk, kelahiran, perkawinan, 
		tgl_perkawinan, pekerjaan, keterangan, lainnya, tgl_keterangan) VALUES (
            '".$_POST['nama']."',
			'".$_POST['nama_keluarga']."',
			'".$_POST['jk']."',
			'".$_POST['kelahiran']."',
			'".$_POST['perkawinan']."',
			'".$_POST['tgl_perkawinan']."',
			'".$_POST['pekerjaan']."',
			'".$_POST['keterangan']."',
			'".$_POST['lainnya']."',
			'".$_POST['tgl_keterangan']."')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);
		if ($query_simpan) {
		echo "<script>
		Swal.fire({title: 'Tambah Data Keluarga Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
		}).then((result) => {if (result.value){
			window.location = 'index.php?page=add-keluarga&kode=" . $data_cek['nip'] . "';
			}
		})</script>";
		}else{
		echo "<script>
		Swal.fire({title: 'Tambah Data Keluarga Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
		}).then((result) => {if (result.value){
			window.location = 'index.php?page=add-keluarga&kode=" . $data_cek['nip'] . "';
			}
		})</script>";
		}
	}
}