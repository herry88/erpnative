<?php 
	$aksi = "modul/mod_tahunakademik/aksi_tahunakademik.php";
	$act = isset($_GET['act']) ? $_GET['act'] : '';

	switch ($act) {
		default:
		echo"
			<div class='row'>
                <div class='col-sm-12'>
	                <div class='page-header'>
	                    <h1 class='pull-left'>
	                      <i class='fa fa-coffee'></i>
	                      <span>Manajemen Tahun Akademik</span>
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
		                        <li class='active'>Manajemen Modul</li>
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
		                        <div class='fa fa-coffee'></div>
		                         Tahun Akademik
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
									<a class='pull-right btn btn-primary btn-sm' href='?module=tahunakademik&act=tambah'>Tambahkan Data</a>
							</div><br>
							<div class='responsive-table'>
								<div class='scrollable-area'>
									<table class='data-table table table-bordered table-striped' style='margin-bottom:0;'>
									    <thead>
			                                <tr>
				                                <th width='10px' scope='row'>
				                                  No
				                                </th>
				                                <th width='150px' scope='rows'>
				                                  Kode Tahun Akademik
				                                </th>
				                                <th width='150px' scope='row'>
				                                  Nama Tahun
				                                </th>
				                                <th>Status</th>
				                                <th>Keterangan</th>
				                                <th>Tools</th>
			                                </tr>
			                            </thead>
			                            <tbody>";

			                    $tampil = mysqli_query($conn,"SELECT * FROM rb_tahun_akademik ORDER BY id_tahun_akademik DESC");
			                    
			                    $no = 1;
			                    while($r = mysqli_fetch_array($tampil)) {
			                    	
			                    echo "
			                    	<tr>
			                    		<td>$no</td>
			                    		<td>$r[id_tahun_akademik]</td>
			                    		<td>$r[nama_tahun]</td>
			                    		";
			                    if($r['aktif']=='Ya'){
				            	echo " <td>
				                        <span class='label label-success'>Aktif</span>
				                    </td>";

						            }
						            else{
						            	echo " <td>
						                        <span class='label label-danger'>Tidak Aktif</span>
						                    </td>";
						            }
			                    echo "
			                    		<td>$r[keterangan]</td>
			                    		<td>
			                    			<div class='text-right'>
						                        <a class='btn btn-success btn-xs' href='media.php?module=tahunakademik&act=edit&id=$r[id_tahun_akademik]' title='Edit'>
						                            <i class='fa fa-edit'></i>
						                        </a>
				                    		</div>
			                    		</td>
			                    	</tr>
			                    	";
			                    	$no++;
			                    }
			                echo"            
			                            
			                                
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

		case 'tambah':
			echo "
			<div class='row'>
                <div class='col-sm-12'>
	                <div class='page-header'>
	                    <h1 class='pull-left'>
	                      <i class='fa fa-coffee'></i>
	                      <span>Form Tahun Akademik</span>
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
		                        <li class='active'>Manajemen Tahun Akademik</li>
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
								Form Tahun Akademik
							</div>
							<div class='actions'>
			                    <a class=\"btn box-remove btn-xs btn-link\" href=\"#\"><i class='fa fa-times'></i>
			                        </a>
			                        <a class=\"btn box-collapse btn-xs btn-link\" href=\"#\"><i></i>
			                    </a>
			            	</div>
						</div>
						<div class='box-content'>
							<form method='POST' class='form-horizontal' action='$aksi?module=tahunakademik&act=input' enctype='multipart/form-data'>
								
									<table class='table table-condensed table-bordered'>
										<tbody>
											<tr>
												<th width='190px' scope='row'>Kode Tahun Akademik</th><td><input type='text' name='id_tahun_akademik' class='form-control'></td>
											</tr>
											<tr>
												<th width='190px' scope='row'>Nama Tahun Akademik</th><td><input type='text' name='nama_tahun' class='form-control'></td>
											</tr>
											<tr>
												<th width='190px' scope='row'>Keterangan</th><td><input type='text' name='keterangan' class='form-control'></td>
											</tr>
											<tr>
												<th width='130px' scope='row'>Status </th><td><input type ='radio' name='status' value='Ya' checked='checked'>Aktif | <input type ='radio' name='status' value='Tidak'>Tidak Aktif</td>
											</tr>
										</tbody>
									</table>
								<div class='box-footer'>
				                    <button type='submit' name='tambah' class='btn btn-info'>Save</button>
				                    <a href='media.php?module=tahunakademik'><button type='button' class='btn btn-danger pull-right'>Cancel</button></a>
				                    
				                </div>
							</form>
						</div>
        			</div>
        		</div>
        	</div>
        	";
		break;
		case 'edit':
		$tampil = mysqli_query($conn,"SELECT * FROM rb_tahun_akademik WHERE id_tahun_akademik = '$_GET[id]'");
		$r 		= mysqli_fetch_array($tampil);
			echo "
			<div class='row'>
                <div class='col-sm-12'>
	                <div class='page-header'>
	                    <h1 class='pull-left'>
	                      <i class='fa fa-coffee'></i>
	                      <span>Form Tahun Akademik</span>
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
		                        <li class='active'>Manajemen Tahun Akademik</li>
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
								Form Tahun Akademik
							</div>
							<div class='actions'>
			                    <a class=\"btn box-remove btn-xs btn-link\" href=\"#\"><i class='fa fa-times'></i>
			                        </a>
			                        <a class=\"btn box-collapse btn-xs btn-link\" href=\"#\"><i></i>
			                    </a>
			            	</div>
						</div>
						<div class='box-content'>
							<form method='POST' class='form-horizontal' action='$aksi?module=tahunakademik&act=update' enctype='multipart/form-data'>
								<input type='hidden' name='id' value='$r[id_tahun_akademik]'>
									<table class='table table-condensed table-bordered'>
										<tbody>
											<tr>
												<th width='190px' scope='row'>Kode Tahun Akademik</th><td><input type='text' name='id_tahun_akademik' value='$r[id_tahun_akademik]' class='form-control'></td>
											</tr>
											<tr>
												<th width='190px' scope='row'>Nama Tahun Akademik</th><td><input type='text' name='nama_tahun' value='$r[nama_tahun]' class='form-control'></td>
											</tr>
											<tr>
												<th width='190px' scope='row'>Keterangan</th><td><input type='text' name='keterangan' value='$r[keterangan]' class='form-control'></td>
											</tr>";
											if ($r['aktif']=='Ya') {
												echo "
											<tr>
												<th width='130px' scope='row'>Status </th><td><input type ='radio' name='status' value='Ya' checked='checked'>Aktif | <input type ='radio' name='status' value='Tidak'>Tidak Aktif</td>
											</tr>";
											}
											else{
												echo "<tr>
												<th width='130px' scope='row'>Status </th><td><input type ='radio' name='status' value='Ya' >Aktif | <input type ='radio' name='status' checked='checked' value='Tidak'>Tidak Aktif</td>
											</tr>";
											}
									echo "		
										</tbody>
									</table>
								<div class='box-footer'>
				                    <button type='submit' name='tambah' class='btn btn-info'>Save</button>
				                    <a href='media.php?module=tahunakademik'><button type='button' class='btn btn-danger pull-right'>Cancel</button></a>
				                    
				                </div>
							</form>
						</div>
        			</div>
        		</div>
        	</div>
        	";
        	break;
	}	