<title>Edit User</title>
<section role="main" class="content-body">
					<header class="page-header">
						<h2>Edit User</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>User</span></li>
								<li><span>Edit User</span></li>
							</ol>
					
							<a class="sidebar-right-toggle"><i></i></a>
						</div>
					</header>

					<!-- start: page -->
						<div class="row">
							<div class="col-lg-12">
								<section class="panel">
									<header class="panel-heading">
																
										<h2 class="panel-title">Edit User</h2>
									</header>
									<div class="panel-body">
                                        <?php foreach($user as $users){?>
										<form class="form-horizontal form-bordered" method="POST" action="<?= base_url('user/update')?>">
                                            <input name="userId" type="text" id="userId" value="<?= $users->userId ?>" required hidden>
											<div class="form-group">
												<label class="col-md-3 control-label" for="name">Name</label>
												<div class="col-md-6">
													<input name="name" type="text" class="form-control" id="name" value="<?= $users->userName ?>" required>
												</div>
											</div>
                                            
                                            <div class="form-group">
												<label class="col-md-3 control-label" for="email">Email</label>
												<div class="col-md-6">
													<input name="email" type="text" class="form-control" id="email" value="<?= $users->userEmail ?>" required>
												</div>
											</div>
                                            
                                            <div class="form-group">
												<label class="col-md-3 control-label">Date of Birth</label>
												<div class="col-md-6">
													<div class="input-group mb-md">
														<span class="input-group-addon">
															<i class="fa fa-calendar"></i>
														</span>
														<input type="text" name="dob" data-plugin-datepicker class="form-control" value="<?= $users->userDob ?>" required>
													</div>
												</div>
											</div>
                                            
                                            <div class="form-group">
												<label class="col-md-3 control-label" for="phone">Phone Number</label>
												<div class="col-md-6">
													<input name="phone" type="text" class="form-control" id="phone" value="<?= $users->userPhone ?>" required>
												</div>
											</div>
                                            
                                            <div class="form-group">
												<label class="col-md-3 control-label" for="textareaDefault">Address</label>
												<div class="col-md-6">
													<textarea name="address" class="form-control" rows="3" id="textareaDefault"> <?= $users->userAddress ?></textarea>
												</div>
											</div>
                                            <!--
                                            <div class="form-group">
												<label class="col-md-3 control-label">File Upload</label>
												<div class="col-md-6">
													<div class="fileupload fileupload-new" data-provides="fileupload">
														<div class="input-append">
															<div class="uneditable-input">
																<i class="fa fa-file fileupload-exists"></i>
																<span class="fileupload-preview"></span>
															</div>
															<span class="btn btn-default btn-file">
																<span class="fileupload-exists">Change</span>
																<span class="fileupload-new">Select file</span>
																<input type="file" />
															</span>
															<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
														</div>
													</div>
												</div>
											</div>
                                            -->
                                            <div class="form-group">
												<label class="col-md-3 control-label" for="position">Position</label>
												<div class="col-md-6">
													<select id="position" name="position" class="form-control mb-md">
                                                        <option>Select Position</option>
														<option value="admin">Admin</option>
														<option value="employee">Employee</option>
														<option value="driver">Driver</option>
													</select>
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
                                        <?php } ?>
									</div>
								</section>										
							</div>
						</div>
					<!-- end: page -->
				</section>