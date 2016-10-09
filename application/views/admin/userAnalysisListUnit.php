<?php
$month=array('01' => 'มกราคม', '02' => 'กุมภาพันธ์', '03' => 'มีนาคม', '04' => 'เมษายน', '05' => 'พฤษภาคม', '06' => 'มิถุนายน', '07' => 'กรกฎาคม', '08' => 'สิงหาคม', '09' => 'กันยายน', '10' => 'ตุลาคม', '11' => 'พฤศจิกายน', '12' => 'ธันวาคม');
$month_en=array('01' => 'Jan.', '02' => 'Feb.', '03' => 'Mar.', '04' => 'Apr.', '05' => 'May', '06' => 'Jun.', '07' => 'Jul.', '08' => 'Aug.', '09' => 'Sep.', '10' => 'Oct.', '11' => 'Nov.', '12' => 'Dec.');
?>
<br>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading"><b><?='เดือน '.$month[$SelMonth].' ปี '.$SelYear;?></b></div>
			<div class="panel-body">
				<div class="dataTable_wrapper">
					<table class="table table-striped table-bordered table-hover" id="dataTables">
						<thead>
						<tr>
							<th align="center">View Date</th>
							<th align="center">Unit No</th>
							<th align="center">Project</th>
							<th align="center">Province</th>
							<th align="center">Fl.</th>
							<th align="center">Bed</th>
							<th align="center">Size</th>
							<th align="center">THB</th>
							<th align="center">THB/sq.m.</th>
							<th align="center">Total Time Viewing this units.</th>
						</tr>
						</thead>
						<tbody>
						<?php
							foreach ($listUnit->result() as $row){
						?>
							<tr onmouseover="this.style.backgroundColor='#ffff80';" onmouseout="this.style.backgroundColor='';">
								<td align="center"><?=$row->ViewDate;?></td>
								<td align="right"><?=$row->POID;?></td>
								<td align="left"><?=$row->ProjectName;?></td>
								<td align="left"><?=$row->ProvinceName;?></td>
								<td align="right"><?=$row->Floor;?></td>
								<td align="right"><?=$row->Bedroom;?></td>
								<td align="right"><?=$row->useArea;?></td>
								<td align="right"><?=number_format($row->TotalPrice);?></td>
								<td align="right"><?=number_format($row->PricePerSq);?></td>
								<td align="right">xxx</td>
							</tr>
						<?php
							}
						?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<br>
<br>
<script src="<?=base_url('css/bower_components/datatables/media/js/jquery.dataTables.min.js')?>"></script>
<script src="<?=base_url('css/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js')?>"></script>
<script language="javascript">
$(document).ready(function() {
	$('#dataTables').DataTable({
		responsive: true
	});
});
</script>