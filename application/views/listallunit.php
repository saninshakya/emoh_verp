<table>
<?php
	$i=1;
	foreach ($result->result() as $row){
			if ($row->TOAdvertising==5){
				$total=$row->PRentPrice;
				$txt2="rent";
				$txt="คอนโดเจ้าของให้เช่าเอง";
			} else {
				$total=$row->TotalPrice;
				$txt2="sell";
				$txt="คอนโดเจ้าของขายเอง";
			}
			$POID=$row->POID;
?>
	<tr>
		<td align="center">&nbsp;<?=$i;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->DateCreate;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->POID;?>&nbsp;</td>
		<td align="center">&nbsp;<a href="/<?=$txt2?>/condo/<?=$this->dashboard->ProjectNameFolder($POID);?>/<?=$row->POID;?>" target="new"><?=$txt;?>&nbsp;<?=$row->ProjectName;?></a>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->Tower;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->RoomNumber;?>&nbsp;<?=$row->Address;?></td>
		<td align="center">&nbsp;<?=$row->Floor;?>&nbsp;</td>
		<?php
		?>
		<td align="center">&nbsp;<?=number_format($total, 0,'',',');?>&nbsp;</td>
		<td align="center">&nbsp;<?=$row->ActiveDay;?>&nbsp;</td>
		<td align="center">&nbsp;<?=$this->search->ContViewList($row->POID);?>&nbsp;</td>
	</tr>
<?php
		$i++;
	}
?>
</table>