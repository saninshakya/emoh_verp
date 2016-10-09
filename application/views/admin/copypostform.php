</div>
<div class="container-fluid">
	<div class="col-lg-offset-3 col-lg-6 col-md-offset-3 col-md-6 col-sm-12 col-xs-12">
		<div align="center">
		</div>
		<br>
		<?php
		echo form_open('/admin/dupsellrent');
		?>
		<div align="center">
		<h1><b>Copy Post</b></h1>
		</div>
		<table class="table borderless">
			<tr>
				<td width="20%" align="right"><b>POID :</b></td>
				<td width="80%" align="left"><input type="text" name="POID" size="10" value="" style="width:100px;"></td>
			</tr>
			<tr>
				<td width="20%" align="right"><b>Type :</b></td>
				<td width="80%" align="left">
					<select name="TOAdvertising">
						<!--<option value="1">ขาย</option>
						<option value="2">ขายดาวน์</option>-->
						<option value="5" selected>เช่า</option>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" value="Submit"></td>
			</tr>
		</table>
		</form>
		<br>
	</div>
</div>