<br>
<style>
td {padding: 5px;}
</style>
<div align="center">สุรป  User ในระบบ</div>
<font color="blue">
<?php
	$MonthYearShow="";
	$i=1;
	foreach ($report->result() as $row){
		$NewMonthYear=$row->Gmonth;
		$NewMonthYear=$NewMonthYear."/".$row->Gyear;
		if ($NewMonthYear!=$MonthYearShow){
			if ($i!=1){
?>
</table>
<br>
<?php
			}
?>
<div align="center"><h1><?=$NewMonthYear;?></h1></div>
<table align="center" border="1">
	<tr>
		<td align="center">วันที่</td>
		<td align="center">All User</td>
		<td align="center">Facbook Account</td>
		<td align="center">Google Account</td>
		<td align="center">Email Account</td>
		<td align="center">New User</td>
		<td align="center">New Facebook</td>
		<td align="center">New Google</td>
		<td align="center">New Email</td>
		<td align="center">Return Login</td>
		<td align="center">All View Unit</td>
		<td align="center">User View Unit</td>
		<td align="center">Guest View Unit</td>
		<td align="center">User View Tel</td>
	</tr>
<?
		}
?>
	<tr>
		<td align="center"><?=$row->GenDate;?></td>
		<td align="right"><?=$row->AllUser;?></td>
		<td align="right"><?=$row->AllFacebook;?></td>
		<td align="right"><?=$row->AllGoogle;?></td>
		<td align="right"><?=$row->AllOther;?></td>
		<td align="right"><?=$row->NewUser;?></td>
		<td align="right"><?=$row->NewFacebook;?></td>
		<td align="right"><?=$row->NewGoogle;?></td>
		<td align="right"><?=$row->NewOther;?></td>
		<td align="right"><?=$row->ReturnLogin;?></td>
		<td align="right"><?=$row->AllView;?></td>
		<td align="right"><a href="/admin/userreport/2/<?=$row->GenDate;?>"><?=$row->UserView;?></a></td>
		<td align="right"><?=$row->GuestView;?></td>
		<td align="right"><a href="/admin/userreport/1/<?=$row->GenDate;?>"><?=$row->ViewTel;?></a></td>
	</tr>
<?php
		$i++;
		$MonthYearShow=$NewMonthYear;
	}
?>
</table>
</font>
<?php
	if ($ReportSubType==1){
?>
<br>
<div align="center">รายชื่อ  User ที่ดูเบอร์โทร <?=$GenDate;?></div>
<table align="center" border="1">
	<tr>
		<td align="Center">ลำดับที่</td>
		<td align="Center">เลขที่ประกาศ</td>
		<td align="Center">user id</td>
		<td align="Center">email</td>
		<td align="Center">จำนวนครั้งสะสม</td>
		<td align="Center">จำนวนครั้งรวม</td>
	</tr>
<?php
 	$i=1;
	foreach ($UserViewTelephone->result() as $row){
?>
	<tr>
		<td align="Center"><?=$i;?></td>
		<td align="Center"><a href="/zhome/unitDetail2/<?=$row->POID;?>" target="_blank"><?=$row->POID;?></a></td>
		<td align="center"><?=$row->ViewTelByUserID;?></td>
		<td align="left"><?=$myClass->list_email($row->ViewTelByUserID);?></td>
		<td align="right"><?=$this->backend->countviewPost('tel',$row->ViewTelByUserID,$GenDate);?></td>
		<td align="right"><?=$this->backend->countviewPost('tel',$row->ViewTelByUserID,'');?></td>
	</tr>
<?php
		$i++;
	}
?>
</table>
<?php
	};
?>
<?php
	if ($ReportSubType==2){
?>
<br>
<div align="center">รายชื่อ  User ที่ดูประกาศ <?=$GenDate;?></div>
<table align="center" border="1">
	<tr>
		<td align="Center">ลำดับที่</td>
		<td align="Center">เลขที่ประกาศ</td>
		<td align="Center">user id</td>
		<td align="Center">email</td>
		<td align="Center">จำนวนครั้งสะสม</td>
		<td align="Center">จำนวนครั้งรวม</td>
	</tr>
<?php
 	$i=1;
	foreach ($UserView->result() as $row){
?>
	<tr>
		<td align="Center"><?=$i;?></td>
		<td align="Center"><a href="/zhome/unitDetail2/<?=$row->POID;?>" target="_blank"><?=$row->POID;?></a></td>
		<td align="center"><?=$row->ViewByUserID;?></td>
		<td align="left"><?=$myClass->list_email($row->ViewByUserID);?></td>
		<td align="right"><?=$this->backend->countviewPost('unit',$row->ViewTelByUserID,$GenDate);?></td>
		<td align="right"><?=$this->backend->countviewPost('unit',$row->ViewTelByUserID,'');?></td>
	</tr>
<?php
		$i++;
	}
?>
</table>
<?php
	};
?>
<br>
<br>
