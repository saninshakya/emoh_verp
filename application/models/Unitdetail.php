<?php
class Unitdetail extends CI_Model {
 
    function __construct()
     {
         // Call the Model constructor
         parent::__construct();
     }

	function getUnitFromPOID($POID){
		$queryUnit=$this->db->query('Select *, DATEDIFF(CURDATE(), DateCreate) as DateShow from Post Where POID="'.$POID.'"');
		return $queryUnit;
	}

	function getProjectFromPOID($POID){
		$queryPID=$this->db->query('Select PID from Post Where POID="'.$POID.'"');
		$PID=$queryPID->row()->PID;
		if ($PID!=null && $PID!=0){
			$queryProject=$this->db->query('Select * from Project Where PID="'.$PID.'"');
			return $queryProject;
		} else {
			return null;
		}
	}

	function getAllPostFromPIDandTOAdvertising($PID,$TOAdvertising,$Active,$PName_th){
//		echo $Active;
//		if ($Active==0){
//			$queryAllPost=$this->db->query('Select *, DATEDIFF(CURDATE(), DateCreate) as DateShow from Post Where (Active="0" or Active="1") and PID="'.$PID.'" and ProjectName="'.$PName_th.'" and TOAdvertising="'.$TOAdvertising.'" order by Floor');
//			echo 'Select *, DATEDIFF(CURDATE(), DateCreate) as DateShow from Post Where (Active="0" or Active="1") and PID="'.$PID.'" and ProjectName="'.$PName_th.'" and TOAdvertising="'.$TOAdvertising.'" order by Floor';
//		} else {
			$queryAllPost=$this->db->query('Select *, DATEDIFF(CURDATE(), DateCreate) as DateShow from Post Where Active in("1","81","82") and PID="'.$PID.'" and TOAdvertising="'.$TOAdvertising.'" order by LPAD(lower(Floor), 10,0) ASC,Tower');
//		}
		return $queryAllPost;
	}
	
	function getAllPostFromPIDandTOAdvertising2($PID,$TOAdvertising,$Active,$PName_th){
		$queryAllPost=$this->db->query('Select *, DATEDIFF(CURDATE(), DateCreate) as DateShow from Post Where Active in("1","81","82") and PID="'.$PID.'" and TOAdvertising<>"'.$TOAdvertising.'" order by TOAdvertising,LPAD(lower(Floor), 10,0) ASC,Tower');
		return $queryAllPost;
	}

	function convertDirection($Direction){
		$query=$this->db->query('Select DNameEn from Direction Where DID="'.$Direction.'"');
		$row=$query->row();
		return $row->DNameEn;
	}

	function viewTel($POID){
		if (!$this->tank_auth->is_logged_in()) {
			//redirect('/auth/login/');
			$Telephone=-1;
		} else {
			$user_id=$this->session->userdata('user_id');
			$ThisDate=date("Y-m-d 00:00:00");
			$query=$this->db->query('select * from LogViewPost Where POID="'.$POID.'" and ViewTelByUserID="'.$user_id.'"');
			$checkAdmin=$this->backend->checkAdmin();
			if ($checkAdmin==1){
				$CheckHaveView=1;
				$canView=1;
			} else {
				if ($query->num_rows() == 0){
					$CheckHaveView=0;
				} else {
					$CheckHaveView=1;
					$canView=1;
				};
				if ($CheckHaveView==0){
					$query=$this->db->query('select * from LogViewPost Where ViewTelByUserID="'.$user_id.'" and LastUpdate>"'.$ThisDate.'"');
					if ($query->num_rows() > 1){//จำนวนเบอร์ที่ดู
						$query5=$this->db->query('select * from add_view_facebook Where user_id="'.$user_id.'"');
						if ($query5->num_rows()>0){//จำนวนเฟสบุคที่แชร์
							$row5=$query5->row();
							$view=$row5->view;
							if ($view>0){
								$canView=1;
								$newView=$view-0.5;//1 แชร์ ดูได้ 2 วิว
								$this->db->query('update add_view_facebook set view="'.$newView.'" where user_id="'.$user_id.'"');
							} else {
								$canView=0;
							}
						} else {
							$canView=0;
						};
					} else {
						$canView=1;
					}
				}
			}
			if ($canView==1){
				$query=$this->db->query('Select * from Post Where POID="'.$POID.'"');
				$row=$query->row();
				$Telephone=$row->Telephone1;
				if ($CheckHaveView==0){
					$date=date("Y-m-d");
					$fulldate=date("Y-m-d H:i:s");
					$this->db->query('update LogViewPost set ViewTelByUserID="'.$user_id.'" , LastUpdate="'.$fulldate.'" Where POID="'.$POID.'" and ViewByUserID="'.$user_id.'"');
					//$Telephone = 'update LogViewPost set ViewTelByUserID="'.$user_id.'" , LastUpdate="'.$date.'" Where POID="'.$POID.'" and ViewByUserID="'.$user_id.'"';
					$this->recordViewTel($POID);
					
					$Token=md5($POID." ".time());
					$this->db->query('insert into MsgToken set Token="'.$Token.'"');
					file_get_contents('http://bot.zmyhome.com/index.php/messenger/sendViewTel?POID='.$POID.'&Token='.$Token);
				};
			} else {
				$Telephone=0;
			}
		}
		return $Telephone;
	}
	
