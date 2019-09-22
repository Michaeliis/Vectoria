<title>Transport Detail</title>
<section role="main" class="content-body">
					<header class="page-header">
						<h2>Transport Detail</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Active Transport</span></li>
								<li><span>Detail</span></li>
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
                                            <?php
                                            foreach($trans as $transs){
                                            $transId = $transs->transportId;?>
                                            
											<h4 class="h4 m-none text-dark text-bold">Driver: <?= $transs->driverName?></h4>
											<h4 class="h4 m-none text-dark text-bold"><?= $transs->driverId?></h4>
                                            <h4 class="h4 m-none text-dark text-bold">Transport ID: <?= $transs->transportId?></h4>
                                            <h4 class="h4 m-none text-dark text-bold"><?= $transs->carPlate?></h4>
                                            <h4 class="h4 m-none text-dark text-bold">
                                                <?= date_format(date_create($transs->transportDate), "d-F-Y")?>
                                            </h4>
                                            <?php } ?>
										</div>
									</div>
								</header>
							
								<div class="table-responsive">
									<table class="table invoice-items">
										<thead>
											<tr class="h4 text-dark">
												<th id="cell-item"   class="text-semibold">Location</th>
                                                <th id="cell-item"   class="text-semibold">Address</th>
                                                <th id="cell-desc"   class="text-semibold">Recipient</th>
                                                <th id="cell-desc"   class="text-semibold">Status</th>
                                                <th id="cell-desc"   class="text-semibold">Action</th>
											</tr>
										</thead>
										<tbody>
                                            <?php
                                            foreach($transport as $transports){?>
											<tr>
												<td class="text-semibold text-dark"><?= $transports->locationName?></td>
                                                <td><?= $transports->locationAddress?></td>
												<td><?= $transports->picName?></td>
                                                <?php if($transports->tLocationStatus == 0){
                                                     echo "<td style='color:red'>Canceled</td>";
                                                 }else if($transports->tLocationStatus ==1){
                                                     echo "<td>In Schedule</td>";
                                                 }else if($transports->tLocationStatus ==2){
                                                     echo "<td style='color:blue'>Delivering</td>";
                                                 }else if($transports->tLocationStatus ==3){
                                                     echo "<td style='color:green'>Delivered</td>";
                                                 }
                                                ?>
                                                <td>
                                                    <a href="https://www.google.com/maps/dir/?api=1&destination=<?= $transports->locationLatitude?>,<?= $transports->locationLongitude?>&travelmode=driving" class="btn btn-info" target="_blank">
                                                        Route
                                                    </a>
                                                    
                                                    <a href="<?= base_url('active/detail/'). $transports->tLocationId?>" class="btn btn-primary">
                                                        Items
                                                    </a>
                                                    
                                                    
                                                    <?php if($transports->tLocationStatus == 1){?>
                                                    <a href="<?= base_url('active/startLocation/') . $transports->tLocationId . "/" . $transId?>" class="btn btn-success">
                                                        Start
                                                    </a>
                                                    <?php } ?>
                                                    
                                                    <?php if($transports->tLocationStatus == 2){?>
                                                    <a href="<?= base_url('active/finishLocation/') . $transports->tLocationId . "/" . $transId?>" class="btn btn-danger">
                                                        Finish
                                                    </a>
                                                    <?php } ?>
                                                </td>
											</tr>
                                            <?php }?>
										</tbody>
									</table>
								</div>
							
							</div>

							<div class="text-right mr-lg">
								<a href="pages-invoice-print.html" target="_blank" class="btn btn-primary ml-sm"><i class="fa fa-print"></i> Print Clearance </a>
							</div>
						</div>
					</section>

					<!-- end: page -->
				</section>