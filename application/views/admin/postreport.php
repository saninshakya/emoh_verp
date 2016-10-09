<?php

?>
<div align="center">
<a href="/admin/postreport/0/0">ทั้งหมด</a>&nbsp;
<a href="/admin/postreport/1/0">ขาย</a>&nbsp;
<a href="/admin/postreport/2/0">ขายดาวน์</a>&nbsp;
<a href="/admin/postreport/5/0">เช่า</a>&nbsp;
</div>
<br>
<?php
	if ($reportType==0){
?>
<div align="center">สุรปการลงประกาศในระบบ</div>
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
<font color="blue">
<table align="center" border="1">
	<tr>
		<td align="center">&nbsp;วันที่&nbsp;</td>
		<td align="center">&nbsp;Post ทั้งหมด&nbsp;</td>
		<td align="center">&nbsp;Post Active&nbsp;</td>
		<td align="center">&nbsp;Post หมดอายุ&nbsp;</td>
		<td align="center">&nbsp;Post ที่ซ่อน&nbsp;</td>
		<td align="center">&nbsp;Post ที่ Block&nbsp;</td>
		<td align="center">&nbsp;Post ที่ถูกลบ&nbsp;</td>
		<td align="center">&nbsp;Post ใหม่วันนี้&nbsp;</td>
		<td align="center">&nbsp;Approve วันนี้&nbsp;</td>
		<td align="center">&nbsp;Block วันนี้&nbsp;</td>
		<td align="center">&nbsp;ลบ วันนี้&nbsp;</td>
		<td align="center">&nbsp;ประกาศหมดอายุวันนี้&nbsp;</td>
		<td align="center">&nbsp;ReApprove&nbsp;</td>
	</tr>
<?php
	foreach ($report->result() as $row){
?>
<?php
	if ($reportType==0){
?>
	<tr>
		<td align="center">&nbsp;<?=$row->GenDate;?>&nbsp;</td>
		<td align="right"><?=$row->AllPost;?>&nbsp;</td>
		<td align="right"><?=$row->ActivePost;?>&nbsp;</td>
		<td align="right"><?=$row->ExpirePost;?>&nbsp;</td>
		<td align="right"><?=$row->HiddenPost;?>&nbsp;</td>
		<td align="right"><?=$row->BlockPost;?>&nbsp;</td>
		<td align="right"><?=$row->DelPost;?>&nbsp;</td>
		<td align="right"><a href="/admin/postreport/<?=$reportType;?>/1/<?=$row->GenDate;?>"><?=$row->NewPost;?></a>&nbsp;</td>
		<td align="right"><a href="/admin/postreport/<?=$reportType;?>/2/<?=$row->GenDate;?>"><?=$row->ThisDayApprove;?></a>&nbsp;</td>
		<td align="right"><a href="/admin/postreport/<?=$reportType;?>/3/<?=$row->GenDate;?>"><?=$row->ThisDayBlock;?></a>&nbsp;</td>
		<td align="right"><a href="/admin/postreport/<?=$reportType;?>/4/<?=$row->GenDate;?>"><?=$row->ThisDayDel;?>&nbsp;</td>
		<td align="right"><?=$row->ThisDayExpire;?>&nbsp;</td>
		<td align="right"><?=$row->ThisDayReApprove;?>&nbsp;</td>
	</tr>
<?php
	}
?>
<?php
	if ($reportType==1){
?>
	<tr>
		<td align="center">&nbsp;<?=$row->GenDate;?>&nbsp;</td>
		<td align="right"><?=$row->Type1AllPost;?>&nbsp;</td>
		<td align="right"><?=$row->Type1ActivePost;?>&nbsp;</td>
		<td align="right"><?=$row->Type1ExpirePost;?>&nbsp;</td>
		<td align="right"><?=$row->Type1HiddenPost;?>&nbsp;</td>
		<td align="right"><?=$row->Type1BlockPost;?>&nbsp;</td>
		<td align="right"><?=$row->Type1DelPost;?>&nbsp;</td>
		<td align="right"><a href="/admin/postreport/<?=$reportType;?>/1/<?=$row->GenDate;?>"><?=$row->Type1NewPost;?></a>&nbsp;</td>
		<td align="right"><a href="/admin/postreport/<?=$reportType;?>/2/<?=$row->GenDate;?>"><?=$row->Type1ThisDayApprove;?></a>&nbsp;</td>
		<td align="right"><a href="/admin/postreport/<?=$reportType;?>/3/<?=$row->GenDate;?>"><?=$row->Type1ThisDayBlock;?></a>&nbsp;</td>
		<td align="right"><a href="/admin/postreport/<?=$reportType;?>/4/<?=$row->GenDate;?>"><?=$row->Type1ThisDayDel;?>&nbsp;</td>
		<td align="right"><?=$row->Type1ThisDayExpire;?>&nbsp;</td>
		<td align="right"><?=$row->Type1ThisDayReApprove;?>&nbsp;</td>
	</tr>
<?php
	}
?>
<?php
	if ($reportType==2){
?>
	<tr>
		<td align="center">&nbsp;<?=$row->GenDate;?>&nbsp;</td>
		<td align="right"><?=$row->Type2AllPost;?>&nbsp;</td>
		<td align="right"><?=$row->Type2ActivePost;?>&nbsp;</td>
		<td align="right"><?=$row->Type2ExpirePost;?>&nbsp;</td>
		<td align="right"><?=$row->Type2HiddenPost;?>&nbsp;</td>
		<td align="right"><?=$row->Type2BlockPost;?>&nbsp;</td>
		<td align="right"><?=$row->Type2DelPost;?>&nbsp;</td>
		<td align="right"><a href="/admin/postreport/<?=$reportType;?>/1/<?=$row->GenDate;?>"><?=$row->Type2NewPost;?></a>&nbsp;</td>
		<td align="right"><a href="/admin/postreport/<?=$reportType;?>/2/<?=$row->GenDate;?>"><?=$row->Type2ThisDayApprove;?></a>&nbsp;</td>
		<td align="right"><a href="/admin/postreport/<?=$reportType;?>/3/<?=$row->GenDate;?>"><?=$row->Type2ThisDayBlock;?></a>&nbsp;</td>
		<td align="right"><a href="/admin/postreport/<?=$reportType;?>/4/<?=$row->GenDate;?>"><?=$row->Type2ThisDayDel;?>&nbsp;</td>
		<td align="right"><?=$row->Type2ThisDayExpire;?>&nbsp;</td>
		<td align="right"><?=$row->Type2ThisDayReApprove;?>&nbsp;</td>
	</tr>
<?php
	}
?>
<?php
	if ($reportType==5){
?>
	<tr>
		<td align="center">&nbsp;<?=$row->GenDate;?>&nbsp;</td>
		<td align="right"><?=$row->Type5AllPost;?>&nbsp;</td>
		<td align="right"><?=$row->Type5ActivePost;?>&nbsp;</td>
		<td align="right"><?=$row->Type5ExpirePost;?>&nbsp;</td>
		<td align="right"><?=$row->Type5HiddenPost;?>&nbsp;</td>
		<td align="right"><?=$row->Type5BlockPost;?>&nbsp;</td>
		<td align="right"><?=$row->Type5DelPost;?>&nbsp;</td>
		<td align="right"><a href="/admin/postreport/<?=$reportType;?>/1/<?=$row->GenDate;?>"><?=$row->Type5NewPost;?></a>&nbsp;</td>
		<td align="right"><a href="/admin/postreport/<?=$reportType;?>/2/<?=$row->GenDate;?>"><?=$row->Type5ThisDayApprove;?></a>&nbsp;</td>
		<td align="right"><a href="/admin/postreport/<?=$reportType;?>/3/<?=$row->GenDate;?>"><?=$row->Type5ThisDayBlock;?></a>&nbsp;</td>
		<td align="right"><a href="/admin/postreport/<?=$reportType;?>/4/<?=$row->GenDate;?>"><?=$row->Type5ThisDayDel;?>&nbsp;</td>
		<td align="right"><?=$row->Type5ThisDayExpire;?>&nbsp;</td>
		<td align="right"><?=$row->Type5ThisDayReApprove;?>&nbsp;</td>
	</tr>
<?php
	}
?>

<?php
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
		<td align="center">&nbsp;Approve By&nbsp;</td>
		<td align="center">&nbsp;Block By&nbsp;</td>
		<td align="center">&nbsp;Delete By&nbsp;</td>
	</tr>
<?php
		foreach ($reportDetail->result() as $row){
?>
	<tr>
		<td align="center">&nbsp;<?=$row->DateCreate;?>&nbsp;</td>
		<td align="center">&nbsp;<a herf="/zhome/unitDetail2/<?=$row->POID;?>" target="new"><?=$row->POID;?></a>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->ProjectName;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->OwnerName;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->firstname." ".$row->lastname;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Email1;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Telephone1;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->LineID;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Tower;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->RoomNumber;?>&nbsp;<?=$row->Address;?></td>
		<td align="center">&nbsp;<?=$row->Floor;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->ApproveBy;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->BlockBy;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->DelBy;?>&nbsp;</td>
	</tr>
<?php			
		}
?>
</table>
<?php
	}
?>
<br>
<br>
