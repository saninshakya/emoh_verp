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
<meta property="og:image" content="<?=$imageOG;?>" />
<meta property="og:title" content="<?=$title;?>" />
<meta property="og:description" content="<?=$description;?>" />
<meta property="og:locale" content="th_TH" />
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
<?php
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
?>

<?php
	if (isset($map)){
	echo $map['js']; 
	}
?>

</head>
<body class="imgBG">
<?php include_once("analyticstracking.php") ?>
<p id="demo" class="padding-none"></p>
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
        <li class="pull-right">&nbsp;</li>
        <li class="btn-p2 pull-right margin-l12"><a href="/zhome/post1/newpost" class="btn-p2 btn-prakard">ลงประกาศ</a></li>
        <li class="pull-right padding-bottom2"><a href="/zhome/dashboard" class="imgthumb"><img src="<?php echo $image;?>" class="img-circle navbar-brand-img" alt="Profile Picture"><div class="margin-t4 text-white pull-left"><?=$CNumber;?></div></a></li>
        
      </ul>
    <!--<a href="/"><span class="navbar-brand-logo icon-Zmyhome-svg2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span></span></a>-->
    <div class="zlogo pull-left" style="padding-left:5px;"><a href="/"><img src="http://static.zmyhome.com/img/zmyhome-web-logo.png" alt="ZmyHome" class="img-responsive"></a></div>
    <?php
		$q=$this->usermenu->tmenuMap();
	
		foreach($q->result() as $row){
		$prefix="MName_".$this->session->userdata('lang');
		if ($row->Folder==0&&$row->Sub_MID==0){
	?>
		
		<span class="navbar-brand-menu"><a href="<?php echo $row->Link;?>"><?php echo $row->$prefix;?></a></span>
	<?php
        }
		};
	?>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      
      <ul class="nav navbar-nav navbar-right">
        <li class="hidden-xs hidden-sm"><a href="/zhome/dashboard" class="imgthumb hidden-xs hidden-sm"><img src="<?php echo $image;?>" class="img-circle navbar-brand-img" alt="Dashboard"> <div class="margin-t4 text-white pull-left"><?=$CNumber;?></div></a></li>
        <li><a class="text-white" href="/zhome/dashboard"><?echo $firstname;?></a></li>

<?php
	$query=$this->usermenu->tmenu();
    foreach($query->result() as $row){
		$prefix="MName_".$this->session->userdata('lang');
		if ($row->Folder==0&&$row->Sub_MID==0){
?>
		<?php if($row->MID==8000){ ?>
			
		<li class="btn-p2 pull-right hidden-xs hidden-sm"><a style="padding:0" href="<?php echo $row->Link;?>" class="btn-prakard"><?php echo $row->$prefix;?></a></li>
		<li class="pull-right padding-none padding-r15m hidden-xs hidden-sm"><a class="text-white padding-none" href="/Zhome/searchResult/0/BTS-อนุสาวรีย์ชัย/0/0/3000/1-2-/1-/0/0/0/1-0-/0">ค้นหาคอนโด</a></li>
		
		
		<li class="padding-none"> <a class="text-white padding20m5" href="http://blog.zmyhome.com" target="_blank">Blog</a></li>
		<li class="padding-none"><a class="padding20m6" href="http://line.me/ti/p/%40zmyhome" target="_blank"><img src="/img/line-contact.png" alt="Line Contact"></a></li>	
		<li class="padding-none visible-sm visible-xs"><a class="text-white padding20m2" href="/Zhome/searchResult/0/BTS-อนุสาวรีย์ชัย/0/0/3000/1-2-/1-/0/0/0/1-0-/0">ค้นหาคอนโด</a></li>
		<?php }else{ ?>
		<li class="padding-none"><a class="padding-none text-white padding10m" href="<?php echo $row->Link;?>"><?php echo $row->$prefix;?></a></li>
		<?php } ?>
<?php
        }

		if ($row->Folder==1&&$row->Sub_MID==0){
?>
       
		<li class="dropdown">
          <a href="<?php echo $row->Link;?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $row->$prefix;?><span class="caret"></span></a>
          <ul class="dropdown-menu">
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
		<!--<li class="padding-none"><a class="" style="padding:12px 28px 13px 13px;" href="http://line.me/ti/p/%40zmyhome" target="_blank"><img src="http://static.zmyhome.com/img/line-contact.png" alt="Line Contact"></a></li>-->
	</ul>
    
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
  
</nav>
<div class="margin-t50 padding-0 height-0"></div>
<!-- under nav -->
		<?php 
			if ($this->session->userdata('token')!=""){
		?>
  <div class="container-fluid lunderNav">
    <ul class="list-inline">
    	<li><a href="/zhome/post1" class="text-white"><span id="showProjectName"><?echo $this->post->checkPost('Address');?> <?echo $this->post->checkPost('ProjectName');?></span></a></li>
        <li><a href="/zhome/dashboard" class="text-white">รายการประกาศของคุณ</a></li>

        <li class="pull-right">
			<a href="/zhome/unitDetailOwner" class="text-white" target="_blank">
				ดูตัวอย่าง
			</a>
		</li>
    </ul>
</div>
	<?php
		}
	?>

<!-- end under nav-->
