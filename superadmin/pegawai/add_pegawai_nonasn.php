<div class="card-header" style="background-color: #0E21A0; color: white;">
	<h3 class="card-title" style="font-weight: bold;">
    <i class="fa fa-edit"></i> Tambah Data Tenaga Kontrak</h3>
</div>
<div class="row">
<div class="col-md-6">
    <div class="card">
        <div class="card-body p-0" style="background-color: #EEEDED; color: black;">
            <table class="table" border="1" style="border-collapse: collapse; width: 100%; border: 1px solid white;">
                <tbody>
		<form action="" method="post" enctype="multipart/form-data">
        	<div class="card-body">
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">NRPK*</label>
                <div class="col-sm-8">
                    <input type="text" style="background-color: transparent; color: black; border-radius: 10px;" class="form-control" id="nip" name="nip" placeholder="NRPK" pattern="[0-9 .]+" title="Hanya angka, titik, dan spasi yang diperbolehkan" />
                </div>
            </div>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    // Ambil elemen input
                    var inputNip = document.getElementById('nip');

                    // Tambahkan event listener untuk memantau setiap kali ada input dari pengguna
                    inputNip.addEventListener('input', function(event) {
                        // Dapatkan nilai input
                        var nilaiInput = inputNip.value;

                        // Hilangkan semua karakter kecuali angka, titik, dan spasi
                        var nilaiValid = nilaiInput.replace(/[^0-9. ]/g, '');

                        // Periksa apakah nilai input setelah dibersihkan hanya berisi karakter yang valid
                        if (nilaiInput !== nilaiValid) {
                            // Jika terdapat karakter selain yang diperbolehkan, atur nilai input ke nilai yang sudah dibersihkan
                            inputNip.value = nilaiValid;
                        }
                    });
                });
            </script>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Tanggal Masuk Honor</label>
                <div class="col-sm-8">
                    <input type="date" style="background-color: transparent; color: black; border-radius: 10px;" class="form-control" id="tanggal_honor" name="tanggal_honor" oninput="validateTanggal()">
                </div>
            </div>
            <script>
            function validateTanggal() {
                let inputDate = new Date(document.getElementById('tanggal_honor').value);
                let currentDate = new Date();

                if (inputDate > currentDate) {
                    alert('Tanggal tidak boleh mendahului tanggal sekarang.');
                    document.getElementById('tanggal_honor').value = '';
                }
            }
            </script>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Nama Lengkap*</label>
                <div class="col-sm-8">
                    <input type="text" style="background-color: transparent; color: black; border-radius: 10px;" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" title="Hanya huruf, spasi, koma, titik, dan kutip yang diperbolehkan" pattern="[a-zA-Z\s,.'\"]+" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Keterangan</label>
                <div class="col-sm-8">
                    <select name="keterangan" style="background-color: transparent; color: black; border-radius: 10px;" id="keterangan" class="form-control">
                        <option>-- Pilih --</option>
                        <option>Aktif</option>
                        <option>Pensiun</option>
                        <option>Mutasi</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Tempat Lahir*</label>
                <div class="col-sm-8">
                <input type="text" style="background-color: transparent; color: black; border-radius: 10px;" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir" title="Hanya huruf, spasi, koma, titik, dan kutip yang diperbolehkan" pattern="[a-zA-Z\s,.'\"]+" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Tanggal Lahir*</label>
                <div class="col-sm-8">
                    <input type="date" style="background-color: transparent; color: black; border-radius: 10px;" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required oninput="validateTanggal2()" required>
                </div>
            </div>
            <script>
            function validateTanggal2() {
                let inputDate = new Date(document.getElementById('tanggal_lahir').value);
                let currentDate = new Date();

                if (inputDate > currentDate) {
                    alert('Tanggal tidak boleh mendahului tanggal sekarang.');
                    document.getElementById('tanggal_lahir').value = '';
                }
            }
            </script>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Jenis Kelamin*</label>
                <div class="col-sm-8">
                    <select name="jenis_kelamin" style="background-color: transparent; color: black; border-radius: 10px;" id="jenis_kelamin" class="form-control" required>
                        <option>-- Pilih --</option>
                        <option>Laki-laki</option>
                        <option>Perempuan</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Agama*</label>
                <div class="col-sm-8">
                    <select name="agama" style="background-color: transparent; color: black; border-radius: 10px;" id="agama" class="form-control" required>
                        <option>-- Pilih --</option>
                        <option>Islam</option>
                        <option>Kristen Protestan</option>
                        <option>Kristen Katolik</option>
                        <option>Hindu</option>
                        <option>Buddha</option>
                        <option>Konghucu</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Golongan Darah</label>
                <div class="col-sm-8">
                    <select name="gol_darah" style="background-color: transparent; color: black; border-radius: 10px;" id="gol_darah" class="form-control">
                        <option>-- Pilih --</option>
                        <option>A</option>
                        <option>A+</option>
                        <option>A-</option>
                        <option>B</option>
                        <option>B+</option>
                        <option>B-</option>
                        <option>O</option>
                        <option>O+</option>
                        <option>O-</option>
                        <option>AB</option>
                        <option>AB+</option>
                        <option>AB-</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">No BPJS/Askes</label>
                <div class="col-sm-8">
                    <input type="text" style="background-color: transparent; color: black; border-radius: 10px;" class="form-control" id="no_bpjs" name="no_bpjs" placeholder="Nomor BPJS atau Askes" pattern="[0-9]+" title="Hanya angka yang diperbolehkan" />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Status Kepegawaian*</label>
                <div class="col-sm-8">
                    <select name="status_kepegawaian" style="background-color: transparent; color: black; border-radius: 10px;" id="status_kepegawaian" class="form-control" required>
                        <option>Tenaga Kontrak</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Pendidikan*</label>
                <div class="col-sm-8">
                    <select name="pendidikan" style="background-color: transparent; color: black; border-radius: 10px;" id="pendidikan" class="form-control" required>
                        <option>-- Pilih --</option>
                        <option>SMA</option>
                        <option>SMK</option>
                        <option>D-3</option>
                        <option>D-4</option>
                        <option>S-1</option>
                        <option>S-2</option>
                        <option>S-3</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Jurusan</label>
                <div class="col-sm-8">
                <input type="text" style="background-color: transparent; color: black; border-radius: 10px;" class="form-control" id="jurusan" name="jurusan" placeholder="Jurusan">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Konsentrasi</label>
                <div class="col-sm-8">
                <input type="text" style="background-color: transparent; color: black; border-radius: 10px;" class="form-control" id="konsentrasi" name="konsentrasi" placeholder="Konsentrasi">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Alumni</label>
                <div class="col-sm-8">
                    <input type="text" style="background-color: transparent; color: black; border-radius: 10px;" class="form-control" id="alumni" name="alumni" placeholder="Alumni">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Tahun Lulus</label>
                <div class="col-sm-8">
                    <input type="text" style="background-color: transparent; color: black; border-radius: 10px;" class="form-control" id="tahun_lulus" name="tahun_lulus" placeholder="Tahun Lulus" onkeypress="return hanyaAngka(event)">
                </div>
            </div>

            <script>
            function hanyaAngka(event) {
                var charCode = (event.which) ? event.which : event.keyCode;
                if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                    event.preventDefault();
                    return false;
                }
                return true;
            }
            </script>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Jabatan</label>
                <div class="col-sm-8">
                    <input type="text" style="background-color: transparent; color: black; border-radius: 10px;" class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan" pattern="[A-Za-z\s]+" title="Hanya huruf yang diperbolehkan">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Penempatan</label>
                <div class="col-sm-8">
                    <input type="text" style="background-color: transparent; color: blackl; border-radius: 10px;" class="form-control" id="penempatan" name="penempatan" placeholder="Penempatan">
                </div>
            </div>
                </tbody>
            </table>
        </div>
    </div>
</div>
	<div class="col-md-6">
	<div class="card">
			<div class="card-body p-0" style="background-color: #EEEDED; color: black;">
    <table class="table" border="1" style="border-collapse: collapse; width: 100%; border: 1px solid black;">
        <tbody>
		<form action="" method="post" enctype="multipart/form-data">
        	<div class="card-body">
		<div class="form-group row">
                <label class="col-sm-4 col-form-label">Unit Kerja</label>
                <div class="col-sm-8">
                <input type="text" style="background-color: transparent; color: black; border-radius: 10px;" class="form-control" id="unit" name="unit" placeholder="Unit Kerja" pattern="[A-Za-z\s]+" title="Hanya huruf yang diperbolehkan">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Pada Instansi</label>
                <div class="col-sm-8">
                <input type="text" style="background-color: transparent; color: black; border-radius: 10px;" class="form-control" id="instansi" name="instansi" placeholder="Pada Instansi" pattern="[A-Za-z\s]+" title="Hanya huruf yang diperbolehkan">
                </div>
            </div>
            <!-- <div class="form-group row">
                <label class="col-sm-2 col-form-label">Masa Kerja Golongan</label>
                <?php
                        if(isset($_GET['kode'])){
                            $tanggal_masuk = new DateTime($data_cek['tanggal_masuk']);
                            $tanggal_sekarang = new DateTime();
                            $selisih = $tanggal_masuk->diff($tanggal_sekarang);
                            $selisih_tahun = $selisih->y;
                            $selisih_bulan = $selisih->m;
                            }
                            ?>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="masagolongan" name="masagolongan" placeholder="<?php
                                    echo "$selisih_tahun tahun ";
                                    echo "$selisih_bulan bulan<br>";
                                    ?>">
                </div>
            </div> -->

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Gaji Pokok</label>
                <div class="col-sm-8">
                    <input type="text" style="background-color: transparent; color: black; border-radius: 10px;" class="form-control" id="gaji" name="gaji" placeholder="Gaji Pokok" pattern="[0-9]+" title="Hanya angka yang diperbolehkan" />
                </div>
            </div>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    // Ambil elemen input
                    var inputGaji = document.getElementById('gaji');

                    // Tambahkan event listener untuk memantau setiap kali ada input dari pengguna
                    inputGaji.addEventListener('input', function(event) {
                        // Dapatkan nilai input
                        var nilaiInput = inputGaji.value;

                        // Hilangkan semua karakter kecuali angka dari nilai input
                        var nilaiAngka = nilaiInput.replace(/\D/g, '');

                        // Periksa apakah nilai input setelah dibersihkan hanya berisi angka
                        if (nilaiInput !== nilaiAngka) {
                            // Jika terdapat karakter selain angka, atur nilai input ke nilai angka yang sudah dibersihkan
                            inputGaji.value = nilaiAngka;
                        }
                    });
                });
            </script>

            <!-- <div class="form-group row">
                <label class="col-sm-2 col-form-label">Terbilang</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="terbilang" name="terbilang" placeholder="Terbilang" required>
                </div>
            </div> -->

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Nomor Telp Rumah/HP</label>
                <div class="col-sm-8">
                    <input type="text" style="background-color: transparent; color: black; border-radius: 10px;" class="form-control" id="no_telp" name="no_telp" placeholder="Nomor Telp Rumah/HP" pattern="[0-9]+">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Nomor Pokok Wajib Pajak (NPWP)</label>
                <div class="col-sm-8">
                    <input type="text" style="background-color: transparent; color: black; border-radius: 10px;" class="form-control" id="npwp" name="npwp" placeholder="Nomor Pokok Wajib Pajak (NPWP)">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Nomor Induk Kependudukan (NIK)</label>
                <div class="col-sm-8">
                    <input type="text" style="background-color: transparent; color: black; border-radius: 10px;" class="form-control" id="nik" name="nik" placeholder="Nomor Induk Kependudukan (NIK)" onkeypress="return angka(event)" pattern="[0-9]+">
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
                <label class="col-sm-4 col-form-label">Alamat Domisili Sekarang*</label>
                <div class="col-sm-8">
                    <input type="text" style="background-color: transparent; color: black; border-radius: 10px;" class="form-control" id="alamat" name="alamat" placeholder="Alamat Domisili Sekarang" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Ukuran Baju</label>
                <div class="col-sm-8">
                <select name="ukuran_baju" style="background-color: transparent; color: black; border-radius: 10px;" id="ukuran_baju" class="form-control">
                        <option>-- Pilih --</option>
                        <option>XS</option>
                        <option>S</option>
                        <option>M</option>
                        <option>L</option>
                        <option>XL</option>
                        <option>XXL</option>
                        <option>3XL</option>
                        <option>4XL</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Ukuran Celana</label>
                <div class="col-sm-8">
                    <input type="text" style="background-color: transparent; color: black; border-radius: 10px;" class="form-control" id="ukuran_celana" name="ukuran_celana" placeholder="Ukuran Celana" pattern="[0-9]+" title="hanya angka yang diperbolehkan">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Ukuran Topi</label>
                <div class="col-sm-8">
                    <input type="text" style="background-color: transparent; color: black; border-radius: 10px;" class="form-control" id="ukuran_topi" name="ukuran_topi" placeholder="Ukuran Topi" pattern="[0-9]+" title="hanya angka yang diperbolehkan">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Ukuran Sepatu</label>
                <div class="col-sm-8">
                    <input type="text" style="background-color: transparent; color: black; border-radius: 10px;" class="form-control" id="ukuran_sepatu" name="ukuran_sepatu" placeholder="Ukuran Sepatu" pattern="[0-9]+" title="hanya angka yang diperbolehkan">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Nomor Rekening</label>
                <div class="col-sm-8">
                    <input type="text" style="background-color: transparent; color: black; border-radius: 10px;" class="form-control" id="no_rek" name="no_rek" placeholder="Nomor Rekening" pattern="[0-9 . ]+" title="hanya angka dan titik yang diperbolehkan">
                </div>
            </div>

        </div>

        </tbody>
    </table>
	<input type="submit" name="Simpan" value="SIMPAN" class="btn" style="background-color: #F4CE14; font-weight: bold;">
            <a href="?page=data-pegawai-nonasn" title="Kembali" class="btn" style="background-color: #CD1818; color: white; font-weight: bold;">BATAL</a>
        </div>
    </form>
