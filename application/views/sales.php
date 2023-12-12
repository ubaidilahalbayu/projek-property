<!doctype html>
<html lang="en">
  <head>
  	<title>Sales</title>
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
	          <li  class="active">
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

<!-- Modal -->
<div class="modal fade" id="salesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Form Sales</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="form_sales">
			<input type="text" id="id_dummy" name="id_dummy" hidden>
		<div class="mb-3">
			<label for="nik_sales" class="form-label">NIK</label>
			<input type="text" class="form-control" id="nik_sales" name="nik_sales" placeholder="Isi disini">
		</div>
		<div class="mb-3">
			<label for="nama_sales" class="form-label">Nama</label>
			<input type="text" class="form-control" id="nama_sales" name="nama_sales">
		</div>
		<div class="mb-3">
			<label for="no_hp_sales" class="form-label">No Hp</label>
			<input type="text" class="form-control" id="no_hp_sales" name="no_hp_sales">
		</div>
		<div class="mb-3">
			<label for="alamat_sales" class="form-label">Alamat</label>
			<textarea class="form-control" id="alamat_sales" name="alamat_sales" rows="3"></textarea>
		</div>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" form="form_sales" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</div>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4">Data Sales</h2>
		<!-- Button trigger modal -->
		<button id="btn_tambah_sales" type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#salesModal">
			Tambah Sales
		</button>
		<hr>
		<table id="tabel_sales" class="table">
			<thead class="table-light">
				<tr>
					<th scope="col">NIK</th>
					<th scope="col">Nama</th>
					<th scope="col">No HP</th>
					<th scope="col">Alamat</th>
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

			var tabel_sales = $('#tabel_sales').DataTable({
                  "columnDefs": [
                    { width: "15%", targets: [4] },
                    { className: 'text-center', targets: "_all" },
                    { className: 'align-middle', targets: "_all" }
                  ]
                });
			renderTabelSales();

			function renderTabelSales(){
				tabel_sales.clear();
				$.ajax({
					url: base_url+"api/sales"
				})
				.done(function( res ) {
					// console.log(res); //"Sample of data:", data.slice( 0, 100 ) );
					
					if (res['status']) {
						var data_sales = res['data'];      
						for(i=0;i<data_sales.length;i++){
							// var no = i+1
							var btn_edit ="<button type='button' class='btn btn-warning btn-sm btn-edit' nik_sal='"+data_sales[i]['nik_sales']+"' data-bs-toggle='modal' data-bs-target='#salesModal'>Edit</button>";
							var btn_hapus ="<button type='button' class='btn btn-danger btn-sm btn-hapus' nik_sales='"+data_sales[i]['nik_sales']+"'>Hapus</button>";
							tabel_sales.row.add( [
									data_sales[i]['nik_sales'],
									data_sales[i]['nama_sales'],
									data_sales[i]['no_hp_sales'],
									data_sales[i]['alamat_sales'],
									btn_edit+" "+btn_hapus
							] ).draw( false );
						
						}
					}
				});
			}

			$("#btn_tambah_sales").click(function(){
				$("#id_dummy").val('');
				$("#nik_sales").val('');
				$("#nama_sales").val('');
				$("#no_hp_sales").val('+62');
				$("#alamat_sales").val('');
			});

			$("#tabel_sales tbody").on('click','.btn-edit', function(){
            var id = $(this).attr('nik_sal');
            $.ajax({
                url: base_url+"api/sales",
				method: "get",
				data: {
					nik_sales: id
				}
              }).done(function( res ) {
				var data = res['data'][0];
                $("#id_dummy").val(data['nik_sales']);
				$("#nik_sales").val(data['nik_sales']);
                $("#nama_sales").val(data['nama_sales']);
                $("#no_hp_sales").val(data['no_hp_sales']);
                $("#alamat_sales").val(data['alamat_sales']);
              }); 
       		});
			
			$("#form_sales").submit(function(event){
				event.preventDefault();
				var data = $( this ).serialize();
				
				if ($("#id_dummy").val()=="") {
					data = {
						nik_sales: $("#nik_sales").val(),
						nama_sales: $("#nama_sales").val(),
						no_hp_sales: $("#no_hp_sales").val(),
						alamat_sales: $("#alamat_sales").val()
					};
					$.ajax({
						method: "post",
						url: base_url+"api/sales",
						data: data
					}).done(function(res){
						console.log(res);
						if (res['status']) {
							$("#salesModal").modal("hide");
							alert("Success!");
							location.reload();
						}else{
							alert("Failed!!");
						}
					});
				}else{
					data = {
						id_dummy: $("#id_dummy").val(),
						nik_sales: $("#nik_sales").val(),
						nama_sales: $("#nama_sales").val(),
						no_hp_sales: $("#no_hp_sales").val(),
						alamat_sales: $("#alamat_sales").val()
					};
					$.ajax({
						method: "put",
						url: base_url+"api/sales",
						data: data
					}).done(function(res){
						// console.log(data['id_dummy']);
						var check = res['data'];
						if (res['status']) {
							alert("Success!");
							$("#salesModal").modal("hide");
							location.reload();
						}else{
							if (data['nik_sales']==check['nik_sales']&&
							data['nama_sales']==check['nama_sales']&&
							data['no_hp_sales']==check['no_hp_sales']&&
							data['alamat_sales']==check['alamat_sales']) {
								alert("data tidak ada yg berubah")
							}else{
								alert("Failed!!");
							}
						}
					});
				}

			});

			$("#tabel_sales tbody").on('click','.btn-hapus', function(){
				var nik_sales = $(this).attr('nik_sales');
				
				var removingRow = $(this).closest('tr');
				if(confirm("Apakah data dengan NIK "+nik_sales+" akan dihapus?")){
				$.ajax({
					method: "delete",
					url: base_url+"api/sales",
					data: {nik_sales: nik_sales}
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