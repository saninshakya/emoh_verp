<font color="blue">
	<div class="container">
		<div class="col-lg-offset-0 col-lg-12 col-md-offset-1 col-md-10 col-sm-12 col-xs-12">
			<br>
			<?php
			$attributes = array('class' => 'form-inline', 'id' => 'adControl_form');
			echo form_open_multipart('/admin/updateAdControl',$attributes);
			?>
			<div align="center"><h1><b>Ad Control</b></h1></div>
			<div class="col-md-12 column">
				<table class="table table-bordered" style="width:100%; margin:0 auto;">
					<thead>
						<tr>
							<th>Page: </th>
							<th>PC: </th>
							<th>Preview: </th>
							<th>Mobile: </th>
							<th>Preview: </th>
							<th>Start Date: </th>
							<th>End Date: </th>
						</tr> 
					</thead>
					<tbody>
						<tr>
							<td>Cover Banner</td>
							<td>
								<input id="coverBanner" type='file' name="coverBanner" />
							</td>
							<td><div id="coverPreview"></div></td>
							<td>
								<input id="coverBanner_mobile" type='file' name="coverBanner_mobile" />
							</td>
							<td><div id="coverPreview_mobile"></div></td>
							<td>

								<div class="input-group date col-md-12 col-xs-12" data-provide="datepicker">
									<input type="text" class="form-control input-z datepicker startDate" name="startDate_coverBanner" data-width="100%">
								</div>
								<!-- <input type="text" name="startDate_coverBanner" width="100"> -->
							</td>
							<td>
								<div class="input-group date col-md-12 col-xs-12" data-provide="datepicker">
									<input type="text" class="form-control input-z datepicker endDate" name="endDate_coverBanner" data-width="100%">
								</div>
								<!-- <input type="text" name="endDate_coverBanner" width="100"> -->
							</td>
						</tr>
						<tr>
							<td>Map</td>
							<td><input type='file' id="map" name="map"/></td>
							<td><div id="mapPreview"></div></td>
							<td><input type='file' id="map_mobile" name="map_mobile" /></td>
							<td><div id="mapPreview_mobile"></div></td>
							<td>
								<div class="input-group date col-md-12 col-xs-12" data-provide="datepicker">
									<input type="text" class="form-control input-z datepicker startDate" name="startDate_map"  data-width="100%">
									
								</div>
								<!-- <input type="text" name="startDate_map"> -->
							</td>
							<td>
								<div class="input-group date col-md-12 col-xs-12" data-provide="datepicker">
									<input type="text" class="form-control input-z datepicker endDate" name="endDate_map"  data-width="100%">
								</div>
								<!-- <input type="text" name="endDate_map"> -->
							</td>
						</tr>
						<tr>
							<td>Dashboard & Listing input</td>
							<td><input type='file' id="listingInput" name="listingInput" /></td>
							<td><div id="listingInputPreview"></div></td>
							<td><input type='file' id="listingInput_mobile" name="listingInput_mobile" /></td>
							<td><div id="listingInputPreview_mobile"></div></td>
							<td>
								<div class="input-group date col-md-12 col-xs-12" data-provide="datepicker">
									<input type="text" class="form-control input-z datepicker startDate" name="startDate_listingInput"  data-width="100%">
									
								</div>
								<!-- <input type="text" name="startDate_listingInput"> -->
							</td>
							<td>
								<div class="input-group date col-md-12 col-xs-12" data-provide="datepicker">
									<input type="text" class="form-control input-z datepicker endDate" name="endDate_listingInput"  data-width="100%">
									
								</div>
								<!-- <input type="text" name="endDate_listingInput"> -->
							</td>
						</tr>
						<tr>
							<td>Boost Post</td>
							<td><input type='file' id="boostPost" name="boostPost" /></td>
							<td><div id="boostPreview"></div></td>
							<td><input type='file' id="boostPost_mobile" name="boostPost_mobile" /></td>
							<td><div id="boostPreview_mobile"></div></td>
							<td>
								<div class="input-group date col-md-12 col-xs-12" data-provide="datepicker">
									<input type="text" class="form-control input-z datepicker startDate" name="startDate_boostPost"  data-width="100%">
									
								</div>
								<!-- <input type="text" name="startDate_boostPost"> -->
							</td>
							<td>
								<div class="input-group date col-md-12 col-xs-12" data-provide="datepicker">
									<input type="text" class="form-control input-z datepicker endDate" name="endDate_boostPost"  data-width="100%">
									
								</div>
								<!-- <input type="text" name="endDate_boostPost"> -->
							</td>
						</tr>
						<tr>
							<td>Coin purchasing</td>
							<td><input type='file' id="coinPurchasing" name="coinPurchasing" /></td>
							<td><div id="coinPreview"></div></td>
							<td><input type='file' id="coinPurchasing_mobile" name="coinPurchasing_mobile" /></td>
							<td><div id="coinPreview_mobile"></div></td>
							<td>
								<div class="input-group date col-md-12 col-xs-12" data-provide="datepicker">
									<input type="text" class="form-control input-z datepicker startDate" name="startDate_coinPurchasing"  data-width="100%">
									
								</div>
								<!-- <input type="text" name="startDate_coinPurchasing"> -->
							</td>
							<td>
								<div class="input-group date col-md-12 col-xs-12" data-provide="datepicker">
									<input type="text" class="form-control input-z datepicker endDate" name="endDate_coinPurchasing"  data-width="100%">
									
								</div>
								<!-- <input type="text" name="endDate_coinPurchasing"> -->
							</td>
						</tr>
						<tr>
							<td>Unit details</td>
							<td><input type='file' id="unitDetails" name="unitDetails" /></td>
							<td><div id="unitPreview"></div></td>
							<td><input type='file' id="unitDetails_mobile" name="unitDetails_mobile" /></td>
							<td><div id="unitPreview_mobile"></div></td>
							<td>
								<div class="input-group date col-md-12 col-xs-12" data-provide="datepicker">
									<input type="text" class="form-control input-z datepicker startDate" name="startDate_unitDetails"  data-width="100%">
									
								</div>
								<!-- <input type="text" name="startDate_unitDetails"> -->
							</td>
							<td>
								<div class="input-group date col-md-12 col-xs-12" data-provide="datepicker">
									<input type="text" class="form-control input-z datepicker endDate" name="endDate_unitDetails"  data-width="100%">
									
								</div>
								<!-- <input type="text" name="endDate_unitDetails"> -->
							</td>
						</tr>
						<tr>
							<td>Ad Landing Page</td>
							<td><input type='file' id="adLandingPage" name="adLandingPage" /></td>
							<td><div id="adPreview"></div></td>
							<td><input type='file' id="adLandingPage_mobile" name="adLandingPage_mobile" /></td>
							<td><div id="adPreview_mobile"></div></td>
							<td>
								<div class="input-group date col-md-12 col-xs-12" data-provide="datepicker">
									<input type="text" class="form-control input-z datepicker startDate" name="startDate_adLandingPage"  data-width="100%">
									
								</div>
								<!-- <input type="text" name="startDate_adLandingPage"> -->
							</td>
							<td>
								<div class="input-group date col-md-12 col-xs-12" data-provide="datepicker">
									<input type="text" class="form-control input-z datepicker endDate" name="endDate_adLandingPage"  data-width="100%">
									
								</div>
								<!-- <input type="text" name="endDate_adLandingPage"> -->
							</td>
						</tr>
					</div>
				</tbody>
			</table>
			<?php echo form_submit('upload', 'Upload');?>    
			<?php echo form_close(); ?>
			<!-- <input type="submit" name="btn-upload" value="Upload" disabled="" id="btn-upload"> -->
		</div>
	</form>
