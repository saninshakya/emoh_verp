<?
$this->usermenu->inc_file('modal_loader.css','css');
?>

<script type='text/javascript' src='/js/quicksilver.js'></script>
<script type="text/javascript" src="/js/bootstrap-select.min.js"></script>
<script type="text/javascript">
$('.selectpicker').selectpicker();

$(document).on({
	ajaxStart: function() { $("body").addClass("loading");},
	ajaxStop: function() { $("body").removeClass("loading"); }
});

$(document).ready(function(){
	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
		$('[data-toggle="tooltip"]').tooltip();   
	} 
});
</script>

<script type='text/javascript' src='/js/jquery.quickselect.js'></script>
<script type='text/javascript'>
function chkNumber(ele){
	var vchar = String.fromCharCode(event.keyCode);
	if ((vchar<'0' || vchar>'9') && (vchar != '.')) return false;
	ele.onKeyPress=vchar;
}

function updateAgreeOwner(x){
	if (x==0){
		document.getElementById("Agree_Owner").value=1;
	}
	if (x==1){
		document.getElementById("Agree_Owner").value=0;
	}
	updatePost('Agree_Owner');
}

function updateTelLineID(x){
	if (x==0){
		document.getElementById("TelLineID").value=1;
		document.getElementById("LineID").value=document.getElementById("Telephone1").value;
		updatePost('LineID');
		updatePost('TelLineID');
		document.getElementById("LineID").disabled=true;
		//$("#LineID").css({'opacity':'0','padding':'0px !important','height':'0px !important'});
		$('#LineID').addClass('display-none');
	}
	if (x==1){
		document.getElementById("TelLineID").value=0;
		document.getElementById("LineID").value="";
		document.getElementById("LineID").disabled=false;
		//$("#LineID").removeAttr("style");
		$('#LineID').removeClass('display-none');
		updatePost('TelLineID');
	}
}

function updatePost(x)
{
	var y = document.getElementById(x).value;
	$.post("/zhome/updatePost", { 'Type': x, 'Value':y, 'Token': "<?echo $this->session->userdata('token');?>" });
}

function runinput(json) {
	if (json[0]=="0"){
		document.getElementById("demo").innerHTML="ไม่พบข้อมูลที่อยู่";
	} else {
		document.getElementById("demo").innerHTML="";
	}
	
	document.getElementById("lat").value=json[0];
	document.getElementById("lng").value=json[1];
	var x = document.getElementById("ProjectName").value;
	var y = document.getElementById("lat").value;
	var z = document.getElementById("lng").value;
	$.post("/zhome/update_ProjectName", { 'ProjectName': x, 'Lat':y, 'Lng':z, 'Token': "<?echo $this->session->userdata('token');?>" });
	if (Number(document.getElementById("lat").value)!=0){
		initMap();
	} else {
		//setTimeout(function(){location ="/zhome/post1";}, 1000);
		
	}
}

function updateProjectName(){
	var x = $('#ProjectName').val();
	clearLatLng();
	updatePost('ProjectName');
	document.getElementById("showProjectName").innerHTML=x;
	$.getJSON("/zhome/LatLngProject",{ id: x },runinput);
}

function updateProjectName2(){
	var x = document.getElementById("ProjectName").value;
	var y = document.getElementById("lat").value;
	var z = document.getElementById("lng").value;
	$.post("/zhome/update_ProjectName", { 'ProjectName': x, 'Lat':y, 'Lng':z, 'Token': "<?echo $this->session->userdata('token');?>" });
	if (Number(document.getElementById("lat").value)!=0){
		initMap();
	} else {
		location ="/zhome/post1";
	}
}

var markers_map=[];
function initMap(){
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
			anchor: new google.maps.Point(25, 60)
		},
		animation: google.maps.Animation.DROP,
	});
	
	markers_map.push(marker);
	updateDatabase(location.lat(), location.lng());

	map.setCenter(location);
	//map.setZoom(16);
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

