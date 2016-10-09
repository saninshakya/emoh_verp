
<!--- footer -->
<div class="col-md-12 blog-bg-grey">

    <br>
    <div class="col-md-2"></div>
    <div class="col-md-8 text-center"><h3 class="text-white copyright">THE BETTER INFORMATION YOU GIVE,<br>
THE FASTER YOU BUY & SELL</h3>
    </div>
    <div class="col-md-2"></div>
    <div class="clearfix"></div><br>
    <div class="col-md-4"></div>
    <div class="col-md-4 text-center">
      <ul class="list-inline">
        <li><a href="https://www.facebook.com/ZmyHome-426180034240172" target="_blank"><img src="/img/fb-icon.png"></a></li>
        <li><a href="#"><img src="/img/twitter-icon.png"></a></li>
        <li><a href="#"><img src="/img/gg-icon.png"></a></li>
        <li><a href="#"><img src="/img/up-icon.png"></a></li>
      </ul>
    </div>
    <div class="col-md-4"></div>

    <div class="col-md-10">
        <p>
          <small class="text-white">COPYRIGHT © 2015 , Z Home, LTD ALL RIGHTS RESERVED </small>
        </p>
    </div>
    <div class="col-md-2">
          <div class="col-xs-2 pull-right"><small class="text-white">Security</small></div>
          <div class="col-xs-2 pull-right"><small class="text-white">Terms</small></div>
          <div class="col-xs-2 pull-right"><small class="text-white">Privacy</small></div>
          <div class="col-xs-2 pull-right"><small class="text-white">Policy</small></div>
        </div>
    </div>

  </div>
  <br>
