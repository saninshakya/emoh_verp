<br>
<style>
tr {padding-bottom: 5px;}
</style>
<?php
$attributes = array('class' => 'form-inline', 'id' => 'myform');
echo form_open('/admin/transferUnitList',$attributes);
?>
<div align="Center"><h2>Transfer Unit</h2></div>
<div align="Center"><h2><?if(isset($Alert)){echo $Alert;}?></div>
<div align="center" style="padding: 10px 0 10px 0;">
<table width="80%" align="center">
	<tr>
		<td align="right"><b>Messenger ID: </b></td>
		<td align="left">&nbsp;
			<input type="text" id="MsgID" name="MsgID" class="form-control input-md" value="<?if(isset($MsgID)){echo $MsgID;}?>" size="30" required>
		</td>
	</tr>
	<tr height="5px"><td></td></tr>
	<tr>
		<td align="right"><b>Old Email Account: </b></td>
		<td align="left">&nbsp;
			<select name="EmailType">
				<option value="">Email</option>
				<option value="google" <?if(isset($EmailType) and $EmailType=='google'){echo "selected";}?>>Google</option>
				<option value="facebook" <?if(isset($EmailType) and $EmailType=='facebook'){echo "selected";}?>>Facebook</option>
			</select>
			<input type="email" id="Email" name="Email" class="form-control input-md" value="<?if(isset($Email)){echo $Email;}?>" size="30" maxlength="200" required>
		</td>
	</tr>
	<tr height="5px"><td></td></tr>
	<tr>
		<td colspan="2" align="center"><input type="submit" value="Search"/></td>
	</tr>
</table>
</div>
</form>