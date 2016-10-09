<br>
<div align="center"><b><a href="/zhome/addProject">Add Project</a></b></div>
<br>
<br>
<div class="row">
	<div class="col-lg-12">
		<div class="panel">
			<div class="panel-heading"><b>รายชื่อโครงการทั้งหมด</b></div>
			<div class="panel-body">
				<div class="dataTable_wrapper">
					<table class="table table-striped table-bordered table-hover" id="dataTables">
						<thead>
							<tr>
								<td align="center">ลำดับที่</td>
								<td align="center">PID</td>
								<td align="center">ชื่อไทย</td>
								<td align="center">ชื่อ English</td>
								<td align="center">Latitude</td>
								<td align="center">Lontitude</td>
								<td align="center">บ้านเลขที่</td>
								<td align="center">ซอย</td>
								<td align="center">ถนน</td>
								<td align="center">แขวง</td>
								<td align="center">เขต</td>
								<td align="center">จังหวัด</td>
								<td align="center">Zip Code</td>
								<td align="center">ปีที่สร้างเสร็จ</td>
								<td align="center">จำนวนยูนิต</td>
								<td align="center">จำนวนที่จอดรถ</td>
								<td align="center">ค่าส่วนกลาง</td>
								<td align="center">แก้ไข</td>
								<td align="center">รูปส่วนกลาง</td>
							</tr>
						</thead>
						<tbody>
						<?php
							$i=1;
							foreach ($listProject->result() as $row){
								$queryA=$this->db->query('Select PID from Post where PID="'.$row->PID.'"');
								$chkRow=$queryA->num_rows();
								if ($chkRow>0){
									$color="blue";
								} else {
									$color="red";
								}
						?>
							<tr>
								<td align="center"><?=$i;?></td>
								<td align="center"><?=$row->PID;?></td>
								<td align="left"><font color="<?=$color;?>"><?=$row->PName_th;?></font></td>
								<td align="left"><font color="<?=$color;?>"><?=$row->PName_en;?></font></td>
								<td align="right"><?=$row->Lat;?></td>
								<td align="right"><?=$row->Lng;?></td>
								<td align="left"><?=$row->Address;?></td>
								<td align="left"><?=$row->Soi;?></td>
								<td align="left"><?=$row->Road;?></td>
								<td align="left"><?=$row->District;?></td>
								<td align="left"><?=$row->Area;?></td>
								<td align="center"><?=$row->Province;?></td>
								<td align="left"><?=$row->Zipcode;?></td>
								<td align="right"><?=$row->YearEnd;?></td>
								<td align="right"><?=$row->CondoUnit;?></td>
								<td align="right"><?=$row->CarParkUnit;?></td>
								<td align="right"><?=$row->CamFee;?></td>
								<td align="center"><a href="/zhome/editProject/<?=$row->PID;?>"><font color="#0000FF">Edit</font></a></td>
								<td align="center"><?=sizeof($this->backend->queryImg($row->PID));?></td>
							</tr>
						<?php
								$i++;
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