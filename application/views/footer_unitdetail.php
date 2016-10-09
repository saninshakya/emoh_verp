<?php
$POID=$rowUnit->POID;
$PID=$rowUnit->PID;
//$Tel=substr($rowUnit->Telephone1,0,3)."-XXX-XXXX";
$Tel="ดูเบอร์โทรเจ้าของ";
array_push($mainunit,'','',$rowUnit->ProjectName,$rowUnit->Lat,$rowUnit->Lng,'/img/pin-property.png',99);
$location[]=$mainunit;
$DistBTSMRT=$this->search->DistMRTBTS2($PID);
$DistEducation=$this->search->DistFromType2($PID,"Education");
$DistHospital=$this->search->DistFromType2($PID,"Hospital");
$DistShopingMall=$this->search->DistFromType2($PID,"ShopingMall");
$DistExpressway=$this->search->DistFromType2($PID,"Expressway");
$DistMinimart=$this->search->DistFromType2($PID,"Minimart");
for($i=1;$i<=$max_location;$i++){
	if($DistBTSMRT[$i]){
		$location[]=$DistBTSMRT[$i];
	}
	if($DistEducation[$i]){
		$location[]=$DistEducation[$i];
	}
	if($DistHospital[$i]){
		$location[]=$DistHospital[$i];
	}
	if($DistShopingMall[$i]){
		$location[]=$DistShopingMall[$i];
	}
	if($DistExpressway[$i]){
		$location[]=$DistExpressway[$i];
	}
	if($DistMinimart[$i]){
		$location[]=$DistMinimart[$i];
	}
}
?>
<br/><br/>
<!--- footer -->
<!--<div class="col-xs-12 blog-bg-grey">

	<br>
	<div class="col-xs-2"></div>
	<div class="col-xs-8 text-center">
		<h3 class="text-white copyright">ZmyHome คอนโดเจ้าของขายเอง ให้เช่าเอง<br>ซื้อง่าย ขายคล่อง เชื่อถือได้</h3>
	</div>
	<div class="col-xs-2"></div>
	<div class="clearfix"></div><br>
	<div class="col-xs-4"></div>
	<div class="col-xs-4 text-center">
		<ul class="list-inline">
			<li><a href="https://www.facebook.com/ZmyHome-426180034240172" target="_blank"><img src="/img/fb-icon.png"></a></li>
			<li><a href="#"><img src="/img/twitter-icon.png"></a></li>
			<li><a href="#"><img src="/img/gg-icon.png"></a></li>
			<li><a href="#"><img src="/img/up-icon.png"></a></li>
		</ul>
	</div>
	<div class="col-xs-4"></div>

	<div class="col-xs-10">
		<p>
			<small class="text-white">COPYRIGHT © 2015 , Z Home Ltd. ALL RIGHTS RESERVED </small>
		</p>
	</div>
	<div class="col-xs-2">
		<div class="col-xs-2 pull-right"><small class="text-white">Security</small></div>
		<div class="col-xs-2 pull-right"><small class="text-white">Terms</small></div>
		<div class="col-xs-2 pull-right"><small class="text-white">Privacy</small></div>
		<div class="col-xs-2 pull-right"><small class="text-white">Policy</small></div>
	</div>
</div>

</div>
<br>
</div>-->
<!-- end footer -->

<script type="text/javascript" src="/js/bootstrap-select.min.js"></script>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3&amp;sensor=false"></script>
<script type="text/javascript" src="/js/markerwithlabel.js"></script>
<!--<script type="text/javascript" src="/js/jssharefb.js"></script>-->
<script type="text/javascript" src="/js/forFBshare.js"></script>
<script type="text/javascript" language="javascript">

