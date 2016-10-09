</div>
<br>
<?php
$attributes = array('class' => 'form-inline', 'id' => 'myform');
echo form_open('/admin/viewUnitBoostPostList',$attributes);
?>
<div class="container-fluid">
	<div class="col-lg-offset-1 col-lg-10 col-md-offset-1 col-md-10 col-sm-12 col-xs-12">
		<font color="blue">
		<table align="center" border="0">
			<tr>
				<td align="right">Type : </td>
				<td>&nbsp;
					<select name="viewType">
						<option value="default" <?if($viewType=='default'){echo "selected";}?>>default</option>
						<option value="searchmap" <?if($viewType=='searchmap'){echo "selected";}?>>searchmap</option>
						<option value="unitdetail" <?if($viewType=='unitdetail'){echo "selected";}?>>unit</option>
					</select>
				</td>
			</tr>
			<tr height="5px"><td></td></tr>
			<tr>
				<td>&nbsp;</td>
				<td align="right"><?php echo form_submit('search','ค้นหา');?></td>
			</tr>
		</table>
		</font>
		<br>
	</div>
</div>
<?php echo form_close();?>