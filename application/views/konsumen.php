<!doctype html>
<html lang="en">
  <head>
  	<title>Konsumen</title>
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
	          <li class="active">
	              <a href="<?= base_url(); ?>myweb/konsumen"><span class="fa fa-user mr-3"></span> Konsumen</a>
	          </li>
	          <li>
              <a href="<?= base_url(); ?>myweb/property"><span class="fa fa-briefcase mr-3"></span> Property</a>
	          </li>
	          <li>
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
<div class="modal fade" id="konsumenModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Form Konsumen</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="form_konsumen">
			<input type="text" id="id_dummy" name="id_dummy" hidden>
		<div class="mb-3">
			<label for="nik" class="form-label">NIK</label>
			<input type="text" class="form-control" id="nik" name="nik" placeholder="Isi disini">
		</div>
		<div class="mb-3">
			<label for="nama_customer" class="form-label">Nama</label>
			<input type="text" class="form-control" id="nama_customer" name="nama_customer">
		</div>
		<div class="mb-3">
			<label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
			<select class="form-select" aria-label="Default select example" id="jenis_kelamin" name="jenis_kelamin">
				<option value="L">Laki-laki</option>
				<option value="P">Perempuan</option>
			</select>
		</div>
		<div class="mb-3">
			<label for="pekerjaan" class="form-label">Pekerjaan</label>
			<input type="text" class="form-control" id="pekerjaan" name="pekerjaan">
		</div>
		<div class="mb-3">
			<label for="alamat" class="form-label">Alamat</label>
			<textarea class="form-control" id="alamat" name="alamat" rows="3"></textarea>
		</div>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" form="form_konsumen" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</div>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4">Data Konsumen</h2>
		<!-- Button trigger modal -->
		<button id="btn_tambah_konsumen" type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#konsumenModal">
			Tambah Konsumen
		</button>
		<hr>
		<table id="tabel_konsumen" class="table">
			<thead class="table-light">
				<tr>
					<th scope="col">NIK</th>
					<th scope="col">Nama</th>
					<th scope="col">Jenis Kelamin</th>
					<th scope="col">Pekerjaan</th>
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

			var tabel_konsumen = $('#tabel_konsumen').DataTable({
                  "columnDefs": [
                    { width: "15%", targets: [5] },
                    { className: 'text-center', targets: "_all" },
                    { className: 'align-middle', targets: "_all" }
                  ]
                });
			renderTabelKonsumen();

			function renderTabelKonsumen(){
				tabel_konsumen.clear();
				$.ajax({
					url: base_url+"api/customer"
				})
				.done(function( res ) {
					// console.log(res); //"Sample of data:", data.slice( 0, 100 ) );
					
					if (res['status']) {
						var data_konsumen = res['data'];      
						for(i=0;i<data_konsumen.length;i++){
							// var no = i+1
							var btn_edit ="<button type='button' class='btn btn-warning btn-sm btn-edit' id_kons='"+data_konsumen[i]['id_customer']+"' data-bs-toggle='modal' data-bs-target='#konsumenModal'>Edit</button>";
							var btn_hapus ="<button type='button' class='btn btn-danger btn-sm btn-hapus' id_kons='"+data_konsumen[i]['id_customer']+"' nik='"+data_konsumen[i]['nik']+"'>Hapus</button>";
							tabel_konsumen.row.add( [
									data_konsumen[i]['nik'],
									data_konsumen[i]['nama_customer'],
									data_konsumen[i]['jenis_kelamin'],
									data_konsumen[i]['pekerjaan'],
									data_konsumen[i]['alamat'],
									btn_edit+" "+btn_hapus
							] ).draw( false );
						
						}
					}
				});
			}

			$("#btn_tambah_konsumen").click(function(){
				$("#id_dummy").val('');
				$("#nik").val('');
				$("#nama_customer").val('');
				$("#jenis_kelamin").val('');
				$("#pekerjaan").val('');
				$("#alamat").val('');
			});

			$("#tabel_konsumen tbody").on('click','.btn-edit', function(){
            var id = $(this).attr('id_kons');
            $.ajax({
                url: base_url+"api/customer",
				method: "get",
				data: {
					id_customer: id
				}
              }).done(function( res ) {
				var data = res['data'][0];
                $("#id_dummy").val(data['id_customer']);
				$("#nik").val(data['nik']);
                $("#nama_customer").val(data['nama_customer']);
                $("#jenis_kelamin").val(data['jenis_kelamin']);
                $("#pekerjaan").val(data['pekerjaan']);
                $("#alamat").val(data['alamat']);
              }); 
       		});
			
			$("#form_konsumen").submit(function(event){
				event.preventDefault();
				var data = $( this ).serialize();
				
				if ($("#id_dummy").val()=="") {
					data = {
						id_customer: "",
						nama_customer: $("#nama_customer").val(),
						nik: $("#nik").val(),
						jenis_kelamin: $("#jenis_kelamin").val(),
						alamat: $("#alamat").val(),
						pekerjaan: $("#pekerjaan").val(),
						no_hp: "+62",//$("#no_hp").val(),
						email: "@mail",//$("#email").val(),
						waktu_pendaftaran: "",//$("#waktu_pendaftaran").val(),
						level_member: "1",//$("#level_member").val(),
						username: ""//$("#username").val(),
					};
					$.ajax({
						method: "post",
						url: base_url+"api/customer",
						data: data
					}).done(function(res){
						console.log(res);
						if (res['status']) {
							$("#konsumenModal").modal("hide");
							alert("Success!");
							location.reload();
						}else{
							alert("Failed!!");
						}
					});
				}else{
					data = {
						id_dummy: $("#id_dummy").val(),
						id_customer: $("#id_dummy").val(),
						nama_customer: $("#nama_customer").val(),
						nik: $("#nik").val(),
						jenis_kelamin: $("#jenis_kelamin").val(),
						alamat: $("#alamat").val(),
						pekerjaan: $("#pekerjaan").val(),
						no_hp: "+62",//$("#no_hp").val(),
						email: "@mail",//$("#email").val(),
						waktu_pendaftaran: "",//$("#waktu_pendaftaran").val(),
						level_member: "1",//$("#level_member").val(),
						username: ""//$("#username").val(),
					};
					$.ajax({
						method: "put",
						url: base_url+"api/customer",
						data: data
					}).done(function(res){
						// console.log(data['id_dummy']);
						var check = res['data'];
						if (res['status']) {
							$("#konsumenModal").modal("hide");
							alert("Success!");
							location.reload();
						}else{
							if (data['nik']==check['nik']&&
							data['nama_customer']==check['nama_customer']&&
							data['jenis_kelamin']==check['jenis_kelamin']&&
							data['pekerjaan']==check['pekerjaan']&&
							data['alamat']==check['alamat']) {
								alert("data tidak ada yg berubah")
							}else{
								alert("Failed!!");
							}
						}
					});
				}

			});

			$("#tabel_konsumen tbody").on('click','.btn-hapus', function(){
				var id = $(this).attr('id_kons');
				var nik = $(this).attr('nik');
				
				var removingRow = $(this).closest('tr');
				if(confirm("Apakah data dengan nik "+nik+" akan dihapus?")){
				$.ajax({
					method: "delete",
					url: base_url+"api/customer",
					data: {id_customer: id}
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