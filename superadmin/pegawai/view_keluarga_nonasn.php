<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * from tb_keluarga WHERE nama_keluarga='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);

		$sql_cek = "SELECT * from tb_pegawaisatpolpp WHERE nip";
		$query_cek = mysqli_query($koneksi, $sql_cek);
		$data_pegawai = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>
<div class="row">

	<div class="col-md-6">
		<div class="card card-info">
			<div class="card-header">
				<h3 class="card-title">Data Keluarga</h3>

				<div class="card-tools">
				</div>
			</div>
			<div class="card-body p-0" style="background-color: #040D12; color: white;">
				<table class="table">
					<tbody>
						<tr>
							<td style="width: 150px">
								<b>Nama Keluarga</b>
							</td>
							<td>:
								<?php echo $data_cek['nama_keluarga']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 150px">
								<b>Jenis Kelamin</b>
							</td>
							<td>:
								<?php echo $data_cek['jk']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 150px">
								<b>Kelahiran</b>
							</td>
							<td>:
							<?php
// Tanggal dalam format 'yyyy-mm-dd'
$tanggal_integer = $data_cek['kelahiran'];

// Pisahkan tanggal, bulan, dan tahun
list($tahun, $bulan, $tanggal) = explode('-', $tanggal_integer);

// Daftar nama bulan dalam bahasa Indonesia
$nama_bulan = [
    'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
    'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
];

// Ubah format tanggal ke dalam bahasa Indonesia
$tanggal_string = $tanggal . ' ' . $nama_bulan[(int)$bulan - 1] . ' ' . $tahun;

echo $tanggal_string; // Output: '1 Agustus 2020' (jika $tanggal_integer adalah '2020-08-01')
?>

							</td>
						</tr>
						<tr>
							<td style="width: 150px">
								<b>Status Perkawinan</b>
							</td>
							<td>:
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
						</tr>
						<tr>
							<td style="width: 150px">
								<b>Pekerjaan</b>
							</td>
							<td>:
							<?php
if (!empty($data_cek['pekerjaan'])) {
    echo $data_cek['pekerjaan'];
} else {
    echo '-';
}
?>

							</td>
						</tr>
						
						<tr>
							<td style="width: 150px">
								<b>Keterangan</b>
							</td>
							<td>:
								<?php echo $data_cek['keterangan']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 150px">
								<b>Lainnya</b>
							</td>
							<td>:
							<?php
if (!empty($data_cek['lainnya'])) {
    $tgl_keterangan = isset($data_cek['tgl_keterangan']) ? $data_cek['tgl_keterangan'] : '';

    if (!empty($tgl_keterangan)) {
        $tgl_keterangan_format = date("d F Y", strtotime($tgl_keterangan));
        $bulan_inggris = array(
            'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'
        );
        $bulan_indonesia = array(
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        );
        $tgl_keterangan_format = str_replace($bulan_inggris, $bulan_indonesia, $tgl_keterangan_format);

        echo $data_cek['lainnya'] . ', ' . $tgl_keterangan_format;
    } else {
        echo $data_cek['lainnya'];
    }
} else {
    echo '';
}
?>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>