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
						<button type="button" class="btn btn-primary">
						<a href="<?= site_url('dashboard/exportPdfTransaksi') ?>"
								style="text-decoration: none; color: white;">EXPORT PDF</a>
						</button>
					</div>

					<!-- DataTales Example -->
					<div class="card shadow mb-4">
						<div class="card-header py-3">
							<h6 class="m-0 font-weight-bold text-primary text-center">Data Transaksi</h6>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th>ID Transaksi</th>
											<th>ID User</th>
											<th>ID Order</th>
											<th>Tanggal</th>
                                            <th>Total Bayar</th>
                                            <th>Status</th>
											<th class="text-center">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
									foreach ($transaksi as $data) {
									?>
										<tr>
											<td><?= $data->id_transaksi?></td>
											<td><?= $data->id_user?></td>
											<td><?= $data->id_order?></td>
											<td><?= $data->tanggal?></td>
                                            <td><?= $data->total_bayar?></td>
											<td><?= $data->status_order?></td>
											<td>
												<button type="button" class="btn btn-warning view-data" id="<?php echo $data->id_transaksi?>">Invoice</button>
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

<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script> 
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
		integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
	</script>
	<script type="text/javascript">
        $(document).ready(function(){
            $('.view-data').click(function(){
                var id = $(this).attr('id');
                $.ajax({
                    url: "<?=base_url()?>dashboard/detailTransaction",
                    method: "POST",
                    data: {id:id},
                    success: function(data){
                        $('#detail_result').html(data);
                        $('#infoModal').modal('show')
                    }
             });
         });
     });  
    </script>

<?php
        $this->load->view('partial/initdatatables');
	?>
</body>

 
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
