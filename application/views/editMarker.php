<?php echo $map['html']; ?>

<br>
<br>
<?php
$rowPoint=$query->row();
$query=$this->db->query('Select Max(ID) as maxid from KeyMarker');
$row=$query->row();
$maxid=$row->maxid+1;
$query=$this->db->query('Select Type from KeyMarker group by Type');
echo form_open('/zhome/addMarker2');
$query2=$this->db->query('select * from Province');
?>
<input type="hidden" id="Old_ID" name="Old_ID" value="<?=$rowPoint->ID;?>">
<input type="hidden" id="Old_Lat" name="Old_Lat" value="<?=$rowPoint->Lat;?>">
<input type="hidden" id="Old_Lng" name="Old_Lng" value="<?=$rowPoint->Lng;?>">
<input type="hidden" id="Old_Type" name="Old_Type" value="<?=$rowPoint->Type;?>">
<input type="hidden" id="ID" name="ID" value="<?=$maxid;?>">
<input type="hidden" id="KeyID" name ="KeyID" value="<?=$maxid.$rowPoint->Type;?>">
<Table align="center">
<tr>
	<td align="Right">ID:&nbsp;</td><td align="left"><input type="text" id="showID" name="showID" value="<?=$rowPoint->ID;?>" size="50" disabled>
</tr>
<tr>
	<td align="Right">ชื่อ (ไทย):&nbsp;</td><td align="left"><input type="text" id="KeyName" name="KeyName" size="50" value="<?=$rowPoint->KeyName;?>">
</tr>
<tr>
	<td align="Right">ชื่อ (Eng):&nbsp;</td><td align="left"><input type="text" id="KeyName_en" name="KeyName_en" size="50" value="<?=$rowPoint->KeyName_en;?>">
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
	<td align="Right">Lat:&nbsp;</td><td align="left"><input type="text" id="Lat" name="Lat" size="50" value="<?=$rowPoint->Lat;?>">
</tr>
<tr>
	<td align="Right">Lng:&nbsp;</td><td align="left"><input type="text" id="Lng" name="Lng" size="50" value="<?=$rowPoint->Lng;?>">
</tr>
<tr>
	<td align="Right">ประเภท:&nbsp;</td><td>
	<select id="Type" name="Type" onchange="chagetype()">
		<option></option>
<?php
	foreach ($query->result() as $row){
?>
		<option value="<?=$row->Type;?>"<?php if ($rowPoint->Type == $row->Type){echo "selected";};?>><?=$row->Type;?></option>
<?php
	};
?>
	</select></td>
</tr>
<tr>
	<td align="Right">KeyID:&nbsp;</td><td align="left"><input type="text" id="showKeyID" name="showKeyID" size="50" disabled value="<?=$rowPoint->KeyID;?>">	
</tr>
</Table>
<br>
<div align="center"><input type="submit" value="Edit Marker"></div>&nbsp;
</form>
<?php
echo form_open('/zhome/delMarker');
?>
<input type="hidden" id="Old_ID2" name="Old_ID2" value="<?=$rowPoint->ID;?>">
<div align="center"><input type="submit" value="Del Marker"></div>
</form>
<br>
<br>
<br>
<br>
<br>
<br>
