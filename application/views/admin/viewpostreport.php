<br>
<div align="center">สุรปดู Post <b><?=$POID;?></b> ในระบบ</div>
<font color="blue">
<table align="center" border="1">
	<tr>
		<td align="center">&nbsp;วันที่ เวลา&nbsp;</td>
		<td align="center">&nbsp;User&nbsp;</td>
		<td align="center">&nbsp;View Post&nbsp;</td>
		<td align="center">&nbsp;View Telephone&nbsp;</td>
	</tr>
<?php
	foreach ($report->result() as $row){
?>
	<tr>
		<td align="center">&nbsp;<?=$row->LastUpdate;?>&nbsp;</td>
		<td align="left">&nbsp;<?=$this->backend->usertoemail($row->ViewByUserID);?>&nbsp;</td>
		<td align="Center">X</td>
		<td align="Center">
			<?php
				if ($row->ViewTelByUserID!=null){
					echo "X";
				} else {
					echo "&nbsp;";
				}
			?>
		</td>
	</tr>
<?php
	}
?>
</table>
</font>
<br>
<br>
