<?php
	$query=$this->backend->listPost(1,5,0)
?>
<br>
<br>
<div align="Center">รายการรอการตรวจสอบ <b>ประเภทเช่า คอนโด</b></div>
<br>
<table border="1" align="center">
	<tr>
		<td align="center">&nbsp;ลำดับที่&nbsp;</td>
		<td align="center">&nbsp;POID&nbsp;</td>
		<td align="center">&nbsp;วันที่ทำรายการล่าสุด&nbsp;</td>
		<td align="center">&nbsp;วันที่ลงประกาศ&nbsp;</td>
		<td align="center">&nbsp;โครงการ&nbsp;</td>
		<td align="center">&nbsp;ชื่อเจ้าของ&nbsp;</td>
		<td align="center">&nbsp;เบอร์โทร&nbsp;</td>
		<td align="center">&nbsp;เบอร์โทร(สำรอง)&nbsp;</td>
		<td align="center">&nbsp;LineID&nbsp;</td>
		<td align="center">&nbsp;email&nbsp;</td>
		<td align="center">&nbsp;ตึก&nbsp;</td>
		<td align="center">&nbsp;เลขที่&nbsp;</td>
		<td align="center">&nbsp;ชั้น&nbsp;</td>
		<td align="center">&nbsp;ราคาเช่า&nbsp;</td>
		<td align="center">&nbsp;Step 1&nbsp;</td>
		<td align="center">&nbsp;Step 2&nbsp;</td>
		<td align="center">&nbsp;Step 3&nbsp;</td>
		<td align="center">&nbsp;Step 4&nbsp;</td>
		<td align="center">&nbsp;Step 5&nbsp;</td>
		<td align="center">&nbsp;แจ้งเตือนสาเหตุ&nbsp;</td>
		<td align="center">&nbsp;Notes&nbsp;</td>
		<td align="center">&nbsp;ตรวจสอบ&nbsp;</td>
		<td align="center">&nbsp;แก้ไข&nbsp;</td>
		<td align="center">&nbsp;ลบ&nbsp;</td>
	</tr>
<?php
	$i=1;
	foreach ($query->result() as $row){

?>
	<tr class="<?if($row->StatusUpdate==1){echo "text-green";}?>">
		<td align="center">&nbsp;<?=$i;?>&nbsp;<?=$this->backend->duplicateRoom($row->PID,$row->Address,"null",5);?></td>
		<td align="center">&nbsp;<?=$row->POID;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->DateUpdate;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->DateCreate;?>&nbsp;</td>
		<td align="left">
			<?php
				if (($row->PID==null) or ($row->PID==0)){
			?>
			<font color="red"><b>
			<?};?>
			&nbsp;<?=$row->ProjectName;?>&nbsp;
			<?php
				if (($row->PID==null) or ($row->PID==0)){
			?>
			</b></font>
			<?};?>
		</td>
		<td align="left">&nbsp;<?=$row->OwnerName;?>&nbsp;</td>
		<td align="right">&nbsp;<?=$row->Telephone1;?>&nbsp;</td>
		<td align="right">&nbsp;<?=$row->Telephone2;?>&nbsp;</td>
		<td align="left">&nbsp;<?=$row->LineID;?>&nbsp;</td>
		<td align="left">&nbsp;<?=$row->Email1;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Tower;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Address;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Floor;?>&nbsp;</td>
		<td align="right">&nbsp;<?=number_format($row->PRentPrice, 0,'',',');?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Step1;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Step2;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Step3;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Step4;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Step5;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$this->dashboard->checkMsg($row->POID);?>&nbsp;</td>
		<td align="center">&nbsp;<?=$this->dashboard->checkMsg2($row->POID);?>&nbsp;</td>
		<td align="center">&nbsp;<a href="/zhome/adminViewUnitDetail/<?=$row->POID;?>">ตรวจสอบ</a>&nbsp;</td>
		<td align="center">&nbsp;<a href="/admin/adminEditUnitDetail/<?=$row->Token;?>" target="MyWindow">แก้ไข</a>&nbsp;</td>
		<td align="center">&nbsp;<a href="/zhome/adminDelUnit/<?=$row->POID;?>/5" onclick="return confirm('แน่ใจลบประกาศ?')">ลบ</a>&nbsp;</td>
	</tr>
<?php
	 $i++;
	}
