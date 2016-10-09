<?php

?>
<br>
<div align="center">
<a href="/admin/newpostreport/0/0">ทั้งหมด</a>&nbsp;
<a href="/admin/newpostreport/1/0">ประเภทขาย</a>&nbsp;
<a href="/admin/newpostreport/2/0">ประเภทขายดาวน์</a>&nbsp;
<a href="/admin/newpostreport/5/0">ประเภทเช่า</a>&nbsp;
</div>
<br>
<?php
	if ($reportType==0){
?>
<div align="center">สุรปการลงประกาศในระบบทั้งหมด</div>
<?		
	}
?>
<?php
	if ($reportType==2){
?>
<div align="center">สุรปการลงประกาศขายดาวน์ในระบบ</div>
<?		
	}
?>
<?php
	if ($reportType==1){
?>
<div align="center">สุรปการลงประกาศขายในระบบ</div>
<?		
	}
?>
<?php
	if ($reportType==5){
?>
<div align="center">สุรปการลงประกาศเช่าในระบบ</div>
<?		
	}
?>


<?php
	$MonthYearShow="";
	$i=1;
	foreach ($report->result() as $row){
	if ($reportType==0){
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
<font color="blue">
<div align="center"><h1><?=$NewMonthYear;?></h1></div>
<table align="center" border="1">
	<tr>
		<td align="center" rowspan="2">&nbsp;วันที่&nbsp;</td>
		<td align="center" rowspan="2">&nbsp;ประกาศทั้งหมด&nbsp;</td>
		<td align="center" rowspan="2">&nbsp;ประกาศที่บล็อกวันนี้&nbsp;</td>
		<td align="center" colspan="10" rowspan="1">&nbsp;ประกาศที่ตรวจสอบ&nbsp;</td>
		<td align="center" colspan="9" rowspan="1">&nbsp;รายการวันนี้&nbsp;</td>
		<td align="center" colspan="6" rowspan="=1">&nbsp;รายการส่งออก email ทั้งหมด&nbsp;</td>
	</tr>
	<tr>
		<td align="center">&nbsp;ทั้งหมด&nbsp;</td>
		<td align="center">&nbsp;ที่แสดง&nbsp;</td>
		<td align="center">&nbsp;หมดอายุ&nbsp;</td>
		<td align="center">&nbsp;ถูกบล็อก&nbsp;</td>
		<td align="center">&nbsp;ขายได้แล้ว&nbsp;</td>
		<td align="center">&nbsp;ให้เช่าแล้ว&nbsp;</td>
		<td align="center">&nbsp;ถูกซ่อน&nbsp;</td>
		<td align="center">&nbsp;ยกเลิก(Admin)&nbsp;</td>
		<td align="center">&nbsp;ยกเลิก (Cust.)&nbsp;</td>
		<td align="center">&nbsp;รอตรวจสอบเนื่องจากถูกแก้ไข&nbsp;</td>
		<td align="center">&nbsp;หมดอายุวันนี้&nbsp;</td>
		<td align="center">&nbsp;ประกาศใหม่&nbsp;</td>
		<td align="center">&nbsp;Approve&nbsp;</td>
		<td align="center">&nbsp;Reapprove&nbsp;</td>
		<td align="center">&nbsp;Block&nbsp;</td>
		<td align="center">&nbsp;ต่ออายุประกาศ&nbsp;</td>
		<td align="center">&nbsp;ขายได้แล้ว&nbsp;</td>
		<td align="center">&nbsp;ให้เช่าแล้ว&nbsp;</td>
		<td align="center">&nbsp;ซ่อนประการ&nbsp;</td>
		<td align="center">&nbsp;อีเมล์ตรวจสอบ&nbsp;</td>
		<td align="center">&nbsp;ดูอีเมล์ตรวจสอบ&nbsp;</td>
		<td align="center">&nbsp;อีเมล์บล็อคประกาศ&nbsp;</td>
		<td align="center">&nbsp;7วันก่อนหมดอายุ&nbsp;</td>
		<td align="center">&nbsp;3วันก่อนหมดอายุ&nbsp;</td>
		<td align="center">&nbsp;3วันหลังหมดอายุ&nbsp;</td>		
	</tr>
<?			
		}
?>	
  	<tr>
		<td align="center">&nbsp;<?=$row->Date;?>&nbsp;</td>
		<td align="center">&nbsp;<a href="/admin/newpostreport/<?=$reportType;?>/7"><?=$row->AllPost;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->BlockPost;?>&nbsp;</td>
		<td align="center">&nbsp;<a href="/admin/newpostreport/<?=$reportType;?>/8"><?=$row->TotalApprove;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->TotalApproveActive;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->TotalApproveExp;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->TotalApproveBlock;?>&nbsp;</td>
		<td align="center">&nbsp;<a href="/admin/newpostreport/<?=$reportType;?>/10/<?=$row->Date;?>"><?=$row->TotalApproveSell;?>&nbsp;</td>
		<td align="center">&nbsp;<a href="/admin/newpostreport/<?=$reportType;?>/11/<?=$row->Date;?>"><?=$row->TotalApproveRent;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->TotalApproveHide;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->TotalApproveCancelAdmin;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->TotalApproveCancelCustomer;?>&nbsp;</td>
		<td align="center">&nbsp;<a href="/admin/newpostreport/<?=$reportType;?>/5"><?=$row->TotalApproveUserEdit;?></a>&nbsp;</td>
		<td align="center">&nbsp;<a href="/admin/newpostreport/<?=$reportType;?>/4/<?=$row->Date;?>"><?=$row->PostExpire;?></a>&nbsp;</td>
		<td align="center">&nbsp;<a href="/admin/newpostreport/<?=$reportType;?>/1/<?=$row->Date;?>"><?=$row->NewPost;?></a>&nbsp;</td>
		<td align="center">&nbsp;<a href="/admin/newpostreport/<?=$reportType;?>/2/<?=$row->Date;?>"><?=$row->NewApprove;?></a>&nbsp;</td>
		<td align="center">&nbsp;<a href="/admin/newpostreport/<?=$reportType;?>/6/<?=$row->Date;?>"><?=$row->ReApprove;?></a>&nbsp;</td>
		<td align="center">&nbsp;<a href="/admin/newpostreport/<?=$reportType;?>/3/<?=$row->Date;?>"><?=$row->ApproveBlockPost;?></a>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->RenewPost;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->SellPost;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->RentPost;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->HidePost;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->EmailApproveSent;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->ViewFromApproveEmail;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->EmailBlockSent;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Email7DayExpSent;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Email3DayExpSent;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->EmailAfter3DayExpSent;?>&nbsp;</td>
	</tr>
<?php
	}
