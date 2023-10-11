<!doctype html>
<html lang="en">
  <head>
  	<title>Transaksi</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
  
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
	<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
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
	          <li>
	            <a href="<?= base_url(); ?>web_application/dashboard"><span class="fa fa-tachometer mr-3"></span> Dashboard</a>
	          </li>
	          <li>
	              <a href="<?= base_url(); ?>web_application/konsumen"><span class="fa fa-user mr-3"></span> Konsumen</a>
	          </li>
	          <li>
              <a href="<?= base_url(); ?>web_application/property"><span class="fa fa-briefcase mr-3"></span> Property</a>
	          </li>
	          <li>
				<?php
				$transaksi = "";
				$pengguna = "";
				if ($this->session->level<3 && $this->session->level>0) {
					$transaksi = base_url("web_application/transaksi");
				}
				if ($this->session->level==1) {
					$transaksi = base_url("web_application/transaksi");
					$pengguna = base_url("web_application/pengguna");
				}
				?>
              <a id="htrans" href="<?= $transaksi; ?>"><span class="fa fa-paper-plane mr-3"></span> Transaksi</a>
	          </li>
	          <li>
              <a id="hpeng" href="<?= $pengguna; ?>"><span class="fa fa-user-o mr-3"></span> Pengguna</a>
	          </li>
	          <li>
              <a href="<?= base_url(); ?>web_application/logout"><span class="fa fa-sign-out mr-3"></span> Logout</a>
	          </li>
			  <?php
				if ($this->session->level>1) {
				?>
				<script type="text/javascript">
					$("#hpeng").click(function(){
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
						  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This application is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://kodekulaku.com" target="_blank">Colorlib.com</a>
						  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
	        </div>

	      </div>
    	</nav>

<!-- Modal -->
<div class="modal fade" id="transaksiModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Form Transaksi</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="form_transaksi">
			<input type="text" id="id_dummy" name="id_dummy" hidden>
			<input type="text" id="status" name="status" hidden>
			<input type="text" id="waktu_mulai" name="waktu_mulai" hidden>
			<input type="text" id="waktu_akhir" name="waktu_akhir" hidden>
		<div class="mb-3">
			<label for="customer" class="form-label">Customer</label>
			<select class="form-select" aria-label="Default select example" id="customer" name="customer">
			<option value="">Pilih</option>
			</select>
		</div>
		<div class="mb-3">
			<label for="property" class="form-label">Properti</label>
			<select class="form-select" aria-label="Default select example" id="property" name="property">
			<option value="">Pilih</option>
			</select>
		</div>
		<div class="mb-3">
			<label for="metode_pembayaran" class="form-label">Metode Pembayaran</label>
			<select class="form-select" aria-label="Default select example" id="metode_pembayaran" name="metode_pembayaran">
			<option value="">Pilih</option>
			</select>
		</div>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" form="form_transaksi" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</div>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4">Data Transaksi</h2>
		<!-- Button trigger modal -->
		<button id="btn_tambah_transaksi" type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#transaksiModal">
			Tambah Transaksi
		</button>
		<hr>
		<table id="tabel_transaksi" class="table">
			<thead class="table-light">
				<tr>
					<th scope="col">ID Transaksi</th>
					<th scope="col">Customer</th>
					<th scope="col">Properti</th>
					<th scope="col">Status</th>
					<th scope="col">Metode Pembayaran</th>
					<th scope="col">Waktu Mulai</th>
					<th scope="col">Waktu Akhir</th>
					<th scope="col">Aksi</th>
				</tr>
			</thead>
		</table>
      </div>
	</div>
	<script type="text/javascript">
		$(document).ready( function () {
			var base_url = window.location.origin;
			var path_name = window.location.pathname.split( '/' );
			base_url += "/"+path_name[1]+"/";
			// console.log(base_url);

			var tabel_transaksi = $('#tabel_transaksi').DataTable({
                  "columnDefs": [
                    { className: 'text-center', targets: "_all" },
                    { className: 'align-middle', targets: "_all" }
                  ]
                });
			renderTabelTransaksi();
			$.ajax({
				url: base_url+"api/property"
			}).done(function (res) {
				// console.log(res);
				if (res['status']) {
					data = res['data'];
					for (let i = 0; i < data.length; i++) {
						if (data[i]['terjual']==0) {
							var o = new Option("("+data[i]['id_property']+") "+data[i]['nama_property']+" ("+data[i]['harga']+")", data[i]['id_property']);
							/// jquerify the DOM object 'o' so we can use the html method
							// $(o).html(data[i]['nama_tipe']);
							$("#property").append(o);
						}
					}
				}
			});
			$.ajax({
				url: base_url+"api/customer"
			}).done(function (res) {
				// console.log(res);
				if (res['status']) {
					data = res['data'];
					for (let i = 0; i < data.length; i++) {
						var o = new Option("("+data[i]['nik']+") "+data[i]['nama_customer'], data[i]['id_customer']);
						/// jquerify the DOM object 'o' so we can use the html method
						// $(o).html(data[i]['nama_tipe']);
						$("#customer").append(o);
					}
				}
			});
			$.ajax({
				url: base_url+"api/transaksi/metodepembayaran"
			}).done(function (res) {
				// console.log(res);
				if (res['status']) {
					data = res['data'];
					for (let i = 0; i < data.length; i++) {
						var o = new Option(data[i]['metode'], data[i]['id_pembayaran']);
						/// jquerify the DOM object 'o' so we can use the html method
						// $(o).html(data[i]['nama_tipe']);
						$("#metode_pembayaran").append(o);
					}
				}
			});

			function renderTabelTransaksi(){
				tabel_transaksi.clear();
				$.ajax({
					url: base_url+"api/transaksi"
				})
				.done(function( res ) {
					// console.log(res); //"Sample of data:", data.slice( 0, 100 ) );
					
					if (res['status']) {
						var data_transaksi = res['data'];
						   
						for(i=0;i<data_transaksi.length;i++){
							// var no = i+1
							var status = "On Going";
							var btn_hapus ="";
							var btn_aprov ="<button type='button' class='btn btn-warning btn-sm btn-aprov' id_trans='"+data_transaksi[i]['id_transaksi']+"' id_prop='"+data_transaksi[i]['property']+"'>Aprove</button>";
							var btn_cancel ="<button type='button' class='btn btn-danger btn-sm btn-cancel' id_trans='"+data_transaksi[i]['id_transaksi']+"'>Cancel</button>";
							if (data_transaksi[i]['status']==1) {
								status = "Aproved";
								btn_aprov ="";
								btn_cancel ="";
								btn_hapus ="<button type='button' class='btn btn-danger btn-sm btn-hapus' id_trans='"+data_transaksi[i]['id_transaksi']+"'>Hapus</button>";
							}else if (data_transaksi[i]['status']==2) {
								status = "Canceled";
								btn_aprov ="";
								btn_cancel ="";
								btn_hapus ="<button type='button' class='btn btn-danger btn-sm btn-hapus' id_trans='"+data_transaksi[i]['id_transaksi']+"'>Hapus</button>";
							}
							tabel_transaksi.row.add( [
									data_transaksi[i]['id_transaksi'],
									data_transaksi[i]['customer'],
									data_transaksi[i]['property'],
									status,
									data_transaksi[i]['metode'],
									data_transaksi[i]['waktu_mulai'],
									data_transaksi[i]['waktu_akhir'],
									btn_aprov+" "+btn_hapus+" "+btn_cancel
							] ).draw( false );
						
						}
					}
				});
			}

			$("#btn_tambah_transaksi").click(function(){
				$("#id_dummy").val('');
				$("#customer").val('');
				$("#property").val('');
				$("#metode_pembayaran").val('');
				$("#status").val('0');
				$("#waktu_mulai").val('');
				$("#waktu_akhir").val('');
			});

			$("#tabel_transaksi tbody").on('click','.btn-aprov', function(){
            	var id = $(this).attr('id_trans');
            	var id_prop = $(this).attr('id_prop');
            	if(confirm("Apakah transaksi "+id+" akan diaprove?")){
					
				const currentDate = new Date();

				const currentDayOfMonth = currentDate.getDate();
				const currentMonth = currentDate.getMonth(); // Be careful! January is 0, not 1
				const currentYear = currentDate.getFullYear();
				const currentHours = currentDate.getHours();
				const currentMinutes = currentDate.getMinutes();
				const currentSeconds = currentDate.getSeconds();

				const dateString = currentYear + "-" + (currentMonth + 1) + "-" + currentDayOfMonth;
				const timeString = currentHours + ":" + currentMinutes + ":" + currentSeconds;
				var timestamp = dateString + " " + timeString;
				$.ajax({
					url: base_url+"api/transaksi",
					method: "put",
					data: {
						id_dummy: id,
						id_transaksi: id,
						status: 1,
						waktu_akhir: timestamp
					}
				}).done(function( res ) {
					if(res['status']){
						alert("Transaksi Aproved!");
					}else{
						alert("ERROR");
					}
				});
				$.ajax({
					url: base_url+"api/property",
					method: "put",
					data: {
						id_dummy: id_prop,
						id_property: id_prop,
						terjual: 1,
						waktu_terjual: timestamp
					}
				}).done(function( res ) {
					if(res['status']){
						alert("Property Updated!");
					}else{
						alert("ERROR");
					}
				});

				location.reload();

				}
       		});
			   $("#tabel_transaksi tbody").on('click','.btn-cancel', function(){
            	var id = $(this).attr('id_trans');
            	if(confirm("Apakah transaksi "+id+" akan dicancel?")){
					
				const currentDate = new Date();

				const currentDayOfMonth = currentDate.getDate();
				const currentMonth = currentDate.getMonth(); // Be careful! January is 0, not 1
				const currentYear = currentDate.getFullYear();
				const currentHours = currentDate.getHours();
				const currentMinutes = currentDate.getMinutes();
				const currentSeconds = currentDate.getSeconds();

				const dateString = currentYear + "-" + (currentMonth + 1) + "-" + currentDayOfMonth;
				const timeString = currentHours + ":" + currentMinutes + ":" + currentSeconds;
				var timestamp = dateString + " " + timeString;
				$.ajax({
					url: base_url+"api/transaksi",
					method: "put",
					data: {
						id_dummy: id,
						id_transaksi: id,
						status: 2,
						waktu_akhir: timestamp
					}
				}).done(function( res ) {
					if(res['status']){
						alert("Transaksi Canceled!");
						location.reload();
					}else{
						alert("ERROR");
					}
				});
				}
       		});
			
			$("#form_transaksi").submit(function(event){
				event.preventDefault();
				var data = $( this ).serialize();
				const currentDate = new Date();

				const currentDayOfMonth = currentDate.getDate();
				const currentMonth = currentDate.getMonth(); // Be careful! January is 0, not 1
				const currentYear = currentDate.getFullYear();
				const currentHours = currentDate.getHours();
				const currentMinutes = currentDate.getMinutes();
				const currentSeconds = currentDate.getSeconds();

				const dateString = currentYear + "-" + (currentMonth + 1) + "-" + currentDayOfMonth;
				const timeString = currentHours + ":" + currentMinutes + ":" + currentSeconds;
				var timestamp = dateString + " " + timeString;
				// console.log(timestamp);
				if ($("#property").val()==""||$("#customer").val()==""||$("#metode_pembayaran").val()=="") {
					alert("Silahkan Pilih Terlebih Dahulu!!");					
				}else{
					if ($("#id_dummy").val()=="") {
						data = {
							id_transaksi: "",
							customer: $("#customer").val(),
							property: $("#property").val(),
							metode_pembayaran: $("#metode_pembayaran").val(),
							status: $("#status").val(),
							waktu_mulai: timestamp,
							waktu_akhir: $("#waktu_akhir").val()
						};
						$.ajax({
							method: "post",
							url: base_url+"api/transaksi",
							data: data
						}).done(function(res){
							console.log(res);
							if (res['status']) {
								$("#transaksiModal").modal("hide");
								alert("Success!");
								location.reload();
							}else{
								alert("Failed!!");
							}
						});
					}else{
						data = {
							id_dummy: $("#id_dummy").val(),
							id_transaksi: $("#id_dummy").val(),
							customer: $("#customer").val(),
							property: $("#property").val(),
							metode_pembayaran: $("#metode_pembayaran").val(),
							status: $("#status").val(),
							waktu_mulai: $("#waktu_mulai").val(),
							waktu_akhir: $("#waktu_akhir").val()
						};
						$.ajax({
							method: "put",
							url: base_url+"api/transaksi",
							data: data
						}).done(function(res){
							// console.log(data['id_dummy']);
							var check = res['data'];
							if (res['status']) {
								$("#transaksiModal").modal("hide");
								alert("Success!");
								location.reload();
							}else{
								if (data['customer']==check['customer']&&
								data['property']==check['property']&&
								data['metode_pembayaran']==check['metode_pembayaran']) {
									alert("data tidak ada yg berubah")
								}else{
									alert("Failed!!");
								}
							}
						});
					}
				}

			});

			$("#tabel_transaksi tbody").on('click','.btn-hapus', function(){
				var id = $(this).attr('id_trans');
				
				var removingRow = $(this).closest('tr');
				if(confirm("Apakah data dengan id transaksi "+id+" akan dihapus?")){
				$.ajax({
					method: "delete",
					url: base_url+"api/transaksi",
					data: {id_transaksi: id}
				}).done(function( res ) {
					if(res['status']){
						alert("Data berhasil dihapus");
						location.reload();
					}
					else{
						alert("data GAGAL dihapus");
					}
				});
				}
        	});
		});
		
	</script>
    <script src="<?= base_url(); ?>assets/js/main.js"></script>
  </body>
</html>