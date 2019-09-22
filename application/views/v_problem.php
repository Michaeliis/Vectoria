<title>Report Problem</title>
<section role="main" class="content-body">
					<header class="page-header">
						<h2>Report Problem</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Transport</span></li>
								<li><span>Report Problem</span></li>
							</ol>
					
							<a class="sidebar-right-toggle"><i></i></a>
						</div>
					</header>

					<!-- start: page -->
						<div class="row">
							<div class="col-lg-12">
								<section class="panel">
									<header class="panel-heading">
																
										<h2 class="panel-title">Report Problem</h2>
									</header>
									<div class="panel-body">
                                        
                                        <!--Start Form-->
										<form class="form-horizontal form-bordered" method="POST" action="<?= base_url('problem/newproblem')?>">
                                            <?php foreach($tDetail as $tDetails){?>
                                            
                                            <input type="text" name="tLocationId" value="<?= $tDetails->tLocationId?>" hidden>
                                            
                                            <input name="itemId" type="text" value="<?= $tDetails->itemId?>" id="itemId" hidden>
                                            
											<div class="form-group">
												<label class="col-md-3 control-label" for="location">Location</label>
												<div class="col-md-6">
													<input name="location" type="text" class="form-control" id="location" value="<?= $tDetails->locationName?>" required readonly>
												</div>
											</div>
                                            
                                            <div class="form-group">
												<label class="col-md-3 control-label" for="item">Item Name</label>
												<div class="col-md-6">
													<input name="itemName" type="text" class="form-control" value="<?= $tDetails->itemName?>" id="itemName" readonly>
												</div>
											</div>
                                            
                                            <div class="form-group">
												<label class="col-md-3 control-label" for="kuBi">Kurang / Lebih</label>
												<div class="col-md-6">
													<select id="kuBi" name="kuBi" class="form-control mb-md">
                                                        <option>Select Type</option>
														<option value="kurang">Kurang Barang</option>
														<option value="lebih">Kelebihan barang</option>
													</select>
												</div>
											</div>
                                            
                                            <div class="form-group">
												<label class="col-md-3 control-label" for="juRang">Jumlah Kekurangan / kelebihan</label>
												<div class="col-md-6">
													<input name="juRang" type="number" class="form-control" id="juRang">
												</div>
											</div>
                                            
                                            <div class="form-group">
												<label class="col-md-3 control-label" for="rusak">Jumlah Kerusakan Barang (kosongkan bila tidak ada)</label>
												<div class="col-md-6">
													<input name="rusak" type="number" class="form-control" id="rusak">
												</div>
											</div>
                                            
                                            <div class="form-group">
												<label class="col-md-3 control-label" for="detail">Problem Detail</label>
												<div class="col-md-6 mb-md">
													<textarea name="detail" class="form-control" rows="3" id="detail"></textarea>
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