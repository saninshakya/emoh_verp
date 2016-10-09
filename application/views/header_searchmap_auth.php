<?php
$this->session->set_userdata('POID','null');
$this->session->set_userdata('clickTel','null');
$this->session->set_userdata('referred_from', current_url());
$MsgID=$this->session->userdata('messengerID');
$showfbbot=$this->session->userdata('showfbbot');
if($showfbbot=='' or $showfbbot=='null' or $showfbbot==null){
	$showfbbot=0;
}
?>
<html lang="en">
<head>
<meta name="keywords" content="<?=$keyword;?>">
<meta name="description" content="<?=$description;?>">
<meta name="author" content="ZmyHome">
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

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

$this->usermenu->inc_file('jquery-1.11.3.min.js','js');
$this->usermenu->inc_file('bootstrap.min.js','js');
$this->usermenu->inc_file('bootstrap-datepicker.js','js');
?>
<link rel="shortcut icon" href="/img/zmyhome.ico" >
<link rel="icon" href="/img/animated_zmyhome.gif" type="image/gif" >
<title><?=$title;?></title>
</head>

<body class="imgBG">
<?php include_once("analyticstracking.php") ?>
<nav id="header-navbar" class="navbar navbar-default fixed">
	<div class="container-fluid bg-orange-hd-mobile">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<div class="row">
				<div class="zlogo pull-left hidden-xs">
					<a href="/"><img src="/img/zmyhome-web-logo.png" alt="ZmyHome" class="img-responsive"></a>
				</div>
				<div class="col-xs-2 visible-xs">
					<button type="button" class="navbar_button navbar-toggle btn btn-default btn-lg collapsed pull-left clear-margin-padding" style="padding:12px 0px 0px 18px;" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="navbar_icon glyphicon glyphicon-menu-hamburger text-white padding-none" style="font-size:20px;"></span>
						<span class="navbar_icon glyphicon glyphicon-remove text-white display-none"></span>
					</button>
				</div>
				<div class="col-sm-1 visible-sm">
					<div class="btn-group pos-rlt text-white font16 margin-t10 padding-t4">
						<button type="button" class="button-distance btn dropdown-toggle padding-none font16" style="background-color:#f36b22;color:#FFFFFF;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							ระยะห่าง <span class="caret"></span>
						</button>
						<ul class="dropdown-menu bg-orange-hd font16" style="z-index:10001;">
							<li>&nbsp;&nbsp;<label><input type="radio" class="iDistance" name="iDistance" value="500" <?if($distance_length==500){echo "checked";}?> data-checkbox-text="0.5 km"> 0.5 km</label></li>
							<li>&nbsp;&nbsp;<label><input type="radio" class="iDistance" name="iDistance" value="1000" <?if($distance_length==1000){echo "checked";}?> data-checkbox-text="1.0 km"> 1.0 km</label></li>
							<li>&nbsp;&nbsp;<label><input type="radio" class="iDistance" name="iDistance" value="1500" <?if($distance_length==1500){echo "checked";}?> data-checkbox-text="1.5 km"> 1.5 km</label></li>
							<li>&nbsp;&nbsp;<label><input type="radio" class="iDistance" name="iDistance" value="3000" <?if($distance_length==3000){echo "checked";}?> data-checkbox-text="3.0 km"> 3.0 km</label></li>
							<li>&nbsp;&nbsp;<label><input type="radio" class="iDistance" name="iDistance" value="5000" <?if($distance_length==5000){echo "checked";}?> data-checkbox-text="5.0 km"> 5.0 km</label></li>
						</ul> 
					</div>
				</div>
				<div class="col-sm-1 visible-sm text-white font16 margin-t10 padding-t4">จาก</div>
				<div class="col-xs-8 col-sm-7 visible-xs visible-sm padding-t10 padding-left-clear">
					<div class="input-group">
						<input type="text" value="" id="iRefPlace_mb" name="iRefPlace_mb" placeholder="รถไฟฟ้า, โครงการ, สถานที่สำคัญ" autocomplete="off" class="form-control pull-left visible-sm visible-xs pull-left font16 w100" style="z-index: 10000">
						<span class="input-group-btn">
							<button class="btn bg-white padding-t6 padding-b6" type="button" onclick="$('#iRefPlace_mb').val('');"><span class="glyphicon glyphicon-remove text-grey2" aria-hidden="true"></span></button>
						</span>
					</div>
				</div>
				<div class="col-sm-1 visible-sm">
					<button type="button" class="navbar_button navbar-toggle btn btn-default btn-lg collapsed" style="padding:5px 0px 0px 0px;" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="navbar_icon glyphicon glyphicon-menu-hamburger text-white padding-none" style="font-size:1.25em;"></span>
						<span class="navbar_icon glyphicon glyphicon-remove text-white display-none"></span>
					</button>
				</div>
				<div class="col-xs-2 visible-xs padding-t10">
					<button id="show_list-btn" type="button" class="btn pull-right text-white  padding-t4 display-none" style="background-color: #f36b22;"><h5 class="text-white" style="margin:0px 0px 0px 20px;padding:0px 0px 0px 20px;">ดูลิสต์</h5>
					</button>
					<button id="show_map-btn" type="button" class="btn pull-right text-white    padding-t4" style="background-color: #f36b22;"><h5 class="text-white" style="margin:0px 0px 0px 20px;padding:0px 0px 0px 20px;">แผนที่</h5>
					</button>
				</div>
			</div>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<!--<div class="row">-->
			<div class="collapse navbar-collapse pull-right-m z-index-top" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right padding-none;z-index-top" style="padding-right:15px">
					<li class="padding-none z-index-top visible-xs text-right">
						<a href="/" class="hidden-xs padding-t10"><img src="/img/zmyhome-web-logo.png" alt="ZmyHome" class="img-responsive"></a>
						<a href="/" class="visible-xs padding-t4 pull-left"><img src="/img/zmyhome-web-logo.png" alt="ZmyHome" class="img-responsive"></a>
					</li>
					<li class="button hidden-sm hidden-xs">
						<a href="/zhome/dashboard" class="imgthumb">
							<img src="<?php echo $image;?>" class="img-circle navbar-brand-img" alt="Dashboard"> 
							<?if($CNumber<>''){?><p class="speech_badge"><?=$CNumber;?></p><?}?>
						</a>
					</li>
					<li class="clearfix"></li>
					<li class="button visible-sm visible-xs padding-t10 pull-left z-index-top" style="padding-left:10px;margin-left:0; margin-bottom:0; padding-bottom:0;">
						<a href="/zhome/dashboard/" class="imgthumb margin-r9 fixed-link">
							<img src="<?php echo $image;?>" class="img-circle navbar-brand-img" alt="Dashboard"> 
							<?if($CNumber<>''){?><p class="speech_badge"><?=$CNumber;?></p><?}?>
						</a>
					</li>    
					<li class="clearfix visible-sm visible-xs"></li>
					<!--<li class="padding-none z-index-top visible-sm visible-xs padding-t15"><a class="text-white" href="/zhome/dashboard"><? echo $firstname;?></a></li>-->
					<!--<li class="padding-none z-index-top margin-left5 hidden-sm hidden-xs padding-t4"><a class="text-white" href="/zhome/dashboard"><? echo $firstname;?></a></li>-->
					<li class="padding-none z-index-top hidden-sm hidden-xs  margin-left5 padding-t4"><a href="/auth/logout" class="text-white">ออกจากระบบ</a></li>
					<li class="padding-none z-index-top visible-sm visible-xs padding-t16 padding-l5m z-index-top"><a href="/auth/logout" class="text-white">ออกจากระบบ</a></li>
					<li class="padding-none z-index-top padding-t0  padding-l5m z-index-top"><a  class="text-white padding-t19m" href="http://blog.zmyhome.com" target="_blank">Blog</a></li>
					<li class="padding-none z-index-top padding-t4  padding-l5m z-index-top"><a class="text-white" href="http://line.me/ti/p/%40zmyhome" target="_blank">LINE</a></li>
					<li class="clearfix visible-xs visible-sm padding-t0 padding-clear-bottom"></li>
					<li class="margin-right5 padding-t0  padding-l5m z-index-top"><a href="/zhome/post1/newpost" class="text-white padding-t19m">ลงประกาศ</a></li>
					<li class="padding-none visible-xs visible-sm"></li>
				</ul>
			</div><!-- /.navbar-collapse -->
		<!--</div>-->
	</div><!-- /.container-fluid -->
