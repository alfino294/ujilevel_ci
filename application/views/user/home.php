<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

	<script>
		function ondelete(id, productname) {
			$("#delete-data").html("")
			let layout =
				`<form action="<?php echo site_url('Waiter/deleteProduct');?>" method="POST" >Menghapus <input type="text" name="product_name" readonly value="${productname}"> dengan id <input type="text" name="product_id" readonly value="${id}"><button type="submit" class="btn btn--radius-2 btn-danger btn-block mt-3">Delete</button></form>`
			$("#delete-data").append(layout)
		}

		function onupdate(id, name, price, stock) {
			$("#update-data").html("");
			let layoutupdate = `<div class="card card-7">
						<div class="card-body">
							<form method="POST" action="<?php echo site_url('Waiter/updateProduct'); ?>" enctype="multipart/form-data">
								<div class="form-row">
									<div class="name">ID</div>
									<div class="value">
										<div class="input-group">
											<input class="input--style-5" type="text" name="id_product" readonly value="${id}"/>
										</div>
									</div>
								</div>
								<div class="form-row">
									<div class="name">Nama Product</div>
									<div class="value">
										<div class="input-group">
											<input class="input--style-5" type="text" name="name_product" value="${name}"/>
										</div>
									</div>
								</div>
								<div class="form-row">
									<div class="name">Harga</div>
									<div class="value">
										<div class="input-group">
											<input class="input--style-5" type="text" name="price_product" value="${price}"/>
										</div>
									</div>
								</div>
								<div class="form-row">
									<div class="name">Stock</div>
									<div class="value">
										<div class="input-group">
											<input type="text" class="input--style-5" name="stock_product" value="${stock}">
										</div>
									</div>
								</div>
								<div class="form-row">
									<div class="name">Image</div>
									<div class="value">
										<div class="input-group">
											<input type="file" class="form-control-file input--style-5" id="image_product" name="image_product">
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
							<form method="POST" action="<?php echo site_url('dashboard/insert_makanan'); ?>" enctype="multipart/form-data">
								<div class="form-row">
									<div class="name">Nama Makanan</div>
									<div class="value">
										<div class="input-group">
											<input class="input--style-5" type="text" name="name_product"/>
										</div>
									</div>
								</div>
								<div class="form-row">
									<div class="name">Harga</div>
									<div class="value">
										<div class="input-group">
											<input class="input--style-5" type="text" name="harga_product"/>
										</div>
									</div>
								</div>
								<div class="form-row">
									<div class="name">Status Makanan</div>
									<div class="value">
										<div class="input-group">
											<input type="text" class="input--style-5" name="status_product">
										</div>
									</div>
								</div>
								<div class="form-row">
									<div class="name">Gambar</div>
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
			$("#insert-data").append(layoutupdate)
		}
	</script>
</head>
<style>
  .navbar{
    background-color: rgb(148, 205, 228);
    color: white;

   
}

.nav-link{
    color: gray;
}



    
  
</style>
<body>



<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<?php
            $this->load->view('partial/navbar_user');
        ?>
		<!-- End of Sidebar -->

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			

		
			

				<!-- Begin Page Content -->
				<div class="container">
					
			
					<hr>
				
					
						<div class="row">
							<div class="col-xl-8 col-lg-7">
								<?php $this->load->view('partial/listproduct'); ?>
							</div>
							<div class="col-xl-4 col-lg-5">
								<?php $this->load->view('partial/cart'); ?>
							</div>
						</div>
					</div>

				


		
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

	<?php
		$this->load->view('partial/orderscript');
	?>

	
<?php
             $this->load->view('partial/footer');
            ?>	


 
</body>


         <!-- Bootstrap core JavaScript-->
		 <script src="<?php echo base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  

</html>