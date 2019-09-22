<title>Transport List</title>        
<section role="main" class="content-body">
					<header class="page-header">
						<h2>Transport List</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="<?= base_url()?>">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Transport</span></li>
								<li><span>Transport List</span></li>
							</ol>
					
							<a class="sidebar-right-toggle"></a>
						</div>
					</header>

					<!-- start: page -->
						
						<section class="panel">
							<header class="panel-heading">
						
								<h2 class="panel-title">Transport List</h2>
							</header>
							<div class="panel-body">
                                <a href="<?=base_url('transport/printing')?>" target="_blank" class="btn btn-primary">Print Table</a>
								<table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="<?=base_url()?>assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
									<thead>
										<tr>
											<th>Transport ID</th>
											<th>Driver</th>
											<th>Car</th>
                                            <th>Transport Date</th>
                                            <th>Action</th>
                                            <th>Status</th>
										</tr>
									</thead>
									<tbody>
                                        <?php foreach($transport as $transports){?>
                                        <tr>
                                            <td><?= $transports->transportId?></td>
                                            <td><?= $transports->userName?></td>
                                            <td><?= $transports->carPlate?></td>
                                            <td><?= $transports->transportDate?></td>
                                            <td>
                                                <?php
                                                 if($transports->transportStatus == 1){?>
                                                <a href="<?= base_url('transport/inProgress/') . $transports->transportId?>" class="btn btn-primary">
                                                    Start Transport
                                                </a>
                                                <?php } ?>
                                                
                                                <?php
                                                 if($transports->transportStatus == 2){?>
                                                <a href="<?= base_url('transport/finished/') . $transports->transportId?>" class="btn btn-success">
                                                    Finish
                                                </a>
                                                <?php } ?>
                                                
                                                <a href="<?= base_url('transport/cancel/') . $transports->transportId?>" class="btn btn-danger">
                                                    Cancel
                                                </a>
                                                
                                                <a href="<?= base_url('active/transport/') . $transports->transportId?>" class="btn btn-info">
                                                    Detail
                                                </a>
                                            </td>
                                            
                                            <?php
                                                 if($transports->transportStatus == 0){
                                                     echo "<td style='color:red'>Canceled</td>";
                                                 }else if($transports->transportStatus ==1){
                                                     echo "<td>In Schedule</td>";
                                                 }else if($transports->transportStatus ==2){
                                                     echo "<td style='color:blue'>Delivering</td>";
                                                 }else if($transports->transportStatus ==3){
                                                     echo "<td style='color:green'>Delivered</td>";
                                                 }
                                            ?>
                                            
                                        </tr>
                                        <?php }?>
                                    </tbody>
								</table>
							</div>
						</section>
						
					<!-- end: page -->
				</section>