$(document).ready(function() {
	if($('#clickTel').val()==1){
		//$('#down-b2').click();
		getOwnerPhone();
	}
	$("#down-r1").click(function(){
		$(".target-r1").slideDown( 'fast', function(){});
		$("#down-r1").hide( 'fast', function(){});
		$("#up-r1 ").show( 'fast', function(){});      
	});
	$("#down-r2").click(function(){
		$(".target-r2").slideDown( 'fast', function(){});
		$("#down-r2").hide( 'fast', function(){});
		$("#up-r2 ").show( 'fast', function(){});      
	});
	$("#down-r3").click(function(){
		$(".target-r3").slideDown( 'fast', function(){});
		$("#down-r3").hide( 'fast', function(){});
		$("#up-r3 ").show( 'fast', function(){});      
	});
	$("#down-ra").click(function(){
		$(".target-ra").slideDown( 'fast', function(){});
		$("#down-ra").hide( 'fast', function(){});
		$("#up-ra ").show( 'fast', function(){});      
	});
	$("#down-rb").click(function(){
		$(".target-rb").slideDown( 'fast', function(){});
		$("#down-rb").hide( 'fast', function(){});
		$("#up-rb ").show( 'fast', function(){});      
	});
	$("#down-rc").click(function(){
		$(".target-rc").slideDown( 'fast', function(){});
		$("#down-rc").hide( 'fast', function(){});
		$("#up-rc ").show( 'fast', function(){});      
	});
	$("#down-rd").click(function(){
		$(".target-rd").slideDown( 'fast', function(){});
		$("#down-rd").hide( 'fast', function(){});
		$("#up-rd ").show( 'fast', function(){});      
	});
	$("#down-r4").click(function(){
		$(".target-r4").slideDown( 'fast', function(){});
		$("#down-r4").hide( 'fast', function(){});
		$("#up-r4").show( 'fast', function(){});      
	});
	$("#down-r5").click(function(){
		$(".target-r5").slideDown( 'fast', function(){});
		$("#down-r5").hide( 'fast', function(){});
		$("#up-r5").show( 'fast', function(){});      
	});

	$("#up-r1").click(function(){
		$(".target-r1").slideUp( 'fast', function(){});
		$("#down-r1").show( 'fast', function(){});  
		$("#up-r1 ").hide( 'fast', function(){});  
	});
	$("#up-r2").click(function(){
		$(".target-r2").slideUp( 'fast', function(){});
		$("#down-r2").show( 'fast', function(){});  
		$("#up-r2 ").hide( 'fast', function(){});  
	});
	$("#up-r3").click(function(){
		$(".target-r3").slideUp( 'fast', function(){});
		$("#down-r3").show( 'fast', function(){});  
		$("#up-r3 ").hide( 'fast', function(){});  
	});
	$("#up-ra").click(function(){
		$(".target-ra").slideUp( 'fast', function(){});
		$("#down-ra").show( 'fast', function(){});  
		$("#up-ra ").hide( 'fast', function(){});  
	});
	$("#up-rb").click(function(){
		$(".target-rb").slideUp( 'fast', function(){});
		$("#down-rb").show( 'fast', function(){});  
		$("#up-rb ").hide( 'fast', function(){});  
	});
	$("#up-rc").click(function(){
		$(".target-rc").slideUp( 'fast', function(){});
		$("#down-rc").show( 'fast', function(){});  
		$("#up-rc ").hide( 'fast', function(){});  
	});
	$("#up-rd").click(function(){
		$(".target-rd").slideUp( 'fast', function(){});
		$("#down-rd").show( 'fast', function(){});  
		$("#up-rd ").hide( 'fast', function(){});  
	});
	$("#up-r4").click(function(){
		$(".target-r4").slideUp( 'fast', function(){});
		$("#down-r4").show( 'fast', function(){});  
		$("#up-r4 ").hide( 'fast', function(){});  
	});
	$("#up-r5").click(function(){
		$(".target-r5").slideUp( 'fast', function(){});
		$("#down-r5").show( 'fast', function(){});  
		$("#up-r5").hide( 'fast', function(){});  
	});
	$("#down-b1").click(function(){
		$(".target-b1").slideDown( 'fast', function(){});

		$("#up-b1").show( 'fast', function(){});      
	});
	$("#up-b1").click(function(){
		$(".target-b1").hide( 'fast', function(){});
		$("#down-b1").show( 'fast', function(){});  
		$("#up-b1 ").hide( 'fast', function(){});  
	});
	$("#down-b2").click(function(){
		//$(".target-b2").show( 'fast', function(){});

		getOwnerPhone();
		$(".target-b1").hide( 'fast', function(){});
	});
	$("#up-b2").click(function(){
		$(".target-b2").slideUp( 'fast', function(){});
		$("#down-b1").show( 'fast', function(){});
		//$("#up-b2 ").hide( 'fast', function(){});
	});

	$("#up-b3").click(function(){
		$(".target-b2").slideUp( 'fast', function(){});
		//$("#up-b2 ").hide( 'fast', function(){});  
	});
});
</script>
<script type="text/javascript">
var totalImg = <?php echo sizeof($Img)?>;
var indexImg = 0;
$(function(){
	$('.toggle').click(function (event) {
		event.preventDefault();
		var target = $(this).attr('href');
		$(target).toggleClass('hidden show');
	});
	//mSendPIDToGetImg();

	totalImg = parseInt(totalImg);

	if(totalImg>1){
		$('#nextButton').show("slow");
		$('#backButton').hide();
	}else{
		$('#backButton').hide();
		$('#nextButton').hide();
	}
	$('#backButton').click({index:indexImg},changeImgIndex);
	$('#nextButton').click({index:indexImg},changeImgIndex);

	initMap();
	mSendPIDToGetImg();
	//getOwnerPhone();
});

