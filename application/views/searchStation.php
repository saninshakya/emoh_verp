<br>
<div align="center">ค้นหาห้อง</div>
<br>
<font color="blue">
<?php
$attributes = array('class' => 'form-inline', 'id' => 'myform');
echo form_open('/zhome/listStation',$attributes);
?>
<table align="center" border="0">
	<tr>
		<td align="right">ประเภทสถานี : </td>
		<td>&nbsp;
			<select id="StationType" name="StationType" class="form-control input-md">
				<option value="">ทั้งหมด</option>
				<?php
					foreach ($qStationType->result() as $row)
					{
						if ($StationType==$row->Type){
							$sel="selected";
						} else {
							$sel="";
						}
						echo '<option value="'.$row->Type.'" class="text-grey" '.$sel.'>'.$row->Name_th.'</option>';
					}
				?>
			</select>
		</td>
	</tr>
	<tr height="5px"><td></td></tr>
	<tr>
		<td align="right">ระยะทาง : </td>
		<td>&nbsp;
			<select id="Distance" name="Distance" class="form-control input-md">
				<option value="500" <?php if($Distance==500){echo "selected";}?>>ไม่เกิน 500 เมตร</option>
				<option value="1000" <?php if($Distance==1000){echo "selected";}?>>ไม่เกิน 1000 เมตร</option>
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
<?php echo form_close();?>