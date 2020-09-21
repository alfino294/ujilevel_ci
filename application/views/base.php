<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>

<style>
    .navbar{
    background-color: rgb(148, 205, 228);
    color: white;

}

.jumbotron{
    text-align: center;
    color: white;
    width: 100%;
    background-image: url('assets/img/bg3.png');
    background-repeat:no-repeat;
    background-size: 100%;
    background-position: bottom;
}

</style>

<body>

<nav class="navbar">
  <a class="navbar-brand" >
  <i class="fas fa-utensils"></i>
    Starbhak Mart
  </a>
</nav>
<div class="jumbotron">
  <h1 class="display-4">STARBHAK MART</h1>
 
  <hr class="my-4">
  <p>Anda bisa memesan online</p>
  <a class="btn btn-primary btn-lg" href="<?php echo site_url('dashboard/login');?>" role="button">Pesan sekarang</a>
</div>

  

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="mt-0">Hubungi customer service kami</h2>
                        <hr class="divider my-4" />
                        <p class="text-muted mb-5">Anda bisa hubungi kontak dibawah ini 24 jam</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
                        <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
                        <div>0895704268728</div>
                    </div>
                    <div class="col-lg-4 mr-auto text-center">
                        <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
                        <a class="d-block" href="">alfinoputralaksana294@gmail.com</a>
                    </div>
                </div>
            </div>
     
        <footer class="bg-light py-5">
            <div class="container"><div class="small text-center text-muted">Copyright © 2020 - Starbhak Mart</div></div>
        </footer>
       

</body>
</html>