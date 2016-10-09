<br>
<font color="blue">
<?php
$attributes = array('class' => 'form-inline', 'id' => 'myform');
echo form_open('/admin/userAnalysisList',$attributes);
if(!isset($SortPost)){$SortPost=1;}
$nowyear=date('Y');
$nowmonth=date('m');
$month=array('01' => 'มกราคม', '02' => 'กุมภาพันธ์', '03' => 'มีนาคม', '04' => 'เมษายน', '05' => 'พฤษภาคม', '06' => 'มิถุนายน', '07' => 'กรกฎาคม', '08' => 'สิงหาคม', '09' => 'กันยายน', '10' => 'ตุลาคม', '11' => 'พฤศจิกายน', '12' => 'ธันวาคม');
$month_en=array('01' => 'Jan.', '02' => 'Feb.', '03' => 'Mar.', '04' => 'Apr.', '05' => 'May', '06' => 'Jun.', '07' => 'Jul.', '08' => 'Aug.', '09' => 'Sep.', '10' => 'Oct.', '11' => 'Nov.', '12' => 'Dec.');
//$startyear=$nowyear-5;
if(!isset($SelMonth) or $SelMonth==''){$SelMonth=$nowmonth;}
$startyear=2015;
?>
<table align="center" border="0">
	<tr>
		<td id="ShowProjectName" align="right">Email : </td>
		<td>&nbsp;
			<input type="text" id="Email" Name="Email" class="form-control input-md" <?php if($Email!=""){echo 'Value="'.$Email.'"';};?> placeholder="Email">
		</td>
	</tr>
	<tr height="5px"><td></td></tr>
	<tr>
		<td align="right">First Name : </td>
		<td>&nbsp;
			<input id="FirstName" Name="FirstName" class="form-control input-md" type="text" <?php if($FirstName!=""){echo 'Value="'.$FirstName.'"';};?> placeholder="FirstName">
		</td>
	</tr>
	<tr height="5px"><td></td></tr>
	<tr>
		<td align="right">Last Name : </td>
		<td>&nbsp;
			<input id="LastName" Name="LastName" class="form-control input-md" type="text" <?php if($LastName!=""){echo 'Value="'.$LastName.'"';};?> placeholder="LastName">
		</td>
	</tr>
	<!--<tr height="5px"><td></td></tr>
	<tr>
		<td align="right">ปี : </td>
		<td>&nbsp;
			<select id="SelYear" name="SelYear" class="form-control input-md">
				<?for($y=$nowyear;$y>=$startyear;$y--){?>
					<option value="<?=$y;?>" <?php if($SelYear==$y){echo "selected";}?>><?=$y;?></option>
				<?}?>
			</select>
			&nbsp;เดือน : &nbsp;
			<select id="SelMonth" name="SelMonth" class="form-control input-md">
				<?for($m=1;$m<=12;$m++){
					if($m<10){$m='0'.$m;}
				?>
					<option value="<?=$m;?>" <?php if($SelMonth==$m){echo "selected";}?>><?=$month[$m];?></option>
				<?}?>
			</select>
		</td>
		</td>
	</tr>-->
	<tr height="5px"><td></td></tr>
	<tr>
		<td align="right">วันที่ : </td>
		<td>&nbsp;
			<input type="text" id="SelDate" name="SelDate" class="form-control input-md" style="width:100px;" value="<?php if($SelDate!=""){echo $SelDate;}else{echo $nowdate;}?>" data-date-format="yyyy-mm-dd">
		</td>
	</tr>
	<tr height="5px"><td></td></tr>
	<tr>
		<td align="right">เรียงลำดับ : </td>
		<td>&nbsp;
			<select id="SortPost" name="SortPost" class="form-control input-md">
				<option value="1" <?php if($SortPost==1){echo "selected";}?>>Last Login</option>
				<option value="2" <?php if($SortPost==2){echo "selected";}?>>Email</option>
				<option value="3" <?php if($SortPost==3){echo "selected";}?>>First Name</option>
			</select>
		</td>
	</tr>
	<tr height="5px"><td></td></tr>
	<!--<tr>
		<td align="right">วันที่ : </td>
		<td>&nbsp;
			<input type="text" id="StartDate" Name="StartDate" class="form-control input-md" value="<?php if($StartDate!=""){echo $StartDate;}else{echo $nowdate;}?>" max="<?=date('Y-m-d');?>" placeholder="วันที่เริ่มต้น">&nbsp;-&nbsp;
			<input type="text" id="EndDate" Name="EndDate" class="form-control input-md" value="<?php if($EndDate!=""){echo $EndDate;}else{echo $nowdate;}?>" max="<?=date('Y-m-d');?>" placeholder="วันที่สิ้นสุด">
		</td>
	</tr>
	<tr height="5px"><td></td></tr>-->
	<tr>
		<td>&nbsp;</td>
		<td align="right"><?php echo form_submit('search','ค้นหา');?></td>
	</tr>
</table>
</font>
<br>
<?php echo form_close();?>

<script type="text/javascript" src="/js/bootstrap-datepicker.js"></script>
<script language="JavaScript">
$('#SelDate').datepicker();
//$('#StartDate').datepicker();
//$('#EndDate').datepicker();
</script>