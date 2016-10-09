<?php
//require_once('phpass-0.1/PasswordHash.php');
class Backend extends CI_Model {

	function __construct(){
		// Call the Model constructor
		parent::__construct();
	}

	function checkAdmin()
	{
		$user_id=$this->session->userdata('user_id');
		$query=$this->db->query('Select admin_group from users Where id="'.$user_id.'"');
		$rowQuery=$query->row();
		if ($rowQuery->admin_group==1){
			return 1;
		} else {
			return 0;
		}
	}

	function listKeyMarker($Type)
	{
		if ($Type!=""){
			$query=$this->db->query('Select * from KeyMarker Where Type="'.$Type.'" Order By Type, KeyName');
		} else {
			$query=$this->db->query('Select * from KeyMarker Order By Type, KeyName');
		}
		return $query;
	}

	function listKeyMarker2($Type)
	{
		if ($Type!=""){
			$query=$this->db->query('Select a.*,b.name_th,b.name_en from KeyMarker a left join cfg_master b on a.SubType=b.id and a.Type=b.type where a.Type="'.$Type.'" Order By a.Status DESC,b.sort_no DESC,a.KeyName');
		} else {
			$query=$this->db->query('Select a.*,b.name_th,b.name_en from KeyMarker a left join cfg_master b on a.SubType=b.id and a.Type=b.type Order By a.Status DESC,b.sort_no DESC,a.KeyName');
		}
		return $query;
	}

	function getKeyMarker($ID)
	{
		$query=$this->db->query('Select a.*,b.Name_th,b.Name_en,b.Pic_path from KeyMarker a left join KeyMarkerType b on a.Type=b.Type Where a.ID="'.$ID.'"');
		return $query;
	}

	function inputKeyMarker($data)
	{
		if ($data['KeyName']!="" and $data['KeyName_en']!="" and $data['Lat']!="" and $data['Lng']!="" and $data['Type']!="" and $data['Province']!="" ){
			if($data['Lat']==$data['Old_Lat'] and $data['Lng']==$data['Old_Lng']){//not edit Lat,Long
				if($data['Type']!=$data['Old_Type']){
					$qType=',KeyID="'.$data['showKeyID'].'"';
					$this->db->query('update DistMarker set Station="'.$data['showKeyID'].'",Type="'.$data['Type'].'" where Station="'.$data['Old_ID'].$data['Old_Type'].'"');
				}else{
					$qType='';
				}
				$this->db->query('update KeyMarker set KeyName="'.$data['KeyName'].'",KeyName_en="'.$data['KeyName_en'].'", Lat="'.$data['Lat'].'", Lng="'.$data['Lng'].'", Type="'.$data['Type'].'", ProvinceID="'.$data['Province'].'" '.$qType.' where ID="'.$data['Old_ID'].'"');
			}else{
				$this->db->query('Insert into KeyMarker set KeyName="'.$data['KeyName'].'",KeyName_en="'.$data['KeyName_en'].'", Lat="'.$data['Lat'].'", Lng="'.$data['Lng'].'", Type="'.$data['Type'].'", KeyID="'.$data['KeyID'].'", ProvinceID="'.$data['Province'].'"');
				$this->updateDistMarker($data['KeyID']);
			}
		}
	}

	function inputKeyMarkerLine($mid,$lat,$lng)
	{
		$this->db->query('delete from KeyMarker Where KeyID="'.$mid.'"');
		$this->db->query('Delete from KeyMarker Where KeyID="'.$mid.'"');
		$this->db->query('Delete from DistMarker Where Station="'.$mid.'"');
		$this->db->query('Insert into KeyMarker set KeyName="'.$mid.'",KeyName_en="'.$mid.'", Lat="'.$lat.'", Lng="'.$lng.'", Type="line", KeyID="'.$mid.'", ProvinceID="line"');
		$this->updateDistMarkerLine($mid);
	}

	function updateDistMarkerLine($KeyID)
	{
		$query=$this->db->query('select Lat, Lng, Type from KeyMarker Where KeyID="'.$KeyID.'"');
		$rowQuery=$query->row();
		$Lat1=$rowQuery->Lat;
		$Lng1=$rowQuery->Lng;
		$Type=$rowQuery->Type;
		$query=$this->db->query('Select PID, Lat, Lng from Project');
		foreach ($query->result() as $row){
			$PID=$row->PID;
			$Lat2=$row->Lat;
			$Lng2=$row->Lng;
			$dist= $this->distance($Lat1, $Lng1, $Lat2, $Lng2, "K")*1000;
			if($dist<=3000){
				$this->db->query('insert into DistMarker set PID="'.$PID.'", Station="'.$KeyID.'", Type="'.$Type.'", Distance="'.$dist.'"');
			}
		}
	}

	function distance($lat1, $lon1, $lat2, $lon2, $unit) {
		$theta = $lon1 - $lon2;
		$dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
		$dist = acos($dist);
		$dist = rad2deg($dist);
		$miles = $dist * 60 * 1.1515;
		$unit = strtoupper($unit);
		if ($unit == "K") {
			return ($miles * 1.609344);
		} else if ($unit == "N") {
			return ($miles * 0.8684);
		} else {
			return $miles;
		}
	}

	function updateDistMarker($KeyID)
	{
		$query=$this->db->query('select Lat, Lng, Type from KeyMarker Where KeyID="'.$KeyID.'"');
		$rowQuery=$query->row();
		$Lat1=$rowQuery->Lat;
		$Lng1=$rowQuery->Lng;
		$Type=$rowQuery->Type;
		$query=$this->db->query('Select PID, Lat, Lng from Project');
		foreach ($query->result() as $row){
			$PID=$row->PID;
			$Lat2=$row->Lat;
			$Lng2=$row->Lng;
			$dist= $this->distance($Lat1, $Lng1, $Lat2, $Lng2, "K")*1000;
			if($dist<=50000){
				$this->db->query('insert into DistMarker set PID="'.$PID.'", Station="'.$KeyID.'", Type="'.$Type.'", Distance="'.$dist.'"');
			}
		}
	}

	function delMarker($ID)
	{
		$query=$this->db->query('Select * from KeyMarker Where ID="'.$ID.'"');
		$row=$query->row();
		$KeyID=$row->KeyID;
		$this->db->query('Delete from KeyMarker Where KeyID="'.$KeyID.'"');
		$this->db->query('Delete from DistMarker Where Station="'.$KeyID.'"');
	}

	function delMarker2($PID)
	{
		$this->db->query('Delete from DistMarker Where PID="'.$PID.'"');
	}


	function listProject()
	{
		$query=$this->db->query("Select * from Project order by PName_th");
		return $query;
	}

	function addProject($data)
	{
		$ProvinceName=$this->provinceName($data['Province']);
		$dataSQL=array($data['PName_th'],$data['PName_en'],$data['SName_th'],$data['SName_en'],$data['Lat'],$data['Lng'],$data['Address'],$data['Soi'],$data['Road'],$data['District'],$data['Area'],$ProvinceName,$data['Zipcode'],$data['YearEnd'],$data['CondoUnit'],$data['CarParkUnit'],$data['CamFee'],$data['Province']);
		$this->db->query('Insert into Project set PName_th=? , PName_en=?,SName_th=? , SName_en=?, Lat=?, Lng=?, Address=?, Soi=?, Road=?, District=?, Area=?, Province=?, Zipcode=?, YearEnd=?, CondoUnit=?, CarParkUnit=?, CamFee=?, ProvinceID=?',$dataSQL);
		$this->updateDistMarker2($data['PName_th'],$data['PName_en']);
		$this->updateDistMarker3($data['PName_th'],$data['PName_en']);
	}

	function updateDistMarker2($PName_th,$PName_en)
	{
		$query=$this->db->query('Select PID, Lat, Lng from Project Where PName_th="'.$PName_th.'" and PName_en="'.$PName_en.'"');
		$rowQuery=$query->row();
		$Lat1=$rowQuery->Lat;
		$Lng1=$rowQuery->Lng;
		$PID=$rowQuery->PID;
		$query=$this->db->query('select KeyName,Lat, Lng, KeyID, Type from KeyMarker');
		foreach ($query->result() as $row){
			$Type=$row->Type;
			$Lat2=$row->Lat;
			$Lng2=$row->Lng;
			$KeyID=$row->KeyID;
			$dist=$this->distance($Lat1, $Lng1, $Lat2, $Lng2, "K")*1000;
			if($dist<=50000){
				$this->db->query('insert into DistMarker set PID="'.$PID.'", Station="'.$KeyID.'", Type="'.$Type.'", Distance="'.$dist.'"');
			}
		}
	}

	function updateDistMarker3($PName_th,$PName_en)
	{
		$Type="Project";
		$query=$this->db->query('select PID,Lat,Lng from Project Where PName_th="'.$PName_th.'" and PName_en="'.$PName_en.'" ');
		foreach ($query->result() as $rowQuery){
			$PID1=$rowQuery->PID;
			$Lat1=$rowQuery->Lat;
			$Lng1=$rowQuery->Lng;
			$query=$this->db->query('Select PID,PName_th, Lat, Lng from Project where PID!="'.$PID1.'"');
			foreach ($query->result() as $row){
				$PID2=$row->PID;
				$Lat2=$row->Lat;
				$Lng2=$row->Lng;
				$query2=$this->db->query('select PID from DistMarker where Type="'.$Type.'" and PID="'.$PID1.'" and Station="'.$PID2.'" ');
				if($query2->num_rows()==0){
					$dist= $this->distance($Lat1, $Lng1, $Lat2, $Lng2, "K")*1000;
					if($dist<=50000){
						$this->db->query('insert into DistMarker set PID="'.$PID1.'", Station="'.$PID2.'", Type="'.$Type.'", Distance="'.$dist.'"');
					}
				}
			}
		}
	}

