<div class="card">
	<div class="card-header" style="background-color: black; color: white;">
		<h3 class="card-title" style="font-weight: bold;">
			<i class="far fa fa-file-contract"></i> Surat Perjanjian Kerja</h3>
	</div>
	<div class="card-body" style="background-color: #EEEDED; color: black;">
		<div class="table-responsive">
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th style="width: 5%;">No</th>
						<th style="width: 87%;">Nama</th>
						<th style="width: 8%; text-align: center;">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					$sql = $koneksi->query("SELECT * from tb_pegawaisatpolpp Where status_kepegawaian='Tenaga Kontrak'");
					while ($data= $sql->fetch_assoc()) {
					?>
					<tr>
						<td style="text-align: center;">
							<?php echo $no++; ?>
						</td>
						<td>
							<?php echo $data['nama']; ?>
						</td>
						<td style="text-align: center;">
						<a href="?page=edit-spk&kode=<?php echo $data['nip']; ?>" title="Buat SPK" class="btn" style="background-color: #FB2576; color: white;">SPK</a>
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