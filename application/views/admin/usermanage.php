<?php
?>
<div align="center"><h1>Non Activated User</h1></div> 
<table border=1 align="center" width="80%" >
	<tr>
		<td width="10%" align="center" ><b>UserID</b></td>
		<td width="30%" align="center"><b>Name</b></td>
		<td width="40%" align="center"><b>Email</b></td>
		<td width="20%" align="center"><b>Activate</b></td>	
	</tr>
<?php
	foreach ($nonactivated->result() as $row){
?>
	<tr>
		<td width="10%" align="center" ><?=$row->id;?></td>
		<td width="30%" align="left">&nbsp;<?=$row->firstname;?>&nbsp;<?=$row->lastname;?></td>
		<td width="40%" align="left">&nbsp;<?=$row->email;?></td>
		<td width="20%" align="center"><a href="/admin/activate_user/<?=$row->id;?>">Activate</a></td>	
	</tr>
	
<?php
	}
?>
</table>
<br>
<div align="center"><h1>Search User</h1></div> 
<?=form_open('/admin/usermanage');?>
<table border=0 align="center" width="80%">
	<tr>
		<td align="right">Email/Name:</td>
		<td align="left"><input type="text" name="email" id="email" size="50"></td>
		<td align="left"><input type="submit" value="Find"></td>
	</tr>
</table>
</form>
<br>
<?php
	if ($search!="NULL"){
?>
<table border=1 align="center" width="80%">
	<tr>
		<td align="center" width="5%">Order</td>
		<td align="left" width="20%">&nbsp;FirstName/LastName</td>
		<td align="left" width="20%">&nbsp;Email</td>
		<td align="left" width="50%">&nbsp;Password</td>
		<td align="left" width="5%">&nbsp;Activate</td>
	</tr>
<?php
	$i=1;
	foreach ($search->result() as $row){
?>
<?=form_open('/admin/reset_password/'.$row->id);?>
	<tr>
		<td align="center"><?=$i;?></td>
		<td align="left">&nbsp;<?=$row->firstname;?>&nbsp;<?=$row->lastname;?></td>
		<td align="left">&nbsp;<?=$row->email;?></td>
		<td align="left">&nbsp;<input type="text" name="new_password" size="20"><input type="submit" value="Set Password"></td>
		<td align="left"><a href="/admin/deactivate_user/<?=$row->id;?>">Deactivate</a></td>
	</tr>
</form>	
<?php		
	}
?>
</table>
<?php		
	}
?>
<br>