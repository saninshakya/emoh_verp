<?php echo $map['html']; ?>
<br>
<br>
<?php
echo form_open('/zhome/addProject2');
$query2=$this->db->query('select * from Province');
?>
<input type="hidden" id="PID" name="PID">
<Table align="center">
<tr>
	<td align="Right">&nbsp;ชื่อไทย:&nbsp;</td><td align="left"><input type="text" id="PName_th"  Name="PName_th" size="50" ></td>
	<td align="Right">&nbsp;ชื่อ English:&nbsp;</td><td align="left"><input type="text" id="PName_en" name="PName_en"  size="50"></td>
</tr>
<tr>
	<td align="Right">&nbsp;ชื่อย่อไทย:&nbsp;</td><td align="left"><input type="text" id="SName_th"  Name="SName_th" size="50" style="width:150px;"></td>
	<td align="Right">&nbsp;ชื่อย่อ English:&nbsp;</td><td align="left"><input type="text" id="SName_en" name="SName_en"  size="50" style="width:150px;"></td>
</tr>
<tr>
	<td align="Right">&nbsp;Lat:&nbsp;</td><td align="left"><input type="text" id="Lat" name="Lat"  size="50"></td>
	<td align="Right">&nbsp;Long:&nbsp;</td><td align="left"><input type="text" id="Lng" name="Lng"  size="50"></td>
</tr>
<tr>
	<td align="Right">&nbsp;บ้านเลขที่:&nbsp;</td><td align="left"><input type="text" id="Address" name="Address" size="50"></td>
	<td align="Right">&nbsp;</td>
</tr>
<tr>
	<td align="Right">&nbsp;ซอย:&nbsp;</td><td align="left"><input type="text" id="Soi" name="Soi" size="50"></td>
	<td align="Right">&nbsp;ถนน:&nbsp;</td><td align="left"><input type="text" id="Road" name="Road" size="50"></td>		
</tr>
<tr>
	<td align="Right">&nbsp;แขวง:&nbsp;</td><td align="left"><input type="text" id="District" name="District" size="50"></td>
	<td align="Right">&nbsp;เขต:&nbsp;</td><td align="left"><input type="text" id="Area" name="Area" size="50"></td>			
</tr>
<tr>
	<td align="Right">จังหวัด&nbsp;</td><td>
	<select id="Province" name="Province">
		<option></option>
<?php
	foreach ($query2->result() as $row2){
?>
		<option value="<?=$row2->id;?>"<?php if ($row->ProvinceID == $row2->id){echo "selected";};?>><?=$row2->ProvinceName;?></option>
<?php
	};
?>
	</select></td>	
	<td align="Right">&nbsp;Zip code:&nbsp;</td><td align="left"><input type="text" id="Zipcode" name="Zipcode" size="50"></td>				
</tr>
<tr>
	<td align="Right">&nbsp;ปีที่สร้างเสร็จ:&nbsp;</td><td align="left"><input type="text" id="YearEnd" name="YearEnd" size="50"></td>
	<td align="Right">&nbsp;จำนวนยูนิต:&nbsp;</td><td align="left"><input type="text" id="CondoUnit" name="CondoUnit" size="50"></td>				
</tr>
<tr>
	<td align="Right">&nbsp;จำนวนที่จอดรถ:&nbsp;</td><td align="left"><input type="text" id="CarParkUnit" name="CarParkUnit" size="50"></td>
	<td align="Right">&nbsp;ค่าส่วนกลางต่อ ตร.ม.:&nbsp;</td><td align="left"><input type="text" id="CamFee" name="CamFee" size="50"></td>				
</tr>
</Table>
<br>
<div align="center"><input type="submit" value="Add Project"></div>
</form>
<br>
<br>
<br>
<br>
<br>
<br>