?>
<?php
	if ($reportType==1){
?>
  	<tr>
		<td align="center">&nbsp;<?=$row->Date;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->AllPost;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->BlockPost;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Type1Approve;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Type1ApproveActive;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Type1ApproveExp;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Type1ApproveBlock;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Type1ApproveSell;?>&nbsp;</td>
		<td align="center">&nbsp;0&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Type1ApproveHide;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Type1ApproveCancelAdmin;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Type1ApproveCancelCustomer;?>&nbsp;</td>
		<td align="center">&nbsp;<a href="/admin/newpostreport/<?=$reportType;?>/5"><?=$row->Type1ApproveUserEdit;?></a>&nbsp;</td>
		<td align="center">&nbsp;<a href="/admin/newpostreport/<?=$reportType;?>/4/<?=$row->Date;?>"><?=$row->Type1PostExpire;?></a>&nbsp;</td>
		<td align="center">&nbsp;<a href="/admin/newpostreport/<?=$reportType;?>/1/<?=$row->Date;?>"><?=$row->Type1NewPost;?></a>&nbsp;</td>
		<td align="center">&nbsp;<a href="/admin/newpostreport/<?=$reportType;?>/2/<?=$row->Date;?>"><?=$row->Type1NewApprove;?></a>&nbsp;</td>
		<td align="center">&nbsp;<a href="/admin/newpostreport/<?=$reportType;?>/6/<?=$row->Date;?>"><?=$row->Type1ReApprove;?></a>&nbsp;</td>
		<td align="center">&nbsp;<a href="/admin/newpostreport/<?=$reportType;?>/3/<?=$row->Date;?>"><?=$row->Type1BlockPost;?></a>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Type1RenewPost;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Type1SellPost;?>&nbsp;</td>
		<td align="center">&nbsp;0&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Type1HidePost;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->EmailApproveSent;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->ViewFromApproveEmail;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->EmailBlockSent;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Email7DayExpSent;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Email3DayExpSent;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->EmailAfter3DayExpSent;?>&nbsp;</td>
	</tr>

<?php
	}
