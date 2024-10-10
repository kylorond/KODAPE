<?php
if (isset($_SESSION["ses_username"])==""){
header("location: login.php");
}else{
  $data_id = $_SESSION["ses_id"];
  $data_nama = $_SESSION["ses_nama"];
  $data_user = $_SESSION["ses_username"];
  $data_level = $_SESSION["ses_level"];
	}
        $sql_cek = "SELECT * FROM tb_profilinstansi";
        $query_cek = mysqli_query($koneksi, $sql_cek);
		$data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
		{
?>
<div class="card" style="background-color: #EEEDED;">
	<div class="card-header" style="background-color: black; color: white;">
		<h3 class="card-title" style="color: white;">
			<i class="fas fa-tachometer-alt"></i> Dashboard
		</h3>
	</div>
  <div class="card-header" style="background-color: #EEEDED; color: black; font-size:x-large">
	<span style="font-weight: bold; color: #FF204E;">
  <?php
	date_default_timezone_set('Asia/Jakarta');

	$jam_sekarang = date("H");

	if ($jam_sekarang >= 3 && $jam_sekarang < 11) {
		$waktu = "Pagi";
	} elseif ($jam_sekarang >= 11 && $jam_sekarang < 15) {
		$waktu = "Siang";
	} elseif ($jam_sekarang >= 15 && $jam_sekarang < 18) {
		$waktu = "Sore";
	} else {
		$waktu = "Malam";
	}
	echo "Selamat $waktu ";
	?>
</span>
<?php echo $data_nama; ?>,
<br>
<h6>Selamat Datang, di Website Sistem Informasi Data Pegawai dan Tenaga Kontrak.</h6>
  </div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body" style="background-color: #EEEDED; color: black;">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Kepala Satuan</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" style="border-radius: 12px; background-color: #EEEDED; color: black; border: 1px solid white" id="kepala" name="kepala" value="<?php echo $data_cek['kepala']; ?>"
					 readonly/>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NIP Kepala Satuan</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" style="border-radius: 12px; background-color: #EEEDED; color: black; border: 1px solid white" id="nip" name="nip" value="<?php echo $data_cek['nip']; ?>"
					 readonly/>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Alamat Satuan</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" style="border-radius: 12px; background-color: #EEEDED; color: black; border: 1px solid white" id="alamat" name="alamat" value="<?php echo $data_cek['alamat']; ?>"
					 readonly/>
				</div>
			</div>
		</div>
	</form>

	<?php
		}
	$sql = $koneksi->query("SELECT count(nip) as ini from tb_pegawaisatpolpp");
	while ($data= $sql->fetch_assoc()) {
	
		$ini=$data['ini'];
	}
?>

<?php
	$sql = $koneksi->query("SELECT count(nip) as project from tb_pegawaisatpolpp where status_kepegawaian='Pegawai'");
	while ($data= $sql->fetch_assoc()) {
	
		$project=$data['project'];
	}
?>

<?php
	$sql = $koneksi->query("SELECT count(nip) as tugas from tb_pegawaisatpolpp where status_kepegawaian='Tenaga Kontrak'");
	while ($data= $sql->fetch_assoc()) {
	
		$tugas=$data['tugas'];
	}
?>

<?php
	$sql = $koneksi->query("SELECT count(id_pengguna) as akhir from tb_pengguna");
	while ($data= $sql->fetch_assoc()) {
	
		$akhir=$data['akhir'];
	}
?>

<?php
	$sql = $koneksi->query("SELECT count(nip) as ronaldo from tb_pegawaisatpolpp where keterangan='Aktif'");
	while ($data= $sql->fetch_assoc()) {
	
		$ronaldo=$data['ronaldo'];
	}
?>

<?php
	$sql = $koneksi->query("SELECT count(nip) as dwi from tb_pegawaisatpolpp where keterangan='Pensiun'");
	while ($data= $sql->fetch_assoc()) {
	
		$dwi=$data['dwi'];
	}
?>

<?php
	$sql = $koneksi->query("SELECT count(nip) as anaku from tb_pegawaisatpolpp where keterangan='Mutasi'");
	while ($data= $sql->fetch_assoc()) {
	
		$anaku=$data['anaku'];
	}
?>

