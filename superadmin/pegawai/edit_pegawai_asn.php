<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_pegawaisatpolpp WHERE nip='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<div class="card-header" style="background-color: #068FFF; color: white;">
<h3 class="card-title" style="font-weight :bold;">
            <i class="fa fa-edit"></i> Ubah Data Pegawai</h3>
</div>
<div class="row">
<div class="col-md-6">
    <div class="card">
        <div class="card-body p-0" style="background-color: #EEEDED; color: black;">
            <table class="table" border="1" style="border-collapse: collapse; width: 100%; border: 1px solid lightgrey;">
                <tbody>
		<form action="" method="post" enctype="multipart/form-data">
        	<div class="card-body">
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">NIP*</label>
                <div class="col-sm-8">
				<input type="text" style="background-color: transparent; color: black; border-radius: 10px" class="form-control" id="nip" name="nip" value="<?php echo $data_cek['nip']; ?>"readonly/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Tanggal Masuk Honor</label>
                <div class="col-sm-8">
				<input type="date" style="background-color: transparent; color: black; border-radius: 10px" class="form-control" id="tanggal_honor" name="tanggal_honor" oninput="validateTanggal()" max="<?php echo date('Y-m-d'); ?>"
    <?php if(isset($data_cek['tanggal_honor'])) { ?>
       value="<?php echo $data_cek['tanggal_honor']; ?>"
   <?php } ?>>
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
                <label class="col-sm-4 col-form-label">TMT Pegawai*</label>
                <div class="col-sm-8">
				<input type="date" style="background-color: transparent; color: black; border-radius: 10px" class="form-control" id="tanggal_masuk" name="tanggal_masuk" oninput="validateTanggal1()" max="<?php echo date('Y-m-d'); ?>"
    <?php if(isset($data_cek['tanggal_masuk'])) { ?>
       value="<?php echo $data_cek['tanggal_masuk']; ?>"
   <?php } ?> required>

                </div>
            </div>
            <script>
            function validateTanggal1() {
                let inputDate = new Date(document.getElementById('tanggal_masuk').value);
                let currentDate = new Date();

                if (inputDate > currentDate) {
                    alert('Tanggal tidak boleh mendahului tanggal sekarang.');
                    document.getElementById('tanggal_masuk').value = '';
                }
            }
            </script>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Nama Lengkap*</label>
                <div class="col-sm-8">
				<input type="text" style="background-color: transparent; color: black; border-radius: 10px" class="form-control" id="nama" name="nama" value="<?php echo $data_cek['nama']; ?>"
                required/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Keterangan*</label>
                <div class="col-sm-8">
				<select name="keterangan" style="background-color: transparent; color: black; border-radius: 10px" id="keterangan" class="form-control" required>
                        <option <?php if ($data_cek['keterangan'] === 'Aktif') echo 'selected'; ?>>Aktif</option>
                        <option <?php if ($data_cek['keterangan'] === 'Pensiun') echo 'selected'; ?>>Pensiun</option>
                        <option <?php if ($data_cek['keterangan'] === 'Mutasi') echo 'selected'; ?>>Mutasi</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Tempat Lahir*</label>
                <div class="col-sm-8">
				<input type="text" style="background-color: transparent; color: black; border-radius: 10px" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?php echo $data_cek['tempat_lahir']; ?>"
                required />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Tanggal Lahir*</label>
                <div class="col-sm-8">
				<input type="date" style="background-color: transparent; color: black; border-radius: 10px" class="form-control" id="tanggal_lahir" name="tanggal_lahir" oninput="validateTanggal2()" max="<?php echo date('Y-m-d'); ?>"
    <?php if(isset($data_cek['tanggal_lahir'])) { ?>
       value="<?php echo $data_cek['tanggal_lahir']; ?>"
   <?php } ?> required>

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
				<select name="jenis_kelamin" style="background-color: transparent; color: black; border-radius: 10px" id="jenis_kelamin" class="form-control" required>
                        <option <?php if ($data_cek['jenis_kelamin'] === 'Laki-laki') echo 'selected'; ?>>Laki-laki</option>
                        <option <?php if ($data_cek['jenis_kelamin'] === 'Perempuan') echo 'selected'; ?>>Perempuan</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Agama*</label>
                <div class="col-sm-8">
				<select name="agama" style="background-color: transparent; color: black; border-radius: 10px" id="agama" class="form-control" required>
                        <option <?php if ($data_cek['agama'] === 'Islam') echo 'selected'; ?>>Islam</option>
                        <option <?php if ($data_cek['agama'] === 'Kristen Protestan') echo 'selected'; ?>>Kristen Protestan</option>
                        <option <?php if ($data_cek['agama'] === 'Kristen Katolik') echo 'selected'; ?>>Kristen Katolik</option>
                        <option <?php if ($data_cek['agama'] === 'Hindu') echo 'selected'; ?>>Hindu</option>
                        <option <?php if ($data_cek['agama'] === 'Buddha') echo 'selected'; ?>>Buddha</option>
                        <option <?php if ($data_cek['agama'] === 'Konghucu') echo 'selected'; ?>>Konghucu</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Golongan Darah</label>
                <div class="col-sm-8">
				<select name="gol_darah" style="background-color: transparent; color: black; border-radius: 10px" id="gol_darah" class="form-control">
                        <option >-- Pilih --</option>
                        <option <?php if ($data_cek['gol_darah'] === 'A') echo 'selected'; ?>>A</option>
                        <option <?php if ($data_cek['gol_darah'] === 'A+') echo 'selected'; ?>>A+</option>
                        <option <?php if ($data_cek['gol_darah'] === 'A-') echo 'selected'; ?>>A-</option>
                        <option <?php if ($data_cek['gol_darah'] === 'B') echo 'selected'; ?>>B</option>
                        <option <?php if ($data_cek['gol_darah'] === 'B+') echo 'selected'; ?>>B+</option>
                        <option <?php if ($data_cek['gol_darah'] === 'B-') echo 'selected'; ?>>B-</option>
                        <option <?php if ($data_cek['gol_darah'] === 'O') echo 'selected'; ?>>O</option>
                        <option <?php if ($data_cek['gol_darah'] === 'O+') echo 'selected'; ?>>O+</option>
                        <option <?php if ($data_cek['gol_darah'] === 'O-') echo 'selected'; ?>>O-</option>
                        <option <?php if ($data_cek['gol_darah'] === 'AB') echo 'selected'; ?>>AB</option>
                        <option <?php if ($data_cek['gol_darah'] === 'AB+') echo 'selected'; ?>>AB+</option>
                        <option <?php if ($data_cek['gol_darah'] === 'AB-') echo 'selected'; ?>>AB-</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">No BPJS/Askes</label>
                <div class="col-sm-8">
				<input type="text" style="background-color: transparent; color: black; border-radius: 10px" class="form-control" id="no_bpjs" name="no_bpjs" value="<?php echo $data_cek['no_bpjs']; ?>"
                    />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Status Kepegawaian*</label>
                <div class="col-sm-8">
				<input type="text" style="background-color: transparent; color: black; border-radius: 10px" class="form-control" id="status_kepegawaian" name="status_kepegawaian" value="<?php echo $data_cek['status_kepegawaian']; ?>"
                    readonly/>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Pangkat</label>
                <div class="col-sm-8">
				<input type="text" style="background-color: transparent; color: black; border-radius: 10px" class="form-control" id="pangkat" name="pangkat" value="<?php echo $data_cek['pangkat']; ?>"
                    />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Golongan*</label>
                <div class="col-sm-8">
				<select name="golongan" style="background-color: transparent; color: black; border-radius: 10px" id="golongan" class="form-control" required>
                    <option <?php if ($data_cek['golongan'] === "I/a") echo "selected"; ?>>I/a</option>
                    <option <?php if ($data_cek['golongan'] === "I/b") echo "selected"; ?>>I/b</option>
                    <option <?php if ($data_cek['golongan'] === "I/c") echo "selected"; ?>>I/c</option>
                    <option <?php if ($data_cek['golongan'] === "I/d") echo "selected"; ?>>I/d</option>
                    <option <?php if ($data_cek['golongan'] === "II/a") echo "selected"; ?>>II/a</option>
                    <option <?php if ($data_cek['golongan'] === "II/b") echo "selected"; ?>>II/b</option>
                    <option <?php if ($data_cek['golongan'] === "II/c") echo "selected"; ?>>II/c</option>
                    <option <?php if ($data_cek['golongan'] === "II/d") echo "selected"; ?>>II/d</option>
                    <option <?php if ($data_cek['golongan'] === "III/a") echo "selected"; ?>>III/a</option>
                    <option <?php if ($data_cek['golongan'] === "III/b") echo "selected"; ?>>III/b</option>
                    <option <?php if ($data_cek['golongan'] === "III/c") echo "selected"; ?>>III/c</option>
                    <option <?php if ($data_cek['golongan'] === "III/d") echo "selected"; ?>>III/d</option>
                    <option <?php if ($data_cek['golongan'] === "IV/a") echo "selected"; ?>>IV/a</option>
                    <option <?php if ($data_cek['golongan'] === "IV/b") echo "selected"; ?>>IV/b</option>
                    <option <?php if ($data_cek['golongan'] === "IV/c") echo "selected"; ?>>IV/c</option>
                    <option <?php if ($data_cek['golongan'] === "IV/d") echo "selected"; ?>>IV/d</option>
                </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">TMT Golongan</label>
                <div class="col-sm-8">
				<input type="date" style="background-color: transparent; color: black; border-radius: 10px" class="form-control" id="tmt_golongan" name="tmt_golongan" oninput="validateTanggal3()" max="<?php echo date('Y-m-d'); ?>"
                    <?php if(isset($data_cek['tmt_golongan'])) { ?>
                   value="<?php echo $data_cek['tmt_golongan']; ?>"
               <?php } ?>>
                </div>
            </div>
            <script>
            function validateTanggal3() {
                let inputDate = new Date(document.getElementById('tmt_golongan').value);
                let currentDate = new Date();

                if (inputDate > currentDate) {
                    alert('Tanggal tidak boleh mendahului tanggal sekarang.');
                    document.getElementById('tmt_golongan').value = '';
                }
            }
            </script>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Pendidikan*</label>
                <div class="col-sm-8">
				<select name="pendidikan" style="background-color: transparent; color: black; border-radius: 10px" id="pendidikan" class="form-control" required>
                            <option <?php if ($data_cek['pendidikan'] === 'SMA') echo 'selected'; ?>>SMA</option>
                            <option <?php if ($data_cek['pendidikan'] === 'SMK') echo 'selected'; ?>>SMK</option>
                            <option <?php if ($data_cek['pendidikan'] === 'D-3') echo 'selected'; ?>>D-3</option>
                            <option <?php if ($data_cek['pendidikan'] === 'D-4') echo 'selected'; ?>>D-4</option>
                            <option <?php if ($data_cek['pendidikan'] === 'S-1') echo 'selected'; ?>>S-1</option>
                            <option <?php if ($data_cek['pendidikan'] === 'S-2') echo 'selected'; ?>>S-2</option>
                            <option <?php if ($data_cek['pendidikan'] === 'S-3') echo 'selected'; ?>>S-3</option>
                        </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Jurusan</label>
                <div class="col-sm-8">
                <input type="text" style="background-color: transparent; color: black; border-radius: 10px" class="form-control" id="jurusan" name="jurusan" value="<?php echo $data_cek['jurusan']; ?>"
                    />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Konsentrasi</label>
                <div class="col-sm-8">
                <input type="text" style="background-color: transparent; color: black; border-radius: 10px" class="form-control" id="konsentrasi" name="konsentrasi" value="<?php echo $data_cek['konsentrasi']; ?>"
                    />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Alumni</label>
                <div class="col-sm-8">
				<input type="text" style="background-color: transparent; color: black; border-radius: 10px" class="form-control" id="alumni" name="alumni" value="<?php echo $data_cek['alumni']; ?>"
                    />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Tahun Lulus</label>
                <div class="col-sm-8">
				<input type="text" style="background-color: transparent; color: black; border-radius: 10px" class="form-control" id="tahun_lulus" name="tahun_lulus" onkeypress="return hanyaAngka(event)" value="<?php echo $data_cek['tahun_lulus']; ?>"
                    />
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
				<input type="text" style="background-color: transparent; color: black; border-radius: 10px" class="form-control" id="jabatan" name="jabatan" value="<?php echo $data_cek['jabatan']; ?>"
                    />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Penempatan</label>
                <div class="col-sm-8">
				<input type="text" style="background-color: transparent; color: black; border-radius: 10px" class="form-control" id="penempatan" name="penempatan" value="<?php echo $data_cek['penempatan']; ?>"
                    />
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
    <table class="table" border="1" style="border-collapse: collapse; width: 100%; border: 1px solid lightgrey;">
        <tbody>
		<form action="" method="post" enctype="multipart/form-data">
        	<div class="card-body">
		<div class="form-group row">
                <label class="col-sm-4 col-form-label">Unit Kerja</label>
                <div class="col-sm-8">
                <input type="text" style="background-color: transparent; color: black; border-radius: 10px" class="form-control" id="unit" name="unit" pattern="[A-Za-z\s]+" value="<?php echo $data_cek['unit']; ?>"
                    />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Pada Instansi</label>
                <div class="col-sm-8">
				<input type="text" style="background-color: transparent; color: black; border-radius: 10px" class="form-control" id="instansi" name="instansi" pattern="[A-Za-z\s]+" value="<?php echo $data_cek['instansi']; ?>"
                    />
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
                    <input type="text" style="background-color: transparent; color: black; border-radius: 10px;" class="form-control" id="gaji" name="gaji" value="<?php echo ($data_cek['gaji']); ?>" pattern="[0-9]+" title="Hanya angka yang diperbolehkan" />
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
                <label class="col-sm-4 col-form-label">Gaji Pokok</label>
                <div class="col-sm-8">
				<input type="text" style="background-color: transparent; color: white; border-radius: 10px" class="form-control" id="gaji" name="gaji" pattern="[0-9]+" title="Hanya angka dan titik yang diperbolehkan" value="<?php echo ($data_cek['gaji']); ?>" pattern="[0-9]+" title="Hanya angka yang diperbolehkan" />
                </div>
            </div> -->

            <!-- <div class="form-group row">
                <label class="col-sm-2 col-form-label">Terbilang</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="terbilang" name="terbilang" placeholder="Terbilang" required>
                </div>
            </div> -->

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Nomor Telp Rumah/HP</label>
                <div class="col-sm-8">
				<input type="text" style="background-color: transparent; color: black; border-radius: 10px" class="form-control" id="no_telp" name="no_telp" pattern="[0-9]+" value="<?php echo $data_cek['no_telp']; ?>"
                    />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Nomor Pokok Wajib Pajak (NPWP)</label>
                <div class="col-sm-8">
				<input type="text" style="background-color: transparent; color: black; border-radius: 10px" class="form-control" id="npwp" name="npwp" value="<?php echo $data_cek['npwp']; ?>"
                    />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Nomor Induk Kependudukan (NIK)</label>
                <div class="col-sm-8">
				<input type="text" style="background-color: transparent; color: black; border-radius: 10px" class="form-control" id="nik" name="nik" pattern="[0-9]+" onkeypress="return angka(event)" value="<?php echo $data_cek['nik']; ?>"
                    />
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
                <label class="col-sm-4 col-form-label">Nomor Kartu Pegawai (KARPEG)</label>
                <div class="col-sm-8">
				<input type="text" style="background-color: transparent; color: black; border-radius: 10px" class="form-control" id="karpeg" name="karpeg" value="<?php echo $data_cek['karpeg']; ?>"
                    />
				</div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Alamat Domisili Sekarang*</label>
                <div class="col-sm-8">
				<input type="text" style="background-color: transparent; color: black; border-radius: 10px" class="form-control" id="alamat" name="alamat" value="<?php echo $data_cek['alamat']; ?>"
                required/>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Ukuran Baju</label>
                <div class="col-sm-8">
				<select name="ukuran_baju" style="background-color: transparent; color: black; border-radius: 10px" id="ukuran_baju" class="form-control">
                            <option >-- Pilih --</option>
                            <option <?php if ($data_cek['ukuran_baju'] === 'XS') echo 'selected'; ?>>XS</option>
                            <option <?php if ($data_cek['ukuran_baju'] === 'S') echo 'selected'; ?>>S</option>
                            <option <?php if ($data_cek['ukuran_baju'] === 'M') echo 'selected'; ?>>M</option>
                            <option <?php if ($data_cek['ukuran_baju'] === 'L') echo 'selected'; ?>>L</option>
                            <option <?php if ($data_cek['ukuran_baju'] === 'XL') echo 'selected'; ?>>XL</option>
                            <option <?php if ($data_cek['ukuran_baju'] === 'XXL') echo 'selected'; ?>>XXL</option>
                            <option <?php if ($data_cek['ukuran_baju'] === '3XL') echo 'selected'; ?>>3XL</option>
                            <option <?php if ($data_cek['ukuran_baju'] === '4XL') echo 'selected'; ?>>4XL</option>
                        </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Ukuran Celana</label>
                <div class="col-sm-8">
				<input type="text" style="background-color: transparent; color: black; border-radius: 10px" class="form-control" id="ukuran_celana" name="ukuran_celana" pattern="[0-9]+" value="<?php echo $data_cek['ukuran_celana']; ?>"
                    />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Ukuran Topi</label>
                <div class="col-sm-8">
				<input type="text" style="background-color: transparent; color: black; border-radius: 10px" class="form-control" id="ukuran_topi" name="ukuran_topi" pattern="[0-9]+" value="<?php echo $data_cek['ukuran_topi']; ?>"
                    />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Ukuran Sepatu</label>
                <div class="col-sm-8">
				<input type="text" style="background-color: transparent; color: black; border-radius: 10px" class="form-control" id="ukuran_sepatu" name="ukuran_sepatu" pattern="[0-9]+" value="<?php echo $data_cek['ukuran_sepatu']; ?>"
                    />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Nomor Rekening</label>
                <div class="col-sm-8">
				<input type="text" style="background-color: transparent; color: black; border-radius: 10px" class="form-control" id="no_rek" name="no_rek" value="<?php echo $data_cek['no_rek']; ?>"
                    />
                </div>
            </div>

        </div>

        </tbody>
    </table>
	<input type="submit" name="Ubah" value="UBAH" class="btn" style="background-color: #F4CE14; font-weight: bold;">
            <a href="?page=data-pegawai-asn" title="Kembali" class="btn" style="background-color: #CD1818; color: white; font-weight: bold;">BATAL</a>
        </div>
    </form>
