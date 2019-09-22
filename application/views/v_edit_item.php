<title>New Item</title>
<section role="main" class="content-body">
					<header class="page-header">
						<h2>Register Item</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Item</span></li>
								<li><span>New Car</span></li>
							</ol>
					
							<a class="sidebar-right-toggle"><i></i></a>
						</div>
					</header>

					<!-- start: page -->
						<div class="row">
							<div class="col-lg-12">
								<section class="panel">
									<header class="panel-heading">
																
										<h2 class="panel-title">Register Item</h2>
									</header>
									<div class="panel-body">
										<form class="form-horizontal form-bordered" action="<?= base_url('item/update')?>" method="POST">
                                            
                                            <?php foreach($item as $items){?>
                                            <input name="itemId" type="text" id="itemId" value="<?= $items->itemId?>" required hidden>
                                            
											<div class="form-group">
												<label class="col-md-3 control-label" for="name">Name</label>
												<div class="col-md-6">
													<input name="name" type="text" class="form-control" id="name" value="<?= $items->itemName?>" required>
												</div>
											</div>
                                            
                                            <div class="form-group">
												<label class="col-md-3 control-label" for="weight">Weight</label>
												<div class="col-md-6">
													<div class="input-group mb-md">
													   <input name="weight" type="number" class="form-control" id="weight" min="0" value="<?= $items->itemWeight?>">
														<span class="input-group-addon ">Kg</span>
													</div>
												</div>
											</div>
                                                                                       
                                            <footer class="panel-footer">
                                                <div class="row">
                                                    <div class="col-sm-9 col-sm-offset-3">
                                                        <input type="submit" value="Submit" class="btn btn-primary">
                                                        <input type="reset" value="Reset" class="btn btn-default">
                                                    </div>
                                                </div>
                                            </footer>
                                            <?php } ?>
                                            
										</form>
									</div>
								</section>										
							</div>
						</div>
					<!-- end: page -->
				</section>