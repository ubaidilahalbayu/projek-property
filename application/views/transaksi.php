<!doctype html>
<html lang="en">
  <head>
  	<title>Transaksi</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- <link rel="icon" type="image/png" href="<?= base_url(); ?>assets2/images/icons/favicon.ico"/> -->

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
		  		<h1><a href="index.html" class="logo">MIS <span>Marketing Information System</span></a></h1>
	        <ul class="list-unstyled components mb-5">
	          <li>
	            <a href="<?= base_url(); ?>myweb/dashboard"><span class="fa fa-tachometer mr-3"></span> Dashboard</a>
	          </li>
	          <li>
	              <a href="<?= base_url(); ?>myweb/konsumen"><span class="fa fa-user mr-3"></span> Konsumen</a>
	          </li>
	          <li>
              <a href="<?= base_url(); ?>myweb/property"><span class="fa fa-briefcase mr-3"></span> Property</a>
	          </li>
	          <li class="active">
				<?php
				$transaksi = "";
				$pengguna = "";
				if ($this->session->level<3 && $this->session->level>0) {
					$transaksi = base_url("myweb/transaksi");
				}
				if ($this->session->level==1) {
					$transaksi = base_url("myweb/transaksi");
					$pengguna = base_url("myweb/pengguna");
				}
				?>
              <a id="htrans" href="<?= $transaksi; ?>"><span class="fa fa-paper-plane mr-3"></span> Transaksi</a>
	          </li>
	          <li>
              <a id="hpeng" href="<?= $pengguna; ?>"><span class="fa fa-user-o mr-3"></span> Pengguna</a>
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


<!-- Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Transaksi</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="isi_detail">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Download</button>
      </div>
    </div>
  </div>