	function add_view_facebook($POID=''){
		$user_id=$this->session->userdata('user_id');
		$ThisDate=date("Y-m-d");
		$query=$this->db->query('select * from add_view_facebook Where user_id="'.$user_id.'"');
		if ($query->num_rows()>0){
			$row=$query->row();
			$view=$row->view;
			$last_update=$row->last_update;
			if (($last_update!=$ThisDate) && ($view<10)) {
				$newView=$view+1;
				$this->db->query('update add_view_facebook set view="'.$newView.'", last_update="'.$ThisDate.'" Where user_id="'.$user_id.'"');
			}
		} else {
			$this->db->query('insert into add_view_facebook set user_id="'.$user_id.'", view=1, last_update="'.$ThisDate.'"');
		}
		$queryDetail=$this->db->query('select * from add_view_facebook_detail where user_id="'.$user_id.'" and POID="'.$POID.'" and date(last_update)=curdate()');
		if ($queryDetail->num_rows()==0){
			$this->db->query('insert into add_view_facebook_detail set user_id="'.$user_id.'",POID="'.$POID.'"');
		}
	}
	function update_prentstatus($POID,$Value){
		$this->db->query('update Post set StatusPRent="'.$Value.'" Where POID="'.$POID.'"');
	}

	function update_pricepersq($POID,$Value){
		$this->db->query('update Post set PricePerSq="'.$Value.'" Where POID="'.$POID.'"');
	}

	function add_favorite($data){
		$POID=$data['POID'];
		$user_id=$data['user_id'];
		$query=$this->db->query('Select * from FavoriteUser Where POID="'.$POID.'" and user_id="'.$user_id.'"');
		if ($query->num_rows()==0){
			$datecreate=date("Y-m-d");
			$this->db->query('Insert into FavoriteUser set POID="'.$POID.'" ,user_id="'.$user_id.'", DateCreate=curdate()');
		}else{
			$row=$query->row();
			$this->db->query('update FavoriteUser set status="'.$data['favourite_status'].'" where ID="'.$row->ID.'"');
		}
	}

	function del_favorite($ID){
		$this->db->query('delete from FavoriteUser Where ID="'.$ID.'"'); 
	}
	
	function get_favourite($POID){
		$user_id=$this->session->userdata('user_id');
		$query=$this->db->query('Select * from FavoriteUser Where POID="'.$POID.'" and user_id="'.$user_id.'" and status=1');
		return $query;
	}

	function add_lastview($POID){
		$user_id=$this->session->userdata('user_id');
		$query=$this->db->query('Select ID from LastViewUser Where user_id="'.$user_id.'" Order By ID');
		if ($query->num_rows()==10){
			$i=1;
			foreach ($query->result() as $row){
				if ($i==1){
					$ID=$row->ID;
				}
				$i=$i+1;
			}
			$this->db->query('delete from LastViewUser Where ID="'.$id.'"');
		}
		$DateCreate=date("Y-m-d H:i:s");	
		$this->db->query('insert into LastViewUser set user_id="'.$user_id.'", POID="'.$POID.'", DateCreate="'.$DateCreate.'"');
	}
	
