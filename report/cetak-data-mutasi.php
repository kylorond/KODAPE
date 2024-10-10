<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <title>CETAK DAFTAR PEGAWAI MUTASI</title>
    <style type="text/css">
        body {
            font-family: arial;
            background-color: white
        }

        td {
            font-size: 16px;
        }

        .rangkasurat {
            width: 980px;
            margin: 0 auto;
            background-color: white;
            height: 500px;
            padding: 20px;
        }

        .kop {
            border-bottom: 5px solid black;
            padding: 2px;
        }

        .tengah {
            text-align: center;
            line-height: 6px;
        }

        span.biru {
            color: blue;
            text-decoration: underline;
        }

        span.bold {
            font-weight: bold;
        }

        span.italic {
            font-style: italic;
        }

        p {
            font-size: 22px;
            text-align: justify
        }

        .justify {
            text-align: justify;
            vertical-align: baseline;
        }

        .isitabel {
            border-collapse: collapse;
            text-align: center;
            font-size: smaller;
            font-weight: 50;
        }
    </style>
</head>

<body>
    <div class="rangkasurat">
        <table class="kop" width="100%">
            <tr>
                <td><img src="../dist/img/logokalteng.png" width="85px"></td>
                <td class="tengah">
                    <h2 class="tengah">PEMERINTAH PROVINSI KALIMANTAN TENGAH</h2>
                    <h1 class="tengah">SATUAN POLISI PAMONG PRAJA</h1>
                    <p class="tengah">Alamat : Jl. Yos Sudarso No. 008 Palangka Raya 73112</p>
                    <p class="tengah">website : <span class="biru">https://satpolpp.kalteng.go.id</span> email : <span class="biru">kalteng.polpp@gmail.com</span></p>
                </td>
                <td><img src="../dist/img/logosatpolpp.png" width="85px"></td>
            </tr>
        </table>
        <br>
        <td>
            <h2 class="tengah">
            <h2 class="tengah">DATA PEGAWAI PENSIUN SATUAN POLISI PAMONG PRAJA</h2>
		<h2 class="tengah">PROVINSI KALIMANTAN TENGAH</h2>
            </h2>
        </td>
        <br>

        <?php
        setlocale(LC_TIME, 'id_ID');

        $tanggalSekarang = strftime("%d %B %Y");

        echo "<b>Tanggal : </b>" . $tanggalSekarang;
        ?>

        <div class="card-body">
            <div class="table-responsive">
                <br>
                <table class="isitabel" border="1px" cellpadding="3">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NRPK</th>
                            <th>Nama</th>
                            <th>Tempat Tanggal Lahir</th>
                            <!-- <th>Pendidikan</th> -->
                            <th>Jabatan</th>
                            <th>Alamat</th>
                            <!-- <th>Gaji</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $koneksi = mysqli_connect("localhost", "root", "", "db_polpp");
                        $query = mysqli_query($koneksi, "SELECT * FROM tb_pegawaisatpolpp where keterangan='Mutasi'");
                        $no = 1;
                        while ($data = mysqli_fetch_array($query)) {
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
                                </td>
                                <td>
                                <?php
if (!empty($data['tempat_lahir'])) {
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
    echo ''; // Tampilkan string kosong jika "tempat_lahir" tidak ada
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
    </div>
    <script>
        window.print();
    </script>
</body>

</html>