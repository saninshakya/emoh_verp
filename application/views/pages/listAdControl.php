<font color="blue">
	<div class="container">
		<div align="Center"><b>Banner Management</b></div>
		<br>
		<table class="table table-bordered" border="1" style="width:100%; margin:0 auto;">
			<tr>
				<th>Page</th>
				<th>Device Type</th>
				<th>File</th>
				<th>Start Date</th>
				<th>End Date</th>
				<th>Active</th>
			</tr>

			<?php
			foreach ($listAdControl->result() as $row){
				?>
				<tr>
					<td align="left" style="display:none;"><?=$row->id;?></td>
					<td align="left"><?=$row->page;?></td>
					<td align="center"><?=$row->device_type==1?'Desktop':'Mobile';?></td>
					<td align="center"><img src="<?='/img/'.$row->filename;?>" style="height:50px;"></td>
					<td align="center"><?=$row->start_date;?></td>
					<td align="center"><?=$row->end_date;?></td>
					<?php if(($row->Active)==0){ ?>
					<td align="center"><img src="/img/off.jpg" class="active" id="<?=$row->id;?>"></td>
					<?php }else{ ?>
					<td align="center"><img src="/img/on.jpg" class="inactive" id="<?=$row->id;?>"></td>
					<?php } ?>
				</tr>
				<?php
			}

			?>
		</table>
	</div>
</font>
<br>
<script language="javascript">
	$(function(){
		$('.active').click(function(e) {
			var id = $(this).attr('id');
			var array = id.concat(',','1');
			$.post('/admin/adControlActive',{data:array},function(data){

        //post the response after inserting in the database;
    },'json');
		});

		$('.inactive').click(function(e) {
			var id = $(this).attr('id');
		});

	});

</script>