	function editProject($data)
	{
		$this->delMarker2($data['PID']);
		$ProvinceName=$this->provinceName($data['Province']);
		$dataSQL=array($data['PName_th'],$data['PName_en'],$data['SName_th'],$data['SName_en'],$data['Lat'],$data['Lng'],$data['Address'],$data['Soi'],$data['Road'],$data['District'],$data['Area'],$ProvinceName,$data['Zipcode'],$data['YearEnd'],$data['CondoUnit'],$data['CarParkUnit'],$data['CamFee'],$data['Province'],$data['PID']);
		$this->db->query('Update Project set PName_th=? , PName_en=?, SName_th=? , SName_en=?, Lat=?, Lng=?, Address=?, Soi=?, Road=?, District=?, Area=?, Province=?, Zipcode=?, YearEnd=?, CondoUnit=?, CarParkUnit=?, CamFee=?, ProvinceID=? Where PID=?',$dataSQL);
		$this->updateDistMarker2($data['PName_th'],$data['PName_en']);
		$this->updateDistMarker3($data['PName_th'],$data['PName_en']);
		$dataSQL=array($data['PName_th'],$data['Lat'],$data['Lng'],$data['Soi'],$data['Road'],$data['District'],$data['Area'],$data['Province'],$data['PID']);
		$this->db->query('update Post set ProjectName=?, Lat=?, Lng=?, Soi=?, Road=?, District=?, Area=?, Province=? Where PID=?',$dataSQL);
	}

	function listPost($TOProperty,$TOAdvertising,$Active)
	{
		$queryPost=$this->db->query('Select *,if((DateUpdate is not null or DateUpdate!="") and (datediff(DateUpdate,curdate())>=-7),1,0) as StatusUpdate from Post Where TOProperty="'.$TOProperty.'" and TOAdvertising="'.$TOAdvertising.'" and Active="'.$Active.'" order by DateUpdate DESC,DateCreate DESC');
		//echo 'Select * from Post Where TOProperty="'.$TOProperty.'" and TOAdvertising="'.$TOAdvertising.'" and Activate="'.$Activate.'" order by DateCreate';
		return $queryPost;
	}

	function activatePost($POID)
	{
		$user_data = $this->users->get_user_by_id($this->tank_auth->get_user_id(),1);
		$email=$user_data->email;
		$TOAdvertising=$this->search->checkTypeAdvertising($POID);
		$DateCreate=date("Y-m-d");
		if ($TOAdvertising=="2"){
			$this->db->query('Update Post set TotalPrice=DTotalPrice Where POID="'.$POID.'"');
			$query=$this->db->query('Select DTotalPrice, DDownTotalPrice from Post Where POID="'.$POID.'"');
			$row=$query->row();
			$NewDTotalPrice=$row->DTotalPrice;
			$NewDDownTotalPrice=$row->DDownTotalPrice;
			$query=$this->db->query('Select DTotalPrice, DDownTotalPrice, DateCreate from LogDownCondoPrice Where POID="'.$POID.'"');
			if ($query->num_rows() != 0 ){
				$row=$query->row();
				$OldDTotalPrice=$row->DTotalPrice;
				$OldDDownTotalPrice=$row->DDownTotalPrice;
				$OldDateCreate=$row->DateCreate;
				if (($OldDTotalPrice!=$NewDTotalPrice) or ($OldDDownTotalPrice!=$NewDDownTotalPrice)){
					if ($DateCreate!=$OldDateCreate){
						$this->db->query('insert into LogDownCondoPrice Set POID="'.$POID.'", DTotalPrice="'.$NewDTotalPrice.'", DDownTotalPrice="'.$NewDDownTotalPrice.'", DateCreate="'.$DateCreate.'"');
						$this->db->query('update Post Set ActiveDay=1 Where POID="'.$POID.'"');
					} else {
						$this->db->query('Update LogDownCondoPrice Set  DTotalPrice="'.$NewDTotalPrice.'", DDownTotalPrice="'.$NewDDownTotalPrice.'" Where POID="'.$POID.'" and DateCreate="'.$DateCreate.'"');
					}
				};
			} else {
				$this->db->query('insert into LogDownCondoPrice Set POID="'.$POID.'", DTotalPrice="'.$NewDTotalPrice.'", DDownTotalPrice="'.$NewDDownTotalPrice.'", DateCreate="'.$DateCreate.'"');
			};
		};
		$query=$this->db->query('Select ApproveDate from Post Where POID="'.$POID.'"');
		$row=$query->row();
		$ApproveDate=$row->ApproveDate;
		if ($ApproveDate=="0000-00-00"){
			$this->db->query('Update Post set Active="1", ApproveBy="'.$email.'", ApproveDate="'.$DateCreate.'",DateExpire=adddate("'.$DateCreate.'",interval AgreePostDay day),PricePerSq=TotalPrice/useArea Where POID="'.$POID.'"');
		} else {
			$this->db->query('Update Post set ReApprove=ReApprove+1, Active="1", ApproveBy="'.$email.'", PricePerSq=TotalPrice/useArea Where POID="'.$POID.'"');
		}
		//Add This section for checking Reapprove
		$CheckDate=date("Y-m-d",mktime(0, 0, 0, date("m")  , date("d"), date("Y")));
		$query=$this->db->query('Select ReApprove, ApproveDate from Post Where POID="'.$POID.'"');
		$row=$query->row();
		$ReApprove=$row->ReApprove;
		$ApproveDate=$row->ApproveDate;
		if ($ReApprove>1){
			if ($ApproveDate!=$CheckDate){
				$this->db->query('Update Post set ReApproveDate="'.$DateCreate.'" Where POID="'.$POID.'"');
			}
		}
	}

	function blockPost($data)
	{
		$user_data = $this->users->get_user_by_id($this->tank_auth->get_user_id(),1);
		$email=$user_data->email;
		$DateCreate=date("Y-m-d");
		$query=$this->db->query('Select ID from BlockPostMsg Where POID="'.$data['POID'].'"');
		if ($query->num_rows()=='0'){
			$this->db->query('Insert into BlockPostMsg set POID="'.$data['POID'].'", Msg="'.$data['Msg'].'", DateCreate="'.$DateCreate.'"');
		} else {
			$this->db->query('Update BlockPostMsg set Msg="'.$data['Msg'].'", DateCreate="'.$DateCreate.'" Where POID="'.$data['POID'].'"');
		}
		//$this->db->query('Update Post set Active="3", Step1="0", Step2="0", Step3="0", Step4="0", Step5="0", BlockBy="'.$email.'", BlockDate="'.$DateCreate.'" Where POID="'.$data['POID'].'"');
				//$this->db->query('Update Post set Active="3", Step1="0", Step2="0", Step3="0", Step4="0", Step5="0", BlockBy="'.$email.'", BlockDate="'.$DateCreate.'" Where POID="'.$data['POID'].'"');
		//Remove reset step from blockpost
		$this->db->query('Update Post set Active="3", BlockBy="'.$email.'", BlockDate="'.$DateCreate.'" Where POID="'.$data['POID'].'"');
	}

	function updateNotePost($data)
	{
		$DateCreate=date("Y-m-d");
		$query=$this->db->query('Select ID from BlockPostMsg Where POID="'.$data['POID'].'"');
		if ($query->num_rows()=='0'){
			$this->db->query('Insert into BlockPostMsg set POID="'.$data['POID'].'", Msg2="'.$data['Msg2'].'", DateCreate="'.$DateCreate.'"');
		} else {
			$this->db->query('Update BlockPostMsg set Msg2="'.$data['Msg2'].'", DateCreate="'.$DateCreate.'" Where POID="'.$data['POID'].'"');
		}
	}

	function qMsg($POID,$Type)
	{
		$query=$this->db->query('Select * from BlockPostMsg Where POID="'.$POID.'"');
		if ($query->num_rows()=='0'){
			$msg="";
		} else {
			$row=$query->row();
			if ($Type==1){
				$msg=$row->Msg;
			} else {
				$msg=$row->Msg2;
			}
		}
		return $msg;
	}
	function adminDelUnit($POID)
	{
		$user_data = $this->users->get_user_by_id($this->tank_auth->get_user_id(),1);
		$email=$user_data->email;
		$DateCreate=date("Y-m-d");
		$this->db->query('Update Post set Active="90", DelBy="'.$email.'", DelDate="'.$DateCreate.'" Where POID="'.$POID.'"');
	}