function changeImgIndex(evt){

	evt.preventDefault();
	var total = totalImg-1;
	if((evt.target.id=="nextButton" || evt.target.id=="nextImg") && indexImg<total){
		indexImg += 1;
	}
	if((evt.target.id=="backButton" || evt.target.id=="backImg") && indexImg>0){
		indexImg -= 1;
	}
	
	if(indexImg>0){
		$('#backButton').show("slow");
	}else{
		$('#backButton').hide();
	}
	
	if(indexImg<total){
		$('#nextButton').show("slow");
	}else{
		$('#nextButton').hide();
	} 

	var imgurl = <?php echo json_encode($Img)?>;

	$('#imgHUnit').fadeOut(500, function() {
		$('#imgHUnit').attr("src",imgurl[indexImg]);
		$('#imgHUnit').fadeIn(500);
	});

}

function getOwnerPhone(){
	var poid = <?php echo $POID;?>;
	var checkQuestionnair = $('#checkQuestionnair').val();
	if(checkQuestionnair==1){
		var getOPhone = $.getJSON("/zhome/getOwnerNumber",{ POID:poid}, function(json) {
			console.log( "success" );
		})
		.done(function() {
			console.log( "second success" );
		})
		.fail(function() {
			console.log( "error" );
		})
		.always(function(json) {
			var tresult = json;
			//alert('unitdetail : '+tresult);
			$('#otel').val(tresult);

			console.log( "complete" );
		});

		// Set another completion function for the request above
		getOPhone.complete(function() {
			console.log( "second complete" );
			setShowTel();
		});
	}else{
		$('#myModal3').modal();
	}
}