?>
<?php
	if ($reportType==2){
?>
  	<tr>
		<td align="center">&nbsp;<?=$row->Date;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->AllPost;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->BlockPost;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Type2Approve;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Type2ApproveActive;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Type2ApproveExp;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Type2ApproveBlock;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Type2ApproveSell;?>&nbsp;</td>
		<td align="center">&nbsp;0&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Type2ApproveHide;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Type2ApproveCancelAdmin;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Type2ApproveCancelCustomer;?>&nbsp;</td>
		<td align="center">&nbsp;<a href="/admin/newpostreport/<?=$reportType;?>/5"><?=$row->Type2ApproveUserEdit;?></a>&nbsp;</td>	
		<td align="center">&nbsp;<a href="/admin/newpostreport/<?=$reportType;?>/4/<?=$row->Date;?>"><?=$row->Type2PostExpire;?></a>&nbsp;</td>
		<td align="center">&nbsp;<a href="/admin/newpostreport/<?=$reportType;?>/1/<?=$row->Date;?>"><?=$row->Type2NewPost;?></a>&nbsp;</td>
		<td align="center">&nbsp;<a href="/admin/newpostreport/<?=$reportType;?>/2/<?=$row->Date;?>"><?=$row->Type2NewApprove;?></a>&nbsp;</td>
		<td align="center">&nbsp;<a href="/admin/newpostreport/<?=$reportType;?>/6/<?=$row->Date;?>"><?=$row->Type2ReApprove;?></a>&nbsp;</td>
		<td align="center">&nbsp;<a href="/admin/newpostreport/<?=$reportType;?>/3/<?=$row->Date;?>"><?=$row->Type2BlockPost;?></a>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Type2RenewPost;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Type2SellPost;?>&nbsp;</td>
		<td align="center">&nbsp;0&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Type2HidePost;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->EmailApproveSent;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->ViewFromApproveEmail;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->EmailBlockSent;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Email7DayExpSent;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Email3DayExpSent;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->EmailAfter3DayExpSent;?>&nbsp;</td>
	</tr>
<?php
	}
?>
<?php
	if ($reportType==5){
?>
  	<tr>
		<td align="center">&nbsp;<?=$row->Date;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->AllPost;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->BlockPost;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Type5Approve;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Type5ApproveActive;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Type5ApproveExp;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Type5ApproveBlock;?>&nbsp;</td>
		<td align="center">&nbsp;0&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Type5ApproveRent;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Type5ApproveHide;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Type5ApproveCancelAdmin;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Type5ApproveCancelCustomer;?>&nbsp;</td>
		<td align="center">&nbsp;<a href="/admin/newpostreport/<?=$reportType;?>/5"><?=$row->Type5ApproveUserEdit;?></a>&nbsp;</td>
		<td align="center">&nbsp;<a href="/admin/newpostreport/<?=$reportType;?>/4/<?=$row->Date;?>"><?=$row->Type5PostExpire;?></a>&nbsp;</td>
		<td align="center">&nbsp;<a href="/admin/newpostreport/<?=$reportType;?>/1/<?=$row->Date;?>"><?=$row->Type5NewPost;?></a>&nbsp;</td>
		<td align="center">&nbsp;<a href="/admin/newpostreport/<?=$reportType;?>/2/<?=$row->Date;?>"><?=$row->Type5NewApprove;?></a>&nbsp;</td>
		<td align="center">&nbsp;<a href="/admin/newpostreport/<?=$reportType;?>/6/<?=$row->Date;?>"><?=$row->Type5ReApprove;?></a>&nbsp;</td>
		<td align="center">&nbsp;<a href="/admin/newpostreport/<?=$reportType;?>/3/<?=$row->Date;?>"><?=$row->Type5BlockPost;?></a>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Type5RenewPost;?>&nbsp;</td>
		<td align="center">&nbsp;0&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Type5RentPost;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Type5HidePost;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->EmailApproveSent;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->ViewFromApproveEmail;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->EmailBlockSent;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Email7DayExpSent;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Email3DayExpSent;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->EmailAfter3DayExpSent;?>&nbsp;</td>
	</tr>
<?php
	}
