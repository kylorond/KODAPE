<?php
    $sql_hapus = "DELETE FROM tb_pegawaisatpolpp WHERE nip='".$_GET['kode']."'";
    $query_hapus = mysqli_query($koneksi, $sql_hapus);
    if ($query_hapus) {
        echo "<script>
        Swal.fire({title: 'Hapus Data Pegawai Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {if (result.value) {window.location = 'index.php?page=data-pegawai-asn'
        ;}})</script>";
        }else{
        echo "<script>
        Swal.fire({title: 'Hapus Data Pegawai Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {if (result.value) {window.location = 'index.php?page=data-pegawai-asn'
        ;}})</script>";
    }

    