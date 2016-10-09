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
    <link href="/css/custom.css" rel="stylesheet">
	<?php }else{ ?>
	<link href="/css/custom.css" rel="stylesheet">
	<?php } ?>
	<link type="text/css" media="screen" rel="stylesheet" href="/css/jquery.cropbox.css">
     <link rel="shortcut icon" href="/img/zmyhome.ico" >
     <link rel="icon" href="/img/animated_zmyhome.gif" type="image/gif" >
<title><?=$title;?></title>
</head>

<body class="imgBG">
<?php include_once("analyticstracking.php") ?>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
  
<!--    
    <div class="navbar-header">
      
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>

      </button>
-->
<!--
	  <ul class="nav navbar-nav navbar-right padding-none visible-xs visible-sm w50 pull-right">
-->


<!--
      </ul>
-->
    <!--<a href="/"><span class="navbar-brand-logo icon-Zmyhome-svg2">
				<span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span>
				</span>
    </a>-->
   <div class="zlogo img-responsive"><a href="/"><img src="/img/zmyhome-web-logo.png"></a></div>
    
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
		<li>
			<div id="fb-root-2"></div>
			<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.5";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>
			<div class="fb-share-button pull-right" style="width:20em;height:2em;" data-href="<?=current_url();?>" data-layout="button"></div>
		</li>
	  </ul>


   
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
 
</nav>
<!-- under nav -->	
  <div class="container-fluid lunderNav display-none">
</div><!-- end under nav-->
