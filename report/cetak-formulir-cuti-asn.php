<?php
	include "../inc/koneksi.php";
	$nip = $_GET['nip'];
    $sql_cek = "SELECT * FROM tb_cuti WHERE nip='$nip' ORDER BY created_at DESC";
	$query_cek = mysqli_query($koneksi, $sql_cek);
	$data_cuti = mysqli_fetch_array($query_cek,MYSQLI_BOTH);

	$sql_cek = "SELECT * FROM tb_pegawaisatpolpp Where status_kepegawaian='Pegawai'";
	$query_cek = mysqli_query($koneksi, $sql_cek);
	$data = mysqli_fetch_array($query_cek,MYSQLI_BOTH);

	$sql_cek = "SELECT * FROM tb_profilinstansi";
	$query_cek = mysqli_query($koneksi, $sql_cek);
	$data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CETAK FORMULIR CUTI PEGAWAI</title>
    <style type="text/css">
        body {font-family:arial; background-color:white}
		td{font-size: 20px;}
        .rangkasurat {width: 980px; margin:0 auto; background-color: white; height: 500px; padding: 20px;}
        .kop{border-bottom: 5px solid black; padding: 2px;}
        .tengah{text-align: center; line-height: 6px;}
		span.biru{color: blue; text-decoration: underline;}
		p{font-size: 20px; text-align: justify}
		.justify{text-align: justify; vertical-align: baseline;}
		span.bold{font-weight: bold;}
		span.italic{font-style: italic;}
		/* tbody{border: none;} */
		/* tr{border: none;} */
		td{font-size: medium;}
        .isitabel {
            border-collapse: collapse;
            font-size: medium;
            font-weight: 40;
        }
    </style>
