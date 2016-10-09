<?php
$user_id=$this->session->userdata('user_id');
$ProjectName=$this->dashboard->ProjectDeveloperName($PID);
echo form_open('/zhome/developer_addunit');
?>
<input type="hidden" name="PID" id="PID" value="<?=$PID;?>">
<input type="hidden" name="ProjectName" id="ProjectName" value="<?=$ProjectName;?>">
<h2 class="text-center"><?=$ProjectName;?></h2>
<div class="container-fluid">
	<div class="row" style="margin-bottom:5px;">
		<label for="inputRoomName" class="col-md-2 col-sm-2 col-xs-4 control-label text-right padding-none" style="padding-top:10px;">แบบห้อง : </label>
		<div class="col-md-4 col-sm-4 col-xs-8 text-left">
			<select id="RoomName" name="RoomName" class="form-control input-z" style="width:110px;">
				<option value="0" selected disabled>โปรดเลือก</option>
				<?php
				$ListRoomName=$this->developer->ListRoomName($PID);
				foreach ($ListRoomName->result() as $rowRoomName){
					$RoomName=$rowRoomName->RoomName;
				?>
					<option value="<?=$RoomName;?>"><?=$RoomName;?></option>
				<?php
					}
				?>
			</select>
		</div>
		<div style="margin-bottom:5px;">
			<label for="inputTower" class="col-md-2 col-sm-2 col-xs-4 control-label text-right padding-none" style="padding-top:10px;">ตึก : </label>
			<div class="col-md-4 col-sm-4 col-xs-8 text-left">
				<input type="text" id="Tower" name="Tower" size="10" class="form-control input-z" style="width:110px;">
			</div>
		</div>
	</div>
	<div class="row" style="margin-bottom:5px;">
		<label for="inputUnit" class="col-md-2 col-sm-2 col-xs-4 control-label text-right padding-none" style="padding-top:10px;">เลขที่ unit : </label>
		<div class="col-md-4 col-sm-4 col-xs-8 text-left">
			<input type="text" id="RoomNumber" name="RoomNumber" size="10" class="form-control input-z" style="width:110px;">
		</div>
		<div style="margin-bottom:5px;">
			<label for="inputFloor" class="col-md-2 col-sm-2 col-xs-4 control-label text-right padding-none" style="padding-top:10px;">ชั้น : </label>
			<div class="col-md-4 col-sm-4 col-xs-8 text-left">
				<input type="text" id="Floor" name="Floor" size="10" class="form-control input-z" style="width:110px;">
			</div>
		</div>
	</div>
	<div class="row" style="margin-bottom:5px;">
		<label for="inputBedroom" class="col-md-2 col-sm-2 col-xs-4 control-label text-right padding-none" style="padding-top:10px;">ห้องนอน : </label>
		<div class="col-md-4 col-sm-4 col-xs-8 text-left">
			<select id="Bedroom" name="Bedroom" class="form-control input-z" style="width:110px;">
				<option selected="true" disabled="disabled" value="0">โปรดเลือก</option>
				<option value="99">ห้องสตูดิโอ</option>
				<option value="1">1 ห้องนอน</option>
				<option value="2">2 ห้องนอน</option>
				<option value="3">3 ห้องนอน</option>
				<option value="4">4 ห้องนอน</option>
			</select>
		</div>
		<div style="margin-bottom:5px;">
			<label for="inputBathroom" class="col-md-2 col-sm-2 col-xs-4 control-label text-right padding-none" style="padding-top:10px;">ห้องน้ำ : </label>
			<div class="col-md-4 col-sm-4 col-xs-8 text-left">
				<select id="Bathroom" name="Bathroom" class="form-control input-z" style="width:110px;">
					<option selected="true" disabled="disabled" value="0">โปรดเลือก</option>
					<option value="1">1 ห้องน้ำ</option>
					<option value="2">2 ห้องน้ำ</option>
					<option value="3">3 ห้องน้ำ</option>
					<option value="4">4 ห้องน้ำ</option>
				</select>
			</div>
		</div>
	</div>
	<div class="row" style="margin-bottom:5px;">
		<label for="inputDirection" class="col-md-2 col-sm-2 col-xs-4 control-label text-right padding-none" style="padding-top:10px;">ทิศที่มีระเบียง : </label>
		<div class="col-md-4 col-sm-4 col-xs-8 text-left">
			<select id="Direction" name="Direction" class="form-control input-z" style="width:auto;">
				<option selected="true" disabled="disabled" value="0">โปรดเลือก</option>
				<?php
				$query=$this->post->direction();
				foreach ($query->result() as $row){
				?>
					<option value="<?echo $row->DID;?>"><?echo $row->DName;?></option>
				<?php
				}
				?>
			</select>
		</div>
		<label for="inputUseArea" class="col-md-2 col-sm-2 col-xs-4 control-label text-right padding-none" style="padding-top:10px;">พื้นที่ : </label>
		<div class="col-md-4 col-sm-4 col-xs-8 text-left">
			<input type="number" id="useArea" name="useArea" size="10" class="form-control input-z" style="width:110px;" placeholder="0.00"> ตร.ม.
		</div>
	</div>
	<div class="row" style="margin-bottom:5px;">
		<label for="inputDepositPrice" class="col-md-2 col-sm-2 col-xs-4 control-label text-right padding-none" style="padding-top:10px;">เงินจอง : </label>
		<div class="col-md-4 col-sm-4 col-xs-8 text-left">
			<input type="number" id="DepositPrice" name="DepositPrice" size="10" class="form-control input-z" style="width:110px;" placeholder="0"> บาท
		</div>
		<label for="inputDContractPrice1" class="col-md-2 col-sm-2 col-xs-4 control-label text-right padding-none" style="padding-top:10px;">เงินทำสัญญา : </label>
		<div class="col-md-4 col-sm-4 col-xs-8 text-left">
			<input type="number" id="DContractPrice1" name="DContractPrice1" size="10" class="form-control input-z" style="width:110px;" placeholder="0"> บาท
		</div>
	</div>
	<div class="row" style="margin-bottom:5px;">
		<label for="inputDDownTotalPrice" class="col-md-2 col-sm-2 col-xs-4 control-label text-right padding-none" style="padding-top:10px;">เงินดาวน์ : </label>
		<div class="col-md-4 col-sm-4 col-xs-8 text-left">
			<input type="number" id="DDownTotalPrice" name="DDownTotalPrice" size="10" class="form-control input-z" style="width:110px;" placeholder="0"> บาท
		</div>
		<label for="inputTotalPrice" class="col-md-2 col-sm-2 col-xs-4 control-label text-right padding-none" style="padding-top:10px;">ราคาสุทธิ : </label>
		<div class="col-md-4 col-sm-4 col-xs-8 text-left">
			<input type="number" id="TotalPrice" name="TotalPrice" size="10" class="form-control input-z" style="width:110px;" placeholder="0"> บาท
		</div>
	</div>
	<div class="row" style="margin-bottom:5px;">
		<div class="col-md-offset-8 col-sm-offset-8 col-xs-offset-4 col-md-4 col-sm-4 col-xs-8 text-left">
			<input type="submit" value="บันทึก">
		</div>
	</div>
