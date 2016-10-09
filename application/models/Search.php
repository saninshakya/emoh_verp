<?php
class Search extends CI_Model {
 
    function __construct()
     {
         // Call the Model constructor
         parent::__construct();
     }

	function getFirstPoint($namePoint,$TOAdvertising)
	{
		//$TOAdvertising => 1=>ขาย, 2=>ขายดาวน์, 3=>เช่า
		$query=$this->db->query('Select Type, Lat, Lng, KeyID from KeyMarker Where KeyName="'.$namePoint.'"');
		$row=$query->row();
		$Type=$row->Type;
		$KeyID=$row->KeyID;
		$Lat=$row->Lat;
		$Lng=$row->Lng;
		$centerMap=array(
			"CenterName" => $namePoint,
			"Lat" => $Lat,
			"Lng" => $Lng
		);
		$resultSearch=array();
		array_push($resultSearch, $centerMap);
		//Area Search
		if ($Type=="Area"){
			$queryArea=$this->db->query('Select PID, PName_th, Lat, Lng from Project Where Area="'.$namePoint.'"');
			foreach ($queryArea->result() as $rowArea){
				$PID=$rowArea->PID;
				$ProjectName=$rowArea->PName_th;
				$Lat=$rowArea->Lat;
				$Lng=$rowArea->Lng;
				if ($TOAdvertising=="1"){
					$queryPost=$this->db->query('Select count(POID) as NumUnit, Min(TotalPrice) as MinPrice, Min(PricePerSq) as MinPricePerSq from Post Where Active=1 and PID="'.$PID.'" and  (TOAdvertising="1" or TOAdvertising="3")  group by PID');
				}
				if ($TOAdvertising=="1"){
					$queryPost=$this->db->query('Select count(POID) as NumUnit, Min(DTotalPrice) as MinPrice, Min(PricePerSq) as MinPricePerSq from Post Where Active=1 and PID="'.$PID.'" and TOAdvertising="2" group by PID');
				}
				if ($TOAdvertising=="3"){
					$queryPost=$this->db->query('Select count(POID) as NumUnit, Min(RRentPrice) as MinPrice, Min(PricePerSq) as MinPricePerSq from Post Where Active=1 and PID="'.$PID.'" and (TOAdvertising="3" or TOAdvertising="4") group by PID');
				}
				if ($queryPost->num_rows()>0){
					$rowPost=$queryPost->row();
					$NumUnit=$rowPost->NumUnit;
					$MinPrice=$rowPost->MinPrice;
					$MinPrice=number_format(($MinPrice/1000000), 1, '.', '')."M";
					$MinPricePerSq=$rowPost->MinPricePerSq;
					$MinPricePerSq=number_format(($MinPricePerSq/1000), 1, '.', '')."k";
					$Point=array(
						"PID" => $PID,
						"ProjectName" => $ProjectName,
						"Lat" => $Lat,
						"Lng" => $Lng,
						"NumUnit" => $NumUnit,
						"MinPrice" => $MinPrice,
						"MinPricePerSq" => $MinPricePerSq 
					);
					array_push($resultSearch,$Point);
				}
			}
		}
		//Province Search
		if ($Type=="Province"){
			$queryProvince=$this->db->query('Select PID, PName_th, Lat, Lng from Project Where Province="'.$namePoint.'"');
			foreach ($queryProvince->result() as $rowProvince){
				$PID=$rowProvince->PID;
				$ProjectName=$rowProvince->PName_th;
				$Lat=$rowProvince->Lat;
				$Lng=$rowProvince->Lng;
				if ($TOAdvertising=="1"){
					$queryPost=$this->db->query('Select count(POID) as NumUnit, Min(TotalPrice) as MinPrice, Min(PricePerSq) as MinPricePerSq from Post Where Active=1 and PID="'.$PID.'" and  (TOAdvertising="1" or TOAdvertising="3")  group by PID');
				}
				if ($TOAdvertising=="2"){
					$queryPost=$this->db->query('Select count(POID) as NumUnit, Min(DTotalPrice) as MinPrice, Min(PricePerSq) as MinPricePerSq from Post Where Active=1 and PID="'.$PID.'" and TOAdvertising="2" group by PID');
				}
				if ($TOAdvertising=="3"){
					$queryPost=$this->db->query('Select count(POID) as NumUnit, Min(RRentPrice) as MinPrice, Min(PricePerSq) as MinPricePerSq from Post Where Active=1 and PID="'.$PID.'" and (TOAdvertising="3" or TOAdvertising="4") group by PID');
				}
				if ($queryPost->num_rows()>0){
					$rowPost=$queryPost->row();
					$NumUnit=$rowPost->NumUnit;
					$MinPrice=$rowPost->MinPrice;
					$MinPrice=number_format(($MinPrice/1000000), 1, '.', '')."M";
					$MinPricePerSq=$rowPost->MinPricePerSq;
					$MinPricePerSq=number_format(($MinPricePerSq/1000), 1, '.', '')."k";
					$Point=array(
						"PID" => $PID,
						"ProjectName" => $ProjectName,
						"Lat" => $Lat,
						"Lng" => $Lng,
						"NumUnit" => $NumUnit,
						"MinPrice" => $MinPrice,
						"MinPricePerSq" => $MinPricePerSq 
					);
					array_push($resultSearch,$Point);
				}
			}
		}
		//MRT or BTS
		if ($Type=="BTS" or $Type=="MRT"){
			//$queryBTSMRT=$this->db->query('Select PID from DistanceBTSMRT  Where '.$KeyID.'<1500');
			$queryBTSMRT=$this->db->query('Select  PID from DistMarker Where Station="'.$KeyID.'" and Distance<=1500');
			foreach($queryBTSMRT->result() as $rowBTSMRT)
				$PID=$rowBTSMRT->PID;
				$queryProject=$this->db->query('Select * from Project Where PID="'.$PID.'"');
				$rowProject=$queryProject->row();
				$ProjectName=$rowProject->PName_th;
				$Lat=$rowProject->Lat;
				$Lng=$rowProject->Lng;
				if ($TOAdvertising=="1"){
					$queryPost=$this->db->query('Select count(POID) as NumUnit, Min(TotalPrice) as MinPrice, Min(PricePerSq) as MinPricePerSq from Post Where Active=1 and PID="'.$PID.'" and  (TOAdvertising="1" or TOAdvertising="3")  group by PID');
				}
				if ($TOAdvertising=="2"){
					$queryPost=$this->db->query('Select count(POID) as NumUnit, Min(DTotalPrice) as MinPrice, Min(PricePerSq) as MinPricePerSq from Post Where Active=1 and PID="'.$PID.'" and TOAdvertising="2" group by PID');
				}
				if ($TOAdvertising=="3"){
					$queryPost=$this->db->query('Select count(POID) as NumUnit, Min(RRentPrice) as MinPrice, Min(PricePerSq) as MinPricePerSq from Post Where Active=1 and PID="'.$PID.'" and (TOAdvertising="3" or TOAdvertising="4") group by PID');
				}
				if ($queryPost->num_rows()>0){
					$rowPost=$queryPost->row();
					$NumUnit=$rowPost->NumUnit;
					$MinPrice=$rowPost->MinPrice;
					$MinPrice=number_format(($MinPrice/1000000), 1, '.', '')."M";
					$MinPricePerSq=$rowPost->MinPricePerSq;
					$MinPricePerSq=number_format(($MinPricePerSq/1000), 1, '.', '')."k";
					$Point=array(
						"PID" => $PID,
						"ProjectName" => $ProjectName,
						"Lat" => $Lat,
						"Lng" => $Lng,
						"NumUnit" => $NumUnit,
						"MinPrice" => $MinPrice,
						"MinPricePerSq" => $MinPricePerSq 
					);
					array_push($resultSearch,$Point);
			}
		}
		//Project Name Search
		if ($Type=="PID"){
			$queryProject=$this->db->query('Select PID, PName_th, Lat, Lng from Project Where PName_th="'.$namePoint.'"');
			foreach ($queryProject->result() as $rowArea){
				$PID=$rowArea->PID;
				$ProjectName=$rowArea->PName_th;
				$Lat=$rowArea->Lat;
				$Lng=$rowArea->Lng;
				$queryPost=$this->db->query('Select count(POID) as NumUnit, Min(TotalPrice) as MinPrice, Min(PricePerSq) as MinPricePerSq from Post Where Active=1 and PID="'.$PID.'" group by PID');
				if ($queryPost->num_rows()>0){
					$rowPost=$queryPost->row();
					$NumUnit=$rowPost->NumUnit;
					$MinPrice=$rowPost->MinPrice;
					$MinPrice=number_format(($MinPrice/1000000), 1, '.', '')."M";
					$MinPricePerSq=$rowPost->MinPricePerSq;
					$MinPricePerSq=number_format(($MinPricePerSq/1000), 1, '.', '')."k";
					$Point=array(
						"PID" => $PID,
						"ProjectName" => $ProjectName,
						"Lat" => $Lat,
						"Lng" => $Lng,
						"NumUnit" => $NumUnit,
						"MinPrice" => $MinPrice,
						"MinPricePerSq" => $MinPricePerSq 
					);
					array_push($resultSearch,$Point);
				}
			}			
		}
		echo json_encode($resultSearch);
	}
	
