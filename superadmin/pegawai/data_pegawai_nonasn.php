<div class="card" style="background-color: black; color: white;">
	<div class="card-header">
		<h3 class="card-title" style="font-weight: bold;">
			<i class="far fa-user"></i> Data Tenaga Kontrak</h3>
	</div>
	<div class="card-body" style="background-color: #EEEDED; color: black;">
		<div class="table-responsive">
			<div>
				<a href="?page=add-pegawai-nonasn" title="Tambah Data Tenaga Kontrak" class="btn" style="background-color: #0E21A0; color: white;">
					<i class="fa fa-edit"></i> Tambah Data Tenaga Kontrak</a>
					<a href="./report/cetak-data-nonasn.php" target=" _blank"
					 title="Cetak Data Tenaga Kontrak" class="btn" style="background-color: #FB2576; color: white;"><i class="fa fa-print"></i> Cetak Data Tenaga Kontrak</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped" style="text-align: center;">
				<thead>
					<tr>
						<th>No</th>
						<th>NRPK</th>
						<th>Nama</th>
						<th>Tempat Tanggal Lahir</th>
						<!-- <th>Pendidikan</th> -->
						<th>Jabatan</th>
						<th>Alamat</th>
						<!-- <th>Gaji</th>
						<th>Terbilang</th> -->
						<th style="width: 12%;">Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
					$no = 1;
					$sql = $koneksi->query("SELECT * from tb_pegawaisatpolpp Where status_kepegawaian='Tenaga Kontrak'");
					while ($data= $sql->fetch_assoc()) {
					?>

					<tr>
						<td>
							<?php echo $no++; ?>
						</td>
						<td>
							<?php echo $data['nip']; ?>
						</td>
						<td>
							<?php echo $data['nama']; ?>
							<span style="color: #FF204E; font-weight: bold;"><?php if (isset($data['tanggal_lahir'])) {
								$tanggal_lahir = new DateTime($data['tanggal_lahir']);
								$today = new DateTime();
								$usia = $today->diff($tanggal_lahir)->y;

								echo '<br>' . $usia . ' Tahun';
							}
							?></span>
						</td>
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
						<!-- <td>
							<?php echo $data['pendidikan']; ?>
						</td> -->
						<td>
							<?php echo $data['jabatan']; ?>
						</td>
						<td>
							<?php echo $data['alamat']; ?>
						</td>
						<!-- <td>
							<?php echo $data['gaji']; ?>
						</td>
						<td>
							<?php echo $data['terbilang']; ?>
						</td> -->

						<td>
						<a href="?page=view-pegawai-nonasn&kode=<?php echo $data['nip']; ?>" title="Lihat"
							 class="btn btn-sm" style="background-color: #F4CE14">
								<i class="fa fa-eye"></i>
							</a>
							</a>
							<a href="?page=edit-pegawai-nonasn&kode=<?php echo $data['nip']; ?>" title="Ubah" class="btn btn-sm"
							style="background-color: #068FFF">
								<i class="fa fa-edit"></i>
							</a>
							<a href="?page=del-pegawai-nonasn&kode=<?php echo $data['nip']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
							 title="Hapus" class="btn btn-sm" style="background-color: #CD1818; color: white">
								<i class="fa fa-eraser"></i>
						</td>
					</tr>

					<?php
              }
            ?>
				</tbody>
				</tfoot>
			</table>
		</div>
	</div>