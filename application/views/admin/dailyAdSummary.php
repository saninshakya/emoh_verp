<br>
<font color="blue">
<?php
$attributes = array('class' => 'form-inline', 'id' => 'dailyAdSummary_form');
echo form_open('/admin/viewDailyAdSummaryList',$attributes);
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
	<tr height="5px"><td></td></tr>
	<tr>
		<td align="right">วันที่เริ่มต้น : </td>
		<td>&nbsp;
			<input type="text" id="start_date" name="start_date" class="form-control input-md" style="width:100px;" value="<?php if($start_date!=""){echo $start_date;}else{echo $nowdate;}?>" data-date-format="yyyy-mm-dd" max="<?=date('Y-m-d');?>">
		</td>
	</tr>
	<tr height="5px"><td></td></tr>
	<tr>
		<td align="right">วันที่สิ้นสุด : </td>
		<td>&nbsp;
			<input type="text" id="end_date" name="end_date" class="form-control input-md" style="width:100px;" value="<?php if($end_date!=""){echo $end_date;}else{echo $nowdate;}?>" data-date-format="yyyy-mm-dd" max="<?=date('Y-m-d');?>">
		</td>
	</tr>
	<tr height="5px"><td></td></tr>
	<tr>
		<td>&nbsp;</td>
		<td align="right"><button name="submit" onclick="$('#credit_use_form').submit();">ค้นหา</button></td>
	</tr>
</table>
</font>
<br>
<?php echo form_close();?>

<script type="text/javascript" src="/js/bootstrap-datepicker.js"></script>
<script language="JavaScript">
$('#start_date').datepicker();
$('#end_date').datepicker();
</script>