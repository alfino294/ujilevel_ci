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

function onupdate(id_order, id_user, total_bayar) {
    $("#update-data").html("");
    let layoutupdate = `<form action="<?php echo site_url('dashboard/insertTransact');?>" method="POST" >Menyelesaikan Order dengan id <input type="text" name="order_id" class="form-control" readonly value="${id_order}"> dengan id customer<input type="text" class="form-control" name="customer_id" readonly value="${id_user}"> Total bayar<input type="text" class="form-control" name="total_price" readonly value="${total_bayar}"><button type="submit" class="btn btn--radius-2 btn-primary btn-block mt-3">PAY NOW</button></form>`
    $("#update-data").append(layoutupdate)
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

    <!-- Main Content -->
    <div id="content">

   

        <!-- Begin Page Content -->
        <div class="container-fluid">


            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary text-center">Data Order</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID Order</th>
                                    <th>Tanggal</th>
                                    <th>ID User</th>
                                    <th>Keterangan</th>
                                    <th>Status</th>
                                    <th>Total Bayar</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                            foreach ($order as $data) {
                            ?>
                                <tr>
                                    <td><?= $data->id_order?></td>
                                    <td><?= $data->tanggal?></td>
                                    <td><?= $data->id_user?></td>
                                    <td><?= $data->keterangan?></td>
                                    <td><?= $data->status_order?></td>
                                    <td><?= $data->total_bayar?></td>
                                    <td>
                                        <button type="button" class="btn btn-warning" data-toggle="modal"
                                            data-target="#editModal"
                                            onclick="onupdate('<?php echo $data->id_order?>', '<?php echo $data->id_user?>', '<?php echo $data->total_bayar?>')">pay now</button>
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
 
</body>

 <!-- Bootstrap core JavaScript-->
 <script src="<?php echo base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  
  <!-- Page level plugins -->
  <script src="<?php echo base_url('assets/'); ?>vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?php echo base_url('assets/'); ?>js/demo/chart-area-demo.js"></script>
  <script src="<?php echo base_url('assets/'); ?>js/demo/chart-pie-demo.js"></script>
   

</html>