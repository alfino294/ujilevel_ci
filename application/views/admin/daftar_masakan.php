<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url('assets/'); ?> vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

  <script>

function ondelete(id_masak, name_product) {
			$("#delete-data").html("")
			let layout =
				`<form action="<?php echo site_url('dashboard/delete_makanan');?>" method="POST" >Menghapus <input type="text" name="name_product" readonly value="${name_product}"> dengan id <input type="text" name="id_masak" readonly value="${id_masak}"><button type="submit" class="btn btn--radius-2 btn-danger btn-block mt-3">Delete</button></form>`
			$("#delete-data").append(layout)
		}

function onupdate(id, name, price, stock) {
			$("#update-data").html("");
			let layoutupdate = `<div class="card card-7">
						<div class="card-body">
            <form method="POST" action="<?php echo site_url('dashboard/update_makanan'); ?>">
								<div class="form-group">
									<div class="name">ID</div>
									<div class="value">
										<div class="input-group">
											<input class="form-control" type="text" name="id_masak" readonly value="${id}"/>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="name">Nama Makanan</div>
									<div class="value">
										<div class="input-group">
											<input class="form-control" type="text" name="name_product" value="${name}"/>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="name">Harga</div>
									<div class="value">
										<div class="input-group">
											<input class="form-control" type="text" name="harga_product" value="${price}"/>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="name">Status Makanan</div>
									<div class="value">
										<div class="input-group">
											<input type="text" class="form-control" name="status_product" value="${stock}">
										</div>
									</div>
								</div>
								<div class="form-gropu">
									<div class="name">Image</div>
									<div class="value">
										<div class="input-group">
											<input type="file" class="form-control-file input--style-5" id="gambar_product" name="gambar_product">
										</div>
									</div>
								</div>
								<div class="text-center">
									<button class="btn btn--radius-2 btn-success btn-block btn-lg" type="submit">
										Submit
									</button>
								</div>
							</form>
						</div>
					</div>`
			$("#update-data").append(layoutupdate)
		}


  function oninsert() {
			$("#insert-data").html("");
			let layoutupdate = `<div class="card card-7">
						<div class="card-body">
            <form method="POST" action="<?php echo site_url('dashboard/insert_makanan'); ?>">
								<div class="form-group">
									<div class="name">Nama Product</div>
									<div class="value">
										<div class="input-group">
											<input class="form-control" type="text" name="name_product"/>
										</div>
									</div>
								</div>
                <div class="form-group">
									<div class="name">Image</div>
									<div class="value">
										<div class="input-group">
											<input type="file" class="form-control-file input--style-5" id="image_product" name="gambar_product">
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="name">Harga</div>
									<div class="value">
										<div class="input-group">
											<input class="form-control" type="text" name="harga_product"/>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="name">Status Makanan</div>
									<div class="value">
                  <select class="form-control" name="status_product" id="">
                    <option>ready</option>
                    </select>
									</div>
								</div>
								<div class="text-center">
									<button class="btn btn--radius-2 btn-success btn-block btn-lg" type="submit">
										Submit
									</button>
								</div>
							</form>
						</div>
					</div>`
			$("#insert-data").append(layoutupdate)
		}
    </script>

</head>

<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<?php
            $this->load->view('partial/sidebar_admin');
        ?>
		<!-- End of Sidebar -->

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

				<?php
             $this->load->view('partial/topbar');
            ?>

				<!-- Begin Page Content -->
				<div class="container-fluid">

					<div class="container my-3 text-right">
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#insertModal"
							onclick="oninsert()">Tambah Produk</button>
					</div>

					<!-- DataTales Example -->
					<div class="card shadow mb-4">
						<div class="card-header py-3">
							<h6 class="m-0 font-weight-bold text-primary text-center">Data Product</h6>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th>ID Makanan</th>
											<th>Image</th>
											<th>Nama Makanan</th>
											<th>Harga</th>
											<th>Status masakan</th>
											<th class="text-center">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
									foreach ($masakan as $data) {
									?>
										<tr>
											<td><?= $data->id_masakan?></td>
											<td class="text-center"><img src="<?php echo base_url('assets/product/').$data->gambar;?>" width="100"></td>
											<td><?= $data->nama_masakan?></td>
											<td><?= $data->harga?></td>
											<td><?= $data->status_masakan?></td>
											<td>
												<button type="button" class="btn btn-warning" data-toggle="modal"
													data-target="#editModal"
													onclick="onupdate('<?php echo $data->id_masakan?>', '<?php echo $data->nama_masakan?>', '<?php echo $data->harga?>', '<?php echo $data->status_masakan?>')">Edit</button>
												<button type="button" class="btn btn-danger" data-toggle="modal"
													data-target="#deleteModal"
													onclick="ondelete('<?php echo $data->id_masakan?>', '<?php echo $data->nama_masakan?>')">Delete</button>
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

				</div>
				<!-- /.container-fluid -->

			</div>
			<!-- End of Main Content -->

			<?php
             $this->load->view('partial/footer');
            ?>

		</div>
		<!-- End of Content Wrapper -->

	</div>
	<!-- End of Page Wrapper -->

	<!-- Scroll to Top Button-->
	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>

	<?php
        $this->load->view('partial/cudmodal');
	?>

	<?php
        $this->load->view('partial/logoutmodal');
	?>

<?php
        $this->load->view('partial/initdatatables');
	?>



    

 

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

 
  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?php echo base_url('assets/'); ?>vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?php echo base_url('assets/'); ?>js/demo/chart-area-demo.js"></script>
  <script src="<?php echo base_url('assets/'); ?>js/demo/chart-pie-demo.js"></script>

</body>

</html>
