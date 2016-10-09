<?php echo form_open_multipart('zhome/do_upload');?>
	<div class="col-md-12 text-center">
		<div class="search-button pull-left">File Type :</div>
		<div>&nbsp;</div>
		<div class="pull-left">
			<select name="file_type">
				<option value="1">ให้เช่า</option>
				<option value="2">ขายดาวน์</option>
				<!-- <option value="3">ขายขาด</option> -->
			</select>
		</div>
	</div>
	<br><br>

	<div class="col-md-12 text-center">
		<div class="search-button pull-left">Select File :</div>
		<div>&nbsp;</div>
		<div class="pull-left"><input type="file" name="userfile" size="20" /></div>
	</div>

	<br /><br />
	<div class="col-md-12 text-center">
		<div>&nbsp;</div>
		<div class="pull-left"><input type="submit" value="upload" /></div>
	</div>
<?php echo form_close();?>