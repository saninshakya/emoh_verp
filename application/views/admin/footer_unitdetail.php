<?php
$POID=$rowUnit->POID;
$PID=$rowUnit->PID;
$Tel=substr($rowUnit->Telephone1,0,3)."-XXX-XXXX";
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
<div class="col-md-12 blog-bg-grey">

    <br>
    <div class="col-md-2"></div>
    <div class="col-md-8 text-center">
		<!--<h3 class="text-white copyright">THE BETTER INFORMATION YOU GIVE,<br>THE FASTER YOU BUY & SELL</h3>-->
		<h3 class="text-white copyright">ZmyHome คอนโดเจ้าของขายเอง ให้เช่าเอง<br>ซื้อง่าย ขายคล่อง เชื่อถือได้</h3>
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
          <small class="text-white">COPYRIGHT © 2015 , Z Home Ltd. ALL RIGHTS RESERVED </small>
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
<script type="text/javascript" src="/js/bootstrap-select.min.js"></script>
    
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?v=3&amp;sensor=false"></script>
<script type="text/javascript" src="/js/markerwithlabel.js"></script>
<!--<script type="text/javascript" src="/js/jssharefb.js"></script>-->
<script type="text/javascript" src="/js/forFBshare.js"></script>
<script type="text/javascript" language="javascript">

 $(document).ready(function() {
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
		$('#nextImg').show("slow");
		$('#backImg').hide();
	}else{
		$('#backImg').hide();
		$('#nextImg').hide();
	}
	$('#backImg').click({index:indexImg},changeImgIndex);
	$('#nextImg').click({index:indexImg},changeImgIndex);

	initMap();
	mSendPIDToGetImg();
	//getOwnerPhone();
});
  
function changeImgIndex(evt){
	
	evt.preventDefault();
	var total = totalImg-1;
	if(evt.target.id=="nextImg"&&indexImg<total){
		indexImg += 1;
	}
	if(evt.target.id=="backImg"&&indexImg>0){
		indexImg -= 1;
	}
		
	if(indexImg>0){
		$('#backImg').show("slow");
	}else{
		$('#backImg').hide();
	}
		
	if(indexImg<total){
		$('#nextImg').show("slow");
	}else{
		$('#nextImg').hide();
	} 

	var imgurl = <?php echo json_encode($Img)?>;

	$('#imgHUnit').fadeOut(500, function() {
		$('#imgHUnit').attr("src",imgurl[indexImg]);
		$('#imgHUnit').fadeIn(500);
	});

}

function getOwnerPhone(){

	var poid = <?php echo $POID ?>;

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
}

function setShowTel(){
	var tel = $('#otel').val();
	var node;
	//<span class="glyphicon glyphicon-earphone text-white"></span> <a class="text-white" href="#">099-XXX-XXXX</a> -->
	 //<a class="text-white" href="#"><h7 class="text-white"> พร้อมแสดงผล 1/10/58</h7></a>-->

	if(tel==0){
		//node = '<a class="text-white" href="#"><h7 class="text-white">'+tel+'</h7></a>';
		node = "คุณใช้สิทธ์ดูเบอร์โทรหมดแล้ว";
		$(".target-b2").show( 'fast', function(){});
	}else if(tel==-1){
		node="<?=$Tel;?>";
		if(confirm('คุณยังไม่ได้ login เข้าระบบ\nต้องการ login เข้าระบบเลยหรือไม่?')){
			window.location.replace("/auth/login/");
		}
	}else{
		var tel1 = tel.substring(0,3);
		var tel2 = tel.substring(3,6);
		var tel3 = tel.substring(6,tel.length);
		var telformat = tel1+"-"+tel2+"-"+tel3;
		node = telformat;
		//node = '<span class="glyphicon glyphicon-earphone text-white"></span><a class="text-white" href="#"><h7 class="text-white">'+" "+telformat+'</h7></a>';
	}

	$('#down-b1').contents().replaceWith(node);
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
	for(var i=0;i<imgUnits.length;i++){
    
		if($('#'+imgUnits[i].POID).length==0&&imgUnits[i].POID!=$('#poid').val()){
			imgNode += '<a href="/'+imgUnits[i].NamePath+'/condo/'+imgUnits[i].PName_en+'/'+imgUnits[i].POID+'" target="_blank" alt="'+imgUnits[i].AdvertisingName+'-'+imgUnits[i].PropertyName+'-'+imgUnits[i].ProjectNameAnchor+'" style="text-decoration: none;">';
			imgNode +=  '<div class="col-md-4 col-sm-6" style="margin-bottom:10px; margin-left:0px; padding-left:0px;" id="'+imgUnits[i].POID+'" data-project="'+imgUnits[i].ProjectName+'" onclick=setPOID(this);>';
			imgNode +=  '<div><div class="unit-show2"><div style="padding-left:13px;cursor:pointer;"><h3 class="padding-none s-name"> '+imgUnits[i].ProjectName+'</h3></div>';
			imgNode +=  '<div class="bg-grey2 text-center" style="position:relative;background-color:#87CED5;height:auto;cursor:pointer;"><img src="'+imgUnits[i].Picture[0]+'" class="t-img-responsive center-block"><h4  class="text-center" style="color:#ffffff; position:absolute; width:160px; bottom:0;right:0; margin-bottom:0; padding-top:8px; background-color: #2190ab;">ZmyHome เท่านั้น</h4></div></div>';
			imgNode +=   '<table class="table borderless2 fsize-unitsearch unit-table" style="padding:0;margin:0;cursor:pointer;">';
			imgNode +=   '<tr style="border-bottom: 1px solid #dbdbdb; padding:0;margin:0;">';
			imgNode +=   '<td style="padding-left:13px;"> <strong><span class="text-grey">'+imgUnits[i].Bedroom+' นอน '+imgUnits[i].useArea+'ม&sup2;  ชั้น '+imgUnits[i].Floor+'</span></strong</td>';
			imgNode +=  '<td class="s-padding-left"><strong class="s-price">&#3647; <span class="text-primary">'+imgUnits[i].Price+'</span></strong></td>';
			imgNode +=  '<td class="text-right"><strong class="s-price">&#3647; <span class="text-primary text-right">'+imgUnits[i].PricePerSq+'</span>/ม&sup2;</strong></td>';
			imgNode +=  '</tr>';
			imgNode +=  '<tr style="border-bottom: 1px solid #dbdbdb">';
			imgNode +=  '<td style="padding-left:13px;">'+imgUnits[i].DistName+'</td>';
			imgNode +=  '<td class="s-padding-left"><span class="text-blue">'+imgUnits[i].DateShow+' </span> <img src="/img/sun-s-icon.png"> <span class="text-blue"> '+imgUnits[i].ViewTel+' </span> <span width="3px" class="glyphicon glyphicon-earphone text-blue input-sm3"></span></td>';
			imgNode +=  '<td class="text-right"><span class="text-blue text-right">'+imgUnits[i].Tel+'</span></td>';
			imgNode +=   '</tr>';
			imgNode +=   '</table>';
			imgNode +=   '</div></div>';
			imgNode +=   '</a>';
        }
	}
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
</script>     
<script type="text/javascript">
$('#myModal').modal(options);

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

function submitFormHelpdesk()
{
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


</script>

<script type="text/javascript">
$(function() {
    $('#map_canvas2').click(function(e) {
        $(this).find('iframe').css('pointer-events', 'all');
    }).mouseleave(function(e) {
        $(this).find('iframe').css('pointer-events', 'none');
    });
})
</script>

</body>
</html>