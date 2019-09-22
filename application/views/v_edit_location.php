<title>Edit Location</title>

<!-- Maps and such -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css"
    integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
    crossorigin=""/>
<style>
    #mapid { height: 350px; }
</style>
<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js"
integrity="sha512-QVftwZFqvtRNi0ZyCtsznlKSWOStnDORoefr1enyq5mVL4tmKB3S/EnC3rRJcxCPavG10IcrVGSmPh6Qw5lwrg=="
crossorigin=""></script>



<section role="main" class="content-body">
					<header class="page-header">
						<h2>Edit Location</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Location</span></li>
								<li><span>Edit Location</span></li>
							</ol>
					
							<a class="sidebar-right-toggle"><i></i></a>
						</div>
					</header>

					<!-- start: page -->
						<div class="row">
							<div class="col-lg-12">
								<section class="panel">
									<header class="panel-heading">
																
										<h2 class="panel-title">Edit Location</h2>
									</header>
									<div class="panel-body">
                                        
                                        
										<form class="form-horizontal form-bordered" method="POST" action="<?= base_url('location/update')?>">
                                            <?php foreach($location as $locations){?>
                                            <!-- Map -->
                                            <input type="text" value="<?= $locations->locationId ?>" name="locationId" hidden> 
                                            <div id="mapid" class="col-md-9 col-md-offset-1"></div>
                                            <div class="form-group">
												<label class="col-md-3 control-label" for="longitude">Search Location</label>
												<div class="col-md-6">
													<input name="search" type="text" class="form-control" id="search">
												</div>
											</div>
                                            <div class="form-group">
												<button type="button" class= "btn btn-primary col-md-offset-3" onclick = "searchLocation()">Search</button>
                                                   
                                                <button type="button" class= "btn btn-primary col-md-offset-1" onclick = "getLocation()">Current location</button>
											</div>
                                            
                                            
                                            <div class="form-group">
												<label class="col-md-3 control-label" for="longitude">Longitude</label>
												<div class="col-md-6">
													<input name="longitude" type="text" class="form-control" id="longitude" value="<?= $locations->locationLongitude?>" required>
												</div>
											</div>
                                            
                                            <div class="form-group">
												<label class="col-md-3 control-label" for="latitude">Latitude</label>
												<div class="col-md-6">
													<input name="latitude" type="text" class="form-control" id="latitude" value="<?= $locations->locationLatitude?>" required>
												</div>
											</div>
                                            
                                            <div class="form-group">
												<label class="col-md-3 control-label" for="address">Address</label>
												<div class="col-md-6">
													<textarea class="form-control" rows="3" id="address" name="address"><?= $locations->locationAddress?></textarea>
												</div>
											</div>
                                            
											<div class="form-group">
												<label class="col-md-3 control-label" for="name">Name</label>
												<div class="col-md-6">
													<input name="name" type="text" class="form-control" id="name" value="<?= $locations->locationName?>" required>
												</div>
											</div>
                                            
                                            
                                            <div class="form-group">
												<label class="col-md-3 control-label" for="position">Person In Charge</label>
												<div class="col-md-6">
													<select id="pic" name="pic" class="form-control mb-md">
                                                        <option>Select Employee</option>
                                                        <?php foreach($employee as $employees){?>
														<option value="<?= $employees->userId?>"><?= $employees->userName?></option>
                                                        <?php }?>
													</select>
												</div>
											</div>
                                            
                                            <div class="form-group">
												<label class="col-md-3 control-label" for="detail">Detail</label>
												<div class="col-md-6 mb-md">
													<textarea class="form-control" rows="3" id="detail" name="detail"><?= $locations->locationDetail?></textarea>
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

<!-- Map javascript -->
<script>
    //map setting
    var mymap = L.map('mapid').setView([<?= $locations->locationLatitude?>, <?= $locations->locationLongitude?>], 13);
    <?php } ?>
    var popup = L.popup();
    L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoiY2hyb25hcyIsImEiOiJjanQ1Zmd6cWgwM2h3M3l0bTFtNDUwbXEwIn0.YlvYILnRezY98aGiEh4Y8A', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: 'mapbox.streets',
        accessToken: 'your.mapbox.access.token'
    }).addTo(mymap);

    //current location
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            curloc.innerHTML = "Geolocation is not supported by this browser.";
        }
    }

    function showPosition(position) {
        var curLat = position.coords.latitude;
        var curLon = position.coords.longitude;

        popup
        .setLatLng(L.latLng(curLat,curLon))
        .setContent("You are here")
        .openOn(mymap);

        document.getElementById("latitude").value = curLat;
        document.getElementById("longitude").value = curLon;
        //searching address
        var settings = {
            "async": true,
            "crossDomain": true,
            "url": "https://us1.locationiq.com/v1/reverse.php?key=4d01697df69f8e&lat="+ curLat + "&lon="+ curLon +"&format=json",
            "method": "GET"
        }

        $.ajax(settings).done(function (response) {
            var json = JSON.stringify(response);
            var data = JSON.parse(json);
            var address = data.display_name;
            document.getElementById("address").innerHTML = address;
        });
    }

    //map onclick
    function onMapClick(e) {
        var lat = e.latlng.lat;
        var lng = e.latlng.lng;

        popup
        .setLatLng(e.latlng)
        .setContent("You clicked the map at " + e.latlng.toString())
        .openOn(mymap);

        document.getElementById("latitude").value = lat;
        document.getElementById("longitude").value = lng;

        //searching address
        var settings = {
            "async": true,
            "crossDomain": true,
            "url": "https://us1.locationiq.com/v1/reverse.php?key=4d01697df69f8e&lat="+ lat + "&lon="+ lng +"&format=json",
            "method": "GET"
        }

        $.ajax(settings).done(function (response) {
            //document.getElementById("address").value = JSON.stringify(response, null, 2);
            var json = JSON.stringify(response);
            var data = JSON.parse(json);
            var address = data.display_name;
            document.getElementById("address").innerHTML = address;
        });
    }
    mymap.on('click', onMapClick);

    //forward geocoding
    function searchLocation(){
        var search = document.getElementById("search").value;
        var settings = {
            "async": true,
            "crossDomain": true,
            "url": "https://us1.locationiq.com/v1/search.php?key=4d01697df69f8e&q="+ search +"&format=json",
            "method": "GET"
        }

        $.ajax(settings).done(function (response) {
            var json = JSON.stringify(response);
            var data = JSON.parse(json);
            var lat = data[0].lat;
            var lon = data[0].lon;
            mymap.panTo(new L.LatLng(lat, lon));
        });
    }
</script>