<div class="row" style="background-color: #EEEDED;">
	<div class="col-lg-3 col-6">
	<div class="small-box" style="background-color: transparent; color: black; border: 5px solid black; border-radius: 30px;">
			<div class="inner">
				<h3>
					<?php echo $ini;  ?>
				</h3>
				<p style="font-weight: bold; width: 150px; padding: 0; margin-bottom: 0;">JUMLAH PEGAWAI & TEKON</p>
			</div>
			<div class="icon">
				<i class="ion ion-person" style="color: black;"></i>
			</div>
			<a href="?page=data-pegawai" class="small-box-footer" style="color: black;">Informasi
				<i class="fas fa-arrow-circle-right" style="color: black;"></i>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-6">
		<div class="small-box" style="background-color: transparent; color: black; border: 5px solid black; border-radius: 30px;">
			<div class="inner">
				<h3>
					<?php echo $project;  ?>
				</h3>

				<p style="font-weight: bold; margin-bottom: 23px">PEGAWAI</p>
			</div>
			<div class="icon">
				<i class="ion ion-person-add" style="color: black;"></i>
			</div>
			<a href="?page=data-pegawai-asn" class="small-box-footer" style="color: black;">Informasi
			<i class="fas fa-arrow-circle-right" style="color: black;"></i>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-6">
	<div class="small-box" style="background-color: transparent; color: black; border: 5px solid black; border-radius: 30px;">
			<div class="inner">
				<h3>
					<?php echo $tugas; ?>
				</h3>
				<p style="font-weight: bold; margin-bottom: 23px">TENAGA KONTRAK</p>
			</div>
			<div class="icon">
				<i class="ion ion-person-add" style="color: black;"></i>
			</div>
			<a href="?page=data-pegawai-nonasn" class="small-box-footer" style="color: black;">Informasi
			<i class="fas fa-arrow-circle-right" style="color: black;"></i>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-6">
	<div class="small-box" style="background-color: transparent; color: black; border: 5px solid black; border-radius: 30px;">
			<div class="inner">
				<h3>
					<?php echo $akhir;  ?>
				</h3>
				<p style="font-weight: bold; margin-bottom: 23px">PENGGUNA SISTEM</p>
			</div>
			<div class="icon">
				<i class="ion ion-android-happy" style="color: black;"></i>
			</div>
			<a href="?page=data-pengguna" class="small-box-footer" style="color: black;">Informasi
			<i class="fas fa-arrow-circle-right" style="color: black;"></i>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-6">
	<div class="small-box" style="background-color: transparent; color: black; border: 5px solid black; border-radius: 30px;">
			<div class="inner">
				<h3>
					<?php echo $ronaldo;  ?>
				</h3>
				<p style="font-weight: bold; margin-bottom: 23px">PEGAWAI AKTIF</p>
			</div>
			<div class="icon">
				<i class="ion ion-pie-graph" style="color: black;"></i>
			</div>
			<a href="?page=data-pegawai-aktif" class="small-box-footer" style="color: black;">Informasi
			<i class="fas fa-arrow-circle-right" style="color: black;"></i>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-6">
	<div class="small-box" style="background-color: transparent; color: black; border: 5px solid black; border-radius: 30px;">
			<div class="inner">
				<h3>
					<?php echo $dwi;  ?>
				</h3>
				<p style="font-weight: bold; margin-bottom: 23px">PEGAWAI PENSIUN</p>
			</div>
			<div class="icon">
				<i class="ion ion-pie-graph" style="color: black;"></i>
			</div>
			<a href="?page=data-pegawai-pensiun" class="small-box-footer" style="color: black;">Informasi
			<i class="fas fa-arrow-circle-right" style="color: black;"></i>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-6">
	<div class="small-box" style="background-color: transparent; color: black; border: 5px solid black; border-radius: 30px;">
			<div class="inner">
				<h3>
					<?php echo $anaku;  ?>
				</h3>
				<p style="font-weight: bold; margin-bottom: 23px">PEGAWAI MUTASI</p>
			</div>
			<div class="icon">
				<i class="ion ion-pie-graph" style="color: black;"></i>
			</div>
			<a href="?page=data-pegawai-mutasi" class="small-box-footer" style="color: black;">Informasi
			<i class="fas fa-arrow-circle-right" style="color: black;"></i>
			</a>
		</div>
	</div>
</div>