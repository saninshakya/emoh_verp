<br>
<?php
echo form_open('/admin/add_developer');
?>
<div align="Center"><h2>Set Developer User</h2></div>
<table width="80%" align="center" cellpadding="5" cellspacing="5">
	<tr>
		<td align="right"><b>User ID: </b></td>
		<td align="left"><input type="text" maxlength="30" name="user_id" size="30"/></td>
	</tr>
	<tr>
		<td align="right"><b>or Email: </b></td>
		<td align="left"><input type="text" maxlength="200" name="email" size="50"></td>
	</tr>
	<tr>
		<td align="right"><b>Developer Name: </b></td>
		<td align="left"><input type="text" maxlength="200" name="developer_remark" size="50"></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td colspan="2" align="center"><input type="submit" value="Add Developer"/></td>
	</tr>	
</table>
<?php
?>
<br>
<div align="Center"><h2>List Developer User</h2></div>
<table width="95%" border="1" align="center">
	<tr>
		<td align="center">ลำดับที่</td>
		<td align="center">User ID</td>
		<td align="center">email</td>
		<td align="center">Developer Name</td>
		<td align="center">จัดการ</td>
	</tr>
<?php
	$i=1;
	foreach ($list_developer->result() as $row) {
?>
	<tr>
		<td align="center"><?=$i;?></td>
		<td align="center"><?=$row->id;?></td>
		<td align="center"><?=$row->email;?></td>
		<td align="center"><?=$row->developer_remark;?></td>
		<td align="center"><a href="/admin/remove_developer/<?=$row->id;?>">ย้ายออก</a></td>
	</tr>
<?		
		$i++;
	}
?>	
</table>
<br>