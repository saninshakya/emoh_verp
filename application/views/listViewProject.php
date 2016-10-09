<?php
$checkRobot=$this->usermenu->check_robot();
if ($checkRobot==1){
?>
	<a href="http://zmyhome.com/zhome/listallunit/sell" target="new">คอนโดขายทั้งหมด</a><br>
	<a href="http://zmyhome.com/zhome/listallunit/rent" target="new">คอนโดเช่าทั้งหมด</a><br>
<?
}
?>
<?php
echo form_open('/zhome/listViewProject', $attributes);
?>
<div class="container-fluid">
	<div class="margin-t50"></div>
	<div class="col-xs-12 col-md-12 panel panel-default">
		<div class="row panel-heading">
			<div class="col-xs-12 col-md-12">
				<div class="btn-toolbar" role="toolbar" aria-label="Markers">
					<div class="btn-group btn-group-justified" role="button" aria-label="Markers">
						<div class="btn-group" role="group"><a href="/zhome/listViewProject/BTS" alt="BTS" class="btn btn-default" role="button">BTS</a></div>
						<div class="btn-group" role="group"><a href="/zhome/listViewProject/MRT" alt="MRT" class="btn btn-default" role="button">MRT</a></div>
						<div class="btn-group" role="group"><a href="/zhome/listViewProject/ARL" alt="ARL" class="btn btn-default" role="button">ARL</a></div>
						<div class="btn-group" role="group"><a href="/zhome/listViewProject/Area" alt="Area" class="btn btn-default" role="button">Area</a></div>
						<!--<div class="btn-group" role="group"><a href="/zhome/listViewProject/ShopingMall" alt="ShopingMall" class="btn btn-default" role="button">Shoping Mall</a></div>
						<div class="btn-group" role="group"><a href="/zhome/listViewProject/Education" alt="Education" class="btn btn-default" role="button">Education</a></div>
						<div class="btn-group" role="group"><a href="/zhome/listViewProject/Hospital" alt="Hospital" class="btn btn-default" role="button">Hospital</a></div>-->
					</div>
				</div>
			</div>
		</div>
		<div class="row panel-body">
			<div id="ListKeyMarker" class="col-xs-12 col-md-12">
				<?php $KeyNameAnchorMain=str_replace(" ","-",$KeyName);?>
				<div class="col-xs-8 col-md-8 text-left"><a href="/zhome/listViewProject/<?=$KeyType;?>" alt="<?=$KeyType;?>" style="color:<?php if($KeyID==''){echo "#FF0000";}?>;"><?=$KeyType;?></a><?php if($KeyID!=''){?> / <a href="/zhome/listViewProject/<?=$KeyType;?>/<?=$KeyID;?>/<?=$KeyNameAnchorMain;?>" alt="<?=$KeyType."/".$KeyName;?>" style="color:<?php if($KeyID!=''){echo "#FF0000";}?>;"><?=$KeyName;?></a><?php }?></div>
				<div id="toggleKey" class="text-right"><a href="#" alt="show/hide"><span class="badge" style="background-color:#5A97DD;font-size:1em;">Hide All</span></a></div>
				<div id="listKey">
				<?php
				foreach ($listMarker->result() as $row){
					$KeyNameAnchor=str_replace(" ","-",$row->KeyName);
				?>
					<div class="col-xs-6 col-sm-4 col-md-3 text-left"><a href="/zhome/listViewProject/<?=$row->Type;?>/<?=$row->ID;?>/<?=$KeyNameAnchor;?>" alt="<?=$row->Type;?>" style="color:<?php if($KeyID==$row->ID){echo "#FF0000";}?>;"><?=$row->KeyName;?></a></div>
				<?}?>
				</div>
			</div>
		</div>
		<div class="row panel-footer">
			<div id="ListProject" class="col-xs-12 col-md-12"></div>
		</div>
	</div>
</div>
<input type="hidden" id="KeyType" value="<?=$KeyType;?>">
<input type="hidden" id="KeyID" value="<?=$KeyID;?>">
<input type="hidden" id="Distance" value="<?=$Distance;?>">
</form>
<script type="text/javascript" src="/js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/bootstrap-select.min.js"></script>
<script type='text/javascript' src='/js/quicksilver.js'></script>
<script type='text/javascript' src='/js/jquery.quickselect.js'></script>
<!--multi select-->
<link rel="stylesheet" href="/css/bootstrap-multiselect.css" type="text/css"/>
<script type="text/javascript" src="/js/bootstrap-multiselect.js"></script>
<script language="JavaScript">
$(document).ready(function() {
	ProjectSearch();
	$('.selectpicker').selectpicker();
	//Check Mobile Device
	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ){
	}
});

