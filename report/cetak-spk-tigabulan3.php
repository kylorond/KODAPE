<?php
	include "../inc/koneksi.php";
	
	$nip = $_GET['nip'];

	$sql_cek = "SELECT * FROM tb_spk WHERE nip='$nip' ORDER BY created_at DESC";
	$query_cek = mysqli_query($koneksi, $sql_cek);
	$data_spk = mysqli_fetch_array($query_cek,MYSQLI_BOTH);

	// $sql_cek = "SELECT * FROM tb_pegawaisatpolpp Where status_kepegawaian='Tenaga Kontrak'";
	// $query_cek = mysqli_query($koneksi, $sql_cek);
	// $data = mysqli_fetch_array($query_cek,MYSQLI_BOTH);

	$sql_cek = "SELECT * FROM tb_profilinstansi";
	$query_cek = mysqli_query($koneksi, $sql_cek);
	$data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CETAK SPK JULI - SEPTEMBER</title>
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
		<h2 class="tengah">
			<u>PERJANJIAN KERJA</u>
		</h2>
		<h3 class="tengah">Nomor :  <?php echo $data_spk['kode_surat']; ?>/<?php echo $data_spk['no_surat']; ?>/Sekr.3/POL.PP</h3>
		</td>
		<p>Pada hari ini <span class="bold italic">
		<?php
		setlocale(LC_TIME, 'id_ID');
		$hariInggris = strftime('%A');
		$hariIndonesia = '';
		switch ($hariInggris) {
			case 'Monday':
				$hariIndonesia = 'Senin';
				break;
			case 'Tuesday':
				$hariIndonesia = 'Selasa';
				break;
			case 'Wednesday':
				$hariIndonesia = 'Rabu';
				break;
			case 'Thursday':
				$hariIndonesia = 'Kamis';
				break;
			case 'Friday':
				$hariIndonesia = 'Jumat';
				break;
			case 'Saturday':
				$hariIndonesia = 'Sabtu';
				break;
			case 'Sunday':
				$hariIndonesia = 'Minggu';
				break;
			default:
				$hariIndonesia = 'Hari tidak valid';
		}
		echo $hariIndonesia;
		?></span> tanggal <span class="bold italic"><?php
		setlocale(LC_TIME, 'id_ID');
		$tanggal = strftime('%d');
		echo $tanggal;
		?></span> 
				bulan <span class="bold italic"><?php
		setlocale(LC_TIME, 'id_ID');
		$bulanInggris = strftime('%B');
		$bulanIndonesia = '';
		switch ($bulanInggris) {
			case 'January':
				$bulanIndonesia = 'Januari';
				break;
			case 'February':
				$bulanIndonesia = 'Februari';
				break;
			case 'March':
				$bulanIndonesia = 'Maret';
				break;
			case 'April':
				$bulanIndonesia = 'April';
				break;
			case 'May':
				$bulanIndonesia = 'Mei';
				break;
			case 'June':
				$bulanIndonesia = 'Juni';
				break;
			case 'July':
				$bulanIndonesia = 'Juli';
				break;
			case 'August':
				$bulanIndonesia = 'Agustus';
				break;
			case 'September':
				$bulanIndonesia = 'September';
				break;
			case 'October':
				$bulanIndonesia = 'Oktober';
				break;
			case 'November':
				$bulanIndonesia = 'November';
				break;
			case 'December':
				$bulanIndonesia = 'Desember';
				break;
			default:
				$bulanIndonesia = 'Bulan tidak valid';
		}
		echo $bulanIndonesia;
		?></span> Tahun <span class="bold italic">
			<?php
		function ejaTahun($tahun) {
			$angka = array(
				0 => 'Nol',
				1 => 'Satu',
				2 => 'Dua',
				3 => 'Tiga',
				4 => 'Empat',
				5 => 'Lima',
				6 => 'Enam',
				7 => 'Tujuh',
				8 => 'Delapan',
				9 => 'Sembilan'
			);

			$tahunStr = strval($tahun);
			$tahunEjaan = '';

			$ribuan = intval($tahunStr[0]);
			if ($ribuan > 0) {
				$tahunEjaan .= $angka[$ribuan] . ' Ribu ';
			}

			$ratusan = intval($tahunStr[1]);
			if ($ratusan > 0) {
				$tahunEjaan .= $angka[$ratusan] . ' Ratus ';
			}

			$puluhan = intval($tahunStr[2]);
			$satuan = intval($tahunStr[3]);

			if ($puluhan > 1) {
				$tahunEjaan .= $angka[$puluhan] . ' Puluh ';
				if ($satuan > 0) {
					$tahunEjaan .= $angka[$satuan] . ' ';
				}
			} elseif ($puluhan == 1) {
				$tahunEjaan .= 'Sebelas';
			} elseif ($satuan > 0) {
				$tahunEjaan .= $angka[$satuan] . ' ';
			}

			return trim($tahunEjaan);
		}

		$tahun = date("Y");
		$ejaanTahun = ejaTahun($tahun);

		echo "$ejaanTahun";
		?>
