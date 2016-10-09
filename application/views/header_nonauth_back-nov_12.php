<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<link href="/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css" > 
    <link href="/css/main.css" rel="stylesheet" type="text/css">
    <link href="/css/bootstrap-select.min.css" rel="stylesheet" type="text/css" >
	
	<link rel="stylesheet" type="text/css" href="/css/jquery.quickselect.css" />
	<?php if(isset($ipage)){ ?>
		<link href="/css/customUpImg.css" rel="stylesheet">
	<?php }else{ ?>
	<link href="/css/custom.css" rel="stylesheet">
	<?php } ?>
	<link type="text/css" media="screen" rel="stylesheet" href="/css/jquery.cropbox.css">
     <link rel="shortcut icon" href="/img/zmyhome.ico" >
     <link rel="icon" href="/img/animated_zmyhome.gif" type="image/gif" >
<title>ZHome | Buy or Rent Your Home by Owner Directly</title>
</head>

<body class="imgBG">
<?php include_once("analyticstracking.php") ?>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    <a href="/"><span class="navbar-brand-logo icon-Zmyhome-svg2">
				<span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span>
				</span></a>
    
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <span class="navbar-brand-menu"><a href="/auth/login2/">Sign Up</a>&nbsp;|&nbsp;<a href="/auth/login/">Log In</a></span>

   <ul class="nav navbar-nav navbar-right padding-none">
        <li class="btn-p2 pull-right"><a href="/auth/login2/" class="btn-prakard">ลงประกาศฟรี</a></li>
        <li class="pull-right padding-none"><a class="" style="padding:13px 28px 13px 13px;" href="http://line.me/ti/p/%40zmyhome" target="_blank"><img src="/img/line-contact.png"></a></li>
				<li class="dropdown">
          <a href="#" style="padding-top:13px;" class="dropdown-toggle pull-right" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ช่วยเหลือ&nbsp;<span class="caret"></span></a>
          <ul class="dropdown-menu dropdown-menu-right text-right" aria-labelledby="dropdownMenu1">
            <li><a href="http://blog.zmyhome.com" target="_blank">Blog</a></li>			
          </ul>
        </li>
        
		</ul>
   
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
 
</nav>
<!-- under nav -->	
  <div class="container-fluid lunderNav display-none">
    <ul class="list-inline">
<!--        <li><a href="/zhome/searchResult">ค้นหาประกาศ</a></li>
-->
    </ul>
</div><!-- end under nav-->
