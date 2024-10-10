<?php
	include "../inc/koneksi.php";
    $nip = $_GET['nip'];
	$sql_cek = "SELECT * FROM tb_pegawaisatpolpp WHERE nip='$nip'";
	$query_cek = mysqli_query($koneksi, $sql_cek);
	$data = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CETAK BIODATA PEGAWAI</title>
    <style type="text/css">
        body {font-family:arial; background-color:white}
		td{font-size: 22px;}
        .rangkasurat {width:980px; margin:0 auto; background-color: white; height: 500px; padding: 20px;}
        .kop{border-bottom: 5px solid black; padding: 2px;}
        .tengah{text-align: center; line-height: 6px;}
		span.biru{color: blue; text-decoration: underline;}
		p{font-size: 22px; text-align: justify}
		.justify{text-align: justify; vertical-align: baseline;}
		span.bold{font-weight: bold;}
		span.italic{font-style: italic;}
		tbody{border: none;}
		tr{border: none;}
		td{border: none;}
        .initabel {
            border-collapse: collapse;
            width: 100%;
        }

        .isitabel {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
            /* Mengatur seluruh isi tabel menjadi rata tengah */
        }

        .satu, .dua {
      border: 1px solid black;
      padding: 6px;
      text-align: center;
    }
    .tiga {
      background-color: #FFFFFF;
    }
    </style>
</head>
<body>
    <div class="rangkasurat">
        <table class="kop" width="100%">
            <tr>
                <td><img src="../dist/img/logokalteng.png" width="85px"></td>
                <td class="tengah">
                    <h2 class="tengah">PEMERINTAH PROVINSI KALIMANTAN TENGAH</h2>
		            <h1 class="tengah">SATUAN POLISI PAMONG PRAJA</h1>
					<p class="tengah">Alamat : Jl. Yos Sudarso No. 008 Palangka Raya 73112</p>
					<p class="tengah">website : <span class="biru">https://satpolpp.kalteng.go.id</span>  email : <span class="biru">kalteng.polpp@gmail.com</span></p>
                </td>
				<td><img src="../dist/img/logosatpolpp.png" width="85px"></td>
            </tr>
        </table>
		<br>
		<td>
		<h2 class="tengah">BIODATA PEGAWAI SATUAN POLISI PAMONG PRAJA</h2>
		<h2 class="tengah">PROVINSI KALIMANTAN TENGAH</h2>
        </td>
		<br>
        <table cellspacing="0" style="width: 100%">
		<tbody>
			<tr class="justify">
				<td style="width: 38%;">Nama Lengkap</td>
				<td style="width: 2%;">:</td>
				<td><span class="bold"><?php echo $data['nama']; ?></span></td>
			</tr>
            <tr class="justify">
				<td style="width: 38%;">NIP</td>
				<td style="width: 2%;">:</td>
				<td><?php echo $data['nip']; ?></s></td>
			</tr>
			<tr class="justify">
				<td style="width: 38%;">Tempat dan Tanggal Lahir</td>
				<td style="width: 2%;">:</td>
				<td>
				<?php
                    if (!empty($data['tempat_lahir']) && !empty($data['tanggal_lahir'])) {
                        $tanggal_lahir = $data['tanggal_lahir'];
                        $tanggal_lahir_format = date("d F Y", strtotime($tanggal_lahir));
                        $bulan_inggris = array('January', 
                                            'February', 
                                            'March', 
                                            'April', 
                                            'May', 
                                            'June', 
                                            'July', 
                                            'August', 
                                            'September', 
                                            'October', 
                                            'November', 
                                            'December');
                        $bulan_indonesia = array('Januari', 
                                            'Februari', 
                                            'Maret', 
                                            'April', 
                                            'Mei', 
                                            'Juni', 
                                            'Juli', 
                                            'Agustus', 
                                            'September', 
                                            'Oktober', 
                                            'November', 
                                            'Desember');
                        $tanggal_lahir_format = str_replace($bulan_inggris, $bulan_indonesia, $tanggal_lahir_format);

                        echo $data['tempat_lahir'] . ', ' . $tanggal_lahir_format;
                    } else {
                        echo $data['tempat_lahir']; // Tampilkan hanya tempat_lahir jika tanggal_lahir tidak ada
                    }
                    ?>
				</td>
			</tr>


            <tr class="justify">
				<td style="width: 38%;">Jenis Kelamin</td>
				<td style="width: 2%;">:</td>
				<td><?php echo $data['jenis_kelamin']; ?></td>
			</tr>
            <tr class="justify">
				<td style="width: 38%;">Agama</td>
				<td style="width: 2%;">:</td>
				<td><?php echo $data['agama']; ?></td>
			</tr>
            <tr class="justify">
				<td style="width: 38%;">Status Kepegawaian</td>
				<td style="width: 2%;">:</td>
				<td><?php echo $data['status_kepegawaian']; ?></td>
			</tr>
            <tr class="justify">
				<td style="width: 38%;">Pangkat/Gol. Ruang</td>
				<td style="width: 2%;">:</td>
				<td><?php echo $data['pangkat']; ?> (<?php echo $data['golongan']; ?>)</td> 
			</tr>
			<tr class="justify">
				<td style="width: 38%;">Terhitung Mulai Tanggal</td>
				<td style="width: 2%;">:</td>
				<td><?php
