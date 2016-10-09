<!--DOCTYPE html-->
<html lang="en">
<head>
<meta name="keywords" content="<?=$keyword;?>">
<meta name="description" content="<?=$description;?>">
<meta name="author" content="ZmyHome">
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta property="og:site_name" content="ZmyHome">
<meta property="og:image" content="<?=$imageOG;?>" />
<meta property="og:title" content="<?=$title;?>" />
<meta property="og:description" content="<?=$description;?>" />
<!--
<link href="/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css" >
<link href="/css/main.css" rel="stylesheet" type="text/css">
<link href="/css/bootstrap-select.min.css" rel="stylesheet" type="text/css" >
<link rel="stylesheet" type="text/css" href="/css/jquery.quickselect.css" />
<?php //if(isset($ipage)){ ?>
	<link href="/css/customUpImg.css" rel="stylesheet">
	<link href="/css/custom.css" rel="stylesheet">
<?php //}else{ ?>
	<link href="/css/custom.css" rel="stylesheet">
<?php //} ?>
<link type="text/css" media="screen" rel="stylesheet" href="/css/jquery.cropbox.css">
-->
<?php
$this->usermenu->inc_file('font-awesome.min.css','css');
$this->usermenu->inc_file('bootstrap.min.css','css');
$this->usermenu->inc_file('main.css','css');
$this->usermenu->inc_file('bootstrap-select.min.css','css');
$this->usermenu->inc_file('jquery.quickselect.css','css');

if(isset($ipage)){
	$this->usermenu->inc_file('customUpImg.css','css');
}
//$this->usermenu->inc_file('custom.min.css','css');
$this->usermenu->inc_file('custom.css','css');
$this->usermenu->inc_file('jquery.cropbox.css','css');
//$this->usermenu->inc_file('qdev.css','css');
$this->usermenu->inc_file('datepicker.css','css');
$this->usermenu->inc_file('jquery-1.11.3.min.js','js');
$this->usermenu->inc_file('bootstrap.min.js','js');
$this->usermenu->inc_file('bootstrap-datepicker.js','js');
?>
<link rel="shortcut icon" href="/img/zmyhome.ico" >
<link rel="icon" href="/img/animated_zmyhome.gif" type="image/gif" >
<title><?=$title;?></title>
<?php
if(!isset($language)){$language=1;}
$user_id=$this->session->userdata('user_id');
$MsgID=$this->session->userdata('messengerID');
$showfbbot=$this->session->userdata('showfbbot');
if($showfbbot=='' or $showfbbot=='null' or $showfbbot==null){
	$showfbbot=0;
}
$click_dashboard=$this->backend->getLogClick($user_id,'dashboard');
$this->session->set_userdata('POID','null');
$Label=$this->search->qLabel('header',$language);
$queryListUnPost=$this->dashboard->ListUnPost($user_id);
$numListUnPost=$queryListUnPost->num_rows();
if($CNumber==0){
	$CNumber="";
}
if (isset($HSNumber)){
	$i=1;
	while ($i < $HSNumber){
		echo $HSrc[$i];
		$i++;
	}
}
if (isset($map)){
	echo $map['js'];
}
?>

