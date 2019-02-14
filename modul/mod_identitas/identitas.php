<?php 
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
	echo "Anda Harus login dahulu";
}
else{
	$aksi = "modul/mod_identitas/aksi_identitas.php";
	$act = isset($_GET['act']) ? $_GET['act'] : '';

	switch ($act) {
		default:
			#tampil data identitas
		$record = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM rb_identitas_sekolah ORDER BY id_identitas_sekolah DESC LIMIT 1"));
		echo "
		<div class='row'>
			<div class='col-sm-12'>
				<div class='page-header'>
					<h1 class='pull-left'><i class='fa fa-pencil-square-o'></i><span>Identitas Sekolah</span></h1>
					<div class='pull-right'>
						<ul class='breadcrumb'>
							<li>
								<a href='?module=home'><i class='fa fa-bar-chart-o'></i></a>
							</li>
							<li class='separator'>
								<i class='fa fa-angle-right'></i>
							</li>
							<li>
								Forms
							</li>
							<li class='separator'>
		                          <i class='fa fa-angle-right'></i>
		                    </li>
		                    <li class='active'>Identitas Web</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class='row'>
			<div class='col-md-12'>
				<div class='box'>
					<div class='box-header blue-background'>
						<div class='title'>
							<div class='fa fa-pencil-square-o'>
							</div>
							Identitas Sekolah Form
						</div>
						<div class='actions'>
		                    <a class=\"btn box-remove btn-xs btn-link\" href=\"#\"><i class='fa fa-times'></i>
		                        </a>
		                        <a class=\"btn box-collapse btn-xs btn-link\" href=\"#\"><i></i>
		                    </a>
		                </div>
					</div>
					<div class='box-content box-double-padding'>
						<form action=\"$aksi?module=identitas\" class='form form-horizontal' style=\"margin-bottom: 0;\" method=\"POST\" enctype='multipart/form-data'>
							<table class='table table-condensed table-bordered'>
									<tbody>
									<input type='hidden' name='id' value='$record[id_identitas_sekolah]'>
										<tr>
											<th width='120px' scope='row'>Nama Sekolah</th><td><input type='text' name='nama_sekolah' class='form-control' placeholder='Nama Sekolah' value='$record[nama_sekolah]'></td>
										</tr>
										<tr>
											<th width='120px' scope='row'>NPSN</th><td><input type='text' name='npsn' class='form-control' placeholder='NPSN' value='$record[npsn]'></td>
										</tr>
										<tr>
											<th width='120px' scope='row'>NSS</th><td><input type='text' name='nss' class='form-control' placeholder='NSS' value='$record[nss]'></td>
										</tr>
										<tr>
											<th width='120px' scope='row'>Alamat Sekolah</th><td><input type='text' name='alamat_sekolah' class='form-control' 	placeholder='Alamat' value='$record[alamat_sekolah]'></td>
										</tr>
										<tr>
											<th scope='row'>Kodepos</th><td><input type='text' name='kode_pos' placeholder='kodepos' value='$record[kode_pos]' class='form-control'></td>
										</tr>
										
										<tr>
											<th scope='row'>No Telepon</th><td><input type='text' name='no_telpon' placeholder='No Telepon' class='form-control' value='$record[no_telpon]'></td>
										</tr>
										<tr>
											<th scope='row'>Kecamatan</th><td><input type='text' name='kecamatan' placeholder='Kecamatan' value='$record[kecamatan]' class='form-control'></td>
										</tr>
										<tr>
											<th scope='row'>Kelurahan</th><td><input type='text' name='kelurahan' placeholder='Kelurahan' value='$record[kelurahan]' class='form-control'></td>
										</tr>
										<tr>
											<th scope='row'>Kabupaten / Kota</th><td><input type='text' name='kabupaten_kota' placeholder='kabkot' value='$record[kabupaten_kota]' class='form-control'></td>
										</tr>
										<tr>
											<th scope='row'>Provinsi</th><td><input type='text' name='provinsi' placeholder='Provinsi' value='$record[provinsi]' class='form-control'></td>
										</tr>
										<tr>
											<th scope='row'>Website</th><td><input type='text' name='website' placeholder='Website' value='$record[website]' class='form-control'></td>
										</tr>
											<tr>
											<th scope='row'>Email</th><td><input type='text' name='email' placeholder='Email' value='$record[email]' class='form-control'></td>
										</tr>

									</tbody>
							</table>
							<div class='box-footer'>
								<button type='submit' name='update' class='btn btn-primary'>Update</button>
								<button type='button' class='btn btn-danger pull-right' onclick='self.history.back();'>Cancel</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		";
		break;
	}

}
?>