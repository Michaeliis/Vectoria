<title>Car List</title>        
<section role="main" class="content-body">
					<header class="page-header">
						<h2>Report List</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="<?= base_url()?>">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Report</span></li>
								<li><span>Report List</span></li>
							</ol>
					
							<a class="sidebar-right-toggle"></a>
						</div>
					</header>

					<!-- start: page -->
						
						<section class="panel">
							<header class="panel-heading">
						
								<h2 class="panel-title">Report List</h2>
							</header>
							<div class="panel-body">
                                <a href="<?=base_url('problem/printing')?>" target="_blank" class="btn btn-primary">Print Table</a>
								<table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="<?=base_url()?>assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
									<thead>
										<tr>
											<th>Transport Id</th>
                                            <th>Location</th>
											<th>Kurang / Lebih</th>
											<th>Jumlah Kurang / Lebih</th>
                                            <th>Jumlah Rusak</th>
                                            <th>Status</th>
										</tr>
									</thead>
									<tbody>
                                        <?php foreach($problem as $problems){?>
                                        <tr>
                                            <td><?= $problems->transportId ?></td>
                                            <td><?= $problems->locationName ?></td>
                                            <td>
                                                <?php if($problems->difference > 0){
                                                        echo "Kelebihan";
                                                    }else if($problems->difference < 0){
                                                        echo "Kekurangan";
                                                    } 
                                                ?>
                                            </td>
                                            <td><?= abs($problems->difference) ?></td>
                                            <td><?= $problems->broke ?></td>
                                            <td><?= $problems->status ?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
								</table>
							</div>
						</section>
						
					<!-- end: page -->
				</section>