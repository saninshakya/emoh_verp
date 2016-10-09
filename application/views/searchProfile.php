<br>
<div align="center">ค้นหา Profile</div>
<br>
<font color="blue">
<?php
$attributes = array('class' => 'form-inline', 'id' => 'myform');
echo form_open('/zhome/listProfile',$attributes);
?>
<table align="center" border="0">
	<tr>
		<td id="ShowProjectName" align="right">ชื่อ : </td>
		<td>&nbsp;<input id="UserName" Name="UserName" class="form-control input-md" type="text" value="<?php if($UserName!=""){echo $UserName;};?>" placeholder="ระบุชื่อ"></td>
	</tr>
	<tr height="5px"><td></td></tr>
	<tr>
		<td align="right">นามสกุล : </td>
		<td>&nbsp;<input id="UserSurName" Name="UserSurName" class="form-control input-md" type="text" value="<?php if($UserSurName!=""){echo $UserSurName;};?>" placeholder="ระบุชื่อนามสกุล"></td>
	</tr>
	<tr height="5px"><td></td></tr>
	<tr>
		<td align="right">สถานะ : </td>
		<td>&nbsp;
			<select id="ActiveProfile" name="ActiveProfile" class="form-control input-md">
				<option value="">ทั้งหมด</option>
				<option value="1">เปิดการใช้งาน</option>
				<option value="0">ปิดการใช้งาน</option>
			</select>
		</td>
	</tr>
	<tr height="5px"><td></td></tr>
	<tr>
		<td>&nbsp;</td>
		<td align="right"><?php echo form_submit('search','ค้นหา');?></td>
	</tr>
</table>
</font>
<br>
<?php echo form_close();
?>