?>

<?php
		$i++;
		$MonthYearShow=$NewMonthYear;
	}
?>
</table>
</font>
<br>
<br>
<?php
	if ($reportDetailHeader!='NULL'){
?>
<div align="center"><?=$reportDetailHeader;?></div>
<font color="blue">
<table align="center" border="1">
	<tr>
		<td align="center">&nbsp;ลำดับที่&nbsp;</td>
		<td align="center">&nbsp;วันที่&nbsp;</td>
		<td align="center">&nbsp;POST ID&nbsp;</td>
		<td align="center">&nbsp;ชื่อโครงการ&nbsp;</td>
		<td align="center">&nbsp;เจ้าของ&nbsp;</td>
		<td align="center">&nbsp;Username&nbsp;</td>
		<td align="center">&nbsp;email&nbsp;</td>
		<td align="center">&nbsp;เบอร์โทร&nbsp;</td>
		<td align="center">&nbsp;Line ID&nbsp;</td>
		<td align="center">&nbsp;ตึก&nbsp;</td>
		<td align="center">&nbsp;Unit&nbsp;</td>
		<td align="center">&nbsp;ชั้น&nbsp;</td>
		<td align="center">&nbsp;ราคา&nbsp;</td>
		<td align="center">&nbsp;จำนวนวันที่แสดง&nbsp;</td>
		<td align="center">&nbsp;ดูเบอร์โทร&nbsp;</td>
		<td align="center">&nbsp;Approve By&nbsp;</td>
		<td align="center">&nbsp;ตรวจสอบ&nbsp;</td>
	</tr>
<?php
		$i=1;
		foreach ($reportDetail->result() as $row){
?>
	<tr>
		<td align="center">&nbsp;<?=$i;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->DateCreate;?>&nbsp;</td>
		<td align="center">&nbsp;<a href="/zhome/unitDetail2/<?=$row->POID;?>" target="new"><?=$row->POID;?></a>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->ProjectName;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->OwnerName;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->firstname." ".$row->lastname;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Email1;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Telephone1;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->LineID;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Tower;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->RoomNumber;?>&nbsp;<?=$row->Address;?></td>
		<td align="center">&nbsp;<?=$row->Floor;?>&nbsp;</td>
		<?php
			if ($row->TOAdvertising==5){
				$total=$row->PRentPrice;
			} else {
				$total=$row->TotalPrice;
			}
		?>
		<td align="center">&nbsp;<?=number_format($total, 0,'',',');?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->ActiveDay;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$this->search->ContViewList($row->POID);?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->ApproveBy;?>&nbsp;</td>
		<td align="center">&nbsp;<a href="/zhome/adminViewUnitDetail/<?=$row->POID;?>">ตรวจสอบ</a>&nbsp;</td>
	</tr>
<?php
			$i++;			
		}
?>
</table>
<?php
	}