</div>
</div>
</div>
<?php
    if (isset ($_POST['Simpan'])){
        $nip = $_POST['nip'];

        $sql_check_existing = "SELECT nip FROM tb_pegawaisatpolpp WHERE nip = '$nip'";
        $query_check_existing = mysqli_query($koneksi, $sql_check_existing);
        
        if (mysqli_num_rows($query_check_existing) > 0) {
            echo "<script>
                Swal.fire({title: 'NIP/NRPK sudah ada', text: '', icon: 'error', confirmButtonText: 'OK'})
            </script>";
        } else {
        $sql_simpan = "INSERT INTO tb_pegawaisatpolpp (nip, tanggal_honor, nama,  
        tempat_lahir, tanggal_lahir, jenis_kelamin, agama, gol_darah, no_bpjs, status_kepegawaian, 
        pendidikan, jurusan, konsentrasi, alumni, tahun_lulus, 
        jabatan, penempatan, unit, instansi, gaji, no_telp, npwp, nik,
        alamat, ukuran_baju, ukuran_celana, ukuran_topi, ukuran_sepatu, no_rek) VALUES (
            '".$_POST['nip']."',
            '".$_POST['tanggal_honor']."',
            '".$_POST['nama']."',
            '".$_POST['tempat_lahir']."',
            '".$_POST['tanggal_lahir']."',
            '".$_POST['jenis_kelamin']."',
            '".$_POST['agama']."',
            '".$_POST['gol_darah']."',
            '".$_POST['no_bpjs']."',
            '".$_POST['status_kepegawaian']."',
            '".$_POST['pendidikan']."',
            '".$_POST['jurusan']."',
            '".$_POST['konsentrasi']."',
            '".$_POST['alumni']."',
            '".$_POST['tahun_lulus']."',
            '".$_POST['jabatan']."',
            '".$_POST['penempatan']."',
            '".$_POST['unit']."',
            '".$_POST['instansi']."',
            '".$_POST['gaji']."',
            '".$_POST['no_telp']."',
            '".$_POST['npwp']."',
            '".$_POST['nik']."',
            '".$_POST['alamat']."',
            '".$_POST['ukuran_baju']."',
            '".$_POST['ukuran_celana']."',
            '".$_POST['ukuran_topi']."',
            '".$_POST['ukuran_sepatu']."',
            '".$_POST['no_rek']."')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);

    if ($query_simpan) {
      echo "<script>
      Swal.fire({title: 'Tambah Data Tenaga Kontrak Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-pegawai-nonasn';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Tenaga Kontrak Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-pegawai-nonasn';
          }
      })</script>";
    }
    }
    }