</head>
<body class="imgBG">
<?php include_once("analyticstracking.php") ?>
<p id="demo" class="padding-none"></p>
<div class="container-fluid">
	<nav class="navbar navbar-default fixed header-navbar-class">
		<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<div class="row">
					<div class="pull-right">
						<button type="button" class="navbar_button navbar-toggle btn btn-default btn-lg collapsed clear-margin-padding" style="padding:13px 10px 0px 0px; margin-right:15px; margin-left:4px;" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false" onclick="$('.navbar_icon').toggle();">
							<span class="navbar_icon glyphicon glyphicon-menu-hamburger text-white padding-none" style="font-size:1.25em;"></span>
							<span class="navbar_icon glyphicon glyphicon-remove text-white display-none"></span>
						</button>
					</div>
					<ul class="nav navbar-nav navbar-right padding-none visible-xs visible-sm w70 pull-right">
						<li class="pull-right">&nbsp;</li>
						<li class="pull-right padding-t6 margin-left4"><a href="/zhome/post1/newpost" class="text-white padding-none">ลงประกาศ</a></li>
						<li class="pull-right padding-t6 margin-left4" style="width:auto;"><a class="text-white padding-none" href="/Zhome/searchResult/0/BTS_อนุสาวรีย์ชัย/0/0/3000/1-2-/1-/0/0/0/1-0-/0">ค้นหา</a></li>
						<li class="pull-right padding-t6 " style="width:auto; margin-top:10px; margin-left:3px; margin-right:6px">
							 <!--<div class="coin gold"><p class="text-center">Z</p></div>-->
							 <div class="cursor"><img src="/img/zcoin01.png" onclick="javascript:location.href='/zhome/payment'"></div>
						</li>
						<li class="pull-right padding-t6 text-white" style="margin-top:9px; margin-right:0px; margin-left:15px;" onclick="location.href='/zhome/payment'"><span class="text-white cursor"><?=$this->credit->CreditBanlance();?></span></li>

						<!--<li class="pull-right padding-bottom2"><a href="/zhome/dashboard" class="imgthumb"><img src="<?php echo $image;?>" class="img-circle navbar-brand-img" alt="Profile Picture"><div class="margin-t4 text-white pull-left"><?=$CNumber;?></div></a></li>-->
						<li class="button pull-right padding-bottom2 margin-r3">
							<!--<a href="/zhome/dashboard" class="imgthumb hidden-xs hidden-sm" alt="Dashboard">-->
							<a href="/zhome/dashboard" class="imgthumb">
								<img src="<?php echo $image;?>" class="img-circle navbar-brand-img dashboard" alt="Profile Picture" <?if($click_dashboard==0){?>data-toggle="tooltip" data-placement="bottom" title="ดูประกาศของคุณ"<?}?>>
								<?if($CNumber<>''){?><p class="speech_badge"><?=$CNumber;?></p><?}?>
							</a>
						</li>
					</ul>
					<!--<a href="/"><span class="navbar-brand-logo icon-Zmyhome-svg2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span></span></a>-->
					<div class="zlogo pull-left padding-t7" style="margin-left:5px;">
						<a href="/" class="hidden-xs padding-t10"><img src="/img/zmyhome-web-logo.png" alt="ZmyHome" class="img-responsive"></a>
						<a href="/" class="visible-xs hidden-sm hidden-md hidden-lg padding-t4"><img src="/img/zmyhome-web-logo-m.png" alt="ZmyHome" class="img-responsive hidden-sm hidden-md hidden-lg"></a>
					</div>
					<?php
					$q=$this->usermenu->tmenuMap();
					foreach($q->result() as $row){
						$prefix="MName_".$this->session->userdata('lang');
						if ($row->Folder==0&&$row->Sub_MID==0){
					?>
							<span class="navbar-brand-menu"><a href="<?php echo $row->Link;?>"><?php echo $row->$prefix;?></a></span>
					<?php
						}
					}
					?>
				</div>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="row">
				<div class="collapse navbar-collapse pull-right-m" id="bs-example-navbar-collapse-1" >

				  <ul class="nav navbar-nav navbar-right">
					<!--<li class="hidden-xs hidden-sm"><a href="/zhome/dashboard" class="imgthumb hidden-xs hidden-sm"><img src="<?php echo $image;?>" class="img-circle navbar-brand-img" alt="Dashboard"> <div class="margin-t4 text-white pull-left"><?=$CNumber;?></div></a></li>-->
					 <li class="button hidden-xs hidden-sm margin-r9">
						<a href="/zhome/dashboard" class="imgthumb hidden-xs hidden-sm">
							<img src="<?php echo $image;?>" class="img-circle navbar-brand-img dashboard" alt="Dashboard" <?if($click_dashboard==0){?>data-toggle="tooltip" data-placement="bottom" title="ดูประกาศของคุณ"<?}?>>
							<?if($CNumber<>''){?><p class="speech_badge"><?=$CNumber;?></p><?}?>
						</a>
					 </li>
					  
					  <li class="button hidden-xs hidden-sm cursor" style="padding-top:14px;padding-left:8px;padding-bottom:8px" onclick="location.href='/zhome/payment'"><span class="text-white cursor visible-xs visible-sm">ซื้อเหรียญ</span><span class="text-white hidden-sm hidden-xs cursor"><?=$this->credit->CreditBanlance();?></span>
					  </li>
					  <li class="button hidden-xs hidden-sm cursor" style="padding-top:16px; padding-right:7px">
							<img src="/img/zcoin01.png" class="coin-logo" width="16px" height="16px" onclick="location.href='/zhome/payment'">
					  </li>

					<!--<li class="margin-left5"><a class="text-white" href="/zhome/dashboard"><?echo $firstname;?></a></li>-->

			<?php
				$query=$this->usermenu->tmenu();
				foreach($query->result() as $row){
					$prefix="MName_".$this->session->userdata('lang');
					if ($row->Folder==0&&$row->Sub_MID==0){
			?>
					<?php if($row->MID==8000){ ?>
					<li class="padding-none"><a class="text-white padding20m5" href="http://blog.zmyhome.com" target="_blank">Blog</a></li>
					<li class="padding-none"><a class="padding20m6 text-white" href="http://line.me/ti/p/%40zmyhome" target="_blank">LINE</a></li>
					<!--<li class="padding-none display-none"><a class="padding20m6 text-white display-none" href="/Zhome/payment"> ซื้อเหรียญ</a></li>-->
					<li class="padding-none padding-r15m hidden-xs hidden-sm"><a class="text-white padding-none" href="/Zhome/searchResult/0/BTS_อนุสาวรีย์ชัย/0/0/3000/1-2-/1-/0/0/0/1-0-/0">ค้นหาคอนโด</a></li>
					<li class="hidden-xs hidden-sm"><a href="/zhome/post1/newpost" class="text-white"><?php echo $row->$prefix;?></a></li>




					<!--<li class="padding-none"><a class="text-white padding20m2" href="/Zhome/searchResult/0/BTS-อนุสาวรีย์ชัย/0/0/3000/1-2-/1-/0/0/0/1-0-/0">ค้นหาคอนโด</a></li>-->
					<?php }else{ ?>
					<li class="padding-none"><a class="padding-none text-white padding10m" href="<?php echo $row->Link;?>"><?php echo $row->$prefix;?></a></li>
					<?php } ?>
			<?php
					}

					if ($row->Folder==1 && $row->Sub_MID==0){
			?>

					<li class="dropdown text-left">
					  <a href="<?php echo $row->Link;?>" class="dropdown-toggle text-white" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $row->$prefix;?><span class="caret"></span></a>
					  <ul class="dropdown-menu text-white">
			<?php
					}
					if ($row->Folder==0&&$row->Sub_MID!=0){
						if ($row->MLine==1){
			?>
						<li role="separator" class="divider"></li>
			<?php
						}
			?>
						<li><a href="<?php echo $row->Link;?>"><?php echo $row->$prefix;?></a></li>
			<?php
						if ($row->EndDrop==1){
			?>
					  </ul>
					</li>


			<?php
						}
					}
				}
			?>

					<!--<li class="padding-none"><a class="padding20m" href="http://line.me/ti/p/%40zmyhome" target="_blank"><img src="/img/line-contact.png" alt="Line Contact"></a></li>-->
				</ul>
				</div><!-- /.navbar-collapse -->
			</div>
	  </div><!-- /.container-fluid -->

	</nav>
	<div class="margin-t50 padding-0 height-0"></div>
	<!-- under nav -->
			<?php
				if ($this->session->userdata('token')!=""){
			?>
	  
		<?php
			}
		?>