$tmt_golongan = $data['tmt_golongan'];

if (!empty($tmt_golongan)) {
    $tmt_golongan_format = date("d F Y", strtotime($tmt_golongan));
    $bulan_inggris = array('January', 
                        'February', 
                        'March', 
                        'April', 
                        'May', 
                        'June', 
                        'July', 
                        'August', 
                        'September', 
                        'October', 
                        'November', 
                        'December');
    $bulan_indonesia = array('Januari', 
                        'Februari', 
                        'Maret', 
                        'April', 
                        'Mei', 
                        'Juni', 
                        'Juli', 
                        'Agustus', 
                        'September', 
                        'Oktober', 
                        'November', 
                        'Desember');
    $tmt_golongan_format = str_replace($bulan_inggris, $bulan_indonesia, $tmt_golongan_format);

    echo $tmt_golongan_format;
} else {
    echo ''; // Tampilkan string kosong jika "tmt_golongan" tidak ada
}
?>
</td>
			</tr>
    <!-- <tr class="justify">
		<td style="width: 38%;">Naik Pangkat</td>
		<td style="width: 2%;">:</td>
    <td>Diperkirakan akan naik pangkat pada 
			<span class="bold">
						<?php
						$tmt_pangkat = new DateTime($data['tmt_pangkat']);
						$naik_pangkat = $tmt_pangkat->add(new DateInterval('P4Y'));
						$bulan_inggris = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
						$bulan_indonesia = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

						$formatted_date = str_replace($bulan_inggris, $bulan_indonesia, $naik_pangkat->format('j F Y'));
						echo $formatted_date;
						?></span> 
		</td>
	</tr> -->
            <tr class="justify">
				<td style="width: 38%;">Pendidikan</td>
				<td style="width: 2%;">:</td>
				<td><?php echo $data['pendidikan']; ?></td>
			</tr>
            <tr class="justify">
				<td style="width: 38%;">Jabatan</td>
				<td style="width: 2%;">:</td>
				<td><?php echo $data['jabatan']; ?></td>
			</tr>
            <tr class="justify">
				<td style="width: 38%;">Unit Kerja</td>
				<td style="width: 2%;">:</td>
				<td><?php echo $data['unit']; ?></td>
			</tr>
            <tr class="justify">
				<td style="width: 38%;">Pada Instansi</td>
				<td style="width: 2%;">:</td>
				<td><?php echo $data['instansi']; ?></td>
			</tr>
			<tr class="justify">
    <td style="width: 38%;">
        Masa Kerja Golongan
    </td>
    <td style="width: 2%;">:</td>
    <td>
        <?php
        $tanggal_masuk = new DateTime($data['tanggal_masuk']);
        $tanggal_sekarang = new DateTime();
        $selisih = $tanggal_masuk->diff($tanggal_sekarang);

        $selisih_tahun = $selisih->y;
        $selisih_bulan = $selisih->m;

        if ($selisih_tahun > 0) {
            echo $selisih_tahun . " tahun ";
        }

        echo $selisih_bulan . " bulan";
        ?>
    </td>