function setShowTel(){
	var tel = $('#otel').val();
	var banner_status=$('#BannerStatus').val();
	var POID = <?php echo $POID ?>;
	var node;
	//<span class="glyphicon glyphicon-earphone text-white"></span> <a class="text-white" href="#">099-XXX-XXXX</a> -->
	 //<a class="text-white" href="#"><h7 class="text-white"> พร้อมแสดงผล 1/10/58</h7></a>-->

	 if(tel==0){
		//node = '<a class="text-white" href="#"><h7 class="text-white">'+tel+'</h7></a>';
		node = "คุณใช้สิทธ์ดูเบอร์โทรหมดแล้ว";
		$(".target-b2").show( 'fast', function(){});
	}else if(tel==-1){
		node="<?=$Tel;?>";
		//$('#checklogin').modal();//modal alert login
		showLogin2();
		/*if(confirm('คุณยังไม่ได้ login เข้าระบบ\nต้องการ login เข้าระบบเลยหรือไม่?')){
			window.location.replace("/auth/login/");
		}*/
	}else{
		var tel1 = tel.substring(0,3);
		var tel2 = tel.substring(3,6);
		var tel3 = tel.substring(6,tel.length);
		var telformat = tel1+"-"+tel2+"-"+tel3;
		node = telformat;
		//node = '<span class="glyphicon glyphicon-earphone text-white"></span><a class="text-white" href="#"><h7 class="text-white">'+" "+telformat+'</h7></a>';
		/*if(banner_status=='bn'){
			$.post('/zhome/updateViewBannerTel', {POID : POID} ,function(res){
			});
		}*/
		$('#down-b1').unbind('click');
	}

	$('#down-b1 .showtel').contents().replaceWith(node);
}
</script>
<script type="text/javascript">
function formatDollar(num) {
	var p = num.toFixed(0).split();
	return  p[0].split("").reverse().reduce(function(acc, num, i, orig) {
		return  num + (i && !(i % 3) ? "," : "") + acc;
	}, "");
}

function Calculate_Salary(b,a,c){
	crate=(a/12)/100;
	cperiod=c*12;
	csalary=(b*40)/100;
	var1=1/(Math.pow((1+crate),cperiod));
	var2=-csalary+(csalary*Math.pow((1+crate),cperiod));
	return (var1*var2)/crate;
}

function Function_CreditLineMulti(){
	var c=parseFloat($("#x1").val());
	var b=parseFloat($("#x2").val());
	var d=parseFloat($("#x3").val());
	var e=parseFloat($("#x4").val());
	if(!(c<=0||b<=0)){
		var a=0;creditline=Calculate_Salary(c,b,d);
		var f=e-creditline;
		$("#showPayPerMonth").val('฿'+formatDollar((c*40)/100));
		$("#showLoan").val('฿'+formatDollar(Math.round(creditline*100)/100));
		if (f<=0){
			$("#showPayTransfer").val('฿'+formatDollar(Math.round(0*100)/100));
		} else {
			$("#showPayTransfer").val('฿'+formatDollar(Math.round(f*100)/100));
		}
	}

	return false;
}

var imgUnits = [];
function mSendPIDToGetImg(){

	var pid = '<?php echo $PID ?>';
	//alert(pid);

	var propType = '1,';
	var nBed = '';
	var nBath = '';
	var nYear = '';
	var tSale = '<?php echo $tSale;?>';
	var minP = '';
	var maxP = '';

	var getImgUnits = $.getJSON("/zhome/getImgUnit",{ PID:pid,TOProperty:propType,Bedroom:nBed,Bathroom:nBath,Year:nYear, TOAdvertising:tSale,minPrice:minP,maxPrice:maxP }, function(json) {
		console.log( "success" );
	})
	.done(function() {
		console.log( "second success" );
	})
	.fail(function() {
		console.log( "error" );
	})
	.always(function(json) {
		
		imgUnits = json;
		//alert(imgUnits.length);
		console.log( "complete" );
	});

	// Set another completion function for the request above
	getImgUnits.complete(function() {
		console.log( "second complete" );
		displayImgUnits();
	});
}

