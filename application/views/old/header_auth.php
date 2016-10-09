<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<link href="/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css" > 
    <link href="/css/main.css" rel="stylesheet" type="text/css">
    <link href="/css/bootstrap-select.min.css" rel="stylesheet" type="text/css" > 
<title>ZHome | Buy or Rent Your Home by Owner Directly</title>
</head>

<body class="imgBG">

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
    <span class="navbar-brand-logo icon-Zhome_logo"></span>
    
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      
      <ul class="nav navbar-nav navbar-left">
        <li><a href="#" class="imgthumb"><img src="<?php echo $image;?>" class="img-circle navbar-brand-img">&nbsp;</a></li>
        <li><a href="#"><?echo $firstname." ".$lastname;?></a></li>
<?php
	$query=$this->usermenu->tmenu();
    foreach($query->result() as $row){
		$prefix="MName_".$this->session->userdata('lang');
		if ($row->Folder==0&&$row->Sub_MID==0){
?>
		<li><a href="<?php echo $row->Link;?>"><?php echo $row->$prefix;?></a></li>
<?php
        };
		if ($row->Folder==1&&$row->Sub_MID==0){
?>
		<li class="dropdown">
          <a href="<?php echo $row->Link;?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $row->$prefix;?><span class="caret"></span></a>
          <ul class="dropdown-menu">
<?php
		};
		if ($row->Folder==0&&$row->Sub_MID!=0){
			if ($row->MLine==1){
?>
            <li role="separator" class="divider"></li>
<?php
			};
?>
            <li><a href="<?php echo $row->Link;?>"><?php echo $row->$prefix;?></a></li>			
<?php
			if ($row->EndDrop==1){
?>
          </ul>
        </li>
<?php
			};
		};
	};
?>
    </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
  
</nav>
<!-- under nav -->	
  <div class="container-fluid lunderNav">
    <ul class="list-inline">
    	<li><a href="#">สิริแอทสุขุมวิท</a></li>
        <li><a href="#">รายการประกาศของคุณ</a></li>
        <li class="pull-right"><a href="#">ดูตัวอย่าง</a></li>
    </ul>
</div><!-- end under nav-->
