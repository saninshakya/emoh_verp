<br>
<div align="center">รายชื่อโครงการ</div>
<br>
<font color="blue">
<table align="center" border="1">
	<tr>
		<td align="center">ลำดับที่</td>
		<td align="center">PID</td>
		<td align="center">ชื่อไทย</td>
		<td align="center">ชื่อ English</td>
		<td align="center">Latitude</td>
		<td align="center">Lontitude</td>
		<td align="center">บ้านเลขที่</td>
		<td align="center">ซอย</td>
		<td align="center">ถนน</td>
		<td align="center">แขวง</td>
		<td align="center">เขต</td>
		<td align="center">จังหวัด</td>
		<td align="center">Zip Code</td>
		<td align="center">ปีที่สร้างเสร็จ</td>
		<td align="center">จำนวนยูนิต</td>
		<td align="center">จำนวนที่จอดรถ</td>
		<td align="center">ค่าส่วนกลาง</td>
		<td align="center">จำนวน Unit(ในระบบ)</td>
	</tr>
<?php
	$i=1;
	foreach ($listProject->result() as $row){
?>
	<tr>
		<td align="center"><?=$i;?></td>
		<td align="center"><?=$row->PID;?></td>
		<td align="left">&nbsp;&nbsp;<?=$row->PName_th;?></td>
		<td align="left">&nbsp;&nbsp;<?=$row->PName_en;?></td>
		<td align="right"><?=$row->Lat;?></td>
		<td align="right"><?=$row->Lng;?></td>
		<td align="left">&nbsp;&nbsp;<?=$row->Address;?></td>
		<td align="left">&nbsp;&nbsp;<?=$row->Soi;?></td>
		<td align="left">&nbsp;&nbsp;<?=$row->Road;?></td>
		<td align="left">&nbsp;&nbsp;<?=$row->District;?></td>
		<td align="left">&nbsp;&nbsp;<?=$row->Area;?></td>
		<td align="center">&nbsp;&nbsp;<?=$row->Province;?></td>
		<td align="left">&nbsp;&nbsp;<?=$row->Zipcode;?></td>
		<td align="right">&nbsp;&nbsp;<?=$row->YearEnd;?></td>
		<td align="right">&nbsp;&nbsp;<?=$row->CondoUnit;?></td>
		<td align="right">&nbsp;&nbsp;<?=$row->CarParkUnit;?></td>
		<td align="right">&nbsp;&nbsp;<?=$row->CamFee;?></td>
		<td align="right">&nbsp;&nbsp;<?=$row->unit;?></td>
	</tr>
<?php
		$i++;
	}
?>
</table>
</font>
<br>