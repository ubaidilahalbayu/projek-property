<!doctype html>
<html lang="en">
  <head>
  	<title>Property</title>
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
	          <li class="active">
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

<!-- Modal -->
<div class="modal fade" id="propertyModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Form Property</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="form_property">
			<input type="text" id="id_dummy" name="id_dummy" hidden>
			<input type="text" id="terjual" name="terjual" hidden>
			<input type="text" id="waktu_tersedia" name="waktu_tersedia" hidden>
			<input type="text" id="waktu_terjual" name="waktu_terjual" hidden>
		<div class="mb-3">
			<label for="nama_property" class="form-label">Nama Property</label>
			<input type="text" class="form-control" id="nama_property" name="nama_property" placeholder="Isi disini">
		</div>
		<div class="mb-3">
			<label for="jenis" class="form-label">Tipe Unit</label>
			<select class="form-select" aria-label="Default select example" id="jenis" name="jenis">
			</select>
		</div>
		<div class="mb-3">
			<label for="harga" class="form-label">Harga (Rupiah)</label>
			<input type="text" class="form-control" id="harga" name="harga">
		</div>
		<div class="mb-3">
			<label for="deskripsi" class="form-label">deskripsi</label>
			<textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
		</div>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" form="form_property" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</div>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4">Data Property</h2>
		<!-- Button trigger modal -->
		<button id="btn_tambah_property" type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#propertyModal">
			Tambah Property
		</button>
		<hr>
		<table id="tabel_property" class="table">
			<thead class="table-light">
				<tr>
					<th scope="col">Nama Property</th>
					<th scope="col">Deskripsi</th>
					<th scope="col">Tipe Unit</th>
					<th scope="col">Harga (Rupiah)</th>
					<th scope="col">Terjual</th>
					<th scope="col">Waktu Penambahan</th>
					<th scope="col">Waktu Terjual</th>
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

			var tabel_property = $('#tabel_property').DataTable({
                  "columnDefs": [
                    { className: 'text-center', targets: "_all" },
                    { className: 'align-middle', targets: "_all" }
                  ]
                });
			renderTabelProperty();
			$.ajax({
				url: base_url+"api/property/tipeunit"
			}).done(function (res) {
				// console.log(res);
				if (res['status']) {
					data = res['data'];
					for (let i = 0; i < data.length; i++) {
						var o = new Option(data[i]['nama_tipe'], data[i]['id_tipe']);
						/// jquerify the DOM object 'o' so we can use the html method
						// $(o).html(data[i]['nama_tipe']);
						$("#jenis").append(o);
					}
				}
			});

			function renderTabelProperty(){
				tabel_property.clear();
				$.ajax({
					url: base_url+"api/property"
				})
				.done(function( res ) {
					// console.log(res); //"Sample of data:", data.slice( 0, 100 ) );
					
					if (res['status']) {
						var data_property = res['data'];
						   
						for(i=0;i<data_property.length;i++){
							// var no = i+1
							var terjual = "Belum";
							if (data_property[i]['terjual']==1) {
								terjual = "Sudah"
							}
							var btn_edit ="<button type='button' class='btn btn-warning btn-sm btn-edit' id_prop='"+data_property[i]['id_property']+"' data-bs-toggle='modal' data-bs-target='#propertyModal'>Edit</button>";
							var btn_hapus ="<button type='button' class='btn btn-danger btn-sm btn-hapus' id_prop='"+data_property[i]['id_property']+"' nama='"+data_property[i]['nama_property']+"'>Hapus</button>";
							tabel_property.row.add( [
									data_property[i]['nama_property'],
									data_property[i]['deskripsi'],
									data_property[i]['nama_tipe'],
									data_property[i]['harga'],
									terjual,
									data_property[i]['waktu_tersedia'],
									data_property[i]['waktu_terjual'],
									btn_edit+" "+btn_hapus
							] ).draw( false );
						
						}
					}
				});
			}

			$("#btn_tambah_property").click(function(){
				$("#id_dummy").val('');
				$("#nama_property").val('');
				$("#deskripsi").val('');
				$("#jenis").val('');
				$("#harga").val('');
				$("#terjual").val('0');
				$("#waktu_tersedia").val('');
				$("#waktu_terjual").val('');
			});

			$("#tabel_property tbody").on('click','.btn-edit', function(){
            var id = $(this).attr('id_prop');
            $.ajax({
                url: base_url+"api/property",
				method: "get",
				data: {
					id_property: id
				}
              }).done(function( res ) {
				var data = res['data'][0];
                $("#id_dummy").val(data['id_property']);
				$("#nama_property").val(data['nama_property']);
                $("#deskripsi").val(data['deskripsi']);
                $("#jenis").val(data['jenis']);
                $("#harga").val(data['harga']);
                $("#terjual").val(data['terjual']);
                $("#waktu_tersedia").val(data['waktu_tersedia']);
                $("#waktu_terjual").val(data['waktu_terjual']);
              }); 
       		});
			
			$("#form_property").submit(function(event){
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
				console.log(timestamp);
				
				if ($("#id_dummy").val()=="") {
					data = {
						id_property: "",
						nama_property: $("#nama_property").val(),
						deskripsi: $("#deskripsi").val(),
						jenis: $("#jenis").val(),
						harga: $("#harga").val(),
						terjual: $("#terjual").val(),
						waktu_tersedia: timestamp,
						waktu_terjual: $("#waktu_terjual").val()
					};
					$.ajax({
						method: "post",
						url: base_url+"api/property",
						data: data
					}).done(function(res){
						console.log(res);
						if (res['status']) {
							$("#propertyModal").modal("hide");
							alert("Success!");
							location.reload();
						}else{
							alert("Failed!!");
						}
					});
				}else{
					data = {
						id_dummy: $("#id_dummy").val(),
						id_property: $("#id_dummy").val(),
						nama_property: $("#nama_property").val(),
						deskripsi: $("#deskripsi").val(),
						jenis: $("#jenis").val(),
						harga: $("#harga").val(),
						terjual: $("#terjual").val(),
						waktu_tersedia: $("#waktu_tersedia").val(),
						waktu_terjual: $("#waktu_terjual").val()
					};
					$.ajax({
						method: "put",
						url: base_url+"api/property",
						data: data
					}).done(function(res){
						// console.log(data['id_dummy']);
						var check = res['data'];
						if (res['status']) {
							$("#propertyModal").modal("hide");
							alert("Success!");
							location.reload();
						}else{
							if (data['nama_property']==check['nama_property']&&
							data['deskripsi']==check['deskripsi']&&
							data['jenis']==check['jenis']&&
							data['harga']==check['harga']) {
								alert("data tidak ada yg berubah")
							}else{
								alert("Failed!!");
							}
						}
					});
				}

			});

			$("#tabel_property tbody").on('click','.btn-hapus', function(){
				var id = $(this).attr('id_prop');
				var nama_property = $(this).attr('nama');
				
				var removingRow = $(this).closest('tr');
				if(confirm("Apakah data dengan nama property "+nama_property+" akan dihapus?")){
				$.ajax({
					method: "delete",
					url: base_url+"api/property",
					data: {id_property: id}
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