	function updateHelpdesk($data){
		$user_id=$this->session->userdata('user_id');
		//print_r($data);
		$i=0;
		for($i=0;$i<=count($data['hid']);$i++)
		{
			if(isset($data['check_pass'][$i])){
				if($data['check_pass'][$i]==1){
					$informer_check=1;
					$status=1;
				}else{
					$informer_check=1;
					$status=0;
				}
				//echo $data['check_pass'][$i]."<br>";
				$this->db->query('Update Helpdesk set informer_check="'.$informer_check.'", status="'.$status.'", log_user="'.$user_id.'" Where HID="'.$data['hid'][$i].'"');
			}
		}
		return 1;
	}

	function listProject2($data)
	{
		$this->db->select('Project.*,count(Post.POID) as unit');
		$this->db->join('Post','Post.PID=Project.PID and Post.Active=1','LEFT');
		if($data['ProjectName']!=''){
			$this->db->like('Project.PName_th',$data['ProjectName']);
		}
		if($data['Province']!=''){
			$this->db->like('Project.Province',$data['Province']);
		}
		$this->db->group_by('Project.PID');
		$this->db->order_by('Project.PName_th','asc');
		$query=$this->db->get('Project');
		return $query;
	}

	function listUnit($data){
		$qUnit='';
		if($data['ProjectName']!=''){
			$qUnit.=' and Post.ProjectName like "%'.$data['ProjectName'].'%"';
		}
		if($data['Ownername']!=''){
			$qUnit.=' and Post.OwnerName like "%'.$data['Ownername'].'%"';
		}
		if($data['Email']!=''){
			$qUnit.=' and Post.Email1 like "%'.$data['Email'].'%"';
		}
		if($data['Telephone']!=''){
			$qUnit.=' and Post.Telephone1 like "%'.$data['Telephone'].'%"';
		}
		if($data['Advertising']!=''){
			$qUnit.=' and Post.TOAdvertising="'.$data['Advertising'].'"';
		}
		if($data['ActivePost']!=''){
			if($data['ActivePost']=='1'){
				$qUnit.=' and Post.ApproveDate<>"0000-00-00"';
			}else{
				$qUnit.=' and Post.Active="'.$data['ActivePost'].'"';
			}
		}
		if(isset($data['expire_check'])){
			if($data['expire_type']=='1'){//ก่อนหน้า
				if($data['expire_day']!=''){
					$qUnit.=' and Post.DateExpire<=date_add(curdate(),interval -"'.$data['expire_day'].'" day)';
				}else{
					$qUnit.=' and Post.DateExpire<curdate()';
				}
			}else{
				if($data['expire_day']!=''){//ถัดไป
					$qUnit.=' and Post.DateExpire between curdate() and date_add(curdate(),interval "'.$data['expire_day'].'" day)';
				}else{
					$qUnit.=' and Post.DateExpire>=curdate()';
				}
			}
		}
		if(isset($data['SortPost']) && $data['SortPost']!=''){
			if($data['SortPost']==1){//วันที่ทำรายการล่าสุด
				$qSort=' order by Post.toadvertising,Post.active,Post.DateUpdate DESC,Post.projectname,Post.ownername';
			}else if($data['SortPost']==2){//วันที่ลงประกาศ
				$qSort=' order by Post.toadvertising,Post.active,Post.DateCreate,Post.projectname,Post.ownername';
			}else if($data['SortPost']==3){//ชื่อโครงการ
				$qSort=' order by Post.toadvertising,Post.active,Post.projectname,Post.ownername';
			}else if($data['SortPost']==4){//ชื่อเจ้าของห้อง
				$qSort=' order by Post.toadvertising,Post.active,Post.ownername,Post.projectname';
			}
		} else {
			$qSort=" order by Post.toadvertising,Post.active,Post.DateUpdate DESC";
		}
		$query=$this->db->query('select Post.*,users.email,cfg_master.name_th,TOAdvertising.AName_th,if((Post.DateUpdate is not null or Post.DateUpdate!="") and (datediff(Post.DateUpdate,curdate())>=-7),1,0) as StatusUpdate from Post left join users on users.id=Post.user_id left join cfg_master on cfg_master.id=Post.Active and cfg_master.type="active_post" left join TOAdvertising on TOAdvertising.toaid=Post.toadvertising where Post.TOProperty="1"'.$qUnit.$qSort);
		//error_log('select Post.*,users.email,cfg_master.name_th,TOAdvertising.AName_th,if((Post.DateUpdate is not null or Post.DateUpdate!="") and (datediff(Post.DateUpdate,curdate())>=-7),1,0) as StatusUpdate from Post left join users on users.id=Post.user_id left join cfg_master on cfg_master.id=Post.Active and cfg_master.type="active_post" left join TOAdvertising on TOAdvertising.toaid=Post.toadvertising where Post.TOProperty="1"'.$qUnit.$qSort);
		return $query;
	}

	public function listview($POID)
	{
		$query=$this->db->query('Select count(ID) as CView from LogViewPost Where POID="'.$POID.'"');
		$row=$query->row();
		$CView=$row->CView;
		$query=$this->db->query('Select count(ID) as CTel from LogViewPost Where POID="'.$POID.'" and ViewTelByUserID is not null');
		$row=$query->row();
		$CTel=$row->CTel;
		$txt=$CView."/".$CTel;
		return $txt;
	}

	public function usertoemail($user_id)
	{
		$query=$this->db->query('select email from users Where id="'.$user_id.'"');
		if ($query->num_rows()!=0){
			$row=$query->row();
			$txt=$row->email;
		} else {
			$txt="Guest";
		}
		return $txt;
	}

	function listLabel($data)
	{
		if($data['Label']!=''){
			$this->db->where('type',$data['Label']);
		}
		if($data['ActiveLabel']!=''){
			$this->db->where('status',$data['ActiveLabel']);
		}
		$this->db->order_by('type asc,label asc');
		$query=$this->db->get('cfg_label');
		return $query;
	}

	function updateLabel($data){
		$user_id=$this->session->userdata('user_id');
		//print_r($data);
		$i=0;
		for($i=0;$i<=sizeof($data['lid']);$i++){
			$this->db->query('update cfg_label set description="'.trim($data['desc'][$i]).'", status="'.$data['status'][$i].'", log_user="'.$user_id.'" Where id="'.$data['lid'][$i].'"');
		}
		return 1;
	}

	function updateMarker($mtype)
	{
		if($mtype!=''){
			$qtype=' and Type="'.$mtype.'" ';
		}else{
			$qtype='';
		}
		$query=$this->db->query('select Lat,Lng,Type,KeyID from KeyMarker Where ID>="2475" '.$qtype.' order by Type ');
		foreach ($query->result() as $rowQuery){
			$Lat1=$rowQuery->Lat;
			$Lng1=$rowQuery->Lng;
			$Type=$rowQuery->Type;
			$KeyID=$rowQuery->KeyID;
			$query=$this->db->query('Select PID,PName_th, Lat, Lng from Project');
			foreach ($query->result() as $row){
				$PID=$row->PID;
				$Lat2=$row->Lat;
				$Lng2=$row->Lng;
				$query2=$this->db->query('select PID from DistMarker where Type="'.$Type.'" and PID="'.$PID.'" and Station="'.$KeyID.'" ');
				if($query2->num_rows()==0){
					$dist= $this->distance($Lat1, $Lng1, $Lat2, $Lng2, "K")*1000;
					if($dist<=20000){
						$this->db->query('insert into DistMarker set PID="'.$PID.'", Station="'.$KeyID.'", Type="'.$Type.'", Distance="'.$dist.'"');
						echo $KeyID.":".$row->PName_th."=>".$dist."<br>";
					}
				}
			}
		}
	}

	public function checkRep2($POID){
		$query=$this->db->query('select RoomNumber, PID from Post Where POID="'.$POID.'"');
		$row=$query->row();
		$RoomNumber=$row->RoomNumber;
		$PID=$row->PID;
		if ($PID==null or $PID=="0"){
			$txt="Black";
		} else {
			$query=$this->db->query('Select Count(POID) as CheckRoom from Post Where PID="'.$PID.'" and RoomNumber="'.$RoomNumber.'" and Active<10 and TOAdvertising=2' );
			$row=$query->row();
			$CheckRoom=$row->CheckRoom;
			if ($CheckRoom>1){
				$txt="Red";
			} else {
				$txt="Black";
			}
			if ($txt=="Black"){
				$query=$this->db->query('Select Count(POID) as CheckRoom from Post Where PID="'.$PID.'" and Address="'.$RoomNumber.'" and Active<10 and TOAdvertising!=2');
				$row=$query->row();
				$CheckRoom=$row->CheckRoom;
				if ($CheckRoom>0){
					$txt="Green";
				}
			}
		}
		return $txt;
	}

	public function checkRep($POID){
		$query=$this->db->query('select Address, PID from Post Where POID="'.$POID.'"');
		$row=$query->row();
		$Address=$row->Address;
		$PID=$row->PID;
		if ($PID==null or $PID=="0"){
			$txt="Black";
		} else {
			$query=$this->db->query('Select Count(POID) as CheckRoom from Post Where PID="'.$PID.'" and Address="'.$Address.'" and Active<10 and TOAdvertising=1');
			$row=$query->row();
			$CheckRoom=$row->CheckRoom;
			if ($CheckRoom>1){
				$txt="Red";
			} else {
				$txt="Black";
			}
			if ($txt=="Black"){
				$query=$this->db->query('Select Count(POID) as CheckRoom from Post Where PID="'.$PID.'" and Address="'.$Address.'" and Active<10 and TOAdvertising!=1');
				$row=$query->row();
				$CheckRoom=$row->CheckRoom;
				if ($CheckRoom>0){
					$txt="Green";
				}
			}
		}
		return $txt;
	}

