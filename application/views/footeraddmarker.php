
<!--- footer -->
<div class="container-fluid footer">
	<div class="col-md-10"><p><small>COPYRIGHT © 2015 , Z Estate CO, LTD ALL RIGHTS RESERVED </small></p>
        </div>
        <div class="col-md-2">
          <div class="col-xs-2 pull-right"><small>Security</small></div>
          <div class="col-xs-2 pull-right"><small>Terms</small></div>
          <div class="col-xs-2 pull-right"><small>Privacy</small></div>
          <div class="col-xs-2 pull-right"><small>Policy</small></div>
        </div>
</div>
</div>
<!-- end footer -->


<script type='text/javascript' src='/js/quicksilver.js'></script>
<script type='text/javascript' src='/js/jquery.quickselect.js'></script>
<script type='text/javascript'>
function initMap() {
	var x = Number(document.getElementById("lat").value);
	var y = Number(document.getElementById("lng").value);
	var myLatLng = {lat: x, lng: y};

	var map = new google.maps.Map(document.getElementById('map_canvas'), {
		zoom: 18,
		center: myLatLng
	});

	var marker = new google.maps.Marker({
		position: myLatLng,
		map: map,
		title: document.getElementById("ProjectName").value
	});
}

function updateDatabase(newLat, newLng){
	document.getElementById("Lat").value=newLat;
	document.getElementById("Lng").value=newLng;	
}

function chagetype(){
	var a=document.getElementById("ID").value;
	var b=document.getElementById("Type").value;
	var c=document.getElementById("Old_ID").value;
	document.getElementById("KeyID").value=a+b;
	document.getElementById("showKeyID").value=c+b;
}

function chagetype_add(){
	var a=document.getElementById("ID").value;
	var b=document.getElementById("Type").value;
	document.getElementById("KeyID").value=a+b;
	document.getElementById("showKeyID").value=a+b;
}
</script>
</body>
</html>