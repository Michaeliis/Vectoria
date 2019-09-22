<title>Driver Report</title>
<section role="main" class="content-body">
					<header class="page-header">
						<h2>Report</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Report</span></li>
								<li><span>Driver</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->

					<section class="panel">
						<div class="panel-body">
                            <?php foreach($driver as $drivers){?>
							<div class="invoice">
								<header class="clearfix">
									<div class="row">
										<div class="col-sm-6 mt-md">
											<h2 class="h2 mt-none mb-sm text-dark text-bold"><?= $drivers->userName?></h2>
											<h4 class="h4 m-none text-dark text-bold"><?= $drivers->userId?></h4>
										</div>
									</div>
								</header>
								<div class="bill-info">
									<div class="row">
										<div class="col-md-6">
											<div class="bill-to">
                                                <address>
													<?= $drivers->userAddress?>
													<br/>
                                                    <b>Phone:</b> <?= $drivers->userPhone?>
													<br/>
                                                    <b>Email:</b> <?= $drivers->userEmail?>
													<br/>
                                                    <b>DoB:</b> <?= $drivers->userDob?>
													<br/>
												</address>
											</div>
										</div>
								    </div>
								</div>
                                <?php } ?>
							
								<div class="table-responsive">
									<table class="table invoice-items">
										<thead>
											<tr class="h4 text-dark">
												<th id="cell-id"     class="text-semibold">Transport ID</th>
                                                <th id="cell-desc"   class="text-semibold">Car Plate</th>
                                                <th id="cell-desc"   class="text-semibold">Transport Date</th>
												<th id="cell-qty"    class="text-center text-semibold">Status</th>
                                                <th id="cell-qty"    class="text-center text-semibold">Action</th>
											</tr>
										</thead>
										<tbody>
                                             <?php foreach($tDetail as $transports){?>
											<tr>
												<td><?= $transports->transportId?></td>
												<td><?= $transports->carPlate?></td>
												<td><?= $transports->transportDate?></td>
												<td><?= $transports->transportStatus?></td>
                                                <td><a href="<?= base_url('active/transport/') . $transports->transportId?>" class="btn btn-info">Detail</a></td>
											</tr>
                                            <?php } ?>
										</tbody>
									</table>
								</div>
							
							</div>

							<div class="text-right mr-lg">
								<a href="pages-invoice-print.html" target="_blank" class="btn btn-primary ml-sm"><i class="fa fa-print"></i> Print</a>
							</div>
						</div>
					</section>

					<!-- end: page -->
				</section>