	public function checkRep5($POID){
		$query=$this->db->query('select Address, PID from Post Where POID="'.$POID.'"');
		$row=$query->row();
		$Address=$row->Address;
		$PID=$row->PID;
		if ($PID==null or $PID=="0"){
			$txt="Black";
		} else {
			$query=$this->db->query('Select Count(POID) as CheckRoom from Post Where PID="'.$PID.'" and Address="'.$Address.'" and Active<10 and TOAdvertising=5');
			$row=$query->row();
			$CheckRoom=$row->CheckRoom;
			if ($CheckRoom>1){
				$txt="Red";
			} else {
				$txt="Black";
			}
			if ($txt=="Black"){
				$query=$this->db->query('Select Count(POID) as CheckRoom from Post Where PID="'.$PID.'" and Address="'.$Address.'" and Active<10 and TOAdvertising!=5');
				$row=$query->row();
				$CheckRoom=$row->CheckRoom;
				if ($CheckRoom>0){
					$txt="Green";
				}
			}
		}
		return $txt;
	}

	public function queryImg($PID){
		$file = array();
		$query=$this->db->query('select PName_en from Project Where PID="'.$PID.'"');
		$row=$query->row();
		$pname=$row->PName_en;
		$dirname = 'projImg/'.$pname;
		$newdirname='projImg/'.$PID;
		if (file_exists($dirname)) {
			//echo "The file $dirname exists";
			rename($dirname, $newdirname);
			$query2=$this->db->query('select ImgID, file from ImagePost Where file like "/'.$dirname.'/%"');
			if ($query2->num_rows()!=0){
				foreach ($query2->result() as $row){
					$ImgID=$row->ImgID;
					$file=$row->file;
					$file=str_replace($dirname,$newdirname,$file);
					$this->db->query('update ImagePost set file="'.$file.'" where ImgID="'.$ImgID.'"');
					//echo $file."<br>";
				}
			};
		} ;
		$dirname=$newdirname;
		if (file_exists($dirname)) {
			$map = directory_map($dirname.'/Picture');
			if ($map!=false){
				$total = sizeof($map);
				for($i=0;$i<$total;$i++){
					$file[$i] = $dirname.'/Picture/'.$map[$i];
					//echo $file[$i]." ";
				}
			}
		} else {
			mkdir($dirname, 0755, true);
			mkdir($dirname.'/Picture', 0755, true);
			$file[0]="null";
		}
		return $file;
	}

	public function queryImgRoom($PID,$RoomName){
		$file = array();
		$query=$this->db->query('select PName_en from Project Where PID="'.$PID.'"');
		$row=$query->row();
		$pname=$row->PName_en;
		$dirname = 'projImg/'.$pname;
		$newdirname='projImg/'.$PID;
		if (file_exists($dirname)) {
			//echo "The file $dirname exists";
			rename($dirname, $newdirname);
			$query2=$this->db->query('select ImgID, file from ImagePost Where file like "/'.$dirname.'/%"');
			if ($query2->num_rows()!=0){
				foreach ($query2->result() as $row){
					$ImgID=$row->ImgID;
					$file=$row->file;
					$file=str_replace($dirname,$newdirname,$file);
					$this->db->query('update ImagePost set file="'.$file.'" where ImgID="'.$ImgID.'"');
					//echo $file."<br>";
				}
			};
		} ;
		$dirname='projImg/'.$PID.'/'.$RoomName;
		if (file_exists($dirname)) {
			$map = directory_map($dirname);
			if ($map!=false){
				$total = sizeof($map);
				for($i=0;$i<$total;$i++){
					$file[$i] = $dirname.'/'.$map[$i];
					//echo $file[$i]." ";
				}
			}
		} else {
			mkdir($dirname, 0755, true);
			mkdir($dirname, 0755, true);
			$file[0]="null";
		}
		return $file;
	}

	public function delImg($PID,$Img){
		$filename="projImg/".$PID."/Picture/".$Img;
		$dfilename="/".$filename;
		$filename2="/home/zmyhome/public_html/".$filename;
		$query=$this->db->query('delete from ImagePost Where file="'.$dfilename.'"');
		unlink($filename);
		//echo $filename;
	}

	public function delImg2($PID,$RoomName,$Img){
		$filename="projImg/".$PID."/".$RoomName."/".$Img;
		$dfilename="/".$filename;
		$filename2="/home/zmyhome/public_html/".$filename;
		$query=$this->db->query('delete from ImagePost Where file="'.$dfilename.'"');
		unlink($filename);
//    echo $filename;
	}

	public function chkImgUse($ImgUse){
		$query=$this->db->query('Select count(ImgID) as CImgID from ImagePost Where file="'.$ImgUse.'"');
		$row=$query->row();
		$CImgID=$row->CImgID;
		return $CImgID;
	}

	function updateProfile($data){
		$user_id=$this->session->userdata('user_id');
		$this->db->query('update users set firstname="'.trim($data['firstname']).'",lastname="'.$data['lastname'].'",telephone="'.$data['telephone'].'",line_id="'.$data['line_id'].'" Where id="'.$data['id'].'"');
		return 1;
	}

	function listStation($data){
		if($data['StationType']!=''){
			$sStation=" and KeyMarker.Type='".$data['StationType']."' ";
		}else{
			$sStation=" and KeyMarker.Type in('BTS','MRT','BRT','ARL')";
		}
		if($data['Distance']!=''){
			$sDistance=" and DistMarker.Distance<='".$data['Distance']."' ";
		}else{
			$sDistance=" and DistMarker.Distance<='1000' ";
		}
		$query=$this->db->query('select a.KeyID,a.KeyName,a.KeyName_en,a.Type,a.SubType,a.Status,b.name_th as LineName,sum(a.CondoUnit) as Unit,a.YearGroup from (select * from (select Distinct KeyMarker.KeyID,KeyMarker.KeyName,KeyMarker.KeyName_en,KeyMarker.Type,KeyMarker.SubType,KeyMarker.Status,Project.PID,Project.CondoUnit, if(Project.YearEnd<(Year(curdate())+543),"1","2") as YearGroup from Project,DistMarker,KeyMarker where Project.PID=DistMarker.PID and DistMarker.Station=KeyMarker.KeyID and (Project.YearEnd is not null and Project.YearEnd<>0) '.$sStation.$sDistance.' order by Project.PID,DistMarker.Distance ASC) aa group by PID) a left join cfg_master b on a.Type=b.type and a.SubType=b.id group by a.KeyID,a.YearGroup order by a.Type,a.Status DESC,a.SubType,a.KeyName,a.YearGroup');
		return $query;
	}

	function listStationProject($Station,$Distance,$YearGroup){
		$sStation=" and DistMarker.Station='".$Station."' ";
		$sDistance=" and DistMarker.Distance<='".$Distance."' ";
		if($YearGroup==1){
			$sYear=" and Project.YearEnd<(Year(curdate())+543)";
		}else if($YearGroup==2){
			$sYear=" and Project.YearEnd>=(Year(curdate())+543)";
		}
		$query=$this->db->query('select Distinct KeyMarker.KeyID,KeyMarker.KeyName,KeyMarker.KeyName_en,KeyMarker.Type,KeyMarker.SubType,KeyMarker.Status,DistMarker.Distance,Project.PID, Project.PName_th,Project.PName_en,Project.CondoUnit from Project,DistMarker,KeyMarker where Project.PID=DistMarker.PID and DistMarker.Station=KeyMarker.KeyID and DistMarker.Type=KeyMarker.Type and (Project.YearEnd is not null and Project.YearEnd<>0) '.$sStation.$sDistance.$sYear.' order by DistMarker.Distance ASC,Project.PName_th');
		return $query;
	}

	public function sendEmailActivate($POID)
	{
		$this->postemail->approve_email($POID);
	}

	public function sendEmailBlock($POID)
	{
		$this->postemail->block_email($POID);
	}

	function adminCancelHideUnit($data){
		$POID=$data['POID'];
		$this->db->query('update Post set Active="1" where POID="'.$POID.'"');
	}

	function listUnitView($data){
		if($data['ProjectName']!=''){
			$qProjectName=" and Post.ProjectName='".$data['ProjectName']."' ";
		}else{
			$qProjectName="";
		}
		if($data['OwnerName']!=''){
			$qOwnerName=" and Post.OwnerName='".$data['OwnerName']."' ";
		}else{
			$qOwnerName="";
		}
		if($data['Advertising']!=''){
			$qAdvertising=" and Post.TOAdvertising='".$data['Advertising']."' ";
		}else{
			$qAdvertising="";
		}
		if($data['OrderBy']=='1'){
			$qOrderBy=" order by Post.TOAdvertising,LogViewPost.LastUpdate ASC,Post.ProjectName";
		}else if($data['OrderBy']=='2'){
			$qOrderBy=" order by Post.TOAdvertising,Post.ProjectName,LogViewPost.LastUpdate ASC";
		}
		$qGroupBy=" group by date(LogViewPost.LastUpdate),Post.PID ";
		$query=$this->db->query('select LogViewPost.LastUpdate,Post.Active as Pactive,Post.TOAdvertising as Paid,Post.*,users.email,(select name_th from cfg_master where id=Pactive and cfg_master.type="active_post") as name_th,(select AName_th from TOAdvertising where toaid=Paid) as AName_th from LogViewPost,Post,users where LogViewPost.POID=Post.POID and Post.TOProperty="1" and LogViewPost.ViewByUserID=users.id and users.activated="1" and date(LogViewPost.LastUpdate) between "'.$data['StartDate'].'" and "'.$data['EndDate'].'" '.$qProjectName.$qOwnerName.$qAdvertising.$qGroupBy.$qOrderBy);
		return $query;
	}

