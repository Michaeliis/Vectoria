<title>Locations List</title>        
<section role="main" class="content-body">
					<header class="page-header">
						<h2>Locations List</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="<?= base_url()?>">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Location</span></li>
								<li><span>Location List</span></li>
							</ol>
					
							<a class="sidebar-right-toggle"></a>
						</div>
					</header>

					<!-- start: page -->
						
						<section class="panel">
							<header class="panel-heading">
						
								<h2 class="panel-title">Locations List</h2>
							</header>
							<div class="panel-body">
                                <a href="<?=base_url('location/printing')?>" target="_blank" class="btn btn-primary">Print Table</a>
								<table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="<?=base_url()?>assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
									<thead>
										<tr>
                                            <th>Location ID</th>
											<th>Location Name</th>
                                            <th>Address</th>
                                            <th>Person in Charge</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
                                        <?php foreach($location as $locations){?>
                                        <tr>
                                            <td><?= $locations->locationId?></td>
                                            <td><?= $locations->locationName?></td>
                                            <td><?= $locations->locationAddress?></td>
                                            <td><?= $locations->locationPiC?></td>
                                            <td>
                                                <?php if($_SESSION['userPosition'] == 'admin' || $_SESSION['userPosition'] == 'employee'){?>
                                                <a href='<?= base_url("location/edit/"). $locations->locationId?>' class="btn btn-primary">Edit</a>
                                                <a href='<?= base_url("report/location/"). $locations->locationId?>' class="btn btn-info">View Report</a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
								</table>
							</div>
						</section>
						
					<!-- end: page -->
				</section>