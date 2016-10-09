<br>
<div align="center">ค้นหา Label</div>
<br>
<font color="blue">
<?php
$attributes = array('class' => 'form-inline', 'id' => 'myform');
echo form_open('/zhome/listLabel',$attributes);
$xLabel = $this->session->flashdata('Label');
$xActiveLabel = $this->session->flashdata('ActiveLabel');
if($xLabel){
	$Label=$xLabel;
	$ActiveLabel=$xActiveLabel;
}
?>
<table align="center" border="0">
	<tr>
		<td align="right">ประเภท : </td>
		<td>&nbsp;
			<select id="Label" name="Label" class="form-control input-md">
				<option value="">ทั้งหมด</option>
				<?php
					foreach ($qLabel->result() as $row)
					{
						if ($Label==$row->name_th){
							$sel="selected";
						} else {
							$sel="";
						}
						echo '<option value="'.$row->name_th.'" class="text-grey" '.$sel.'>'.$row->name_th.'</option>';
					}
				?>
			</select>
		</td>
	</tr>
	<tr height="5px"><td></td></tr>
	<tr>
		<td align="right">สถานะรายการ : </td>
		<td>&nbsp;
			<select id="ActiveLabel" name="ActiveLabel" class="form-control input-md">
				<option value="" <?php if($ActiveLabel==''){echo "selected";}?>>ทั้งหมด</option>
				<option value="1" <?php if(isset($ActiveLabel) and $ActiveLabel=='1'){echo "selected";}?>>ใช้งาน</option>
				<option value="0" <?php if(isset($ActiveLabel) and $ActiveLabel=='0'){echo "selected";}?>>ยกเลิก</option>
			</select>
		</td>
	</tr>
	<tr height="5px"><td></td></tr>
	<tr>
		<td>&nbsp;</td>
		<td align="right"><?php echo form_submit('search','ค้นหา','id="formsubmit"');?></td>
	</tr>
</table>
</font>
<br>
<?php echo form_close();
$message = $this->session->flashdata('message');
if ($message) {
	echo "<script language='JavaScript'>";
	echo "alert('".$message."')";
	echo "</script>";
}
?>