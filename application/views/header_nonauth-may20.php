<!--DOCTYPE html-->
<html lang="en">
<head>
<meta http-equiv="Cache-control" content="public">
<meta http-equiv="Cache-control" content="max-age=86400">
<meta name="keywords" content="<?=$keyword;?>">
<meta name="description" content="<?=$description;?>">
<meta name="author" content="ZmyHome">
<meta charset="UTF-8" />
<meta name="<?=$specMeta;?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta property="fb:app_id" content="<?=$facebook_id;?>" />
<meta property="og:url" content="<?=current_url();?>">
<meta property="og:site_name" content="ZmyHome">
<meta property="og:image" content="<?=$imageOG;?>" />
<meta property="og:title" content="<?=$title;?>" />
<meta property="og:description" content="<?=$description;?>" />
<meta property="og:locale" content="th_TH" />
<?php
$checkRobot=$this->usermenu->check_robot();
if ($checkRobot==1){
?>
	<a href="/zhome/listallunit/sell" target="new">คอนโดขายทั้งหมด</a><br>
	<a href="/zhome/listallunit/rent" target="new">คอนโดเช่าทั้งหมด</a><br>
<?
}
?>
<?php
$this->usermenu->check_robot();
$this->usermenu->inc_file('font-awesome.min.css','css');
$this->usermenu->inc_file('bootstrap.min.css','css');
$this->usermenu->inc_file('main.min.css','css');
$this->usermenu->inc_file('bootstrap-select.min.css','css');
$this->usermenu->inc_file('jquery.quickselect.min.css','css');
if(isset($ipage)){
	$this->usermenu->inc_file('customUpImg.min.css','css');
}
$this->usermenu->inc_file('custom.min.css','css');
$this->usermenu->inc_file('jquery.cropbox.min.css','css');
//$this->usermenu->inc_file('qdev.min.css','css');
?>
<link rel="shortcut icon" href="http://static.zmyhome.com/img/zmyhome.ico" >
<link rel="icon" href="http://static.zmyhome.com/img/animated_zmyhome.gif" type="image/gif" >
<title><?=$title;?></title>
</head>

<body class="imgBG">
<?php include_once("analyticstracking.php") ?>
<nav class="navbar navbar-default fixed">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
  
    
    <div class="navbar-header">
      
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>

      </button>
      <ul class="nav navbar-nav navbar-right padding-none visible-xs visible-sm w50 pull-right">
        <li class="btn-p2 pull-right"><a href="http://zmyhome.com/auth/login2/" class="btn-p2 btn-prakard">ลงประกาศ</a></li>
        <li class="pull-right padding-t3" style="width:auto;"><a href="http://zmyhome.com/auth/login/" class="text-white">Log In</a></li>

      </ul>
    <!--<a href="/"><span class="navbar-brand-logo icon-Zmyhome-svg2">
				<span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span>
				</span>
    </a>-->
   <!--<div class="zlogo img-responsive"><a href="/"><img src="http://static.zmyhome.com/img/zmyhome-web-logo.png" alt="ZmyHome"></a></div>-->
   <div class="zlogo pull-left" style="padding-left:5px;"><a href="/"><img src="http://static.zmyhome.com/img/zmyhome-web-logo.png" alt="ZmyHome" class="img-responsive"></a></div>
    
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <span class="navbar-brand-menu hidden-xs hidden-sm"><a href="http://zmyhome.com/auth/login2/" class="text-white">Sign Up</a>&nbsp;<span class="text-white">|</span>&nbsp;<a href="http://zmyhome.com/auth/login/" class="text-white">Log In</a></span>

   <ul class="nav navbar-nav navbar-right padding-none">
        <li class="btn-p2 pull-right hidden-xs hidden-sm"><a href="http://zmyhome.com/auth/login2/" class="btn-prakard">ลงประกาศ</a></li>
         <li class="pull-right padding-none padding-r15m"><a class="text-white padding-none" href="/Zhome/searchResult/0/BTS-อนุสาวรีย์ชัย/0/0/3000/1-2-/1-/0/0/0/1-0-/0">ค้นหาคอนโด</a></li>
		<li class="pull-right padding-none"><a class="" style="padding:13px 28px 13px 13px;" href="http://line.me/ti/p/%40zmyhome" target="_blank"><img src="http://static.zmyhome.com/img/line-contact.png" alt="Line Contact"></a></li>
				<li class="pull-right padding-none"> <a style="padding-top:13px;" class="text-white" href="http://blog.zmyhome.com" target="_blank">Blog</a></li>
        <!--<li class="dropdown">
          <a href="#" style="padding-top:13px;" class="dropdown-toggle pull-right" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ช่วยเหลือ&nbsp;<span class="caret"></span></a>
          <ul class="dropdown-menu dropdown-menu-right text-right" aria-labelledby="dropdownMenu1">
            <li><a href="http://blog.zmyhome.com" target="_blank">Blog</a></li>			
          </ul>
        </li>-->
        
		</ul>
   
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
 
</nav>
<div class="margin-t50 padding-0 height-0"></div>
<!-- under nav -->	
  <div class="container-fluid lunderNav display-none">
    <ul class="list-inline">
<!--        <li><a href="/zhome/searchResult">ค้นหาประกาศ</a></li>
-->
    </ul>
</div><!-- end under nav-->