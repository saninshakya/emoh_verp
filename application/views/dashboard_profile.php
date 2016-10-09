		<div class="row">
			<?php
			echo form_open('/zhome/updateProfile');
			?>
			<input type="hidden" id="user_id" name="user_id" value="<?=$Profile->id;?>">
			<br>
			<Table align="center">
				<tr>
					<td align="Right"><?=$qLabel['first_name'][0];?>:&nbsp;</td><td align="left"><input type="text" id="first_name" name="first_name"  size="50" value="<?=$Profile->firstname;?>">
				</tr>
				<tr height="5px"></tr>
				<tr>
					<td align="Right"><?=$qLabel['last_name'][0];?>:&nbsp;</td><td align="left"><input type="text" id="last_name" name="last_name"  size="50" value="<?=$Profile->lastname;?>">
				</tr>
				<tr height="5px"></tr>
				<tr>
					<td align="Right"><?=$qLabel['email'][0];?>:&nbsp;</td><td align="left"><input type="text" id="email" name="email"  size="50" value="<?=$Profile->email;?>">
				</tr>
				<tr height="5px"></tr>
				<tr>
					<td align="Right"><?=$qLabel['telephone'][0];?>:&nbsp;</td><td align="left"><input type="text" id="telephone" name="telephone"  size="50" value="<?=$Profile->telephone;?>">
				</tr>
				<tr height="5px"></tr>
				<tr>
					<td align="Right"><?=$qLabel['line_id'][0];?>:&nbsp;</td><td align="left"><input type="text" id="line_id" name="line_id"  size="50" value="<?=$Profile->line_id;?>">
				</tr>
			</Table>
			<br>
			<div align="center"><input type="submit" value="แก้ไขข้อมูล" onclick="confirm('ยืนยันการแก้ไขข้อมูล')"></div>
			</form>
		</div>