</div>

<!--<table width="95%" border="0" cellspacing="2">
	<tr>
		<td align="right">แบบห้อง :</td>
		<td align="left">
			<select name="RoomName">
				<option selected="true" disabled="disabled" value="0">โปรดเลือก</option>
				<?php
				$ListRoomName=$this->developer->ListRoomName($PID);
				foreach ($ListRoomName->result() as $rowRoomName){
					$RoomName=$rowRoomName->RoomName;
				?>
					<option value="<?=$RoomName;?>"><?=$RoomName;?></option>
				<?php
					}
				?>
			</select>
		</td>
	</tr>
	<tr>
		<td align="right">ตึก :</td>
		<td align="left"><input type="text" name="Tower" id="Tower" size="50"></td>
	</tr>
	<tr>
		<td align="right">เลขที่ unit :</td>
		<td align="left"><input type="text" name="RoomNumber" id="RoomNumber" size="50"></td>
	</tr>
		<td align="right">ชั้น :</td>
		<td align="left"><input type="text" name="Floor" id="Floor" size="50"></td>
	</tr>
	<tr>
		<td align="right">ห้องนอน :</td>
		<td align"left">
			<select name="Bedroom">
				<option selected="true" disabled="disabled" value="0">โปรดเลือก</option>
				<option value="99">ห้องสตูดิโอ</option>
				<option value="1">1 ห้อนนอน</option>
				<option value="2">2 ห้อนนอน</option>
				<option value="3">3 ห้อนนอน</option>
				<option value="4">4 ห้อนนอน</option>
			</select>
		</td>
	</tr>
	<tr>
		<td align="right">ห้องน้ำ :</td>
		<td align="left">
			<select name="Bathroom">
				<option selected="true" disabled="disabled" value="0">โปรดเลือก</option>
				<option value="1">1 ห้อนนน้ำ</option>
				<option value="2">2 ห้อนน้ำ</option>
				<option value="3">3 ห้อนน้ำ</option>
				<option value="4">4 ห้อนน้ำ</option>
			</select>
		</td>
	</tr>
	<tr>
		<td align="right">ทิศที่มีระเบียง :</td>
		<td align="left">
			<select name="Direction" id="Direction">
				<option selected="true" disabled="disabled" value="0">โปรดเลือก</option>
				<?php
				$query=$this->post->direction();
				foreach ($query->result() as $row){
				?>
					<option value="<?echo $row->DID;?>"><?echo $row->DName;?></option>
				<?php
				}
				?>
			</select>
		</td>
	</tr>
	<tr>
		<td align="right">พื้นที่ :</td>
		<td align="left"><input type="text" name="useArea" id="useArea" size="50">ตร.ม.</td>
	</tr>
	<tr>
		<td align="right">เงินจอง :</td>
		<td align="left"><input type="text" name="DepositPrice" id="DepositPrice" size="50">บาท</td>
	</tr>
	<tr>
		<td align="right">เงินทำสัญญา :</td>
		<td align="left"><input type="text" name="DContractPrice1" id="DContactPrice1" size="50">บาท</td>
	</tr>
	<tr>
		<td align="right">เงินดาวน์ :</td>
		<td align="left"><input type="text" name="DDownTotalPrice" id="DDownTotalPrice" size="50">บาท</td>
	</tr>
	<tr>
		<td align="right">ราคาสุทธิ :</td>
		<td align="left"><input type="text" name="TotalPrice" id="TotalPrice" size="50">บาท</td>
	</tr>
	<tr>
		<td colspan="2" align="center">
			<input type="submit" value="บันทึก">
		</td>
	 </tr>
</table>-->
</form>
<br>