</tr>
<?php
function terbilang($angka) {
    $angka = abs($angka);
    $terbilang = array(
        "", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas"
    );
    
    if ($angka < 12) {
        return $terbilang[$angka];
    } elseif ($angka < 20) {
        return terbilang($angka - 10) . " Belas";
    } elseif ($angka < 100) {
        return terbilang($angka / 10) . " Puluh " . terbilang($angka % 10);
    } elseif ($angka < 200) {
        return "Seratus " . terbilang($angka - 100);
    } elseif ($angka < 1000) {
        return terbilang($angka / 100) . " Ratus " . terbilang($angka % 100);
    } elseif ($angka < 2000) {
        return "Seribu " . terbilang($angka - 1000);
    } elseif ($angka < 1000000) {
        return terbilang($angka / 1000) . " Ribu " . terbilang($angka % 1000);
    } elseif ($angka < 1000000000) {
        return terbilang($angka / 1000000) . " Juta " . terbilang($angka % 1000000);
    } else {
        return "Angka terlalu besar untuk dihitung.";
    }
}

$gaji = $data['gaji'];

echo '<tr class="justify">
        <td style="width: 38%;">Gaji Pokok</td>
        <td style="width: 2%;">:</td>';

if (!empty($gaji)) {
    $terbilang_gaji = terbilang($gaji);
    echo '<td>Rp ' . number_format($gaji, 0, ',', '.') . '</td>
    </tr>
    <tr class="justify">
        <td style="width: 38%;">Terbilang</td>
        <td style="width: 2%;">:</td>
        <td>' . $terbilang_gaji . ' Rupiah</td>';
} else {
    echo '<td></td>
    </tr>
    <tr class="justify">
        <td style="width: 38%;">Terbilang</td>
        <td style="width: 2%;">:</td>
        <td></td>';
}
echo '</tr>';
?>
            <tr class="justify">
				<td style="width: 38%;">Nomor Telp Rumah/HP</td>
				<td style="width: 2%;">:</td>
				<td><?php echo $data['no_telp']; ?></td>
			</tr>
            <tr class="justify">
				<td style="width: 38%;">Nomor Pokok Wajib Pajak (NPWP)</td>
				<td style="width: 2%;">:</td>
				<td><?php echo $data['npwp']; ?></td>
			</tr>
            <tr class="justify">
				<td style="width: 38%;">Nomor Induk Kependudukan (NIK)</td>
				<td style="width: 2%;">:</td>
				<td><?php echo $data['nik']; ?></td>
			</tr>
            <tr class="justify">
				<td style="width: 38%;">Nomor Kartu Pegawai (KARPEG)</td>
				<td style="width: 2%;">:</td>
				<td><?php echo $data['karpeg']; ?></td>
			</tr>
			<tr class="justify">
				<td style="width: 38%;">Alamat Domisili Sekarang</td>
				<td style="width: 2%;">:</td>
				<td><?php echo $data['alamat']; ?></td>
			</tr>
            <tr class="justify">
				<td style="width: 38%;">Ukuran Baju</td>
				<td style="width: 2%;">:</td>
				<td><?php echo $data['ukuran_baju']; ?></td>
			</tr>
            <tr class="justify">
				<td style="width: 38%;">Ukuran Celana</td>
				<td style="width: 2%;">:</td>
				<td><?php echo $data['ukuran_celana']; ?></td>
			</tr>
            <tr class="justify">
				<td style="width: 38%;">Ukuran Topi</td>
				<td style="width: 2%;">:</td>
				<td><?php echo $data['ukuran_topi']; ?></td>
			</tr>
            <tr class="justify">
				<td style="width: 38%;">Ukuran Sepatu</td>
				<td style="width: 2%;">:</td>
				<td><?php echo $data['ukuran_sepatu']; ?></td>
			</tr>
		</tbody>
		<table class="isitabel initabel satu dua tiga" style="text-size-adjust: small;">
                        <thead>
                            <tr class="satu" style="width: 100%;">
                                <th class="satu" rowspan="2" style="width: 30%;">Nama Istri/Suami/Anak Tanggungan</th>
                                <th class="satu" rowspan="2" style="width: 30%;">Jenis Kelamin</th>
                                <th class="satu" colspan="2" style="width: 30%;">Tanggal</th>
                                <th class="satu" rowspan="2" style="width: 30%;">Pekerjaan/ Sekolah</th>
                                <th class="satu" colspan="2" style="width: 30%;">Keterangan</th>
                                <!-- <th class="satu" rowspan="2"></th> -->
                            </tr>
                            <tr class="satu">
                                <th class="isitabel satu" style="width: 30%;">Kelahiran</th>
                                <th class="isitabel satu" style="width: 30%;">Perkawinan/Perceraian/Meninggal</th>
                                <th class="isitabel satu" style="width: 30%;">(Suami, Istri, AK, AT, AA)</th>
                                <th class="isitabel satu" style="width: 30%;">Lainnya</th>
                            </tr>
                        </thead>
					<br>
		<tbody style="width: 100%;">
		<?php
						$nama = $data['nama'];
                        $koneksi = mysqli_connect("localhost", "root", "", "db_polpp");
                        $query = mysqli_query($koneksi, "SELECT * FROM tb_keluarga WHERE nama = '$nama'");
                        while ($data_keluarga = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <td class="isitabel satu">
                                    <?php echo $data_keluarga['nama_keluarga']; ?>
                                </td>
                                
                                <td class="isitabel satu">
                                    <?php echo $data_keluarga['jk']; ?>
                                </td>
                                <td class="isitabel satu">
								<?php
									$tanggal_kelahiran = new DateTime($data_keluarga['kelahiran']);
									
									$bulan_inggris = array(
										'January' => 'Januari',
										'February' => 'Februari',
										'March' => 'Maret',
										'April' => 'April',
										'May' => 'Mei',
										'June' => 'Juni',
										'July' => 'Juli',
										'August' => 'Agustus',
										'September' => 'September',
										'October' => 'Oktober',
										'November' => 'November',
										'December' => 'Desember'
									);

									$formatted_date = strtr($tanggal_kelahiran->format('j F Y'), $bulan_inggris);
									echo $formatted_date;
									?>
                                </td>
                                <td class="isitabel satu">
								<?php
if (!empty($data_keluarga['perkawinan']) && !empty($data_keluarga['tgl_perkawinan'])) {
    $tgl_perkawinan = $data_keluarga['tgl_perkawinan'];
    $tgl_perkawinan_format = date("d F Y", strtotime($tgl_perkawinan));
    $bulan_inggris = array('January', 
                        'February', 
                        'March', 
                        'April', 
                        'May', 
                        'June', 
                        'July', 
                        'August', 
                        'September', 
                        'October', 
                        'November', 
                        'December');
    $bulan_indonesia = array('Januari', 
                        'Februari', 
                        'Maret', 
                        'April', 
                        'Mei', 
                        'Juni', 
                        'Juli', 
                        'Agustus', 
                        'September', 
                        'Oktober', 
                        'November', 
                        'Desember');
    $tgl_perkawinan_format = str_replace($bulan_inggris, $bulan_indonesia, $tgl_perkawinan_format);

    echo $data_keluarga['perkawinan'] . ', ' . $tgl_perkawinan_format;
} else {
    echo '-';
}
?>

                                </td>
                                <td class="isitabel satu">
								<?php
if (!empty($data_keluarga['pekerjaan'])) {
    echo $data_keluarga['pekerjaan'];
} else {
    echo '-';
}
?>

                                </td>
								<td class="isitabel satu">
                                    <?php echo $data_keluarga['keterangan']; ?>
                                </td>
								<td class="isitabel satu">
								<?php
if (!empty($data_keluarga['lainnya'])) {
    $tgl_keterangan = isset($data_keluarga['tgl_keterangan']) ? $data_keluarga['tgl_keterangan'] : '';

    if (!empty($tgl_keterangan)) {
        $tgl_keterangan_format = date("d F Y", strtotime($tgl_keterangan));
        $bulan_inggris = array(
            'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'
        );
        $bulan_indonesia = array(
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        );
        $tgl_keterangan_format = str_replace($bulan_inggris, $bulan_indonesia, $tgl_keterangan_format);

        echo $data_keluarga['lainnya'] . ', ' . $tgl_keterangan_format;
    } else {
        echo $data_keluarga['lainnya'];
    }
} else {
    echo '';
}
?>

                                </td>
                            </tr>
                        <?php
                        }
                        ?>
		</tbody>
					</table>
            </div>
        </div>
	</div>
	<script>
		window.print();
	</script>

</body>

</html>
</body>
</html>