</nav>
<div class="margin-t50 padding-0 height-0 hidden-xs hidden-sm"></div>
<!-- Modal Bot -->
<div class="modal modal-sm fade display-none z-index-top" id="fbbotModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="margin-right: auto;margin-left: auto; width:43vh;">
	<div class="modal-dialog" role="document">
		<div class="modal-content text-center">
			<div class="modal-header bg-blue" style="padding:10px 15px 5px;">
				<div class="pull-right"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><big>&times;</big></span></button></div>
				<h4 class="text-white text-center padding-none padding-t3">เปิดใช้งาน ZmyHome Bot</h4>
			</div>
			<div class="modal-body padding-none">
				<a class="text-orange" href="http://m.me/zmyhome" target="_blank"><img class="img-responsive" src="/img/ZmyHome's Messenger Bot.png" style="padding-bottom: 5px;" title="Go to Messenger Bot. Click!!"></a>
				<!--<div><?=$Label['facebook_bot_description'][0];?></div>
				<div><a class="text-orange" href="http://m.me/zmyhome">Open ZmyHome's FB Messenger Bot</a></div>-->
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>
<!--End Modal Bot-->

<script type="text/javascript">
$(window).load(function(){
	<?if($MsgID=='' and $showfbbot=='0'){?>
	$('#fbbotModal').modal('show');
	<?$this->session->set_userdata('showfbbot','1');}?>
});
</script>