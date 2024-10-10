<?php
    $sql_hapus = "DELETE FROM tb_keluarga WHERE nama_keluarga='".$_GET['kode']."'";
    $query_hapus = mysqli_query($koneksi, $sql_hapus);
    if ($query_hapus) {
        echo "<script>
        Swal.fire({title: 'Hapus Data Keluarga Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {if (result.value) {window.location = 'index.php?page=data-pegawai'
        ;}})</script>";
        }else{
        echo "<script>
        Swal.fire({title: 'Hapus Data Keluarga Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {if (result.value) {window.location = 'index.php?page=data-pegawai'
        ;}})</script>";
    }

    