function valLat(){
	var x = Number(document.getElementById("lat").value);
	if (x=="0"){
		alert("กรุณาปักหมุนบนแผนที่ก่อน");
	} else {
		document.getElementById('key_change').value=2;
		submitFormPage1();
	}
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
	var f=Number(document.getElementById("Agree_Owner").value);
	var g=document.getElementById("Telephone1").value;

	if (a=="0"){
		$('#ShowTOOwner').addClass('error_msg');
	} else {
		$('#ShowTOOwner').removeClass('error_msg');
	}
	if (b==""){
		$('#ShowOwnerName').addClass('error_msg');
	} else {
		$('#ShowOwnerName').removeClass('error_msg');
	}
	if (c=="0"){
		$('#ShowTOProperty').addClass('error_msg');
	} else {
		$('#ShowTOProperty').removeClass('error_msg');
	}
	if (d==""){
		$('#ShowProjectName').addClass('error_msg');
	} else {
		$('#ShowProjectName').removeClass('error_msg');
	}
	if (e=="0"){
		$('#ShowTOAdvertising').addClass('error_msg');
	} else {
		$('#ShowTOAdvertising').removeClass('error_msg');
	}
	if (f!="1"){
		$('#showAgree_Owner').addClass('error_msg');
	} else {
		$('#showAgree_Owner').removeClass('error_msg');
	}
	if (g==""){
		$('#showTelephone1').addClass('error_msg');
	} else {
		$('#showTelephone1').removeClass('error_msg');
	}

	if (a!="0" && b!="" && c!="0" && d!="" && e!="0" && f=="1" && g!=""){
		document.getElementById('myform').submit();
	} else {
		//alert(f);
		if(f!="0" && e!="0"){
			/*if (confirm('คุณกรอกข้อมูลไม่ครบถ้วน ต้องการไปยังหน้าถัดไป')==true){
				document.getElementById('myform').submit();
			}*/
			$('#myModalConfirm').modal('show');
		}else{
			if(f=="0"){
				$('#txt_alert').text('คุณยังไม่ได้ยืนยันความเป็นเจ้าของ');
			}else if(e=="0"){
				$('#txt_alert').text('คุณยังไม่ได้ระบุประเภทประกาศ');
			}
			$('#myModalAlert').modal('show');
			//return false;
		}
	}
}
</script>
<?php $qProject=$this->post->qProject2();
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
],onItemSelect:function(){updateProjectName();}

});
$('#ProjectName').done(function(){
updateProjectName();
})

function show_title(txt){
	if(txt!=''){
		$('#title_detail').text(txt);
		$('#title_panel').show();
	}
}

function hide_title(){
	$('#title_panel').hide();
	$('#title_detail').text('');
}

function submitInputHome1()
{
	
	$('.inputhome1').show();
	$('.inputhome2').hide();
	$('.inputhome3').hide();
	$('.inputhome4').hide();
	$('.inputhome5').hide();
	$('.step1').addClass('active');
	$('.step2').removeClass('active');
	$('.step3').removeClass('active');
	$('.step4').removeClass('active');
	$('.step5').removeClass('active');
	$('html, body').animate({ scrollTop: 0 }, 'fast');
		
}

function submitInputHome2()
{
	
    $('.inputhome1').hide();
	$('.inputhome2').show();
	$('.inputhome3').hide();
	$('.inputhome4').hide();
	$('.inputhome5').hide();
	$('.step1').removeClass('active');
	$('.step2').addClass('active');
	$('.step3').removeClass('active');
	$('.step4').removeClass('active');
	$('.step5').removeClass('active');
	$('html, body').animate({ scrollTop: 0 }, 'fast');
		
}
function submitInputHome2back()
{
	
	$('.inputhome2').show();
	$('.inputhome3').hide();
	$('.inputhome4').hide();
	$('.step2').addClass('active');
	$('.step3').removeClass('active');
	$('.step4').removeClass('active');
	$('html,body').scrollTop(0);
	
}

function submitInputHome3()
{
	$('.inputhome1').hide();
	$('.inputhome2').hide();
	$('.inputhome3').show();
	$('.inputhome4').hide();
	$('.inputhome5').hide();
	$('.step1').removeClass('active');
    $('.step3').addClass('active');
	$('.step2').removeClass('active');
	$('.step4').removeClass('active');
	$('.step5').removeClass('active');
	$('html,body').scrollTop(0);
	
}

function submitInputHome3back()
{
	$('.inputhome1').hide();
	$('.inputhome3').show();
	$('.inputhome2').hide();
	$('.inputhome4').hide();
	$('.step3').addClass('active');
	$('.step2').removeClass('active');
	$('.step4').removeClass('active');
	//$('html, body').animate({ scrollTop: 0 }, 'fast');
	$('html,body').scrollTop(0);
	
}

function submitInputHome4()
{   
	$('.inputhome1').hide();
	$('.inputhome2').hide();
	$('.inputhome3').hide();
	$('.inputhome4').show();
	$('.inputhome5').hide();
	$('.step1').removeClass('active');
	$('.step4').addClass('active');
	$('.step2').removeClass('active');
	$('.step3').removeClass('active');
	$('.step5').removeClass('active');
	$('html,body').scrollTop(0);
	
}
function submitInputHome5()
{
	
	$('.inputhome1').hide();
	$('.inputhome2').hide();
	$('.inputhome3').hide();
	$('.inputhome4').hide();
	$('.inputhome5').show();
	$('.step1').removeClass('active');
	$('.step2').removeClass('active');
	$('.step3').removeClass('active');
	$('.step4').removeClass('active');
	$('.step5').addClass('active');
	$('html, body').animate({ scrollTop: 0 }, 'fast');
		
}
</script>
<!--Start of Zopim Live Chat Script-->
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
$.src="//v2.zopim.com/?42acETw51qZfzw7TXT4AMPU6BnCJZ6Bf";z.t=+new Date;$.
type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
</script>
<!--End of Zopim Live Chat Script-->
</body>
</html>