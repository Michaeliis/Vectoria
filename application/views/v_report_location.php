<title>Location Report</title>
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
								<li><span>Location</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->

					<section class="panel">
						<div class="panel-body">
                            <?php foreach($location as $locations){?>
							<div class="invoice">
								<header class="clearfix">
									<div class="row">
										<div class="col-sm-6 mt-md">
											<h2 class="h2 mt-none mb-sm text-dark text-bold"><?= $locations->locationName?></h2>
											<h4 class="h4 m-none text-dark text-bold"><?= $locations->locationId?></h4>
                                            <h4 class="h4 m-none text-dark text-bold">PIC: <?= $locations->userName?></h4>
										</div>
									</div>
								</header>
								<div class="bill-info">
									<div class="row">
										<div class="col-md-6">
											<div class="bill-to">
                                                <address>
													<?= $locations->locationAddress?>
													<br/>
                                                    <b>Phone:</b> <?= $locations->userPhone?>
													<br/>
                                                    <b>Email:</b> <?= $locations->userEmail?>
													<br/>
												</address>
											</div>
										</div>
								    </div>
								</div>
                                <?php } ?>
							     
                                
                                <div class="panel-body">
                                    <a href="<?=base_url('car/printing')?>" target="_blank" class="btn btn-primary">Print Table</a>
                                    <table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="<?=base_url()?>assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
                                        <thead>
											<tr class="h4 text-dark">
												<th id="cell-id"     class="text-semibold">Transport ID</th>
                                                <th id="cell-item"   class="text-semibold">Item</th>
												<th id="cell-desc"   class="text-semibold">Description</th>
                                                <th id="cell-desc"   class="text-semibold">Recipient</th>
                                                <th id="cell-desc"   class="text-semibold">Driver</th>
                                                <th id="cell-desc"   class="text-semibold">Transport Date</th>
												<th id="cell-qty"    class="text-center text-semibold">Quantity</th>
											</tr>
										</thead>
                                        <tbody>
                                            <?php foreach($tDetail as $transports){?>
											<tr>
                                                <td><?= $transports->transportId?></td>
                                                <td><?= $transports->itemName?></td>
                                                <td><?= $transports->itemDetail?></td>
                                                <td><?= $transports->picName?></td>
												<td><?= $transports->driverName?></td>
												<td><?= $transports->transportDate?></td>
												<td><?= $transports->itemQuantity?></td>
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