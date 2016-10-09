<div align="center">รายชื่อสถานี</div>
<font color="blue">
<?php
	$col=6;
	$rowStation=1;
	$Station="";
	foreach ($listStation->result() as $row){
		$SID[$rowStation]=$row->KeyID;
		$SName[$SID[$rowStation]]=$row->KeyName;
		$SType[$SID[$rowStation]]=$row->Type;
		$SLineName[$SID[$rowStation]]=$row->LineName;
		$SStatus[$SID[$rowStation]]=$row->Status;
		if($row->YearGroup==1){
			$UnitNow[$SID[$rowStation]]=$row->Unit;
		}else{
			$UnitFuture[$SID[$rowStation]]=$row->Unit;
		}
		if($Station<>$row->KeyID){
			$rowStation++;
			$Station=$row->KeyID;
		}
		//echo $row->KeyID."::".$row->KeyName."xx<br>";
	}
?>
<table align="center" border="1">
	<tr bgcolor="#FFAB34">
		<td align="center">ลำดับที่</td>
		<td align="center">สถานี</td>
		<td align="center">สาย</td>
		<td align="center">สถานะ</td>
		<td align="center">Now(Unit)</td>
		<td align="center">Future(Unit)</td>
	</tr>
<?
	$no=1;
	$Type="";
	for($i=1;$i<$rowStation;$i++){
		if($SStatus[$SID[$i]]==1){
			$SStatus_txt[$SID[$i]]="เปิดใช้งานแล้ว";
		}else{
			$SStatus_txt[$SID[$i]]="ยังไม่เปิดใช้งาน";
		}
		if($Type!=$SType[$SID[$i]]){
			echo "<tr>";
			echo "<td colspan='".$col."' bgcolor='#A5DDE9' style='color:#ff0000;font-weight:bold;'>&nbsp;ประเภทสถานี :&nbsp;".$SType[$SID[$i]]."</td>";
			echo "</tr>";
			$Type=$SType[$SID[$i]];
			$no=1;
		}

?>
		<tr onmouseover="this.style.backgroundColor='#ffff80';" onmouseout="this.style.backgroundColor='';">
			<td align="center"><?=$no;?></td>
			<td align="left">&nbsp;<?=$SName[$SID[$i]];?></td>
			<td align="left">&nbsp;<?=$SLineName[$SID[$i]];?></td>
			<td align="left">&nbsp;<?=$SStatus_txt[$SID[$i]];?></td>
			<td align="right"><a href="/zhome/listStationProject/<?=$SID[$i];?>/<?=$Distance;?>/1" target="MyWindow" style="color:#0000E3;font-weight:bold;"><u><?=$UnitNow[$SID[$i]];?></u></a></td>
			<td align="right"><a href="/zhome/listStationProject/<?=$SID[$i];?>/<?=$Distance;?>/2" target="MyWindow" style="color:#0000E3;font-weight:bold;"><u><?=$UnitFuture[$SID[$i]];?></u></a></td>
		</tr>
<?php
	 $no++;
	}
?>
</table>
</font>
<br>