function displayImgUnits(){
	var imgNode = "";
	$('#cImgUnits').empty();
	//alert("poid : "+$('#poid').val());
	imgNode += '<div id="myCarousel" class="carousel slide  padding-none" data-ride="carousel" data-interval="false" >';
	imgNode += '<div role="listbox">';
	for(var i=0;i<imgUnits.length;i++){
		if($('#'+imgUnits[i].POID).length==0 && imgUnits[i].POID!=$('#poid').val()){
			if(imgUnits[i].Favourite==1){
				fav_color='text-pink';
			}else{
				fav_color='text-white';
			}
			imgNode += '<div class="item active heightratio-b col-md-4 col-xs-12" data-project="'+imgUnits[i].ProjectName+'" data-project-id="'+imgUnits[i].PID+'" style="overflow:hidden;background-color:#ffffff;background-image:url('+imgUnits[i].Picture[0]+') ; background-repeat: no-repeat;background-position: center center;background-size:100%; res121">';
			imgNode += '<div class="carousel-caption-rt">';
			imgNode += '<div class="infogp-box padding-t5">';
			imgNode += '<span class="infogp-data">'+imgUnits[i].DateShow+'</span>';
			imgNode += '<img class="infogp-icon" src="/img/sun-s-icon-white.png" style="-webkit-filter: drop-shadow(2px 2px 4px #000);">';
			imgNode += '</div>';
			// imgNode += '<span>&middot</span>';
			imgNode += '<div class="infogp-box">';
			imgNode += '<span class="infogp-data">'+imgUnits[i].ViewPost+'</span>';
			imgNode += '<span width="3px"class="glyphicon glyphicon-eye-open text-white infogp-icon"></span>';
			imgNode += '</div>';
			imgNode += '<div class="infogp-box">';
			imgNode += '<span class="infogp-data">'+imgUnits[i].ViewTel+'</span>';
			imgNode += '<span width="3px" class="glyphicon glyphicon-earphone text-white infogp-icon"></span>';	
			imgNode += '</div>';	
			imgNode += '<a href="#3" title="Add to Favourite" onclick="updateFavorite2('+imgUnits[i].POID+','+i+');">';
			imgNode += '<span id="favourite_show_3" class="infogp-fav glyphicon glyphicon-heart '+fav_color+'" aria-hidden="true" onmouseover=$(this).removeClass("'+fav_color+'");$(this).addClass("text-orange"); onmouseout=$(this).addClass("'+fav_color+'");></span>';
			imgNode += '</a>';
			imgNode += '</div>';
			imgNode += '<a href="/'+imgUnits[i].NamePath+'/condo/'+imgUnits[i].PName_en+'/'+imgUnits[i].POID+'" alt="'+imgUnits[i].AdvertisingName+'-'+imgUnits[i].PropertyName+'-'+imgUnits[i].ProjectNameAnchor+'" style="text-decoration: none;">';
			imgNode += '<div class="layer-invisible"></div>';
			imgNode += '<div class="carousel-caption-lb carousel-caption-lb-clear unit-bg_gradient">';
			imgNode += '<div class="text-white"><span>'+imgUnits[i].AdvertisingName+'</span></div>';
			imgNode += '<div class="text-white"><span class="font25">'+imgUnits[i].PriceShowNew+'</span> | <span>'+imgUnits[i].Bedroom+'</span> | <span> '+imgUnits[i].Bathroom+'</span> | <span>'+imgUnits[i].useArea+'ม&sup2;</span></div>';
			imgNode += '<div class="text-white font14-m11"><span>'+imgUnits[i].ProjectNameCenter+' '+imgUnits[i].DistName+'</span></div>';
			imgNode += '</div>';
			imgNode += '</a>';
			imgNode += '<input type="hidden" id="favourite_check_'+i+'" value="'+imgUnits[i].Favourite+'">';
			imgNode += '</div>';
		}
	}
	imgNode += '</div>';
	imgNode += '</div>';
	$('#cImgUnits').append(imgNode);
}