</div>


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
		<div class="mb-3">
			<label for="harga_buka" class="form-label">Harga Buka(Rupiah)</label>
			<input type="number" class="form-control" id="harga_buka" name="harga_buka">
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
					<th scope="col">Harga Buka(Rp.)</th>
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
                    { width: '15%', targets: [3] },
                    // { width: '15%', targets: [8] },
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
						var desk = JSON.parse(data[i]['deskripsi_property']);
						var jenis = "";
						if (desk['jenis_property']==1) {
							jenis = "Tanah";
						}else if (desk['jenis_property']==2) {
							jenis = "Rumah";
						}
						if (data[i]['stock']>0) {
							var o = new Option(data[i]['nama_property']+"("+jenis+") Stock("+data[i]['stock']+")", data[i]['id_property']);
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
							var dpp = (parseInt(data_transaksi[i]['harga_buka'])+3000000)/1.16;
							var ppn = 11/100*dpp;
							var bphtb = (dpp-60000000)*5/100;
							var desk = JSON.parse(data_transaksi[i]['deskripsi_property']);
							var ajb = desk['ajb'];
							var hpp_tanah = 0;
							var hpp_bangunan = 0;
							var hpp_infrastruktur = 0;
							var closing_fee = 0;
							var komisi_fee = 0;
							var pph_final = dpp * 2.5/100;
							if (desk['jenis_property'] == 1) {
								hpp_tanah = parseInt(desk['luas_tanah']) * parseInt(desk['hpp_tanah']);
								komisi_fee = parseInt(data_transaksi[i]['harga_buka']) * 1.375/100;
							}else if (desk['jenis_property'] == 2) {
								hpp_tanah = parseInt(desk['luas_tanah']) * parseInt(desk['hpp_tanah']);
								hpp_bangunan = parseInt(desk['luas_bangunan']) * parseInt(desk['hpp_bangunan']);
								hpp_infrastruktur = parseInt(desk['infrastruktur']) * parseInt(desk['luas_tanah']);
								closing_fee = 1.25/100 * (parseInt(data_transaksi[i]['harga_buka'])-ppn);
								if (closing_fee >= 4000000) {
									closing_fee = 4000000;
								}
								komisi_fee = dpp * 1.25/100;
							}
							var total_biaya = hpp_tanah + hpp_bangunan + hpp_infrastruktur + closing_fee + komisi_fee + pph_final;
							// console.log(total_biaya);
							var btn_status = "btn-warning";
							if (dpp > total_biaya) {
								btn_status = "btn-success";
							}else if(dpp < total_biaya){
								btn_status = "btn-danger";
							}
							// console.log(parseInt(data_transaksi[i]['harga']));

							var status = "<button type='button' class='btn "+btn_status+" btn-sm btn-status' id_trans='"+data_transaksi[i]['id_transaksi']+"' data-bs-toggle='modal' data-bs-target='#detailModal'>On Going</button>";
							var btn_update = "<button type='button' class='btn btn-warning btn-sm btn-edit' id_trans='"+data_transaksi[i]['id_transaksi']+"' data-bs-toggle='modal' data-bs-target='#transaksiModal'>Update</button>";
							var btn_hapus ="";
							var btn_aprov ="<button type='button' class='btn btn-success btn-sm btn-aprov' id_trans='"+data_transaksi[i]['id_transaksi']+"' id_prop='"+data_transaksi[i]['property']+"' terjual='"+data_transaksi[i]['terjual']+"' stock='"+data_transaksi[i]['stock']+"' >Aprove</button>";
							var btn_cancel ="<button type='button' class='btn btn-danger btn-sm btn-cancel' id_trans='"+data_transaksi[i]['id_transaksi']+"'>Cancel</button>";
							if (data_transaksi[i]['status']==1) {
								status = "<button type='button' class='btn btn-success btn-sm btn-status' id_trans='"+data_transaksi[i]['id_transaksi']+"' data-bs-toggle='modal' data-bs-target='#detailModal'>Aproved</button>";
								btn_update ="";
								btn_aprov ="";
								btn_cancel ="";
								btn_hapus ="<button type='button' class='btn btn-danger btn-sm btn-hapus' id_trans='"+data_transaksi[i]['id_transaksi']+"'>Hapus</button>";
							}else if (data_transaksi[i]['status']==2) {
								status = "<button type='button' class='btn btn-warning btn-sm btn-status' id_trans='"+data_transaksi[i]['id_transaksi']+"' data-bs-toggle='modal' data-bs-target='#detailModal'>Canceled</button>";
								btn_update ="";
								btn_aprov ="";
								btn_cancel ="";
								btn_hapus ="<button type='button' class='btn btn-danger btn-sm btn-hapus' id_trans='"+data_transaksi[i]['id_transaksi']+"'>Hapus</button>";
							}
							tabel_transaksi.row.add( [
									data_transaksi[i]['id_transaksi'],
									data_transaksi[i]['nama_customer'],
									data_transaksi[i]['nama_property'],
									status,
									data_transaksi[i]['harga_buka'],
									data_transaksi[i]['metode'],
									data_transaksi[i]['waktu_mulai'],
									data_transaksi[i]['waktu_akhir'],
									btn_aprov+" "+btn_update+" "+btn_hapus+" "+btn_cancel
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
				$("#harga_buka").val('0');
				$("#waktu_mulai").val('');
				$("#waktu_akhir").val('');
			});

			$("#tabel_transaksi tbody").on('click','.btn-status', function(){
            var id = $(this).attr('id_trans');
            $.ajax({
                url: base_url+"api/transaksi",
				method: "get",
				data: {
					id_transaksi: id
				}
              }).done(function( res ) {
				var data = res['data'][0];
				var dpp = (parseInt(data['harga_buka'])+3000000)/1.16;
				var ppn = 11/100*dpp;
				var bphtb = (dpp-60000000)*5/100;
				var desk = JSON.parse(data['deskripsi_property']);
				var ajb = desk['ajb'];
				var hpp_tanah = 0;
				var hpp_bangunan = 0;
				var hpp_infrastruktur = 0;
				var closing_fee = 0;
				var komisi_fee = 0;
				var pph_final = dpp * 2.5/100;
				var isi_detail = "<p><b>Price</b>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;:  Rp. "+data['harga_buka']+"</p>"+
							"<p><b>DPP</b>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&nbsp;:  Rp. "+parseInt(dpp)+"</p>"+
							"<p><b>PPn</b>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&nbsp;:  Rp. "+parseInt(ppn)+"</p>"+
							"<p><b>BPHTB</b>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;:  Rp. "+parseInt(bphtb)+"</p>";

				$("#isi_detail").empty();

				if (desk['jenis_property'] == 1) {
					hpp_tanah = parseInt(desk['luas_tanah']) * parseInt(desk['hpp_tanah']);
					komisi_fee = parseInt(data['harga_buka']) * 1.375/100;
					isi_detail += "<p><b>Jenis</b>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&nbsp;&nbsp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;:  Tanah</p>"+
								"<p><b>HPP Tanah</b>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&nbsp;:  "+parseInt(hpp_tanah)+"</p>"+
								"<p><b>Komisi Fee</b>&ensp;&nbsp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;:  "+parseInt(komisi_fee)+"</p>";
				}else if (desk['jenis_property'] == 2) {
					hpp_tanah = parseInt(desk['luas_tanah']) * parseInt(desk['hpp_tanah']);
					hpp_bangunan = parseInt(desk['luas_bangunan']) * parseInt(desk['hpp_bangunan']);
					hpp_infrastruktur = parseInt(desk['infrastruktur']) * parseInt(desk['luas_tanah']);
					closing_fee = 1.25/100 * (parseInt(data['harga_buka'])-ppn);
					if (closing_fee >= 4000000) {
						closing_fee = 4000000;
					}
					komisi_fee = dpp * 1.25/100;
					isi_detail += "<p><b>Jenis</b>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&nbsp;&nbsp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;:  Rumah</p>"+
								"<p><b>HPP Tanah</b>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&nbsp;:  "+parseInt(hpp_tanah)+"</p>"+
								"<p><b>HPP Bangunan</b>&ensp;&ensp;&ensp;&nbsp;:  "+parseInt(hpp_bangunan)+"</p>"+
								"<p><b>HPP Infrastruktur</b>&ensp;:  "+parseInt(hpp_infrastruktur)+"</p>"+
								"<p><b>Closing Fee</b>&ensp;&nbsp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;:  "+parseInt(closing_fee)+"</p>"+
								"<p><b>Komisi Fee</b>&ensp;&nbsp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;:  "+parseInt(komisi_fee)+"</p>";
				}
				var total_biaya = hpp_tanah + hpp_bangunan + hpp_infrastruktur + closing_fee + komisi_fee + pph_final;
				var laba = dpp-total_biaya;
				var labapersen = laba/dpp*100;
				isi_detail += "<p><b>PPh Final</b>&ensp;&ensp;&ensp;&nbsp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;:  "+parseInt(pph_final)+"</p>"+
							"<p><b>AJB</b>&ensp;&ensp;&ensp;&nbsp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;:  "+parseInt(ajb)+"</p>"+
							"<p><b>Total Biaya</b>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;:  Rp. "+parseInt(total_biaya)+"</p>"+
							"<p><b>Laba(Rugi)</b>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;:  Rp. "+parseInt(laba)+" ("+parseInt(labapersen)+"%)</p>";
				
				$("#isi_detail").append(isi_detail);
				// console.log(total_biaya);
			  });
			});

			$("#tabel_transaksi tbody").on('click','.btn-edit', function(){
            var id = $(this).attr('id_trans');
            $.ajax({
                url: base_url+"api/transaksi",
				method: "get",
				data: {
					id_transaksi: id
				}
              }).done(function( res ) {
				var data = res['data'][0];
				$("#id_dummy").val(data['id_transaksi']);
				$("#customer").val(data['customer']);
				$("#property").val(data['property']);
				$("#metode_pembayaran").val(data['metode_pembayaran']);
				$("#status").val(data['status']);
				$("#harga_buka").val(data['harga_buka']);
				$("#waktu_mulai").val(data['waktu_mulai']);
				$("#waktu_akhir").val(data['waktu_akhir']);
			  });
			});

			$("#tabel_transaksi tbody").on('click','.btn-aprov', function(){
            	var id = $(this).attr('id_trans');
            	var id_prop = $(this).attr('id_prop');
            	var terjual = parseInt($(this).attr('terjual'))+1;
            	var stock = parseInt($(this).attr('stock'))-1;
				console.log(stock);
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
						stock: stock,
						terjual: terjual,
						update_stock: timestamp
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
							harga_buka: $("#harga_buka").val(),
							waktu_mulai: timestamp,
							waktu_akhir: $("#waktu_akhir").val()
						};
						$.ajax({
							method: "post",
							url: base_url+"api/transaksi",
							data: data
						}).done(function(res){
							// console.log(res);
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
							harga_buka: $("#harga_buka").val(),
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
								data['metode_pembayaran']==check['metode_pembayaran']&&
								data['harga_buka']==check['harga_buka']) {
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