	function getPoint($mode,$distance,$namePoint,$TOProperty,$Bedroom,$Bathroom,$TransDist,$TransType,$Year,$TOAdvertising,$minPrice,$maxPrice,$minArea,$maxArea,$OrderType){
		$process_id=$this->testlog->genprocessid();
		$this->testlog->savelogstart($process_id);
		//mode=1 : Get Map Data
		//mode=2 : Get Unit-Image Data
		if ($distance==0 || $distance==''){
			$distance="1500";
		}
		$CenterMinPrice=0;
		$pDistanceBanner=" and DistMarker.Distance<=5000";
		//ค้นหา Lat,Long จากจุดที่ค้นหา
		//$query=$this->db->query('Select Type, Lat, Lng, KeyID from KeyMarker Where (KeyName="'.$namePoint.'" or KeyName_en="'.$namePoint.'") ');
		$query=$this->db->query('Select a.Type,a.Lat,a.Lng,a.KeyID,a.ProvinceID,b.Pic_path,(select DistanceSearch from Province where id=ProvinceID) as ProvinceSearch,(select max(Distance) from DistMarker where Station=KeyID) as DistanceMax from KeyMarker a left join KeyMarkerType b on a.Type=b.Type Where (a.KeyName="'.$namePoint.'" or a.KeyName_en="'.$namePoint.'") and a.Type not in("Minimart","Expressway","Project")');
		if ($query->num_rows()!=0){
			$row=$query->row();
			$Type=$row->Type;
			$KeyID=$row->KeyID;
			$Lat=$row->Lat;
			$Lng=$row->Lng;
			$Icon=$row->Pic_path;
			$ProvinceID=$row->ProvinceID;
			$ProvinceSearch=$row->ProvinceSearch;
			$DistanceMax=$row->DistanceMax;
			$SearchID=$KeyID;
		} else {
			$Type="Project";
			$query=$this->db->query('Select *,ProvinceID as sProvinceID,(select DistanceSearch from Province where id=sProvinceID) as ProvinceSearch from Project Where (PName_th="'.$namePoint.'" or PName_en="'.$namePoint.'" )');
			$row=$query->row();
			$sPID=$row->PID;
			$Lat=$row->Lat;
			$Lng=$row->Lng;
			$Icon="";
			$ProvinceID=$row->ProvinceID;
			$ProvinceSearch=$row->ProvinceSearch;
			if($ProvinceSearch==0){
				$queryDistMax=$this->db->query('select max(Distance) as DistanceMax from DistMarker,KeyMarker where Station=KeyID and ProvinceID="'.$ProvinceID.'"');
				$rowDistMax=$queryDistMax->row();
				$DistanceMax=$rowDistMax->DistanceMax;
			}else{
				$DistanceMax=0;
			}
			$SearchID=$sPID;
			$OrderType=5;
		}
		$pProvince='';
		if($ProvinceSearch==0){
			$pProvince=' and Project.ProvinceID="'.$ProvinceID.'"';
		}
		$centerMap=array(
			"CenterName" => $namePoint,
			"Type" => $Type,
			"cLat" => $Lat,
			"cLng" => $Lng,
			"Icon" => $Icon,
			"ProvinceSearch" => $ProvinceSearch,
			"CenterMinPrice" => $CenterMinPrice,
			"DistanceMax" => $DistanceMax
		);
		$resultSearch=array();
		if($mode=='1'){//pin
			$pSelectUnit=" Project.*,Project.Lat as PLat,Project.Lng as PLng,Post.POID,Post.ProjectName,Post.TOProperty,Post.TOAdvertising,case Post.TOAdvertising when '1' then Post.TotalPrice when '2' then Post.DTotalPrice when '5' then Post.PRentPrice end as Price, Post.PricePerSq,Post.useArea,Post.Active,Post.Developer ";
			$pSelect=" *,count(Distinct POID) as NumUnit,if(BannerStatus=1,Price,min(Price)) as Price, if(BannerStatus=1,PRicePerSq,min(PricePerSq)) as MinPricePerSq ";
			$pGroup=" group by PID ";
		}else{//list
			$pSelectUnit=" Project.PName_th,Project.PName_en,Project.SName_th,SName_en,Project.Lat as PLat,Project.Lng as PLng,Post.*,case Post.TOAdvertising when '1' then Post.TotalPrice when '2' then Post.DTotalPrice when '5' then Post.PRentPrice end as Price, DATEDIFF(CURDATE(), DateCreate) as DateShow,Post.PricePerSq as MinPricePerSq ";
			$pSelect=" * ";
			$pGroup=" group by PID,TOProperty,TOAdvertising,RoomNumber,Address,Floor ";
		}
		$pSelect1=$pSelect.",0 as distance";
		$pSelect2=$pSelect.",min(Distance) as distance ";
		$Active=1;
		$pExpire=" and Post.DateExpire>=curdate()";
		if ($TOProperty!=''){
			$TOProperty=substr($TOProperty,0,-1);
			$TOProperty=str_replace(",","','",$TOProperty);
			$pProperty=" and Post.TOProperty in('".$TOProperty."')";
		} else {
			$pProperty="";
		}
		if ($Bedroom!=''){
			$Bedroom=substr($Bedroom,0,-1);
			$Bedroom=str_replace(",","','",$Bedroom);
			$pBedroom=" and Post.Bedroom in('".$Bedroom."')";
		} else {
			$pBedroom="";
		}
		if ($Bathroom!=''){
			$Bathroom=substr($Bathroom,0,-1);
			$Bathroom=str_replace(",","','",$Bathroom);
			$pBathroom=" and Post.Bathroom in('".$Bathroom."')";
		} else {
			$pBathroom="";
		}
		if($TOAdvertising!=''){
			$TOAdvertising=substr($TOAdvertising,0,-1);
			$TOAdvertising_array=explode(",",$TOAdvertising);
			$TOAdvertising_in="";
			$Developer_in='0,';
			$pminPrice="";
			$pmaxPrice="";
			for($i=0;$i<count($TOAdvertising_array);$i++){
				if($TOAdvertising_array[$i]=='1'){//ขาย
					$TOAdvertising_in.='1,';
				}
				if($TOAdvertising_array[$i]=='2'){//ขายดาวน์
					$TOAdvertising_in.='2,';
				}
				if($TOAdvertising_array[$i]=='5'){//เช่า
					$TOAdvertising_in.='5,';
				}
				if($TOAdvertising_array[$i]=='4'){//ขาย+ขายดาวน์
					$TOAdvertising_in.='1,2,';
				}
				if($TOAdvertising_array[$i]=='6'){//ขายแล้ว
					$TOAdvertising_in.='1,2,';
					$Active=82;//cfg_master
					$pExpire="";
				}
				if($TOAdvertising_array[$i]=='7'){//เช่าแล้ว
					$TOAdvertising_in.='5,';
					$Active=81;//cfg_master
					$pExpire="";
				}
				if($TOAdvertising_array[$i]=='8'){//ขายห้องใหม่
					$Developer_in.='1,';
					if($TOAdvertising_in==''){
						$Developer_in='1,';
						$TOAdvertising_in.='1,2,';
					}
				}
				if($minPrice!="" and $minPrice!=0){
					$pminPrice=' and (case when Post.TOAdvertising=1 then Post.TotalPrice>="'.$minPrice.'"';
					$pminPrice.=' when Post.TOAdvertising=2 then Post.DTotalPrice>="'.$minPrice.'"';
					$pminPrice.=' when Post.TOAdvertising=5 then Post.PRentPrice>="'.$minPrice.'"';
					$pminPrice.=' else true end)';
				}
				if ($maxPrice!="" and $maxPrice!=0){
					$pmaxPrice=' and (case when Post.TOAdvertising=1 then Post.TotalPrice<="'.$maxPrice.'" ';
					$pmaxPrice.=' when Post.TOAdvertising=2 then Post.DTotalPrice<="'.$maxPrice.'"';
					$pmaxPrice.=' when Post.TOAdvertising=5 then Post.PRentPrice<="'.$maxPrice.'"';
					$pmaxPrice.=' else true end)';
				}
			}
			$TOAdvertising_in=substr($TOAdvertising_in,0,-1);
			$TOAdvertising_in=str_replace(",","','",$TOAdvertising_in);
			$pAdvertising=" and Post.TOAdvertising in('".$TOAdvertising_in."')";
			$Developer_in=substr($Developer_in,0,-1);
			$Developer_in=str_replace(",","','",$Developer_in);
			$pDeveloper=" and Developer in('".$Developer_in."')";
		}else{
			$pAdvertising="";
			$pDeveloper=" and Developer='0'";
		}
		if($Year!=''){
			$YC=$Year;
			$YN=date("Y")+543;
			$YD=$YN-abs($YC);
			$YD2=$YN+10;
			if($YC<0){
				$pChkYear=" and Project.YearEnd<='".$YD."' ";
			}else{
				$pChkYear=" and Project.YearEnd>'".$YD."' and Project.YearEnd<'".$YD2."' ";
			}
		} else {
			$pChkYear="";
		}
		if($ProvinceSearch==1){
			$pDistance=" and DistMarker.Distance<='".$distance."'";
		}else{
			$pDistance="";
		}
		if($minArea!="" and $minArea!=0){
			$pminArea=' and Post.useArea>="'.$minArea.'"';
		}
		if ($maxArea!="" and $maxArea!=0){
			$pmaxArea=' and Post.useArea<="'.$maxArea.'"';
		}
		if($OrderType=='1'){//เรียงตามราคา ต่ำ-สูง
			//$pOrder=" order by TOAdvertising ASC,TotalPrice,DTotalPrice,PRentPrice end ASC ";
			$pOrder=" order by Distance ASC,Price ASC ";
		}else if($OrderType=='2'){//เรียงตามราคา/ตร.ม. ต่ำ-สูง
			$pOrder=" order by MinPricePerSq ASC ";
		}else if($OrderType=='3'){//เรียงตามราคา/ตร.ม. สูง-ต่ำ
			$pOrder=" order by MinPricePerSq DESC ";
		}else if($OrderType=='4'){//เรียงตามปีสร้างเสร็จ ใหม่-เก่า
			$pOrder=" order by YearEnd DESC,PName_th ";
		}else if($OrderType=='5'){//เรียงตามระยะทางจากจุดที่ค้นหา
			$pOrder=" order by Distance ASC,TOAdvertising ASC,MinPricePerSq ASC ";
		}else{
			$pOrder=" order by TOAdvertising ASC,MinPricePerSq ASC ";
		}
		$watchedPOIDBanner=$this->session->userdata('watchedPOIDBanner');
		if($watchedPOIDBanner<>'' or $watchedPOIDBanner<>'null' or $watchedPOIDBanner<>null){
			$watchedPOIDBanner_in=substr($watchedPOIDBanner,0,-1);
			$watchedPOIDBanner_in=str_replace(",","','",$watchedPOIDBanner_in);
			$qwatchedPOIDBanner_in=" and POID not in('".$watchedPOIDBanner_in."')";
		}else{
			$qwatchedPOIDBanner_in='';
		}
		$sqlPost='';
		if($Type!="Project"){
			//$pNamePoint=" and (KeyMarker.KeyName='".$namePoint."' or KeyMarker.KeyName_en='".$namePoint."') ";
			$pNamePoint=" and KeyMarker.KeyID='".$KeyID."' ";
			$sqlPost.='select '.$pSelect2.' from (';
			if($mode=='1'){
				$sqlPost.='select * from (select * from 
				(select '.$pSelectUnit.'
				, Post.POID as PPOID
				, Post.PID as PPID
				, Post.TOAdvertising as PTOAID
				, (Select Count(ViewTelByUserID) as ViewTel from LogViewPost Where POID=PPOID) as CountViewTel
				, (Select Count(ID) from LogViewPost Where POID=PPOID) as CountView
				, (Select Distance from MinDistance Where PID=PPID) as ADistance
				, (Select KeyName from MinDistance Where PID=PPID) as AKeyName
				, (Select Type from MinDistance Where PID=PPID) as AType
				, (Select Station from MinDistance Where PID=PPID) as AStation
				, (Select count(ID) from FavoriteUser Where POID=PPOID and user_id="'.$user_id.'" and status=1) as FVStatus
				, (Select Color from TOAdvertising where TOAID=PTOAID) as TOAColor
				, (select if(count(JobID)>0,1,0) from cCreditJob,cCreditSummary where cCreditJob.user_id=cCreditSummary.user_id and cCreditJob.POID=PPOID and cCreditJob.Active=1 and cCreditSummary.Credit>0 and cCreditJob.credit_limit_pday>=total_credit_use and curdate() between cCreditJob.start_date and cCreditJob.end_date) as BannerStatus
				, DistMarker.Distance
				from Post,Project,DistMarker,KeyMarker,cCreditJob where Post.POID=cCreditJob.POID and cCreditJob.Active=1 and Post.PID=Project.PID and Project.PID=DistMarker.PID and DistMarker.Station=KeyMarker.KeyID and DistMarker.Type=KeyMarker.Type and Post.Active="'.$Active.'" and KeyMarker.Type not in("Minimart","Expressway") '.$pDeveloper.$pExpire.$pNamePoint.$pAdvertising.$pProperty.$pBedroom.$pBathroom.$pminPrice.$pmaxPrice.$pChkYear.$pDistanceBanner.$pminArea.$pmaxArea.$pProvince.' order by Distance ASC limit 1) p1 
				union ';
			}
			$sqlPost.='select * from (select '.$pSelectUnit.'
			, Post.POID as PPOID
			, Post.PID as PPID
			, Post.TOAdvertising as PTOAID
			, (Select Count(ViewTelByUserID) as ViewTel from LogViewPost Where POID=PPOID) as CountViewTel
			, (Select Count(ID) from LogViewPost Where POID=PPOID) as CountView
			, (Select Distance from MinDistance Where PID=PPID) as ADistance
			, (Select KeyName from MinDistance Where PID=PPID) as AKeyName
			, (Select Type from MinDistance Where PID=PPID) as AType
			, (Select Station from MinDistance Where PID=PPID) as AStation
			, (Select count(ID) from FavoriteUser Where POID=PPOID and user_id="'.$user_id.'" and status=1) as FVStatus
			, (Select Color from TOAdvertising where TOAID=PTOAID) as TOAColor
			, (select if(count(JobID)>0,1,0) from cCreditJob,cCreditSummary where cCreditJob.user_id=cCreditSummary.user_id and cCreditJob.POID=PPOID and cCreditJob.Active=1 and cCreditSummary.Credit>0 and cCreditJob.credit_limit_pday>=total_credit_use and curdate() between cCreditJob.start_date and cCreditJob.end_date) as BannerStatus
			, DistMarker.Distance
			from Post,Project,DistMarker,KeyMarker Where Post.PID=Project.PID and Project.PID=DistMarker.PID and DistMarker.Station=KeyMarker.KeyID and DistMarker.Type=KeyMarker.Type and Post.Active="'.$Active.'" and KeyMarker.Type not in("Minimart","Expressway") '.$pDeveloper.$pExpire.$pNamePoint.$pAdvertising.$pProperty.$pBedroom.$pBathroom.$pminPrice.$pmaxPrice.$pChkYear.$pDistance.$pminArea.$pmaxArea.$pProvince.') p2 ';
			if($mode=='1'){
				$sqlPost.=') b order by BannerStatus DESC ';
			}
			$sqlPost.=' ) a '.$pGroup.$pOrder;
		}else{
			$sqlPost.='select '.$pSelect2.' from (';
			$sqlPost.='select * from (select '.$pSelectUnit.'
			, Post.POID as PPOID
			, Post.PID as PPID
			, Post.TOAdvertising as PTOAID
			, (Select Count(ViewTelByUserID) as ViewTel from LogViewPost Where POID=PPOID) as CountViewTel
			, (Select Count(ID) from LogViewPost Where POID=PPOID) as CountView 
			, (Select Distance from MinDistance Where PID=PPID) as ADistance
			, (Select KeyName from MinDistance Where PID=PPID) as AKeyName
			, (Select Type from MinDistance Where PID=PPID) as AType
			, (Select Station from MinDistance Where PID=PPID) as AStation
			, (Select count(ID) from FavoriteUser Where POID=PPOID and user_id="'.$user_id.'" and status=1) as FVStatus
			, (Select Color from TOAdvertising where TOAID=PTOAID) as TOAColor
			, (select if(count(JobID)>0,1,0) from cCreditJob,cCreditSummary where cCreditJob.user_id=cCreditSummary.user_id and cCreditJob.POID=PPOID and cCreditJob.Active=1 and cCreditSummary.Credit>0 and cCreditJob.credit_limit_pday>=total_credit_use and curdate() between cCreditJob.start_date and cCreditJob.end_date) as BannerStatus
			, 0 as Distance
			from Post,Project Where Post.PID=Project.PID and Project.PID="'.$sPID.'" and Post.Active="'.$Active.'" '.$pDeveloper.$pExpire.$pAdvertising.$pProperty.$pBedroom.$pBathroom.$pminPrice.$pmaxPrice.$pChkYear.$pminArea.$pmaxArea.' order by Distance ASC) p 
			union ';
			if($mode=='1'){
				$sqlPost.='select * from (select * from (select '.$pSelectUnit.'
				, Post.POID as PPOID
				, Post.PID as PPID
				, Post.TOAdvertising as PTOAID
				, (Select Count(ViewTelByUserID) as ViewTel from LogViewPost Where POID=PPOID) as CountViewTel
				, (Select Count(ID) from LogViewPost Where POID=PPOID) as CountView 
				, (Select Distance from MinDistance Where PID=PPID) as ADistance
				, (Select KeyName from MinDistance Where PID=PPID) as AKeyName
				, (Select Type from MinDistance Where PID=PPID) as AType
				, (Select Station from MinDistance Where PID=PPID) as AStation
				, (Select count(ID) from FavoriteUser Where POID=PPOID and user_id="'.$user_id.'" and status=1) as FVStatus
				, (Select Color from TOAdvertising where TOAID=PTOAID) as TOAColor
				, (select if(count(JobID)>0,1,0) from cCreditJob,cCreditSummary where cCreditJob.user_id=cCreditSummary.user_id and cCreditJob.POID=PPOID and cCreditJob.Active=1 and cCreditSummary.Credit>0 and cCreditJob.credit_limit_pday>=total_credit_use and curdate() between cCreditJob.start_date and cCreditJob.end_date) as BannerStatus
				, DistMarker.Distance
				from Post,Project,DistMarker,cCreditJob Where Post.POID=cCreditJob.POID and cCreditJob.Active=1 and Post.PID=Project.PID and Post.Active="'.$Active.'" and Project.PID=DistMarker.Station and DistMarker.Type="Project" and DistMarker.PID="'.$sPID.'" '.$pDeveloper.$pExpire.$pAdvertising.$pProperty.$pBedroom.$pBathroom.$pminPrice.$pmaxPrice.$pChkYear.$pDistanceBanner.$pminArea.$pmaxArea.$pProvince.') p2 group by PID
				union ';
			}
			$sqlPost.='select * from (select '.$pSelectUnit.'
			, Post.POID as PPOID
			, Post.PID as PPID
			, Post.TOAdvertising as PTOAID
			, (Select Count(ViewTelByUserID) as ViewTel from LogViewPost Where POID=PPOID) as CountViewTel
			, (Select Count(ID) from LogViewPost Where POID=PPOID) as CountView 
			, (Select Distance from MinDistance Where PID=PPID) as ADistance
			, (Select KeyName from MinDistance Where PID=PPID) as AKeyName
			, (Select Type from MinDistance Where PID=PPID) as AType
			, (Select Station from MinDistance Where PID=PPID) as AStation
			, (Select count(ID) from FavoriteUser Where POID=PPOID and user_id="'.$user_id.'" and status=1) as FVStatus
			, (Select Color from TOAdvertising where TOAID=PTOAID) as TOAColor
			, (select if(count(JobID)>0,1,0) from cCreditJob,cCreditSummary where cCreditJob.user_id=cCreditSummary.user_id and cCreditJob.POID=PPOID and cCreditJob.Active=1 and cCreditSummary.Credit>0 and cCreditJob.credit_limit_pday>=total_credit_use and curdate() between cCreditJob.start_date and cCreditJob.end_date) as BannerStatus
			, DistMarker.Distance
			from Post,Project,DistMarker Where Post.PID=Project.PID and Post.Active="'.$Active.'" and Project.PID=DistMarker.Station and DistMarker.Type="Project" and DistMarker.PID="'.$sPID.'" '.$pDeveloper.$pExpire.$pAdvertising.$pProperty.$pBedroom.$pBathroom.$pminPrice.$pmaxPrice.$pChkYear.$pDistance.$pminArea.$pmaxArea.$pProvince.') p3 order by BannerStatus DESC';
			if($mode=='1'){
				$sqlPost.=') b group by POID';
			}
			$sqlPost.=') a'.$pGroup.$pOrder;
		}
		//echo '<br>'.$sqlPost.'<br>';
		$queryPost=$this->db->query($sqlPost);
		$rowcount=0;
		$count_banner=0;
		if($TransDist!=''){
			$TransDistCheck=$TransDist;
		}
		$Old_PID="";
		if($queryPost->num_rows()>0){
			foreach ($queryPost->result() as $rowPost){
				$rowcount++;
				$PID=$rowPost->PID;
				$POID=$rowPost->POID;
				$PName_en=$rowPost->PName_en;
				$PName_en=str_replace(" ", "-", $PName_en);
				$PName_en=str_replace("@", "-", $PName_en);
				$PName_en=str_replace("'", "-", $PName_en);
				$PName_en=str_replace("(", "-", $PName_en);
				$PName_en=str_replace(")", "-", $PName_en);
				$PName_en=str_replace(":", "-", $PName_en);
				$PName_en=str_replace("&", "-and-", $PName_en);
				$PName_en=str_replace("/", "-sl-", $PName_en);
				$ProjectName=$rowPost->ProjectName;
				$ProjectNameAnchor=str_replace(" ","-",$ProjectName);
				$ProjectNameAnchor=str_replace("(","",$ProjectNameAnchor);
				$ProjectNameAnchor=str_replace(")","",$ProjectNameAnchor);
				$ProjectNameAnchor=str_replace("@","แอด",$ProjectNameAnchor);
				$ProjectNameAnchor=str_replace("/","-sl-",$ProjectNameAnchor);
				$Advertising=$rowPost->TOAdvertising;
				if ($Advertising=='1' or $Advertising=='2'){
					$NamePath='sell';
				} else {
					$NamePath='rent';
				}
				$PropertyName=$this->getProperty($rowPost->TOProperty,'TOPName_th');
				$AdvertisingName=$this->getAdvertising($rowPost->TOAdvertising,'AName_th');
				if($rowPost->Developer==1){
					$AdvertisingName='ขายคอนโดใหม่';
				}else{
					$AdvertisingName.=$PropertyName;
				}
				$AdColor=$rowPost->TOAColor;
				$Active=$rowPost->Active;
				if($Active=='81'){//เช่าแล้ว
					$AdColor="#CCCCCC";
				}else if($Active=='82'){//ขายแล้ว
					$AdColor="#808080";
				}
				if($rowPost->Developer=='1'){
					$AdColor="#37C198";
				}
				$BannerStatus=$rowPost->BannerStatus;
				if($BannerStatus=='1' and $count_banner==0){
					//$AdColor='#FF0000';
					$count_banner++;
				}
				$ProjectNameCenter=$rowPost->SName_th;
				if($ProjectNameCenter==null or $ProjectNameCenter==''){
					$ProjectNameCenter=$ProjectName;
				}
				$Lat=$rowPost->PLat;
				$Lng=$rowPost->PLng;
				$YearEnd=$rowPost->YearEnd;
				$CondoUnit=$rowPost->CondoUnit;
				$CarParkUnit=$rowPost->CarParkUnit;
				$CamFee=$rowPost->CamFee;
				if($CamFee=='999' || $CamFee=='0'){$CamFee='N/A';}
				if($TransType!=''){
					$TransType_in=substr($TransType,0,-1);
					$TransType_in=str_replace(",","','",$TransType_in);
					$pTransType=" and Status in('".$TransType_in."') ";
					if($rowPost->AStation!=null){
						$queryKey=$this->db->query('select Status from KeyMarker where KeyID="'.$rowPost->AStation.'"'.$pTransType);
						if($queryKey->num_rows()>0){
							$KeyStatusCheck=1;
						}else{
							$KeyStatusCheck=0;
						}
					}else{
						$KeyStatusCheck=1;
					}
				}else{
					$KeyStatusCheck=1;
				}
				//Get Map Data
				if($mode==1){
					if ($Old_PID!=$PID){
						$Station=$rowPost->AKeyName;
						//$StationType=$rowDist->Type;
						$StationType=$rowPost->AType;
						//$minDistance=$rowDist->Distance;
						$minDistance=$rowPost->ADistance;
						$StationDist=number_format($rowPost->ADistance/1000,1);
						$queryPrice=$this->db->query('Select min(TotalPrice) as MinPriceS,max(TotalPrice) as MaxPriceS,avg(TotalPrice) as AvgPriceS, min(DTotalPrice) as MinPriceD,max(DTotalPrice) as MaxPriceD,avg(DTotalPrice) as AvgPriceD, min(PRentPrice) as MinPriceR,max(PRentPrice) as MaxPriceR,avg(PRentPrice) as AvgPriceR from Post where PID="'.$PID.'" and Active="'.$rowPost->Active.'" '.$pAdvertising.$pProperty.$pBedroom.$pBathroom.$pminPrice.$pmaxPrice.$pminArea.$pmaxArea.' ');
						$rowPrice=$queryPrice->row();
						$NumUnit=$rowPost->NumUnit;
						$Price=$rowPost->Price;
						if($Advertising=='1'){//ขาย
							$MinPrice=$rowPrice->MinPriceS;
							$MaxPrice=$rowPrice->MaxPriceS;
							$AvgPrice=$rowPrice->AvgPriceS;
						}else if($Advertising=='2'){//ขายดาวน์
							$MinPrice=$rowPrice->MinPriceD;
							$MaxPrice=$rowPrice->MaxPriceD;
							$AvgPrice=$rowPrice->AvgPriceD;
						}else if($Advertising=='5'){//เช่า
							$MinPrice=$rowPrice->MinPriceR;
							$MaxPrice=$rowPrice->MaxPriceR;
							$AvgPrice=$rowPrice->AvgPriceR;
						}
						if($queryPrice->num_rows()>0){
							$CenterMinPrice=$MinPrice;
						}
						if($BannerStatus=='1'){
							$MinPrice=$Price;
						}
						$MinPricePerSq=$rowPost->MinPricePerSq;
						if(!$MinPricePerSq || $MinPricePerSq==NULL || $MinPricePerSq==0){
							$MinPricePerSq=$Price/$rowPost->useArea;
						}
						if($Advertising=='5'){
							$Price=$Price/1000;
							//$MinPrice=$MinPrice/1000;
							$MaxPrice=$MaxPrice/1000;
							$AvgPrice=$AvgPrice/1000;
							//$PriceShow=number_format($Price, 0, '.', '')."k";
							$PriceShow=number_format($rowPost->Price, 0, '.', ',');
							$MinPriceShow=number_format($MinPrice, 0, '.', ',');
							$MaxPriceShow=number_format($MaxPrice, 0, '.', '')."k";
							$AvgPriceShow=number_format($AvgPrice, 0, '.', '')."k";
							$MinPricePerSqShow=number_format($MinPricePerSq, 0, '.', ',');
						}else{
							$Price=$Price/1000000;
							$MinPrice=$MinPrice/1000000;
							$MaxPrice=$MaxPrice/1000000;
							$AvgPrice=$AvgPrice/1000000;
							//$MinPricePerSq=$MinPricePerSq/1000;
							$PriceShow=number_format($Price, 2, '.', '')."M";
							$MinPriceShow=number_format($MinPrice, 2, '.', '')."M";
							$MaxPriceShow=number_format($MaxPrice, 2, '.', '')."M";
							$AvgPriceShow=number_format($AvgPrice, 2, '.', '')."M";
							//$MinPricePerSqShow=number_format($MinPricePerSq, 0, '.', '')."k";
							$MinPricePerSqShow=number_format($MinPricePerSq, 0, '.', ',');
						}
						$Old_PID=$PID;
					}
					$ProjectCheck=0;
					if($namePoint==$rowPost->PName_th or $namePoint==$rowPost->PName_en){
						$ProjectCheck=1;
					}
					if($TransDist=='' and $rowPost->ADistance!=null){
						$TransDistCheck=$rowPost->ADistance;
					}
					$Point=array(
						"ProjectCheck"=>$ProjectCheck,
						"PID"=>$PID,
						"Type"=>$Type,
						"POID"=>$POID,
						"ProjectName"=>$ProjectName,
						"Lat"=>$Lat,
						"Lng"=>$Lng,
						"NumUnit"=>$NumUnit,
						"Price"=>$Price,
						"CenterMinPrice"=>$CenterMinPrice,
						"MinPrice"=>$MinPrice,
						"MaxPrice"=>$MaxPrice,
						"AvgPrice"=>$AvgPrice,
						"MinPricePerSq"=>$MinPricePerSq,
						"PriceShow"=>$PriceShow,
						"MinPriceShow"=>$MinPriceShow,
						"MaxPriceShow"=>$MaxPriceShow,
						"AvgPriceShow"=>$AvgPriceShow,
						"MinPricePerSqShow"=>$MinPricePerSqShow,
						"YearEnd"=>$YearEnd,
						"CondoUnit"=>$CondoUnit,
						"CarParkUnit"=>$CarParkUnit,
						"CamFee"=>$CamFee,
						"Advertising"=>$Advertising,
						"AdColor"=>$AdColor,
						"Station"=>$Station,
						"StationType"=>$StationType,
						"StationDist"=>$StationDist,
						"PName_en"=>$PName_en,
						"NamePath"=>$NamePath
					);
					if($rowcount==1){
						if($Type=='Project'){//ค้นหาด้วย Project : Center ขึ้นแค่จุดเดียว
							if($SearchID!=$PID){
								array_push($resultSearch, $centerMap);
							}
							$centerMerge=array_merge($centerMap, $Point);
							array_push($resultSearch, $centerMerge);
						}else{
							array_push($resultSearch, $centerMap);
							if($minDistance<=$TransDistCheck and $KeyStatusCheck==1){
								array_push($resultSearch, $Point);
							}
						}
					}else{
						if($minDistance<=$TransDistCheck and $KeyStatusCheck==1){
							array_push($resultSearch, $Point);
						}
					}

				//Get Unit-Image Data
				}else if($mode==2){
					$useArea=$rowPost->useArea;
					//$useArea=$useArea+($rowPost->terraceArea);
					$Price=$rowPost->Price;
					$DistanceFromPoint=$rowPost->distance;
					$PricePerSq=$Price/$rowPost->useArea;
					if ($Advertising=='5'){
						$PriceShow=number_format(($Price), 0, '', ',');
					} else {
						$PriceShow=number_format(($Price/1000000), 2, '.', '')."M";
					}
					$PriceShowNew=number_format(($Price), 0, '', ',');
					$PricePerSqShow=number_format($PricePerSq, 0,'',',');
					$Bedroom=$rowPost->Bedroom;
					$BedroomNo=$rowPost->Bedroom;
					$BedroomList=$Bedroom;
					if($Bedroom=="99"){
						$Bedroom="S";
						$BedroomList=$Bedroom;
					}else{
						$Bedroom.=" นอน";
					}
					$Bathroom=$rowPost->Bathroom;
					$BathroomList=$Bathroom;
					$Bathroom.=" น้ำ";
					$Floor=$rowPost->Floor;
					$DateShow=$rowPost->ActiveDay;
					if ($rowPost->RedPost==1){
						$Tel=$rowPost->Telephone1;
					} else {
						//$Tel="โทรหาทันที";
						$Tel=substr($rowPost->Telephone1,0,3)."-XXX-XXXX";
					}
					$ViewTel=$rowPost->CountViewTel;
					$ViewPost=$rowPost->CountView;
					$Favourite=$rowPost->FVStatus;
					$queryPic=$this->db->query('Select * from ImagePost Where POID="'.$POID.'" and AdImg=1 Order By field(type,"room","view","facilities"),Horizental DESC,Order_Sort ASC,ImgID ASC limit 1');
					$arrayPIC=array();
					if ($queryPic->num_rows()>0){
						foreach ($queryPic->result() as $rowPic){
							$file=$rowPic->file;
							if ($rowPic->Thumb==1){
								$checkJPG=strpos($file,'.jpg');
								if ($checkJPG!==false){
									$file=str_replace(".jpg","t.jpg",$file);
								}
								$checkPNG=strpos($file,'.png');
								if ($checkPNG!==false){
									$file=str_replace(".png","t.png",$file);
								}
								$checkJPG=strpos($file,'.JPG');
								if ($checkJPG!==false){
									$file=str_replace(".JPG","t.JPG",$file);
								}
								$checkPNG=strpos($file,'.PNG');
								if ($checkPNG!==false){
									$file=str_replace(".PNG","t.PNG",$file);
								}
							}
							array_push($arrayPIC,$file);
						}
					}
					$Distance=$rowPost->ADistance;
					$minDistance=$Distance;
					$Distance=$Distance/1000;
					$DistanceList=$Distance;
					$Distance=number_format($Distance,1,'.',',');
					/*$KeyName=iconv_substr($rowDistMarker->KeyName,0,17, "UTF-8");
					if(strlen($rowDistMarker->KeyName)>=20){
						$KeyName.="...";
					}*/
					$KeyName=$rowPost->AKeyName;
					if($ProvinceSearch==1){
						$DistName='('.$KeyName.' '.$Distance.' กม.)';
					}else{
						$DistName='';
					}
					$DistNameList=$Distance;
					if($TransDist=='' and $rowPost->ADistance!=null){
						$TransDistCheck=$rowPost->ADistance;
					}
					$Old_PID=$PID;
					$Point=array(
						"PID"=>$PID,
						"POID"=>$POID,
						"Type"=>$Type,
						"ProjectName"=>$ProjectName,
						"ProjectNameCenter"=>$ProjectNameCenter,
						"ProjectNameAnchor"=>$ProjectNameAnchor,
						"PropertyName"=>$PropertyName,
						"Advertising"=>$Advertising,
						"AdvertisingName"=>$AdvertisingName,
						"Lat"=>$Lat,
						"Lng"=>$Lng,
						"YearEnd"=>$YearEnd,
						"Price"=>$Price,
						"PriceShow"=>$PriceShow,
						"PriceShowNew"=>$PriceShowNew,
						"PricePerSq"=>$PricePerSq,
						"PricePerSqShow"=>$PricePerSqShow,
						"Bedroom"=>$Bedroom,
						"BedroomNo"=>$BedroomNo,
						"BedroomList"=>$BedroomList,
						"Bathroom"=>$Bathroom,
						"BathroomList"=>$BathroomList,
						"useArea"=>$useArea,
						"Floor"=>$Floor,
						"DateShow"=>$DateShow,
						"ViewPost"=>$ViewPost,
						"ViewTel"=>$ViewTel,
						"Favourite"=>$Favourite,
						"Tel"=>$Tel,
						"Active"=>$Active,
						"Picture"=>$arrayPIC,
						"DistanceFromPoint"=>$DistanceFromPoint,
						"DistName"=>$DistName,
						"DistanceList"=>$DistanceList,
						"DistNameList"=>$DistNameList,
						"PName_en"=>$PName_en,
						"NamePath"=>$NamePath,
						"AdColor"=>$AdColor,
						"BannerStatus"=>$BannerStatus
					);
					if($minDistance<=$TransDistCheck and $KeyStatusCheck==1){
						array_push($resultSearch,$Point);
					}
				}
			}
			if($mode==1){
				if($this->tank_auth->is_logged_in()){
					$user_id=$this->session->userdata('user_id');
				}else{
					$user_id=$this->input->ip_address();
				}
				$queryLog=$this->db->query('insert into LogSearchMap(user_id,SearchType,SearchID,Distance,TOProperty,TOAdvertising,Bedroom,Bathroom,TransDist,sYear,minPrice,maxPrice,minArea,maxArea) values("'.$user_id.'","'.$Type.'","'.$SearchID.'","'.$distance.'","'.$TOProperty.'","'.$TOAdvertising.'","'.$Bedroom.'","'.$Bathroom.'","'.$TransDist.'","'.$Year.'","'.$minPrice.'","'.$maxPrice.'","'.$minArea.'","'.$maxArea.'")');
			}
		}else{
			array_push($resultSearch, $centerMap);
		}
		//$this->session->set_userdata('resultsearch',json_encode($resultSearch));
		$this->testlog->savelogend($process_id);
		return json_encode($resultSearch);
	}
	
	function getMarketCont($namepoint,$distance,$advertising,$nowyear,$proptype,$bedroom,$bathroom,$transdist,$transtype,$age,$minPrice,$maxPrice,$minArea,$maxArea){
		//$process_id=$this->testlog->genprocessid();
		//$this->testlog->savelogstart($process_id);
		
		$rowArea=$this->getArea($namepoint,$distance,$advertising,$proptype,$bedroom,$bathroom,$transdist,$transtype,$age,$minPrice,$maxPrice,$minArea,$maxArea);
		$areaname=$rowArea[0];
		$areaunit=$rowArea[1];
		$areasqprice=number_format($rowArea[2],0);
		
		$unit_total=$this->getProjectUnit($namepoint,$nowyear,-1,$distance,'','',1);
		$unit_now=$this->getProjectUnit($namepoint,$nowyear,1,$distance,'','',1);
		$unit_untilnow=$this->getProjectUnit($namepoint,$nowyear,2,$distance,'','',1);
		//$projectunit_future=$this->getProjectUnit($namepoint,$nowyear,0,$distance,'','',1);
		$projectunit_future=$unit_total[0]-$unit_untilnow[0];
		if($unit_total[0]>$unit_untilnow[0]){
			$projectunit_percent=($projectunit_future/$unit_untilnow[0])*100;
		}else{
			$projectunit_percent=0;
		}
		$projectunit_total=number_format($unit_total[0],0);
		$projectunit_now=number_format($unit_now[0],0);
		$projectunit_untilnow=number_format($unit_untilnow[0],0);
		$projectunit_future=number_format($projectunit_future,0);
		$projectunit_percent=number_format($projectunit_percent,1);
		
		//$projectunit_active=$this->getProjectUnit($namepoint,$nowyear,2,$distance,'',1,2);
		$projectunit_active_sale=$this->getProjectUnit($namepoint,$nowyear,2,$distance,1,1,2);//ขาย
		$unit_sale=$projectunit_active_sale[0];
		$projectunit_active_down=$this->getProjectUnit($namepoint,$nowyear,-1,$distance,2,1,2);//ขายดาวน์
		$unit_down=$projectunit_active_down[0];
		$projectunit_active_rent=$this->getProjectUnit($namepoint,$nowyear,2,$distance,5,1,2);//เช่า
		$unit_rent=$projectunit_active_rent[0];
		$projectunit_active=$projectunit_active_sale[0]+$projectunit_active_down[0]+$projectunit_active_rent[0];
		if($unit_sale+$unit_down>=100){
			$median_price_sale=$this->getPriceUnit($namepoint,$nowyear,2,$distance,'1,2',1);//ขาย
			$medianpricesale=number_format($median_price_sale,0);
		}else{
			$medianpricesale=0;
		}
		if($unit_rent>=100){
			$median_price_rent=$this->getPriceUnit($namepoint,$nowyear,2,$distance,'5',1);//ขาย
			$medianpricerent=number_format($median_price_rent,0);
		}else{
			$medianpricerent=0;
		}
		$arrayCont=array(
			"AreaName"=>$namepoint,
			"AreaUnit"=>$areaunit,
			"AreaSqPrice"=>$areasqprice,
			"MeanPriceSale"=>$medianpricesale,
			"MeanPriceRent"=>$medianpricerent,
			"NowYear"=>$nowyear,
			"ProjectUnit_total"=>$projectunit_total,
			"ProjectUnit_now"=>$projectunit_now,
			"ProjectUnit_untilnow"=>$projectunit_untilnow,
			"ProjectUnit_future"=>$projectunit_future,
			"Projectunit_percent"=>$projectunit_percent,
			"ProjectUnit_active"=>$projectunit_active,
			"ProjectUnit_active_sale"=>$unit_sale,
			"ProjectUnit_active_down"=>$unit_down,
			"ProjectUnit_active_rent"=>$unit_rent
		);
		//$this->testlog->savelogend($process_id);

		echo json_encode($arrayCont);
	}
	
	function getArea($name,$distance=10000,$advertising='',$proptype,$bedroom,$bathroom,$transdist,$transtype,$age='',$minPrice,$maxPrice,$minArea,$maxArea){
		$Active=1;
		$pExpire=" and Post.DateExpire>=curdate()";
		if($proptype!=''){
			$proptype_in=substr($proptype,0,-1);
			$proptype_in=str_replace(",","','",$proptype_in);
			$qProperty=" and Post.TOProperty in('".$proptype_in."') ";
		}else{
			$qProperty="";
		}
		if($advertising!=''){
			if($advertising==6){//ขายแล้ว
				$qAdvertising=" and Post.TOAdvertising in('1','2') ";
				$Active=82;
				$pExpire="";
			}else if($advertising==7){//เช่าแล้ว
				$qAdvertising=" and Post.TOAdvertising in('5') ";
				$Active=81;
				$pExpire="";
			}else{
				$advertising_in=substr($advertising,0,-1);
				$advertising_in=str_replace(",","','",$advertising_in);
				$qAdvertising=" and Post.TOAdvertising in('".$advertising_in."') ";
			}
			if($advertising==8){//ขายห้องใหม่
				$qDeveloper=" and Post.Developer in('1') ";
				$qAdvertising="";
			}
		}else{
			$qAdvertising="";
			$qDeveloper="";
		}
		if($bedroom!=''){
			$bedroom_in=substr($bedroom,0,-1);
			$bedroom_in=str_replace(",","','",$bedroom_in);
			$qBedroom=" and Post.Bedroom in('".$bedroom_in."') ";
		}else{
			$qBedroom="";
		}
		if($bathroom!=''){
			$bathroom_in=substr($bathroom,0,-1);
			$bathroom_in=str_replace(",","','",$bathroom_in);
			$qBathroom=" and Post.Bathroom in('".$bathroom_in."') ";
		}else{
			$qBathroom="";
		}
		if ($age!=''){
			$YN=date("Y")+543;
			$YD=$YN-abs($age);
			$YD2=$YN+10;
			//$ChkYear=" and (".$YN."-YearEnd)<=".$YC." and (".$YN."-YearEnd)>-1";
			if($age<0){
				$qYear=" and Project.YearEnd<'".$YD."' ";
			}else{
				$qYear=" and Project.YearEnd>='".$YD."' and Project.YearEnd<'".$YD2."' ";
			}
		}else{
			$qYear="";
		}
		if($minPrice!="" and $minPrice!=0){
			$qminPrice=' and (case when Post.TOAdvertising=1 then Post.TotalPrice>="'.$minPrice.'"';
			$qminPrice.=' when Post.TOAdvertising=2 then Post.DTotalPrice>="'.$minPrice.'"';
			$qminPrice.=' when Post.TOAdvertising=5 then Post.PRentPrice>="'.$minPrice.'"';
			$qminPrice.=' else true end)';
		}else{
			$qminPrice="";
		}
		if ($maxPrice!="" and $maxPrice!=0){
			$qmaxPrice=' and (case when Post.TOAdvertising=1 then Post.TotalPrice<="'.$maxPrice.'" ';
			$qmaxPrice.=' when Post.TOAdvertising=2 then Post.DTotalPrice<="'.$maxPrice.'"';
			$qmaxPrice.=' when Post.TOAdvertising=5 then Post.PRentPrice<="'.$maxPrice.'"';
			$qmaxPrice.=' else true end)';
		}else{
			$qmaxPrice="";
		}
		if($minArea!="" and $minArea!=0){
			$qminArea=' and Post.useArea>="'.$minArea.'"';
		}
		if ($maxArea!="" and $maxArea!=0){
			$qmaxArea=' and Post.useArea<="'.$maxArea.'"';
		}
		$query2=$this->db->query('Select PID,ProvinceID,(select DistanceSearch from Province where id=ProvinceID) as ProvinceSearch from Project Where (PName_th="'.$name.'" or PName_en="'.$name.'")');
		if($query2->num_rows()>0){
			$row2=$query2->row();
			$PID=$row2->PID;
			$ProvinceID=$row2->ProvinceID;
			if($row2->ProvinceSearch==1){
				$qDistance=' and DistMarker.Distance<="'.$distance.'"';
				$qProvince='';
			}else{
				$qDistance='';
				$qProvince=' and Project.ProvinceID="'.$ProvinceID.'"';
			}
			$qGroup=" group by Project.PID";
			$query=$this->db->query('select Project.PID,Project.Area,count(Distinct Post.POID) as unit,avg(Post.PricePerSq) as pricepersq from Project,Post where Project.PID=Post.PID and Project.PID="'.$PID.'" and Post.Active="'.$Active.'" '.$pExpire.$qYear.$qProperty.$qAdvertising.$qDeveloper.$qBedroom.$qBathroom.$qminPrice.$qmaxPrice.' union select Project.PID,Project.Area,count(Distinct Post.POID) as unit,avg(Post.PricePerSq) as pricepersq from Project,Post,DistMarker where Project.PID=Post.PID and Project.PID=DistMarker.Station and DistMarker.PID="'.$PID.'" and DistMarker.Type="Project" and Post.Active="'.$Active.'" '.$pExpire.$qYear.$qDistance.$qProperty.$qAdvertising.$qDeveloper.$qBedroom.$qBathroom.$qminPrice.$qmaxPrice.$qminArea.$qmaxArea.$qProvince.$qGroup);
		}else{
			$query3=$this->db->query('Select KeyID,ProvinceID,(select DistanceSearch from Province where id=ProvinceID) as ProvinceSearch from KeyMarker Where (KeyName="'.$name.'" or KeyName_en="'.$name.'") and Type not in("Minimart","Expressway","Project")');
			$row3=$query3->row();
			$KeyID=$row3->KeyID;
			$ProvinceID=$row3->ProvinceID;
			if($row3->ProvinceSearch==1){
				$qDistance=' and DistMarker.Distance<="'.$distance.'"';
				$qProvince='';
			}else{
				$qDistance='';
				$qProvince=' and Project.ProvinceID="'.$ProvinceID.'"';
			}
			$qGroup=" group by Project.PID ";
			$query=$this->db->query('select Project.PID,Project.Area,count(Distinct Post.POID) as unit,avg(Post.PricePerSq) as pricepersq from Project,Post,DistMarker where Project.PID=Post.PID and Project.PID=DistMarker.PID and DistMarker.Station="'.$KeyID.'" and Post.Active="'.$Active.'" '.$pExpire.$qYear.$qDistance.$qProperty.$qAdvertising.$qDeveloper.$qBedroom.$qBathroom.$qminPrice.$qmaxPrice.$qminArea.$qmaxArea.$qProvince.$qGroup);
		}
		$result=array();
		if($transdist!=''){
			$TransDistCheck=$transdist;
		}
		if($transtype!=""){
			$transtype_in=substr($transtype,0,-1);
			$transtype_in=str_replace(",","','",$transtype_in);
			$qtranstype=" and KeyMarker.Status in('".$transtype_in."') ";
		}else{
			$qtranstype="";
		}
		$unit=0;
		$pricepersq=0;
		foreach ($query->result() as $row){
			//$queryDist=$this->db->query('Select DistMarker.Type, Distance, KeyName, Lat, Lng from DistMarker,KeyMarker Where Station=KeyID and PID="'.$row->PID.'" and DistMarker.Type in("BTS","MRT","BRT","ARL","SRT") '.$qtranstype.' order by Distance ASC limit 1');
			$queryDist=$this->db->query('select MinDistance.Type,Distance,KeyMarker.KeyName,KeyMarker.KeyName_en from MinDistance,KeyMarker where Station=KeyID and PID="'.$row->PID.'" '.$qtranstype);
			if($queryDist->num_rows()>0){
				$rowDist=$queryDist->row();
				if($transdist=='' and $rowDist->Distance!=null){
					$TransDistCheck=$rowDist->Distance;
				}
				if($rowDist->Distance<=$TransDistCheck){
					$Area=$row->Area;
					$unit+=$row->unit;
					$pricepersq+=$row->pricepersq;
				}
			}else{
				$Area=$row->Area;
				$unit+=$row->unit;
				$pricepersq+=$row->pricepersq;
			}
		}
		$pricepersq=$pricepersq/$query->num_rows();
		array_push($result,$Area,$unit,$pricepersq);
		return $result;
	}
	
	function getProjectUnit($name,$nowyear,$type,$distance=10000,$advertising,$status='',$select){
		if($select==1){//อุปทาน
			$qSelect="Project.CondoUnit as unit";
			if($type==0){
				$qYear=" and Project.YearEnd>='".$nowyear."' ";
			}else if($type==1){
				$qYear=" and Project.YearEnd='".$nowyear."' ";
			}else if($type==2){
				$qYear=" and Project.YearEnd<'".$nowyear."' ";
			}else{
				$qYear="";
			}
		}else{//จำนวนประกาศ
			$qSelect="Distinct Post.POID,Post.TOAdvertising,case Post.TOAdvertising when '1' then Post.TotalPrice when '2' then Post.TotalPrice when '5' then Post.PRentPrice end as price";
			$qYear="";
		}
		if($advertising!=''){
			$qAdvertising=" and Post.TOAdvertising in('".$advertising."')";
		}else{
			$qAdvertising="";
		}
		if($status!=''){
			$qStatus=" and Post.Active='".$status."' ";
		}else{
			$qStatus="";
		}
		$qGroup=" group by Project.PID ";
		$query2=$this->db->query('Select PID,ProvinceID,(select DistanceSearch from Province where id=ProvinceID) as ProvinceSearch from Project Where (PName_th="'.$name.'" or PName_en="'.$name.'")');
		if($query2->num_rows()>0){
			$row2=$query2->row();
			$PID=$row2->PID;
			$ProvinceID=$row2->ProvinceID;
			$ProvinceSearch=$row2->ProvinceSearch;
			if($row2->ProvinceSearch==1){
				$qDistance=' and DistMarker.Distance<="'.$distance.'"';
				$qProvince='';
			}else{
				$qDistance='';
				$qProvince=' and Project.ProvinceID="'.$ProvinceID.'"';
			}
			if($select==1){//อุปทาน
				$query=$this->db->query('select ifnull(sum(unit),0) as unit from (select '.$qSelect.' from Project Where Project.PID="'.$PID.'" '.$qYear.' union select '.$qSelect.' from Project,DistMarker Where DistMarker.Station=Project.PID and DistMarker.PID="'.$PID.'" '.$qYear.$qDistance.$qProvince.$qGroup.') a');
			}else{//จำนวนประกาศ
				$query=$this->db->query('select ifnull(count(*),0) as unit,min(price) as minprice,max(price) as maxprice from (select '.$qSelect.' from Project,Post Where Project.PID=Post.PID and Project.PID="'.$PID.'" and Post.DateExpire>=curdate() '.$qYear.$qAdvertising.$qStatus.' union select '.$qSelect.' from Project,Post,DistMarker Where Project.PID=Post.PID and DistMarker.Station=Project.PID and DistMarker.PID="'.$PID.'" and Post.DateExpire>=curdate() '.$qYear.$qDistance.$qAdvertising.$qProvince.$qStatus.') a');
			}
		}else{
			$query3=$this->db->query('Select KeyID,ProvinceID,(select DistanceSearch from Province where id=ProvinceID) as ProvinceSearch from KeyMarker Where (KeyName="'.$name.'" or KeyName_en="'.$name.'") and Type not in("Minimart","Expressway","Project")');
			$row3=$query3->row();
			$KeyID=$row3->KeyID;
			$ProvinceID=$row3->ProvinceID;
			if($row3->ProvinceSearch==1){
				$qDistance=' and DistMarker.Distance<="'.$distance.'"';
				$qProvince='';
			}else{
				$qDistance='';
				$qProvince=' and Project.ProvinceID="'.$ProvinceID.'"';
			}
			if($select==1){//อุปทาน
				$query=$this->db->query('select ifnull(sum(unit),0) as unit from (select '.$qSelect.' from Project,DistMarker Where Project.PID=DistMarker.PID and DistMarker.Station="'.$KeyID.'" '.$qYear.$qDistance.$qName.$qProvince.$qGroup.') a');
			}else{//จำนวนประกาศ
				$query=$this->db->query('select ifnull(count(*),0) as unit,min(price) as minprice,max(price) as maxprice from (select '.$qSelect.' from Project,Post,DistMarker Where Project.PID=Post.PID and Post.PID=DistMarker.PID and DistMarker.Station="'.$KeyID.'" and Post.DateExpire>=curdate() '.$qYear.$qDistance.$qName.$qAdvertising.$qProvince.$qStatus.') a');
			}
		}
		$unit=0;
		$minprice=0;
		$maxprice=0;
		$result=array();
		if($query->num_rows()>0){
			$row=$query->row();
			$unit=$row->unit;
			$minprice=$row->minprice;
			$maxprice=$row->maxprice;
		}
		array_push($result,$unit,$minprice,$maxprice);
		return $result;
	}
	
	function getPriceUnit($name,$nowyear,$type,$distance=10000,$advertising,$status=''){
		$qSelect="Distinct Post.POID,Post.TOAdvertising,case Post.TOAdvertising when '1' then Post.TotalPrice when '2' then Post.TotalPrice when '5' then Post.PRentPrice end as price";
		$qYear="";
		if($advertising!=''){
			$qAdvertising=" and Post.TOAdvertising in(".$advertising.")";
		}else{
			$qAdvertising="";
		}
		if($status!=''){
			$qStatus=" and Post.Active='".$status."' ";
		}else{
			$qStatus="";
		}
		$qGroup=" group by Project.PID ";
		$query2=$this->db->query('Select PID,ProvinceID,(select DistanceSearch from Province where id=ProvinceID) as ProvinceSearch from Project Where (PName_th="'.$name.'" or PName_en="'.$name.'")');
		if($query2->num_rows()>0){
			$row2=$query2->row();
			$PID=$row2->PID;
			$ProvinceID=$row2->ProvinceID;
			$ProvinceSearch=$row2->ProvinceSearch;
			if($row2->ProvinceSearch==1){
				$qDistance=' and DistMarker.Distance<="'.$distance.'"';
				$qProvince='';
			}else{
				$qDistance='';
				$qProvince=' and Project.ProvinceID="'.$ProvinceID.'"';
			}
			
			$query=$this->db->query('select price from (select '.$qSelect.' from Project,Post Where Project.PID=Post.PID and Project.PID="'.$PID.'" and Post.DateExpire>=curdate() '.$qYear.$qAdvertising.$qStatus.' union select '.$qSelect.' from Project,Post,DistMarker Where Project.PID=Post.PID and DistMarker.Station=Project.PID and DistMarker.PID="'.$PID.'" and Post.DateExpire>=curdate() '.$qYear.$qDistance.$qAdvertising.$qProvince.$qStatus.') a order by price ASC');
		}else{
			$query3=$this->db->query('Select KeyID,ProvinceID,(select DistanceSearch from Province where id=ProvinceID) as ProvinceSearch from KeyMarker Where (KeyName="'.$name.'" or KeyName_en="'.$name.'") and Type not in("Minimart","Expressway","Project")');
			$row3=$query3->row();
			$KeyID=$row3->KeyID;
			$ProvinceID=$row3->ProvinceID;
			if($row3->ProvinceSearch==1){
				$qDistance=" and DistMarker.Distance<='".$distance."'";
			}else{
				$qDistance="";
			}
			$query=$this->db->query('select price from (select '.$qSelect.' from Project,Post,DistMarker Where Project.PID=Post.PID and Post.PID=DistMarker.PID and DistMarker.Station="'.$KeyID.'" and Post.DateExpire>=curdate() '.$qYear.$qDistance.$qName.$qAdvertising.$qProvince.$qStatus.') a order by price ASC');
		}
		$price=0;
		$result=array();
		if($query->num_rows()>0){
			foreach ($query->result() as $row){
				array_push($result,$row->price);
			}
		}
		$median=count($result)/2;
		$median_price=$result[$median];
		return $median_price;
	}

	function getPoint_old($distance,$namePoint,$TOProperty,$Bedroom,$Bathroom,$Year,$TOAdvertising,$minPrice,$maxPrice){
		//Log Test
//		$process_id=$this->testlog->genprocessid();
//		$this->testlog->savelogstart($process_id);

		//Year=>0 notCheck Year=>1<1 Year=>2<2 Year=3<3
		if ($Year!=''){
			$YC=$Year;
			$YN=date("Y")+543;
			$YD=$YN-abs($YC);
			$YD2=$YN+10;
			if($YC<0){
				$ChkYear=" and YearEnd<='".$YD."' ";
			}else{
				$ChkYear=" and YearEnd>'".$YD."' and YearEnd<'".$YD2."' ";
			}
		} else {
			$ChkYear="";
		}
		$query=$this->db->query('Select Type, Lat, Lng, KeyID from KeyMarker Where KeyName="'.$namePoint.'"');
		if ($query->num_rows()!=0){
			$row=$query->row();
			$Type=$row->Type;
			$KeyID=$row->KeyID;
			$Lat=$row->Lat;
			$Lng=$row->Lng;
		} else {
			$Type="Project";
			$query=$this->db->query('Select * from Project Where PName_th="'.$namePoint.'"');
			$row=$query->row();
			$Lat=$row->Lat;
			$Lng=$row->Lng;
		}
		$centerMap=array(
			"CenterName" => $namePoint,
			"Lat" => $Lat,
			"Lng" => $Lng
		);
		$resultSearch=array();
		array_push($resultSearch, $centerMap);
//		if($Type=="BTS" or $Type=="MRT"){
		if($Type!="Project"){
			if ($distance==0 || $distance==''){
				$distance="1500";
			}
//			$queryProject=$this->db->query('Select a.* from Project a left join DistMarker b on b.PID=a.PID Where b.Station="'.$KeyID.'" and b.Distance<="'.$distance.'" '.$ChkYear.' ');
			$queryProject=$this->db->query('Select * from Project Where PID IN (Select Distinct PID from DistMarker,KeyMarker Where DistMarker.Station=KeyMarker.KeyID and DistMarker.Distance<="'.$distance.'" and KeyMarker.KeyName="'.$namePoint.'") '.$ChkYear);
//			$qPID='Select PID from DistMarker Where Station="'.$KeyID.'" and Distance<="'.$distance.'" '.$ChkYear;
		}else{
			if($Type=="Project"){
				$queryP='PName_th="'.$namePoint.'"';
			}
/*
			if($Type=="Area"){
				$queryP='Area="'.$namePoint.'"';
			}
			if($Type=="Province"){
				$queryP='Province="'.$namePoint.'"';
			}
			if($Type=="PID"){
				$queryP='PName_th="'.$namePoint.'"';
			}
*/
  			$queryProject=$this->db->query('Select * from Project Where '.$queryP.$ChkYear);
//			$qPID='Select * from Project Where '.$queryP.$ChkYear;
		}

		foreach ($queryProject->result() as $rowProject){
			$PID=$rowProject->PID;
/*
			$ProjectName=$rowProject->PName_th;
			$Lat=$rowProject->Lat;
			$Lng=$rowProject->Lng;
			$YearEnd=$rowProject->YearEnd;
			$CondoUnit=$rowProject->CondoUnit;
			$CarParkUnit=$rowProject->CarParkUnit;
			$CamFee=$rowProject->CamFee;
			$queryDist=$this->db->query('Select a.Type,a.Distance,b.KeyName,b.Lat,b.Lng from DistMarker a left join KeyMarker b on b.KeyID=a.Station Where a.PID="'.$PID.'" and a.Type in("BTS","MRT","BRT","SRT") order by a.Distance ASC limit 1');
			$rowDist=$queryDist->row();
			$Station=$rowDist->KeyName;
			$StationType=$rowDist->Type;
			$StationDist=number_format($rowDist->Distance/1000,1);
			$queryPrice=$this->db->query('Select min(a.TotalPrice) as MinPriceS,max(a.TotalPrice) as MaxPriceS,avg(a.TotalPrice) as AvgPriceS, min(a.DTotalPrice) as MinPriceD,max(a.DTotalPrice) as MaxPriceD,avg(a.DTotalPrice) as AvgPriceD, min(a.PRentPrice) as MinPriceR,max(a.PRentPrice) as MaxPriceR,avg(a.PRentPrice) as AvgPriceR from Post a where a.PID="'.$PID.'" ');
			$rowPrice=$queryPrice->row();
*/ 
			$queryPost=$this->queryPost($Bedroom,$Bathroom,$TOAdvertising,$PID,$minPrice,$maxPrice,$TOProperty);
			if($queryPost->num_rows()>0){
//Move for reduce loop
				$ProjectName=$rowProject->PName_th;
				$Lat=$rowProject->Lat;
				$Lng=$rowProject->Lng;
				$YearEnd=$rowProject->YearEnd;
				$CondoUnit=$rowProject->CondoUnit;
				$CarParkUnit=$rowProject->CarParkUnit;
				$CamFee=$rowProject->CamFee;
	//			$queryDist=$this->db->query('Select a.Type,a.Distance,b.KeyName,b.Lat,b.Lng from DistMarker a left join KeyMarker b on b.KeyID=a.Station Where a.PID="'.$PID.'" and a.Type in("BTS","MRT","BRT","SRT") order by a.Distance ASC limit 1');
				$queryDist=$this->db->query('Select Type, Distance, (select KeyName from KeyMarker where KeyID=DistMarker.Station and Type=DistMarker.Type Limit 1) as KeyName, (select Lat from KeyMarker Where KeyID=DistMarker.Station and Type=DistMarker.Type Limit 1) as Lat, (select Lng from KeyMarker Where KeyID=DistMarker.Station and Type=DistMarker.Type Limit 1) as Lng from DistMarker Where PID="'.$PID.'" and Type in("BTS","MRT","BRT","SRT") order by Distance ASC limit 1');
				$rowDist=$queryDist->row();
				$Station=$rowDist->KeyName;
				$StationType=$rowDist->Type;
				$StationDist=number_format($rowDist->Distance/1000,1);
				$queryPrice=$this->db->query('Select min(a.TotalPrice) as MinPriceS,max(a.TotalPrice) as MaxPriceS,avg(a.TotalPrice) as AvgPriceS, min(a.DTotalPrice) as MinPriceD,max(a.DTotalPrice) as MaxPriceD,avg(a.DTotalPrice) as AvgPriceD, min(a.PRentPrice) as MinPriceR,max(a.PRentPrice) as MaxPriceR,avg(a.PRentPrice) as AvgPriceR from Post a where a.PID="'.$PID.'" ');
				$rowPrice=$queryPrice->row();
//End Move
				$rowPost=$queryPost->row();
				$Advertising=$rowPost->TOAdvertising;
				$NumUnit=$rowPost->NumUnit;
				if($Advertising==1){//ขาย
					$Price=$rowPost->MinPriceS;
					$MinPrice=$rowPrice->MinPriceS;
					$MaxPrice=$rowPrice->MaxPriceS;
					$AvgPrice=$rowPrice->AvgPriceS;
				}else if($Advertising==2){//ขายดาวน์
					$Price=$rowPost->MinPriceD;
					$MinPrice=$rowPrice->MinPriceD;
					$MaxPrice=$rowPrice->MaxPriceD;
					$AvgPrice=$rowPrice->AvgPriceD;
				}else if($Advertising==5){//เช่า
					$Price=$rowPost->MinPriceR;
					$MinPrice=$rowPrice->MinPriceR;
					$MaxPrice=$rowPrice->MaxPriceR;
					$AvgPrice=$rowPrice->AvgPriceR;
				}
				$MinPricePerSq=$rowPost->MinPricePerSq;
				if(!$MinPricePerSq || $MinPricePerSq==NULL || $MinPricePerSq==0){
					$MinPricePerSq=$Price/$rowPost->useArea;
				}
				if($Advertising==5){
					$Price=number_format(($Price/1000), 0, '.', '')."k";
					$MinPrice=number_format(($MinPrice/1000), 0, '.', '')."k";
					$MaxPrice=number_format(($MaxPrice/1000), 0, '.', '')."k";
					$AvgPrice=number_format(($AvgPrice/1000), 0, '.', '')."k";
					$MinPricePerSq="฿".number_format(($MinPricePerSq), 0, '.', '');
				}else{
					$Price=number_format(($Price/1000000), 1, '.', '')."M";
					$MinPrice=number_format(($MinPrice/1000000), 1, '.', '')."M";
					$MaxPrice=number_format(($MaxPrice/1000000), 1, '.', '')."M";
					$AvgPrice=number_format(($AvgPrice/1000000), 1, '.', '')."M";
					$MinPricePerSq=number_format(($MinPricePerSq/1000), 0, '.', '')."k";
				}
				$Point=array(
					"PID" => $PID,
					"ProjectName" => $ProjectName,
					"Lat" => $Lat,
					"Lng" => $Lng,
					"NumUnit" => $NumUnit,
					"Price" => $Price,
					"MinPrice" => $MinPrice,
					"MaxPrice" => $MaxPrice,
					"AvgPrice" => $AvgPrice,
					"MinPricePerSq" => $MinPricePerSq,
					"YearEnd"=>$YearEnd,
					"CondoUnit"=>$CondoUnit,
					"CarParkUnit"=>$CarParkUnit,
					"CamFee"=>$CamFee,
					"Advertising"=>$Advertising,
					"Station"=>$Station,
					"StationType"=>$StationType,
					"StationDist"=>$StationDist
				);
				array_push($resultSearch,$Point);
			}
		}
		
//		$this->testlog->savelogend($process_id);
		echo json_encode($resultSearch);
	}

	function queryPost($Bedroom,$Bathroom,$TOAdvertising,$PID,$minPrice,$maxPrice,$TOProperty){
		if ($TOProperty!=''){
			$TOProperty=substr($TOProperty,0,-1);
			$TOProperty=str_replace(",","','",$TOProperty);
			$pProperty=" and TOProperty in('".$TOProperty."')";
		} else {
			$pProperty="";
		}
		if ($Bedroom!=''){
			$Bedroom=substr($Bedroom,0,-1);
			$Bedroom=str_replace(",","','",$Bedroom);
			$pBedroom=" and Bedroom in('".$Bedroom."')";
		} else {
			$pBedroom="";
		}
		if ($Bathroom!=''){
			$Bathroom=substr($Bathroom,0,-1);
			$Bathroom=str_replace(",","','",$Bathroom);
			$pBathroom=" and Bathroom in('".$Bathroom."')";
		} else {
			$pBathroom="";
		}
		if($TOAdvertising!=''){
			$TOAdvertising=substr($TOAdvertising,0,-1);
			$TOAdvertising_array=explode(",",$TOAdvertising);
			$TOAdvertising_in="";
			$pminPrice="";
			$pmaxPrice="";
			for($i=0;$i<count($TOAdvertising_array);$i++){
				if($TOAdvertising_array[$i]==1){//ขาย
					$TOAdvertising_in.='1,';
				}
				if($TOAdvertising_array[$i]==2){//ขายดาวน์
					$TOAdvertising_in.='2,';
				}
				if($TOAdvertising_array[$i]==5){//เช่า
					$TOAdvertising_in.='5,';
				}
				if($TOAdvertising_array[$i]==4){//ขาย+ขายดาวน์
					$TOAdvertising_in.='1,2,';
				}
				if($minPrice!=""){
					$pminPrice=' and (case when TOAdvertising=1 then TotalPrice>="'.$minPrice.'"';
					$pminPrice.=' when TOAdvertising=2 then DTotalPrice>="'.$minPrice.'"';
					$pminPrice.=' when TOAdvertising=5 then PRentPrice>="'.$minPrice.'"';
					$pminPrice.=' else true end)';
				}
				if ($maxPrice!=""){
					$pmaxPrice=' and (case when TOAdvertising=1 then TotalPrice<="'.$maxPrice.'" ';
					$pmaxPrice.=' when TOAdvertising=2 then DTotalPrice<="'.$maxPrice.'"';
					$pmaxPrice.=' when TOAdvertising=5 then PRentPrice<="'.$maxPrice.'"';
					$pmaxPrice.=' else true end)';
				}
			}
			$TOAdvertising_in=substr($TOAdvertising_in,0,-1);
			$TOAdvertising_in=str_replace(",","','",$TOAdvertising_in);
			$pAdvertising=" and TOAdvertising in('".$TOAdvertising_in."')";
		}else{
			$pAdvertising="";
		}
		$queryPost=$this->db->query('Select TOAdvertising,count(POID) as NumUnit, min(TotalPrice) as MinPriceS, min(DTotalPrice) as MinPriceD, min(PRentPrice) as MinPriceR, min(PricePerSq) as MinPricePerSq,useArea from Post Where Active=1 and DateExpire>=curdate() and PID="'.$PID.'" '.$pAdvertising.' '.$pProperty.' '.$pBedroom.$pBathroom.$pminPrice.$pmaxPrice.' group by PID,TOProperty,TOAdvertising');
		
		return $queryPost;
	}
	
	function queryPost2($Bedroom,$Bathroom,$TOAdvertising,$PID,$minPrice,$maxPrice,$TOProperty){
		if ($TOProperty!=''){
			$TOProperty=substr($TOProperty,0,-1);
			$TOProperty=str_replace(",","','",$TOProperty);
			$pProperty=" and TOProperty in('".$TOProperty."')";
		} else {
			$pProperty="";
		}
		if ($Bedroom!=''){
			$Bedroom=substr($Bedroom,0,-1);
			$Bedroom=str_replace(",","','",$Bedroom);
			$pBedroom=" and Bedroom in('".$Bedroom."')";
		} else {
			$pBedroom="";
		}
		if ($Bathroom!=''){
			$Bathroom=substr($Bathroom,0,-1);
			$Bathroom=str_replace(",","','",$Bathroom);
			$pBathroom=" and Bathroom in('".$Bathroom."')";
		} else {
			$pBathroom="";
		}
		if($TOAdvertising!=''){
			$TOAdvertising=substr($TOAdvertising,0,-1);
			$TOAdvertising_array=explode(",",$TOAdvertising);
			$TOAdvertising_in="";
			$pminPrice="";
			$pmaxPrice="";
			for($i=0;$i<count($TOAdvertising_array);$i++){
				if($TOAdvertising_array[$i]==1){//ขาย
					$TOAdvertising_in.='1,';
				}
				if($TOAdvertising_array[$i]==2){//ขายดาวน์
					$TOAdvertising_in.='2,';
				}
				if($TOAdvertising_array[$i]==5){//เช่า
					$TOAdvertising_in.='5,';
				}
				if($TOAdvertising_array[$i]==4){//ขาย+ขายดาวน์
					$TOAdvertising_in.='1,2,';
				}
				if($minPrice!=""){
					$pminPrice=' and (case when TOAdvertising=1 then TotalPrice>="'.$minPrice.'"';
					$pminPrice.=' when TOAdvertising=2 then DTotalPrice>="'.$minPrice.'"';
					$pminPrice.=' when TOAdvertising=5 then PRentPrice>="'.$minPrice.'"';
					$pminPrice.=' else true end)';
				}
				if ($maxPrice!=""){
					$pmaxPrice=' and (case when TOAdvertising=1 then TotalPrice<="'.$maxPrice.'" ';
					$pmaxPrice.=' when TOAdvertising=2 then DTotalPrice<="'.$maxPrice.'"';
					$pmaxPrice.=' when TOAdvertising=5 then PRentPrice<="'.$maxPrice.'"';
					$pmaxPrice.=' else true end)';
				}
			}
			$TOAdvertising_in=substr($TOAdvertising_in,0,-1);
			$TOAdvertising_in=str_replace(",","','",$TOAdvertising_in);
			$pAdvertising=" and TOAdvertising in('".$TOAdvertising_in."')";
		}else{
			$pAdvertising="";
		}
		$queryPost=$this->db->query('Select *,POID as PPOID,TotalPrice as Price,PRentPrice as RPrice,(Select Count(ViewTelByUserID) as ViewTel from LogViewPost Where POID=PPOID) as CountViewTel,(Select Count(ID) from LogViewPost Where POID=PPOID) as CountView,(Select count(ID) from FavoriteUser Where POID=PPOID and user_id="'.$user_id.'" and status=1) as FVStatus from Post Where Active=1 and DateExpire>=curdate() and PID="'.$PID.'" '.$pAdvertising.' '.$pProperty.' '.$pBedroom.$pBathroom.$pminPrice.$pmaxPrice.' group by PID,TOAdvertising,TOProperty,RoomNumber,Address');
		
		return $queryPost;
	}

	function getPostFromPoint($PID,$TOProperty,$Bedroom,$Bathroom,$Year,$TOAdvertising,$minPrice,$maxPrice){
		//$process_id=$this->testlog->genprocessid();
		//$this->testlog->savelogstart($process_id);
		$queryPID=$this->queryPost2($Bedroom,$Bathroom,$TOAdvertising,$PID,$minPrice,$maxPrice,$TOProperty);
		$arrayPID=array();
		foreach ($queryPID->result() as $rowPOID){
			$POID=$rowPOID->POID;
			$ProjectName=$rowPOID->ProjectName;
			$ProjectNameCenter=$rowPOID->SName_th;
			if($ProjectNameCenter==null or $ProjectNameCenter==''){
				$ProjectNameCenter=$ProjectName;
			}
			$ProjectNameAnchor=str_replace(" ","-",$ProjectName);
			$ProjectNameAnchor=str_replace("(","",$ProjectNameAnchor);
			$ProjectNameAnchor=str_replace(")","",$ProjectNameAnchor);
			$ProjectNameAnchor=str_replace("@","แอด",$ProjectNameAnchor);
			$queryProject=$this->db->query('select PName_en from Project Where PID="'.$PID.'"');
			$rowProject=$queryProject->row();
			$PName_en=$rowProject->PName_en;
			$PName_en=str_replace(" ", "-", $PName_en);
			$PName_en=str_replace("@", "-", $PName_en);
			$PName_en=str_replace("'", "-", $PName_en);
			$PName_en=str_replace("(", "-", $PName_en);
			$PName_en=str_replace(")", "-", $PName_en);
			$PName_en=str_replace(":", "-", $PName_en);
			$Advertising=$rowPOID->TOAdvertising;
			if($Advertising=='1' or $Advertising=='2'){
				$NamePath='sell';
			}else{
				$NamePath='rent';
			}
			$AdvertisingName=$this->getAdvertising($rowPOID->TOAdvertising,'AName_th');
			$PropertyName=$this->getProperty($rowPOID->TOProperty,'TOPName_th');
			$useArea=$rowPOID->useArea;
			//$useArea=$useArea+($rowPOID->terraceArea);
			if($Advertising==1){//ขาย
				$Price=$rowPOID->Price;
			}else if($Advertising==2){//ขายดาวน์
				$Price=$rowPOID->Price;
			}else if($Advertising==5){//เช่า
				$Price=$rowPOID->RPrice;
			}
			$PriceShowNew=number_format(($Price), 0, '', ',');
			$PricePerSq=$Price/$useArea;
			if ($Advertising==5){
				$Price=number_format(($Price), 0, '', ',');
			} else {
				$Price=number_format(($Price/1000000), 2, '.', '')."M";
			}
			$PricePerSq=number_format($PricePerSq, 0,'',',');
			$Bedroom=$rowPOID->Bedroom;
			if($Bedroom=="99"){
				$Bedroom="สตูดิโอ";
			}else{
				$Bedroom.=" นอน";
			}
			$Bathroom=$rowPOID->Bathroom." น้ำ";
			$Floor=$rowPOID->Floor;
			$DateShow=$rowPOID->ActiveDay;
			if ($rowPOID->RedPost==1){
				$Tel=$rowPOID->Telephone1;
			} else {
				//$Tel="โทรหาทันที";
				$Tel=substr($rowPOID->Telephone1,0,3)."-XXX-XXXX";
			}
			$ViewTel=$rowPOID->CountViewTel;
			$ViewPost=$rowPOID->CountView;
			$queryPic=$this->db->query('Select * from ImagePost Where POID="'.$POID.'" and AdImg=1 Order By field(type,"room","view","facilities"),Order_Sort ASC,ImgID ASC limit 1');
			$arrayPIC=array();
			if ($queryPic->num_rows()>0){
				foreach ($queryPic->result() as $rowPic){
					$file=$rowPic->file;
					if ($rowPic->Thumb==1){
						$checkJPG=strpos($file,'.jpg');
						if ($checkJPG!==false){
							$file=str_replace(".jpg","t.jpg",$file);
						}
						$checkPNG=strpos($file,'.png');
						if ($checkPNG!==false){
							$file=str_replace(".png","t.png",$file);
						}
						$checkJPG=strpos($file,'.JPG');
						if ($checkJPG!==false){
							$file=str_replace(".JPG","t.JPG",$file);
						}
						$checkPNG=strpos($file,'.PNG');
						if ($checkPNG!==false){
							$file=str_replace(".PNG","t.PNG",$file);
						}
					}
					array_push($arrayPIC,$file);
				}
			}
			$queryDistMarker=$this->db->query('Select a.Distance,a.Station,a.Type,b.KeyName from DistMarker a left join KeyMarker b on a.Station=b.KeyID Where a.PID="'.$PID.'" and (a.Type="BTS" or a.Type="MRT" or a.Type="BRT" or a.Type="ARL") order by a.Distance limit 1');
			$arrayDist=array();
			if($queryDistMarker->num_rows()>0){
				$rowDistMarker=$queryDistMarker->row();
				$Distance=$rowDistMarker->Distance;
				$Distance=$Distance/1000;
				$Distance=number_format($Distance,1,'.',',');
				$KeyName=$rowDistMarker->KeyName;
				$DistName='('.$KeyName." ".$Distance." กม.)";
				//array_push($arrayDist,$DistName);
			}
			$arrayPOID=array(
				"POID"=>$POID,
				"ProjectName"=>$ProjectName,
				"ProjectNameCenter"=>$ProjectNameCenter,
				"ProjectNameAnchor"=>$ProjectNameAnchor,
				"PropertyName"=>$PropertyName,
				"AdvertisingName"=>$AdvertisingName,
				"Price"=>$Price,
				"PriceShowNew"=>$PriceShowNew,
				"PricePerSq"=>$PricePerSq,
				"Bedroom"=>$Bedroom,
				"Bathroom"=>$Bathroom,
				"useArea"=>$useArea,
				"Floor"=>$Floor,
				"DateShow"=>$DateShow,
				"ViewTel"=>$ViewTel,
				"ViewPost"=>$ViewPost,
				"Tel"=>$Tel,
				"Picture"=>$arrayPIC,
				"DistName"=>$DistName,
				"PName_en"=>$PName_en,
				"NamePath"=>$NamePath,
				"Favourite"=>$Favourite
			);
			array_push($arrayPID,$arrayPOID);
		}
		//$this->testlog->savelogend($process_id);
		echo json_encode($arrayPID);
	}

	function getUnitFromPOID($POID){
		$queryUnit=$this->db->query('Select *,TOProperty as sTOPID,TOAdvertising as sTOAID,Province as sProvinceID,DATEDIFF(CURDATE(), DateCreate) as DateShow,(select TOPName_th from TOProperty where TOPID=sTOPID) as PropertyName,(select if(TOAID=5,concat("ให้","",AName_th),AName_th) from TOAdvertising where TOAID=sTOAID) as AdvertisingName,(select ProvinceName from Province where id=sProvinceID) as ProvinceName from Post Where POID="'.$POID.'"');
		return $queryUnit;
	}

	function selectCountingList($POID,$PID){
		$queryPost=$this->db->query('Select Count(POID) as AllList from Post Where Active=1 and PID="'.$PID.'"');
		$rowPost=$queryPost->row();
		$AllList=$rowPost->AllList;
		$queryPost=$this->db->query('Select count(POID) ListNumber from Post Where Active=1 and PID="'.$PID.'" and POID<="'.$POID.'"');
		$rowPost=$queryPost->row();	
		$ListNumber=$rowPost->ListNumber;
		$result=array($ListNumber,$AllList);
		return $result;
	}

	function ContViewList($POID){
		$queryLog=$this->db->query('Select Count(ID) as NumberView from LogViewPost Where POID="'.$POID.'" and ViewTelByUserID is not null');
		if ($queryLog->num_rows() > 0){
			$rowLog=$queryLog->row();
			$result=$rowLog->NumberView;
		} else {
			$result=0;
		}
		return $result;
	}

	function CountSoldPerMonth($PID){
		$queryPost=$this->db->query('Select Count(POID) as NumberSell from Post Where Active=0 and Status=3 and PID="'.$PID.'"');
		if ($queryPost->num_rows() > 0){
			$rowPost=$queryPost->row();
			$NumberSell=$rowPost->NumberSell;
		} else {
			$NumberSell=0;
		}
		$queryPost=$this->db->query('Select DATEDIFF(Min(DateCreate), Max(DateCreate)) as DaySell from Post Where Active=0 and Status=3 and PID="'.$PID.'"');
		if ($queryPost->num_rows() > 0){
			$rowPost=$queryPost->row();
			$DaySell=$rowPost->DaySell;
			echo $DaySell;
			$DaySell=$DaySell/30;
		} else {
			$result=0;
		}
		if ($DaySell!=0){
			$resultNumber=$NumberSell/$DaySell;
			$result=number_format($resultNumber, 0,'',',');
		} else {
			$result=0;
		}
		return $result;
	}

	function SelectImgFromPOID($POID){
		$queryImg=$this->db->query('Select file from ImagePost Where POID="'.$POID.'" and AdImg=1 Order By field(type,"room","view","facilities"),Horizental DESC,Order_Sort ASC, ImgID asc');
		$result=array();
		foreach ($queryImg->result() as $rowImg){
			$file=$rowImg->file;
			if ($rowImg->Thumb==1){
				$checkJPG=strpos($file,'.jpg');
				if ($checkJPG!==false){
					$file=str_replace(".jpg","t.jpg",$file);
				}
				$checkPNG=strpos($file,'.png');
				if ($checkPNG!==false){
					$file=str_replace(".png","t.png",$file);
				}
				$checkJPG=strpos($file,'.JPG');
				if ($checkJPG!==false){
					$file=str_replace(".JPG","t.JPG",$file);
				}
				$checkPNG=strpos($file,'.PNG');
				if ($checkPNG!==false){
					$file=str_replace(".PNG","t.PNG",$file);
				}
			}
			array_push($result,$file);
		}
		return $result;
	}
	
	function CountImg($POID){
		$queryImg=$this->db->query('Select count(ImgID) as number from ImagePost Where POID="'.$POID.'" and AdImg=1 Order By field(type,"room","view","facilities")');
		if ($queryImg->num_rows() > 0){
			$rowImg=$queryImg->row();
			$NumberImg=$rowImg->number;
		} else {
			$NumberImg=0;
		}
		return $NumberImg;
	}

	function DistMRTBTS($PID){
		$queryDistMarker=$this->db->query('Select Distance, Station, Type from DistMarker Where PID="'.$PID.'" and (Type="BTS" or Type="MRT" or Type="BRT" or Type="ARL") and Distance<1500 order by Distance limit 3');
		//echo 'Select Distance, Station, Type from DistMarker Where PID="'.$PID.'" and (Type="BTS" or Type="MRT" or Type="BRT" or Type="ARL") order by Distance limit 3';
		//echo 'Select Distance, Station, Type from DistMarker Where PID="'.$PID.'" and (Type="BTS" or Type="MRT" or Type="BRT" or Type="ARL") order by Distance limit 3';
		//$rowDistMarker=$queryDistMarker->row();
		$result=array();
		foreach ($queryDistMarker->result() as $rowDistMarker){ 
			$Distance=$rowDistMarker->Distance;
			$Distance=$Distance/1000;
			$Distance=number_format($Distance, 2,'.',',');
			$KeyID=$rowDistMarker->Station;
			$Type=$rowDistMarker->Type;
			$queryKeyMarker=$this->db->query('Select a.KeyName,a.Lat,a.Lng,b.Pic_path from KeyMarker a left join KeyMarkerType b on a.Type=b.Type Where a.KeyID="'.$KeyID.'"');
			$rowKeyMarker=$queryKeyMarker->row();
			array_push($result, $Distance,$Type,$rowKeyMarker->KeyName);
			//array_push($result, $Distance,$Type,$rowKeyMarker->KeyName,$rowKeyMarker->Lat,$rowKeyMarker->Lng,$rowKeyMarker->Pic_path);
		}
		return $result;
	}

	function DistFromType($PID,$Type){
		if ($Type=="Minimart"){
			$DistLimit=500;
		} else {
			$DistLimit=3000;
		};
		$queryDistMarker=$this->db->query('Select Distance, Station, Type from DistMarker Where PID="'.$PID.'" and Type="'.$Type.'" and Distance<"'.$DistLimit.'"  order by Distance limit 3');
		//echo 'Select Distance, Station, Type from DistMarker Where PID="'.$PID.'" and Type="'.$Type.'" and Distance<"'.$DistLimit.'"  order by Distance limit 3';
		$result=array();
		foreach ($queryDistMarker->result() as $rowDistMarker){ 
			$Distance=$rowDistMarker->Distance;
			$Distance=$Distance/1000;
			$Distance=number_format($Distance, 2,'.',',');
			$KeyID=$rowDistMarker->Station;
			$Type=$rowDistMarker->Type;
			$queryKeyMarker=$this->db->query('Select a.KeyName,a.Lat,a.Lng,b.Pic_path from KeyMarker a left join KeyMarkerType b on a.Type=b.Type Where a.KeyID="'.$KeyID.'"');
			$rowKeyMarker=$queryKeyMarker->row();
			array_push($result, $Distance,$Type,$rowKeyMarker->KeyName);
			//array_push($result, $Distance,$Type,$rowKeyMarker->KeyName,$rowKeyMarker->Lat,$rowKeyMarker->Lng,$rowKeyMarker->Pic_path);
		}
		return $result;
	}
	
	function DistMRTBTS2($PID){
		$queryDistMarker=$this->db->query('Select Distance, Station, Type from DistMarker Where PID="'.$PID.'" and (Type="BTS" or Type="MRT" or Type="BRT" or Type="ARL") and Distance<3000 order by Distance limit 3');
		$i=0;
		foreach ($queryDistMarker->result() as $rowDistMarker){
			$i++;
			$result[$i]=array();
			$Distance=$rowDistMarker->Distance;
			$Distance=$Distance/1000;
			$Distance=number_format($Distance, 1,'.',',');
			$KeyID=$rowDistMarker->Station;
			$Type=$rowDistMarker->Type;
			$queryKeyMarker=$this->db->query('Select a.KeyName,a.Lat,a.Lng,b.Pic_path from KeyMarker a left join KeyMarkerType b on a.Type=b.Type Where a.KeyID="'.$KeyID.'"');
			$rowKeyMarker=$queryKeyMarker->row();
			array_push($result[$i], $Distance,$Type,$rowKeyMarker->KeyName,$rowKeyMarker->Lat,$rowKeyMarker->Lng,$rowKeyMarker->Pic_path,$i);
		}
		return $result;
	}
	
	function DistFromType2($PID,$Type){
		if ($Type=="Minimart"){
			$DistLimit=500;
		} else {
			$DistLimit=3000;
		};
		$queryDistMarker=$this->db->query('Select Distance, Station, Type from DistMarker Where PID="'.$PID.'" and Type="'.$Type.'" and Distance<"'.$DistLimit.'"  order by Distance limit 3');
		$i=0;
		foreach ($queryDistMarker->result() as $rowDistMarker){
			$i++;
			$result[$i]=array();
			$Distance=$rowDistMarker->Distance;
			$Distance=$Distance/1000;
			$Distance=number_format($Distance, 1,'.',',');
			$KeyID=$rowDistMarker->Station;
			$Type=$rowDistMarker->Type;
			$queryKeyMarker=$this->db->query('Select a.KeyName,a.Lat,a.Lng,b.Pic_path from KeyMarker a left join KeyMarkerType b on a.Type=b.Type Where a.KeyID="'.$KeyID.'"');
			$rowKeyMarker=$queryKeyMarker->row();
			array_push($result[$i], $Distance,$Type,$rowKeyMarker->KeyName,$rowKeyMarker->Lat,$rowKeyMarker->Lng,$rowKeyMarker->Pic_path,$i);
		}
		return $result;
	}
	
	function getCondoSpec($POID,$GCSID){
		$queryTOCondoSpec=$this->db->query('Select TOCondoSpec.* from TOCondoSpec,PostCondoSpec Where TOCondoSpec.TOCSID=PostCondoSpec.TOCSID and TOCondoSpec.GCSID="'.$GCSID.'" and PostCondoSpec.POID="'.$POID.'" order by TOCondoSpec.TOCSID');
		$result=array();
		foreach ($queryTOCondoSpec->result() as $rowCondoSpec){
			array_push($result,$rowCondoSpec->CSName_th);
		}
		return $result;
	}

	function getCondoSpec_old($POID,$GCSID){
		$queryTOCondoSpec=$this->db->query('Select * from TOCondoSpec Where GCSID="'.$GCSID.'"');
		$result=array();
		foreach ($queryTOCondoSpec->result() as $rowCondoSpec){
			$TOCSID=$rowCondoSpec->TOCSID;
			$queryPostCondoSpec=$this->db->query('Select * from PostCondoSpec Where TOCSID="'.$TOCSID.'" and POID="'.$POID.'"');
			if ($queryPostCondoSpec->num_rows()==1){
				array_push($result,$rowCondoSpec->CSName_th);
			}
		}
		return $result;
	}

	function getPostDCondo($POID,$Type){
		$queryPostDCondo=$this->db->query('Select * from PostDCondo Where POID="'.$POID.'" and HistoryDPayment="'.$Type.'" Order By DPaymentTime');
		return $queryPostDCondo;
	}

	function KeyDirection($DID){
		if ($DID=="0"){
			$result="--";
		} else {
			$query=$this->db->query('Select DNameEn from Direction Where DID="'.$DID.'"');
			$row=$query->row();
			$result=$row->DNameEn;
		}
		return $result;
	}
	
	function KeyDirection_th($DID){
		if ($DID=="0"){
			$result="--";
		} else {
			$query=$this->db->query('Select DName from Direction Where DID="'.$DID.'"');
			$row=$query->row();
			$result=$row->DName;
		}
		return $result;
	}

	function updateViewPost($POID){
		$checkRobot=$this->usermenu->check_robot();
		//error_log('CheckRobot='.$checkRobot.", POID=".$POID);
		if ($checkRobot!=1){
		  $checkAdmin=$this->backend->checkAdmin();
			if ($checkAdmin!=1){
				//error_log('CheckRobot='.$checkRobot.", POID=".$POID);
				$date=date("Y-m-d H:i:s");
				$ip_user=0;
				if ($this->tank_auth->is_logged_in()){
					$user_id=$this->session->userdata('user_id');
					$query_post=$this->db->query('Select user_id from Post Where POID="'.$POID.'"');
					$check_user_id=$query_post->row()->user_id;
					$run_query=1;
					if ($user_id!=$check_user_id){
						$run_query=1;
					} else {
						$run_query=0;
					}
				} else {
					$user_id=$this->input->ip_address();
					$query_user=$this->db->query('select id from users where last_ip="'.$user_id.'" order by last_login DESC limit 1');
					if($query_user->num_rows()>0){
						$row_user=$query_user->row();
						$user_from_ip=$user_id;
						$user_id=$row_user->id;
						$ip_user=1;
					}
					$run_query=1;
				}
				$query=$this->db->query('Select max(ID) as last_id,count(ID) as count_id from LogViewPost Where ViewByUserID="'.$user_id.'" and POID="'.$POID.'"');
				//error_log('Select max(ID) as last_id,count(ID) as count_id from LogViewPost Where ViewByUserID="'.$user_id.'" and POID="'.$POID.'"');
				$row=$query->row();
				//$this->db->query('set time_zone="Asia/Bangkok"');
				if ($row->count_id==0){
					//error_log('run_query='.$run_query);
					if ($run_query==1){
						$this->db->query('Insert into LogViewPost set ViewByUserID="'.$user_id.'" , POID="'.$POID.'", LastUpdate=now()');
						//error_log('Insert into LogViewPost set ViewByUserID="'.$user_id.'" , POID="'.$POID.'", LastUpdate=now()');
					}
				}else if($row->count_id>1){
					//$this->db->query('delete from LogViewPost where ViewByUserID="'.$user_id.'" and POID="'.$POID.'" and ID!="'.$row->last_id.'"');
				}
				if($ip_user==1){
					$this->db->query('update LogViewPost set ViewByUserID="'.$user_id_.'" where ViewByUserID="'.$user_from_ip.'" and date(LastUpdate)=curdate()');
				}
			}
		}
	}

	function checkTypeAdvertising($POID)
	{
		$query=$this->db->query('Select TOAdvertising from Post Where POID="'.$POID.'"');
		$row=$query->row();
		return $row->TOAdvertising;
	}

	function qMarker()
	{
        $this->db->query('SET NAMES utf8');
        $this->db->query('SET character_set_results=utf8');
        $query=$this->db->query('select PName_th as ProjectName,PName_en as ProjectName_en from Project,Post where Project.PID=Post.PID and Post.Active="1" and (Project.Lat!=0 or Project.Lng!=0) Group By Project.PID Order By Project.PName_th');
		//$query=$this->db->query('Select ProjectName from Post Where Active="1" Group By ProjectName');
		$result=array();
		$type=1;
		foreach ($query->result() as $row){
			array_push($result,$row->ProjectName);
			array_push($result,$row->ProjectName_en);
		}
        $query=$this->db->query('select KeyName,KeyName_en from KeyMarker Where Type!="Minimart" and Type!="Expressway" and Type!="Project" group by Lat,Lng');
		//$query=$this->db->query('select KeyName from KeyMarker Where Type="BTS" or Type="ARL" or Type="MRT"');
		$type=2;
		foreach ($query->result() as $row){
			array_push($result,$row->KeyName);
			array_push($result,$row->KeyName_en);
		}
        return $result;
	}

	function qLabel($type,$lang=1){
		$this->db->select('label,description');
		if($type!=''){
			if($type=='post'){
				$type_in=array($type,'main','post1','post2','post3','post4','post5');
			}else{
				$type_in=array($type,'main');
			}
			$this->db->where_in('type',$type_in);
		}
		if($lang!=''){
			$this->db->where('language',$lang);
		}
		$this->db->where('status=1');
		$this->db->order_by('type','asc');
		$query=$this->db->get('cfg_label');
		foreach ($query->result() as $row){
			$result[$row->label]=array();
			array_push($result[$row->label],$row->description);
		}
		return $result;
	}
	
	function searchLabel($type,$status){
		$this->db->select('id,type,label,language,description,detail,status');
		if($type!=''){
			$this->db->where('type',$type);
		}
		if($status!=''){
			$this->db->where('status',$status);
		}
		//$this->db->order_by('type','asc');
		$query=$this->db->get('cfg_label');
		return $query;
	}
	
	function getFacebookID(){
		$query=$this->db->query('select name_th,name_en from cfg_master where type="facebook_id" and status=1 ');
		$row=$query->row();
		return $row->name_th;
	}
	
	function getMaxYearProject(){
		$query=$this->db->query('select max(YearEnd) as year from Project ');
		$row=$query->row();
		return $row->year;
	}
	
	function getUnit($POID,$Active,$Field){
		if($POID!=''){
			$qPOID=' and POID="'.$POID.'" ';
		}else{
			$qPOID='';
		}
		if($Active!=''){
			$qActive=' and Active="'.$Active.'" ';
		}else{
			$qActive='';
		}
		$query=$this->db->query('select '.$Field.' from Post where 1'.$qPOID.$qActive);
		$row=$query->row();
		return $row->$Field;
	}
	
	function getProject($PID,$Name,$Field){
		if($PID!=''){
			$qPID=' and PID="'.$PID.'" ';
		}else{
			$qPID='';
		}
		if($Name!=''){
			$qName=' and (PName_th="'.$Name.'" or PName_en="'.$Name.'") ';
		}else{
			$qName='';
		}
		$query=$this->db->query('select '.$Field.' from Project where 1'.$qPID.$qName);
		//echo 'select '.$Field.' from Project where 1'.$qPID.$qName;
		if($query->num_rows()>0){
			$row=$query->row();
			return $row->$Field;
		}else{
			return 0;
		}
	}
	
	function getProfile($user_id,$Field=''){
		if($Field!=''){
			$sField=$Field;
		}else{
			$sField='*';
		}
		$query=$this->db->query('select '.$sField.' from users_profile where user_id="'.$user_id.'"');
		$row=$query->row();
		if($Field!=''){
			return $row->$Field;
		}else{
			return $row;
		}
	}
	
	function getAdvertising($id,$Field=''){
		if($Field!=''){
			$sField=$Field;
		}else{
			$sField='*';
		}
		$query=$this->db->query('select '.$sField.' from TOAdvertising where TOAID="'.$id.'"');
		$row=$query->row();
		if($Field!=''){
			return $row->$Field;
		}else{
			return $row;
		}
	}
	
	function getProperty($id,$Field=''){
		if($Field!=''){
			$sField=$Field;
		}else{
			$sField='*';
		}
		$query=$this->db->query('select '.$sField.' from TOProperty where TOPID="'.$id.'"');
		$row=$query->row();
		if($Field!=''){
			return $row->$Field;
		}else{
			return $row;
		}
	}
	
	function getProjectCenter($id,$Field=''){
		if($Field!=''){
			$sField=$Field;
		}else{
			$sField='*';
		}
		$query=$this->db->query('select '.$sField.' from ProjectCenter where id="'.$id.'"');
		$row=$query->row();
		if($Field!=''){
			return $row->$Field;
		}else{
			return $row;
		}
	}
	
	function qStationType(){
        $this->db->query('SET NAMES utf8');
        $this->db->query('SET character_set_results=utf8');
        $query=$this->db->query('select * from KeyMarkerType Where Type in("BTS","MRT","BRT","ARL") Order By Type');
        return $query;
	}
	
	function getProjectList($KeyType,$KeyID="",$Distance=""){
		if($KeyID!=''){
			$sKeyID=' and KeyMarker.ID="'.$KeyID.'" ';
		}else{
			$sKeyID='';
		}
		if($Distance==''){
			$Distance=3000;
		}
		$query=$this->db->query('select *,sum(if(TOAdvertising="1",unit_sale,0)) as unit_sale,sum(if(TOAdvertising="5",unit_rent,0)) as unit_rent,b.TOPName_th from (select Project.*,if(Post.TOAdvertising="1" or Post.TOAdvertising="2",1,5) as TOAdvertising,if(Post.TOAdvertising="1" or Post.TOAdvertising="2",count(Post.PID),0) as unit_sale,if(Post.TOAdvertising="5",count(Post.PID),0) as unit_rent,Post.TOProperty,KeyMarker.KeyID,KeyMarker.KeyName,KeyMarker.KeyName_en,KeyMarker.Type,KeyMarker.SubType,DistMarker.Distance from Post,Project,DistMarker,KeyMarker Where Post.PID=Project.PID and Project.PID=DistMarker.PID and DistMarker.Station=KeyMarker.KeyID and Post.Active=1 and Post.DateExpire>=curdate() and KeyMarker.Type="'.$KeyType.'" and DistMarker.Distance<="'.$Distance.'" '.$sKeyID.' group by KeyMarker.ID,Project.PID,Post.TOProperty,Post.TOAdvertising) a left join TOProperty b on b.TOPID=a.TOProperty group by KeyID,PID order by KeyName,PName_th');
		$resultSearch=array();
		foreach ($query->result() as $row){
			$ProjectNameAnchor=str_replace(" ","-",$row->PName_th);
			$ProjectNameAnchor=str_replace("(","",$ProjectNameAnchor);
			$ProjectNameAnchor=str_replace(")","",$ProjectNameAnchor);
			$ProjectNameAnchor=str_replace("@","แอท",$ProjectNameAnchor);
			$result=array(
				"PID"=>$row->PID,
				"Type"=>$row->Type,
				"SubType"=>$row->SubType,
				"PropertyName"=>$row->TOPName_th,
				"ProjectName"=>$row->PName_th,
				"ProjectName_en"=>$row->PName_en,
				"ProjectNameAnchor"=>$ProjectNameAnchor,
				"UnitSale"=>$row->unit_sale,
				"UnitRent"=>$row->unit_rent,
				"YearEnd"=>$row->YearEnd,
				"Distance"=>$row->Distance,
				"KeyID"=>$row->KeyID,
				"KeyName"=>$row->KeyName,
				"KeyType"=>$row->Type
			);
			array_push($resultSearch,$result);
		}
		echo json_encode($resultSearch);
	}
	
	function checkHomeSearch($namePoint){
        $this->db->query('SET NAMES utf8');
        $this->db->query('SET character_set_results=utf8');
		$result=0;
        $query=$this->db->query('select PID from Project,Post where Project.PID=Post.PID and Post.Active="1" and (Project.Lat!=0 or Project.Lng!=0) and Project.CondoUnit>0 and (Project.PName_th="'.$namePoint.'" or Project.PName_en="'.$namePoint.'") Group By Project.PID Order By Project.PName_th');
		if ($query->num_rows() == 0){
			$query2=$this->db->query('select ID from KeyMarker Where Type!="Minimart" and Type!="Expressway" and (KeyName="'.$namePoint.'" or KeyName_en="'.$namePoint.'") group by Lat,Lng');
			if ($query2->num_rows() > 0){
				$result=1;
			}
		}else{
			$result=1;
		}
		
        return $result;
	}
	
	//Image Banner
	function getImageBanner($viewtype,$distance,$namePoint,$TOProperty,$Bedroom,$Bathroom,$TransDist,$TransType,$Year,$TOAdvertising,$minPrice,$maxPrice,$orderType,$loopPOID=''){
		$DistanceBanner=5000;
		$BannerStatus=1;
		$date_check=1;
		$credit_use=1;
		if($this->tank_auth->is_logged_in()){
			$user_id=$this->session->userdata('user_id');
		}else{
			$user_id=$this->input->ip_address();
		}
		if($viewtype=='searchmapunit'){
			//$qOrder='order by rand() limit 1';
			$qOrder=' order by Distance limit 1';
		}else{
			//$qOrder='order by sort_no ASC';
			$qOrder=' order by Distance limit 1';
		}
		if($loopPOID<>''){
			$loopPOID=substr($loopPOID,0,-1);
			$loopPOID_in=str_replace(",","','",$loopPOID);
			$qloopPOID=" and Post.POID not in('".$loopPOID_in."')";
		}else{
			$qloopPOID="";
		}
		if($TOAdvertising!=''){
			$TOAdvertising=substr($TOAdvertising,0,-1);
			$TOAdvertising_array=explode(",",$TOAdvertising);
			$TOAdvertising_in="";
			for($i=0;$i<count($TOAdvertising_array);$i++){
				if($TOAdvertising_array[$i]=='1'){//ขาย
					$TOAdvertising_in.='1,';
				}
				if($TOAdvertising_array[$i]=='2'){//ขายดาวน์
					$TOAdvertising_in.='2,';
				}
				if($TOAdvertising_array[$i]=='5'){//เช่า
					$TOAdvertising_in.='5,';
				}
				if($TOAdvertising_array[$i]=='4'){//ขาย+ขายดาวน์
					$TOAdvertising_in.='1,2,';
				}
				if($TOAdvertising_array[$i]=='6'){//ขายแล้ว
					$TOAdvertising_in.='1,2,';
					$Active=82;//cfg_master
				}
				if($TOAdvertising_array[$i]=='7'){//เช่าแล้ว
					$TOAdvertising_in.='5,';
					$Active=81;//cfg_master
				}
				if($TOAdvertising_array[$i]=='8'){//ขายห้องใหม่
					if($TOAdvertising_in==''){
						$TOAdvertising_in.='1,2,';
					}
				}
			}
			if($TOAdvertising_in=='1,' or $TOAdvertising_in=='2,'){
				$TOAdvertising_in_banner='1,2,';
			}else{
				$TOAdvertising_in_banner=$TOAdvertising_in;
			}
			$TOAdvertising_in=substr($TOAdvertising_in,0,-1);
			$TOAdvertising_in=str_replace(",","','",$TOAdvertising_in);
			$qAdvertising=" and Post.TOAdvertising in('".$TOAdvertising_in."')";
			$TOAdvertising_in_banner=substr($TOAdvertising_in_banner,0,-1);
			$TOAdvertising_in_banner=str_replace(",","','",$TOAdvertising_in_banner);
			$qAdvertising_banner=" and Post.TOAdvertising in('".$TOAdvertising_in_banner."')";
		}else{
			$qAdvertising="";
			$qAdvertising_banner="";
		}
		$qSearchID="";
		$qProvince="";
		$qDistance="";
		$numProjectFromSearch=0;
		$queryProvince=$this->db->query('Select KeyID,ProvinceID,(select DistanceSearch from Province where id=ProvinceID) as ProvinceSearch from KeyMarker Where (KeyName="'.$namePoint.'" or KeyName_en="'.$namePoint.'") and Type not in("Minimart","Expressway","Project")');//search with keymarker
		if($queryProvince->num_rows()>0){
			$KeySearch=1;
			$rowProvince=$queryProvince->row();
			$sSearchDist=" and Project.PID=DistMarker.PID";
			$qSearchID=" and DistMarker.Station='".$rowProvince->KeyID."'";
			$ProvinceSearch=$rowProvince->ProvinceSearch;
			$ProvinceID=$rowProvince->ProvinceID;
		}else{
			$KeySearch=0;
			$queryProvince2=$this->db->query('Select PID,ProvinceID,(select DistanceSearch from Province where id=ProvinceID) as ProvinceSearch from Project Where (PName_th="'.$namePoint.'" or PName_en="'.$namePoint.'" )');//search with project
			$rowProvince2=$queryProvince2->row();
			$ProvinceSearch=$rowProvince2->ProvinceSearch;
			$sSearchDist=" and Project.PID=DistMarker.Station";
			$qSearchID=" and DistMarker.PID='".$rowProvince2->PID."'";
			$PID=$rowProvince2->PID;
			$ProvinceID=$rowProvince2->ProvinceID;
			$sqlProjectFromSearch=$this->db->query('select JobID from cCreditJob,Post where cCreditJob.POID=Post.POID and Post.PID="'.$rowProvince2->PID.'" and cCreditJob.Active=1 and now() between cCreditJob.start_date and cCreditJob.end_date');
			$numProjectFromSearch=$sqlProjectFromSearch->num_rows();
		}
		if($queryProvince->num_rows()>0 or $queryProvince2->num_rows()>0){
			if($ProvinceSearch==0){
				$qProvince=" and Project.ProvinceID='".$ProvinceID."'";
			}else{
				$qDistance=" and DistMarker.Distance<='".$DistanceBanner."'";
			}
		}
		$qSearch=" and Project.ProvinceID='".$ProvinceID."'";
		
		//$queryPic=$this->db->query('Select id,banner_id,filepath,Thumb,if(description is not null,description,"") as filelink,POID from ImageBanner Where banner_id="0" and type="'.$viewtype.'" and status="1" '.$qOrder.' ');
		$queryPic=$this->db->query('select cCreditJob.JobID,cCreditJob.POID,cCreditJob.user_id,cCreditJob.POID as sPOID,if(end_date<now(),1,0) as expire_check from cCreditJob where datediff(now(),cCreditJob.start_date)<="'.$date_check.'" and cCreditJob.Active=1');
		foreach ($queryPic->result() as $rowPic){
			if($rowPic->expire_check==1){
				//update วันเกินกำหนด
				$this->db->query('update cCreditJob set Active=3,end_job=now() where JobID="'.$rowPic->JobID.'"');
			}
			$queryCredit=$this->db->query('select Credit from cCreditSummary where user_id="'.$rowPic->user_id.'"');
			$rowCredit=$queryCredit->row();
			if($rowCredit->Credit==0){
				//update credit หมด
				$this->db->query('update cCreditJob set Active=4,end_job=now() where JobID="'.$rowPic->JobID.'"');
			}
		}
		if($KeySearch==1){
			$qSearchPID.=' and Project.PID=DistMarker.PID';
		}else{
			$qSearchPID.=' and Project.PID=DistMarker.Station and DistMarker.Type="Project"';
		}
		$watchedPOIDBanner=$this->session->userdata('watchedPOIDBanner');
		if($watchedPOIDBanner<>'' or $watchedPOIDBanner<>'null' or $watchedPOIDBanner<>null){
			$watchedPOIDBanner_in=substr($watchedPOIDBanner,0,-1);
			$watchedPOIDBanner_in=str_replace(",","','",$watchedPOIDBanner_in);
			$qwatchedPOIDBanner_in=" and POID not in('".$watchedPOIDBanner_in."')";
			$watchedPOID=$watchedPOIDBanner;
		}else{
			$qwatchedPOIDBanner_in='';
			$watchedPOID='';
		}
		$numJob=0;
		if($numProjectFromSearch>0){
			$queryJob=$this->db->query('select * from (select *,if(credit_use is null,0,credit_use) as credit_use_pday from (select cCreditJob.JobID,cCreditJob.JobID as sJobID,cCreditJob.user_id,cCreditJob.credit_limit_pday,cCreditJob.AdTXT,ImageBanner.id,banner_id,filepath,Thumb,if(description is not null,description,"") as filelink,ImageBanner.POID,sort_no,Post.TOAdvertising,0 as BannerDefault,(select credit_use from cCreditJobDetail where JobID=sJobID and operate_date=curdate()) as credit_use from cCreditSummary,cCreditJob,ImageBanner,Post where cCreditSummary.user_id=cCreditJob.user_id and cCreditJob.POID=ImageBanner.POID and ImageBanner.POID=Post.POID and now() between cCreditJob.start_date and cCreditJob.end_date and cCreditJob.Active="1" and cCreditSummary.Credit>0 and ImageBanner.banner_id="0" and ImageBanner.type="'.$viewtype.'" and ImageBanner.status="1" and Post.Active=1 and Post.DateExpire>=curdate() and Post.PID="'.$PID.'"'.$qAdvertising_banner.') a) b where credit_limit_pday>credit_use_pday');
			$numJob=$queryJob->num_rows();
		}
		if($numJob==0){
			$sqlTxtDefault='select cCreditJob.JobID,cCreditJob.JobID as sJobID,cCreditJob.user_id,cCreditJob.credit_limit_pday,cCreditJob.AdTXT,ImageBanner.id,banner_id,filepath,Thumb,if(description is not null,description,"") as filelink,ImageBanner.POID,sort_no,Post.TOAdvertising,DistMarker.Distance,0 as BannerDefault,(select credit_use from cCreditJobDetail where JobID=sJobID and operate_date=curdate()) as credit_use from cCreditSummary,cCreditJob,ImageBanner,Post,Project,DistMarker where cCreditSummary.user_id=cCreditJob.user_id and cCreditJob.POID=ImageBanner.POID and ImageBanner.POID=Post.POID and Post.PID=Project.PID and now() between cCreditJob.start_date and cCreditJob.end_date and cCreditJob.Active="1" and cCreditSummary.Credit>0 and ImageBanner.banner_id="0" and ImageBanner.type="'.$viewtype.'" and ImageBanner.status="1" and Post.Active=1 and Post.DateExpire>=curdate()'.$qSearchPID.$qAdvertising_banner.$qSearchID.$qProvince.$qDistance;
			$sqlTxtDefault='select * from (select *,if(credit_use is null,0,credit_use) as credit_use_pday from ('.$sqlTxtDefault.') a) b where credit_limit_pday>credit_use_pday';
			$sqlTxt=$sqlTxtDefault.$qwatchedPOIDBanner_in.$qOrder;
			if($user_id=='889'){
				//$sqlTxt='s'.$sqlTxt;
			}
			$queryJob=$this->db->query($sqlTxt);
			if($watchedPOIDBanner<>'' or $watchedPOIDBanner<>'null' or $watchedPOIDBanner<>null){
				if($queryJob->num_rows()==0){
					$watchedPOID='';
					$sqlTxt=$sqlTxtDefault.$qOrder;
					if($user_id=='889'){
						//$sqlTxt='s'.$sqlTxt;
					}
					$queryJob=$this->db->query($sqlTxt);
				}
			}
			if($queryJob->num_rows()==0){
				//$queryJob=$this->db->query('select ImageBanner.id,banner_id,filepath,Thumb,if(description is not null,description,"") as filelink,ImageBanner.POID,sort_no,0,0 from ImageBanner,Post,Project,DistMarker Where ImageBanner.POID=Post.POID and Post.PID=Project.PID and Project.PID=DistMarker.PID and ImageBanner.banner_id="1" and ImageBanner.type="default" and ImageBanner.status="1" and Post.DateExpire>=curdate() '.$qAdvertising.$qSearchID.$qSearch.$qOrder);
				$queryJob=$this->db->query('select ImageBanner.id,banner_id,filepath,Thumb,if(description is not null,description,"") as filelink,ImageBanner.POID,sort_no,0,0,Post.TOAdvertising,1 as BannerDefault from ImageBanner,Post,Project,DistMarker Where ImageBanner.POID=Post.POID and Post.PID=Project.PID and ImageBanner.POID in(SELECT ImageBanner.POID FROM ImageBanner,Post,Project WHERE ImageBanner.POID=Post.POID and Post.PID=Project.PID and ImageBanner.banner_id=1 and ImageBanner.type="default" and ImageBanner.status=1 and Post.Active=1 and Post.DateExpire>=curdate() '.$qAdvertising_banner.$qSearch.') '.$sSearchDist.$qSearchID.$qOrder);
				$BannerStatus=0;
				if($queryJob->num_rows()==0){
					$queryJob=$this->db->query('select ImageBanner.id,banner_id,filepath,Thumb,if(description is not null,description,"") as filelink,ImageBanner.POID,sort_no from ImageBanner where banner_id=2 and type="default" and status=1');
				}
			}
		}
		$arrayBanner=array();
		if($queryJob->num_rows()>0){
			foreach ($queryJob->result() as $rowJob){
				if($rowJob->filelink<>'' or $rowJob->filelink<>'null'){
					$link=$rowJob->filelink;
				}else{
					$link="";
				}
				$JobID=$rowJob->JobID;
				$JobUser=$rowJob->user_id;
				$POID=$rowJob->POID;
				if($POID!=0){
					if($rowJob->BannerDefault==0 and $viewtype=='searchmap'){
						$watchedPOID.=$rowJob->POID.',';
					}
					if($rowJob->BannerDefault==1 or $rowJob->AdTXT==''){
						if($rowJob->TOAdvertising==1){
							$AdTXT='ขายด่วน เจ้าของขายเอง';
						}else if($rowJob->TOAdvertising==2){
							$AdTXT='ขายดาวน์ด่วน เจ้าของขายเอง';
						}else if($rowJob->TOAdvertising==5){
							$AdTXT='เช่าด่วน ทำเลดี เจ้าของให้เช่าเอง';
						}else{
							$AdTXT='เจ้าของขายเอง';
						}
					}else{
						$AdTXT=$rowJob->AdTXT;
					}
					$queryPost=$this->db->query('select Post.*,Project.PName_th,Project.PName_en,Project.SName_th,Project.SName_en
					, case Post.TOAdvertising when "1" then Post.TotalPrice when "2" then Post.DTotalPrice when "5" then Post.PRentPrice end as Price
					, Post.POID as PPOID
					, Post.PID as PPID
					, Post.TOAdvertising as PTOAID
					, (Select Count(ViewTelByUserID) as ViewTel from LogViewPost Where POID=PPOID) as CountViewTel
					, (Select Count(ID) from LogViewPost Where POID=PPOID) as CountView
					, (Select Distance from MinDistance Where PID=PPID) as ADistance
					, (Select KeyName from MinDistance Where PID=PPID) as AKeyName
					, (Select Type from MinDistance Where PID=PPID) as AType
					, (Select count(ID) from FavoriteUser Where POID=PPOID and user_id="'.$user_id.'" and status=1) as FVStatus
					, (Select Station from MinDistance Where PID=PPID) as AStation from Post,Project where Post.PID=Project.PID and Post.POID="'.$rowJob->POID.'"');
					$rowPost=$queryPost->row();
					$PID=$rowPost->PID;
					$PName_en=$rowPost->PName_en;
					$PName_en=str_replace(" ", "-", $PName_en);
					$PName_en=str_replace("@", "-", $PName_en);
					$PName_en=str_replace("'", "-", $PName_en);
					$PName_en=str_replace("(", "-", $PName_en);
					$PName_en=str_replace(")", "-", $PName_en);
					$PName_en=str_replace(":", "-", $PName_en);
					$PName_en=str_replace("&", "-and-", $PName_en);
					$ProjectName=$rowPost->ProjectName;
					$ProjectNameAnchor=str_replace(" ","-",$ProjectName);
					$ProjectNameAnchor=str_replace("(","",$ProjectNameAnchor);
					$ProjectNameAnchor=str_replace(")","",$ProjectNameAnchor);
					$ProjectNameAnchor=str_replace("@","แอด",$ProjectNameAnchor);
					$ProjectNameCenter=$rowPost->SName_th;
					$PropertyName=$this->getProperty($rowPost->TOProperty,'TOPName_th');
					$Advertising=$rowPost->TOAdvertising;
					$AdvertisingName=$this->getAdvertising($rowPost->TOAdvertising,'AName_th');
					if($rowPost->Developer==1){
						$AdvertisingName='ขายคอนโดใหม่';
					}else{
						$AdvertisingName.=$PropertyName;
					}
					if ($Advertising=='1' or $Advertising=='2'){
						$NamePath='sell';
					} else {
						$NamePath='rent';
					}
					$Type=$rowPost->AType;
					$useArea=$rowPost->useArea;
					$Price=$rowPost->Price;
					$PricePerSq=$Price/$rowPost->useArea;
					if ($Advertising=='5'){
						$PriceShow=number_format(($Price), 0, '', ',');
					} else {
						$PriceShow=number_format(($Price), 0, '', ',');
						//$PriceShow=number_format(($Price/1000000), 2, '.', '')."M";
					}
					$PricePerSqShow=number_format($PricePerSq, 0,'',',');
					$Bedroom=$rowPost->Bedroom;
					if($Bedroom=="99"){
						$Bedroom="S";
						$BedroomList=$Bedroom;
					}else{
						$Bedroom.=" นอน";
					}
					$Bathroom=$rowPost->Bathroom;
					$Bathroom.=" น้ำ";
					$Floor=$rowPost->Floor;
					$DateShow=$rowPost->ActiveDay;
					$ViewTel=$rowPost->CountViewTel;
					$ViewPost=$rowPost->CountView;
					$KeyName=$rowPost->AKeyName;
					$Distance=$rowPost->ADistance;
					$Distance=$Distance/1000;
					$Distance=number_format($Distance,1,'.',',');
					if($ProvinceSearch==1){
						$DistName='('.$KeyName.' '.$Distance.' กม.)';
					}else{
						$DistName='';
					}
					$Favourite=$rowPost->FVStatus;
					$queryPic2=$this->db->query('Select * from ImagePost Where POID="'.$POID.'" and AdImg=1 Order By field(type,"room","view","facilities"),Horizental DESC,Order_Sort ASC,ImgID ASC limit 1');
					if ($queryPic2->num_rows()>0){
						$rowPic2=$queryPic2->row();
						$file=$rowPic2->file;
						if ($rowPic2->Thumb==1){
							$checkJPG=strpos($file,'.jpg');
							if ($checkJPG!==false){
								$file=str_replace(".jpg","t.jpg",$file);
							}
							$checkPNG=strpos($file,'.png');
							if ($checkPNG!==false){
								$file=str_replace(".png","t.png",$file);
							}
							$checkJPG=strpos($file,'.JPG');
							if ($checkJPG!==false){
								$file=str_replace(".JPG","t.JPG",$file);
							}
							$checkPNG=strpos($file,'.PNG');
							if ($checkPNG!==false){
								$file=str_replace(".PNG","t.PNG",$file);
							}
						}
					}
					$Banner=array(
						"Picture"=>$file,
						"Link"=>$link,
						"PID"=>$PID,
						"POID"=>$POID,
						"Type"=>$Type,
						"ProjectName"=>$ProjectName,
						"ProjectNameCenter"=>$ProjectNameCenter,
						"ProjectNameAnchor"=>$ProjectNameAnchor,
						"PropertyName"=>$PropertyName,
						"AdvertisingName"=>$AdvertisingName,
						"Price"=>$Price,
						"PriceShow"=>$PriceShow,
						"PricePerSqShow"=>$PricePerSqShow,
						"Bedroom"=>$Bedroom,
						"Bathroom"=>$Bathroom,
						"useArea"=>$useArea,
						"Floor"=>$Floor,
						"DateShow"=>$DateShow,
						"ViewPost"=>$ViewPost,
						"ViewTel"=>$ViewTel,
						"DistName"=>$DistName,
						"PName_en"=>$PName_en,
						"NamePath"=>$NamePath,
						"Favourite"=>$Favourite,
						"BannerStatus"=>$BannerStatus,
						"AdTXT"=>$AdTXT
					);
					//Credit
					$checkAdmin=$this->backend->checkAdmin();
					if($viewtype=='searchmap' and $JobID<>0 and $JobUser<>$user_id and $checkAdmin<>1){
						$firstVisit=0;
						//$this->db->query('set time_zone="Asia/Bangkok"');
						$queryDateTime=$this->db->query('select now() as nowdatetime');
						$rowDateTime=$queryDateTime->row();
						$nowdatetime=$rowDateTime->nowdatetime;
						$ShowBannerTime=$this->session->userdata('ShowBannerTime');
						if($ShowBannerTime=='' or $ShowBannerTime=='null' or $ShowBannerTime==null){
							$ShowBannerTime=$nowdatetime;
							$this->session->set_userdata('ShowBannerTime',$nowdatetime);
							$firstVisit=1;
						}
						//$this->db->query('set time_zone="Asia/Bangkok"');
						$queryTimeDiff=$this->db->query('select TIMESTAMPDIFF(MINUTE,"'.$ShowBannerTime.'",now()) as timediff');
						$rowTimeDiff=$queryTimeDiff->row();
						$timediff=$rowTimeDiff->timediff;
						$queryJobDetail=$this->db->query('select id from cCreditJobDetail where JobID="'.$JobID.'" and operate_date=curdate()');
						if($queryJobDetail->num_rows()==0){
							//$this->db->query('set time_zone="Asia/Bangkok"');
							$this->db->query('insert into cCreditJobDetail set JobID="'.$JobID.'",count_view="1",credit_use="'.$credit_use.'",operate_date=curdate(),DateTime="'.$nowdatetime.'"');
						}else{
							if($timediff>=3 or $firstVisit==1){
								//$this->db->query('set time_zone="Asia/Bangkok"');
								$this->db->query('update cCreditJobDetail set count_view=count_view+1,credit_use=credit_use+"'.$credit_use.'",DateTime="'.$nowdatetime.'" where JobID="'.$JobID.'" and operate_date=curdate()');
							}
						}
						if($queryJobDetail->num_rows()==0 or $timediff>=3 or $firstVisit==1){
							//$this->db->query('set time_zone="Asia/Bangkok"');
							$this->db->query('update cCreditJob,cCreditSummary set cCreditJob.total_count_view=cCreditJob.total_count_view+1,cCreditJob.total_credit_use=cCreditJob.total_credit_use+"'.$credit_use.'",cCreditJob.DateTime="'.$nowdatetime.'",cCreditSummary.Credit=cCreditSummary.Credit-"'.$credit_use.'",cCreditSummary.last_update="'.$nowdatetime.'" where cCreditJob.JobID="'.$JobID.'" and cCreditJob.user_id=cCreditSummary.user_id');
							$this->session->set_userdata('ShowBannerTime',$nowdatetime);
						}
					}
				}else{
					$file=$rowJob->filepath;
					if ($rowJob->Thumb==1){
						$checkJPG=strpos($file,'.jpg');
						if ($checkJPG!==false){
							$file=str_replace(".jpg","t.jpg",$file);
						}
						$checkPNG=strpos($file,'.png');
						if ($checkPNG!==false){
							$file=str_replace(".png","t.png",$file);
						}
						$checkJPG=strpos($file,'.JPG');
						if ($checkJPG!==false){
							$file=str_replace(".JPG","t.JPG",$file);
						}
						$checkPNG=strpos($file,'.PNG');
						if ($checkPNG!==false){
							$file=str_replace(".PNG","t.PNG",$file);
						}
					}
					$Banner=array(
						"Picture"=>$file,
						"Link"=>$link,
						"POID"=>$POID,
						"AdTXT"=>''
					);
				}
				array_push($arrayBanner,$Banner);
			}
		}
		$this->session->set_userdata('watchedPOIDBanner',$watchedPOID);
		echo json_encode($arrayBanner);
	}
	
	function updateViewBanner($data){
		$date=date("Y-m-d H:i:s");
		$POID=$data['POID'];
		$Page=$data['Page'];
		$checkAdmin=$this->backend->checkAdmin();
		if ($this->tank_auth->is_logged_in()){
			$user_id=$this->session->userdata('user_id');
		} else {
			$user_id=$this->input->ip_address();
		}
		if($checkAdmin==0){
			//$query=$this->db->query('Select ID from LogViewBanner Where ViewByUserID="'.$user_id.'" and POID="'.$POID.'" and Page="'.$Page.'"');
			//if ($query->num_rows()==0){
				$this->db->query('Insert into LogViewBanner set ViewByUserID="'.$user_id.'" , POID="'.$POID.'", LastUpdate="'.$date.'", Page="'.$Page.'"');
			//}
		}
	}
	
	function checkRefPlaceType($data){
		$refPlace=$data['RefPlace'];
		$reftype='KeyName';
		$query=$this->db->query('Select PName_th,PName_en,ProvinceID from Project Where (PName_th="'.$refPlace.'" or PName_en="'.$refPlace.'" )');
		if($query->num_rows()>0){
			$reftype='Project';
		}
		return $reftype;
	}
	
	function updateViewBannerTel($POID){
		$result=0;
		if ($this->tank_auth->is_logged_in()) {
			$user_id=$this->session->userdata('user_id');
			$checkAdmin=$this->backend->checkAdmin();
			if($checkAdmin==0){
				$date=date("Y-m-d");
				$fulldate=date("Y-m-d H:i:s");
				$this->db->query('update LogViewBanner set ViewTelByUserID="'.$user_id.'" , LastUpdate="'.$fulldate.'" Where ID=(select max(ID) as last_id from LogViewBanner where POID="'.$POID.'" and ViewByUserID="'.$user_id.'" and date(LastUpdate)="'.$date.'")');
				$result=1;
			}
		}
		return $result;
	}
}