var locate_array = <?php echo json_encode($location);?>;
function initMap(){
    //alert(returnSearch[0]+"proj 1 : "+returnSearch[1].ProjectName+" total :"+returnSearch.length);
    var grayStyles = [
    {
    	featureType: "all",
    	stylers: [
    	{ saturation: -90 },
    	{ lightness: 20 }
    	]
    },
    ];
    

    var latLng = new google.maps.LatLng(<?php echo $rowUnit->Lat; ?>, <?php echo $rowUnit->Lng; ?>);
    var map = new google.maps.Map(document.getElementById('map_canvas2'), {
    	zoom: 14,
    	center: latLng,
    	styles:grayStyles,
    	scrollwheel: false,
    	zoomControlOptions: {
    		position:google.maps.ControlPosition.TOP_RIGHT
    	},
    	streetViewControlOptions: {
    		position:google.maps.ControlPosition.TOP_RIGHT
    	},
    	mapTypeControl:true,
    	mapTypeControlOptions: {
    		position:google.maps.ControlPosition.BOTTOM_LEFT
    	},
    	mapTypeId: google.maps.MapTypeId.ROADMAPgx
    });
    var shape = {
    	coords: [1, 1, 1, 20, 18, 20, 18, 1],
    	type: 'poly'
    };

    for (var i = 0; i < locate_array.length; i++) {
    	var location = locate_array[i];
    	var myLatlng = new google.maps.LatLng(location[3],location[4]);
    	var myIcon = location[5];
    	var myTitle = location[2];
    	var myDistance = location[0];
    	var myZindex = location[6];
    	if(myZindex==99){
    		var ax=25;
    		var ay=60;
    	}else{
    		var ax=15;
    		var ay=36;
    	}
    	if(location[0]!=''){
    		var myDistance=myDistance+' km.';
    	}
    	var marker = new google.maps.Marker({
    		position: myLatlng,
    		map: map,
			//icon: image,
			icon: {url: myIcon,
				//original size 30x36
				//scaleSize: new google.maps.Size(25, 30),
				origin: new google.maps.Point(0, 0),
				anchor: new google.maps.Point(ax, ay)
			},
			//shape: shape,
			zIndex: myZindex,
			title: myTitle
		});

    	var content='<div>'+myTitle+' '+myDistance+'</div>';
    	var infowindow = new google.maps.InfoWindow({
    		content: content,
    		maxWidth: 200
    	});

    	google.maps.event.addListener(marker,'mouseover', (function(marker,content,infowindow){ 
    		return function() {
    			infowindow.setContent(content);
    			infowindow.open(map,marker);
    		};
    	})(marker,content,infowindow));

    	google.maps.event.addListener(marker,'mouseout', (function(marker,content,infowindow){ 
    		return function() {
    			infowindow.close();
    		};
    	})(marker,content,infowindow));
    }

}

$(function () {
	$('.toggle').click(function (event) {
		event.preventDefault();
		var target = $(this).attr('href');
		$(target).toggleClass('hidden show');
	});

});

$('#myModal').modal(options);
$('#checklogin').modal();

function send_problem(value){
	$('#ptype').val(value);
	$('#ptype option[value="'+value+'"]').attr('selected','selected');
}

function updateFavorite(){
	var tel = $('#otel').val();
	var fav=$('#favourite_check').val();
	if(tel==-1){
		if(confirm('คุณยังไม่ได้ login เข้าระบบ\nต้องการ login เข้าระบบเลยหรือไม่?')){
			window.location.replace("/auth/login/");
		}
	}else{
		if(fav==1){
			$('#favourite_check').val(0);
			$('#favourite_show').removeClass('text-orange2');
			$('#favourite_show').addClass('text-grey');
			fav_status=0;
		}else{
			$('#favourite_check').val(1);
			$('#favourite_show').removeClass('text-grey');
			$('#favourite_show').addClass('text-orange2');
			fav_status=1;
		}
		$.post("/zhome/updateFavorite", { 'POID':"<?echo $POID;?>",'user_id':"<?echo $this->session->userdata('user_id');?>",'Token':"<?echo $this->session->userdata('token');?>",'favourite_status': fav_status });
	}
}

