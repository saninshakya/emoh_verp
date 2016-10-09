<br>
<div align="center">รายชื่อห้อง</div>
<font color="blue">
<table align="center"><tr><td>
<?php
	$colfix=24;
	$i=1;
	$advertising_check="";
	$active_check="";
	foreach ($listUnit->result() as $row){
		
		if($row->Broker==1){
			$Broker_txt="Y";
		}else{
			$Broker_txt="N";
		}
		
		if($row->PrefixDProfitPrice==1){
			$PrefixDProfitPrice_txt="ต้องการกำไร";
		}else{
			$PrefixDProfitPrice_txt="ยอมขาดทุน";
		}
		
		if($row->StatusPRent==1){
			$StatusPRent_txt="มีผู้เช่า";
		}else{
			$StatusPRent_txt="ว่าง";
		}
		
		if($advertising_check!=$row->TOAdvertising){
			echo "</tr></table><br><table><tr>";
			echo "<td bgcolor='#ffff80' style='color:#ff0000;font-weight:bold;'>&nbsp;ประเภทห้อง :&nbsp;".$row->AName_th."</td>";
			echo "</tr></table>";
			$advertising_check=$row->TOAdvertising;
			$active_check="";
			$i=1;
		}
		?>
		<?php if($i==1){?>
			<table align="center" border="1">
				<tr>
					<td align="center">ลำดับที่</td>
					<td align="center">วันที่ลงประกาศ</td>
					<td align="center">วันที่ทำรายการล่าสุด</td>
					<td align="center">View (V/T)</td>
					<td align="center">โครงการ</td>
					<td align="center">รหัสโครงการ</td>
					<td align="center">ชื่อเจ้าของ</td>
					<td align="center">เบอร์โทร</td>
					<td align="center">LineID</td>
					<td align="center">email</td>
					<td align="center">ตึก</td>
					<td align="center">Unit</td>
					<td align="center">ที่อยู่</td>
					<td align="center">ชั้น</td>
					<td align="center">ห้องนอน</td>
					<td align="center">ห้องน้ำ</td>
					<td align="center">ทิศ</td>
					<td align="center">พื้นที่ใช้สอย</td>
					<td align="center">จำนวนรูปภาพ</td>
					<td align="center">วันหมดอายุ</td>
					<td align="center">ราคารวม</td>
					<?php if($advertising_check==1){//ขาย
						$colfix+=7;
					?>
						<td align="center">ราคาสุทธิที่ต้องการ</td>
						<td align="center">จำนวนวันขาย</td>
						<td align="center">เงินทำสัญญาซื้อขาย</td>
						<td align="center">จำนวนวันโอน</td>
						<td align="center">นายหน้า</td>
						<td align="center">ปีถือครอง</td>
						<td align="center">ราคาประเมิน</td>
					<?}else if($advertising_check==2){//ขายดาวน์
						$colfix+=10;
					?>
						<td align="center">ราคาขายดาวน์</td>
						<td align="center">ราคาที่ซื้อจากโครงการ</td>
						<td align="center">จำนวนวันขาย</td>
						<td align="center">ต้องการกำไร/ขาดทุน</td>
						<td align="center">จำนวนเงินที่ต้องการ</td>
						<td align="center">ค่าธรรมเนียม</td>
						<td align="center">นายหน้า</td>
						<td align="center">เงินจอง/ดาวน์</td>
						<td align="center">ชำระแล้ว</td>
						<td align="center">งวดที่เหลือ</td>
					<?}else if($advertising_check==5){//เช่า
						$colfix+=7;
					?>
						<td align="center">สถานะห้อง</td>
						<td align="center">วันสิ้นสุดสัญญา</td>
						<td align="center">ค่าเช่า</td>
						<td align="center">ระยะเวลาขั้นต่ำ</td>
						<td align="center">เงินมัดจำ</td>
						<td align="center">ล่วงหน้า</td>
						<td align="center">นายหน้า</td>
					<?}?>
					<td align="center">แจ้งเตือนสาเหตุ</td>
					<td align="center">Notes</td>
					<td align="center">Action</td>
				</tr>
		<?}?>
		<?php
		if($active_check!=$row->Active){
			echo "<tr>";
			echo "<td colspan='".$colfix."' bgcolor='#b3ffff' style='color:#000000;font-weight:bold;'>&nbsp;สถานะ :&nbsp;".$row->name_th."</td>";
			echo "</tr>";
			$active_check=$row->Active;
		}

?>
		<tr class="<?if($row->StatusUpdate==1){echo "text-green";}?>" onmouseover="this.style.backgroundColor='#ffff80';" onmouseout="this.style.backgroundColor='';">
			<td align="center">&nbsp;<?=$i;?>&nbsp;<?=$row->POID;?></td>
			<td align="center">&nbsp;<?=$row->DateCreate;?>&nbsp;</td>
			<td align="center">&nbsp;<?=$row->DateUpdate;?>&nbsp;</td>
			<td align="left">&nbsp;<a href="/admin/DetailListView/<?=$row->POID;?>" target="MyWindow"><?=$this->backend->listview($row->POID);?></a></td>
			<td align="left">&nbsp;<?=$row->ProjectName;?>&nbsp;</td>
			<td align="left">&nbsp;<?=$row->PID;?>&nbsp;</td>
			<td align="left">&nbsp;<?=$row->OwnerName;?>&nbsp;</td>
			<td align="left">&nbsp;<?=$row->Telephone1;?>&nbsp;</td>
			<td align="left">&nbsp;<?=$row->LineID;?>&nbsp;</td>
			<td align="left">&nbsp;<?=$row->email1;?>&nbsp;</td>
			<td align="center">&nbsp;<?=$row->Tower;?>&nbsp;</td>
			<td align="center">&nbsp;<?=$row->RoomNumber;?>&nbsp;</td>
			<td align="center">&nbsp;<?=$row->Address;?>&nbsp;</td>
			<td align="center">&nbsp;<?=$row->Floor;?>&nbsp;</td>
			<td align="center">&nbsp;<?=$row->Bedroom;?>&nbsp;</td>
			<td align="center">&nbsp;<?=$row->Bathroom;?>&nbsp;</td>
			<td align="left">&nbsp;<?=$this->search->KeyDirection_th($row->Direction);?>&nbsp;</td>
			<td align="right">&nbsp;<?=$row->useArea;?>&nbsp;</td>
			<td align="right">&nbsp;<?=$this->search->CountImg($row->POID);?>&nbsp;</td>
			<td align="right">&nbsp;<?=$row->DateExpire;?>&nbsp;</td>
			<td align="right">&nbsp;<?=number_format($row->DTotalPrice, 0,'',',');?>&nbsp;</td>
			<?php if($advertising_check==1){//ขาย?>
				<td align="right">&nbsp;<?=number_format($row->DNetPrice, 0,'',',');?>&nbsp;</td>
				<td align="right">&nbsp;<?=$row->AgreePostDay;?>&nbsp;</td>
				<td align="right">&nbsp;<?=number_format($row->DDepositPrice, 0,'',',');?>&nbsp;</td>
				<td align="right">&nbsp;<?=$row->DayOfDeposit;?>&nbsp;</td>
				<td align="center">&nbsp;<?=$Broker_txt;?>&nbsp;</td>
				<td align="center">&nbsp;<?=$row->OwnerYear;?>&nbsp;</td>
				<td align="right">&nbsp;<?=number_format($row->AssetPrice, 0,'',',');?>&nbsp;</td>
			<?}else if($advertising_check==2){//ขายดาวน์?>
				<td align="right">&nbsp;<?=number_format($row->DDownTotalPrice, 0,'',',');?>&nbsp;</td>
				<td align="right">&nbsp;<?=number_format($row->DNetPrice, 0,'',',');?>&nbsp;</td>
				<td align="right">&nbsp;<?=$row->AgreePostDay;?>&nbsp;</td>
				<td align="center">&nbsp;<?=$PrefixDProfitPrice_txt;?>&nbsp;</td>
				<td align="right">&nbsp;<?=number_format($row->DProfitPrice, 0,'',',');?>&nbsp;</td>
				<td align="right">&nbsp;<?=number_format($row->DChangeContractPrice, 0,'',',');?>&nbsp;</td>
				<td align="center">&nbsp;<?=$Broker_txt;?>&nbsp;</td>
				<td align="right">&nbsp;<?=number_format($row->DAllPayment, 0,'',',');?>&nbsp;</td>
				<td align="right">&nbsp;<?=number_format($row->DReadyPayment, 0,'',',');?>&nbsp;</td>
				<td align="right">&nbsp;<?=$row->DStalePaymentMonth;?>&nbsp;</td>
			<?}else if($advertising_check==5){//เช่า?>
				<td align="center">&nbsp;<?=$StatusPRent_txt;?>&nbsp;</td>
				<td align="center">&nbsp;<?=$row->PRentEnd;?>&nbsp;</td>
				<td align="right">&nbsp;<?=number_format($row->PRentPrice, 0,'',',');?>&nbsp;</td>
				<td align="right">&nbsp;<?=$row->MinTimePRent;?>&nbsp;</td>
				<td align="right">&nbsp;<?=$row->DepositPRent;?>&nbsp;</td>
				<td align="right">&nbsp;<?=$row->AdvancePRent;?>&nbsp;</td>
				<td align="center">&nbsp;<?=$Broker_txt;?>&nbsp;</td>
			<?}?>
			<td align="center">&nbsp;<?=$this->dashboard->checkMsg($row->POID);?>&nbsp;</td>
			<td align="center">&nbsp;<?=$this->dashboard->checkMsg2($row->POID);?>&nbsp;</td>
			<td align="center" nowrap>&nbsp;
				<?php
				if($row->Active=='81' || $row->Active=='82'){
				?>
					<a href="#" onclick="cancelHide('<?=$row->POID;?>');">ยกเลิกซ่อน</a>&nbsp;
				<?php
				}
				?>
				<a href="/zhome/adminViewUnitDetail/<?=$row->POID;?>" target="MyWindow">ตรวจสอบ</a>&nbsp;
				<a href="/admin/adminEditUnitDetail/<?=$row->Token;?>" target="MyWindow">แก้ไข</a>&nbsp;
				<a href="/zhome/adminDelUnit/<?=$row->POID;?>/5" onclick="return confirm('ยืนยันการลบประกาศ?')">ลบ</a>&nbsp;
			</td>
		</tr>
<?php
	 $i++;
	}
?>
</table>
</td></tr></table>
<br>

<script language="JavaScript">
function cancelHide(POID){
	$.post("/zhome/adminCancelHideUnit", { 'POID': POID });
	window.location.reload(true);
}
</script>