$("#toggleKey").click(function() {
    if($('#listKey:visible').length){
        $('#listKey').hide();
		$('#toggleKey span').text('Show All');
    }else{
        $('#listKey').show();
		$('#toggleKey span').text('Hide All');
	}
});

var listProject = [];
function ProjectSearch(){
	var KeyType = $('#KeyType').val();
	var KeyID = $('#KeyID').val();
	var Distance = $('#Distance').val();
	
	if(!KeyType || KeyType=='')return false;
	if(!Distance || Distance=='')return false;
	var getProjectList = $.getJSON("/zhome/getProjectList",{ KeyType:KeyType,KeyID:KeyID,Distance:Distance }, function(json) {
		console.log( "success" );
		})
		.done(function() {
		console.log( "second success" );
		})
		.fail(function() {
		console.log( "error" );
		})
		.always(function(json) {
			
			listProject = json;
			console.log( "complete" );
		});

	// Set another completion function for the request above
	getProjectList.complete(function() {
	  console.log( "second complete" );
	  displayProject();
	});
}

function displayProject(){
	var listNode = "";
	var keyCheck="";
	var colorSale="";
	var colorRent="";
	$('#ListProject').empty();
	for(var i=0;i<listProject.length;i++){
		colorSale="";
		colorRent="";
		if(listProject[i].UnitSale>0){
			colorSale="#FF0000";
		}
		if(listProject[i].UnitRent>0){
			colorRent="#008040";
		}
		if(keyCheck!=listProject[i].KeyID){
			listNode += '<div class="col-md-12 col-xs-12" style="border-top:1px solid #dbdbdb;margin-top:10px;"></div>';
			listNode +=	'<div class="col-md-12 col-xs-12" style="margin-top:5px;"><span style="padding:0px 0px 0px 0px;margin:0;font-size:16px;width:100%;z-index:1000000000;color:#FF0000;">'+listProject[i].KeyName+'</span></div>';
			keyCheck=listProject[i].KeyID;
		}
		listNode += '<div id="'+listProject[i].PID+'" data-project="'+listProject[i].ProjectName+'" class="col-xs-12 col-sm-6 col-md-4 text-left">';
		//listNode += ' <a href="/zhome/projectDetail/'+listProject[i].PID+'/All/'+listProject[i].ProjectNameAnchor+'" target="_blank" alt="'+listProject[i].ProjectNameAnchor+'" style="color:#0000FF;">'+listProject[i].ProjectName;
		listNode += ' <a href="#'+i+'" alt="'+listProject[i].ProjectNameAnchor+'" style="color:#0000FF;">'+listProject[i].ProjectName;
		listNode += '</a> ';
		//listNode += '<a href="/zhome/projectDetail/'+listProject[i].PID+'/Sale/'+listProject[i].ProjectNameAnchor+'" target="_blank" alt="'+listProject[i].ProjectNameAnchor+'" style="text-decoration: none;color:#0000FF;">';
		listNode += '<a href="#'+i+'" alt="'+listProject[i].ProjectNameAnchor+'" style="text-decoration: none;color:#0000FF;">';
		listNode += '<span class="badge" style="background-color:'+colorSale+';">Sale '+listProject[i].UnitSale+'</span>';
		listNode += '</a> ';
		listNode += '|';
		//listNode += ' <a href="/zhome/projectDetail/'+listProject[i].PID+'/Rent/'+listProject[i].ProjectNameAnchor+'" target="_blank" alt="'+listProject[i].ProjectNameAnchor+'" style="text-decoration: none;color:#0000FF;">';
		listNode += ' <a href="#'+i+'" alt="'+listProject[i].ProjectNameAnchor+'" style="text-decoration: none;color:#0000FF;">';
		listNode += '<span class="badge" style="background-color:'+colorRent+'">Rent '+listProject[i].UnitRent+'</span>';
		listNode += '</a>';
		listNode += '<input type="hidden" id="idProject_'+i+'" class="idProject" value="'+i+'">';
		listNode += '</div>';
	}
	$('#ListProject').append(listNode);
	$(window).scrollTop(0);
}
</script>