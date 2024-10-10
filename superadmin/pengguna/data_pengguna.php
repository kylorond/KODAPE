<div class="card" style="background-color: black; color: white;">
    <div class="card-header">
        <h3 class="card-title" style="font-weight: bold;">
            <i class="fa fa-table"></i> Data Pengguna Sistem</h3>
    </div>
    <div class="card-body" style="background-color: #EEEDED; color: black;">
        <div class="table-responsive">
            <div>
                <a href="?page=add-pengguna" class="btn" style="background-color: #0E21A0; color: white;">
                    <i class="fa fa-edit"></i> Tambah Pengguna</a>
            </div>
            <br>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th style="width: 5%; text-align: center;">No</th>
                        <th>Nama Pengguna</th>
                        <th>NIP/NRPK</th>
                        <th>Level</th>
                        <th style="width: 10%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $sql = $koneksi->query("SELECT * FROM tb_pengguna");
                    while ($data = $sql->fetch_assoc()) {
                    ?>
                        <tr>
                            <td style="text-align: center;"><?php echo $no++; ?></td>
                            <td><?php echo $data['nama_pengguna']; ?></td>
                            <td><?php echo $data['username']; ?></td>
                            <td><?php echo $data['level']; ?></td>
                            <td style="text-align: center;">
                                <?php if ($data['level'] == 'Super Admin') { ?>
                                    <a href="#" title="Tidak dapat diubah" class="btn btn-sm disabled" style="background-color: gray; cursor: not-allowed;">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="#" title="Tidak dapat dihapus" class="btn btn-sm disabled" style="background-color: gray; cursor: not-allowed;">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                <?php } else { ?>
                                    <a href="?page=edit-pengguna&kode=<?php echo $data['id_pengguna']; ?>" title="Ubah" class="btn btn-sm" style="background-color: #068FFF">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="?page=del-pengguna&kode=<?php echo $data['id_pengguna']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-sm" style="background-color: #CD1818; color: white">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                <?php } ?>
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
