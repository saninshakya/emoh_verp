<br>
<div align="center">ค้นหาห้อง</div>
<br>
<font color="blue">
<?php
$attributes = array('class' => 'form-inline', 'id' => 'myform');
echo form_open('/zhome/listUnit',$attributes);
if(!isset($SortPost)){$SortPost=1;}
?>
<table align="center" border="0">
	<tr>
		<td id="ShowProjectName" align="right">ชื่อโครงการ : </td>
		<td>&nbsp;
			<input id="ProjectName" Name="ProjectName" class="form-control input-md" type="text" <?php if($ProjectName!=""){echo 'Value="'.$ProjectName.'"';};?> placeholder="ระบุชื่อโครงการ">
		</td>
	</tr>
	<tr height="5px"><td></td></tr>
	<tr>
		<td align="right">ชื่อเจ้าของห้อง : </td>
		<td>&nbsp;
			<input id="Ownername" Name="Ownername" class="form-control input-md" type="text" <?php if($Ownername!=""){echo 'Value="'.$Ownername.'"';};?> placeholder="ระบุชื่อเจ้าของห้อง">
		</td>
	</tr>
	<tr height="5px"><td></td></tr>
	<tr>
		<td align="right">Email : </td>
		<td>&nbsp;
			<input id="Email" Name="Email" class="form-control input-md" type="text" <?php if($Email!=""){echo 'Value="'.$Email.'"';};?> placeholder="ระบุ Email">
		</td>
	</tr>
	<tr height="5px"><td></td></tr>
	<tr>
		<td align="right">เบอร์โทร : </td>
		<td>&nbsp;
			<input id="Telephone" Name="Telephone" class="form-control input-md" type="text" <?php if($Telephone!=""){echo 'Value="'.$Telephone.'"';};?> placeholder="ระบุเบอร์โทร">
		</td>
	</tr>
	<tr height="5px"><td></td></tr>
	<tr>
		<td align="right">ประเภทประกาศ : </td>
		<td>&nbsp;
			<select id="Advertising" name="Advertising" class="form-control input-md">
				<option value="">ทั้งหมด</option>
				<?php
					foreach ($qTOAdvertising->result() as $row)
					{
						if ($Advertising==$row->TOAID){
							$sel="selected";
						} else {
							$sel="";
						}
						echo '<option value="'.$row->TOAID.'" class="text-grey" '.$sel.'>'.$row->AName_th.'</option>';
					}
				?>
			</select>
		</td>
	</tr>
	<tr height="5px"><td></td></tr>
	<tr>
		<td align="right">สถานะรายการ : </td>
		<td>&nbsp;
			<select id="ActivePost" name="ActivePost" class="form-control input-md">
				<option value="">ทั้งหมด</option>
				<?php
					foreach ($qActivePost->result() as $row)
					{
						if ($ActivePost==$row->id){
							$sel="selected";
						} else {
							$sel="";
						}
						echo '<option value="'.$row->id.'" class="text-grey" '.$sel.'>'.$row->name_th.'</option>';
					}
				?>
			</select>
		</td>
	</tr>
	<tr height="5px"><td></td></tr>
	<tr>
		<td align="right">เรียงลำดับ : </td>
		<td>&nbsp;
			<select id="SortPost" name="SortPost" class="form-control input-md">
				<option value="1" <?php if($SortPost==1){echo "selected";}?>>วันที่ทำรายการล่าสุด</option>
				<option value="2" <?php if($SortPost==2){echo "selected";}?>>วันที่ลงประกาศ</option>
				<option value="3" <?php if($SortPost==3){echo "selected";}?>>ชื่อโครงการ</option>
				<option value="4" <?php if($SortPost==4){echo "selected";}?>>ชื่อเจ้าของห้อง</option>
			</select>
		</td>
	</tr>
	<tr height="5px"><td></td></tr>
	<tr>
		<td align="right"><div class="checkbox"><label><input type="checkbox" id="expire_check" name="expire_check" <?php if(isset($expire_check)){echo 'checked';}?> onchange="if($(this).prop('checked')){$('#expire_day').prop('disabled',false);$('#expire_type').prop('disabled',false);}else{$('#expire_day').prop('disabled',true);$('#expire_type').prop('disabled',true);}">&nbsp;รายการหมดอายุ : </label></div></td>
		<td>&nbsp;
			<select id="expire_type" name="expire_type" <?php if(!isset($expire_check)){echo 'disabled';}?>>
				<option value="1" <?php if($expire_type=='1'){echo 'selected';}?>>ก่อนหน้า(เกิน)</option>
				<option value="2" <?php if($expire_type=='2'){echo 'selected';}?>>ถัดไป(ภายใน)</option>
			</select>
			<input type="number" id="expire_day" name="expire_day" class="form-control input-md" data-bind="value:replyNumber" <?php if ($expire_day!=""){echo 'Value="'.$expire_day.'"';};?> placeholder="ไม่ระบุ" <?php if(!isset($expire_check)){echo 'disabled';}?>>&nbsp;วัน
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