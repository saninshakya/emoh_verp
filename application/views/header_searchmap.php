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
$this->usermenu->inc_file('custom.css','css');
$this->usermenu->inc_file('jquery.cropbox.css','css');
$this->usermenu->inc_file('qdev.css','css');
?>
<link rel="shortcut icon" href="/img/zmyhome.ico" >
<link rel="icon" href="/img/animated_zmyhome.gif" type="image/gif" >
<title><?=$title;?></title>

</head>

<body class="imgBG">
<?php include_once("analyticstracking.php") ?>
<nav class="navbar navbar-default fixed">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
  
    
    <div class="navbar-header">
         <div class="zlogo pull-left hidden-sm hidden-xs">
            <a href="/"><img src="/img/zmyhome-web-logo.png" alt="ZmyHome" class="img-responsive">
            </a>
         </div>
    <div class="row visible-xs visible-sm">
      <div class="col-xs-2 visible-xs visible-sm">
          <button type="button" class="navbar-toggle collapsed pull-left padding-l15" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>

         </button>
      </div>
      <div class="col-xs-8 visible-xs visible-sm padding-t10 padding-left-clear">
         <input type="text" value="" id="iRefPlace_mb" name="iRefPlace_mb"  placeholder=" รถไฟฟ้า, โครงการ, สถานที่สำคัญ" autocomplete="off" class="form-control pull-left visible-sm visible-xs pull-left w100 font16" style="z-index: 10000000" width="100%">
      </div>
      <div class="col-xs-2 visible-xs  padding-t10">
         <button id="show_list-btn" type="button" class="btn pull-right text-white padding-r20 padding-t4 display-none" style="background-color: #f36b22;"><h5 class="text-white clear-margin-padding">ดูลิสต์</h5>
         </button>
         <button id="show_map-btn" type="button" class="btn pull-right text-white padding-r20 padding-t4" style="background-color: #f36b22;"><h5 class="text-white clear-margin-padding">แผนที่</h5>
         </button>
      </div>
    </div>
      

     
    
   
    
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="z-index: 10000000000000000">
      <span class="navbar-brand-menu hidden-xs hidden-sm"><a href="/auth/login2/" class="text-white">Sign Up</a>&nbsp;<span class="text-white">|</span>&nbsp;<a href="/auth/login/" class="text-white">Log In</a></span>

       <ul class="nav navbar-nav navbar-right padding-none"  style="z-index: 10000000000000">
            <li class="padding-none z-index-top visible-xs visible-sm padding-none"><a href="/"><img src="/img/zmyhome-web-logo.png" alt="ZmyHome"></a></li>
    				<li class="padding-none z-index-top margin-t3"> <a style="padding-top:13px;" class="text-white" href="http://blog.zmyhome.com" target="_blank">Blog</a></li>
            <li class="padding-none z-index-top"><a class="line-link" href="http://line.me/ti/p/%40zmyhome" target="_blank"><img src="/img/line-contact.png" alt="Line Contact"></a></li>
           
             <li class="padding-none z-index-top visible-xs visible-sm"><a href="/auth/login/" class="text-white">Log In</a></li>
            <li class="btn-p2"><a href="/auth/login2/" class="btn-prakard">ลงประกาศ</a></li>
            <li class="padding-none visible-xs visible-sm">&nbsp;</li>
            
    		</ul>
       
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
 
</nav>
<div class="margin-t50 padding-0 height-0 hidden-xs hidden-sm"></div>
<!-- under nav -->	
  <div class="container-fluid lunderNav display-none">
    <ul class="list-inline">
    </ul>
</div><!-- end under nav-->

