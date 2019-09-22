<title>User List</title>        
<section role="main" class="content-body">
					<header class="page-header">
						<h2>User List</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="<?= base_url()?>">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>User</span></li>
								<li><span>User List</span></li>
							</ol>
					
							<a class="sidebar-right-toggle"></a>
						</div>
					</header>

					<!-- start: page -->
						
						<section class="panel">
							<header class="panel-heading">
						
								<h2 class="panel-title">User List</h2>
							</header>
							<div class="panel-body">
                                <a href="<?=base_url('user/printing')?>" target="_blank" class="btn btn-primary">Print Table</a>
								<table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="<?=base_url()?>assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
									<thead>
										<tr>
											<th>User ID</th>
                                            <th>Position</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Action</th>
										</tr>
									</thead>
									<tbody>
                                        <?php foreach($user as $users){?>
                                        <tr>
                                            <td><?= $users->userId ?></td>
                                            <td><?= $users->userPosition ?></td>
                                            <td><?= $users->userName ?></td>
                                            <td><?= $users->userPhone ?></td>
                                            <td><?= $users->userEmail ?></td>
                                            <td>
                                                <?php if($_SESSION['userPosition']=="admin"){?>
                                                <a class="btn btn-info" href="<?= base_url('user/edit/') . $users->userId ?>">
                                                    Edit
                                                </a>
                                                <?php } ?>
                                                <?php if($users->userPosition=="driver"){?>
                                                <a class="btn btn-primary" href="<?= base_url('report/driver/') . $users->userId ?>">
                                                    View Report
                                                </a>
                                                <?php }?>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
								</table>
							</div>
						</section>
						
					<!-- end: page -->
				</section>