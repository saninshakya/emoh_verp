<br>
<div align="center">รายการแจ้งปัญหา</div>
<?php
echo form_open('/zhome/updateHelpdesk');
?>
<font color="blue">
<table align="center">
	<tr>
		<td>
			<table align="center" border="1" cellspacing="1" cellpadding="1">
				<tr>
					<td align="center" rowspan="2">ลำดับที่</td>
					<td align="center" rowspan="2">HID</td>
					<td align="center" rowspan="2">ประเภท</td>
					<td align="center" rowspan="2">ชื่อ-สกุลผู้แจ้ง</td>
					<td align="center" rowspan="2">อีเมล์ผู้แจ้ง</td>
					<td align="center" rowspan="2">เบอร์ติดต่อผู้แจ้ง</td>
					<td align="center" rowspan="2">เจ้าของห้อง</td>
					<td align="center" rowspan="2">เบอร์ติดต่อ</td>
					<td align="center" rowspan="2">โครงการ</td>
					<td align="center" rowspan="2">เบอร์ห้อง</td>
					<td align="center" rowspan="2">บ้านเลขที่</td>
					<td align="center" rowspan="2">รายละเอียด</td>
					<td align="center" rowspan="2">สถานะ</td>
					<td align="center" colspan="3">Action</td>
					<tr>
						<td align="center">&nbsp;</td>
						<td align="center">ตรวจสอบ</td>
					</tr>
				</tr>
			<?php
				$query=$this->db->query('select a.*,c.name_th as problem_name,b.ownername,b.PID,b.projectname,b.roomnumber,b.address,b.floor,b.telephone1,d.aname_th 
				from Helpdesk a left join Post b on a.POID=b.POID left join cfg_master c on a.problem_type=c.id and c.type="problem" 
				left join TOAdvertising d on b.toadvertising=d.toaid
				where a.status=1 order by a.problem_type,a.informer_check,b.toadvertising ');
				$i=0;
				$no=1;
				$problem="";
				foreach ($query->result() as $row){
					if($row->informer_check==0){
						$check_name="รอตรวจสอบ";
						$font_color="#ff0000";
					}else{
						$check_name="ตรวจสอบแล้ว";
						$font_color="#00ff80";
					}
					if($problem!=$row->problem_type){
						echo "<tr>";
						echo "<td colspan='15' bgcolor='#ffff80' style='color:#ff0000;'>&nbsp;ปัญหา :&nbsp;".$row->problem_name."</td>";
						echo "</tr>";
						$problem=$row->problem_type;
					}
			?>
					<tr onmouseover="this.style.backgroundColor='#ffff80';" onmouseout="this.style.backgroundColor='';">
						<td align="center"><?=$no;?></td>
						<td align="center"><?=$row->HID;?></td>
						<td align="left">&nbsp;&nbsp;<?=$row->aname_th;?></td>
						<td align="left">&nbsp;&nbsp;<?=$row->informer_name;?></td>
						<td align="left">&nbsp;&nbsp;<?=$row->informer_email;?></td>
						<td align="left">&nbsp;&nbsp;<?=$row->informer_telphone;?></td>
						<td align="left">&nbsp;&nbsp;<?=$row->ownername;?></td>
						<td align="left">&nbsp;&nbsp;<?=$row->telephone1;?></td>
						<td align="left">&nbsp;&nbsp;<?=$row->projectname;?></td>
						<td align="left">&nbsp;&nbsp;<?=$row->roomnumber;?></td>
						<td align="left">&nbsp;&nbsp;<?=$row->address;?></td>
						<td align="left">&nbsp;&nbsp;<?=utf8_wordwrap($row->informer_detail,30,"<br>",true);?></td>
						<td align="left"><font color="<?=$font_color;?>"><?=$check_name?></font></td>
						<td align="center">
							<a href="/zhome/unitDetail2/<?=$row->POID;?>" target="_blank"><u>ดูรายละเอียด</u></a>&nbsp;
						</td>
						<td align="center">
							<?php
							if($row->informer_check==0){
								echo form_radio('check_pass['.$i.']','1',False).'Ok';
								echo "&nbsp;";
								echo form_radio('check_pass['.$i.']','0',False).'Reject';
							}
							echo form_hidden('hid['.$i.']',$row->HID);
							?>
						</td>
					</tr>
			<?php
					$i++;
					$no++;
				}
			?>
			</table>
		</td>
	</tr>
	<tr height="10pt"><td></td></tr>
	<tr>
		<td align="right"><?php echo form_submit('save','ยืนยัน');echo form_reset('cancel','ยกเลิก');?></td>
	</tr>
	</tr>
</table>
</font>
<br>
<?echo form_close();?>
