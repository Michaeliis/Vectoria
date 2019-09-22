<title>Car List</title>        
<section role="main" class="content-body">
					<header class="page-header">
						<h2>Car List</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="<?= base_url()?>">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Car</span></li>
								<li><span>Car List</span></li>
							</ol>
					
							<a class="sidebar-right-toggle"></a>
						</div>
					</header>

					<!-- start: page -->
						
						<section class="panel">
							<header class="panel-heading">
						
								<h2 class="panel-title">Car List</h2>
							</header>
							<div class="panel-body">
                                <a href="<?=base_url('car/printing')?>" target="_blank" class="btn btn-primary">Print Table</a>
								<table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="<?=base_url()?>assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
									<thead>
										<tr>
											<th>Car Plate</th>
                                            <th>Name</th>
											<th>Max Load</th>
											<th>Last Renew</th>
                                            <th>Action</th>
										</tr>
									</thead>
									<tbody>
                                        <?php foreach($car as $cars){?>
                                        <tr>
                                            <td><?= $cars->carPlate ?></td>
                                            <td><?= $cars->carName ?></td>
                                            <td><?= $cars->carLoad ?></td>
                                            <td><?= $cars->carRegLast ?></td>
                                            <td><a href="<?= base_url('car/edit/') . $cars->carPlate?>" class="btn btn-info">Edit</a></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
								</table>
							</div>
						</section>
						
					<!-- end: page -->
				</section>