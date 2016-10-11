<?php
$query=$this->db->query('select * FROM `ImageAd` WHERE id="'.$id.'"');
$row=$query->row();
?>
<font color="blue">
	<div class="container">
		<div class="col-lg-offset-0 col-lg-12 col-md-offset-1 col-md-10 col-sm-12 col-xs-12">
			<br>
			<?php
			$attributes = array('class' => 'form-inline', 'id' => 'edit_adControl_form');
			echo form_open_multipart('/admin/editAdControl',$attributes);
			?>
			<div align="center"><h1><b>Edit Ad Control</b></h1></div>
			<div class="col-md-12 column">
				<table class="table table-bordered" style="width:100%; margin:0 auto;">
					<thead>
						<tr>
							<th>Page: </th>
							<th>Device Type </th>
							<th>File: </th>
							<th>Preview: </th>
							<th>Start Date: </th>
							<th>End Date: </th>
						</tr> 
					</thead>
					<tbody>
						<tr>
							<td><?=$row->page;?></td>
							
							<td><? if(($row->device_type) == 1) echo 'Desktop'; else 'Mobile';?>
								
							</td>
							<td><div id="preview"><input type='file' id="adLandingPage" name="adLandingPage"/></div></td>

							<td><div id="coverPreview"><img src="<?='/img/'.$row->filename;?>" style="height:50px;"></div></td>
							
							<td>
								<div class="input-group date col-md-12 col-xs-12" data-provide="datepicker">
									<input type="text" class="form-control input-z datepicker startDate" name="startDate_coverBanner" data-width="100%" value="<?=date("d/m/Y", strtotime($row->start_date));?>">
								</div>
							</td>
							
							<td>
								<div class="input-group date col-md-12 col-xs-12" data-provide="datepicker">
									<input type="text" class="form-control input-z datepicker endDate" name="endDate_coverBanner" data-width="100%" value="<?=date("d/m/Y", strtotime($row->end_date));?>">
								</div>
							</td>
							
						</tr>
					</div>
				</table>
				<?php echo form_submit('update', 'Update');?>    
				<?php echo form_close(); ?>

			</div>
		</form>
	</div>
</div>
</font>

<script type="text/javascript" src="/js/bootstrap-datepicker.js"></script>
<script type="text/javascript">
	$(".datepicker").datepicker({
		dateFormat: 'dd/mm/yy'
	}).on("changeDate", function (e) {
		var pageId = $(this).closest('tr').find('td:first').next().find('input').attr('id');
		var pcImageUploaded = document.getElementById(pageId).files.length;
		var forMobile = pageId+'_mobile';
		var mobileImageUploaded = document.getElementById(forMobile).files.length;
		var dateSelected = formatDate(e.date.toString());
			// var clickedDate = $(this).attr("id","clicked");

			var me = $(this);

			if(pcImageUploaded==1 || (pcImageUploaded==1 && mobileImageUploaded ==1)){
				checkDateAvailable(pageId, dateSelected, me);
				// pageId & dateSelected
			}
			else if(mobileImageUploaded == 1){
				checkDateAvailable(forMobile, dateSelected, me);
				//forMobile & dateSelected
			}
			else{
				alert('select image first');
				return false;

			}
		});
		//ajax post
		function checkDateAvailable(pageSelected, dateSelected, me){
			var events = [];
			events.push(pageSelected);
			events.push(dateSelected);
			me.attr("id","clicked");

			$.post('/admin/availabilityDate',{data:JSON.stringify(events)},function(data){
				if(data.success=='false'){
					alert('Selected date is already been used');
					$("#clicked").val('');
					$('input#clicked').removeAttr('id');
					return false;
				}
			},'json');
			
		}
		// convert the date to y/m/d format
		function formatDate(str) {
			var date = new Date(str),
			mnth = ("0" + (date.getMonth()+1)).slice(-2),
			day = ("0" + date.getDate()).slice(-2);
			return [ date.getFullYear(), mnth, day ].join("-");
		}
		$("input[type=file]").on("change", function(e) {
			e.preventDefault();
			// for size
			var filename = $(this).attr('name');
			var fileSize = $("#"+filename)[0].files[0].size;

			//for id
			var id = $(this).closest('td').next('td').find('div').attr('id');

			if(fileSize>100000){
				alert('Attachment size exceeds the allowable limit');
				return false;
			}

			var previews = $('#'+id);
			previews.empty();
			Array.prototype.slice.call(e.target.files)
			.forEach(function(file, idx) {
				var reader = new FileReader();
				reader.onload = function(event) {
					$("<img />", {
						"src": event.target.result,
						"class": idx,
						"width": 100
					}).add("<div />",{
						"class": "closeDiv"
					}).appendTo(previews);
				};
				reader.readAsDataURL(file);
				$("#btn-upload").prop("disabled",false);
			});
		});

		$('div').on('click', '.closeDiv', function(e){
			e.preventDefault();

			var closest = $(this).closest('td'),
			id = closest.find('div:first'),
			file  = closest.prev('td').find('input').attr('id');

			$(this).prev().remove();
			$(this).remove();
			closest.find('span:first').html('');
			$("#"+file).val('');
		});
	</script>


	<style type="text/css">
/*	input[type=file]{
		color:transparent;
	}*/
	.closeDiv {
		width: 20px;
		height: 21px;
		background-color: rgb(35, 179, 119);
		float: left;
		cursor: pointer;
		color: white;
		box-shadow: 2px 2px 7px rgb(74, 72, 72);
		text-align: center;
		margin: 5px;
	}
	.closeDiv:before {
		content: "X";
	}
</style>