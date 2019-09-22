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
                                            $tstatus = $transs->tLocationStatus;?>
											<h4 class="h4 m-none text-dark text-bold">Driver: <?= $transs->driverName?></h4>
											<h4 class="h4 m-none text-dark text-bold"><?= $transs->driverId?></h4>
                                            <h4 class="h4 m-none text-dark text-bold">Transport ID: <?= $transs->transportId?></h4>
                                            <h4 class="h4 m-none text-dark text-bold"><?= $transs->carPlate?></h4>
                                            <h4 class="h4 m-none text-dark text-bold">Location: <?= $transs->locationName?></h4>
                                            <h4 class="h4 m-none text-dark text-bold">Address: <?= $transs->locationAddress?></h4>
                                            <h4 class="h4 m-none text-dark text-bold"><?= $transs->transportDate?></h4>
                                            <?php } ?>
										</div>
									</div>
								</header>
                                
                                <div class="text-right mr-lg">
                                    <a href="<?= base_url('active/additem/') . $tLocationId ?>" class="btn btn-success ml-sm"><i class="fa fa-plus"></i> Add Item </a>
                                </div>
                                <br>
							
								<div class="table-responsive">
									<table class="table invoice-items">
										<thead>
											<tr class="h4 text-dark">
                                                <th id="cell-item"   class="text-semibold">Item</th>
												<th id="cell-desc"   class="text-semibold">Description</th>
                                                <th id="cell-desc"   class="text-semibold">Recipient</th>
												<th id="cell-qty"    class="text-center text-semibold">Quantity</th>
                                                <th id="cell-desc"   class="text-semibold">Status</th>
                                                <th id="cell-desc"   class="text-semibold">Action</th>
											</tr>
										</thead>
										<tbody>
                                            <?php
                                            foreach($transport as $transports){?>
											<tr>
                                                <td><?= $transports->itemName?></td>
                                                <td><?= $transports->itemDetail?></td>
												<td><?= $transports->picName?></td>
												<td><?= $transports->itemQuantity?></td>
                                                <td>
                                                    <?php
                                                    if($transports->tDetailStatus == 1){
                                                        echo "Waiting";
                                                    }else if($transports->tDetailStatus == 2){
                                                        echo "Delivering";
                                                    }else if($transports->tDetailStatus == 3){
                                                        echo "Received";
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php if($tstatus==2){?>
                                                    <a href="<?= base_url('active/finishItem/') . $transports->tLocationId?>" class="btn btn-primary">
                                                        Received
                                                    </a>
                                                    <?php } ?>
                                                    
                                                    <a href="<?= base_url('problem/problem/') . $transports->tLocationId?>" class="btn btn-danger">
                                                        Report Problem
                                                    </a>
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