</div>
<!-- end footer -->


     <script type="text/javascript" src="/js/jquery-1.11.3.min.js"></script>
     <script type="text/javascript" src="/js/bootstrap.min.js"></script>
	 <script type='text/javascript' src='/js/quicksilver.js'></script>
	 <script type="text/javascript" src="/js/bootstrap-select.min.js"></script>
     <script type="text/javascript">
       $('.selectpicker').selectpicker();
     </script>

	 <script type='text/javascript' src='/js/jquery.quickselect.js'></script>
	 <script type='text/javascript'>
		function chkNumber(ele)
		{
			var vchar = String.fromCharCode(event.keyCode);
			if ((vchar<'0' || vchar>'9') && (vchar != '.')) return false;
			ele.onKeyPress=vchar;
		}
	 
		function updateAgreeOwner(x)
		{
			if (x==0)
			{
				document.getElementById("Agree_Owner").value=1;
			}
			if (x==1)
			{
				document.getElementById("Agree_Owner").value=0;				
			}
			updatePost('Agree_Owner');
		}

		function updateTelLineID(x)
		{
			if (x==0)
			{
				document.getElementById("TelLineID").value=1;
				document.getElementById("LineID").value=document.getElementById("Telephone1").value;
				updatePost('LineID');
				updatePost('TelLineID');
				document.getElementById("LineID").disabled=true;
			}
			if (x==1)
			{
				document.getElementById("TelLineID").value=0;
				document.getElementById("LineID").value="";
				document.getElementById("LineID").disabled=false;
				updatePost('TelLineID');				
			}
		}
		
		function updatePost(x)
		{
			var y = document.getElementById(x).value;
			$.post("/admin/updatePost", { 'Type': x, 'Value':y, 'Token': "<?echo $this->session->userdata('token');?>" });
		}
		
		function runinput(json) {
			if (json[0]=="0")
			{
				document.getElementById("demo").innerHTML="ไม่พบข้อมูลที่อยู่";
			} else {
				document.getElementById("demo").innerHTML="";
				
			};
			
			document.getElementById("lat").value=json[0];
			document.getElementById("lng").value=json[1];
			var x = document.getElementById("ProjectName").value;
			var y = document.getElementById("lat").value;
			var z = document.getElementById("lng").value;
			$.post("/zhome/update_ProjectName", { 'ProjectName': x, 'Lat':y, 'Lng':z, 'Token': "<?echo $this->session->userdata('token');?>" });
			if (Number(document.getElementById("lat").value)!=0)
			{
				initMap();
			} else {
				//setTimeout(function(){location ="/zhome/post1";}, 1000);
				
			}
		}

		function updateProjectName()
		{
			var x = document.getElementById("ProjectName").value;
			updatePost('ProjectName');
			document.getElementById("showProjectName").innerHTML=x;
			$.getJSON("/zhome/LatLngProject",{ id: x },runinput);
		}

		function updateProjectName2()
		{
			var x = document.getElementById("ProjectName").value;
			var y = document.getElementById("lat").value;
			var z = document.getElementById("lng").value;
			$.post("/zhome/update_ProjectName", { 'ProjectName': x, 'Lat':y, 'Lng':z, 'Token': "<?echo $this->session->userdata('token');?>" });
			if (Number(document.getElementById("lat").value)!=0)
			{
				initMap();
			} else {
				location ="/zhome/post1";
			}
		}

		var markers_map=[];
		function initMap() 
		{
			var x = Number(document.getElementById("lat").value);
			var y = Number(document.getElementById("lng").value);
			var myLatLng = {lat: x, lng: y};

			var myOptions = {
                zoom: 18,
                center: myLatLng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

            var marker = new google.maps.Marker({
				position: myLatLng,
				map: map,
				title: document.getElementById("ProjectName").value
			});
			
			// add a click event handler to the map object
            google.maps.event.addListener(map, "click", function(event)
            {
                // place a marker
                placeMarker(event.latLng);
            });
		}
		
		function placeMarker(location) {
			deleteMarkers();
			var shape = {
				coords: [1, 1, 1, 20, 18, 20, 18, 1],
				type: 'poly'
			};
			
			var marker = new google.maps.Marker({
                position: location,
                map: map,
				icon: {url: '/img/pin-property.png',
					//original size 30x36
					//scaleSize: new google.maps.Size(25, 30),
					origin: new google.maps.Point(0, 0),
					anchor: new google.maps.Point(0, 36)
				},
				animation: google.maps.Animation.DROP,
            });
			
			markers_map.push(marker);
			updateDatabase(location.lat(), location.lng());

            map.setCenter(location);
			map.setZoom(16);
        }
		
		function deleteMarkers() {
            if (markers_map) {
                for (var i = 0; i < markers_map.length; i++) {
                    markers_map[i].setMap(null);
                }
				markers_map.length = 0;
            }
        }

		function clearLatLng()
		{
			document.getElementById("lat").value=0;
			document.getElementById("lng").value=0;	
		}

		function valLat()
		{
			var x = Number(document.getElementById("lat").value);
			if (x=="0")
			{
				alert("กรุณาปักหมุนบนแผนที่ก่อน");

			} else {
				document.getElementById('key_change').value=2;
				submitFormPage1();
			};

		}

		function updateDatabase(newLat, newLng)
		{
			// make an ajax request to a PHP file
			// on our site that will update the database
			// pass in our lat/lng as parameters
			$.post(
				"/zhome/update_coords", 
				{ 'newLat': newLat, 'newLng': newLng, 'var1': 'value1' }
			)
			.done(function(data) {
				document.getElementById("lat").value=newLat;
				document.getElementById("lng").value=newLng;	
			});
		}
		function submitFormPage1()
		{
			var a=Number(document.getElementById("TOOwner").value);
			var b=document.getElementById("OwnerName").value;
			var c=Number(document.getElementById("TOProperty").value);
			var d=document.getElementById("ProjectName").value;
			var e=Number(document.getElementById("TOAdvertising").value);
			var g=document.getElementById("Telephone1").value;

			if (a=="0")
			{
				document.getElementById("ShowTOOwner").className = "error_msg";
			} else {
				document.getElementById("ShowTOOwner").className = "normal_msg";
			}
			
			if (b=="")
			{
				document.getElementById("ShowOwnerName").className = "error_msg";
			} else {
				document.getElementById("ShowOwnerName").className = "normal_msg";
			}
			
			if (c=="0")
			{
				document.getElementById("ShowTOProperty").className = "error_msg";
			} else {
				document.getElementById("ShowTOProperty").className = "normal_msg";
			}

			if (d=="")
			{
				document.getElementById("ShowProjectName").className = "error_msg";
			} else {
				document.getElementById("ShowProjectName").className = "normal_msg";
			}

			if (e=="0")
			{
				document.getElementById("ShowTOAdvertising").className = "error_msg";
			} else {
				document.getElementById("ShowTOAdvertising").className = "normal_msg";
			}
			if (g=="")
			{
				document.getElementById("showTelephone1").className = "error_msg";
			} else {
				document.getElementById("showTelephone1").className = "normal_msg";							
			}

			if (a!="0" && b!="" && c!="0" && d!="" && e!="0"  && g!="")
			{
				document.getElementById('myform').submit();
			} else {
				//alert(f)
				alert('กรุณากรอกข้อมูลให้ครบถ้วน');
			}
		}

	</script>
<?php 
$qProject=$this->post->qProject2();
//if (!$this->agent->is_browser('Safari'))
//{
?>
<script>

$('#ProjectName').quickselect({
maxItemsToShow:10,
data:[
  
<?php
	$endLine=sizeof($qProject);
	$i=0;
	While ($i<$endLine)
	{
		if ($i!=$endLine){
			echo '"'.$qProject[$i].'",';
		} else {
			echo '"'.$qProject[$i].'"';
		}
		$i++;
	}
?>
]

});
$('#ProjectName').done(function(){
updateProjectName();
})
</script>
<?php
//};
?>
</body>
</html>