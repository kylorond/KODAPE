<?php
    session_start();
    if (isset($_SESSION["ses_username"])==""){
	header("location: login.php");
    
    }else{
      $data_id = $_SESSION["ses_id"];
      $data_nama = $_SESSION["ses_nama"];
      $data_user = $_SESSION["ses_username"];
	  $data_level = $_SESSION["ses_level"];
    }
	include "inc/koneksi.php";
	$sql = $koneksi->query("SELECT * from tb_profilinstansi");
	while ($data= $sql->fetch_assoc()) {
	$nama=$data['nama_instansi'];
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>KODAPE POL PP</title>
	<link rel="icon" href="dist/img/logo.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
	<link rel="stylesheet" href="dist/css/adminlte.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="plugins/select2/css/select2.min.css">
	<link rel="stylesheet" href="plugins/select2/css/select2.min.css">
	<link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<script src="plugins/alert.js"></script>
</head>
<body class="hold-transition sidebar-mini sidebar-collapse" style="background-color: #EEEDED;">
	<div class="wrapper">
		<nav class="main-header navbar navbar-expand sticky-top" style="background-color: #EEEDED; border-bottom: 2px solid black;">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#">
						<i class="fas fa-bars text-dark"></i>
					</a>
				</li>
			</ul>
			<ul class="navbar-nav ml-auto">
				<li class="nav-item d-none d-sm-inline-block">
					<a href="index.php" class="nav-link">
						<font color="#333333">
							<b>
								HOME
							<!-- <?php echo $nama; ?> -->
							</b>
						</font>
					</a>
				</li>
				<li class="nav-item d-none d-sm-inline-block">
					<a onclick="return confirm('Apakah anda yakin ingin keluar?')" href="logout.php" class="nav-link">
						<font color="red">
							<b>
								LOGOUT
							</b>
						</font>
					</a>
				</li>
			</ul>

		</nav>
		<aside class="main-sidebar sidebar-light-primary elevation-4 position-fixed" style="background-color: #EEEDED;">
			<a href="index.php" class="brand-link">
				<img src="dist/img/logo.png" alt="AdminLTE Logo" class="brand-image ml-3" style="opacity: .9;">
				<span class="brand-text" style="display: flex; justify-content: center; font-weight: bold;">K O D A P E</span>
			</a>
			<div class="sidebar">
				<div class="user-panel mt-2 pb-2 mb-2 d-flex">
					<div class="image">
						<img src="dist/img/user.png" class="img-circle elevation-1" alt="User Image">
					</div>
					<div class="info">
						<a href="index.php" class="d-block">
							<?php echo $data_nama; ?>
						</a>
						<span class="badge" style="background-color: #FB2576; color: black;">
							<?php echo $data_level; ?>
						</span>
					</div>
				</div>
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"` data-accordion="false">
						<?php
						if ($data_level=="Super Admin"){
						?>
						<li class="nav-item">
							<a href="index.php" class="nav-link">
								<i class="nav-icon fas fa-tachometer-alt"></i>
								<p>
									Dashboard
								</p>
							</a>
						</li>

						<li class="nav-item">
							<a href="?page=data-pegawai" class="nav-link">
								<i class="nav-icon far fa fa-users"></i>
								<p>
									Data Pegawai & Tekon
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="?page=data-pegawai-asn" class="nav-link">
								<i class="nav-icon far fa fa-user"></i>
								<p>
									Data Pegawai
								</p>
							</a>
						</li>

						<li class="nav-item">
							<a href="?page=data-pegawai-nonasn" class="nav-link">
								<i class="nav-icon far fa-user"></i>
								<p>
									Data Tenaga Kontrak
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="?page=data-spk" class="nav-link">
								<i class="nav-icon far fa fa-file-contract"></i>
								<p>
									Surat Perjanjian Kerja
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="?page=data-cuti-asn" class="nav-link">
								<i class="nav-icon far fa fa-file"></i>
								<p>
									Cuti Pegawai
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="?page=data-cuti-nonasn" class="nav-link">
								<i class="nav-icon far fa fa-file"></i>
								<p>
									Cuti Tenaga Kontrak
								</p>
							</a>
						</li>
						<li class="nav-header">Setting</li>
						<!-- <li class="nav-item">
							<a href="?page=data-profil" class="nav-link">
								<i class="nav-icon far fa fa-flag"></i>
								<p>
									Satuan Instansi
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="?page=data-pengguna" class="nav-link">
								<i class="nav-icon far fa fa-users"></i>
								<p>
									Pengguna Sistem
								</p>
							</a>
						</li> -->

						<?php
          				} elseif($data_level=="Admin"){
          				?>

						<li class="nav-item">
							<a href="index.php" class="nav-link">
								<i class="nav-icon fas fa-tachometer-alt"></i>
								<p>
									Dashboard
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="?page=data-pegawai" class="nav-link">
								<i class="nav-icon far fa fa-users"></i>
								<p>
									Data Pegawai & Tekon
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="?page=data-pegawai-asn" class="nav-link">
								<i class="nav-icon far fa fa-user"></i>
								<p>
									Data Pegawai
								</p>
							</a>
						</li>

						<li class="nav-item">
							<a href="?page=data-pegawai-nonasn" class="nav-link">
								<i class="nav-icon far fa-user"></i>
								<p>
									Data Tenaga Kontrak
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="?page=data-spk" class="nav-link">
								<i class="nav-icon far fa fa-file-contract"></i>
								<p>
									Surat Perjanjian Kerja
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="?page=data-cuti-asn" class="nav-link">
								<i class="nav-icon far fa fa-file"></i>
								<p>
									Cuti Pegawai
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="?page=data-cuti-nonasn" class="nav-link">
								<i class="nav-icon far fa fa-file"></i>
								<p>
									Cuti Tenaga Kontrak
								</p>
							</a>
						</li>


						<li class="nav-header">Setting</li>

						<?php
							}
						?>
						<li class="nav-item">
							<a href="?page=data-profil" class="nav-link">
								<i class="nav-icon far fa fa-flag"></i>
								<p>
									Satuan Instansi
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="?page=data-pengguna" class="nav-link">
								<i class="nav-icon far fa fa-users"></i>
								<p>
									Pengguna Sistem
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a onclick="return confirm('Apakah anda yakin ingin keluar?')" href="logout.php" class="nav-link">
								<i class="nav-icon far fa-circle" style="color: red;"></i>
								<p>
									Logout
								</p>
							</a>
						</li>
				</nav>
			</div>
		</aside>
		<div class="content-wrapper" style="background-color: #EEEDED;">
			<section class="content-header">
			</section>
			<section class="content">
				<div class="container-fluid">
					<?php 
      if(isset($_GET['page'])){
          $hal = $_GET['page'];
  
          switch ($hal) {
			case 'add-pengguna':
				// Hanya izinkan akses jika user adalah administrator
				if ($data_level == "Super Admin") {
					include "superadmin/pengguna/add_pengguna.php";
				} else {
					echo "<center><h1>Anda tidak memiliki izin untuk mengakses halaman ini.</h1></center>";
				}
				break;
			case 'dal-pengguna':
				// Hanya izinkan akses jika user adalah administrator
				if ($data_level == "Super Admin") {
					include "superadmin/pengguna/del_pengguna.php";
				} else {
					echo "<center><h1>Anda tidak memiliki izin untuk mengakses halaman ini.</h1></center>";
				}
				break;
			case 'edit-pengguna':
				// Hanya izinkan akses jika user adalah administrator
				if ($data_level == "Super Admin") {
					include "superadmin/pengguna/edit_pengguna.php";
				} else {
					echo "<center><h1>Anda tidak memiliki izin untuk mengakses halaman ini.</h1></center>";
				}
				break;
			case 'data-pengguna':
				// Hanya izinkan akses jika user adalah administrator
				if ($data_level == "Super Admin") {
					include "superadmin/pengguna/data_pengguna.php";
				} else {
					echo "<center><h1>Anda tidak memiliki izin untuk mengakses halaman ini.</h1></center>";
				}
				break;
			case 'data-profil':
				// Hanya izinkan akses jika user adalah administrator
				if ($data_level == "Super Admin") {
					include "superadmin/profil/data_profil.php";
				} else {
					echo "<center><h1>Anda tidak memiliki izin untuk mengakses halaman ini.</h1></center>";
				}
				break;
			case 'edit-profil':
				// Hanya izinkan akses jika user adalah administrator
				if ($data_level == "Super Admin") {
					include "superadmin/profil/edit_profil.php";
				} else {
					echo "<center><h1>Anda tidak memiliki izin untuk mengakses halaman ini.</h1></center>";
				}
				break;
				case 'add-keluarga':
					// Hanya izinkan akses jika user adalah administrator
					if ($data_level == "Super Admin") {
						include "superadmin/pegawai/add_keluarga.php";
					} else {
						echo "<center><h1>Anda tidak memiliki izin untuk mengakses halaman ini.</h1></center>";
					}
					break;
				case 'del-keluarga':
					// Hanya izinkan akses jika user adalah administrator
					if ($data_level == "Super Admin") {
						include "superadmin/pegawai/del_keluarga.php";
					} else {
						echo "<center><h1>Anda tidak memiliki izin untuk mengakses halaman ini.</h1></center>";
					}
					break;
			case 'edit-pegawai-asn':
				// Hanya izinkan akses jika user adalah administrator
				if ($data_level == "Super Admin") {
					include "superadmin/pegawai/edit_pegawai_asn.php";
				} else {
					echo "<center><h1>Anda tidak memiliki izin untuk mengakses halaman ini.</h1></center>";
				}
				break;
				case 'edit-pegawai-nonasn':
					// Hanya izinkan akses jika user adalah administrator
					if ($data_level == "Super Admin") {
						include "superadmin/pegawai/edit_pegawai_nonasn.php";
					} else {
						echo "<center><h1>Anda tidak memiliki izin untuk mengakses halaman ini.</h1></center>";
					}
					break;
				case 'add-pegawai':
					// Hanya izinkan akses jika user adalah administrator
					if ($data_level == "Super Admin") {
						include "superadmin/pegawai/add_pegawai.php";
					} else {
						echo "<center><h1>Anda tidak memiliki izin untuk mengakses halaman ini.</h1></center>";
					}
					break;
				case 'add-pegawai-asn':
					// Hanya izinkan akses jika user adalah administrator
					if ($data_level == "Super Admin") {
						include "superadmin/pegawai/add_pegawai_asn.php";
					} else {
						echo "<center><h1>Anda tidak memiliki izin untuk mengakses halaman ini.</h1></center>";
					}
					break;
				case 'add-pegawai-nonasn':
					// Hanya izinkan akses jika user adalah administrator
					if ($data_level == "Super Admin") {
						include "superadmin/pegawai/add_pegawai_nonasn.php";
					} else {
						echo "<center><h1>Anda tidak memiliki izin untuk mengakses halaman ini.</h1></center>";
					}
					break;
					case 'del-pegawai-asn':
						// Hanya izinkan akses jika user adalah administrator
						if ($data_level == "Super Admin") {
							include "superadmin/pegawai/del_pegawai_asn.php";
						} else {
							echo "<center><h1>Anda tidak memiliki izin untuk mengakses halaman ini.</h1></center>";
						}
						break;
						case 'del-pegawai-nonasn':
							// Hanya izinkan akses jika user adalah administrator
							if ($data_level == "Super Admin") {
								include "superadmin/pegawai/del_pegawai_nonasn.php";
							} else {
								echo "<center><h1>Anda tidak memiliki izin untuk mengakses halaman ini.</h1></center>";
							}
							break;
							// case 'input-formulir-cuti-asn':
							// 	// Hanya izinkan akses jika user adalah administrator
							// 	if ($data_level == "Super Admin") {
							// 		include "superadmin/pegawai/input_formulir_cuti_asn.php";
							// 	} else {
							// 		echo "<center><h1>Anda tidak memiliki izin untuk mengakses halaman ini.</h1></center>";
							// 	}
							// 	break;
							// 	case 'input-formulir-cuti-nonasn':
							// 		// Hanya izinkan akses jika user adalah administrator
							// 		if ($data_level == "Super Admin") {
							// 			include "superadmin/pegawai/input_formulir_cuti_nonasn.php";
							// 		} else {
							// 			echo "<center><h1>Anda tidak memiliki izin untuk mengakses halaman ini.</h1></center>";
							// 		}
							// 		break;
              	case 'super admin':
                  include "home/superadmin.php";
                  break;
				case 'admin':
                  include "home/admin.php";
				  break;
				  case 'input-formulir-cuti-asn':
					include "superadmin/pegawai/input_formulir_cuti_asn.php";
					break;
				case 'input-formulir-cuti-nonasn':
					include "superadmin/pegawai/input_formulir_cuti_nonasn.php";
					break;
				//Pengguna
				case 'data-pengguna':
					include "superadmin/pengguna/data_pengguna.php";
					break;
				case 'add-pengguna':
					include "superadmin/pengguna/add_pengguna.php";
					break;
				case 'edit-pengguna':
					include "superadmin/pengguna/edit_pengguna.php";
					break;
				case 'del-pengguna':
					include "superadmin/pengguna/del_pengguna.php";
					break;
				case 'data-pegawai':
					include "superadmin/pegawai/data_pegawai.php";
					break;
				case 'data-spk':
					include "superadmin/pegawai/data_spk.php";
					break;
				case 'data-cuti-asn':
					include "superadmin/pegawai/data_cuti_asn.php";
					break;
				case 'data-cuti-nonasn':
					include "superadmin/pegawai/data_cuti_nonasn.php";
					break;
				case 'data-pegawai-asn':
					include "superadmin/pegawai/data_pegawai_asn.php";
					break;
				case 'data-pegawai-nonasn':
					include "superadmin/pegawai/data_pegawai_nonasn.php";
					break;
				case 'data-pegawai-aktif':
					include "superadmin/pegawai/data_pegawai_aktif.php";
					break;
				case 'data-pegawai-pensiun':
					include "superadmin/pegawai/data_pegawai_pensiun.php";
					break;
				case 'data-pegawai-mutasi':
					include "superadmin/pegawai/data_pegawai_mutasi.php";
					break;
				// case 'cetak-spk-tekon':
				// 	include "admin/pegawai/cetak_spk_tekon.php";
				// 	break;
				case 'add-pegawai':
					include "superadmin/pegawai/add_pegawai.php";
					break;
				case 'add-pegawai-asn':
					include "superadmin/pegawai/add_pegawai_asn.php";
					break;
				case 'add-pegawai-nonasn':
					include "superadmin/pegawai/add_pegawai_nonasn.php";
					break;
				case 'add-keluarga':
					include "superadmin/pegawai/add_keluarga.php";
					break;
				case 'view-keluarga-nonasn':
					include "superadmin/pegawai/view_keluarga_nonasn.php";
					break;
					case 'view-keluarga-asn':
						include "superadmin/pegawai/view_keluarga_asn.php";
						break;
				// case 'edit-keluarga':
				// 	include "admin/pegawai/edit_keluarga.php";
				// 	break;
				case 'del-keluarga':
					include "superadmin/pegawai/del_keluarga.php";
					break;
				case 'edit-pegawai-asn':
					include "superadmin/pegawai/edit_pegawai_asn.php";
					break;
				case 'edit-pegawai-nonasn':
					include "superadmin/pegawai/edit_pegawai_nonasn.php";
					break;
				case 'edit-keluarga':
					include "superadmin/pegawai/edit_keluarga.php";
					break;
				case 'edit-spk':
					include "superadmin/pegawai/edit_spk.php";
					break;
				case 'cetak-spk':
					include "superadmin/pegawai/cetak_spk.php";
					break;
				case 'del-pegawai-asn':
					include "superadmin/pegawai/del_pegawai_asn.php";
					break;
				case 'del-pegawai-nonasn':
					include "superadmin/pegawai/del_pegawai_nonasn.php";
					break;
				case 'view-pegawai-asn':
					include "superadmin/pegawai/view_pegawai_asn.php";
					break;
				case 'view-pegawai-nonasn':
						include "superadmin/pegawai/view_pegawai_nonasn.php";
						break;
				case 'data-profil':
					include "superadmin/profil/data_profil.php";
					break;
				case 'edit-profil':
					include "superadmin/profil/edit_profil.php";
					break;

              default:
                  echo "<center><h1> ERROR !</h1></center>";
                  break;    
          }
      }else{
          if($data_level=="Super Admin"){
              include "home/superadmin.php";
              }
          elseif($data_level=="Admin"){
              include "home/admin.php";
              }
          }
    ?>

				</div>
			</section>
		</div>

		<footer class="main-footer" style="background-color: #EEEDED">
			<div class="float-right d-none d-sm-block">
				Copyright &copy;
				<a target="_blank" href="https://www.stmikplk.ac.id/">
					<strong style="color: black;"> Mahasiswa STMIK Palangkaraya</strong>
				</a>
				All rights reserved.
			</div>
			<b>Created 2023</b>
		</footer>
		<aside class="control-sidebar control-sidebar-dark">
		</aside>
	</div>
	<script src="plugins/jquery/jquery.min.js"></script>
	<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="plugins/select2/js/select2.full.min.js"></script>
	<script src="plugins/datatables/jquery.dataTables.js"></script>
	<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
	<script src="dist/js/adminlte.min.js"></script>
	<script src="dist/js/demo.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

	<script>
		$(function() {
			$("#example1").DataTable();
			$('#example2').DataTable({
				"paging": true,
				"lengthChange": false,
				"searching": false,
				"ordering": true,
				"info": true,
				"autoWidth": false,
			});
		});
	</script>

	<script>
		$(function() {
			$('.select2').select2()
			$('.select2bs4').select2({
				theme: 'bootstrap4'
			})
		})
	</script>

</body>

</html>