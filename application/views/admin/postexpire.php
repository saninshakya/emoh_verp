<?php

?>
<br>
<div align="center">
	<b>ค้นหา Post ตาม POID</b>
</div>
<?php
	echo form_open('/admin/postexpire/0/0');
?>
<div align="center">
	POID: <input tyext="txt" size="20" value="null" name="POID">
</div>
<div align="center">
	<input type="submit" value="ค้นหา">
</div>
</form>
<?php
	if ($GetPOID!="null"){
		$row=$GetPOID->row();
		$i=1;
		if ($row->TOAdvertising==1){$Txt="ขาย";};
		if ($row->TOAdvertising==2){$Txt="ดาวน์";};
		if ($row->TOAdvertising==5){$Txt="เช่า";};
?>
<br>
<table align="center" border="1">
	<tr>
		<td align="center">&nbsp;ลำดับที่&nbsp;</td>
		<td align="center">&nbsp;วันที่หมดอายุ&nbsp;</td>
		<td align="center">&nbsp;POST ID&nbsp;</td>
		<td align="center">&nbsp;ประเภทประกาศ&nbsp;</td>
		<td align="center">&nbsp;ชื่อโครงการ&nbsp;</td>
		<td align="center">&nbsp;ตึก&nbsp;</td>
		<td align="center">&nbsp;Unit&nbsp;</td>
		<td align="center">&nbsp;ชั้น&nbsp;</td>
		<td align="center">&nbsp;เจ้าของ&nbsp;</td>
		<td align="center">&nbsp;email&nbsp;</td>
		<td align="center">&nbsp;เบอร์โทร&nbsp;</td>
		<td align="center">&nbsp;เบอร์โทรสำรอง&nbsp;</td>
		<td align="center">&nbsp;Line ID&nbsp;</td>
		<td align="center">&nbsp;Notes&nbsp;</td>
		<td align="center" colspan="5">&nbsp;จัดการ&nbsp;</td>
	</tr>
	<tr>
		<td align="center">&nbsp;<?=$i;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->DateExpire;?>&nbsp;</td>
		<td align="center">&nbsp;<a href="/zhome/unitDetail2/<?=$row->POID;?>" target="new"><?=$row->POID;?></a>&nbsp;</td>
		<td align="center">&nbsp;<?=$Txt;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->ProjectName;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Tower;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->RoomNumber;?>&nbsp;<?=$row->Address;?></td>
		<td align="center">&nbsp;<?=$row->Floor;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->OwnerName;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Email1;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Telephone1;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Telephone2;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->LineID;?>&nbsp;</td>
		<td align="center" style="padding: 2px;"><textarea name="msg3[<?=$i;?>]" cols="20" rows="2" onchange="updateNote('<?=$row->POID?>',$(this).val());"><?=$this->dashboard->checkMsg3($row->POID);?></textarea></td>
		<td align="center">&nbsp;<a href="/admin/renewpost/<?=$row->POID;?>">ต่ออายุ 45วัน</a>&nbsp;</td>
		<td align="center">&nbsp;<a href="/admin/renewpost2/<?=$row->POID;?>">ต่ออายุ 90วัน</a>&nbsp;</td>
		<td align="center">&nbsp;<a href="/admin/rentpost/<?=$row->POID;?>/<?=$row->TOAdvertising;?>">ขาย/เช่าได้แล้ว</a>&nbsp;</td>
		<td align="center">&nbsp;<a href="/admin/hidepost/<?=$row->POID;?>">ซ่อนข้อมูล</a>&nbsp;</td>
		<td align="center">&nbsp;<a href="/admin/cancelpost/<?=$row->POID;?>">ยกเลิกข้อมูล</a>&nbsp;</td>
	</tr>
</table>
<?php
	}
?>

<br>
<div align="center">
<a href="/admin/postexpire/0/0">ทั้งหมด</a>&nbsp;
<a href="/admin/postexpire/1/0">หมดอายุไม่เกิน 7วัน</a>&nbsp;
<a href="/admin/postexpire/2/0">หมดอายุไม่เกิน 30วัน</a>&nbsp;
</div>
<br>
<div align="center"><h1><b><?=$reportTypeHeader;?></b></h1></div>
<br>
<font color="blue">
<table align="center" border="1">
	<tr>
		<td align="center">&nbsp;ลำดับที่&nbsp;</td>
		<td align="center">&nbsp;วันที่หมดอายุ&nbsp;</td>
		<td align="center">&nbsp;POST ID&nbsp;</td>
		<td align="center">&nbsp;ประเภทประกาศ&nbsp;</td>
		<td align="center">&nbsp;ชื่อโครงการ&nbsp;</td>
		<td align="center">&nbsp;ตึก&nbsp;</td>
		<td align="center">&nbsp;Unit&nbsp;</td>
		<td align="center">&nbsp;ชั้น&nbsp;</td>
		<td align="center">&nbsp;เจ้าของ&nbsp;</td>
		<td align="center">&nbsp;email&nbsp;</td>
		<td align="center">&nbsp;เบอร์โทร&nbsp;</td>
		<td align="center">&nbsp;เบอร์โทรสำรอง&nbsp;</td>
		<td align="center">&nbsp;Line ID&nbsp;</td>
		<td align="center">&nbsp;Notes&nbsp;</td>
		<td align="center" colspan="5">&nbsp;จัดการ&nbsp;</td>
	</tr>
<?php
		$i=0;
		foreach ($report->result() as $row){
			$i++;
			if ($row->TOAdvertising==1){$Txt="ขาย";};
			if ($row->TOAdvertising==2){$Txt="ดาวน์";};
			if ($row->TOAdvertising==5){$Txt="เช่า";};
?>
	<tr>
		<td align="center">&nbsp;<?=$i;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->DateExpire;?>&nbsp;</td>
		<td align="center">&nbsp;<a href="/zhome/unitDetail2/<?=$row->POID;?>" target="new"><?=$row->POID;?></a>&nbsp;</td>
		<td align="center">&nbsp;<?=$Txt;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->ProjectName;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Tower;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->RoomNumber;?>&nbsp;<?=$row->Address;?></td>
		<td align="center">&nbsp;<?=$row->Floor;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->OwnerName;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Email1;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Telephone1;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Telephone2;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->LineID;?>&nbsp;</td>
		<td align="center" style="padding: 2px;"><textarea name="msg3[<?=$i;?>]" cols="20" rows="2" onchange="updateNote('<?=$row->POID?>',$(this).val());"><?=$this->dashboard->checkMsg3($row->POID);?></textarea></td>
		<td align="center">&nbsp;<a href="/admin/renewpost/<?=$row->POID;?>">ต่ออายุ 45วัน</a>&nbsp;</td>
		<td align="center">&nbsp;<a href="/admin/renewpost2/<?=$row->POID;?>">ต่ออายุ 90วัน</a>&nbsp;</td>
		<td align="center">&nbsp;<a href="/admin/rentpost/<?=$row->POID;?>/<?=$row->TOAdvertising;?>">ขาย/เช่าได้แล้ว</a>&nbsp;</td>
		<td align="center">&nbsp;<a href="/admin/hidepost/<?=$row->POID;?>">ซ่อนข้อมูล</a>&nbsp;</td>
		<td align="center">&nbsp;<a href="/admin/cancelpost/<?=$row->POID;?>">ยกเลิกข้อมูล</a>&nbsp;</td>
	</tr>
<?php
		}
?>
</table>
<br>
<br>

<script type="text/javascript">
function updateNote(POID,msg){
	$.post("/zhome/updateNotePostExpire",{ POID: POID,Msg3: msg });
}
</script>
