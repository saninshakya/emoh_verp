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
			$queryAllPost=$this->db->query('Select *, DATEDIFF(CURDATE(), DateCreate) as DateShow from Post Where Active="1" and PID="'.$PID.'" and ProjectName="'.$PName_th.'" and TOAdvertising="'.$TOAdvertising.'" order by Floor');
//		}
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
					if ($query->num_rows() > 0){
						$query5=$this->db->query('select * from add_view_facebook Where user_id="'.$user_id.'"');
						if ($query5->num_rows()>0){
							$row5=$query5->row();
							$view=$row5->view;
							if ($view>0){
								$canView=1;
								$newView=$view-1;
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
					$date=date("Y-m-d H:i:s");
					$this->db->query('update LogViewPost set ViewTelByUserID="'.$user_id.'" , LastUpdate="'.$date.'" Where POID="'.$POID.'" and ViewByUserID="'.$user_id.'"');
					//$Telephone = 'update LogViewPost set ViewTelByUserID="'.$user_id.'" , LastUpdate="'.$date.'" Where POID="'.$POID.'" and ViewByUserID="'.$user_id.'"';
				};
			} else {
				$Telephone=0;
			}
		}
		return $Telephone;
	}
	
	function add_view_facebook(){
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
		if ($Active==1){
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
					echo 'Select DATEDIFF("'.$OldDate.'", DateCreate) as DateShow  from Post Where POID="'.$POID.'"';
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
}