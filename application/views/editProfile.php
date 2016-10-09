<?php
echo form_open('/zhome/updateProfile');
?>
<input type="hidden" id="user_id" name="user_id" value="<?=$Profile->id;?>">
<br>
<Table align="center">
	<tr>
		<td align="Right"><?=$qLabel['first_name'][0];?>:&nbsp;</td><td align="left"><input type="text" id="firstname" name="firstname"  size="50" value="<?=$Profile->firstname;?>">
	</tr>
	<tr height="5px"></tr>
	<tr>
		<td align="Right"><?=$qLabel['last_name'][0];?>:&nbsp;</td><td align="left"><input type="text" id="lastname" name="lastname"  size="50" value="<?=$Profile->lastname;?>">
	</tr>
	<tr height="5px"></tr>
	<tr>
		<td align="Right"><?=$qLabel['telephone'][0];?>:&nbsp;</td><td align="left"><input type="text" id="Telephone" name="Telephone"  size="50" value="<?=$Profile->Telephone;?>">
	</tr>
	<tr height="5px"></tr>
	<tr>
		<td align="Right"><?=$qLabel['line_id'][0];?>:&nbsp;</td><td align="left"><input type="text" id="LineID" name="LineID"  size="50" value="<?=$Profile->LineID;?>">
	</tr>
</Table>
<br>
<div align="center"><input type="submit" value="แก้ไขข้อมูล" onclick="confirm('ยืนยันการแก้ไขข้อมูล')"></div>
</form>