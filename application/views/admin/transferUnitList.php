<br>
<style>
td {padding: 2px;}
</style>
<?php
echo form_open('/admin/transferUnitUpdate');
?>
<div align="center">List of Units</div>
<div align="center" style="padding: 10px 0 10px 0;">
	<font color="blue">
	<table align="center" border="1">
		<tr style="background-color:#8080FF;">
			<td align="center">Unit No</td>
			<td align="center">Project</td>
			<td align="center">Owner</td>
			<td align="center">Active</td>
			<td align="center">Fl.</td>
			<td align="center">Bed</td>
			<td align="center">Size</td>
			<td align="center">THB</td>
		</tr>
	<?php
		foreach ($listUnit->result() as $row){
	?>
			<tr onmouseover="this.style.backgroundColor='#ffff80';" onmouseout="this.style.backgroundColor='';">
				<td align="right"><?=$row->POID;?></td>
				<td align="left"><?=$row->ProjectName;?></td>
				<td align="left"><?=$row->OwnerName;?></td>
				<td align="left"><?=$row->ActiveName;?></td>
				<td align="right"><?=$row->Floor;?></td>
				<td align="right"><?=$row->Bedroom;?></td>
				<td align="right"><?=$row->useArea;?></td>
				<td align="right"><?=$row->TotalPrice;?></td>
			</tr>
	<?php
			$user_id=$row->user_id;
		}
	?>
	</table>
	<table>
		<tr>
			<td align="right">
				<input type="hidden" name="SelMsgID" value="<?=$MsgID;?>">
				<input type="hidden" name="SelEmail" value="<?=$Email;?>">
				<input type="hidden" name="SelUserID" value="<?=$user_id;?>">
				<input type="submit" value="Submit"/>
			</td>
		</tr>
	</table>
	</font>
</div>
</form>