function updateFavorite2(POID,i){
	var user="<?echo $this->session->userdata('user_id');?>";
	var fav=$('#favourite_check_'+i).val();
	if(!user){
		if(confirm('คุณยังไม่ได้ login เข้าระบบ\nต้องการ login เข้าระบบเลยหรือไม่?')){
			window.location.replace("/auth/login/");
		}
	}else{
		if(fav=='1'){
			$('#favourite_check_'+i).val(0);
			$('#favourite_show_'+i).removeClass('text-pink');
			$('#favourite_show_'+i).addClass('text-white');
			fav_status=0;
		}else{
			$('#favourite_check_'+i).val(1);
			$('#favourite_show_'+i).removeClass('text-white');
			$('#favourite_show_'+i).addClass('text-pink');
			fav_status=1;
		}
		$.post("/zhome/updateFavorite", { 'POID':POID,'user_id':"<?echo $this->session->userdata('user_id');?>",'Token':"<?echo $this->session->userdata('token');?>",'favourite_status': fav_status });
	}
}

function submitFormHelpdesk(){
	var a=document.getElementById("poid").value;
	var b=document.getElementById("pfullname").value;
	var c=document.getElementById("pemail").value;
	var d=document.getElementById("ptelphone").value;
	var e=document.getElementById("ptype").value;
	var f=document.getElementById("pdetail").value;

	if (b=="")
	{
		document.getElementById("pfullname").style.borderColor = "#FF0000";
	} else {
		document.getElementById("pfullname").style.borderColor = "#CCCCCC";
	}
	if (c=="")
	{
		document.getElementById("pemail").style.borderColor = "#FF0000";
	} else {
		document.getElementById("pemail").style.borderColor = "#CCCCCC";
	}
	if (d=="")
	{
		document.getElementById("ptelphone").style.borderColor = "#FF0000";
	} else {
		document.getElementById("ptelphone").style.borderColor = "#CCCCCC";
	}
	if (e=="")
	{
		document.getElementById("ptype").style.borderColor = "#FF0000";
	} else {
		document.getElementById("ptype").style.borderColor = "#CCCCCC";
	}
	if (f=="")
	{
		document.getElementById("pdetail").style.borderColor = "#FF0000";
	} else {
		document.getElementById("pdetail").style.borderColor = "#CCCCCC";
	}

	if (b!="" && c!="" && d!="" && e!="" && f!="")
	{
		$('#ckproblem').hide();
		$.post("/zhome/add_Helpdesk", { 'poid':a, 'informer_name': b, 'informer_email':c, 'informer_telphone':d, 'problem_type':e, 'informer_detail':f });
		$('#myModal').modal('hide');
	} else {
		$('#ckproblem').show();
		return false;
	}
}

function showUnit(url){
	window.open(url);
}

$(function() {
	$('#map_canvas2').click(function(e) {
		$(this).find('iframe').css('pointer-events', 'all');
	}).mouseleave(function(e) {
		$(this).find('iframe').css('pointer-events', 'none');
	});
})
</script>

<script type="text/javascript">
// Q-DEV Function
$(document).ready(function(){
	sidebarStopper();	
	relateUnitResize();
})
window.onresize = function(){
	sidebarStopper();
	relateUnitResize();
}
window.onscroll = function(){
	sidebarStopper();
}
window.setInterval(function(){
	relateUnitResize();
}, 500);