	function listUnitViewDetail($POID,$viewType,$StartDate,$EndDate){
		$queryPost=$this->db->query('select Telephone1,LineID from Post Where POID="'.$POID.'"');
		$rowPost=$queryPost->row();
		$Tel=$rowPost->Telephone1;
		$LineID=$rowPost->LineID;
		if($viewType==1){
			$query=$this->db->query('Select b.id as user_id,a.*,date(a.LastUpdate) as LogDate,b.id,b.email,b.firstname,b.lastname,(select count(*) from LogViewPost where ViewByUserID=user_id) as countView from LogViewPost a,users b Where a.ViewByUserID=b.id and b.activated="1" and a.POID="'.$POID.'" and date(a.LastUpdate) between "'.$StartDate.'" and "'.$EndDate.'"');
		}else{
			$query=$this->db->query('Select b.id as user_id,a.*,date(a.LastUpdate) as LogDate,b.id,b.email,b.firstname,b.lastname,(select count(*) from LogViewPost where ViewByUserID=user_id) as countView from LogViewPost a,users b Where a.ViewByUserID=b.id and b.activated="1" and POID="'.$POID.'" and date(a.LastUpdate) between "'.$StartDate.'" and "'.$EndDate.'" and a.ViewTelByUserID is not null');
		}
		$resultSearch=array();
		foreach ($query->result() as $row){
			$UserName=$row->firstname." ".$row->lastname;
			$Value=array(
				"UserID" => $row->id,
				"UserName" => $UserName,
				"Email" => $row->email,
				"Date" => $row->LogDate,
				"Tel" => $Tel,
				"Line" => $LineID,
				"View" => $row->countView
				);
			array_push($resultSearch,$Value);
		}
		echo json_encode($resultSearch);
	}

	function listUnitView2($data){
		if($data['UserName']!=''){
			$qUserName=" and users.firstname like '%".$data['UserName']."%' ";
		}else{
			$qUserName="";
		}
		if($data['OrderBy']=='1'){
			$qOrderBy=" order by LogViewPost.LastUpdate ASC,users.firstname ASC,users.lastname ASC";
		}else if($data['OrderBy']=='2'){
			$qOrderBy=" order by users.firstname ASC,users.lastname ASC,LogViewPost.LastUpdate ASC";
		}
		$qGroupBy=" group by date(LogViewPost.LastUpdate),users.id ";
		$query=$this->db->query('select LogViewPost.LastUpdate,LogViewPost.ViewByUserID as user_id,users.* from LogViewPost,users where LogViewPost.ViewByUserID=users.id and date(LogViewPost.LastUpdate) between "'.$data['StartDate'].'" and "'.$data['EndDate'].'" '.$qUserName.$qGroupBy.$qOrderBy);
		return $query;
	}

	function listUnitViewDetail2($user_id,$viewType,$OperateDate){
		if($viewType==2){
			$qLog=" and ViewTelByUserID is not null ";
		}else{
			$qLog="";
		}
		$query=$this->db->query('select LogViewPost.LastUpdate,Post.user_id as Puser_id,Post.Active as Pactive,Post.TOAdvertising as Paid,Post.*,(select email from users where id=Puser_id) as email,(select name_th from cfg_master where id=Pactive and cfg_master.type="active_post") as name_th,(select AName_th from TOAdvertising where toaid=Paid) as AName_th from LogViewPost,Post where LogViewPost.POID=Post.POID and Post.TOProperty="1" and LogViewPost.ViewByUserID="'.$user_id.'" and date(LogViewPost.LastUpdate)=date("'.$OperateDate.'")'.$qLog);
		$resultSearch=array();
		foreach ($query->result() as $row){
			$view=explode("/",$this->listviewUser($row->POID,$OperateDate,$OperateDate));
			$Value=array(
				"LastUpdate" => $row->LastUpdate,
				"ProjectName" => $row->ProjectName,
				"DateCreate" => $row->DateCreate,
				"OwnerName" => $row->OwnerName,
				"Telephone1" => $row->Telephone1,
				"LineID" => $row->LineID,
				"Email1" => $row->Email1,
				"Tower" => $row->Tower,
				"RoomNumber" => $row->RoomNumber,
				"Address" => $row->Address,
				"Floor" => $row->Floor,
				"countView" => $view[0],
				"countViewTel" => $view[1]
				);
			array_push($resultSearch,$Value);
		}
		echo json_encode($resultSearch);
	}

	function listviewUser($POID,$StartDate,$EndDate){
		$query=$this->db->query('Select count(a.ID) as CView from LogViewPost a,users b Where a.ViewByUserID=b.id and a.POID="'.$POID.'" and date(a.LastUpdate) between "'.$StartDate.'" and "'.$EndDate.'"');
		$row=$query->row();
		$CView=$row->CView;
		$query=$this->db->query('Select count(a.ID) as CTel from LogViewPost a,users b Where a.ViewByUserID=b.id and a.POID="'.$POID.'" and date(a.LastUpdate) between "'.$StartDate.'" and "'.$EndDate.'" and a.ViewTelByUserID is not null');
		$row=$query->row();
		$CTel=$row->CTel;
		$txt=$CView."/".$CTel;
		return $txt;
	}

	function listviewPost($user_id,$OperateDate){
		$query=$this->db->query('Select count(a.ID) as CView from LogViewPost a Where a.ViewByUserID="'.$user_id.'" and date(a.LastUpdate)=date("'.$OperateDate.'")');
		$row=$query->row();
		$CView=$row->CView;
		$query=$this->db->query('Select count(a.ID) as CTel from LogViewPost a Where a.ViewByUserID="'.$user_id.'" and date(a.LastUpdate)=date("'.$OperateDate.'") and a.ViewTelByUserID is not null');
		$row=$query->row();
		$CTel=$row->CTel;
		$txt=$CView."/".$CTel;
		return $txt;
	}

	function searchUserLastPost($user_id){
		$query=$this->db->query('select * from Post where user_id="'.$user_id.'" order by POID limit 1');
		$row=$query->row();
	}

	public function provinceName($id){
		$query=$this->db->query('select ProvinceName from Province Where id="'.$id.'"');
		$row=$query->row();
		$txt=$row->ProvinceName;
		return $txt;
	}

	public function updateMarkerProvince($data){
		$this->db->query('update KeyMarker set ProvinceID="'.$data['ProvinceID'].'" where ID="'.$data['MarkerID'].'"');
	}

	public function homeCountUnit($Active){
		if($Active==1){
			$query=$this->db->query('select count(POID) as unit from Post where ApproveDate!="0000-00-00"');
			//$pSelect="ApproveDate!='0000-00-00'";
		}else{
			//$pSelect="Active='".$Active."'";
			$query=$this->db->query('select count(POID) as unit from Post where Active="'.$Active.'"');
		}
		//$query=$this->db->query('select count(POID) as unit from Post where "'.$pSelect.'"');
		$row=$query->row();
		return $row->unit;
	}

	public function projectCount(){
		$query=$this->db->query('select count(PID) as unit from Project where Lat!="0" and Lng!="0"');
		$row=$query->row();
		return $row->unit;
	}

	function checkFacebookMsgID($MsgID){
		$user_id=$this->session->userdata('user_id');
		$query=$this->db->query('select messengerID from users where messengerID="'.$MsgID.'"');
/*
		if($query->num_rows()==0){
			$this->db->query('update users set messengerID="'.$MsgID.'" where id="'.$user_id.'"');
			$this->db->query('insert into greeting set messengerID="'.$MsgID.'"');
			//Setting Token
			$Token=md5($MsgID." ".time());
			$this->db->query('insert into MsgToken set Token="'.$Token.'"');
			//run command https://bot.zmyhome.com/index.php/messenger/sendGreetingLogin?MsgID=$MsgID&token=$token
			file_get_contents('http://bot.zmyhome.com/index.php/messenger/sendGreetingLogin?MsgID='.$MsgID.'&Token='.$Token);
*/
			if($query->num_rows()==0){
				$this->db->query('update users set messengerID="'.$MsgID.'" where id="'.$user_id.'"');
				$this->db->query('insert into greeting set messengerID="'.$MsgID.'"');
        //Setting Token
				$Token=md5($MsgID." ".time());
				$this->db->query('insert into MsgToken set Token="'.$Token.'"');
        //run command https://bot.zmyhome.com/index.php/messenger/sendGreetingLogin?MsgID=$MsgID&token=$token
				file_get_contents('http://bot.zmyhome.com/index.php/messenger/sendGreetingLogin?MsgID='.$MsgID.'&Token='.$Token.'&Type=1');
			}
		}

