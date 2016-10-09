<br>
<div align="center">รายชื่อ Project</div>
<font color="blue">
<table align="center" border="1">
	<tr bgcolor="#FFAB34">
		<td align="center">ลำดับที่</td>
		<td align="center">Project</td>
		<td align="center">จำนวน Unit</td>
		<td align="center">ระยะทางจากสถานี</td>
	</tr>
<?
	$col=4;
	$no=1;
	$Station="";
	$SumUnit=0;
	foreach ($listProject->result() as $row){
		if($Station!=$row->KeyID){
			echo "<tr>";
			echo "<td colspan='".$col."' bgcolor='#A5DDE9' style='color:#ff0000;font-weight:bold;'>&nbsp;สถานี :&nbsp;".$row->KeyName."</td>";
			echo "</tr>";
			$Station=$row->KeyID;
			$no=1;
		}
		$SumUnit+=$row->CondoUnit;
?>
		<tr onmouseover="this.style.backgroundColor='#ffff80';" onmouseout="this.style.backgroundColor='';">
			<td align="center"><?=$no;?></td>
			<td align="left">&nbsp;<?=$row->PName_th;?></td>
			<td align="right">&nbsp;<?=$row->CondoUnit;?></td>
			<td align="right">&nbsp;<?=$row->Distance;?></td>
		</tr>
<?php
	 $no++;
	}
?>
	<tr bgcolor="#A5DDE9">
		<td align="right" colspan="2" style="font-weight:bold;">รวม&nbsp;</td>
		<td align="right" style="font-weight:bold;"><?=$SumUnit;?></td>
		<td>&nbsp;</td>
	</tr>
</table>
</font>
<br>