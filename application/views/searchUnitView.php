<br>
<div align="center">ค้นหา</div>
<br>
<font color="blue">
<?php
$attributes = array('class' => 'form-inline', 'id' => 'myform');
echo form_open('/zhome/listUnitView',$attributes);
$nowdate=date('Y-m-d');
?>
<table align="center" border="0">
	<tr>
		<td align="right">ประเภทรายงาน : </td>
		<td>&nbsp;
			<input type="radio" name="ReportType" value="1" <?if($ReportType==1){echo "checked";}?> onclick="ShowHideSearch(1);">Project&nbsp;
			<input type="radio" name="ReportType" value="2" <?if($ReportType==2){echo "checked";}?> onclick="ShowHideSearch(2);">User
		</td>
	</tr>
	<tr height="5px"><td></td></tr>
	<tr>
		<td align="right">วันที่ : </td>
		<td>&nbsp;
			<input id="StartDate" Name="StartDate" class="form-control input-md" type="date" value="<?php if($StartDate!=""){echo $StartDate;}else{echo $nowdate;}?>" max="<?=date('Y-m-d');?>" placeholder="วันที่เริ่มต้น">&nbsp;-&nbsp;
			<input id="EndDate" Name="EndDate" class="form-control input-md" type="date" value="<?php if($EndDate!=""){echo $EndDate;}else{echo $nowdate;}?>" max="<?=date('Y-m-d');?>" placeholder="วันที่สิ้นสุด">
		</td>
	</tr>
	<tr height="5px" ><td></td></tr>
	<tr class="ProjectSearch">
		<td id="ShowProjectName" align="right">ชื่อโครงการ  (กรุณากรอกเป็นภาษาไทย) : </td>
		<td>&nbsp;
			<input type="text" id="ProjectName" Name="ProjectName" class="form-control input-md" value="<?php if($ProjectName!=""){echo $ProjectName;}?>" placeholder="ระบุชื่อโครงการ" data-placement="bottom">
			<span class="glyphicon glyphicon-remove-circle" onclick="$('#ProjectName').val('');"></span>
		</td>
	</tr>
	<tr class="ProjectSearch" height="5px"><td></td></tr>
	<tr class="ProjectSearch">
		<td align="right">ชื่อเจ้าของห้อง : </td>
		<td>&nbsp;
			<input type="text" id="OwnerName" Name="OwnerName" class="form-control input-md" value="<?php if($OwnerName!=""){echo $OwnerName;}?>" placeholder="ระบุชื่อเจ้าของห้อง">
			<span class="glyphicon glyphicon-remove-circle" onclick="$('#OwnerName').val('');"></span>
		</td>
	</tr>
	<tr class="ProjectSearch" height="5px"><td></td></tr>
	<tr class="ProjectSearch">
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
	<tr class="UserSearch display-none">
		<td align="right">ชื่อ User : </td>
		<td>&nbsp;
			<input type="text" id="UserName" Name="UserName" class="form-control input-md" value="<?php if($UserName!=""){echo $UserName;}?>" placeholder="ระบุชื่อ User">
			<span class="glyphicon glyphicon-remove-circle" onclick="$('#UserName').val('');"></span>
		</td>
	</tr>
	<tr height="5px"><td></td></tr>
	<tr>
		<td align="right">เรียงลำดับตาม : </td>
		<td>&nbsp;
			<select id="OrderBy" name="OrderBy" class="form-control input-md">
				<option value="1" <?php if($OrderBy==1){echo "selected";}?>>Date</option>
				<option class="ProjectSearch" value="2" <?php if($OrderBy==2){echo "selected";}?>>Project</option>
				<option class="UserSearch" value="3" <?php if($OrderBy==3){echo "selected";}?>>user</option>
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

<script type="text/javascript">
$(function(){
	ShowHideSearch($('#ReportType').val())
});

function ShowHideSearch(type){
	if(type==1){
		$('.ProjectSearch').removeClass('display-none');
		$('.UserSearch').addClass('display-none');
	}else if(type==2){
		$('.ProjectSearch').addClass('display-none');
		$('.UserSearch').removeClass('display-none');
	}
}
</script>