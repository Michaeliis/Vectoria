<title>Item List</title>        
<section role="main" class="content-body">
					<header class="page-header">
						<h2>Item List</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="<?= base_url()?>">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Item</span></li>
								<li><span>Item List</span></li>
							</ol>
					
							<a class="sidebar-right-toggle"></a>
						</div>
					</header>

					<!-- start: page -->
						
						<section class="panel">
							<header class="panel-heading">
						
								<h2 class="panel-title">Item List</h2>
							</header>
							<div class="panel-body">
                                <a href="<?=base_url('item/printing')?>" target="_blank" class="btn btn-primary">Print Table</a>
								<table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="<?=base_url()?>assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
									<thead>
										<tr>
											<th>Item ID</th>
                                            <th>Name</th>
											<th>Weight</th>
                                            <th>Action</th>
										</tr>
									</thead>
									<tbody>
                                        <?php foreach($item as $items){?>
                                        <tr>
                                            <td><?= $items->itemId ?></td>
                                            <td><?= $items->itemName ?></td>
                                            <td><?= $items->itemWeight ?></td>
                                            <td><a href="<?= base_url('item/edit/') . $items->itemId?>" class="btn btn-info">Edit</a></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
								</table>
							</div>
						</section>
						
					<!-- end: page -->
				</section>