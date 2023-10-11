<!doctype html>
<html lang="en">
  <head>
  	<title>Pengguna</title>
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/core.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/md5.js"></script>
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
<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Form Pengguna</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="form_pengguna">
			<input type="text" id="username_dummy" name="username_dummy" hidden>
		<div class="mb-3">
			<label for="username" class="form-label">Username</label>
			<input type="text" class="form-control" id="username" name="username" placeholder="Isi disini">
		</div>
		<div class="mb-3">
			<label for="password" class="form-label">Password</label>
			<input type="text" class="form-control" id="password" name="password">
		</div>
		<div class="mb-3">
			<label for="level" class="form-label">Level Pengguna</label>
			<select class="form-select" aria-label="Default select example" id="level" name="level">
			</select>
		</div>
		<div class="mb-3">
			<label for="aktif" class="form-label">Aktif</label>
			<select class="form-select" aria-label="Default select example" id="aktif" name="aktif">
				<option value="0">Tidak</option>
				<option value="1">Ya</option>
			</select>
		</div>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" form="form_pengguna" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</div>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4">Data Pengguna</h2>
		<!-- Button trigger modal -->
		<button id="btn_tambah_pengguna" type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#userModal">
			Tambah Pengguna
		</button>
		<hr>
		<table id="tabel_pengguna" class="table">
			<thead class="table-light">
				<tr>
					<th scope="col">Username</th>
					<th scope="col">Level</th>
					<th scope="col">Aktif</th>
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

			var tabel_pengguna = $('#tabel_pengguna').DataTable({
                  "columnDefs": [
                    // { width: "15%", targets: [5] },
                    { className: 'text-center', targets: "_all" },
                    { className: 'align-middle', targets: "_all" }
                  ]
                });
			renderTabelPengguna();
			$.ajax({
				url: base_url+"api/user/lvuser"
			}).done(function (res) {
				// console.log(res);
				if (res['status']) {
					data = res['data'];
					for (let i = 0; i < data.length; i++) {
						var o = new Option(data[i]['jabatan'], data[i]['id_lv_user']);
						/// jquerify the DOM object 'o' so we can use the html method
						// $(o).html(data[i]['jabatan']);
						$("#level").append(o);
					}
				}
			});

			function renderTabelPengguna(){
				tabel_pengguna.clear();
				$.ajax({
					url: base_url+"api/user"
				})
				.done(function( res ) {
					// console.log(res); //"Sample of data:", data.slice( 0, 100 ) );
					
					if (res['status']) {
						var data_pengguna = res['data'];      
						for(i=0;i<data_pengguna.length;i++){
							// var no = i+1
							var btn_change ="<button type='button' class='btn btn-success btn-sm btn-change' id_user='"+data_pengguna[i]['username']+"' data-bs-toggle='modal' data-bs-target='#userModal'>Change Password</button>";
							var btn_edit ="<button type='button' class='btn btn-warning btn-sm btn-edit' id_user='"+data_pengguna[i]['username']+"' data-bs-toggle='modal' data-bs-target='#userModal'>Edit</button>";
							var btn_hapus ="<button type='button' class='btn btn-danger btn-sm btn-hapus' id_user='"+data_pengguna[i]['username']+"' username='"+data_pengguna[i]['username']+"'>Hapus</button>";
							var aktif = "Tidak";
							if (data_pengguna[i]['aktif']==1) {
								aktif = "Ya"
							}
							tabel_pengguna.row.add( [
									data_pengguna[i]['username'],
									data_pengguna[i]['jabatan'],
									aktif,
									btn_change+" "+btn_edit+" "+btn_hapus
							] ).draw( false );
						
						}
					}
				});
			}

			$("#btn_tambah_pengguna").click(function(){
                $("#username_dummy").val('');
                $("#username_dummy").removeAttr('readonly');
				$("#username").val('');
				$("#username").removeAttr('readonly');
                $("#password").val('');
				$("#password").removeAttr('hidden');
                $("#level").val('');
                $("#level").removeAttr('hidden');
                $("#aktif").val('');
                $("#aktif").removeAttr('hidden');
                // $("option").removeAttr('disabled');
			});

			$("#tabel_pengguna tbody").on('click','.btn-edit', function(){
            var id = $(this).attr('id_user');
            $.ajax({
                url: base_url+"api/user",
				method: "get",
				data: {
					username: id
				}
              }).done(function( res ) {
				var data = res['data'][0];
                $("#username_dummy").val(data['username']);
                $("#username_dummy").removeAttr('readonly');
				$("#username").val(data['username']);
				$("#username").removeAttr('readonly');
                $("#password").val(data['password']);
				$("#password").attr('hidden', true);
                $("#level").val(data['level']);
				$("#level").removeAttr('hidden');
                $("#aktif").val(data['aktif']);
                $("#aktif").removeAttr('hidden');
                // $("option").removeAttr('disabled');
              }); 
       		});
			$("#tabel_pengguna tbody").on('click','.btn-change', function(){
            var id = $(this).attr('id_user');
            $.ajax({
                url: base_url+"api/user",
				method: "get",
				data: {
					username: id
				}
              }).done(function( res ) {
				var data = res['data'][0];
                $("#username_dummy").val('-1');
                $("#username_dummy").attr('readonly', true);
				$("#username").val(data['username']);
				$("#username").attr('readonly', true);
                $("#password").val('');
				$("#password").removeAttr('hidden');
                $("#level").val(data['level']);
                $("#level").attr('hidden', true);
                $("#aktif").val(data['aktif']);
                $("#aktif").attr('hidden', true);
                // $("option").attr('disabled', true);
              }); 
       		});
			
			$("#form_pengguna").submit(function(event){
				event.preventDefault();
				var data = $( this ).serialize();
				var pass = CryptoJS.MD5($("#password").val()).toString();
				var usr_dum = $("#username").val();
				// console.log(pass);
				
				if ($("#password").val().toString().length < 4) {
					alert("Password minimal 4 karakter!")
				}else{
					if ($("#username_dummy").val()=="") {
						data = {
							username: $("#username").val(),
							password: pass,
							level: $("#level").val(),
							aktif: $("#aktif").val(),
						};
						$.ajax({
							method: "post",
							url: base_url+"api/user",
							data: data
						}).done(function(res){
							console.log(res);
							if (res['status']) {
								$("#userModal").modal("hide");
								alert("Success!");
								location.reload();
							}else{
								alert("Failed!!");
							}
						});
					}else{
						if ($("#username_dummy").val() != "-1") {
							usr_dum = $("#username_dummy").val();
							pass = $("#password").val();
						}
						data = {
							username_dummy: usr_dum,
							username: $("#username").val(),
							password: pass,
							level: $("#level").val(),
							aktif: $("#aktif").val(),
						};
						$.ajax({
							method: "put",
							url: base_url+"api/user",
							data: data
						}).done(function(res){
							// console.log(data['username_dummy']);
							var check = res['data'];
							if (res['status']) {
								$("#userModal").modal("hide");
								alert("Success!");
								location.reload();
							}else{
								if (data['username']==check['username']&&
								data['password']==check['password']&&
								data['level']==check['level']&&
								data['aktif']==check['aktif']) {
									alert("data tidak ada yg berubah")
								}else{
									alert("Failed!!");
								}
							}
						});
					}
				}

			});

			$("#tabel_pengguna tbody").on('click','.btn-hapus', function(){
				var id = $(this).attr('id_user');
				var username = $(this).attr('username');
				
				var removingRow = $(this).closest('tr');
				if(confirm("Apakah data dengan username "+username+" akan dihapus?")){
				$.ajax({
					method: "delete",
					url: base_url+"api/user",
					data: {username: id}
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