<?php
$user_id=$this->session->userdata('user_id');
$Project=$this->dashboard->ListProjectDeveloper($user_id);
foreach ($Project->result() as $rowProject){
	$ProjectName=$this->dashboard->ProjectDeveloperName($rowProject->PID);
	$ListUnitDeveloper=$this->dashboard->ListUnitDeveloper($rowProject->PID,$user_id);
?>
	<div class="col-md-12 text-center"><h2><?=$ProjectName;?>&nbsp;<a href="/zhome/dashboard/developer_addroom/<?=$rowProject->PID;?>" style="color:#0000A0"><button>+เพิ่มห้องโครงการ</button></a></h2></div>
	<table width="95%" border="1" style="border:1px solid #CCCCCC;">
		<tr style="background-color:#D0D0E8;font-weight:bold;">
			<td align="center">ลำดับที่</td>
			<td align="center">สถานะ</td>
			<td align="center">ตึก</td>
			<td align="center">เลขที่ unit</td>
			<td align="center">แบบห้อง</td>
			<td align="center">ชั้น</td>
			<td align="center">ห้องนอน</td>
			<td align="center">ห้องน้ำ</td>
			<td align="center">ทิศที่มีระเบียง</td>
			<td align="center">พื้นที่</td>
			<td align="center">เงินจอง</td>
			<td align="center">เงินทำสัญญา</td>
			<td align="center">เงินดาวน์</td>
			<td align="center">ราคาสุทธิ</td>
			<td align="center">จัดการ</td>
		</tr>
		<?php
		$i=1;
		foreach ($ListUnitDeveloper->result() as $rowUnit){
		?>
			<tr>
				<td align="center"><?=$i;?></td>
			<?php
				if ($rowUnit->Active=="0"){
					$Status="รออนุมัติ";
					$SChk=0;
				};
				if ($rowUnit->Active=="1"){
					$Status="นำขึ้นแล้ว";
					$SChk=1;
				}
				if ($rowUnit->Active=="82"){
					$Status="ขายแล้ว";
					$SChk=2;
				}
				if ($rowUnit->Bedroom=='99'){
					$Bedroom="สตูดิโอ";
				} else {
					$Bedroom=$rowUnit->Bedroom;
				}
				$query=$this->post->direction();
				foreach ($query->result() as $row){
					$DID=$row->DID;
					if ($rowUnit->Direction == $DID){
						$Direction=$row->DName;
					}
				}
			?>
				<td align="center"><?=$Status;?></td>
				<td align="center"><?=$rowUnit->Tower;?></td>
				<td align="center"><?=$rowUnit->RoomNumber;?></td>
				<td align="center"><?=$rowUnit->RoomType;?></td>
				<td align="center"><?=$rowUnit->Floor;?></td>
				<td align="center"><?=$Bedroom;?></td>
				<td align="center"><?=$rowUnit->Bathroom;?></td>
				<td align="center"><?=$Direction;?></td>
				<td align="right" style="padding-right:2px;"><?=$rowUnit->useArea;?></td>
				<td align="right" style="padding-right:2px;"><?=number_format($rowUnit->DepositPrice,2);?></td>
				<td align="right" style="padding-right:2px;"><?=number_format($rowUnit->DContractPrice1,2);?></td>
				<td align="right" style="padding-right:2px;"><?=number_format($rowUnit->DDownTotalPrice,2);?></td>
				<td align="right" style="padding-right:2px;"><?=number_format($rowUnit->TotalPrice,2);?></td>
			<?php
				if ($SChk==0){
			?>
				<td align="center"><a href="/zhome/del_developer_unit/<?=$rowUnit->POID;?>" style="color:#FF0000;">ลบประกาศ</a></td>
			<?php
				}
				if ($SChk==1){
			?>
				<td align="center"><a href="/zhome/dashboard/edit_developer_room/<?=$rowUnit->POID;?>" style="color:#0000A0">แก้ประกาศ</a>&nbsp;<a href="/zhome/closepost/<?=$rowUnit->Token;?>/<?=date('m');?>/<?=date('Y');?>" style="color:#0000A0">ขายแล้ว</a></td>
			<?php
				}
				if ($SChk==2){
			?>
			<td align="center">&nbsp;</td>
			<?php
				}
			?>

			</tr>
		<?php
			$i++;
		}
		?>
	</table>
	<br>
<?php
}
?>