</div>
</div>
</font>
<br>
<script type="text/javascript" src="/js/bootstrap-datepicker.js"></script>

<script type="text/javascript">

	$(function(){
		$(".datepicker").datepicker({
			dateFormat: 'dd/mm/yy'
		}).on("changeDate", function (e) {
			alert();
			return;
			var checkDate = $(this).attr('name');
			var checkName = checkDate.split('_');
			var checkNext= $(this).closest('tr').find('.endDate').val();

			console.log(checkNext);

			var input = e.date.toString();
			var date = convert(input);

			console.log(date);
		});
		function convert(str) {
			var date = new Date(str),
			mnth = ("0" + (date.getMonth()+1)).slice(-2),
			day = ("0" + date.getDate()).slice(-2);
			return [ date.getFullYear(), mnth, day ].join("-");
		}
		$("input[type=file]").on("change", function(e) {
			e.preventDefault();
			var id = $(this).closest('td').next('td').find('div').attr('id'),
			fileFind = $(this).closest('tr').find('input').attr('id'),
			fileSize = $("#"+fileFind)[0].files[0].size;

			if(fileSize>100000){
				alert('Attachment size exceeds the allowable limit');
				$("#"+fileFind).val('');
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
/*
		$('.startDate').on("change", function(e){
			console.log('startDate');
		});

		$('.endDate').on("change", function(e){
			console.log('endDate');
		});*/
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