function sidebarStopper() {
	var target_a = $('.unitdetail-sidebar');
	var target_b = $('#map_canvas2');

	if(window.innerWidth < 992) {
		target_a.css('position','static');
		target_a.css('top','0px');
		target_a.removeClass('sidefixed');

	} else {
		target_a.removeAttr("style");

		target_a.addClass('sidefixed');

		var gab = $('.navbar').outerHeight();
		var window_pointmark = (window.pageYOffset)+(gab);

		var scroller_a = (target_a.offset().top)+(target_a.outerHeight());
		//var scroller_b = (target_b.offset().top)-(20);
		//var scroller_b = (target_b.offset().top)-(70);
		var scroller_b = (target_b.offset().top)-(235);

		// $("#debug-box").html(window_pointmark+" : "+(target_a.offset().top)+" | "+scroller_a+" : "+scroller_b);
		if(scroller_a > scroller_b){
			target_a.css('position','absolute');
			target_a.css('top',scroller_b-(target_a.outerHeight()));
		} else if (window_pointmark < (target_a.offset().top)){
			target_a.css('position','fixed');
			target_a.css('top',gab);
		}
	}

	// var banner_h = ($('.q-banner-height-controller').innerWidth())*0.4761;
	// $('.q-banner-height-controller').css('height',banner_h);
}

function relateUnitResize(){
	var ratio = 0.4762;
	var relateimg_width = $('.unit-relate-img').innerWidth();
	var height_caled = ratio*relateimg_width;
	$('.unit-relate-img').css('height',height_caled);
}

function UnitDetailFold(target){
	$(target).parent().toggleClass('folded');
}

function checkLogin(POID){
	var user="<?=$this->session->userdata('user_id');?>";
	if(user==''){
		$('#checklogin2').modal();
	}else{
		$('#myModal2').modal();
	}
}
function submitFormLineAlert(POID){
	var user="<?=$this->session->userdata('user_id');?>";
	if(user!=''){
		var sline='';
		$('.LineAlert:checked').each(function(){
			var line = $(this).val();
			sline += line+',';
		});
		if($('#mobile_detect').val()==1){
			$('#line_add_pc').addClass('display-none');
			$('#line_add_mb').removeClass('display-none');
		}else{
			$('#line_add_pc').removeClass('display-none');
			$('#line_add_mb').addClass('display-none');
		}
		
		if (sline!=""){
			$.post("/zhome/add_LineAlert", {'POID':POID,'Alert_id':sline });
			$('#line_add').removeClass('display-none');
			$('#line_alert').addClass('display-none');
			$('.LineAlert:checkbox').removeAttr('checked');
			$('#myModal2').on('hidden.bs.modal', function () {
				$('#line_add').addClass('display-none');
				$('#line_alert').removeClass('display-none');
			})
		} else {
			return false;
		}
	}
}

function submitFormQuestionnaire(POID){
	var user="<?=$this->session->userdata('user_id');?>";
	if(user!=''){
		var qbuyer='';
		$('.Q_buyer:checked').each(function(){
			qbuyer = $(this).val();
		});
		var qbuylength='';
		$('.Q_buy_length:checked').each(function(){
			qbuylength = $(this).val();
		});
		if(qbuyer!='' && qbuylength!=''){
			$.post("/zhome/add_Questionnair", {'POID':POID,'buyer_type':qbuyer,'buy_length':qbuylength },function(res){
				$('#checkQuestionnair').val(1);
				$('#myModal3').modal('hide');
				getOwnerPhone();
			});
		}
	}
}

function showSignup2(){
	$('#signupModal').modal('show');
	$('#signupemailModal').modal('hide');
	$('#loginModal').modal('hide');
	$('#checklogin').modal('hide');
	$('#checklogin2').modal('hide');
}

function showLogin2(){
	$('#loginModal').modal('show');
	$('#signupemailModal').modal('hide');
	$('#signupModal').modal('hide');
	$('#checklogin').modal('hide');
	$('#checklogin2').modal('hide');
	$('.modal-title').text('เข้าสู่ระบบเพื่อดูเบอร์โทรเจ้าของ');
	$('#facebook_login').attr('href', '/auth_oa2/session/facebook/clickTel');
	$('#google_login').attr('href', '/auth_oa2/session/google/clickTel');
}

function showViewTel(){
	var tel=$('#Tel2').val();
	$('.showtel').html(tel);
	var POID = <?php echo $POID ?>;
	$.post('/zhome/recordViewTel', {POID : POID} ,function(res){
	});
}
</script>


</body>
</html>