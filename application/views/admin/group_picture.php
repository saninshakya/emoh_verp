<br>
<?php
echo form_open('/admin/add_group_picture');
?>
<div align="center"><h2>Add Room Type in Project</h2></div>
<table width="80%" align="center" cellpadding="5" cellspacing="5">
	<tr>
		<td align="right"><b>โครงการ :</b></td>
		<td align="left">
			<select name="PID">
<?php
	foreach ($list_project->result() as $row){
?>
				<option value="<?=$row->PID;?>"><?=$myClass->list_project_name($row->PID);?></option>
<?php
	}
?>
			</select>
		</td>
	</tr>
	<tr>
		<td align="right">ชื่อแบบห้อง :</td>
		<td align="left"><input type="text" name="RoomName" /></td>
	</tr>
	<tr><td colspan="2">&nbsp;</td></tr>
	<tr>
		<td colspan="2" align="center"><input type="submit" value="Add Room Type"></td>
	</tr>
</table>
<br>
<table align="center" width="80%" border="1">
	<tr>
		<td align="center">ลำดับที่</td>
		<td align="center">โครงการ</td>
		<td align="center">ชื่อแบบห้อง</td>
		<td align="center">จัดการ</td>
		<td align="center">ลบแบบห้อง</td>
	</tr>
<?php
	$i=1;
 	foreach ($list_room->result() as $row) {
?>
	<tr>
		<td align="center"><?=$i;?></td>
		<td align="center"><?=$myClass->list_project_name($row->PID);?></td>
		<td align="center"><?=$row->RoomName;?></td>
		<td align="center"><a href="/admin/add_room_picture/<?=$row->PID;?>/<?=$row->id;?>">เพิ่มรูป</a></td>
		<td align="center"><a href="/admin/delete_RoomName/<?=$row->id;?>">ลบแบบห้อง</a></td>
	</tr>
<?php
		$i++;
 	}
 ?>
</table>
<br>
