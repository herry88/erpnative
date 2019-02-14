<?php 
	$aksi = "modul/mod_kurikullum/aksi_kurikulum.php";
	$act = isset($_GET['act']) ? $_GET['act'] : '';

	switch ($act) {
		default:
		echo"
			<div class='row'>
                <div class='col-sm-12'>
	                <div class='page-header'>
	                    <h1 class='pull-left'>
	                      <i class='fa fa-coffee'></i>
	                      <span>Manajemen Kurikulum</span>
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
		                          Kurikulum
		                        </li>
		                        <li class='separator'>
		                          <i class='fa fa-angle-right'></i>
		                        </li>
		                        <li class='active'>Manajemen Kurikulum</li>
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
		                         Kurikulum
	                      	</div>
	                      	<div class='actions'>
		                        <a class=\"btn box-remove btn-xs btn-link\" href=\"#\"><i class='fa fa-times'></i>
		                        </a>
		                        <a class=\"btn box-collapse btn-xs btn-link\" href=\"#\"><i></i>
		                        </a>
		                    </div>
						</div>
						<div class='box-content'>
							<div class='box'>";
							// if ($_SESSION['level']=='kepala') {
								
								echo"	
									<a class='pull-right btn btn-primary btn-sm' href='?module=kurikulum&act=tambah'>Tambahkan Data</a>
							</div><br>";
							// } 
							echo"
							<div class='responsive-table'>
								<div class='scrollable-area'>
									<table class='data-table table table-bordered table-striped' style='margin-bottom:0;'>
									    <thead>
			                                <tr>
				                                <th width='5px'>
				                                  No
				                                </th>
				                                <th >
				                                  Nama Kurikulum
				                                </th>
				                                <th>
				                                  Status
				                                </th>
				                                <th width='130px' scope='row'>Tools</th>
			                                </tr>
			                            </thead>";
			                $tampil = mysqli_query($conn,"SELECT * FROM rb_kurikulum ORDER BY kode_kurikulum");
			                $no = 1; 	
			                while($r = mysqli_fetch_array($tampil)){
			                echo "<tbody>
			                	<tr>
				                    <td>$no</td>
				                    <td>$r[nama_kurikulum]</td>";
				            if($r['status_kurikulum']=='Ya'){
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
				                <td>
				                    <div class='text-right'>
				                        <a class='btn btn-success btn-xs' href='media.php?module=kurikulum&act=edit&id=$r[kode_kurikulum]'>
				                            <i class='fa fa-edit'></i>Edit
				                        </a>
				                    </div>
				                </td>
			                </tr>";
			                $no++;
			                }
			                    echo "
			                            
			                                 
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
	                      <span>Form Kurikulum</span>
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
		                          Kurikulum
		                        </li>
		                        <li class='separator'>
		                          <i class='fa fa-angle-right'></i>
		                        </li>
		                        <li class='active'>Manajemen Kurikulum</li>
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
								Form Kurikulum
							</div>
							<div class='actions'>
			                    <a class=\"btn box-remove btn-xs btn-link\" href=\"#\"><i class='fa fa-times'></i>
			                        </a>
			                        <a class=\"btn box-collapse btn-xs btn-link\" href=\"#\"><i></i>
			                    </a>
			            	</div>
						</div>
						<div class='box-content'>
							<form method='POST' class='form-horizontal' action='$aksi?module=kurikulum&act=input' enctype='multipart/form-data'>
								
									<table class='table table-condensed table-bordered'>
										<tbody>
											<tr>
												<th width='130px' scope='row'>Nama Kurikulum</th><td><input type='text' name='nama_kurikulum' class='form-control'></td>
											</tr>
											<tr>
												<th width='130px' scope='row'>Status Kurikulum</th><td><input type ='radio' name='status' value='Ya' checked='checked'>Aktif | <input type ='radio' name='status' value='Tidak'>Tidak Aktif</td>
											</tr>
										</tbody>
									</table>
								<div class='box-footer'>
				                    <button type='submit' name='tambah' class='btn btn-info'>Save</button>
				                    <a href='media.php?module=kurikulum'><button type='button' class='btn btn-danger pull-right'>Cancel</button></a>
				                    
				                </div>
							</form>
						</div>
        			</div>
        		</div>
        	</div>
        	";
		break;

		//edit 
		case'edit':
		$output = mysqli_query($conn,"SELECT * FROM rb_kurikulum WHERE kode_kurikulum='$_GET[id]'");
		$e = mysqli_fetch_array($output);
			echo "
			<div class='row'>
                <div class='col-sm-12'>
	                <div class='page-header'>
	                    <h1 class='pull-left'>
	                      <i class='fa fa-coffee'></i>
	                      <span>Form Edit Kurikulum</span>
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
		                          Kurikulum
		                        </li>
		                        <li class='separator'>
		                          <i class='fa fa-angle-right'></i>
		                        </li>
		                        <li class='active'>Manajemen Kurikulum</li>
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
								Form Kurikulum
							</div>
							<div class='actions'>
			                    <a class=\"btn box-remove btn-xs btn-link\" href=\"#\"><i class='fa fa-times'></i>
			                        </a>
			                        <a class=\"btn box-collapse btn-xs btn-link\" href=\"#\"><i></i>
			                    </a>
			            	</div>
						</div>
						<div class='box-content'>
							<form method='POST' class='form-horizontal' action='$aksi?module=kurikulum&act=update' enctype='multipart/form-data'>
							<input type ='hidden' name='id' value='$e[kode_kurikulum]'>
									<table class='table table-condensed table-bordered'>
										<tbody>
											<tr>
												<th width='130px' scope='row'>Nama Kurikulum</th><td><input type='text' name='nama_kurikulum' class='form-control' value='$e[nama_kurikulum]'></td>
											</tr>";
											if ($e['status_kurikulum']=='Ya') {
												echo "
											<tr>
												<th width='130px' scope='row'>Status Kurikulum</th><td><input type ='radio' name='status' value='Ya' checked='checked'>Aktif | <input type ='radio' name='status' value='Tidak'>Tidak Aktif</td>
											</tr>";
											}
											else{
												echo "
											<tr>
												<th width='130px' scope='row'>Status Kurikulum</th><td><input type ='radio' name='status' value='Ya'>Aktif | <input type ='radio' name='status' value='Tidak' checked='checked'>Tidak Aktif</td>
											</tr>	
												";
											}
								echo "	
										</tbody>
									</table>
								<div class='box-footer'>
				                    <button type='submit' name='edit' class='btn btn-info'>Save</button>
				                    <a href='media.php?module=kurikulum'><button type='button' class='btn btn-danger pull-right'>Cancel</button></a>
				                    
				                </div>
							</form>
						</div>
        			</div>
        		</div>
        	</div>
        	";
		break;
	}	