	function getUnitSpecFromPOID($POID){
		$querySpec=$this->db->query('Select b.* from PostCondoSpec a left join TOCondoSpec b on a.TOCSID=b.TOCSID and b.Active=1 Where a.POID="'.$POID.'" order by b.GCSID,b.TOCSID');
		return $querySpec;
	}
	
	function getNearestTrainFromPID($PID){
		$queryTrain=$this->db->query('Select KeyMarker.KeyName,KeyMarker.KeyName_en,DistMarker.Distance from DistMarker,KeyMarker Where DistMarker.Station=KeyMarker.KeyID and KeyMarker.Type in("BTS","MRT","BRT","ARL") and DistMarker.PID="'.$PID.'" order by Distance ASC limit 1');
		return $queryTrain;
	}
	
	function blocking_post($POID){
		$query=$this->db->query('Select Active, user_id from Post Where POID="'.$POID.'"');
		$row=$query->row();
		
		$Active=$row->Active;
		$post_user_id=$row->user_id;
		$user_id=$this->session->userdata('user_id');
		//Check Active for Blocking
		if ($Active==1 || $Active==81 || $Active==82){
			$Blocking=0;
		} else {
			$Blocking=1;
		}
		//Check Owner Post if Owner == User View Not Blocking
		if ($post_user_id==$user_id){
			$Blocking=0;
		}
		return $Blocking;
	}

	function CountViewListDate($POID,$Date1,$Date2){
		$queryLog=$this->db->query('Select Count(ID) as NumberView from LogViewPost Where POID="'.$POID.'" and ViewTelByUserID is not null and LastUpdate<="'.$Date2.'" and LastUpdate>"'.$Date1.'"');
		if ($queryLog->num_rows() > 0){
			$rowLog=$queryLog->row();
			$result=$rowLog->NumberView;
		} else {
			$result=0;
		}
		return $result;
	}

	function TrackPricePOID($POID){
		$TrackPrice=array();
		
		$query=$this->db->query('Select *,DATEDIFF(CURDATE(), Date) as DateShow from TrackPricePost Where POID="'.$POID.'" Order By Date DESC Limit 2');
		$CheckRow=$query->num_rows();
		array_push($TrackPrice,$CheckRow);
		$i=1;
		foreach ($query->result() as $row){
			$PricePerSq=floor($row->PricePerSq);
			$UD="n/a";
			$UpPrice=$row->UpPrice;
			if ($UpPrice==1){
				$UD="+";
			}
			$DownPrice=$row->DownPrice;
			if ($DownPrice==1){
				$UD="-";
			}
			$Date=$row->Date;
			if ($CheckRow!=1){
				$id=$row->id;
				$query4=$this->db->query('Select Date from TrackPricePost Where POID="'.$POID.'" and id<"'.$id.'" order by id DESC Limit 1');
				$row4=$query4->row();
				if ($query4->num_rows()!=0){
					$Date2=$row->Date;
					$Date1=$row4->Date;
					if ($i==1){
						$query2=$this->db->query('Select DATEDIFF(CURDATE(), "'.$Date2.'") as DateShow');
					} else {
						$query2=$this->db->query('Select DATEDIFF("'.$OldDate.'", "'.$Date2.'") as DateShow');	
					}
					$rowDate=$query2->row();
					$DateShow=$rowDate->DateShow;
				} else {
					$query2=$this->db->query('Select DATEDIFF("'.$OldDate.'", DateCreate) as DateShow  from Post Where POID="'.$POID.'"');
					$rowDate=$query2->row();
					$DateShow=$rowDate->DateShow;
				}					
			} else {
				$query2=$this->db->query('Select DATEDIFF(CURDATE(), DateCreate) as DateShow  from Post Where POID="'.$POID.'"');				
				$rowDate=$query2->row();
				$DateShow=$rowDate->DateShow;
			}
			$OldDate=$Date;
			if ($UpPrice==1 or $DownPrice==1){
				$id=$row->id;
				$query3=$this->db->query('Select Date from TrackPricePost Where POID="'.$POID.'" and id<"'.$id.'" order by id DESC Limit 1');
				$rowDate=$query3->row();
				$Date2=$row->Date;
				$Date1=$rowDate->Date;
			} else {
				$Date1="0000-00-00";
				$Date2=date("Y-m-d",mktime(0, 0, 0, date("m")  , date("d"), date("Y")));
			}
			$ViewTel=$this->CountViewListDate($POID,$Date1,$Date2);
			array_push($TrackPrice,$PricePerSq,$UD,$DateShow,$ViewTel);
			$i++;							
		}
		return $TrackPrice;
	}
	
