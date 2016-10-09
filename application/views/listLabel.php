<?php
echo form_open('/zhome/updateLabel');
echo form_hidden('Label',$Label);
echo form_hidden('ActiveLabel',$ActiveLabel);
?>
<font color="blue">
<table align="center">
	<tr>
		<td>
			<table align="center" border="1" cellspacing="1" cellpadding="1">
				<tr>
					<td align="center">ลำดับที่</td>
					<td align="center">Label ID</td>
					<td align="center">ประเภท</td>
					<td align="center">ชื่อ Label</td>
					<td align="center">ภาษา</td>
					<td align="center">คำแปล</td>
					<td align="center">รายละเอียด</td>
					<td align="center">สถานะ</td>
				</tr>
				<?php
					$i=0;
					$no=1;
					foreach ($listLabel->result() as $row){
						if($row->language==1){
							$language="TH";
						}else{
							$language="ENG";
						}
				?>
						<tr onmouseover="this.style.backgroundColor='#ffff80';" onmouseout="this.style.backgroundColor='';">
							<td align="center">&nbsp;<?=$no;?>&nbsp;</td>
							<td align="center">&nbsp;<?=$row->id;?>&nbsp;</td>
							<td align="center">&nbsp;<?=$row->type;?>&nbsp;</td>
							<td align="left">&nbsp;<?=$row->label;?>&nbsp;</td>
							<td align="left">&nbsp;<?=$language;?>&nbsp;</td>
							<td align="center">&nbsp;
								<textarea id="desc[<?=$i;?>]" name="desc[<?=$i;?>]" cols="30" rows="2"><?=$row->description;?></textarea>&nbsp;
							</td>
							<td align="left">&nbsp;<?=$row->detail;?>&nbsp;</td>
							<td align="left">&nbsp;
								<input type="radio" name="status[<?=$i;?>]" value="1" <?php if($row->status==1){echo "checked";}?>>&nbsp;ใช้งาน
								<input type="radio" name="status[<?=$i;?>]" value="0" <?php if($row->status==0){echo "checked";}?>>&nbsp;ยกเลิก&nbsp;
								<?php
								echo form_hidden('lid['.$i.']',$row->id);
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
<br>