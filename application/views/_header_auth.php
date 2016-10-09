<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<link href="/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css" > 
    <link href="/css/main.css" rel="stylesheet" type="text/css">
    <link href="/css/bootstrap-select.min.css" rel="stylesheet" type="text/css" >
	<link rel="stylesheet" type="text/css" href="/css/jquery.quickselect.css" />
	<link href="/css/custom.css" rel="stylesheet">
	<link type="text/css" media="screen" rel="stylesheet" href="/css/jquery.cropbox.css">
     <link rel="shortcut icon" href="/img/zmyhome.ico" >
     <link rel="icon" href="/img/animated_zmyhome.gif" type="image/gif" >
<title>ZHome | Buy or Rent Your Home by Owner Directly</title>
<?php
	if (isset($HSNumber)){
		$i=1;
		while ($i < $HSNumber){
			echo $HSrc[$i];
			$i++;
		}
	};
?>

<?php
	if (isset($map)){
	echo $map['js']; 
	}
?>

</head>

<body class="imgBG">

<p id="demo"></p>

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
    <a href="/"><span class="navbar-brand-logo icon-ZMYHOME">
				<span class="path1"></span><span class="path2"></span><span class="path3"></span>
				</span></a>
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
        <li><a href="#" class="imgthumb"><img src="<?php echo $image;?>" class="img-circle navbar-brand-img">&nbsp;</a></li>
        <li><a href="/zhome/dashboard"><?echo $firstname;?></a></li>
<?php
	$query=$this->usermenu->tmenu();
    foreach($query->result() as $row){
		$prefix="MName_".$this->session->userdata('lang');
		if ($row->Folder==0&&$row->Sub_MID==0){
?>
		<?php if($row->MID==8000){ ?>
			
		<li class="btn-p"><a href="<?php echo $row->Link;?>" class="btn-prakard"><?php echo $row->$prefix;?></a></li>	
		<?php }else{ ?>
		<li><a href="<?php echo $row->Link;?>"><?php echo $row->$prefix;?></a></li>
		<?php } ?>
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
		<?php 
			if ($this->session->userdata('token')!=""){
		?>
  <div class="container-fluid lunderNav">
    <ul class="list-inline">
    	<li><a href="/zhome/post1"><span id="showProjectName"><?echo $this->post->checkPost('Address');?> <?echo $this->post->checkPost('ProjectName');?></span></a></li>
        <li><a href="/zhome/dashboard">รายการประกาศของคุณ</a></li>

        <li class="pull-right">
			<a href="/zhome/unitDetailOwner" target="_blank">
				ดูตัวอย่าง
			</a>
		</li>
    </ul>
</div>
	<?php
		}
	?>

<!-- end under nav-->
