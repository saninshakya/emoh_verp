<br>
<?php
echo form_open('/admin/add_project_developer');
?>
<div align="center"><h2>Set Project to Developer User</h2></div>
<table align="center" width="80%" cellpadding="5" cellspacing="5">
	<tr>
		<td align="right"><b>ชื่อโครงการ :</b></td>
		<td align="left">
			<select name="PID">
<?php
	foreach ($list_all_project->result() as $row){
?>
				<option value="<?=$row->PID;?>"><?=$row->PID;?>&nbsp;<?=$row->PName_th;?></option>
<?
	}
?>
			</select>
		</td>
	</tr>
	<tr>
		<td align="right"><b>Developer Name :</b></td>
		<td align="left">
			<select name="user_id">
<?php
	foreach ($list_developer->result() as $row) {
?>
				<option value="<?=$row->id?>"><?=$row->developer_remark;?>&nbsp;(<?=$row->email;?>)</option>
<?php
	}
?>
			</select>
		</td>
	</tr>
	<tr>
			<td align="right"><b>เบอร์โทรโครงการ</b></td>
			<td align="left"><input type="text" name="Telephone"></td>
	</tr>
	<tr>
		<td colspan="2" align="center"><input type="submit" value="Add Project for Developer" /></td>
	</tr>
</table>
<br>
<div align="center"><h2>List Project Developer</h2></div>
<table align="center" width="80%" align="center" border="1">
	<tr>
		<td align="Center">ลำดับที่</td>
		<td align="Center">PID</td>
		<td align="Center">Project Name</td>
		<td align="Center">User ID</td>
		<td align="Center">email</td>
		<td align="Center">จัดการ</td>
	</tr>
<?php
	$i=1;
	foreach ($list_project->result() as $row) {
?>
	<tr>
		<td align="center"><?=$i;?></td>
		<td align="center"><?=$row->PID;?></td>
		<td align="center"><?=$myClass->list_project_name($row->PID);?></td>
		<td align="center"><?=$row->user_id;?></td>
		<td align="center"><?=$myClass->list_email($row->user_id);?></td>
		<td align="center"><a href="/admin/remove_project_developer/<?=$row->id;?>">ลบออก</a></td>
	</tr>
<?php
		$i++;
	}
?>
</table>
<br>
