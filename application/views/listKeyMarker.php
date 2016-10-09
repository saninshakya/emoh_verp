<?php
$query=$this->db->query('select Type from KeyMarker group by type');
$query_province=$this->db->query('select id,ProvinceName from Province order by ProvinceName');
?>
<br>
<div align="center">
<?php
foreach ($query->result() as $row){
?>
	&nbsp;&nbsp;&nbsp;<a href="/zhome/listKeyMarker/<?=$row->Type;?>"><?=$row->Type;?></a>
<?php
}
?>
</div>
<br>
<div align="center"><a href="/zhome/addMarker">Add Marker</a></div>
<br>
<table align="center" border="1">
	<tr>
		<td align="center">ลำดับที่</td>
		<td align="center">ชื่อ (ไทย)</td>
		<td align="center">ชื่อ (Eng)</td>
		<td align="center">จังหวัด</td>
		<td align="center">Latitude</td>
		<td align="center">Lontitude</td>
		<td align="center">ประเภท</td>
		<td align="center">Key ID</td>
		<td align="center">แก้ไข</td>
	</tr>
<?php
	$i=1;
	foreach ($listKeyMarker->result() as $row){
?>
	<tr>
		<td align="center"><?=$i;?></td>
		<td align="left">&nbsp;&nbsp;&nbsp;<?=$row->KeyName;?></td>
		<td align="left">&nbsp;&nbsp;&nbsp;<?=$row->KeyName_en;?></td>
		<td align="left">
			<select id="Province_<?=$i;?>" name="Province[<?=$i;?>]" onchange="updateMarkerProvince('<?=$row->ID;?>','<?=$i;?>');">
				<option value=""></option>
				<?foreach($query_province->result() as $row_province){?>
					<option value="<?=$row_province->id;?>"<?php if ($row->ProvinceID == $row_province->id){echo "selected";};?>><?=$row_province->ProvinceName;?></option>
				<?}?>
			</select>
		</td>
		<td align="right"><?=$row->Lat;?></td>
		<td align="right"><?=$row->Lng;?></td>
		<td align="center">&nbsp;&nbsp;&nbsp;<?=$row->Type;?></td>
		<td align="center"><?=$row->KeyID;?></td>
		<td align="center"><a href="/zhome/editKeyMarker/<?=$row->ID;?>">Edit</a></td>
	</tr>
<?php
		$i++;
	}
?>
</table>
<br>
<br>
<br>
<script type="text/javascript">
function updateMarkerProvince(MarkerID,row){
	var ProvinceID=$('#Province_'+row).val();
	$.post("/zhome/updateMarkerProvince", { 'MarkerID': MarkerID ,'ProvinceID': ProvinceID });
}
</script>