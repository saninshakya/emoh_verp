<font color="blue">
	<div class="container">
		<div align="Center"><b>Banner Management</b></div>
		<br>
		<button type="button" class="btn btn-primary" onclick="window.location.href='/admin/adControl'" style="float: right;">
			<span class="glyphicon glyphicon-plus"></span> Add
		</button>
		<br><br>
		<table border="1" style="width:100%; margin:0 auto;">
			<tr>
				<th>S.N.</th>
				<th>Page</th>
				<th>Device Type</th>
				<th>File</th>
				<th>Start Date</th>
				<th>End Date</th>
				<th>Active</th>
				<th>Action</th>
			</tr>

			<?php
			$sn=1;
			foreach ($listAdControl->result() as $row){
				?>
				<tr>
					<td align="center"><?php echo $sn;?></td>
					<td align="center" class="listId" style="display:none;"><?=$row->id;?></td>
					<td align="center"><?=$row->page;?></td>
					<td align="center"><?=$row->device_type==1?'Desktop':'Mobile';?></td>
					<td align="center"><img src="<?='/img/'.$row->filename;?>" style="height:50px;"></td>
					<td align="center"><?=$row->start_date;?></td>
					<td align="center"><?=$row->end_date;?></td>
					<?php if(($row->Active)==0){ ?>
					<td align="center"><img src="/img/off.jpg" class="inactive"></td>
					<?php }else{ ?>
					<td align="center"><img src="/img/on.jpg" class="active"></td>
					<?php } ?>
					<td align="center"><a href="/admin/editAdControl/<?=$row->id;?>">Edit</td>
				</tr>
				<?php
				$sn=$sn+1;
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
				var pid = $(this).closest('tr').find('.listId').html();
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
				var pid = $(this).closest('tr').find('.listId').html();
				
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
<style type="text/css">
	th {
		text-align: center;
	}
</style>