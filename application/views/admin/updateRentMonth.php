<br>
<?php
echo form_open('/admin/update_rent_month');
?>
<input type="hidden" name="POID" id="POID" value="<?=$POID;?>">
<div align="center"><h2>ระบุวันที่หมดสัญญาเช่า</h2></div>
<div align="center">
  <b>เดือน :</b>
  <select name="month">
<?php
  $i=1;
  While ($i<=12){
?>
    <option value="<?=$i;?>"><?=$i;?></option>
<?php
    $i++;
  }
?>
  </select>
  &nbsp;<b>ปี :</b>
  <select name="year">
<?php
  $year=date("Y");
  $i=1;
  while ($i <= 6) {
?>
  <option value="<?=$year;?>"><?=$year;?></option>
<?php
    $year++;
    $i++;
  }
?>
  </select>
  &nbsp;<input type="submit" value="Record">
</div>
<br>
