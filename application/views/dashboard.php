<!doctype html>
<html lang="en">
  <head>
  	<title>Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js" integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
						<i class="fa fa-bars"></i>
						<span class="sr-only">Toggle Menu</span>
					</button>
				</div>
				<div class="p-4">
		  		<h1><a href="index.html" class="logo">Portfolic <span>Portfolio Agency</span></a></h1>
	        <ul class="list-unstyled components mb-5">
	          <li class="active">
	            <a href="<?= base_url(); ?>web_application/dashboard"><span class="fa fa-tachometer mr-3"></span> Dashboard</a>
	          </li>
	          <li>
	              <a href="<?= base_url(); ?>web_application/konsumen"><span class="fa fa-user mr-3"></span> Konsumen</a>
	          </li>
	          <li>
              <a href="<?= base_url(); ?>web_application/property"><span class="fa fa-briefcase mr-3"></span> Property</a>
	          </li>
	          <li>
              <a href="<?= base_url(); ?>web_application/transaksi"><span class="fa fa-paper-plane mr-3"></span> Transaksi</a>
	          </li>
	          <li>
              <a href="<?= base_url(); ?>web_application/pengguna"><span class="fa fa-user-o mr-3"></span> Pengguna</a>
	          </li>
	          <li>
              <a href="<?= base_url(); ?>web_application/logout"><span class="fa fa-sign-out mr-3"></span> Logout</a>
	          </li>
	          <!-- <li>
              <a href="#"><span class="fa fa-sticky-note mr-3"></span> Contacts</a>
	          </li> -->
	        </ul>

	        <div class="footer">
	        	<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This application is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://kodekulaku.com" target="_blank">Colorlib.com</a>
						  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
	        </div>

	      </div>
    	</nav>

        <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4">Dashboard</h2>
		<div class="row">
        <div class="card w-25">
			<div class="card-body">
				<h5 class="card-title">Penjualan</h5>
				<p class="card-text">Gambar</p>
				<a href="#" class="btn btn-primary">Detail</a>
			</div>
		</div>
        <div class="card w-25">
			<div class="card-body">
				<h5 class="card-title">Transaksi</h5>
				<p class="card-text">Approve</p>
				<a href="#" class="btn btn-primary">Detail</a>
			</div>
		</div>
        <div class="card w-25">
			<div class="card-body">
				<h5 class="card-title">Transaksi</h5>
				<p class="card-text">Cancel</p>
				<a href="#" class="btn btn-primary">Detail</a>
			</div>
		</div>
        <div class="card w-25">
			<div class="card-body">
				<h5 class="card-title">Available</h5>
				<p class="card-text">Jumlah Rumah blum Terjual</p>
				<a href="#" class="btn btn-primary">Detail</a>
			</div>
		</div>
		</div>
	</div>
	</div>

    <script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/popper.js"></script>
    <script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/main.js"></script>
  </body>
</html>