</div>
</div>
</div>
<?php
if (isset ($_POST['Ubah'])){
        $sql_ubah = "UPDATE tb_pegawaisatpolpp SET
            tanggal_honor='".$_POST['tanggal_honor']."',
            tanggal_masuk='".$_POST['tanggal_masuk']."',
            nama='".$_POST['nama']."',
            keterangan='".$_POST['keterangan']."',
            tempat_lahir='".$_POST['tempat_lahir']."',
            tanggal_lahir='".$_POST['tanggal_lahir']."',
            jenis_kelamin='".$_POST['jenis_kelamin']."',
            agama='".$_POST['agama']."',
            gol_darah='".$_POST['gol_darah']."',
            no_bpjs='".$_POST['no_bpjs']."',
            status_kepegawaian='".$_POST['status_kepegawaian']."',
            pangkat='".$_POST['pangkat']."',
            golongan='".$_POST['golongan']."',
            tmt_golongan='".$_POST['tmt_golongan']."',
            pendidikan='".$_POST['pendidikan']."',
            jurusan='".$_POST['jurusan']."',
            konsentrasi='".$_POST['konsentrasi']."',
            alumni='".$_POST['alumni']."',
            tahun_lulus='".$_POST['tahun_lulus']."',
            jabatan='".$_POST['jabatan']."',
            unit='".$_POST['unit']."',
            instansi='".$_POST['instansi']."',
            masagolongan='".$_POST['masagolongan']."',
            gaji='".$_POST['gaji']."',
            no_telp='".$_POST['no_telp']."',
            npwp='".$_POST['npwp']."',
            nik='".$_POST['nik']."',
            karpeg='".$_POST['karpeg']."',
            alamat='".$_POST['alamat']."',
            ukuran_baju='".$_POST['ukuran_baju']."',
            ukuran_celana='".$_POST['ukuran_celana']."',
            ukuran_topi='".$_POST['ukuran_topi']."',
            ukuran_sepatu='".$_POST['ukuran_sepatu']."',
            no_rek='".$_POST['no_rek']."'
        WHERE nip='".$_POST['nip']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    mysqli_close($koneksi);
    if ($query_ubah) {
        echo "<script>
        Swal.fire({title: 'Ubah Data Pegawai Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-pegawai-asn';
            }
        })</script>";
        }else{
        echo "<script>
        Swal.fire({title: 'Ubah Data Pegawai Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-pegawai-asn';
            }
        })</script>";
    }
}
?>