</head>
<body>
    <div class="rangkasurat">
        <table style="width: 100%; text-align: justify;;">
        <tr>
            <td style="width: 33%;"></td>
            <td style="width: 33%;"></td>
            <td style="width: 34%;">Palangka Raya, <?php
                setlocale(LC_TIME, 'id_ID'); 
                $bulanInggris = array(
                    'January', 'February', 'March', 'April', 'May', 'June', 'July',
                    'August', 'September', 'October', 'November', 'December'
                );
                $bulanIndonesia = array(
                    'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli',
                    'Agustus', 'September', 'Oktober', 'November', 'Desember'
                );
                $tanggal_sekarang = strftime('%d %B %Y');
                $tanggal_sekarang = str_replace($bulanInggris, $bulanIndonesia, $tanggal_sekarang);
                echo $tanggal_sekarang; 
                ?>
            </td>
        </tr>
    </table>
    <br>
    <table style="width: 100%; text-align: justify;">
        <tr>
            <td style="width: 33%;"></td>
            <td style="width: 33%;"></td>
            <td style="width: 34%;">Kepada</td>
        </tr>
        <tr>
            <td style="width: 33%;"></td>
            <td style="width: 33%;"></td>
            <td style="width: 34%;">Yth. Kepala Satuan Polisi Pamong Praja</td>
        </tr>
        <tr>
            <td style="width: 33%;"></td>
            <td style="width: 33%;"></td>
            <td style="width: 34%;">Provinsi Kalimantan Tengah</td>
        </tr>
        <tr>
            <td style="width: 33%;"></td>
            <td style="width: 33%;"></td>
            <td style="width: 34%;">Di -</td>
        </tr>
    </table>
    <table style="width: 100%; text-align: justify;">
    <tr>
            <td style="width: 36%;"></td>
            <td style="width: 35%;"></td>
            <td style="width: 29%;">Tempat</td>
        </tr>
    </table>
    <br>
    <h3 class="tengah"><span class="bold">FORMULIR PERMINTAAN DAN PEMBERIAN CUTI</span></h3>
    <br>
    <table class="isitabel" border="1px" cellpadding="3" style="width: 100%; border-bottom: none; ">
                    <thead>
                        <tr >
                            <td><span class="bold">I. DATA PEGAWAI</span></td>
                        </tr>
                    </thead>
                </table>
    <table class="isitabel" border="1px" cellpadding="3" style="width: 100%;">
                    <thead>
                        <tr >
                            <td style="width: 18%;">Nama</td>
                            <td style="width: 32%;"><?php echo $data_cuti['nama']; ?></td>
                            <td style="width: 18%;">NIP</td>
                            <td style="width: 32%;"><?php echo $data_cuti['nip']; ?></td>
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td>Jabatan</td>
                                <td><?php echo $data['jabatan']; ?></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Unit Kerja</td>
                                <td><?php echo $data['unit']; ?></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><?php echo $data['instansi']; ?></td>
                                <td></td>
                                <td></td>
                            </tr>
                    </tbody>
                </table>
                <br>
                <table class="isitabel" border="1px" cellpadding="3" style="width: 100%; border-bottom: none; ">
                    <thead>
                        <tr >
                            <td><span class="bold">II. JENIS CUTI YANG DIAMBIL</span></td>
                        </tr>
                    </thead>
                </table>
    <table class="isitabel" border="1px" cellpadding="3" style="width: 100%;">
                    <thead>
                        <tr >
                            <td style="width: 32%;">1. Cuti Tahunan</td>
                            <td style="width: 18%; text-align: center;"><?php
                                if ($data_cuti['jenis_cuti'] === 'Cuti Tahunan') {
                                    echo '✓';
                                } else {
                                    echo '';
                                }
                                ?>
                                </td>
                            <td style="width: 32%;">2. Cuti Besar</td>
                            <td style="width: 18%; text-align: center;"><?php
                                if ($data_cuti['jenis_cuti'] === 'Cuti Besar') {
                                    echo '✓';
                                } else {
                                    echo '';
                                }
                                ?></td>
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td>3. Cuti Sakit</td>
                                <td style="text-align: center;"><?php
                                if ($data_cuti['jenis_cuti'] === 'Cuti Sakit') {
                                    echo '✓';
                                } else {
                                    echo '';
                                }
                                ?></td>
                                <td>4. Cuti Melahirkan</td>
                                <td style="text-align: center;"><?php
                                if ($data_cuti['jenis_cuti'] === 'Cuti Melahirkan') {
                                    echo '✓';
                                } else {
                                    echo '';
                                }
                                ?></td>
                            </tr>
                            <tr>
                                <td>5. Cuti Karena Alasan Penting</td>
                                <td style="text-align: center;"><?php
                                if ($data_cuti['jenis_cuti'] === 'Cuti Karena Alasan Penting') {
                                    echo '✓';
                                } else {
                                    echo '';
                                }
                                ?></td>
                                <td>6. Cuti Diluar Tanggungan Negara</td>
                                <td style="text-align: center;"><?php
                                if ($data_cuti['jenis_cuti'] === 'Cuti Diluar Tanggungan Negara') {
                                    echo '✓';
                                } else {
                                    echo '';
                                }
                                ?></td>
                            </tr>
                    </tbody>
                </table>
                <br>
                <table class="isitabel" border="1px" cellpadding="3"  style="width: 100%; border-bottom: none; ">
                    <thead>
                        <tr >
                            <td><span class="bold">III. ALASAN CUTI</span></td>
                        </tr>
                    </thead>
                </table>
    <table class="isitabel" border="1px" cellpadding="3" style="width: 100%;">
                    <thead>
                        <tr >
                            <td style="width: 32%;"><?php echo $data_cuti['alasan_cuti']; ?></td>
                        </tr>
                    </thead>
                </table>
                <br>
                <table class="isitabel" border="1px" cellpadding="3" style="width: 100%; border-bottom: none; ">
                    <thead>
                        <tr >
                            <td><span class="bold">IV. LAMANYA CUTI</span></td>
                        </tr>
                    </thead>
                </table>
    <table class="isitabel" border="1px" cellpadding="3" style="width: 100%;">
                    <thead>
                        <tr >
                            <td style="width: 10%;">Selama</td>
                            <td style="width: 12%; text-align: center;"><?php
                                function countWorkingDays($startDate, $endDate) {
                                    $workingDays = 0;
                                    $currentDate = strtotime($startDate);
                                    $endDate = strtotime($endDate);
                                
                                    while ($currentDate <= $endDate) {
                                        $dayOfWeek = date('N', $currentDate); // Mendapatkan hari dalam format 1 (Senin) hingga 7 (Minggu)
                                        
                                        // Jika hari bukan Sabtu (6) atau Minggu (7), tambahkan ke jumlah hari kerja
                                        if ($dayOfWeek < 6) {
                                            $workingDays++;
                                        }
                                        
                                        $currentDate = strtotime('+1 day', $currentDate);
                                    }
                                
                                    return $workingDays;
                                }
                                
                                $mulai_cuti = $data_cuti['mulai_cuti'];
                                $sampai_cuti = $data_cuti['sampai_cuti'];
                                
                                // Menghitung jumlah hari kerja antara dua tanggal
                                $selisih_hari = countWorkingDays($mulai_cuti, $sampai_cuti);
                                
                                echo "" . $selisih_hari . " Hari";                                
                                ?>
                                </td>
                            <td style="width: 10%;">Mulai Tanggal</td>
                            <td style="width: 12%; text-align: center;"><?php
					$mulai_cuti = $data_cuti['mulai_cuti'];
					$mulai_cuti_format = date("d F Y", strtotime($mulai_cuti));
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
					$mulai_cuti_format = str_replace($bulan_inggris, $bulan_indonesia, $mulai_cuti_format);

					echo $mulai_cuti_format;
					?></td>
                            <td style="width: 5%; text-align: center;">s/d</td>
                            <td style="width: 12%; text-align: center;"><?php
					$sampai_cuti = $data_cuti['sampai_cuti'];
					$sampai_cuti_format = date("d F Y", strtotime($sampai_cuti));
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
					$sampai_cuti_format = str_replace($bulan_inggris, $bulan_indonesia, $sampai_cuti_format);

					echo $sampai_cuti_format;
					?></td>
                        </tr>
                    </thead>
                    <tbody>
                </table>
                <br>
                <table class="isitabel" border="1px"  style="width: 100%; border-bottom: none; ">
                    <thead>
                        <tr >
                            <td><span class="bold">V. CATATAN CUTI****</span></td>
                        </tr>
                    </thead>
                </table>
    <table class="isitabel" border="1px" cellpadding="3" style="width: 100%;">
                    <thead>
                        <tr >
                            <td style="width: 15%;">Tahun</td>
                            <td style="width: 15%; text-align: center;">Sisa</td>
                            <td style="width: 23%;">Keterangan</td>
                            <td style="width: 37%;">1. CUTI TAHUNAN</td>
                            <!-- <td style="width: 10%; text-align: center;"><?php
                                if ($data_cuti['jenis_cuti'] === 'Cuti Tahunan') {
                                    echo '✓';
                                } else {
                                    echo '';
                                }
                                ?></td> -->
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td>N-2</td>
                                <td style="text-align: center;"><?php
                                $sisaduatahun = $data_cuti['sisaduatahun'];

                                if (empty($sisaduatahun)) {
                                    echo '-';
                                } else {
                                    echo $sisaduatahun;
                                }
                                ?>
                                </td>
                                <td></td>
                                <td>2. CUTI BESAR</td>
                                <!-- <td style="text-align: center;"><?php
                                if ($data_cuti['jenis_cuti'] === 'Cuti Besar') {
                                    echo '✓';
                                } else {
                                    echo '';
                                }
                                ?></td> -->
                            </tr>
                            <tr>
                                <td>N-1</td>
                                <td style="text-align: center;"><?php
                                $sisasatutahun = $data_cuti['sisasatutahun'];

                                if (empty($sisasatutahun)) {
                                    echo '-';
                                } else {
                                    echo $sisasatutahun;
                                }
                                ?>
                                </td>
                                <td></td>
                                <td>3. CUTI SAKIT</td>
                                <!-- <td style="text-align: center;"><?php
                                if ($data_cuti['jenis_cuti'] === 'Cuti Sakit') {
                                    echo '✓';
                                } else {
                                    echo '';
                                }
                                ?></td> -->
                            </tr>
                            <tr>
                                <td>N</td>
                                <td style="text-align: center;"><?php echo $data_cuti['sisasekarang']; ?></td>
                                <td></td>
                                <td>4. CUTI MELAHIRKAN</td>
                                <!-- <td style="text-align: center;"><?php
                                if ($data_cuti['jenis_cuti'] === 'Cuti Melahirkan') {
                                    echo '✓';
                                } else {
                                    echo '';
                                }
                                ?></td> -->
                            </tr>
                </table>
                <table class="isitabel" border="1px" cellpadding="3" style="width: 100%; border-top: none;">
                    <thead>
                        <tr >
                            <td style="width: 53%;"></td>
                            <td style="width: 37%;"> 5. CUTI KARENA ALASAN PENTING</td>
                            <!-- <td style="width: 10%; text-align: center;"><?php
                                if ($data_cuti['jenis_cuti'] === 'Cuti Karena Alasan Penting') {
                                    echo '✓';
                                } else {
                                    echo '';
                                }
                                ?></td> -->
                        </tr>
                        <tr>
                                <td></td>
                                <td> 6. CUTI DILUAR TANGGUNGAN NEGARA</td>
                                <!-- <td style="text-align: center;"><?php
                                if ($data_cuti['jenis_cuti'] === 'Cuti Diluar Tanggungan Negara') {
                                    echo '✓';
                                } else {
                                    echo '';
                                }
                                ?></td> -->
                            </tr>
                    </thead>
                </table>
                <br>
                <table class="isitabel" border="1px" cellpadding="3" style="width: 100%; border-bottom: none; ">
                    <thead>
                        <tr >
                            <td><span class="bold">VI. ALAMAT SELAMA MENJALANKAN CUTI</span></td>
                        </tr>
                    </thead>
                </table>
    <table class="isitabel" border="1px" cellpadding="3" style="width: 100%;">
                    <thead>
                        <tr >
                            <td style="width: 40%;"><?php echo $data_cuti['alamat_cuti']; ?></td>
                            <td style="width: 25%;">TELEPON</td>
                            <td style="width: 35%;"><?php echo $data['no_telp']; ?></td>
                        </tr>
                    </thead>
                </table>
                <table class="isitabel" border="1px" cellpadding="3" style="width: 100%; border-top: none; ">
                    <thead>
                        <tr>
                            <td style="width: 40%;"></td>
                            <td style="width: 60%;"><p style="font-size: medium; text-align: center; margin: 0; padding: 0;">Hormat Saya,</p>
                        <br><br><p style="font-size: medium; text-align: center; margin: 0; padding: 0;"><?php echo $data_cuti['nama']; ?></p>
                        <p style="font-size: medium; text-align: center; margin: 0; padding: 0;">NIP. <?php echo $data_cuti['nip']; ?></p></td>
                        </tr>
                    </thead>
                </table>
                <br>
                <table class="isitabel" border="1px" cellpadding="3" style="width: 100%; border-bottom: none; ">
                    <thead>
                        <tr >
                            <td><span class="bold">VII. PERTIMBANGAN ATASAN LANGSUNG**</span></td>
                        </tr>
                    </thead>
                </table>
    <table class="isitabel" border="1px" cellpadding="3" style="width: 100%;">
                    <thead>
                        <tr >
                            <td style="width: 15%;">DISETUJUI</td>
                            <td style="width: 20%;">PERUBAHAN****</td>
                            <td style="width: 20%;">DITANGGUHKAN****</td>
                            <td style="width: 45%;">TIDAK DISETUJUI****</td>
                        </tr>
                        <tr >
                            <td style="width: 15%; text-align: center;">✓</td>
                            <td style="width: 20%;"></td>
                            <td style="width: 20%;"></td>
                            <td style="width: 45%;"></td>
                        </tr>
                    </thead>
                </table>
                <table class="isitabel" border="1px" cellpadding="3" style="width: 45%; border-top: none; float: right">
                    <tbody>
                        <tr >
                        <td style="width: 60%;"><p style="font-size: medium; text-align: center; margin: 0; padding: 0;"><?php echo $data_cuti['penyetuju']; ?></p>
                        <br><br><p style="font-size: medium; text-align: center; margin: 0; padding: 0;"><?php echo $data_cuti['nama_penyetuju']; ?></p>
                        <p style="font-size: medium; text-align: center; margin: 0; padding: 0;">NIP. <?php echo $data_cuti['nip_penyetuju']; ?></p></td>
                        </tr>
                    </tbody>
                </table>
                <br><br><br><br><br><br><br>
                <table class="isitabel" border="1px" cellpadding="3" style="width: 100%; border-bottom: none; ">
                    <thead>
                        <tr >
                            <td><span class="bold">VIII. KEPUTUSAN PEJABAT YANG BERWENANG MEMBERIKAN CUTI**</span></td>
                        </tr>
                    </thead>
                </table>
    <table class="isitabel" border="1px" cellpadding="3" style="width: 100%;">
                    <tbody>
                        <tr >
                            <td style="width: 15%;">DISETUJUI</td>
                            <td style="width: 20%;">PERUBAHAN****</td>
                            <td style="width: 20%;">DITANGGUHKAN****</td>
                            <td style="width: 45%;">TIDAK DISETUJUI****</td>
                        </tr>
                        <tr >
                            <td style="width: 15%; text-align: center;">✓</td>
                            <td style="width: 20%;"></td>
                            <td style="width: 20%;"></td>
                            <td style="width: 45%;"></td>
                        </tr>
                    </tbo>
                </table>
                <table class="isitabel" border="1px" cellpadding="3" style="width: 45%; border-top: none; float: right">
                    <thead>
                        <tr >
                        <td style="width: 60%;"><p style="font-size: medium; text-align: center; margin: 0; padding: 0;">Kepala Satuan Polisi Pamong Praja</p>
                        <p style="font-size: medium; text-align: center; margin: 0; padding: 0;">Provinsi Kalimantan Tengah</p>
                        <br><br><p style="font-size: medium; text-align: center; margin: 0; padding: 0;"><?php echo $data_cek['kepala']; ?></p>
                        <p style="font-size: medium; text-align: center; margin: 0; padding: 0;">NIP. <?php echo $data_cek['nip']; ?></p></td>
                        </tr>
                    </thead>
                </table>
                <br><br><br><br><br><br><br><br><br>
                <table style="width: 100%; border-bottom: none; font-size: small; border: none;">
                    <thead>
                    <tr >
                            <td style="width: 10%;">Catatan :</td>
                        </tr>
                        <tr >
                            <td>*</td>
                            <td>Coret Yang Tidak Perlu</td>
                        </tr>
                        <tr >
                            <td>**</td>
                            <td>Pilih salah satu dengan memberi tanda (✓)</td>
                        </tr>
                        <tr >
                            <td>***</td>
                            <td>Diisi oleh pejabat yang menangani bidang kepegawaian sebelum PNS mengajukan cuti</td>
                        </tr>
                        <tr >
                            <td>****</td>
                            <td>Diberi tanda centang pada (✓) dan alasannya</td>
                        </tr>
                        <tr >
                            <td>N</td>
                            <td>Cuti tahun berjalan</td>
                        </tr>
                        <tr >
                            <td>N-1</td>
                            <td>Sisa cuti 1 tahun sebelumnya</td>
                        </tr>
                        <tr >
                            <td>N-2</td>
                            <td>Sisa cuti 2 tahun sebelumnya</td>
                        </tr>
                    </thead>
                </table>
    </div>
    <script>
        window.print()
    </script>
</body>
</html>