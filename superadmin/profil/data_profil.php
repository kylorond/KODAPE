<div class="card">
	<div class="card-header" style="background-color: black; color: white;">
		<h3 class="card-title" style="font-weight: bold;">
			<i class="fa fa-table"></i> Satuan Instansi</h3>
	</div>
	<div class="card-body" style="background-color: #EEEDED; color: black;">
		<div class="table-responsive">
			<table id="" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>Nama Satuan</th>
						<th>Alamat Satuan</th>
						<th>Kepala Satuan</th>
						<th>Kelola</th>
					</tr>
				</thead>
				<tbody>
				<?php
            		$no = 1;
              		$sql = $koneksi->query("select * from tb_profilinstansi");
              		while ($data= $sql->fetch_assoc()) {
            	?>
					<tr>
						<td>
							<?php echo $data['nama_instansi']; ?>
						</td>
						<td>
							<?php echo $data['alamat']; ?>
						</td>
						<td>
							<?php echo $data['kepala']; ?>
						</td>
						<td style="text-align: center;">
							<a href="?page=edit-profil&kode=<?php echo $data['id_profil']; ?>" title="Ubah"
							 class="btn btn-sm" style="background-color: #068FFF; color: black;">
								<i class="fa fa-wrench"></i>
							</a>
						</td>
					</tr>

					<?php
              	}
            ?>
				</tbody>
			</table>
		</div>
	</div>