<!-- end under nav-->


<input type="hidden" id="unitToken" name="unitToken" value="">
<!-- Modal -->
<div id="myModalUnit" class="modal modal-sm fade display-none" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content text-center">
			<div class="modal-header bg-blue">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="text-white padding-none text-center" id="myModalLabel">คุณมีรายการห้องที่ยังลงไม่เรียบร้อย</h4>
			</div>
			<div class="modal-body text-grey row text-left">
				<div class="col-md-12 col-xs-12 padding-top10 modal-warnning-select">
					<?php
					foreach ($queryListUnPost->result() as $row){
						$ListDetail=$row->ProjectName."<br>";
						if($row->Address!=null or $row->Address!=''){$ListDetail.=$row->Address;}
						if($row->RoomNumber!=null or $row->RoomNumber!=''){$ListDetail.=" เลขที่ห้อง : ".$row->RoomNumber;}
						if($row->Tower!=null or $row->Tower!=''){$ListDetail.=" ตึก ".$row->Tower;}
						if($row->Floor!=null or $row->Floor!=''){$ListDetail.=" ชั้น ".$row->Floor;}
					?>
						<div>
							<div class="pull-left col-md-2 col-xs-2"><input type="radio" class="unitToken pull-left text-grey3" value="<?=$row->Token;?>" onclick="$('#unitToken').val($(this).val());"></div>
							<div class="pull-left padding-l10 padding-t2 col-md-10 col-xs-10"><?=$ListDetail;?></div>
						</div>
						<div class="clearfix"></div>

					<?
					}
					?>
				</div>
				<div class="clearfix"></div>
				<br>
				<div class="col-md-12 padding-top10"><button type="button" class="btn btn-orange btn-block" onclick="submitFormEditList();">ทำรายการ</button></div>
			</div>
		</div>
	</div>
</div>
<!--End Modal-->
<!-- Modal Bot -->
<div class="modal modal-sm fade display-none" id="fbbotModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="margin-right: auto;margin-left: auto; width:43vh;">
	<div class="modal-dialog" role="document">
		<div class="modal-content text-center">
			<div class="modal-header bg-blue" style="padding:10px 15px 5px;">
				<div class="pull-right"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><big>&times;</big></span></button></div>
				<h4 class="text-white text-center padding-none padding-t3">เปิดใช้งาน ZmyHome Bot</h4>
			</div>
			<div class="modal-body padding-none">
				<a class="text-orange" href="http://m.me/zmyhome"><img class="img-responsive" src="/img/ZmyHome's Messenger Bot.png" target="_blank" style="padding-bottom: 5px;" title="Go to Messenger Bot. Click!!"></a>
				<!--<div><?=$Label['facebook_bot_description'][0];?></div>
				<div><a class="text-orange" href="http://m.me/zmyhome">Open ZmyHome's FB Messenger Bot</a></div>-->
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>
<!--End-->


<script type="text/javascript">
$(window).load(function(){

	<?if($MsgID=='' and $showfbbot=='0'){?>
	$('#fbbotModal').modal('show');
	<?$this->session->set_userdata('showfbbot','1');}?>
});

$(document).ready(function() {
	$('.dashboard').tooltip('show');
	$(document).on('shown.bs.tooltip', function (e) {
		setTimeout(function () {
			$(e.target).tooltip('hide');
		}, 10000);
	});
});

function submitFormEditList(){
	var Token=$('#unitToken').val();
	if(Token!=''){
		location.href='/zhome/EditPost2/'+Token;
	}
}
</script>
