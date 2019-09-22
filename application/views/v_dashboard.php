<title>Dashboard</title>
<section role="main" class="content-body">
					<header class="page-header">
						<h2>Dashboard</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Dashboard</span></li>
							</ol>
					
							<ol class="sidebar-right-toggle"></ol>
						</div>
					</header>


					<!-- start: page -->
					<div class="row">
						<div class="col-md-6 col-lg-12 col-xl-6">
							<section class="panel">
								<div class="panel-body">
									<div class="row">
										<div class="col-lg-8">
											<div class="chart-data-selector" id="salesSelectorWrapper">
												<h2>
                                                    <strong>Delivery This Year:</strong>
												</h2>

												<div id="salesSelectorItems" class="chart-data-selector-items mt-sm">
													<!-- Flot: Sales JSOFT Admin -->
													<div class="chart chart-sm" data-sales-rel="JSOFT Admin" id="flotDashSales1" class="chart-active"></div>
													<script>

														var flotDashSales1Data = [{
														    data: [
                                                                <?php
                                                                $arrMonth = array();
                                                                $arrShow = array();
                                                                
                                                                foreach($month as $months){
                                                                    $arrMonth[$months->month] = $months->counter;
                                                                }
                                                                
                                                                for($mon = 1; $mon <= 12; $mon++){
                                                                    if(isset($arrMonth[$mon])){
                                                                        $arrShow[] = '["'. date_format(date_create("2019-".$mon."-01"), "M").'",'.$arrMonth[$mon]. "], ";
                                                                    }else{
                                                                        $arrShow[] = '["'. date_format(date_create("2019-".$mon."-01"), "M").'", 0], ';
                                                                    }
                                                                }
                                                                
                                                                foreach($arrShow as $arrShows){
                                                                    echo $arrShows;
                                                                }
                                                                
                                                                ?>
														    ],
														    color: "#0088cc"
														}];

														// See: <?= base_url()?>/javascripts/dashboard/examples.dashboard.js for more settings.

													</script>

													
												</div>

											</div>
										</div>
									</div>
								</div>
							</section>
						</div>
						<div class="col-md-6 col-lg-12 col-xl-6">
							<div class="row">
								<div class="col-md-12 col-lg-6 col-xl-6">
									<section class="panel panel-featured-left panel-featured-primary">
										<div class="panel-body">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-primary">
														<i class="fa fa-life-ring"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">Total Transport</h4>
														<div class="info">
															<strong class="amount">
                                                                <?= $curmonths; ?>
                                                            </strong>
														</div>
													</div>
													<div class="summary-footer">
														<a class="text-muted text-uppercase">(view all)</a>
													</div>
												</div>
											</div>
										</div>
									</section>
								</div>
								<div class="col-md-12 col-lg-6 col-xl-6">
									<section class="panel panel-featured-left panel-featured-secondary">
										<div class="panel-body">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-secondary">
														<i class="fa fa-car"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">Total Cars</h4>
														<div class="info">
															<strong class="amount">
                                                                <?= $curcars; ?>
                                                            </strong>
														</div>
													</div>
													<div class="summary-footer">
														<a class="text-muted text-uppercase">(view all)</a>
													</div>
												</div>
											</div>
										</div>
									</section>
								</div>
								<div class="col-md-12 col-lg-6 col-xl-6">
									<section class="panel panel-featured-left panel-featured-tertiary">
										<div class="panel-body">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-tertiary">
														<i class="fa fa-shopping-cart"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">Today's Transport</h4>
														<div class="info">
															<strong class="amount">
                                                                <?php
                                                                foreach($curday as $curdays){
                                                                    echo $curdays->counter;
                                                                }
                                                                ?>
                                                            </strong>
														</div>
													</div>
													<div class="summary-footer">
														<a class="text-muted text-uppercase">(view all)</a>
													</div>
												</div>
											</div>
										</div>
									</section>
								</div>
								<!--
                                <div class="col-md-12 col-lg-6 col-xl-6">
									<section class="panel panel-featured-left panel-featured-quartenary">
										<div class="panel-body">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-quartenary">
														<i class="fa fa-usd"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">Service Cost This Month</h4>
														<div class="info">
															<strong class="amount">Rp. 3,765,000</strong>
														</div>
													</div>
													<div class="summary-footer">
														<a class="text-muted text-uppercase">(report)</a>
													</div>
												</div>
											</div>
										</div>
									</section>
								</div>
                                -->
							</div>
						</div>
					</div>

					<!-- end: page -->
				</section>
			</div>
        </section>