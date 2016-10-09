</div>
<div class="container-fluid">
	<div class="col-lg-offset-1 col-lg-10 col-md-offset-1 col-md-10 col-sm-12 col-xs-12">
		<div align="center">
		<h1><b><?=$txtSus;?></b></h1>
		</div>
		<br>
		<div align="center">
		  <h1><b>เพิ่ม Coin ลูกค้า</b></h1>
		</div>
		<hr>
		<?php
		echo form_open('/admin/addcoin');
		?>
		<input type="hidden" name="AddCoin" value="0">
		<div align="center">
		<h1><b>ค้นหา user_id รายละเอียด coin</b></h1>
		</div>
		<table class="table borderless">
		  <tr>
			  <td width="30%" align="right">POID :</td>
			  <td width="70%" align="left"><input name="search_poid" type="text" value="" size="30"></td>
		  </tr>
		  <tr>
			<td width="30%" align="right">user_id :</td>
			<td width="70%" align="left"><input name="search_user_id" type="text" value="" size="30"></td>
		  </tr>
		  <tr>
			<td width="30%" align="right">MessengerID :</td>
			<td width="70%" align="left"><input name="search_messenger_id" type="text" value="" size="30"></td>
		  </tr>
		  <tr>
			  <td width="30%" align="right">email :</td>
			  <td width="70%" align="left"><input name="search_email" type="text" value="" size="60"></td>
		  </tr>
		  <tr>
			  <td width="30%" align="right">Telphone :</td>
			  <td width="70%" align="left"><input name="search_telphone" type="text" value="" size="30"></td>
		  </tr>
		  <tr>
			  <td width="30%" align="right">ชื่อ :</td>
			  <td width="70%" align="left"><input name="search_firstname" type="text" value="" size="60"></td>
		  </tr>
		  <tr>
			  <td width="30%" align="right">นามสกุล :</td>
			  <td width="70%" align="left"><input name="search_lastname" type="text" value="" size="30"></td>
		  </tr>
		  <tr>
			  <td align="center" colspan="2"><input type="submit" value="ค้นหา"></td>
		  </tr>
		</table>
		</form>
		<br>
		<?php
		if ($User!="null" and $User!=''){
		?>
		<div class="table-responsive">
			<table class="table table-bordered table-hover">
				<thead>
					<tr>
						<td width="10%" align="center">
							<b>user_id</b>
						</td>
						<td width="30%" align="center">
							<b>email</b>
						</td>
						<td width="30%" align="center">
							<b>Firstname Lastname</b>
						</td>
						<td width="15%" align="center">
							<b>Tel.</b>
						</td>
						<td width="15%" align="center">
							<b>Coin</b>
						</td>
					</tr>
				</thead>
				<tbody>
				<?php
				foreach ($User->result() as $row) {
				?>
					<tr>
						<td width="10%" align="center">
							<?=$row->id;?>
						</td>
						<td width="30%" align="left">
							<?=$row->email;?>
						</td>
						<td width="30%" align="left">
							<?=$row->firstname;?>&nbsp;<?=$row->lastname;?>
						</td>
						<td width="15%" align="center">
							<?=$this->credit->findAllPhone($row->id);?>
						</td>
						<td width="15%" align="center">
							<?=$this->credit->CreditBanlanceUser($row->id);?>
						</td>
					</tr>
				<?php
				}
				?>
				</tbody>
			</table>
		</div>
		<?php
		}
		?>
		<br>
		<hr>
		<?php
		echo form_open('/admin/addcoin');
		?>
		<input type="hidden" name="AddCoin" value="1">
		<div align="center">
		<h1><b>เพิ่ม Coin ให้ลูกค้า</b></h1>
		</div>
		<table class="table borderless">
		  <tr>
			<td width="20%" align="right"><b>user_id :</b></td>
			<td width="80%" align="left"><input type="text" name="user_id" size="10" value=""></td>
		  </tr>
		  <tr>
			<td width="20%" align="right"><b>Coin :</b></td>
			<td width="80%" align="left"><input type="text" name="coin" size="10" value=""></td>
		  </tr>
		  <tr>
			<td width="20%" align="right"><b>Ref. Number :</b></td>
			<td width="80%" align="left"><input type="text" name="RefNumber" size="20" value=""></td>
		  </tr>
		<input type="hidden" name="admin_user_id" value="">
		  <tr>
			<td colspan="2" align="center"><input type="submit" value="เพิ่ม Coin"></td>
		  </tr>
		</table>
		</form>
		<br>
	</div>
</div>