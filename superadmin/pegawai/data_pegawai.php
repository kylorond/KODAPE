<div class="card" style="background-color: black; color: white;">
	<div class="card-header">
		<h3 class="card-title" style="font-weight: bold;">
			<i class="far fa fa-users"></i> Data Pegawai & Tekon</h3>
	</div>
	<div class="card-body" style="background-color: #EEEDED; color: black;">
		<div class="table-responsive">
			<div>
				<a href="?page=add-pegawai" class="btn" style="background-color: #0E21A0; color: white;">
					<i class="fa fa-edit"></i> Tambah Data Pegawai & Tekon</a>
					<a href="./report/cetak-data.php" target=" _blank"
					 title="Cetak Data Pegawai" class="btn" style="background-color: #FB2576; color: white;"><i class="fa fa-print"></i> Cetak Data Pegawai & Tekon</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped" style="text-align: center;">
				<thead>
					<tr style="width: 100%;">
						<th style="width: 5%;">No</th>
						<th style="width: 30%;">NIP/NRPK</th>
						<th style="width: 30%;">Nama</th>
						<th style="width: 20%;">Jabatan</th>
						<th style="width: 10%">Status</th>
						<th style="width: 5%;">Golongan Darah</th>
					</tr>
				</thead>
				<tbody>
					<?php
              $no = 1;
			  $sql = $koneksi->query("SELECT * from tb_pegawaisatpolpp");
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
							<?php
							echo $data['nama'];
							?> <span style="color: #FF204E; font-weight: bold;"><?php if (isset($data['tanggal_lahir'])) {
								$tanggal_lahir = new DateTime($data['tanggal_lahir']);
								$today = new DateTime();
								$usia = $today->diff($tanggal_lahir)->y;
								echo '<br>' . $usia . ' Tahun';
							}
							?></span>
						</td>
						<td>
							<?php echo $data['jabatan']; ?>
						</td>
						<!-- <td>
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
								echo $data['tempat_lahir'];
							}
							?>
						</td> -->
						<!-- <td>
							<?php echo $data['pendidikan']; ?>
						</td>
						<td>
							<?php echo $data['jabatan']; ?>
						</td> -->
						<td>
							<?php echo $data['status_kepegawaian']; ?>
						</td>
						<td style="color: #FB2576; font-weight: bold;">
							<?php echo $data['gol_darah']; ?>
						</td>
						<!-- <td>
							<?php echo $data['gaji']; ?>
						</td>
						<td>
							<?php echo $data['terbilang']; ?>
						</td> -->

						<!-- <td>
							<a href="?page=view-pegawai&kode=<?php echo $data['nip']; ?>" title="Detail"
							 class="btn btn-info btn-sm">
								<i class="fa fa-eye"></i>
							</a>
							</a>
							<a href="?page=edit-pegawai&kode=<?php echo $data['nip']; ?>" title="Ubah" class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i>
							</a>
							<a href="?page=del-pegawai&kode=<?php echo $data['nip']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
							 title="Hapus" class="btn btn-danger btn-sm">
								<i class="fa fa-eraser"></i>
						</td> -->
					</tr>

					<?php
              }
            ?>
				</tbody>
				</tfoot>
			</table>
		</div>
	</div>