</span>, 
			yang bertanda tangan di bawah ini masing-masing :</p>
    <table cellspacing="0" style="width: 100%">
		<tbody>
			<tr class="justify">
				<td style="width: 5%;">1.</td>
				<td style="width: 39;">Nama</td>
				<td style="width: 2%;">:</td>
				<td style="width: 54%;"><span class="bold"><?php echo $data_cek['kepala']; ?></span></td>
			</tr>
			<tr class="justify">
				<td style="width: 5%;"></td>
				<td style="width: 39%;">Jabatan</td>
				<td style="width: 2%;">:</td>
				<td style="width: 54%;">Kepala Satuan Polisi Pamong Praja Provinsi Kalimantan Tengah 
					selaku Kuasa Pengguna Anggaran Dokumen Pelaksanaan Anggaran Satuan 
					Kerja Perangkat Daerah (DPA-SKPD) Tahun Anggaran <?php
					setlocale(LC_TIME, 'id_ID');
					$tahun = strftime('%Y');
					echo $tahun;?>
				</td>
			</tr>
			<tr class="justify">
				<td style="width: 5%;"></td>
				<td style="width: 39%;">Alamat</td>
				<td style="width: 2%;">:</td>
				<td style="width: 54%;">Jalan Yos Sudarso No. 008 Palangka Raya, Kalimantan Tengah</td>
			</tr>
		</tbody>
		<tbody>
			<tr>
				<td><br></td>
			</tr>
		</tbody>
		<tbody>
			<span>
				<tr class="justify">
				<td style="width: 5%;"></td>
				<td>Selanjutnya di sebut <span class="bold">PIHAK KESATU</span></td>
			</tr>
		</span>
		</tbody>
		<tbody>
			<tr>
				<td><br></td>
			</tr>
		</tbody>
		<tbody>
			<tr class="justify">
				<td style="width: 5%;">2.</td>
				<td style="width: 39;">Nama</td>
				<td style="width: 2%;">:</td>
				<td style="width: 54%;"><span class="bold"><?php echo $data_spk['nama']; ?></span></td>
			</tr>
			<tr class="justify">
				<td style="width: 5%;"></td>
				<td style="width: 39%;">NRPK</td>
				<td style="width: 2%;">:</td>
				<td style="width: 54%;"><?php echo $data_spk['nip']; ?></td>
			</tr>
			<tr class="justify">
				<td style="width: 5%;"></td>
				<td style="width: 39%;">Pendidikan Terakhir</td>
				<td style="width: 2%;">:</td>
				<td style="width: 54%;"><?php echo $data_spk['pendidikan']; ?> <?php echo $data_spk['jurusan']; ?></td>
			</tr>
			<tr class="justify">
				<td style="width: 5%;"></td>
				<td style="width: 39%;">Alamat</td></td>
				<td style="width: 2%;">:</td>
				<td style="width: 54%;"><?php echo $data_spk['alamat']; ?></td>
			</tr>
		</tbody>
		<tbody>
			<tr>
				<td><br></td>
			</tr>
		</tbody>
		<tbody>
			<span>
				<tr class="justify">
				<td style="width: 5%;"></td>
				<td>Selanjutnya di sebut <span class="bold">PIHAK KEDUA</span></td>
			</tr>
		</span>
		</tbody>
		<tbody>
			<tr>
				<td><br></td>
			</tr>
		</tbody>
	</table>
	<p class="justify"><span class="bold">PIHAK KESATU</span> dan <span class="bold">PIHAK KEDUA</span> 
	sepakat mengadakan Perjanjian Kerja 
			dengan sistem <span class="bold">Kontrak</span> pada Satuan Polisi Pamong Praja 
			Provinsi Kalimantan Tengah, selanjutnya disebut Perjanjian, dengan ketentuan 
			dan syarat-syarat sebagai berikut : </p>
			<br>
			<h2 class="tengah">Pasal 1</h2>
			<h2 class="tengah">DASAR PERJANJIAN KERJA</h2>
			<br>
			<table>
			<tbody style="width: 100%;">
			<tr class="justify">
				<td style="width: 5%;">(1).</td>
				<td style="width: 95%;">Peraturan Daerah Provinsi Kalimantan Tengah Nomor 
				7 Tahun 2022 tentang Penetapan Anggaran Pendapatan dan Belanja Daerah Provinsi Kalimantan Tengah, 
				Tahun Anggaran <?php
					setlocale(LC_TIME, 'id_ID');
					$tahun = strftime('%Y');
					echo $tahun;?>;</td>
			</tr>
			<tr class="justify">
				<td style="width: 5%;">(2).</td>
				<td style="width: 95%;">Peraturan Gubernur Kalimantan Tengah Nomor 47 Tahun 2022 tentang 
				Penjabaran Anggaran Pendapatan dan Belanja Daerah Provinsi Kalimantan Tengah Tahun Anggaran <?php
					setlocale(LC_TIME, 'id_ID');
					$tahun = strftime('%Y');
					echo $tahun;?>;</td>
			</tr>
			<tr class="justify">
				<td style="width: 5%;">(3).</td>
				<td style="width: 95%;">Peraturan Gubernur Kalimantan Tengah Nomor 34 Tahun 2016 tentang 
				Kedudukan, Susunan Organisasi,Tugas,Fungsi dan Tata Kerja Satuan Polisi Pamong Praja Provinsi Kalimantan Tengah;</td>
			</tr>
			<tr class="justify">
				<td style="width: 5%;">(4).</td>
				<td style="width: 95%;">Peraturan Gubernur Kalimantan Tengah Nomor 17 Tahun 2022 tentang Standar Harga 
				Satuan yang Berbasis Aplikasi Sistem Informasi Pemerintah Daerah Tahun 2023 (Berita Daerah Provinsi Kalimantan 
				Tengah Tahun 2022);</td>
			</tr>
			<tr class="justify">
				<td style="width: 5%;">(5).</td>
				<td style="width: 95%;">Keputusan Gubernur Kalimantan Tengah Nomor : 188.44/530DPA-SKPD/2022 tanggal 
				29 Desember 2022 tentang DPA-SKPD Satuan Polisi Pamong Praja Provinsi Kalimantan Tengah;</td>
			</tr>
			<tr class="justify">
				<td style="width: 5%;">(6).</td>
				<td style="width: 95%;">Surat Sekretaris Daerah Provinsi Kalimantan Tengah Nomor 800/362/II.7/BKD tanggal 
				16 Desember 2022 hal Perpanjangan Pegawai Pemerintah Non Pegawai Negeri (PPNPN) Tahun Anggaran 2023.</td>
			</tr>
			</tbody>
			</table>
			<br>
			<h2 class="tengah">Pasal 2</h2>
			<h2 class="tengah">BENTUK PERJANJIAN KERJA</h2>
			<br>
			<p class="justify">Bentuk perjanjian kerja yang dilaksanakan oleh <span class="bold">PARA PIHAK</span> adalah 
			bentuk pekerjaan yang bersifat Umum.</p>
			<br>
			<h2 class="tengah">Pasal 3</h2>
			<h2 class="tengah">JANGKA WAKTU PEKERJAAN DAN JAM KERJA</h2>
			<br>
			<table>
			<tbody style="width: 100%;">
			<tr class="justify">
				<td style="width: 5%;">(1).</td>
				<td style="width: 95%;"><span class="bold">PIHAK KEDUA</span> melaksanakan pekerjaan sebagai 
				<span class="bold">Anggota Polisi Pamong Praja </span>
				pada Satuan Polisi Pamong Praja Provinsi Kalimantan Tengah 
				terhitung sejak tanggal <span class="bold"><?php
				$bulan = array(
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
				$tanggalAwalTahun = date("d F Y", strtotime(date("Y-07-01")));
				$tanggalAwalTahun = strtr($tanggalAwalTahun, $bulan);
				echo $tanggalAwalTahun;
				?>

				</span>
				sampai dengan tanggal <span class="bold"><?php
				$bulan = array(
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
				$tanggalAkhirTahun = date("d F Y", strtotime(date("Y-09-30")));
				$tanggalAkhirTahun = strtr($tanggalAkhirTahun, $bulan);
				echo $tanggalAkhirTahun;
				?></span>;</td>
			</tr>
			<tr class="justify">
				<td style="width: 5%;">(2).</td>
				<td style="width: 95%;">Hari kerja dan Jam kerja <span class="bold">PIHAK KEDUA </span>
				diatur sesuai dengan keperluan pelayanan pada Satuan Polisi Pamong Praja Provinsi Kalimantan Tengah.</td>
			</tr>
			</tbody>
			</table>
			<br>
			<h2 class="tengah">Pasal 4</h2>
			<h2 class="tengah">HAK DAN KEWAJIBAN</h2>
			<br>
			<table>
			<tbody style="width: 100%;">
			<tr class="justify">
				<td style="width: 5%;">(1).</td>
				<td style="width: 95%;"><span class="bold">HAK</span></td>
			</tr>
			<table>
				<tbody>
			<tr class="justify" style="width: 100%;">
				<td style="width: 5%;"></td>
				<td style="width: 5%;">a.</td>
				<td style="width: 90%;"><span class="bold">PIHAK KEDUA</span> berhak mendapatkan penghasilan setiap bulan sebesar 
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

$gaji = $data_spk['gaji'];
$terbilang_gaji = terbilang($gaji);

echo '<span class="bold">Rp ' . number_format($gaji, 0, ',', '.') . ' (' . $terbilang_gaji . ' Rupiah)</span>';
?>
 dan dibebankan pada DPA-SKPD Satuan Polisi Pamong Praja 
				Provinsi Kalimantan Tengah Program <span class="bold">Pelayanan Administrasi Perkantoran</span>, Kegiatan <span class="bold">Penyediaan Jasa Tenaga 
				Kontrak</span> dengan kode rekening <span class="bold"><?php echo $data_spk['no_rek']; ?>;</span></td>
			</tr>
			<tr class="justify" style="width: 100%;">
				<td style="width: 5%;"></td>
				<td style="width: 5%;">b.</td>
				<td style="width: 90%;">Apabila <span class="bold">PIHAK KEDUA</span> dikarenakan tugas melakukan perjalanan dinas luar daerah, yang bersangkutan 
				mendapatkan tambahan penghasilan sesuai ketentuan yang berlaku;</td>
			</tr>
			<tr class="justify" style="width: 100%;">
				<td style="width: 5%;"></td>
				<td style="width: 5%;">c.</td>
				<td style="width: 90%;"><span class="bold">PIHAK KEDUA</span> berhak mendapat Cuti Melahirkan maupun Cuti Alasan Penting sesuai dengan ketentuan kepegawaian. 
				<span class="bold">(Perka BKN No.24 Tahun 2017 Tanggal 22 Desember 2017);</span></td>
			</tr>
			<tr class="justify" style="width: 100%;">
				<td style="width: 5%;"></td>
				<td style="width: 5%;">d.</td>
				<td style="width: 90%;"><span class="bold">PIHAK KEDUA</span> dalam hal yang sangat penting dan mendesak dapat meminta izin kepada Pimpinan Unit Kerja paling 
				lama 3 (tiga) hari kerja, dengan melengkapi alasan yang sah;</td>
			</tr>
			<tr class="justify" style="width: 100%;">
				<td style="width: 5%;"></td>
				<td style="width: 5%;">e.</td>
				<td style="width: 90%;"><span class="bold">PIHAK KEDUA</span> dalam hal izin dengan alasan apapun wajib mendapatkan izin tertulis dari pimpinan. </td>
			</tr>
			</tbody>
			</table>
			<table>
			<tbody style="width: 100%;">
			<tr class="justify">
				<td style="width: 5%;">(2).</td>
				<td style="width: 95%;"><span class="bold">KEWAJIBAN</span></td>
			</tr>
			<table>
				<tbody>
			<tr class="justify" style="width: 100%;">
				<td style="width: 5%;"></td>
				<td style="width: 5%;">a.</td>
				<td style="width: 90%;"><span class="bold">PIHAK KEDUA</span> melaksanakan tugas membantu Kepala Satuan Polisi Pamong Praja Provinsi Kalimantan Tengah 
				dalam Penegakan Peraturan Daerah, Penegakan Peraturan Gubernur, menyelenggarakan Ketertiban Umum, Ketentraman Masyarakat, Perlindungan Masyarakat, Pengamanan Kantor Gubernur, Pejabat Pemerintah Provinsi, Aset Pemerintah Provinsi Kalimantan Tengah maupun melaksanakan tugas-tugas lainnya atas Perintah Atasan</td>
			</tr>
			<tr class="justify" style="width: 100%;">
				<td style="width: 5%;"></td>
				<td style="width: 5%;">b.</td>
				<td style="width: 90%;"><span class="bold">PIHAK KEDUA</span> wajib melaksanakan Tugas Rutin Kantor dan Kegiatan Lapangan setiap hari kerja selama lebih kurang 7,5 Jam/Hari atau 37,5 Jam/Minggu;</td>
			</tr>
			<tr class="justify" style="width: 100%;">
				<td style="width: 5%;"></td>
				<td style="width: 5%;">c.</td>
				<td style="width: 90%;"><span class="bold">PIHAK KEDUA</span> wajib mengikuti apel pagi dan apel sore serta melakukan absensi elektronik setiap pagi dan sore sesuai ketentuan yang berlaku;</td>
			</tr>
			<tr class="justify" style="width: 100%;">
				<td style="width: 5%;"></td>
				<td style="width: 5%;">d.</td>
				<td style="width: 90%;">Dalam melaksanakan tugas <span class="bold">PIHAK KEDUA</span> wajib :</td>
				<table>
				<tbody>
					<tr class="justify" style="width: 100%;">
						<td style="width: 5%;"></td>
						<td style="width: 5%;"></td>
						<td style="width: 5%;"></td>
						<td style="width: 5%;">1.</td>
						<td style="width: 80%;">Menggunakan atribut dan pakaian dinas lengkap.</td>
					</tr>
					<tr>
						<td style="width: 5%;"></td>
						<td style="width: 5%;"></td>
						<td style="width: 5%;"></td>
						<td style="width: 5%;">2.</td>
						<td style="width: 80%;">Menggunakan atribut dan pakaian dinas lengkap.</td>
					</tr>
				</tbody>
			</table>
			</tr>
			<table>
				<tbody>
				<tr class="justify" style="width: 100%;">
				<td style="width: 5%;"></td>
				<td style="width: 5%;">e.</td>
				<td style="width: 90%;"><span class="bold">PIHAK KEDUA</span> dalam hal izin dengan alasan apapun wajib mendapatkan izin tertulis dari pimpinan. </td>
			</tr>
				</tbody>
			</table>
			</tbody>
			</table>
			</tbody>
			</table>
			<br>
			<h2 class="tengah">Pasal 5</h2>
			<h2 class="tengah">SANKSI DAN PEMUTUSAN HUBUNGAN KERJA</h2>
			<br>
			<table>
			<tbody style="width: 100%;">
			<tr class="justify">
				<td style="width: 5%;">(1).</td>
				<td style="width: 95%;">Setiap ketidakhadiran <span class="bold">PIHAK KEDUA</span> pada hari kerja tanpa keterangan atau tanpa seizin/persetujuan 
				dari <span class="bold">PIHAK KESATU</span> atau Sekretaris/Kepala Bidang atau Kepala Sub Bagian  yang membidangi maka akan dikenakan 
				pemotongan sebesar 4% per hari dari besarnya penghasilan setiap bulan, sebagaimana dimaksud pada pasal 4 ayat (1);</td>
			</tr>
			<tr class="justify">
				<td style="width: 5%;">(2).</td>
				<td style="width: 95%;"><span class="bold">PIHAK KESATU</span> berhak memutuskan hubungan kerja secara sepihak dengan 
				<span class="bold">PIHAK KEDUA</span> sebelum masa kontrak berakhir, 
				apabila <span class="bold">PIHAK KEDUA</span> :</td>
			</tr>
			<table>
				<tbody>
				<tr class="justify" style="width: 100%;">
				<td style="width: 5%;"></td>
				<td style="width: 5%;">a.</td>
				<td style="width: 90%;">Tidak melaksanakan tugas selama 15 (lima belas) hari kerja atau tidak melaksanakan tugas sesuai dengan Surat Perintah Tugas (SPT) dari Kepala Satuan Polisi Pamong Praja Provinsi Kalimantan Tengah selama 15 (lima belas) kali tanpa pemberitahuan kepada atasan langsung 
				secara kumulatif selama 1 (satu) tahun.</td>
			</tr>
			<tr class="justify" style="width: 100%;">
				<td style="width: 5%;"></td>
				<td style="width: 5%;">b.</td>
				<td style="width: 90%;">Terbukti secara sah terlibat kasus tindakan kriminal, perbuatan asusila, pengguna obat-obatan terlarang, pengedar obat-obatan terlarang, perjudian, melakukan pemerasan dan Pungutan Liar (Pungli) yang dapat mencemarkan nama baik Satuan Polisi Pamong Praja dan 
				Pemerintah Provinsi Kalimantan Tengah.</td>
			</tr>
			<tr class="justify" style="width: 100%;">
				<td style="width: 5%;"></td>
				<td style="width: 5%;">c.</td>
				<td style="width: 90%;">Apabila PIHAK KEDUA tidak mengikuti apel pagi dan apel sore, tidak mentaati jam kerja, maka dianggap tidak masuk kerja selama 1 (satu) hari.</td>
			</tr>
				</tbody>
			</table>
			<table>
			<tbody style="width: 100%;">
			<tr class="justify">
				<td style="width: 5%;">(3).</td>
				<td style="width: 95%;">Pemutusan hubungan kerja sebagaimana dimaksud pada ayat (2) dapat dilakukan <span class="bold">tanpa menggunakan teguran tertulis I, II dan III maupun 
				persetujuan dan pemberitahuan kepada PIHAK KEDUA; </span></td>
			</tr>
			<tr class="justify">
				<td style="width: 5%;">(4).</td>
				<td style="width: 95%;">Hubungan kerja <span class="bold">PIHAK KESATU</span> dengan <span class="bold">PIHAK KEDUA</span> secara otomatis berakhir dengan berakhirnya Surat Perjanjian Kerja ini, dan apabila dibutuhkan 
				dapat diperpanjang melalui Surat Perjanjian Kerja baru.</td>
			</tr>
			</tbody>
			</table>
			</tbody>
			</table>
			<br>
			<h2 class="tengah">Pasal 6</h2>
			<h2 class="tengah">LAIN - LAIN</h2>
			<br>
			<p class="justify">Selama dalam kerjasama <span class="bold">PIHAK KEDUA</span> tidak mempunyai hak meminta atau menuntut untuk diangkat menjadi 
			<span class="bold">Calon Pegawai Negeri Sipil Daerah (CPNSD)</span> kepada <span class="bold">PIHAK KESATU.</span></p>
			<br>
			<br>
			<h2 class="tengah">Pasal 7</h2>
			<h2 class="tengah">PENUTUP</h2>
			<br>
			<p class="justify">Demikian Surat Perjanjian Kerja ini dibuat rangkap 2 (dua) dan ditandatangani masing-masing pihak di atas meterai sesuai ketentuan yang berlaku serta mempunyai kekuatan hukum yang sama. Apabila dikemudian hari terdapat kekeliruan 
				dalam Surat Perjanjian Kerja ini, akan diadakan perbaikan sebagaimana mestinya.</p>
			<br>
			<br>
			<br>
			<table align="center">
		<tbody style="width: 90%;">
			<tr class="justify">
				<td style="width: 37%;"><span class="bold">PIHAK KEDUA,</span></td>
				<td style="width: 16%;"></td>
				<td style="width: 37%;"><span class="bold">PIHAK KESATU,</span></td>
			</tr>
			<tr class="justify">
				<td style="width: 37%;"><span class="bold">TENAGA KONTRAK</span></td>
				<td style="width: 16%;"></td>
				<td style="width: 37%;"><span class="bold">KEPALA SATUAN</span></td>
			</tr>
			<tr class="justify">
				<td style="width: 37%;"></td>
				<td style="width: 16%;"></td>
				<td style="width: 37%;"><span class="bold"></td>
			</tr>
			<tr class="justify">
				<td style="width: 37%;"></td>
				<td style="width: 16%;"></td>
				<td style="width: 37%;"><span class="bold"></td>
			</tr>	
			<tr class="justify">
				<td style="width: 37%;"></td>
				<td style="width: 16%;"></td>
				<td style="width: 37%;"><span class="bold"></td>
			</tr>	
			<tr class="justify">
				<td style="width: 37%;"></td>
				<td style="width: 16%;"></td>
				<td style="width: 37%;"><span class="bold"></td>
			</tr>	
			<tr class="justify">
				<td style="width: 37%;"></td>
				<td style="width: 16%;"></td>
				<td style="width: 37%;"><span class="bold"></td>
			</tr>	
			<tr class="justify">
				<td style="width: 37%;"></td>
				<td style="width: 16%;"></td>
				<td style="width: 37%;"><span class="bold"></td>
			</tr>	
			<tr class="justify">
				<td style="width: 37%;"></td>
				<td style="width: 16%;"></td>
				<td style="width: 37%;"><span class="bold"></td>
			</tr>
			<tr class="justify">
				<td style="width: 37%;"></td>
				<td style="width: 16%;"></td>
				<td style="width: 37%;"><span class="bold"></td>
			</tr>	
			<tr class="justify">
				<td style="width: 37%;"></td>
				<td style="width: 16%;"></td>
				<td style="width: 37%;"><span class="bold"></td>
			</tr>	
			<tr class="justify">
				<td style="width: 37%;"></td>
				<td style="width: 16%;"></td>
				<td style="width: 37%;"><span class="bold"></td>
			</tr>	
			<tr class="justify">
				<td style="width: 37%;"></td>
				<td style="width: 16%;"></td>
				<td style="width: 37%;"><span class="bold"></td>
			</tr>	
			<tr class="justify">
				<td style="width: 37%;"></td>
				<td style="width: 16%;"></td>
				<td style="width: 37%;"><span class="bold"></td>
			</tr>	
			<tr class="justify">
				<td style="width: 37%;"></td>
				<td style="width: 16%;"></td>
				<td style="width: 37%;"><span class="bold"></td>
			</tr>	
			<tr class="justify">
				<td style="width: 37%;"></td>
				<td style="width: 16%;"></td>
				<td style="width: 37%;"><span class="bold"></td>
			</tr>	
			<tr class="justify">
				<td style="width: 37%;"></td>
				<td style="width: 16%;"></td>
				<td style="width: 37%;"><span class="bold"></td>
			</tr>	
			<tr class="justify">
				<td style="width: 37%;"></td>
				<td style="width: 16%;"></td>
				<td style="width: 37%;"><span class="bold"></td>
			</tr>	
			<tr class="justify">
				<td style="width: 37%;"></td>
				<td style="width: 16%;"></td>
				<td style="width: 37%;"><span class="bold"></td>
			</tr>	
			<tr class="justify">
				<td style="width: 37%;"></td>
				<td style="width: 16%;"></td>
				<td style="width: 37%;"><span class="bold"></td>
			</tr>	
			<tr class="justify">
				<td style="width: 37%;"></td>
				<td style="width: 16%;"></td>
				<td style="width: 37%;"><span class="bold"></td>
			</tr>
			<tr class="justify">
				<td style="width: 37%;"></td>
				<td style="width: 16%;"></td>
				<td style="width: 37%;"><span class="bold"></td>
			</tr>						
			<tr class="justify">
				<td style="width: 37%;"></td>
				<td style="width: 16%;"></td>
				<td style="width: 37%;"><span class="bold"></td>
			</tr>	
			<tr class="justify">
				<td style="width: 37%;"></td>
				<td style="width: 16%;"></td>
				<td style="width: 37%;"><span class="bold"></td>
			</tr>	
			<tr class="justify">
				<td style="width: 37%;"></td>
				<td style="width: 16%;"></td>
				<td style="width: 37%;"><span class="bold"></td>
			</tr>	
			<tr class="justify">
				<td style="width: 37%;"></td>
				<td style="width: 16%;"></td>
				<td style="width: 37%;"><span class="bold"></td>
			</tr>	
			<tr class="justify">
				<td style="width: 37%;"></td>
				<td style="width: 16%;"></td>
				<td style="width: 37%;"><span class="bold"></td>
			</tr>	
			<tr class="justify">
				<td style="width: 37%;"></td>
				<td style="width: 16%;"></td>
				<td style="width: 37%;"><span class="bold"></td>
			</tr>	
			<tr class="justify">
				<td style="width: 37%;"></td>
				<td style="width: 16%;"></td>
				<td style="width: 37%;"><span class="bold"></td>
			</tr>	
			<tr class="justify">
				<td style="width: 37%;"></td>
				<td style="width: 16%;"></td>
				<td style="width: 37%;"><span class="bold"></td>
			</tr>
			<tr class="justify">
				<td style="width: 37%;"><span class="bold"><?php echo $data_spk['nama']; ?></span></td>
				<td style="width: 16%;"></td>
				<td style="width: 37%;"><span class="bold"><?php echo $data_cek['kepala']; ?></td>
			</tr>
			<tr class="justify">
				<td style="width: 37%;"><?php echo $data_spk['nip']; ?></td>
				<td style="width: 16%;"></td>
				<td style="width: 37%;">Pembina Utama Madya</td>
			</tr>
			<tr class="justify">
				<td style="width: 37%;"></td>
				<td style="width: 16%;"></td>
				<td style="width: 37%;">NIP. <?php echo $data_cek['nip']; ?></td>
			</tr>
		</tbody>
			</table>

	<script>
		window.print();
	</script>

</body>

</html>
</body>
</html>