?>
</table>
<?php
	$query=$this->backend->listPost(1,5,3)
?>
<br>
<br>
<div align="Center">รายการแจ้งให้แก้ไข <b>ประเภทเช่า คอนโด</b></div>
<br>
<table border="1" align="center">
	<tr>
		<td align="center">&nbsp;ลำดับที่&nbsp;</td>
		<td align="center">&nbsp;POID&nbsp;</td>
		<td align="center">&nbsp;วันที่ทำรายการล่าสุด&nbsp;</td>
		<td align="center">&nbsp;วันที่ลงประกาศ&nbsp;</td>
		<td align="center">&nbsp;โครงการ&nbsp;</td>
		<td align="center">&nbsp;ชื่อเจ้าของ&nbsp;</td>
		<td align="center">&nbsp;เบอร์โทร&nbsp;</td>
		<td align="center">&nbsp;เบอร์โทร(สำรอง)&nbsp;</td>
		<td align="center">&nbsp;email&nbsp;</td>
		<td align="center">&nbsp;ตึก&nbsp;</td>
		<td align="center">&nbsp;เลขที่&nbsp;</td>
		<td align="center">&nbsp;ชั้น&nbsp;</td>
		<td align="center">&nbsp;ราคาเช่า&nbsp;</td>
		<td align="center">&nbsp;Step 1&nbsp;</td>
		<td align="center">&nbsp;Step 2&nbsp;</td>
		<td align="center">&nbsp;Step 3&nbsp;</td>
		<td align="center">&nbsp;Step 4&nbsp;</td>
		<td align="center">&nbsp;Step 5&nbsp;</td>
		<td align="center">&nbsp;สาเหตุ&nbsp;</td>
		<td align="center">&nbsp;Notes&nbsp;</td>
		<td align="center">&nbsp;ตรวจสอบ&nbsp;</td>
		<td align="center">&nbsp;แก้ไข&nbsp;</td>
		<td align="center">&nbsp;ลบ&nbsp;</td>
	</tr>
<?php
	$i=1;
	foreach ($query->result() as $row){

?>
	<tr class="<?if($row->StatusUpdate==1){echo "text-green";}?>">
		<td align="center">&nbsp;<?=$i;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->POID;?>&nbsp;</td>	
		<td align="center">&nbsp;<?=$row->DateUpdate;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->DateCreate;?>&nbsp;</td>
		<td align="left">
			<?php
				if (($row->PID==null) or ($row->PID==0)){
			?>
			<font color="red"><b>
			<?};?>
			&nbsp;<?=$row->ProjectName;?>&nbsp;
			<?php
				if (($row->PID==null) or ($row->PID==0)){
			?>
			</b></font>
			<?};?>
		</td>
		<td align="left">&nbsp;<?=$row->OwnerName;?>&nbsp;</td>
		<td align="right">&nbsp;<?=$row->Telephone1;?>&nbsp;</td>
		<td align="right">&nbsp;<?=$row->Telephone2;?>&nbsp;</td>
		<td align="left">&nbsp;<?=$row->Email1;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Tower;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Address;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Floor;?>&nbsp;</td>
		<td align="right">&nbsp;<?=number_format($row->PRentPrice, 0,'',',');?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Step1;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Step2;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Step3;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Step4;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Step5;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$this->dashboard->checkMsg($row->POID);?>&nbsp;</td>
		<td align="center">&nbsp;<?=$this->dashboard->checkMsg2($row->POID);?>&nbsp;</td>
		<td align="center">&nbsp;<a href="/zhome/adminViewUnitDetail/<?=$row->POID;?>">ตรวจสอบ</a>&nbsp;</td>
		<td align="center">&nbsp;<a href="/admin/adminEditUnitDetail/<?=$row->Token;?>" target="MyWindow">แก้ไข</a>&nbsp;</td>
		<td align="center">&nbsp;<a href="/zhome/adminDelUnit/<?=$row->POID;?>/5" onclick="return confirm('แน่ใจลบประกาศ?')">ลบ</a>&nbsp;</td>
	</tr>
<?php
	 $i++;
	}
?>
</table>
