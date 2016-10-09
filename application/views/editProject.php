<?php echo $map['html']; ?>
<br>
<br>
<?php
$row=$query->row();
echo form_open('/zhome/editProject2');
$token=$this->session->userdata('token');
$this->db->query('delete from checkUpload where token="'.$token.'"');
$token=time().$user_id;
$token=md5($token);
$this->session->set_userdata('token',$token);
$query2=$this->db->query('select * from Province');
?>
<input type="hidden" id="user_id" name="user_id" value="<?php echo $this->tank_auth->get_user_id(); ?>" >
<input type="hidden" id="PID" name="PID" value="<?=$row->PID;?>">
<Table align="center">
<tr>
	<td align="Right">&nbsp;ชื่อไทย:&nbsp;</td><td align="left"><input type="text" id="PName_th"  Name="PName_th" size="50" value="<?=$row->PName_th;?>"></td>
	<td align="Right">&nbsp;ชื่อ English:&nbsp;</td><td align="left"><input type="text" id="PName_en" name="PName_en"  size="50" value="<?=$row->PName_en;?>"></td>
</tr>
<tr>
	<td align="Right">&nbsp;ชื่อย่อไทย:&nbsp;</td><td align="left"><input type="text" id="SName_th"  Name="SName_th" size="50" value="<?=$row->SName_th;?>" style="width:150px;"></td>
	<td align="Right">&nbsp;ชื่อย่อ English:&nbsp;</td><td align="left"><input type="text" id="SName_en" name="SName_en"  size="50" value="<?=$row->SName_en;?>" style="width:150px;"></td>
</tr>
<tr>
	<td align="Right">&nbsp;Lat:&nbsp;</td><td align="left"><input type="text" id="Lat" name="Lat"  size="50" value="<?=$row->Lat;?>"></td>
	<td align="Right">&nbsp;Lat:&nbsp;</td><td align="left"><input type="text" id="Lng" name="Lng"  size="50" value="<?=$row->Lng;?>"></td>
</tr>
<tr>
	<td align="Right">&nbsp;บ้านเลขที่:&nbsp;</td><td align="left"><input type="text" id="Address" name="Address" size="50" value="<?=$row->Address?>"></td>
	<td align="Right">&nbsp;</td>
</tr>
<tr>
	<td align="Right">&nbsp;ซอย:&nbsp;</td><td align="left"><input type="text" id="Soi" name="Soi" size="50" value="<?=$row->Soi;?>"></td>
	<td align="Right">&nbsp;ถนน:&nbsp;</td><td align="left"><input type="text" id="Road" name="Road" size="50" value="<?=$row->Road;?>"></td>		
</tr>
<tr>
	<td align="Right">&nbsp;แขวง:&nbsp;</td><td align="left"><input type="text" id="District" name="District" size="50" value="<?=$row->District;?>"></td>
	<td align="Right">&nbsp;เขต:&nbsp;</td><td align="left"><input type="text" id="Area" name="Area" size="50" value="<?=$row->Area;?>"></td>			
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
	<td align="Right">&nbsp;Zip code:&nbsp;</td><td align="left"><input type="text" id="Zipcode" name="Zipcode" size="50" value="<?=$row->Zipcode;?>"></td>				
</tr>
<tr>
	<td align="Right">&nbsp;ปีที่สร้างเสร็จ:&nbsp;</td><td align="left"><input type="text" id="YearEnd" name="YearEnd" size="50" value="<?=$row->YearEnd;?>"></td>
	<td align="Right">&nbsp;จำนวนยูนิต:&nbsp;</td><td align="left"><input type="text" id="CondoUnit" name="CondoUnit" size="50" value="<?=$row->CondoUnit;?>"></td>				
</tr>
<tr>
	<td align="Right">&nbsp;จำนวนที่จอดรถ:&nbsp;</td><td align="left"><input type="text" id="CarParkUnit" name="CarParkUnit" size="50" value="<?=$row->CarParkUnit;?>"></td>
	<td align="Right">&nbsp;ค่าส่วนกลางต่อ ตร.ม.:&nbsp;</td><td align="left"><input type="text" id="CamFee" name="CamFee" size="50" value="<?=$row->CamFee;?>"></td>				
</tr>
</Table>
<br>
<div align="center"><input type="submit" value="Edit Project"></div>
</form>
<br>
				<div align="center">
				<div id="waiting4"></div>
				</div>
				<form enctype="multipart/form-data" method="post" action="/zhome/uploadResizedProject" class="center-block">
				    <!--Added Dec7-->
                    <div align="center"><h5><a class="text-red2" style="position: relative;overflow: hidden;" href='#'>+ เพิ่มรูปโครงการ<input style="position:absolute;top:0;left:0;opacity:0;" type="file" name="filesToUpload[]" id="filesToUpload" multiple="multiple" accept="image/*" /></a></h5></div>
                    <!--End Added Dec7-->
					<!--<div align="center"><input type="file" name="filesToUpload[]" id="filesToUpload" multiple="multiple" accept="image/*" onclick='document.getElementById("imgType").value= "room";'/></div>-->
				</form>
<br>
<Table align="center" border=0 width="80%" cellpadding=10 cellspacing=10>
<?php
	$i=0;
	$fin= sizeof($queryImg);
	while ( $i<$fin){
?>
<tr>
	<td align="center" width="50%">
		<img src="/<?=$queryImg[$i];?>" height="300">
	</td>
<?php
		$ImgUse="/".$queryImg[$i];
		$checkImg=$this->backend->chkImgUse($ImgUse);
		if ($checkImg==0){
?>
	<td align="center">
		<a href="/zhome/delImgProject/<?=$queryImg[$i];?>">Delete</a>
	</td>
<?php
		} else {
?>
	<td align="center">
		มีประกาศใช้รูปนี้อยู่จำนวน <?=$checkImg;?> ประกาศ
	</td>
<?php
};
?>
	<td align="center">
		ชื่อรูป <?=$queryImg[$i];?> 
	</td>
</tr>
<tr>
	<td align="center" width="50%">
		&nbsp;
	</td>
	<td align="center">
		&nbsp;
	</td>
	<td align="center">
		&nbsp;
	</td>
</tr>
<?php
		$i++;
	};
?>
</table>
<br>
<?php
	echo form_open('/zhome/RenameImgProject');
?>
<input type="hidden" id="PID" name="PID" value="<?=$row->PID;?>">
<table border="0" width="60%" align="center">
<tr>
<td align="center">
เปลี่ยนชื่อรูปใน database (รูปเดิม)<input type="text" id="ToFile" name="ToFile" size="100" >
</td >
<td align="center">
ไปเป็นชื่อรูป (ที่ใส่ใหม่)<input type="text" id="FromFile" name="FromFile" size="100" >
</td>
<tr><td colspan="2" align="center">
<input type="submit"  value="Rename File" >
</td></tr>
</table>
</form>
<br>
<br>
<br>