	function getImageBanner($POID,$Advertising){
		$DistanceBanner=5000;
		$BannerStatus=1;
		$date_check=3;
		$credit_use=1;
		$numProjectFromSearch=0;
		$viewtype="unitdetail";
		if($this->tank_auth->is_logged_in()){
			$user_id=$this->session->userdata('user_id');
		}else{
			$user_id=$this->input->ip_address();
		}
		//$queryPic=$this->db->query('Select id,banner_id,filepath,Thumb,if(description is not null,description,"") as filelink,POID from ImageBanner Where banner_id="0" and type="'.$type.'" and status="1" order by sort_no ASC');
		//$this->db->query('set time_zone="Asia/Bangkok"');
		$queryPic=$this->db->query('select cCreditJob.JobID,cCreditJob.POID,cCreditJob.user_id,cCreditJob.POID as sPOID,if(end_date<now(),1,0) as expire_check from cCreditJob where datediff(now(),cCreditJob.start_date)<="'.$date_check.'" and cCreditJob.Active=1');
		foreach ($queryPic->result() as $rowPic){
			if($rowPic->expire_check==1){
				//update วันเกินกำหนด
				//$this->db->query('set time_zone="Asia/Bangkok"');
				$this->db->query('update cCreditJob set Active=3,end_job=now() where JobID="'.$rowPic->JobID.'"');
			}
			$queryCredit=$this->db->query('select Credit from cCreditSummary where user_id="'.$rowPic->user_id.'"');
			$rowCredit=$queryCredit->row();
			if($rowCredit->Credit==0){
				//update credit หมด
				//$this->db->query('set time_zone="Asia/Bangkok"');
				$this->db->query('update cCreditJob set Active=4,end_job=now() where JobID="'.$rowPic->JobID.'"');
			}
		}
		$qProvince="";
		$qDistance="";
		$queryProvince=$this->db->query('select Project.PID,Project.ProvinceID,Province.DistanceSearch as ProvinceSearch from Post,Project,Province where Post.PID=Project.PID and Project.ProvinceID=Province.id and Post.POID="'.$POID.'"');//search province check
		$rowProvince=$queryProvince->row();
		$ProvinceSearch=$rowProvince->ProvinceSearch;
		$ProvinceID=$rowProvince->ProvinceID;
		$PID=$rowProvince->PID;
		$qSearchID=" and DistMarker.PID='".$PID."'";
		$sqlProjectFromSearch=$this->db->query('select JobID from cCreditJob,Post where cCreditJob.POID=Post.POID and Post.PID="'.$PID.'" and cCreditJob.Active=1 and now() between cCreditJob.start_date and cCreditJob.end_date');
		$numProjectFromSearch=$sqlProjectFromSearch->num_rows();
		if($ProvinceSearch==0){
			$qProvince=" and Project.ProvinceID='".$ProvinceID."'";
		}else{
			$qDistance=" and DistMarker.Distance<='".$DistanceBanner."'";
		}
		$qSearch=" and Project.ProvinceID='".$ProvinceID."'";
		if($Advertising==1 or $Advertising==2){
			$Advertising2="1','2";
		}else{
			$Advertising2=$Advertising;
		}
		$qAdvertising=" and Post.TOAdvertising in('".$Advertising."')";
		$qAdvertising2=" and Post.TOAdvertising in('".$Advertising2."')";
		$qOrder=' order by Distance limit 1';
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
			$queryJob=$this->db->query('select * from (select *,if(credit_use is null,0,credit_use) as credit_use_pday from (select cCreditJob.JobID,cCreditJob.JobID as sJobID,cCreditJob.user_id,cCreditJob.credit_limit_pday,cCreditJob.AdTXT,ImageBanner.id,banner_id,filepath,Thumb,if(description is not null,description,"") as filelink,ImageBanner.POID,sort_no,Post.TOAdvertising,0 as BannerDefault,(select credit_use from cCreditJobDetail where JobID=sJobID and operate_date=curdate()) as credit_use from cCreditSummary,cCreditJob,ImageBanner,Post where cCreditSummary.user_id=cCreditJob.user_id and cCreditJob.POID=ImageBanner.POID and ImageBanner.POID=Post.POID and now() between cCreditJob.start_date and cCreditJob.end_date and cCreditJob.Active="1" and cCreditSummary.Credit>0 and ImageBanner.banner_id="0" and ImageBanner.type="'.$viewtype.'" and ImageBanner.status="1" and Post.Active=1 and Post.DateExpire>=curdate() and Post.PID="'.$PID.'" and cCreditJob.POID<>"'.$POID.'"'.$qAdvertising2.') a) b where credit_limit_pday>credit_use_pday');
			$numJob=$queryJob->num_rows();
		}
		if($numJob==0){
			//$this->db->query('set time_zone="Asia/Bangkok"');
			$sqlTxtDefault='select cCreditJob.JobID,cCreditJob.JobID as sJobID,cCreditJob.user_id,cCreditJob.credit_limit_pday,cCreditJob.AdTXT,ImageBanner.id,banner_id,filepath,Thumb,if(description is not null,description,"") as filelink,ImageBanner.POID,sort_no,Post.TOAdvertising,DistMarker.Distance,0 as BannerDefault,(select credit_use from cCreditJobDetail where JobID=sJobID and operate_date=curdate()) as credit_use from cCreditSummary,cCreditJob,ImageBanner,Post,Project,DistMarker where cCreditSummary.user_id=cCreditJob.user_id and cCreditJob.POID=ImageBanner.POID and ImageBanner.POID=Post.POID and Post.PID=Project.PID and Project.PID=DistMarker.Station and DistMarker.Type="Project" and now() between cCreditJob.start_date and cCreditJob.end_date and cCreditJob.Active="1" and cCreditSummary.Credit>0 and ImageBanner.banner_id="0" and ImageBanner.type="'.$viewtype.'" and ImageBanner.status="1" and Post.Active=1 and Post.DateExpire>=curdate() and cCreditJob.POID<>"'.$POID.'" '.$qAdvertising2.$qSearchID.$qProvince.$qDistance;
			$sqlTxtDefault='select * from (select *,if(credit_use is null,0,credit_use) as credit_use_pday from ('.$sqlTxtDefault.') a) b where credit_limit_pday>credit_use_pday';
			$sqlTxt=$sqlTxtDefault.$qwatchedPOIDBanner_in.$qOrder;
			if($user_id=='889'){
				//$sqlTxt='s'.$sqlTxt;
			}
			$queryJob=$this->db->query($sqlTxt);
			if($qwatchedPOIDBanner_in<>''){
				if($queryJob->num_rows()==0){
					$watchedPOID='';
					$sqlTxt=$sqlTxtDefault.$qOrder;
					$queryJob=$this->db->query($sqlTxt);
				}
			}
			if($queryJob->num_rows()==0){
				$queryJob=$this->db->query('select ImageBanner.id,banner_id,filepath,Thumb,if(description is not null,description,"") as filelink,ImageBanner.POID,sort_no,0,0,1 as BannerDefault,Post.TOAdvertising from ImageBanner,Post,Project,DistMarker Where ImageBanner.POID=Post.POID and Post.PID=Project.PID and Project.PID=DistMarker.Station '.$qSearchID.' and DistMarker.Type="Project" and ImageBanner.POID in(SELECT ImageBanner.POID FROM ImageBanner,Post,Project WHERE ImageBanner.POID=Post.POID and Post.PID=Project.PID and Post.Active=1 and Post.DateExpire>=curdate() and ImageBanner.POID<>"'.$POID.'" and ImageBanner.banner_id=1 and ImageBanner.type="default" and ImageBanner.status=1 '.$qAdvertising2.$qSearch.') '.$qOrder);
				$BannerStatus=0;
			}
		}
		$arrayBanner=array();
		if ($queryJob->num_rows()>0){
			foreach ($queryJob->result() as $rowJob){
				if($rowJob->filelink<>'' or $rowJob->filelink<>'null'){
					$link=$rowJob->filelink;
				}else{
					$link="";
				}
				$JobID=$rowJob->JobID;
				$JobUser=$rowJob->user_id;
				$POID=$rowJob->POID;
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
				if($POID!=0){
					$watchedPOID.=$rowJob->POID.',';
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
					$PropertyName=$this->search->getProperty($rowPost->TOProperty,'TOPName_th');
					$TOAdvertising=$rowPost->TOAdvertising;
					$AdvertisingName=$this->search->getAdvertising($rowPost->TOAdvertising,'AName_th');
					if($rowPost->Developer==1){
						$AdvertisingName='ขายคอนโดใหม่';
					}else{
						$AdvertisingName.=$PropertyName;
					}
					if ($TOAdvertising=='1' or $TOAdvertising=='2'){
						$NamePath='sell';
					} else {
						$NamePath='rent';
					}
					$Type=$rowPost->AType;
					$useArea=$rowPost->useArea;
					$Price=$rowPost->Price;
					$PricePerSq=$Price/$rowPost->useArea;
					if ($TOAdvertising=='5'){
						$PriceShow=number_format(($Price), 0, '', ',');
					} else {
						//$PriceShow=number_format(($Price/1000000), 2, '.', '')."M";
						$PriceShow=number_format(($Price), 0, '', ',');
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
					$DistName=$KeyName." ".$Distance." กม.";
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
					if($JobID<>0 and $JobUser<>$user_id and $checkAdmin<>1){
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
		//$this->session->set_userdata('watchedPOIDBanner',$watchedPOID);
		return $arrayBanner;
	}
	
	function checkViewTel($POID){
		$user_id=$this->session->userdata('user_id');
		$query=$this->db->query('select * from LogViewPost Where POID="'.$POID.'" and ViewTelByUserID="'.$user_id.'"');
		$countView=$query->num_rows();
		return $countView;
	}
	
	function recordViewPost($POID){
		$checkRobot=$this->usermenu->check_robot();
		if ($checkRobot!=1){
			$date=date('Y-m-d H:i:s');
			if ($this->tank_auth->is_logged_in()){
				$user_id=$this->session->userdata('user_id');
			} else {
				$user_id=$this->input->ip_address();
			}
			$checkAdmin=$this->backend->checkAdmin();
			if ($checkAdmin==0){
				$this->db->query('Insert into LogViewPostDaily set ViewByUserID="'.$user_id.'" , POID="'.$POID.'", LastUpdate="'.$date.'"');
			}
		}
	}
	
	function recordViewTel($POID){
		$user_id=$this->session->userdata('user_id');
		$type=1;//normal
		$date=date('Y-m-d');
		$fulldate=date('Y-m-d H:i:s');
		$checkAdmin=$this->backend->checkAdmin();
		if ($checkAdmin==0){
			//กรณีที่คลิ๊กดู Ad ในวันนั้นให้ถือว่าดูเบอร์ผ่าน Ad
			$queryViewAd=$this->db->query('select count(ID) as count_view from LogViewBanner where POID="'.$POID.'" and ViewByUserID="'.$user_id.'" and date(LastUpdate)="'.$date.'"');
			$rowViewAd=$queryViewAd->row();
			if($rowViewAd->count_view>0){
				$type=2;//banner
			}
			$query=$this->db->query('select id from LogViewTel Where POID="'.$POID.'" and ViewByUserID="'.$user_id.'" and type="'.$type.'" and date(LastUpdate)="'.$date.'"');
			if($query->num_rows()==0){
				$this->db->query('insert into LogViewTel set POID="'.$POID.'",ViewByUserID="'.$user_id.'",type="'.$type.'",LastUpdate="'.$fulldate.'"');
			}
		}
	}
	
	function checkQuestionnair($POID){
		$user_id=$this->session->userdata('user_id');
		$checkAdmin=$this->backend->checkAdmin();
		if ($checkAdmin==0){
			$qcheck=0;
			$query=$this->db->query('select id,if(datediff(curdate(),operate_date)>=90,1,0) as datecheck from users_questionnair where user_id="'.$user_id.'" and POID="'.$POID.'"');
			if($query->num_rows()>0){
				$row=$query->row();
				if($row->datecheck==0){
					$qcheck=1;
				}
			}
		}else{
			$qcheck=1;
		}
		return $qcheck;
	}
	
	function add_Questionnair($data){
		$user_id=$this->session->userdata('user_id');
		$this->db->query('insert into users_questionnair set user_id="'.$user_id.'",POID="'.$data['POID'].'",buyer_type="'.$data['buyer_type'].'",buy_length="'.$data['buy_length'].'",operate_date=curdate()');
	}
}