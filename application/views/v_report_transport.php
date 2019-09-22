<title>Transport Report</title>
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
								<li><span>Transport</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->

					<section class="panel">
						<div class="panel-body">
							<div class="invoice">
								<header class="clearfix">
									<div class="row">
										<div class="col-sm-6 mt-md">
                                            <?php foreach($trans as $transs){?>
											<h2 class="h2 mt-none mb-sm text-dark text-bold"><?= $transs->transportId?></h2>
											<h4 class="h4 m-none text-dark text-bold">Deliver to: <?= $transs->locationName?></h4>
                                            <h4 class="h4 m-none text-dark text-bold"><?= $transs->locationAddress?></h4>
                                            <h4 class="h4 m-none text-dark text-bold">Driver: <?= $transs->driverName?></h4>
                                            <h4 class="h4 m-none text-dark text-bold"><?= $transs->driverId?></h4>
                                            <h4 class="h4 m-none text-dark text-bold"><?= $transs->carPlate?></h4>
                                            <h4 class="h4 m-none text-dark text-bold"><?= $transs->transportDate?></h4>
                                            <h4 class="h4 m-none text-dark text-bold"><?= $transs->transportStatus?></h4>
                                            <?php } ?>
										</div>
									</div>
								</header>
								
							
								<div class="table-responsive">
									<table class="table invoice-items">
										<thead>
											<tr class="h4 text-dark">
                                                <th id="cell-item" class="text-semibold">Item</th>
												<th id="cell-desc" class="text-semibold">Description</th>
                                                <th id="cell-desc" class="text-semibold">Recipient</th>
												<th id="cell-qty" class="text-center text-semibold">Quantity</th>
                                                <th id="cell-qty" class="text-center text-semibold">Status</th>
                                                <th id="cell-qty" class="text-center text-semibold">Action</th>
											</tr>
										</thead>
										<tbody>
                                            <?php foreach($tDetail as $transports){?>
											<tr>
                                                <td><?= $transports->itemName?></td>
                                                <td><?= $transports->itemDetail?></td>
                                                <td><?= $transports->picName?></td>
												<td><?= $transports->itemQuantity?></td>
                                                <td><?= $transports->tDetailStatus?></td>
                                                <td><a href="<?= base_url('active/received/').$transports->tLocationId."/".$transports->itemName?>">Route</a></td>
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