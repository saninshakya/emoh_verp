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
					<td align="center"><img src="/img/off.jpg" class="inactive"></td>
					<?php }else{ ?>
					<td align="center"><img src="/img/on.jpg" class="active"></td>
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
		$('td').on('click','img',function(e){
			e.preventDefault();
			if ($(this).hasClass('active')){
				var pid = $(this).closest('tr').find('td:first').html();
				var events = [];
				events.push(pid);
				events.push('0');
				$(this).attr("id","clicked");
				$.post('/admin/adControlActive',{data:JSON.stringify(events)},function(data){
					if(data.success=='true'){
						var getElement = document.getElementById('clicked');
						getElement.src='/img/off.jpg';
						getElement.className="inactive"
						$('img#clicked').removeAttr('id');
						$("img:last").removeClass("active");
					}
				},'json');
			}

			if ($(this).hasClass('inactive')){
				var pid = $(this).closest('tr').find('td:first').html();
				var events = [];
				events.push(pid);
				events.push('1');
				$(this).attr("id","clicked");
				$.post('/admin/adControlActive',{data:JSON.stringify(events)},function(data){
					if(data.success=='true'){
						var getElement = document.getElementById('clicked');
						getElement.src='/img/on.jpg';
						getElement.className="active"
						$('img#clicked').removeAttr('id');
						$("img:last").removeClass("inactive");
					}
				},'json');
			}
		});
	});

</script>