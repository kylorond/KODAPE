<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_profilinstansi WHERE id_profil='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<div class="card" style="background-color: #EEEDED; color: black;">
	<div class="card-header" style="background-color: #068FFF;">
		<h3 class="card-title" style="font-weight: bold;">
			<i class="fa fa-edit"></i> Ubah Data Satuan Instansi</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<input type='hidden' class="form-control" name="id_profil" value="<?php echo $data_cek['id_profil']; ?>"
			 readonly/>
			 
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Satuan</label>
				<div class="col-sm-8">
					<input type="text" style="background-color: transparent; color: black; border-radius: 10px" id="keterangan" class="form-control" id="nama_instansi" name="nama_instansi" value="<?php echo $data_cek['nama_instansi']; ?>"
					/>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Kepala Satuan</label>
				<div class="col-sm-8">
					<input type="text" style="background-color: transparent; color: black; border-radius: 10px" id="keterangan" class="form-control" id="kepala" name="kepala" value="<?php echo $data_cek['kepala']; ?>"
					/>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NIP Kepala Satuan</label>
				<div class="col-sm-8">
					<input type="text" style="background-color: transparent; color: black; border-radius: 10px" id="keterangan" class="form-control" id="nip" name="nip" value="<?php echo $data_cek['nip']; ?>"
					/>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Alamat Satuan</label>
				<div class="col-sm-8">
					<input type="text" style="background-color: transparent; color: black; border-radius: 10px" id="keterangan" class="form-control" id="alamat" name="alamat" value="<?php echo $data_cek['alamat']; ?>"
					/>
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Ubah" value="SIMPAN" class="btn" style="background-color: #F4CE14; color: black; font-weight: bold;">
			<a href="?page=data-profil" title="Kembali" class="btn" style="background-color: #CD1818; color: black; font-weight: bold;">BATAL</a>
		</div>
	</form>
</div>
<?php
    if (isset ($_POST['Ubah'])){
    $sql_ubah = "UPDATE tb_profilinstansi SET 
    nama_instansi='".$_POST['nama_instansi']."', 
    alamat='".$_POST['alamat']."', 
    kepala='".$_POST['kepala']."'
    WHERE id_profil='".$_POST['id_profil']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    mysqli_close($koneksi);
    if ($query_ubah) {
        echo "<script>
      Swal.fire({title: 'Kelola Satuan Instansi Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-profil';
        }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Kelola Satuan Instansi Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-profil';
        }
      })</script>";
    }
}
