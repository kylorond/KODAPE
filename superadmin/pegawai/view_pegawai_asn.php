<?php
    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * from tb_pegawaisatpolpp WHERE nip='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>
<div class="card-header mb-4" style="background-color: #F4CE14; color: black;">
    <h3 class="card-title" style="font-weight: bold;">Biodata Pegawai</h3>
</div>
<div class="row">
<div class="col-md-6">
    <div class="card">
        <div class="card-body p-0" style="background-color: #EEEDED; color: black;">
            <table class="table" border="1" style="border-collapse: collapse; width: 100%; border: 1px solid lightgrey;">
                <tbody>
                    <tr>
                        <td style="width: 150px;">
                            <b>NIP</b>
                        </td>
                        <td style="font-weight: bold;">
                        <?php echo $data_cek['nip']; ?><br>
							<?php
							$keterangan = $data_cek['keterangan'];
							$warna = '#000000';
							if ($keterangan === 'Aktif') {
								$warna = '#40679E'; 
							} elseif ($keterangan === 'Mutasi') {
								$warna = '#F4CE14';
							} elseif ($keterangan === 'Pensiun') {
								$warna = '#FB2576'; 
							}
							echo '<span style="color:' . $warna . '; font-weight: bold;">' . $keterangan . '</span>';
							?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 150px">
                            <b>Nama</b>
                        </td>
                        <td style="font-weight: bold;">
                            <?php echo $data_cek['nama']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 150px">
                            <b>Tempat dan Tanggal Lahir</b>
                        </td>
                        <td style="font-weight: bold;">
                            <?php
                            if (!empty($data_cek['tempat_lahir']) && !empty($data_cek['tanggal_lahir'])) {
                                $tanggal_lahir = $data_cek['tanggal_lahir'];
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

                                echo $data_cek['tempat_lahir'] . ', ' . $tanggal_lahir_format;
                            } else {
                                echo $data_cek['tempat_lahir']; // Tampilkan hanya tempat_lahir jika tanggal_lahir tidak ada
                            }
                            ?>
                            <span style="color: #FF204E; font-weight: bold;">
                                <?php if (isset($data_cek['tanggal_lahir'])) {
                                    $tanggal_lahir = new DateTime($data_cek['tanggal_lahir']);
                                    $today = new DateTime();
                                    $usia = $today->diff($tanggal_lahir)->y;

                                    echo '<br>' . $usia . ' Tahun';
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 150px">
                            <b>Jenis Kelamin</b>
                        </td>
                        <td style="font-weight: bold;">
                            <?php echo $data_cek['jenis_kelamin']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 150px">
                            <b>Agama</b>
                        </td>
                        <td style="font-weight: bold;">
                            <?php echo $data_cek['agama']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 150px">
                            <b>Golongan Darah</b>
                        </td>
                        <td style="font-weight: bold; color:#FB2576;">
                            <?php echo $data_cek['gol_darah']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 150px">
                            <b>No BPJS/Askes</b>
                        </td>
                        <td style="font-weight: bold; color:#FB2576;">
                            <?php echo $data_cek['no_bpjs']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 150px">
                            <b>Pangkat/Gol. Ruang</b>
                        </td>
                        <td style="font-weight: bold;">
						<?php echo $data_cek['pangkat']; ?> (<?php echo $data_cek['golongan']; ?>)
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 150px">
                            <b>Terhitung Mulai Tanggal</b>
                        </td>
                        <td style="font-weight: bold;">
						<?php
                            $tmt_golongan = $data_cek['tmt_golongan'];
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
                                echo '';
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 150px">
                            <b>Naik Pangkat/Golongan</b>
                        </td>
                        <td style="font-weight: bold; color:#007F73;">
						Diperkirakan akan naik pangkat/golongan pada 
						<?php
                            $tmt_golongan = $data_cek['tmt_golongan'];

                            if (!empty($tmt_golongan)) {
                                $tmt_golongan = new DateTime($tmt_golongan);
                                $naik_golongan = $tmt_golongan->add(new DateInterval('P4Y'));
                                $bulan_inggris = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
                                $bulan_indonesia = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

                                $formatted_date = str_replace($bulan_inggris, $bulan_indonesia, $naik_golongan->format('d F Y'));
                                echo $formatted_date;
                            } else {
                                echo '';
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 150px">
                            <b>Pendidikan</b>
                        </td>
                        <td style="font-weight: bold;">
                            <?php echo $data_cek['pendidikan']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 150px">
                            <b>Jurusan</b>
                        </td>
                        <td style="font-weight: bold;">
                            <?php echo $data_cek['jurusan']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 150px">
                            <b>Konsentrasi</b>
                        </td>
                        <td style="font-weight: bold;">
                            <?php echo $data_cek['konsentrasi']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 150px">
                            <b>Alumni</b>
                        </td>
                        <td style="font-weight: bold;">
                            <?php echo $data_cek['alumni']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 150px">
                            <b>Tahun Lulus</b>
                        </td>
                        <td style="font-weight: bold;">
                            <?php echo $data_cek['tahun_lulus']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 150px">
                            <b>Jabatan</b>
                        </td>
                        <td style="font-weight: bold;">
                            <?php echo $data_cek['jabatan']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 150px">
                            <b>Penempatan</b>
                        </td>
                        <td style="font-weight: bold;">
                            <?php echo $data_cek['penempatan']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 150px">
                            <b>Unit Kerja</b>
                        </td>
                        <td style="font-weight: bold;">
                            <?php echo $data_cek['unit']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 150px">
                            <b>Pada Instansi</b>
                        </td>
                        <td style="font-weight: bold;">
                            <?php echo $data_cek['instansi']; ?>
                        </td>
                    </tr>
                    <tr>
						<?php
                        if(isset($_GET['kode'])){
                            $tanggal_honor = new DateTime($data_cek['tanggal_honor']);
                            $tanggal_sekarang = new DateTime();
                            $selisih = $tanggal_honor->diff($tanggal_sekarang);
                            $selisih_tahun = $selisih->y;
                            $selisih_bulan = $selisih->m;
                            }
                        ?>
                        <td style="width: 150px">
                            <b>Masa Honor</b>
                        </td>
                        <td style="font-weight: bold;">
						<?php
                            echo "$selisih_tahun tahun ";
                            echo "$selisih_bulan bulan<br>";
                        ?>
                        </td>
                    </tr>
                    <tr>
					<?php
                        if(isset($_GET['kode'])){
                            $tanggal_masuk = new DateTime($data_cek['tanggal_masuk']);
                            $tanggal_sekarang = new DateTime();
                            $selisih = $tanggal_masuk->diff($tanggal_sekarang);
                            $selisih_tahun = $selisih->y;
                            $selisih_bulan = $selisih->m;
                            }
                        ?>
                        <td style="width: 150px">
                            <b>Masa Kerja</b>
                        </td>
                        <td style="font-weight: bold;">
                        <?php
                            echo "$selisih_tahun tahun ";
                            echo "$selisih_bulan bulan<br>";
                        ?>
                        </td>
                    </tr>
                    <!-- <tr><?php
                            if (isset($_GET['kode'])) {
                                $tanggal_masuk = new DateTime($data_cek['tanggal_masuk']);
                                $tanggal_sekarang = new DateTime();
                                $selisih = $tanggal_masuk->diff($tanggal_sekarang);
                                $selisih_tahun = $selisih->y;
                                $selisih_bulan = $selisih->m;
                            }
                            ?>
                            <td style="width: 150px">
                                <b>Masa Kerja Golongan</b>
                            </td>
                            <td>:
                                <?php
                                echo "$selisih_tahun tahun ";
                                echo "$selisih_bulan bulan<br>";
                                ?>
                            </td>
                        </tr> -->
                    <?php
                    function terbilang($angka)
                    {
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

                    $gaji = $data_cek['gaji'];

                    echo '<tr>
                        <td style="width: 150px">
                            <b>Gaji Pokok</b>
                        </td>';
                    if (!empty($gaji)) {
                        $terbilang_gaji = terbilang($gaji);
                        echo '<td style="font-weight: bold;">
                            Rp ' . number_format($gaji, 0, ',', '.') . '
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 150px">
                            <b>Terbilang</b>
                        </td>
                        <td style="font-weight: bold;">
                            ' . $terbilang_gaji . ' Rupiah
                        </td>';
                    } else {
                        echo '<td style="font-weight: bold;">
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 150px">
                                <b>Terbilang</b>
                            </td>
                            <td style="font-weight: bold;">
                            </td>';
                    }
                    echo '</tr>';
                    ?>
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
            <tr>
                <td style="width: 150px">
                    <b>Nomor Telp Rumah/HP</b>
                </td>
                <td style="font-weight: bold;">
                    <?php echo $data_cek['no_telp']; ?>
                </td>
            </tr>
            <tr>
                <td style="width: 150px">
                    <b>Nomor Pokok Wajib Pajak (NPWP)</b>
                </td>
                <td style="font-weight: bold;">
                    <?php echo $data_cek['npwp']; ?>
                </td>
            </tr>
            <tr>
                <td style="width: 150px">
                    <b>Nomor Induk Kependudukan (NIK)</b>
                </td>
                <td style="font-weight: bold;">
                    <?php echo $data_cek['nik']; ?>
                </td>
            </tr>
            <tr>
                <td style="width: 150px">
                    <b>Nomor Kartu Pegawai (KARPEG)</b>
                </td>
                <td style="font-weight: bold;">
                    <?php echo $data_cek['karpeg']; ?>
                </td>
            </tr>
            <tr>
                <td style="width: 150px">
                    <b>Alamat</b>
                </td>
                <td style="font-weight: bold;">
                    <?php echo $data_cek['alamat']; ?>
                </td>
            </tr>
            <tr>
                <td style="width: 150px">
                    <b>Ukuran Baju</b>
                </td>
                <td style="font-weight: bold;">
                    <?php echo $data_cek['ukuran_baju']; ?>
                </td>
            </tr>
            <tr>
                <td style="width: 150px">
                    <b>Ukuran Celana</b>
                </td>
                <td style="font-weight: bold;">
                    <?php echo $data_cek['ukuran_celana']; ?>
                </td>
            </tr>
            <tr>
                <td style="width: 150px">
                    <b>Ukuran Topi</b>
                </td>
                <td style="font-weight: bold;">
                    <?php echo $data_cek['ukuran_topi']; ?>
                </td>
            </tr>
            <tr>
                <td style="width: 150px">
                    <b>Ukuran Sepatu</b>
                </td>
                <td style="font-weight: bold;">
                    <?php echo $data_cek['ukuran_sepatu']; ?>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="mt-3">
        <a href="?page=data-pegawai-asn" class="btn" style="background-color: #CD1818; color: white; font-weight: bold;">Kembali</a>
        <a href="./report/cetak-data-keluarga-asn.php?nip=<?php echo $data_cek['nip']; ?>" target="_blank" title="Cetak Data Keluarga Pegawai" class="btn" style="background-color: #16FF00; color: black; font-weight: bold;">Cetak Data</a>
        <a href="?page=edit-pegawai-asn&kode=<?php echo $data_cek['nip']; ?>" class="btn" style="background-color: #068FFF; color: white; font-weight: bold;">Edit Data</a>
        <a href="?page=input-formulir-cuti-asn&kode=<?php echo $data_cek['nip']; ?>" title="Cuti" class="btn" style="background-color: #FB2576; color: black; font-weight: bold;">Cuti</a>
    </div>
</div>

	</div>
	</div>
	</div>
<div class="card-header mb-2 mt-2" style="background-color: #F4CE14; color: black;">
	<h3 class="card-title" style="font-weight: bold;">Keluarga Pegawai</h3>	
</div>
	<div class="card-body" style="background-color: #EEEDED; color: black;">
		<div class="table-responsive">
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<!-- <th>Status Keluarga</th> -->
						<th>Nama Keluarga</th>
						<th>Jenis Kelamin</th>
						<th>Kelahiran</th>
						<th>Status Perkawinan</th>
						<th>Pekerjaan</th>
						<th>Keterangan</th>
						<th>Lainnya</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$sql = $koneksi->query("SELECT * from tb_keluarga WHERE nama = '".$data_cek['nama']."'");
            			while ($data_keluarga= $sql->fetch_assoc()) {
            		?>
					<tr>
						<!-- <td>
							<?php echo $data_keluarga['keluarga']; ?>
						</td> -->
						<td>
							<?php echo $data_keluarga['nama_keluarga']; ?>
						</td>
						<td>
							<?php echo $data_keluarga['jk']; ?>
						</td>
						<td>
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
						<td>
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
						<td>
						<?php
if (!empty($data_keluarga['pekerjaan'])) {
    echo $data_keluarga['pekerjaan'];
} else {
    echo '-';
}
?>

						</td>
						<td>
							<?php echo $data_keluarga['keterangan']; ?>
						</td>
						<td>
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
						<td style="align-items: center;">
							<a href="?page=del-keluarga&kode=<?php echo $data_keluarga['nama_keluarga']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
							 title="Hapus" class="btn btn-sm" style="background-color: #CD1818; color: white;">
								<i class="fa fa-eraser"></i>
						</td>
					</tr>
				<?php
            		}
            	?>	
				</tbody>
			</table>
				<a href="?page=add-keluarga&kode=<?php echo $data_cek['nip']; ?>" title="Tambah Data Keluarga" class="btn" class="btn" style="background-color: #FB2576; color: black; font-weight: bold;">Tambah Data Keluarga</a>
		</div>
	</div>
</div>
	</div>