?>
<br>
<br>
<?php
	if ($DetailType=="1" or $DetailType=="2"){
?>
<div align="center">Admin Post</div>
<font color="blue">
<table align="center" border="1">
	<tr>
		<td align="center">&nbsp;ลำดับที่&nbsp;</td>
		<td align="center">&nbsp;วันที่&nbsp;</td>
		<td align="center">&nbsp;POST ID&nbsp;</td>
		<td align="center">&nbsp;ประเภทห้อง&nbsp;</td>
		<td align="center">&nbsp;ชื่อโครงการ&nbsp;</td>
		<td align="center">&nbsp;เจ้าของ&nbsp;</td>
		<td align="center">&nbsp;Username&nbsp;</td>
		<td align="center">&nbsp;email&nbsp;</td>
		<td align="center">&nbsp;เบอร์โทร&nbsp;</td>
		<td align="center">&nbsp;Line ID&nbsp;</td>
		<td align="center">&nbsp;ตึก&nbsp;</td>
		<td align="center">&nbsp;Unit&nbsp;</td>
		<td align="center">&nbsp;ชั้น&nbsp;</td>
		<td align="center">&nbsp;ราคา&nbsp;</td>
		<td align="center">&nbsp;จำนวนวันที่แสดง&nbsp;</td>
		<td align="center">&nbsp;ดูเบอร์โทร&nbsp;</td>
		<td align="center">&nbsp;Approve By&nbsp;</td>
		<td align="center">&nbsp;ตรวจสอบ&nbsp;</td>
	</tr>
<?php
		$i=1;
		foreach ($reportDetailAdminPost->result() as $row){
?>
	<tr>
		<td align="center">&nbsp;<?=$i;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->DateCreate;?>&nbsp;</td>
		<td align="center">&nbsp;<a href="/zhome/unitDetail2/<?=$row->POID;?>" target="new"><?=$row->POID;?></a>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->AName_th;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->ProjectName;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->OwnerName;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->firstname." ".$row->lastname;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Email1;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Telephone1;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->LineID;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Tower;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->RoomNumber;?>&nbsp;<?=$row->Address;?></td>
		<td align="center">&nbsp;<?=$row->Floor;?>&nbsp;</td>
		<?php
			if ($row->TOAdvertising==5){
				$total=$row->PRentPrice;
			} else {
				$total=$row->TotalPrice;
			}
		?>
		<td align="center">&nbsp;<?=number_format($total, 0,'',',');?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->ActiveDay;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$this->search->ContViewList($row->POID);?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->ApproveBy;?>&nbsp;</td>
		<td align="center">&nbsp;<a href="/zhome/adminViewUnitDetail/<?=$row->POID;?>">ตรวจสอบ</a>&nbsp;</td>
	</tr>
<?php
			$i++;			
		}
?>
</table>
<?php
	}
?>
<br>
<br>
<?php
	if ($DetailType=="1" or $DetailType=="2"){
?>
<div align="center">Customer Post</div>
<font color="blue">
<table align="center" border="1">
	<tr>
		<td align="center">&nbsp;ลำดับที่&nbsp;</td>
		<td align="center">&nbsp;วันที่&nbsp;</td>
		<td align="center">&nbsp;POST ID&nbsp;</td>
		<td align="center">&nbsp;ประเภทห้อง&nbsp;</td>
		<td align="center">&nbsp;ชื่อโครงการ&nbsp;</td>
		<td align="center">&nbsp;เจ้าของ&nbsp;</td>
		<td align="center">&nbsp;Username&nbsp;</td>
		<td align="center">&nbsp;email&nbsp;</td>
		<td align="center">&nbsp;เบอร์โทร&nbsp;</td>
		<td align="center">&nbsp;Line ID&nbsp;</td>
		<td align="center">&nbsp;ตึก&nbsp;</td>
		<td align="center">&nbsp;Unit&nbsp;</td>
		<td align="center">&nbsp;ชั้น&nbsp;</td>
		<td align="center">&nbsp;ราคา&nbsp;</td>
		<td align="center">&nbsp;จำนวนวันที่แสดง&nbsp;</td>
		<td align="center">&nbsp;ดูเบอร์โทร&nbsp;</td>
		<td align="center">&nbsp;Approve By&nbsp;</td>
		<td align="center">&nbsp;ตรวจสอบ&nbsp;</td>
	</tr>
<?php
		$i=1;
		foreach ($reportDetailNotAdminPost->result() as $row){
?>
	<tr>
		<td align="center">&nbsp;<?=$i;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->DateCreate;?>&nbsp;</td>
		<td align="center">&nbsp;<a href="/zhome/unitDetail2/<?=$row->POID;?>" target="new"><?=$row->POID;?></a>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->AName_th;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->ProjectName;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->OwnerName;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->firstname." ".$row->lastname;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Email1;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Telephone1;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->LineID;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Tower;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->RoomNumber;?>&nbsp;<?=$row->Address;?></td>
		<td align="center">&nbsp;<?=$row->Floor;?>&nbsp;</td>
		<?php
			if ($row->TOAdvertising==5){
				$total=$row->PRentPrice;
			} else {
				$total=$row->TotalPrice;
			}
		?>
		<td align="center">&nbsp;<?=number_format($total, 0,'',',');?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->ActiveDay;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$this->search->ContViewList($row->POID);?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->ApproveBy;?>&nbsp;</td>
		<td align="center">&nbsp;<a href="/zhome/adminViewUnitDetail/<?=$row->POID;?>">ตรวจสอบ</a>&nbsp;</td>
	</tr>
<?php
			$i++;			
		}
?>
</table>
<?php
	}
?>
<br>
<br>