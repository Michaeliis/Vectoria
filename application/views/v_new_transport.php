<style>
    #dataTable td{
        vertical-align: top;
        padding: 5px;
    }
</style>
<title>New Transport</title>
<section role="main" class="content-body">
					<header class="page-header">
						<h2>New Transport</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Transport</span></li>
								<li><span>New Transport</span></li>
							</ol>
					
							<a class="sidebar-right-toggle"><i></i></a>
						</div>
					</header>

					<!-- start: page -->
						<div class="row">
							<div class="col-lg-12">
								<section class="panel">
									<header class="panel-heading">
																
										<h2 class="panel-title">New Transport</h2>
									</header>
									<div class="panel-body">
										<form class="form-horizontal form-bordered" action="<?= base_url('transport/insert')?>" method="POST">
                                            
                                            <div class="form-group">
												<label class="col-md-3 control-label" for="position">Driver</label>
												<div class="col-md-6">
													<select id="driver" name="driver" class="form-control mb-md" required>
                                                        <option value="">Select Driver</option>
                                                        <?php foreach($driver as $drivers){?>
														<option value="<?= $drivers->userId?>"><?= $drivers->userName?></option>
														<?php } ?>
													</select>
												</div>
											</div>
                                            
                                            <div class="form-group">
												<label class="col-md-3 control-label" for="car">Car</label>
												<div class="col-md-6">
													<select id="car" name="car" class="form-control mb-md" required>
                                                        <option value="">Select Car</option>
                                                        <?php foreach($car as $cars){?>
														<option value="<?= $cars->carPlate?>"><?= $cars->carName?></option>
														<?php } ?>
													</select>
												</div>
											</div>
                                            
                                            <div class="form-group">
												<label class="col-md-3 control-label">Transport Date</label>
												<div class="col-md-6">
													<div class="input-group mb-md">
														<span class="input-group-addon">
															<i class="fa fa-calendar"></i>
														</span>
														<input type="text" name="transDate" data-plugin-datepicker data-date-format="yyyy/mm/dd" class="form-control">
													</div>
												</div>
											</div>
                                            
                                            <div class="form-group">
												<label class="col-md-3 control-label">Starting Location</label>
												<div class="col-md-6">
                                                    <select id="start" required="required" name="start" class="form-control mb-md">
                                                        <option value="">Select Starting Location</option>
                                                        <?php foreach($location as $locations){?>
                                                        <option value="<?= $locations->locationId?>"><?= $locations->locationName?></option>
                                                        <?php }?>
                                                    </select>
												</div>
											</div>
                                            
                                            <h3>Transport Location</h3>
                                            <p> 
                                              <input type="button" class="btn-success" value="Add Item" onClick="addRow('dataTable')"> 
                                              <input type="button" class="btn-danger" value="Remove Item" onClick="deleteRow('dataTable')">
                                            </p>
                                            
                                            <table id="dataTable" class="input-group col-md-9 mb-md">
                                              <tbody>
                                                  
                                                <tr>
                                                  <p>
                                                    <td><input type="checkbox" required="required" name="chk[]" checked="checked" /></td>
                                                    <td>
                                                        <select id="location" required="required" name="location[]" class="form-control">
                                                            <option>Select Location</option>
                                                            <?php foreach($location as $locations){?>
                                                            <option value="<?= $locations->locationId?>"><?= $locations->locationName?></option>
                                                            <?php }?>
                                                        </select>
                                                     </td>
                                                        </p>
                                                </tr>
                                                </tbody>
                                            </table>
                                            
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
<script>
function addRow(tableID) {
	var table = document.getElementById(tableID);
	var rowCount = table.rows.length;
	if(rowCount < 20){                            // limit the user from creating fields more than your limits
		var row = table.insertRow(rowCount);
		var colCount = table.rows[0].cells.length;
		for(var i=0; i <colCount; i++) {
			var newcell = row.insertCell(i);
			newcell.innerHTML = table.rows[0].cells[i].innerHTML;
		}
	}else{
		 alert("Maximum location count is 20");
			   
	}
}

function deleteRow(tableID) {
	var table = document.getElementById(tableID);
	var rowCount = table.rows.length;
	for(var i=0; i<rowCount; i++) {
		var row = table.rows[i];
		var chkbox = row.cells[0].childNodes[0];
		if(null != chkbox && true == chkbox.checked) {
			if(rowCount <= 1) {               // limit the user from removing all the fields
				alert("Cannot Remove all the Item.");
				break;
			}
			table.deleteRow(i);
			rowCount--;
			i--;
		}
	}
}
</script>