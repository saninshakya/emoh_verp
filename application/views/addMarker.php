<?php echo $map['html']; ?>
<br>
<?php
echo form_open('/zhome/addMarker');
?>
<div align="center">
 <select id="PID" name="PID">
	<option value=""></option>
<?php
	$query=$this->db->query('Select * from  Project Order by PName_th');
	foreach ($query->result() as $row){
?>
	<option value="<?=$row->PID?>"><?=$row->PName_th;?></option>
<?php
	};
?>
 </select>
</div>
<br>
<div align="center">
	<input type="submit" value="ย้ายหมุด">
</div>
</form>
<br>
<?php
$query=$this->db->query('Select Max(ID) as maxid from KeyMarker');
$row=$query->row();
$maxid=$row->maxid+1;
$query=$this->db->query('Select Type from KeyMarker group by Type');
echo form_open('/zhome/addMarker2');
$query2=$this->db->query('select * from Province');
?>
<input type="hidden" id="ID" name="ID" value="<?=$maxid;?>">
<input type="hidden" id="KeyID" name ="KeyID" value="">
<Table align="center">
<tr>
	<td align="Right">ID:&nbsp;</td><td align="left"><input type="text" id="showID" value="<?=$maxid;?>" size="50" disabled>
</tr>
<tr>
	<td align="Right">ชื่อ (ไทย):&nbsp;</td><td align="left"><input type="text" id="KeyName" name="KeyName"  size="50">
</tr>
<tr>
	<td align="Right">ชื่อ (Eng):&nbsp;</td><td align="left"><input type="text" id="KeyName_en" name="KeyName_en"  size="50">
</tr>
<tr>
	<td align="Right">จังหวัด&nbsp;</td><td>
	<select id="Province" name="Province">
		<option></option>
<?php
	foreach ($query2->result() as $row2){
?>
		<option value="<?=$row2->id;?>"<?php if ($rowPoint->ProvinceID == $row2->id){echo "selected";};?>><?=$row2->ProvinceName;?></option>
<?php
	};
?>
	</select></td>
</tr>
<tr>
	<td align="Right">Lat:&nbsp;</td><td align="left"><input type="text" id="Lat" name="Lat"  size="50">
</tr>
<tr>
	<td align="Right">Lng:&nbsp;</td><td align="left"><input type="text" id="Lng" name="Lng"  size="50">
</tr>
<tr>
	<td align="Right">ประเภท:&nbsp;</td><td>
	<select id="Type" name="Type" onchange="chagetype_add()">
		<option></option>
<?php
	foreach ($query->result() as $row){
?>
		<option value="<?=$row->Type;?>"><?=$row->Type;?></option>
<?php
	};
?>
	</select></td>
</tr>
<tr>
	<td align="Right">KeyID:&nbsp;</td><td align="left"><input type="text" id="showKeyID"  size="50" disabled>	
</tr>
</Table>
<br>
<div align="center"><input type="submit" value="Add Marker"></div>
</form>
<br>
<br>
<br>
<br>
<br>
<br>
