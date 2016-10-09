<font color="blue">
	<div class="container">
		<div class="col-lg-offset-1 col-lg-10 col-md-offset-1 col-md-10 col-sm-12 col-xs-12">
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
						</tr>
						<tr>
							<td>Map</td>
							<td><input type='file' id="map" name="map"/></td>
							<td><div id="mapPreview"></div></td>
							<td><input type='file' id="map_mobile" name="map_mobile" /></td>
							<td><div id="mapPreview_mobile"></div></td>
						</tr>
						<tr>
							<td>Dashboard & Listing input</td>
							<td><input type='file' id="listingInput" name="listingInput" /></td>
							<td><div id="listingInputPreview"></div></td>
							<td><input type='file' id="listingInput_mobile" name="listingInput_mobile" /></td>
							<td><div id="listingInputPreview_mobile"></div></td>
						</tr>
						<tr>
							<td>Boost Post</td>
							<td><input type='file' id="boostPost" name="boostPost" /></td>
							<td><div id="boostPreview"></div></td>
							<td><input type='file' id="boostPost_mobile" name="boostPost_mobile" /></td>
							<td><div id="boostPreview_mobile"></div></td>
						</tr>
						<tr>
							<td>Coin purchasing</td>
							<td><input type='file' id="coinPurchasing" name="coinPurchasing" /></td>
							<td><div id="coinPreview"></div></td>
							<td><input type='file' id="coinPurchasing_mobile" name="coinPurchasing_mobile" /></td>
							<td><div id="coinPreview_mobile"></div></td>
						</tr>
						<tr>
							<td>Unit details</td>
							<td><input type='file' id="unitDetails" name="unitDetails" /></td>
							<td><div id="unitPreview"></div></td>
							<td><input type='file' id="unitDetails_mobile" name="unitDetails_mobile" /></td>
							<td><div id="unitPreview_mobile"></div></td>
						</tr>
						<tr>
							<td>Ad Landing Page</td>
							<td><input type='file' id="adLandingPage" name="adLandingPage" /></td>
							<td><div id="adPreview"></div></td>
							<td><input type='file' id="adLandingPage_mobile" name="adLandingPage_mobile" /></td>
							<td><div id="adPreview_mobile"></div></td>
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
<script type="text/javascript">
	$(function(){
		$("input[type=file]").on("change", function(e) {
			e.preventDefault();
			var id = $(this).closest('td').next('td').find('div').attr('id');
			var previews = $('#'+id);
			previews.empty();
			Array.prototype.slice.call(e.target.files)
			.forEach(function(file, idx) {
				var reader = new FileReader();
				reader.onload = function(event) {
					$("<span />", {
						"html": "<br />" + file.name
					}).add("<br />")
					.add(
						$("<img />", {
							"src": event.target.result,
							"class": idx,
							"width": 100
						})).add("<div />",{
						"class": "closeDiv"
					}).appendTo(previews);
					};
					reader.readAsDataURL(file);
					$("#btn-upload").prop("disabled",false);
				});
		});

		$('div').on('click', '.closeDiv', function(e){
			e.preventDefault();
			var closest = $(this).closest('td');
			var id = closest.find('div:first');
			var file  = closest.prev('td').find('input').attr('id');
			$(this).prev().remove();
			$(this).remove();
			closest.find('span:first').html('');
			$("#"+file).val('');
		})
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