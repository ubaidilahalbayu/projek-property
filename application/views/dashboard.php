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
	<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
		
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
		  		<h1><a href="index.html" class="logo">MIS <span>Marketing Information System</span></a></h1>
	        <ul class="list-unstyled components mb-5">
	          <li class="active">
	            <a href="<?= base_url(); ?>myweb/dashboard"><span class="fa fa-tachometer mr-3"></span> Dashboard</a>
	          </li>
	          <li>
	              <a href="<?= base_url(); ?>myweb/konsumen"><span class="fa fa-user mr-3"></span> Konsumen</a>
	          </li>
	          <li>
              <a href="<?= base_url(); ?>myweb/property"><span class="fa fa-briefcase mr-3"></span> Property</a>
	          </li>
	          <li>
				<?php
				$transaksi = "";
				$pengguna = "";
				$sales = "";
				$riwayat = "";
				if ($this->session->level<3 && $this->session->level>0) {
					$transaksi = base_url("myweb/transaksi");
				}
				if ($this->session->level==1) {
					$transaksi = base_url("myweb/transaksi");
					$pengguna = base_url("myweb/pengguna");
					$sales = base_url("myweb/sales");
					$riwayat = base_url("myweb/riwayat");
				}
				?>
              <a id="htrans" href="<?= $transaksi; ?>"><span class="fa fa-paper-plane mr-3"></span> Transaksi</a>
	          </li>
	          <li>
              <a id="hriw" href="<?= $riwayat; ?>"><span class="fa fa-paper-plane mr-3"></span> Riwayat</a>
	          </li>
	          <li>
              <a id="hpeng" href="<?= $pengguna; ?>"><span class="fa fa-user-o mr-3"></span> Pengguna</a>
	          </li>
	          <li>
              <a id="hsal" href="<?= $sales; ?>"><span class="fa fa-user mr-3"></span> Sales</a>
	          </li>
	          <li>
              <a href="<?= base_url(); ?>myweb/logout"><span class="fa fa-sign-out mr-3"></span> Logout</a>
	          </li>
			  <?php
				if ($this->session->level>1) {
				?>
				<script type="text/javascript">
					$("#hpeng").click(function(){
						alert("anda bukan owner");
					});
					$("#hsal").click(function(){
						alert("anda bukan owner");
					});
					$("#hriw").click(function(){
						alert("anda bukan owner");
					});
				</script>
				<?php
				if ($this->session->level>2) {
				?>
				<script type="text/javascript">
					$("#htrans").click(function(){
						alert("anda bukan superadmin/owner");
					});
				</script>
				<?php
				}
				}
				?>
	          <!-- <li>
              <a href="#"><span class="fa fa-sticky-note mr-3"></span> Contacts</a>
	          </li> -->
	        </ul>

	        <div class="footer">
	        	<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This application is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://kodekulaku.com" target="_blank">kodekulaku.com</a>
						  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
	        </div>

	      </div>
    	</nav>
<div class="modal" tabindex="-1" id="penjualanModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Detail Penjualan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="data_penjualan">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

        <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4">Dashboard</h2>
		<div class="row">
        <div class="card w-25">
			<div class="card-body">
				<h5 class="card-title">Penjualan</h5>
				<div id="penjualan"></div>
				<a href="#" data-bs-toggle="modal" data-bs-target="#penjualanModal" class="btn btn-primary">Detail</a>
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
	<script type="text/javascript">
		$(document).ready( function () {
			var base_url = window.location.origin;
			var path_name = window.location.pathname.split( '/' );
			base_url += "/"+path_name[1]+"/";

			$.ajax({
					url: base_url+"api/sales"
				})
				.done(function( res ) {
					var sales = res['data'];
					$.ajax({
							url: base_url+"api/customer"
						})
						.done(function( res ) {
							var addTb = "";
							var customer = res['data'];
							var jlh_penjualan = [];
							var terbanyak = 0;
							var idx_terbanyak = 0;
							// console.log(customer);
							for (let i = 0; i < sales.length; i++) {
								var jlh = 0;
								for (let j = 0; j < customer.length; j++) {
									if (sales[i]['nik_sales']==customer[j]['sales']) {
										jlh += 1;
									}
								}
								if(jlh > terbanyak){
									terbanyak = jlh;
									idx_terbanyak = i;
								}
								addTb += "<p>"+(i+1)+".) Nama Sales: "+sales[i]['nama_sales']+"; Penjualan ("+jlh+")</p>";
							}
							$("#data_penjualan").append(addTb);
							$("#penjualan").append("<p>Top : "+sales[idx_terbanyak]['nama_sales']+" ("+terbanyak+")</p>")
						});
				});
		});
	</script>
    <script src="<?= base_url(); ?>assets/js/main.js"></script>
  </body>
</html>