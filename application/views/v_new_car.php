<title>New Car</title>
<section role="main" class="content-body">
					<header class="page-header">
						<h2>Register Car</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Car</span></li>
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
																
										<h2 class="panel-title">Register Car</h2>
									</header>
									<div class="panel-body">
										<form class="form-horizontal form-bordered" action="<?= base_url('car/insert')?>" method="POST">
											<div class="form-group">
												<label class="col-md-3 control-label" for="name">Name</label>
												<div class="col-md-6">
													<input name="name" type="text" class="form-control" id="name" required>
												</div>
											</div>
                                            
                                            <div class="form-group">
												<label class="col-md-3 control-label" for="plate">Plate Number</label>
												<div class="col-md-6">
													<input name="plate" type="text" class="form-control" id="plate" required>
												</div>
											</div>
                                            
                                            <div class="form-group">
												<label class="col-md-3 control-label" for="load">Max Load</label>
												<div class="col-md-6">
													<div class="input-group mb-md">
													   <input name="load" type="number" class="form-control" id="load" min="0">
														<span class="input-group-addon ">Kg</span>
													</div>
												</div>
											</div>
                                            
                                            <div class="form-group">
												<label class="col-md-3 control-label" for="weight">Car Weight</label>
												<div class="col-md-6">
													<div class="input-group mb-md">
													   <input name="weight" type="number" class="form-control" id="weight" min="0">
														<span class="input-group-addon ">Kg</span>
													</div>
												</div>
											</div>
                                            
                                            <div class="form-group">
												<label class="col-md-3 control-label" for="length">Car Length</label>
												<div class="col-md-6">
													<div class="input-group mb-md">
													   <input name="length" type="number" class="form-control" id="length" min="0">
														<span class="input-group-addon ">m</span>
													</div>
												</div>
											</div>
                                            
                                            <div class="form-group">
												<label class="col-md-3 control-label" for="width">Car Width</label>
												<div class="col-md-6">
                                                    <div class="input-group mb-md">
													   <input name="width" type="number" class="form-control" id="width" min="0">
														<span class="input-group-addon ">m</span>
													</div>
												</div>
											</div>
                                            
                                            <div class="form-group">
												<label class="col-md-3 control-label" for="gas">Gas Usage</label>
												<div class="col-md-6">
                                                    <div class="input-group mb-md">
														<input name="gas" type="number" class="form-control" id="gas" min="0">
														<span class="input-group-addon ">Km/Litre</span>
													</div>													
												</div>
											</div>
                                            
                                            <div class="form-group">
												<label class="col-md-3 control-label">Vehicle Registration Last Renew</label>
												<div class="col-md-6">
													<div class="input-group mb-md">
														<span class="input-group-addon">
															<i class="fa fa-calendar"></i>
														</span>
														<input name="last" type="text" data-plugin-datepicker data-date-format="yyyy/mm/dd" class="form-control">
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
										</form>
									</div>
								</section>										
							</div>
						</div>
					<!-- end: page -->
				</section>