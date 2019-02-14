<?php 
	if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
	echo "Anda Harus login dahulu";
}
else{
	$aksi = "modul/mod_kelas/aksi_kelas.php";
	$act = isset($_GET['act']) ? $_GET['act'] : '';

	switch ($act) {
		default:
			echo"
			<div class='row'>
                <div class='col-sm-12'>
	                <div class='page-header'>
	                    <h1 class='pull-left'>
	                      <i class='fa fa-coffee'></i>
	                      <span>Manajemen Data Kelas</span>
	                    </h1>
		                <div class='pull-right'>
		                    <ul class='breadcrumb'>
		                        <li>
		                          <a href='?module=home'>
		                            <i class='fa fa-bar-chart-o'></i>
		                          </a>
		                        </li>
		                        <li class='separator'>
		                          <i class='fa fa-angle-right'></i>
		                        </li>
		                        <li>
		                          Tahun Akademik
		                        </li>
		                        <li class='separator'>
		                          <i class='fa fa-angle-right'></i>
		                        </li>
		                        <li class='active'>Manajemen Kelas</li>
		                    </ul>
		                </div>
	                </div>
                </div>
            </div>";
            echo"
            <div class='row'>
            	<div class='col-md-12'>
            		<div class='box'>
            			<div class='box-header blue-background'>
							<div class='title'>
		                        <div class='fa fa-coffee'></div>
		                         Data Kelas
	                      	</div>
	                      	<div class='actions'>
		                        <a class=\"btn box-remove btn-xs btn-link\" href=\"#\"><i class='fa fa-times'></i>
		                        </a>
		                        <a class=\"btn box-collapse btn-xs btn-link\" href=\"#\"><i></i>
		                        </a>
		                    </div>
						</div>
						<div class='box-content'>
							<div class='box'>
								<a class='pull-right btn btn-primary btn-sm' href='?module=kelas&act=tambah'>Tambahkan Data
								</a>
							</div><br>
							<div class='responsive-table'>
								<div class='scrollable'>
									<table class='data-table table table-bordered table-striped' style='margin-bottom:0;'>
										<thead>
											<tr>
												<th>NO</th>
												<th>Nama</th>
												<th>jurusan</th>
												<th>walas</th>
												<th>Tools</th>
												
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>1</td>
												<td>herry prasetyo</td>
												<td>RPL</td>
												<td>bill gate</td>
												<td>Edit | Delete</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
            		</div>
            	</div>
            </div>
            ";	
		break;

		case"tambah":
			echo "
			<div class='row'>
                <div class='col-sm-12'>
	                <div class='page-header'>
	                    <h1 class='pull-left'>
	                      <i class='fa fa-coffee'></i>
	                      <span>Form Kelas</span>
	                    </h1>
		                <div class='pull-right'>
		                    <ul class='breadcrumb'>
		                        <li>
		                          <a href='?module=home'>
		                            <i class='fa fa-bar-chart-o'></i>
		                          </a>
		                        </li>
		                        <li class='separator'>
		                          <i class='fa fa-angle-right'></i>
		                        </li>
		                        <li>
		                          Data Kelas
		                        </li>
		                        <li class='separator'>
		                          <i class='fa fa-angle-right'></i>
		                        </li>
		                        <li class='active'>Manajemen Kelas</li>
		                    </ul>
		                </div>
	                </div>
                </div>
            </div>";
             echo "
        	<div class='row'>
        		<div class='col-md-12'>
        			<div class='box'>
        				<div class='box-header blue-background'>
							<div class='title'>
								<div class='fa fa-pencil-square-o'>
								</div>
								Form Kelas
							</div>
							<div class='actions'>
			                    <a class=\"btn box-remove btn-xs btn-link\" href=\"#\"><i class='fa fa-times'></i>
			                        </a>
			                        <a class=\"btn box-collapse btn-xs btn-link\" href=\"#\"><i></i>
			                    </a>
			            	</div>
						</div>
						<div class='box-content'>
							<form method='POST' class='form-horizontal' action='$aksi?module=kelas&act=input' enctype='multipart/form-data'>
								
									<table class='table table-condensed table-bordered'>
										<tbody>
											<tr>
												<th width='190px' scope='row'>Kode Kelas</th><td><input type='text' name='kode_kelas' class='form-control'></td>
											</tr>
											<tr>
												<th width='190px' scope='row'>Nama Wali Kelas</th><td><select name='wali' class='select2 form-control'><option value='kosong'>-Pilih Wali Kelas-</option>";
												$wali = mysqli_query($conn, "SELECT * FROM rb_guru");
												while($a = mysqli_fetch_array($wali)){
													echo "<option value='$a[nip]'>$a[nama_guru]</option>";
												}
									echo"	</select></td>
											</tr>
											<tr>
												<th width='190px' scope='row'>Jurusan</th><td><select name='jurusan' class='select2 form-control'><option value='kosong'>-Pilih Jurusan-</option>";
													$jur = mysqli_query($conn,"SELECT * FROM rb_jurusan");
													while($b = mysqli_fetch_array($jur)){
														echo "<option value='$b[kode_jurusan]'>$b[nama_jurusan]</option>";
													}
									echo "</select></td>
											</tr>
											<tr>
												<th width='190px' scope='row'>Ruangan</th><td><select class='select2 form-control'>
													<option value='KOSONG'>-Pilih Data Ruangan-</option>";
													$ruang = mysqli_query($conn,"SELECT * FROM rb_ruangan a JOIN rb_gedung b ON a.kode_gedung=b.kode_gedung");
													while($c = mysqli_fetch_array($ruang)){
														echo "<option value='$c[$kode_ruangan]'>$c[nama_ruangan]</option>";
													}
									echo"</select></td>
											</tr>
											<tr>
												<th width='190px' scope='row'>Nama Kelas</th><td><input type='text' name='keterangan' class='form-control'></td>
											</tr>
											<tr>
												<th width='130px' scope='row'>Status </th><td><input type ='radio' name='status' value='Ya' checked='checked'>Aktif | <input type ='radio' name='status' value='Tidak'>Tidak Aktif</td>
											</tr>
										</tbody>
									</table>
								<div class='box-footer'>
				                    <button type='submit' name='tambah' class='btn btn-info'>Save</button>
				                    <a href='media.php?module=kelas'><button type='button' class='btn btn-danger pull-right'>Cancel</button></a>
				                    
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