<?php
//header info for browser
$filename = "Project Adword";
/*header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$filename.xls");
header("Pragma: no-cache");
header('Content-Encoding: tis620');
header('Content-Type: text/csv; charset=tis620' );*/
?>
<table border="1" id="dataTables">
	<thead>
		<tr>
			<?for($c=1;$c<=66;$c++){?>
				<td align="center">C<?=$c;?></td>
			<?}?>
		</tr>
	</thead>
	<tbody>
	<?php
	$i=1;
	$PID_check='';
	foreach ($listProject->result() as $row){
		//$PName_th=mb_convert_encoding($row->PName_th,"ANSI");
		$PName_th=$row->PName_th;
		$PName_th_30=substr($row->PName_th,0,30);
		$PName_th_15=substr($row->PName_th,0,15);
		if($PID_check<>$row->PID and $PID_check<>''){
	?>
			<!-- Last Row -->
			<tr>
				<?for($c=1;$c<=26;$c++){?>
					<td align="center">&nbsp;</td>
				<?}?>
				<td align="left"><?=$PName_th;?></td><!-- C27 -->
				<?for($c=28;$c<=42;$c++){?>
					<td align="center">&nbsp;</td>
				<?}?>
				<td align="left"><?=$url;?></td><!-- C43 -->
				<?for($c=44;$c<=57;$c++){?>
					<td align="center">&nbsp;</td>
				<?}?>
				<td align="left"><?=$PName_th;?></td><!-- C58 -->
				<td align="left">ZmyHome คอนโดเจ้าของขายเอง #1</td><!-- C59 -->
				<td align="left">เช็คราคา เช็คค่าเช่า หาดีลดี <?=$PName_th;?> เจ้าของขายเอง</td><!-- C60 -->
				<td align="left">คอนโดขาย</td><!-- C61 -->
				<td align="left"><?=$PName_th;?></td><!-- C62 -->
				<td align="left">Active</td><!-- C63 -->
				<td align="left">Active</td><!-- C64 -->
				<td align="left">Active</td><!-- C65 -->
				<td align="left">Approved</td><!-- C66 -->
			</tr>
	<?
		}
	?>
		<!-- Row 1 -->
		<tr>
			<?for($c=1;$c<=9;$c++){?>
				<td align="center">&nbsp;</td>
			<?}?>
			<td align="center">0</td><!-- C10 -->
			<?for($c=11;$c<=26;$c++){?>
				<td align="center">&nbsp;</td>
			<?}?>
			<td align="left"><?=$PName_th;?></td><!-- C27 -->
			<td align="center">1</td><!-- C28 -->
			<td align="center">0.01</td><!-- C29 -->
			<?for($c=30;$c<=33;$c++){?>
				<td align="center">&nbsp;</td>
			<?}?>
			<td align="center">None</td><!-- C34 -->
			<td align="center">Disabled</td><!-- C35 -->
			<td align="center">Default</td><!-- C36 -->
			<td align="center">[]</td><!-- C37 -->
			<?for($c=38;$c<=62;$c++){?>
				<td align="center">&nbsp;</td>
			<?}?>
			<td align="center">Active</td><!-- C63 -->
			<td align="center">Active</td><!-- C64 -->
			<td align="center">&nbsp;</td>
			<td align="center">&nbsp;</td>
		</tr>
		
		<!-- Row 2 - 12 -->
		<?for($r=2;$r<=12;$r++){
			switch ($r){
				case 2:$txt_show=$row->PName_en;break;
				case 3:$txt_show='ราคา คอนโด '.$PName_th;break;
				case 4:$txt_show=$PName_th;break;
				case 5:$txt_show='ขาย คอนโด '.$PName_th;break;
				case 6:$txt_show='ขายดาวน์ คอนโด '.$PName_th;break;
				case 7:$txt_show=$PName_th.' เจ้าของขายเอง';break;
				case 8:$txt_show='คอนโด '.$PName_th;break;
				case 9:$txt_show='ราคา '.$PName_th;break;
				case 10:$txt_show=$PName_th.' คอนโดมือสอง';break;
				case 11:$txt_show=$PName_th.' ราคาถูก';break;
				case 12:$txt_show='ขายด่วน '.$PName_th;break;
				default:$txt_show=$PName_th;
			}
		?>
			<tr>
				<?for($c=1;$c<=26;$c++){?>
					<td align="center">&nbsp;</td>
				<?}?>
				<td align="left"><?=$PName_th;?></td><!-- C27 -->
				<?for($c=28;$c<=48;$c++){?>
					<td align="center">&nbsp;</td>
				<?}?>
				<td align="left"><?=$txt_show;?></td><!-- C49 -->
				<td align="center">Broad</td><!-- C50 -->
				<?for($c=51;$c<=62;$c++){?>
					<td align="center">&nbsp;</td>
				<?}?>
				<td align="center">Active</td><!-- C63 -->
				<td align="center">Active</td><!-- C64 -->
				<td align="center">Active</td><!-- C65 -->
				<td align="center">Approved</td><!-- C66 -->
			</tr>
	<?	}
		if($PID_check<>$row->PID){
			$PID_check=$row->PID;
			$PName_en=$row->PName_en;
			$url='https://zmyhome.com/Zhome/searchResult/0/'.$PName_en;
		}
		$i++;
	}
	?>
	<!-- Last Row -->
	<tr>
		<?for($c=1;$c<=26;$c++){?>
			<td align="center">&nbsp;</td>
		<?}?>
		<td align="left"><?=$PName_th;?></td><!-- C27 -->
		<?for($c=28;$c<=42;$c++){?>
			<td align="center">&nbsp;</td>
		<?}?>
		<td align="left"><?=$url;?></td><!-- C43 -->
		<?for($c=44;$c<=57;$c++){?>
			<td align="center">&nbsp;</td>
		<?}?>
		<td align="left"><?=$PName_th;?></td><!-- C58 -->
		<td align="left">ZmyHome คอนโดเจ้าของขายเอง #1</td><!-- C59 -->
		<td align="left">เช็คราคา เช็คค่าเช่า หาดีลดี <?=$PName_th;?> เจ้าของขายเอง</td><!-- C60 -->
		<td align="left">คอนโดขาย</td><!-- C61 -->
		<td align="left"><?=$PName_th;?></td><!-- C62 -->
		<td align="center">Active</td><!-- C63 -->
		<td align="center">Active</td><!-- C64 -->
		<td align="center">Active</td><!-- C65 -->
		<td align="center">Approved</td><!-- C66 -->
	</tr>
	</tbody>
</table>