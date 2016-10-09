<br>
<div align="center">ค้นหาโครงการ</div>
<br>
<font color="blue">
<?php
$attributes = array('class' => 'email', 'id' => 'myform');
echo form_open('/zhome/listProject2',$attributes);
?>
<table align="center" border="0">
	<tr>
		<td id="ShowProjectName" align="right">ชื่อโครงการ * (กรุณากรอกเป็นภาษาไทย) : </td>
		<td><input id="ProjectName" Name="ProjectName" class="form-control input-md" type="text" <?php if ($ProjectName!=""){echo 'Value="'.$ProjectName.'"';};?> placeholder="ระบุชื่อโครงการ"  onchange="setTimeout(function(){updateProjectName()}, 1000);" onSelect="setTimeout(function(){updateProjectName()}, 1000);" ></td>
	</tr>
	<tr height="5px"><td></td></tr>
	<tr>
		<td align="right">จังหวัด : </td>
		<td><input id="Province" Name="Province" class="form-control input-md" type="text" <?php if ($Province!=""){echo 'Value="'.$Province.'"';};?> placeholder="ระบุชื่อจังหวัด"></td>
	</tr>
	<tr height="5px"><td></td></tr>
	<tr>
		<td>&nbsp;</td>
		<td align="right"><?php echo form_submit('search','ค้นหา');?></td>
	</tr>
</table>
</font>
<br>
<?php echo form_close();?>