		function checkSignupEmail($email){
			$query=$this->db->query('select id from users where email="'.$email.'"');
			if($query->num_rows()==0){
				$chkemail=0;
			}else{
				$chkemail=1;
			}
			return $chkemail;
		}

		function checkLoginPassword($data){
		/*$login=$data['user_id'];
		$password=$data['password'];
		if (!is_null($user = $this->ci->users->$get_user_func($login))) {	// login ok
			// Does password match hash in database?
			$hasher = new PasswordHash(
					$this->ci->config->item('phpass_hash_strength', 'tank_auth'),
					$this->ci->config->item('phpass_hash_portable', 'tank_auth'));
			if ($hasher->CheckPassword($password, $user->password)) {// password ok
				if ($user->banned == 1) {// fail - banned
					$chkpassword=-2;
				} else {
					if ($user->activated == 0) {// fail - not activated
						$chkpassword=-1;
					} else {// success
						$chkpassword=1;
					}
				}
			} else {// fail - wrong password
				$chkpassword=0;
			}
		}
		return $chkpassword;*/
	}

	function userAnalysisList($data){
		$qUser='';
		if($data['Email']!=''){
			$qUser.=' and users.email like "%'.$data['Email'].'%"';
		}
		if($data['FirstName']!=''){
			$qUser.=' and users.firstname like "%'.$data['FirstName'].'%"';
		}
		if($data['LastName']!=''){
			$qUser.=' and users.lastname like "%'.$data['LastName'].'%"';
		}
		if(isset($data['SortPost']) && $data['SortPost']!=''){
			if($data['SortPost']==1){//Last Login
				$qSort=' order by users.last_login DESC,users.email,users.firstname';
			}else if($data['SortPost']==2){//Email
				$qSort=' order by users.email,users.firstname';
			}else if($data['SortPost']==3){//First Name
				$qSort=' order by users.firstname';
			}
		} else {
			$qSort=" order by users.email,users.firstname";
		}
		$qGroup=" group by users.id";
		$query=$this->db->query('select users.id as userid,users.id,users.email,users.firstname,users.lastname,
			sum(!isnull(LogViewPost.ViewTelByUserID)) as total_telview,
			avg(Post.TotalPrice) as avg_price,
			count(LogViewPost.ViewByUserID) as total_view,
			max(date(LastUpdate)) as last_view,
			(select count(FavoriteUser.ID) from Post,FavoriteUser where Post.POID=FavoriteUser.POID and Post.user_id=userid and (month(FavoriteUser.DateCreate)="'.(int)$data['SelMonth'].'" and year(FavoriteUser.DateCreate)="'.$data['SelYear'].'")) as total_follow,
			(select max(date(LastUpdate)) from LogViewPost where ViewTelByUserID=userid and (month(LogViewPost.LastUpdate)="'.(int)$data['SelMonth'].'" and year(LogViewPost.LastUpdate)="'.$data['SelYear'].'")) as last_telview,
			(select count(ID) from FavoriteUser where user_id=userid and (month(DateCreate)="'.(int)$data['SelMonth'].'" and year(DateCreate)="'.$data['SelYear'].'")) as total_favorite,
			(select count(id) from add_view_facebook_detail where user_id=userid and (month(last_update)="'.(int)$data['SelMonth'].'" and year(last_update)="'.$data['SelYear'].'")) as total_share
			from users,LogViewPost,Post where users.id=LogViewPost.ViewByUserID and LogViewPost.POID=Post.POID and users.activated="1" and date(LogViewPost.LastUpdate)="'.$data['SelDate'].'"'.$qUser.$qGroup.$qSort);
		return $query;
	}

	function searchAnalysisTelView($user_id,$SelDate,$start_day,$end_day){
		$queryDate=$this->db->query('select adddate("'.$SelDate.'",-"'.$end_day.'") as end_date,adddate("'.$SelDate.'",-"'.$start_day.'") as start_date');
		$rowDate=$queryDate->row();
		$start_date=$rowDate->start_date;
		$end_date=$rowDate->end_date;
		$query=$this->db->query('select count(ID) as totalview from LogViewPost where ViewTelByUserID="'.$user_id.'" and date(LastUpdate) between "'.$start_date.'" and "'.$end_date.'"');
		$row=$query->row();
		return $row->totalview;
	}

	function searchAnalysisUnitView($user_id,$SelDate,$start_day,$end_day){
		$queryDate=$this->db->query('select adddate("'.$SelDate.'",-"'.$end_day.'") as end_date,adddate("'.$SelDate.'",-"'.$start_day.'") as start_date');
		$rowDate=$queryDate->row();
		$start_date=$rowDate->start_date;
		$end_date=$rowDate->end_date;
		$query=$this->db->query('select count(ID) as totalview from LogViewPost where ViewByUserID="'.$user_id.'" and date(LastUpdate) between "'.$start_date.'" and "'.$end_date.'"');
		$row=$query->row();
		return $row->totalview;
	}

	function userAnalysisListUnit($data){
		if($data['SelYear']!=''){
			$qYear=' and (year(FavoriteUser.DateCreate)="'.$data['SelYear'].'" and month(FavoriteUser.DateCreate)="'.(int)$data['SelMonth'].'")';
			$qYear2=' and (year(LogViewPost.LastUpdate)="'.$data['SelYear'].'" and month(LogViewPost.LastUpdate)="'.(int)$data['SelMonth'].'")';
			$qYear3=' and (year(add_view_facebook_detail.last_update)="'.$data['SelYear'].'" and month(add_view_facebook_detail.last_update)="'.(int)$data['SelMonth'].'")';
		}else{
			$qYear='';
			$qYear2='';
			$qYear3='';
		}
		if($data['start_day']!='' and $data['end_day']!=''){
			$queryDate=$this->db->query('select adddate(curdate(),-"'.$data['end_day'].'") as end_date,adddate(curdate(),-"'.$data['start_day'].'") as start_date');
			$rowDate=$queryDate->row();
			$start_date=$rowDate->start_date;
			$end_date=$rowDate->end_date;
			$qDay.=' and date(FavoriteUser.DateCreate) between "'.$start_date.'" and "'.$end_date.'"';
			$qDay2.=' and date(LogViewPost.LastUpdate) between "'.$start_date.'" and "'.$end_date.'"';
			$qDay3.=' and date(add_view_facebook_detail.last_update) between "'.$start_date.'" and "'.$end_date.'"';
		}else{
			$qDay='';
			$qDay2='';
			$qDay3='';
		}
		if($data['type']=='favorite'){
			$qSelect.='select date(FavoriteUser.DateCreate) as ViewDate,Post.POID,Post.ProjectName,Post.Province,(select ProvinceName from Province where id=Province) as ProvinceName,Post.Floor,Post.Bedroom,Post.useArea,Post.TotalPrice,Post.PricePerSq from FavoriteUser,Post where FavoriteUser.POID=Post.POID and FavoriteUser.user_id="'.$data['user_id'].'"'.$qYear.$qDay;
		}else if($data['type']=='follow'){
			$qSelect.='select date(FavoriteUser.DateCreate) as ViewDate,Post.POID,Post.ProjectName,Post.Province,(select ProvinceName from Province where id=Province) as ProvinceName,Post.Floor,Post.Bedroom,Post.useArea,Post.TotalPrice,Post.PricePerSq from FavoriteUser,Post where FavoriteUser.POID=Post.POID and Post.user_id="'.$data['user_id'].'"'.$qYear.$qDay;
		}else if($data['type']=='share'){
			$qSelect.='select date(add_view_facebook_detail.last_update) as ViewDate,Post.POID,Post.ProjectName,Post.Province,(select ProvinceName from Province where id=Province) as ProvinceName,Post.Floor,Post.Bedroom,Post.useArea,Post.TotalPrice,Post.PricePerSq from add_view_facebook_detail,Post where add_view_facebook_detail.POID=Post.POID and add_view_facebook_detail.user_id="'.$data['user_id'].'"'.$qYear3.$qDay3;
		}else if($data['type']=='telview'){
			$qSelect.='select date(LogViewPost.LastUpdate) as ViewDate,Post.POID,Post.ProjectName,Post.Province,(select ProvinceName from Province where id=Province) as ProvinceName,Post.Floor,Post.Bedroom,Post.useArea,Post.TotalPrice,Post.PricePerSq from LogViewPost,Post where LogViewPost.POID=Post.POID and LogViewPost.ViewTelByUserID="'.$data['user_id'].'"'.$qYear2.$qDay2;
		}else if($data['type']=='unitview'){
			$qSelect.='select date(LogViewPost.LastUpdate) as ViewDate,Post.POID,Post.ProjectName,Post.Province,(select ProvinceName from Province where id=Province) as ProvinceName,Post.Floor,Post.Bedroom,Post.useArea,Post.TotalPrice,Post.PricePerSq from LogViewPost,Post where LogViewPost.POID=Post.POID and LogViewPost.ViewByUserID="'.$data['user_id'].'"'.$qYear2.$qDay2;
		}
		$qSort=" order by ViewDate";
		$qSelect.=$qSort;
		$query=$this->db->query($qSelect);
		return $query;
	}

	function transferUnitList($data){
		if($data['EmailType']<>''){
			$Email=$data['EmailType']."|".$data['Email'];
		}else{
			$Email=$data['Email'];
		}
		$query=$this->db->query('select Post.user_id,Post.POID,Post.ProjectName,Post.OwnerName,Post.Active,(select name_th from cfg_master where id=Active and type="active_post") as ActiveName,Post.Floor,Post.Bedroom,Post.useArea,Post.TotalPrice,users.firstname,users.lastname from Post,users where Post.user_id=users.id and users.email="'.$Email.'" order by Post.DateCreate');
		return $query;
	}

	function transferUnitUpdate($data){
		$queryUser=$this->db->query('select id from users where messengerID="'.$data['SelMsgID'].'"');
		$success=0;
		if($queryUser->num_rows()>0){
			$rowUser=$queryUser->row();
			$this->db->query('insert into PostMove select * from Post where user_id="'.$data['SelUserID'].'"');
			$this->db->query('update Post set user_id="'.$rowUser->id.'" where user_id="'.$data['SelUserID'].'"');
			$this->db->query('update users set banned=1 where id="'.$data['SelUserID'].'"');
			$Token=md5($data['SelMsgID']." ".time());
			$this->db->query('insert into MsgToken set Token="'.$Token.'"');
			//run command https://bot.zmyhome.com/index.php/messenger/sendGreetingLogin?MsgID=$MsgID&token=$token
			file_get_contents('http://bot.zmyhome.com/index.php/messenger/sendGreetingLogin?MsgID='.$data['SelMsgID'].'&Token='.$Token.'&Type=0');
			$success=1;
		}
		return $success;
	}

	function countviewPost($Type,$user_id,$LastDate=''){
		if($Type=='tel'){
			$sView=' and ViewTelByUserID="'.$user_id.'" and ViewTelByUserID is not null';
		}else{
			$sView=' and ViewByUserID="'.$user_id.'" and ViewByUserID is not null';
		}
		if($LastDate<>''){
			$sDate=' and date(LastUpdate)<="'.$LastDate.'"';
		}else{
			$sDate='';
		}
		$query=$this->db->query('Select count(ID) as CView from LogViewPost Where 1'.$sView.$sDate);
		$row=$query->row();
		$countView=$row->CView;
		return $countView;
	}

	function updateNotePostExpire($data)
	{
		$DateCreate=date("Y-m-d");
		$query=$this->db->query('Select ID from BlockPostMsg Where POID="'.$data['POID'].'"');
		if ($query->num_rows()=='0'){
			$this->db->query('Insert into BlockPostMsg set POID="'.$data['POID'].'", Msg3="'.$data['Msg3'].'", DateCreate="'.$DateCreate.'"');
		} else {
			$this->db->query('Update BlockPostMsg set Msg3="'.$data['Msg3'].'", DateCreate="'.$DateCreate.'" Where POID="'.$data['POID'].'"');
		}
	}

	function duplicateRoom($PID,$Address,$RoomNumber,$Advertising=''){
		if($Advertising<>''){
			$qAdvertising=' and TOAdvertising="'.$Advertising.'"';
		}else{
			$qAdvertising='';
		}
		if ($RoomNumber="null"){
			$query=$this->db->query('Select count(POID) as cPOID from Post where PID="'.$PID.'" and Address="'.$Address.'" and Active!=3'.$qAdvertising);
		} else {
			$query=$this->db->query('Select count(POID) as cPOID from Post where PID="'.$PID.'" and RoomNumber="'.$RoomNumber.'" and Active!=3'.$qAdvertising);
		}
		$chkRow=$query->row()->cPOID;
		if ($chkRow>1){
			$txt="ห้องซ้ำ";
		} else {
			$txt="";
		}
		return $txt;
	}

	function listProjectAdword()
	{
		$query=$this->db->query("Select Project.* from Project,Post where Project.PID=Post.PID and Post.Active=1 group by Project.PID order by PName_th limit 1201,400");
		return $query;
	}

	function addLogClick($user_id,$field){
		$query=$this->db->query('select id,'.$field.' from users_activity_page where user_id="'.$user_id.'"');
		if($query->num_rows()==0){
			$this->db->query('insert into users_activity_page set user_id="'.$user_id.'",'.$field.'=1,DateTime=now()');
		}else{
			$row=$query->row();
			if($row->$field==0){
				$this->db->query('update users_activity_page set '.$field.'=1,DateTime=now() where user_id="'.$user_id.'"');
			}
		}
	}
	
	function getLogClick($user_id,$field){
		$query=$this->db->query('select id,'.$field.' from users_activity_page where user_id="'.$user_id.'"');
		if($query->num_rows()>0){
			$row=$query->row();
			$value=$row->$field;
		}else{
			$value=0;
		}
		if($field=='dashboard' and $value==0){
			$queryPost=$this->db->query('select count(POID) as count_unit from Post where user_id="'.$user_id.'" and (Active=0 or Active=1 or Active=3 or Active=81 or Active=82 or Active=92 or Active=93)');
			$rowPost=$queryPost->row();
			if($rowPost->count_unit==0){
				$value=1;//กรณีที่ไม่มีห้องลงประกาศ ไม่ต้องแสดง
			}
		}
		
		return $value;
	}
	
	function viewUnitBoostPost($viewType){
		$query=$this->db->query('select Post.POID as sPOID,Post.POID,Post.user_id,Post.Active,Post.TOProperty,Post.PID,Post.TOAdvertising,Post.OwnerName,Post.Telephone1,Post.Telephone2,Post.Email1,Post.Email2,Post.DateExpire,if((select count(JobID) from cCreditJob where POID=sPOID order by JobID limit 1)=0,0,1) as boost_status from Post,ImageBanner where Post.POID=ImageBanner.POID and ImageBanner.status=1 and ImageBanner.type="'.$viewType.'"');
		return $query;
	}

	function viewCreditUse($start_date,$end_date){
		$query=$this->db->query('select operate_date as sdate,operate_date,sum(credit_use) as credit_use,(select count(Distinct user_id) from cCreditJob,cCreditJobDetail where cCreditJob.JobID=cCreditJobDetail.JobID and cCreditJobDetail.operate_date=sdate) as count_user,(select count(Distinct POID) from cCreditJob,cCreditJobDetail where cCreditJob.JobID=cCreditJobDetail.JobID and cCreditJobDetail.operate_date=sdate) as count_unit from cCreditJobDetail where operate_date between "'.$start_date.'" and "'.$end_date.'" group by operate_date order by operate_date DESC');
		return $query;
	}

	function viewCreditUseDetail($operate_date,$user_id='',$POID=''){
		if($user_id<>''){
			$qUser=' and cCreditJob.user_id="'.$user_id.'"';
		}else{
			$qUser='';
		}
		if($POID<>''){
			$qUnit=' and cCreditJob.POID="'.$POID.'"';
		}else{
			$qUnit='';
		}
		$query=$this->db->query('select cCreditJob.JobID,cCreditJob.user_id,cCreditJob.POID,sum(cCreditJobDetail.count_view) as count_view,sum(cCreditJobDetail.credit_use) as credit_use,Post.OwnerName,Post.TOAdvertising,Post.DateExpire,Post.PID as sPID,(select PName_th from Project where PID=sPID) as ProjectName from cCreditJob,cCreditJobDetail,Post where cCreditJob.JobID=cCreditJobDetail.JobID and cCreditJob.POID=Post.POID and cCreditJobDetail.operate_date="'.$operate_date.'" '.$qUser.$qUnit.' group by cCreditJob.POID order by Post.TOAdvertising,Post.OwnerName');
		return $query;
	}

	function dailyAdSummary($start_date,$end_date){
		$query=$this->db->query('select COALESCE(operate_date,0) as sdate, COALESCE(operate_date,0) as operate_date, COALESCE(sum(credit_use), 0) as reach_promote_action,(select count(Distinct ViewByUserID) from LogViewBanner where date(LastUpdate)=sdate) as click_promote_user from cCreditJobDetail where operate_date between "'.$start_date.'" and "'.$end_date.'"');
		$row=$query->row();
		$query1=$this->db->query('select count(Distinct LogViewBanner.ID) as click_promote_action from cCreditJob,LogViewBanner where cCreditJob.POID=LogViewBanner.POID and date(LogViewBanner.LastUpdate) between "'.$start_date.'" and "'.$end_date.'" and LogViewBanner.POID<>0');
		$row1=$query1->row();
		$query2=$this->db->query('select LogViewBanner.ViewByUserID as click_promote_user from cCreditJob,LogViewBanner where cCreditJob.POID=LogViewBanner.POID and date(LogViewBanner.LastUpdate) between "'.$start_date.'" and "'.$end_date.'" and LogViewBanner.POID<>0 group by LogViewBanner.ViewByUserID,LogViewBanner.POID');
		$row2=$query2->row();
		$click_promote_user=$query2->num_rows();
		$query3=$this->db->query('select count(Distinct LogViewTel.id) as tel_promote_action from cCreditJob,LogViewTel where cCreditJob.POID=LogViewTel.POID and LogViewTel.type=2 and date(LogViewTel.LastUpdate) between "'.$start_date.'" and "'.$end_date.'" and LogViewTel.POID<>0');
		$row3=$query3->row();
		$query4=$this->db->query('select LogViewTel.ViewByUserID as tel_promote_user from cCreditJob,LogViewTel where cCreditJob.POID=LogViewTel.POID and LogViewTel.type=2 and date(LogViewTel.LastUpdate) between "'.$start_date.'" and "'.$end_date.'" and LogViewTel.POID<>0 group by LogViewTel.ViewByUserID,LogViewTel.POID');
		$row4=$query4->row();
		$tel_promote_user=$query4->num_rows();
		$value[1]=$row->reach_promote_action;
		$value[2]=$row1->click_promote_action;
		$value[3]=$row3->tel_promote_action;
		//$value[4]=$row->reach_promote_user;
		$value[5]=$click_promote_user;
		$value[6]=$tel_promote_user;

		$query1=$this->db->query('select count(Distinct LogViewPostDaily.ID) as click_organic_action from cCreditJob,LogViewPostDaily where cCreditJob.POID=LogViewPostDaily.POID and date(LogViewPostDaily.LastUpdate) between "'.$start_date.'" and "'.$end_date.'" and cCreditJob.POID<>0');
		$row1=$query1->row();
		$query2=$this->db->query('select LogViewPostDaily.ViewByUserID from cCreditJob,LogViewPostDaily where cCreditJob.POID=LogViewPostDaily.POID and date(LogViewPostDaily.LastUpdate) between "'.$start_date.'" and "'.$end_date.'" and cCreditJob.POID<>0 group by LogViewPostDaily.ViewByUserID,LogViewPostDaily.POID');
		$row2=$query2->row();
		$click_organic_user=$query2->num_rows();
		
		$query3=$this->db->query('select count(Distinct LogViewTel.id) as tel_organic_action from cCreditJob,LogViewTel where cCreditJob.POID=LogViewTel.POID and LogViewTel.type=1 and date(LogViewTel.LastUpdate) between "'.$start_date.'" and "'.$end_date.'" and cCreditJob.POID<>0 group by LogViewTel.id');
		$row3=$query3->row();
		$query4=$this->db->query('select LogViewTel.ViewByUserID as tel_organic_user from cCreditJob,LogViewTel where cCreditJob.POID=LogViewTel.POID and LogViewTel.type=1 and date(LogViewTel.LastUpdate) between "'.$start_date.'" and "'.$end_date.'" and cCreditJob.POID<>0 group by LogViewTel.ViewByUserID,LogViewTel.POID');
		$row4=$query4->row();
		$tel_organic_user=$query4->num_rows();

		//$value[7]=$row2->reach_organic_action;
		$value[8]=$row1->click_organic_action;
		$value[9]=$row3->tel_organic_action;
		$value[10]=$click_organic_user;
		$value[11]=$tel_organic_user;
		return $value;
	}
	
	function dailyAdSummaryDetail($start_date, $end_date){
		$query=$this->db->query('select cCreditJob.POID,OwnerName, ProjectName, Bedroom, useArea, (CASE WHEN Post.TOAdvertising = "1" THEN TOAdvertising.AName_th WHEN Post.TOAdvertising = "2" THEN TOAdvertising.AName_th WHEN Post.TOAdvertising = 5 THEN TOAdvertising.AName_th END) as advertisement, (CASE Post.TOAdvertising WHEN "1" THEN Post.TotalPrice WHEN "2" THEN Post.DTotalPrice WHEN "5" THEN Post.PRentPrice END) AS TotalPrice, PricePerSq FROM cCreditJob, Post, TOAdvertising WHERE cCreditJob.POID = Post.POID AND (date(cCreditJob.start_date) BETWEEN "'.$start_date.'" AND "'.$end_date.'" or date(cCreditJob.start_date)<="'.$start_date.'") AND Post.TOAdvertising = TOAdvertising.TOAID GROUP BY cCreditJob.POID');
		return $query;
	}
	
	function dailyAdSummaryDetailUnit($operate_date,$POID){
		$sql = ('select cCreditJob.POID as sPOID, operate_date as sdate, operate_date, sum(credit_use) as reach_promote_action, (SELECT count(ID) FROM LogViewBanner WHERE POID = sPOID AND date(LastUpdate)= sdate) AS click_promote_action FROM cCreditJob, cCreditJobDetail,Post WHERE cCreditJob.JobID = cCreditJobDetail.JobID AND cCreditJob.POID = Post.POID AND cCreditJobDetail.operate_date = ? AND cCreditJob.POID = ?');
		$query = $this->db->query($sql, array($operate_date, $POID));
		$row=$query->row();
		$query2=$this->db->query('select LogViewBanner.ViewByUserID as click_promote_user from LogViewBanner where LogViewBanner.POID="'.$POID.'" and date(LogViewBanner.LastUpdate)="'.$operate_date.'" and LogViewBanner.POID<>0 group by LogViewBanner.ViewByUserID,LogViewBanner.POID');
		$row2=$query2->row();
		$click_promote_user=$query2->num_rows();
		$query3=$this->db->query('select count(Distinct LogViewTel.ID) as tel_promote_action from LogViewTel where LogViewTel.POID="'.$POID.'" and LogViewTel.type=2 and date(LogViewTel.LastUpdate)="'.$operate_date.'" and LogViewTel.POID<>0');
		$row3=$query3->row();
		$query4=$this->db->query('select LogViewTel.ViewByUserID as tel_promote_user from LogViewTel where LogViewTel.POID="'.$POID.'" and LogViewTel.type=2 and date(LogViewTel.LastUpdate)="'.$operate_date.'" and LogViewTel.POID<>0 group by LogViewTel.ViewByUserID,LogViewTel.POID');
		$row4=$query4->row();
		$tel_promote_user=$query4->num_rows();
		$value[1]=$row->reach_promote_action;
		$value[2]=$row->click_promote_action;
		$value[3]=$row3->tel_promote_action;
		//$value[4]=$row->reach_promote_user;
		$value[5]=$click_promote_user;
		$value[6]=$tel_promote_user;
		
		$query1=$this->db->query('select count(Distinct LogViewPostDaily.ID) as click_organic_action from LogViewPostDaily where LogViewPostDaily.POID="'.$POID.'" and date(LogViewPostDaily.LastUpdate)="'.$operate_date.'" and LogViewPostDaily.POID<>0');
		$row1=$query1->row();
		$query2=$this->db->query('select LogViewPostDaily.ViewByUserID from LogViewPostDaily where LogViewPostDaily.POID="'.$POID.'" and date(LogViewPostDaily.LastUpdate)="'.$operate_date.'" and LogViewPostDaily.POID<>0 group by LogViewPostDaily.ViewByUserID,LogViewPostDaily.POID');
		$row2=$query2->row();
		$click_organic_user=$query2->num_rows();
		
		$query3=$this->db->query('select count(Distinct LogViewTel.ID) as tel_organic_action from LogViewTel where LogViewTel.POID="'.$POID.'" and LogViewTel.type=1 and date(LogViewTel.LastUpdate)="'.$operate_date.'" and LogViewTel.POID<>0');
		$row3=$query3->row();
		$query4=$this->db->query('select LogViewTel.ViewByUserID as tel_organic_user from LogViewTel where LogViewTel.POID="'.$POID.'" and LogViewTel.type=1 and date(LogViewTel.LastUpdate)="'.$operate_date.'" and LogViewTel.POID<>0 group by LogViewTel.ViewByUserID,LogViewTel.POID');
		$row4=$query4->row();
		$tel_organic_user=$query4->num_rows();

		//$value[7]=$row2->reach_organic_action;
		$value[8]=$row1->click_organic_action;
		$value[9]=$row3->tel_organic_action;
		$value[10]=$click_organic_user;
		$value[11]=$tel_organic_user;

		return $value;
	}
	
	function qPromoType(){
		$this->db->query('SET NAMES utf8');
		$this->db->query('SET character_set_results=utf8');
		$query=$this->db->query('select id,name_th,name_en from cfg_master Where type="promo_type" and status=1 Order By sort_no');
		return $query;
	}
	
	function qPromoUserType(){
		$this->db->query('SET NAMES utf8');
		$this->db->query('SET character_set_results=utf8');
		$query=$this->db->query('select id,name_th,name_en from cfg_master Where type="promo_user_type" and status=1 Order By sort_no');
		return $query;
	}
	
	function qPromoReuseType(){
		$this->db->query('SET NAMES utf8');
		$this->db->query('SET character_set_results=utf8');
		$query=$this->db->query('select id,name_th,name_en from cfg_master Where type="promo_reuse_type" and status=1 Order By sort_no');
		return $query;
	}
	
	function listPromoCode($PromoCode){
		$sName='name_th';
		if($PromoCode<>''){
			$qPromoCode=' and PromoCode="'.$PromoCode.'"';
		}else{
			$qPromoCode='';
		}
		$query=$this->db->query('select *,(select '.$sName.' from cfg_master where type="promo_type" and id=PromoType) as PromoTypeName,(select '.$sName.' from cfg_master where type="promo_user_type" and id=user_type) as UserTypeName,(select '.$sName.' from cfg_master where type="promo_reuse_type" and id=reuse) as ReuseTypeName from cCreditPromotion where 1 '.$qPromoCode.' order by start_date,end_date');
		return $query;
	}
	function listAdControl(){
		$query=$this->db->query("select * from ImageAd order by device_type ASC");
		return $query;
	}
}
?>