<?php
$Msg=$this->backend->qMsg($POID,1);
$Msg2=$this->backend->qMsg($POID,2);
$PName=$this->dashboard->ProjectNameFolder($POID);
$PName=str_replace("/", "-sl-", $PName);
?>
<br>
<div class="col-xs-12 col-md-7 col-md-offset-1 unitdetail-container" style="overflow: hidden;">
	<div align="center">
		link for share <b>http://zmyhome.com/<?=$this->dashboard->PostPathName($POID);?>/condo/<?=$PName;?>/<?=$POID;?></b>	
	</div>
	<br>
	<?php
	echo form_open('/zhome/activatePost');
	?>
	<input type="hidden" name="POID" id="POID" value="<?=$POID;?>">
	<input type="hidden" name="approvePost" id="approvePost" value="0">
	<input type="hidden" name="sendEmail" id="sendEmail" value="0">
	<input type="hidden" name="blockPost" id="blockPost" value="0">
	<div align="center">
		<textarea rows="4" cols="50" name="Msg2" id="Msg2"><?=$Msg2;?></textarea>
	</div>
	<div align="center" style="padding-top:5px;">
		<input type="checkbox" id="checkApprovePost" name="checkApprovePost" onclick="if($(this).is(':checked')){$('#approvePost').val('1');}else{$('#approvePost').val('0');}"> Approve no Email | 
		<input type="checkbox" id="checkSendEmail" name="checkSendEmail" onclick="if($(this).is(':checked')){$('#sendEmail').val('1');}else{$('#sendEmail').val('0');}"> Approve & Send Email
	</div>
	<div class="row">&nbsp;</div>
	<div align="center">
		<textarea rows="4" cols="50" name="Msg" id="Msg"><?=$Msg;?></textarea>
	</div>
	<div align="center" style="padding-top:5px;">
		<input type="checkbox" id="checkApprovePost" name="checkApprovePost" onclick="if($(this).is(':checked')){$('#blockPost').val('1');}else{$('#blockPost').val('0');}"> Block Post & Send Email
	</div>
	<div align="center" style="padding-top:5px;">
		<input type="submit" value="Submit">
	</div>
	<div class="row">&nbsp;</div>
	<div align="center">
		<select id="recall" name="recall">
			<option value="0">ยังไม่ได้ติดต่อ</option>
			<option value="1">Recall ครั้งที่ 1</option>
			<option value="2">Recall ครั้งที่ 2</option>
			<option value="3">Recall ครั้งที่ 3</option>
		</select>
	</div>
	</form>
	<?php
	//echo form_open('/zhome/activatePostAndEmail');
	?>
	<!--<br>
	<input type="hidden" name="POID" id="POID" value="<?=$POID;?>">
	<div align="center">
		<input type="submit" value="Approve Post & Send Email">
	</div>
	</form>-->
	<?php
	$row=$unit->row();
	?>
	<br>
	<div align="center">
		<a href="/admin/adminEditUnitDetail/<?=$row->Token;?>">แก้ไข</a>&nbsp;</td>
	</div>
	<br>
</div>