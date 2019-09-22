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
                                    
                                    <header class="clearfix">
                                        <div class="row">
                                            <div class="col-sm-6 mt-md">
                                                <?php
                                                foreach($trans as $transs){
                                                $locationId = $transs->locationId;
                                                $tLocationId = $transs->tLocationId;?>
                                                
                                                <h4 class="h4 m-none text-dark text-bold">Driver: <?= $transs->driverName?></h4>
                                                <h4 class="h4 m-none text-dark text-bold"><?= $transs->driverId?></h4>
                                                <h4 class="h4 m-none text-dark text-bold">Transport ID: <?= $transs->transportId?></h4>
                                                <h4 class="h4 m-none text-dark text-bold"><?= $transs->carPlate?></h4>
                                                <h4 class="h4 m-none text-dark text-bold">Location: <?= $transs->locationName?></h4>
                                                <h4 class="h4 m-none text-dark text-bold">Address: <?= $transs->locationAddress?></h4>
                                                <h4 class="h4 m-none text-dark text-bold"><?= $transs->transportDate?></h4>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </header>
                                    
									<header class="panel-heading">		
										<h2 class="panel-title">Add item</h2>
									</header>
                                    
									<div class="panel-body">
										<form class="form-horizontal form-bordered" action="<?= base_url('active/insertItem')?>" method="POST">
                                            <input type="text" name="locationId" value="<?= $locationId?>" id="locationId" hidden>
                                            <input type="text" name="tLocationId" value="<?= $tLocationId?>" id="tLocationId" hidden>
                                            <p> 
                                              <input type="button" class="btn-success" value="Add Item" onClick="addRow('dataTable')"> 
                                              <input type="button" class="btn-danger" value="Remove Item" onClick="deleteRow('dataTable')">
                                            </p>
                                            
                                            <table id="dataTable" class="input-group col-md-12 mb-md">
                                                <tbody>
                                                    <tr>
                                                        <p>
                                                            <td><input type="checkbox" required="required" name="chk[]" checked="checked" /></td>
                                                            <td>
                                                                <select id="item" required="required" name="item[]" class="form-control col-md-4">
                                                                    <option>Select Item</option>
                                                                    <?php foreach($item as $items){?>
                                                                    <option value="<?= $items->itemId?>"><?= $items->itemName?></option>
                                                                    <?php }?>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input name="quantity[]" type="number" min="0" class="form-control col-md-3" id="quantity" placeholder="quantity" required>
                                                            </td>
                                                            <td>
                                                                <textarea name="detail[]" class="form-control col-md-5" id="detail" required></textarea>
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
	if(rowCount < 120){                            // limit the user from creating fields more than your limits
		var row = table.insertRow(rowCount);
		var colCount = table.rows[0].cells.length;
		for(var i=0; i <colCount; i++) {
			var newcell = row.insertCell(i);
			newcell.innerHTML = table.rows[0].cells[i].innerHTML;
		}
	}else{
		 alert("Maximum item count is 120");
			   
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