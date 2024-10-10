<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_keluarga WHERE nama_keluarga='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);

		$sql_cek = "SELECT * FROM tb_pegawaisatpolpp WHERE nip";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>
<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title" style="font-weight: bold;">
			<i class="fa fa-edit"></i> Ubah Data</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">
		<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Pegawai</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data_cek['nama']; ?>"
					readonly/>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Status Keluarga</label>
				<div class="col-sm-4">
					<select name="keluarga" id="keluarga" class="form-control">
                        <option>-- Pilih --</option>
						<option>Istri</option>
						<option>Suami</option>
                        <option>Anak Tanggungan</option>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Keluarga</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="nama_keluarga" name="nama_keluarga" value="<?php echo $data_cek['nama_keluarga']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jenis Kelamin</label>
				<div class="col-sm-4">
					<select name="jk" id="jk" class="form-control">
                        <option>-- Pilih --</option>
						<option>Laki - laki</option>
						<option>Perempuan</option>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Kelahiran</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="kelahiran" name="kelahiran" value="<?php echo $data_cek['kelahiran']; ?>"
					readonly/>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Status Perkawinan</label>
				<div class="col-sm-4">
					<select name="perkawinan" id="perkawinan" class="form-control">
                        <option>-- Pilih --</option>
						<option>Perkawinan</option>
						<option>Perceraian</option>
                        <option>Meninggal</option>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Pekerjaan</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="<?php echo $data_cek['pekerjaan']; ?>"
					readonly/>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Keterangan</label>
				<div class="col-sm-5">
					<select name="keterangan" id="keterangan" class="form-control">
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
				<label class="col-sm-2 col-form-label">Lainnya</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="lainnya" name="lainnya" value="<?php echo $data_cek['lainnya']; ?>"
					/>
				</div>
			</div>
			
				</div>
			</div>

		<div class="card-footer">
			<input type="submit" name="Ubah" value="Ubah" class="btn btn-success">
			<a href="?page=view-pegawai&kode=<?php echo $data['nip']; ?>" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php
if (isset ($_POST['Ubah'])){
        $sql_ubah = "UPDATE tb_keluarga SET
			nama='".$_POST['nama']."',
			keluarga='".$_POST['keluarga']."',
			jk='".$_POST['jk']."',
			kelahiran='".$_POST['kelahiran']."',
			perkawinan='".$_POST['perkawinan']."',
			pekerjaan='".$_POST['pekerjaan']."',
			keterangan='".$_POST['keterangan']."',
			lainnya='".$_POST['lainnya']."'
        WHERE nama_keluarga='".$_POST['nama_keluarga']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    mysqli_close($koneksi);

    if ($query_ubah) {
        echo "<script>
        Swal.fire({title: 'Hapus Data Keluarga Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {if (result.value) {window.location = 'index.php?page=data-pegawai'
        ;}})</script>";
        }else{
        echo "<script>
        Swal.fire({title: 'Hapus Data Keluarga Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {if (result.value) {window.location = 'index.php?page=data-pegawai'
        ;}})</script>";
    }
}
?>

