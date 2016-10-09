<?php
//CreditBanlance() check credit banlance from seesion users_id
//AddCredit($PType) add or cut out credit from sessopm users_id => This function has keep log

//Job Status
//Active=0 ไม่เคยลงโฆษณา
//Active=1 กำลังลงอยู่
//Active=2 พักการลง
//Active=3 ลงจนครบกำหนด
//Active=4 ลงอยู่แต่เงินหมดแล้ว
//Active=5 ผิดกฎ
//Active=6 user ยกเลิกโปรโมท
//Active=7 แก้ไข รอตรวจสอบ

class Credit extends CI_Model {

    function __construct()
	{
         // Call the Model constructor
         parent::__construct();
	}
  function var_error_log( $object=null ){
      ob_start();                    // start buffer capture
      var_dump( $object );           // dump the values
      $contents = ob_get_contents(); // put the buffer into a variable
      ob_end_clean();                // end capture
      error_log( $contents );        // log contents of the result of var_dump( $object )
  }

  function dateMysql(){       //Function create time stamp in all credit table
    return date("Y-m-d H:i:s");
  }

  function CreditBanlance(){
    $user_id=$this->session->userdata('user_id');
    $query=$this->db->query('select Credit from cCreditSummary where user_id=?',array($user_id));
    if ($query->num_rows()==0){
      $Credit=0;
      $this->db->query('insert into cCreditSummary set user_id=?, Credit=0, last_update=?',array($user_id,$this->dateMysql()));
    } else {
      $Credit=$query->row()->Credit;
    }
    return $Credit;
  }

  function AddCredit($user_id=NULL,$JobID=NULL,$PType,$PromoCode,$PromoPoint){
    if ($user_id==NULL){
      $user_id=$this->session->userdata('user_id');
    };
    $query=$this->db->query('select * from cCreditPayment where PType=? and DateEnd>=?'
    ,array($PType,$this->dateMysql()));
    //echo $this->db->last_query();
    if ($query->num_rows()==1){
        $row=$query->row();
        $BeforeCreditSummary=$this->CreditBanlance();
		if($PromoPoint<>''){
			$Credit=$PromoPoint;
		}else{
			$Credit=$row->Credit;
		}
		$AfterCreditSummary=$BeforeCreditSummary+$Credit;
        if ($AfterCreditSummary<0){
          $TxtReturn=0;
        } else {
          $this->db->query('update cCreditSummary set Credit=?, last_update=? where user_id=?'
          ,array($AfterCreditSummary,$this->dateMysql(),$user_id));
          $this->db->query('insert into cCreditTransection set JobID=?, user_id=?, Name=?, Credit=?, BeforeCreditSummary=?, AfterCreditSummary=?, DateTime=?'
          ,array($JobID,$user_id,$row->PaymentName,$Credit,$BeforeCreditSummary,$AfterCreditSummary,$this->dateMysql()));
          $TxtReturn=1;
        }
    }
    return $TxtReturn;
  }

  function paymentcoin($PromotionCode=0){
    $query=$this->db->query('select * from cCreditPayment Where Active=1 and PType>100 and PType<199 and PromotionCode="'.$PromotionCode.'" and now() between DateStart and DateEnd order by PType');
    return $query;
  }

  function OmiseToken($type){
    if ($type=="public"){
        $query=$this->db->query('Select token from cOmiseToken Where public=1 and enable=1');
    };
    if ($type=="secret"){
        $query=$this->db->query('Select token from cOmiseToken Where public=0 and enable=1');
    };
    $row=$query->row();
    return $row->token;
  }

  function ListPost($POID){
    $query=$this->db->query('Select * from Post where POID="'.$POID.'"');
    return $query;
  }

  function checkBoostPost($POID){
    $query=$this->db->query('select * from cCreditJob Where POID="'.$POID.'"');
    $checkRow=$query->num_rows();
    if ($checkRow==0){
      $txt=0;
    } else {
      $txt=1;
    }
    return $txt;
  }

  function StatView($POID){
    $checkAdmin=$this->backend->checkAdmin();
    if($checkAdmin==1){
      $user_id=$this->user_idFromPOID($POID);
    } else {
      $user_id=$this->session->userdata('user_id');
    };
//	  $user_id=$this->session->userdata('user_id');
    $query=$this->db->query('Select sum(total_count_view) as Total1 from cCreditJob where POID="'.$POID.'" and user_id="'.$user_id.'" and Active<>1');
    $Total1=$query->row()->Total1;
    $query=$this->db->query('Select JobID from cCreditJob Where POID="'.$POID.'" and user_id="'.$user_id.'" and Active=1 limit 1');
    $checkRow=$query->num_rows();
    if ($checkRow!=0){
      $JobID=$query->row()->JobID;
      $query=$this->db->query('Select count_view from cCreditJobDetail Where JobID="'.$JobID.'"');
      $Total2=$query->row()->count_view;
    } else {
      $Total2=0;
    }
    $Total=$Total1+$Total2;
    return $Total;
  }

  function StartStat($POID){
    $query=$this->db->query('select DATE_FORMAT(boost_date,"%d/%m/%Y") as AA from cCreditJob where POID="'.$POID.'" limit 1');
    $dateShow=$query->row()->AA;
    return $dateShow;
  }

  function StatClickView($POID){
    $checkAdmin=$this->backend->checkAdmin();
    if($checkAdmin==1){
      $user_id=$this->user_idFromPOID($POID);
    } else {
      $user_id=$this->session->userdata('user_id');
    };
	  //$user_id=$this->session->userdata('user_id');
    $query=$this->db->query('select boost_date from cCreditJob where POID="'.$POID.'" and user_id="'.$user_id.'" limit 1');
    $dateShow=$query->row()->boost_date;
    $query=$this->db->query('Select count(ID) as AA from LogViewBanner Where POID="'.$POID.'" and LastUpdate>="'.$dateShow.'"');
    return $query->row()->AA;
  }

  function StatClickTel($POID){
    $checkAdmin=$this->backend->checkAdmin();
    if($checkAdmin==1){
      $user_id=$this->user_idFromPOID($POID);
    } else {
      $user_id=$this->session->userdata('user_id');
    };
	  //$user_id=$this->session->userdata('user_id');
    $query=$this->db->query('select boost_date from cCreditJob where POID="'.$POID.'" and user_id="'.$user_id.'" limit 1');
    $dateShow=$query->row()->boost_date;
    $query=$this->db->query('Select count(ID) as AA from LogViewTel Where POID="'.$POID.'" and LastUpdate>="'.$dateShow.'" and ViewByUserID is not null');
    return $query->row()->AA;
  }

  function statCountViewMonth($PID){
    $query=$this->db->query('Select View from CountViewPIDMonth Where PID="'.$PID.'" and Month="'.date("m").'" and Year="'.date("Y").'"');
    return $query->row()->View;
  }

	function AddCreditJob($POID,$credit_limit_pday,$end_date,$AdTXT,$length_date){
		$date=date("Y-m-d H:i:s",mktime(date("H"), date("i"), date("s"), date("m")  , date("d"), date("Y")));
		$checkAdmin=$this->backend->checkAdmin();
		if($checkAdmin==1){
			$user_id=$this->user_idFromPOID($POID);
		}else{
			$user_id=$this->session->userdata('user_id');
		}
		$queryCheck=$this->db->query('select max(JobID) as JobID from cCreditJob where POID="'.$POID.'" and user_id="'.$user_id.'" and Active not in(0,3)');
		if($queryCheck->num_rows()>0){
			$rowCheck=$queryCheck->row();
			//$this->db->query('set time_zone="Asia/Bangkok"');
			$queryCheck=$this->db->query('update cCreditJob set Active=3,end_job=now() where JobID="'.$rowCheck->JobID.'"');
			//$this->db->query('set time_zone="Asia/Bangkok"');
			$this->db->query('insert into cCreditJobAction set JobID="'.$rowCheck->JobID.'",ActionID=5,DateTime=now()');
		}
		$this->db->query('insert into cCreditJob set length_date=datediff("'.$end_date.'","'.$date.'"), start_date="'.$date.'", POID="'.$POID.'", user_id="'.$user_id.'", credit_limit_pday="'.$credit_limit_pday.'", Active=1, boost_date="'.$date.'", end_date="'.$end_date.'", DateTime="'.$date.'", AdTXT="'.$AdTXT.'"');
		$NewJobID=$this->db->insert_id();
		//$this->db->query('set time_zone="Asia/Bangkok"');
		$this->db->query('insert into cCreditJobAction set JobID="'.$NewJobID.'",ActionID=1,DateTime=now()');

		$queryPic=$this->db->query('select * from ImageBanner where POID="'.$POID.'" and type in("searchmap","searchmapunit","unitdetail") and status=1 order by type');
		if($queryPic->num_rows()==0){
			$queryPic2=$this->db->query('insert into ImageBanner(type,description,POID,sort_no,status) values
			("searchmap","https://zmyhome.com/zhome/unitDetail2/'.$POID.'",'.$POID.',1,1),
			("searchmapunit","https://zmyhome.com/zhome/unitDetail2/'.$POID.'",'.$POID.',1,1),
			("unitdetail","https://zmyhome.com/zhome/unitDetail2/'.$POID.'",'.$POID.',1,1)');
		}else{
			$type_check1=0;
			$type_check2=0;
			$type_check3=0;
			foreach ($queryPic->result() as $rowPic){
				if($rowPic->type=='searchmap'){
					$type_check1=1;
				}else if($rowPic->type=='searchmapunit'){
					$type_check2=1;
				}else if($rowPic->type=='unitdetail'){
					$type_check3=1;
				}
			}
			if($type_check1==0){
				$this->db->query('insert into ImageBanner(type,description,POID,sort_no,status) values
				("searchmap","https://zmyhome.com/zhome/unitDetail2/'.$POID.'",'.$POID.',1,1)');
			}
			if($type_check2==0){
				$this->db->query('insert into ImageBanner(type,description,POID,sort_no,status) values
				("searchmapunit","https://zmyhome.com/zhome/unitDetail2/'.$POID.'",'.$POID.',1,1)');
			}
			if($type_check3==0){
				$this->db->query('insert into ImageBanner(type,description,POID,sort_no,status) values
				("unitdetail","https://zmyhome.com/zhome/unitDetail2/'.$POID.'",'.$POID.',1,1)');
			}
		}
	}

	function CheckStatusBoostPost($POID){
		//Active=0 ไม่เคยลงโฆษณา
		//Active=1 กำลังลงอยู่
		//Active=2 พักการลง
		//Active=3 ลงจนครบกำหนด
		//Active=4 ลงอยู่แต่เงินหมดแล้ว
		//Active=5 ผิดกฎ
		$checkAdmin=$this->backend->checkAdmin();
		if($checkAdmin==1){
			$user_id=$this->user_idFromPOID($POID);
		}else{
			$user_id=$this->session->userdata('user_id');
		}
		$query=$this->db->query('Select Active from cCreditJob where POID="'.$POID.'" and user_id="'.$user_id.'" order by JobID Desc Limit 1');
		$checkRow=$query->num_rows();
		if ($checkRow==0){
		  $TXT=0;
		} else {
		  $TXT=$query->row()->Active;
		}
		return $TXT;
	}

	function checkPromoCode($PromoCode){
		$user_id=$this->session->userdata('user_id');
		$query=$this->db->query('select *,if(curdate()>=start_date,1,0) as start_check,if(curdate()>end_date,1,0) as expire_check from cCreditPromotion where PromoCode="'.$PromoCode.'" and Active=1');
		$arrayPromotion=array();
		if($query->num_rows()>0){
			$row=$query->row();
			$date_array=explode("-",$row->start_date);
			$start_date_show=$date_array[2].'/'.$date_array[1].'/'.($date_array[0]+543);
			$checkCode=1;
			if($row->start_check<>0 and $row->expire_check<>1){
				if($checkCode==1 and $row->user_type<>3){
					if($row->user_type==1){//First Time Payment
						$queryUser=$this->db->query('select id from cCreditPromotionDetail where user_id="'.$user_id.'"');
						if($queryUser->num_rows()>0){
							$checkCode=4;//Already Use
						}
					}else if($row->user_type==2){//Limit User
						$queryPromo=$this->db->query('select id from cCreditPromotionDetail where promo_id="'.$row->id.'"');
						$countPromo=$queryPromo->num_rows();
						if($countPromo>$row->user_quantity){
							$checkCode=2;//empty quantity
						}
					}
				}
				if($checkCode==1 and $row->reuse<>2){
					$queryUse=$this->db->query('select id from cCreditPromotionDetail where promo_id="'.$row->id.'" and user_id="'.$user_id.'"');
					$countUse=$queryUse->num_rows();
					if($row->reuse==1){
						if($countUse>0){
							$checkCode=4;//Already Use
						}
					}else if($row->reuse==3){
						if($countUse>$row->reuse_quantity){
							$checkCode=2;//empty quantity
						}
					}
				}
			}
			if($row->start_check==0){$checkCode=0;}//not start
			if($row->expire_check==1){$checkCode=3;}//expire date
			$Promotion=array(
				"checkCode"=>$checkCode,
				"promotion_id"=>$row->id,
				"promotion_code"=>$row->PromoCode,
				"promotion_type"=>$row->PromoType,
				"quantity"=>$row->user_quantity,
				"value"=>$row->value,
				"start_date_show"=>$start_date_show,
			);
			array_push($arrayPromotion,$Promotion);
		}
		echo json_encode($arrayPromotion);
	}

	function addPromotionCredit($PromoCode,$Credit){
		$user_id=$this->session->userdata('user_id');
		$queryCheck=$this->db->query('select id from cCreditSummary where user_id="'.$user_id.'"');
		if($queryCheck->num_rows()>0){
			$this->db->query('update cCreditSummary set Credit=Credit+"'.$Credit.'",last_update=now() where user_id="'.$user_id.'"');
		}else{
			$this->db->query('insert into cCreditSummary(user_id,Credit,last_update) values("'.$user_id.'","'.$Credit.'",now())');
		}
		$this->db->query('insert into cCoinTransaction set user_id="'.$user_id.'",PromotionCode="'.$PromoCode.'",Coin="'.$Credit.'",DateTime=now(),TotalListing=(select count(POID) from Post where Active=1 and user_id="'.$user_id.'")');
		$queryPromo=$this->db->query('select * from cCreditPromotion where PromoCode="'.$PromoCode.'"');
		$rowPromo=$queryPromo->row();
		$this->db->query('insert into cCreditPromotionDetail(user_id,promo_id,DateTime) values("'.$user_id.'",(select id from cCreditPromotion where PromoCode="'.$PromoCode.'"),now())');
		return 1;
	}

	function usePromotion($PromoCode){//for Omise
		$user_id=$this->session->userdata('user_id');
		$queryPromo=$this->db->query('select * from cCreditPromotion where PromoCode="'.$PromoCode.'"');
		$rowPromo=$queryPromo->row();
		$this->db->query('insert into cCreditPromotionDetail(user_id,promo_id) values("'.$user_id.'",(select id from cCreditPromotion where PromoCode="'.$PromoCode.'"))');
		return 1;
	}

	function getBoostStat($POID){
		$checkAdmin=$this->backend->checkAdmin();
		if($checkAdmin==1){
		  $user_id=$this->user_idFromPOID($POID);
		} else {
		  $user_id=$this->session->userdata('user_id');
		}
		//$user_id=$this->session->userdata('user_id');
		$query=$this->db->query('select cCreditJob.*,(select sum(count_view) from cCreditJobDetail where cCreditJobDetail.JobID in(select JobID from cCreditJob where POID="'.$POID.'" and user_id="'.$user_id.'")) as total_count_view,(select if(count(*)>0,avg(count_view),0) from cCreditJobDetail where cCreditJobDetail.JobID in(select JobID from cCreditJob where POID="'.$POID.'" and user_id="'.$user_id.'")) as avg_credit_pday from cCreditJob where cCreditJob.POID="'.$POID.'" and user_id="'.$user_id.'" and cCreditJob.Active!=0 order by JobID DESC limit 1');
		return $query;
	}

	function controlBoostPost($Active,$POID){
		$checkAdmin=$this->backend->checkAdmin();
		if($checkAdmin==1){
			$user_id=$this->user_idFromPOID($POID);
		}else{
			$user_id=$this->session->userdata('user_id');
		}
		if($Active==1){
			$qActive=' and Active=2';
		}else if($Active==2){
			$qActive=' and Active=1';
		}
		//$this->db->query('set time_zone="Asia/Bangkok"');
		$this->db->query('update cCreditJob set Active="'.$Active.'" where POID="'.$POID.'" and user_id="'.$user_id.'" and now() between start_date and end_date'.$qActive);
		return 1;
	}

	function addlogbutton($user_id,$POID,$Type_Button){
		$checkAdmin=$this->backend->checkAdmin();
		if($checkAdmin==1){
			$user_id=$this->user_idFromPOID($POID);
		}
		$this->db->query('insert into LogClickBoostPost set user_id="'.$user_id.'", POID="'.$POID.'", Type_Button="'.$Type_Button.'"');
	}

  function checkKeyLoad($key_load,$PromoCode='',$PromoPoint=''){
    $query=$this->db->query('select id,user_id,pType,date(DateTime) as DateTime from cTempPayment where key_load="'.$key_load.'" and Active<>0');
    if($query->num_rows()>0){
      $row=$query->row();
      $this->AddCredit($row->user_id,NULL,$row->pType,$PromoCode,$PromoPoint);
      $this->db->query('update cTempPayment set Active=0 where key_load="'.$key_load.'"');
      //Add Code into table cCoinTransaction;
      $DateTime=$this->dateMysql();
      $Year=date("y");
      $Month=date("m");
      $query2=$this->db->query('Select Max(RunningNumber) as MRN from cCoinTransaction Where Year="'.$Year.'" and Month="'.$Month.'"');
      if ($query2->num_rows()==0){
        $MRN=0;
      } else {
        $MRN=$query2->row()->MRN;
      }
      $RN=$MRN+1;
      $RunningNumber=$RN;
      if ($RN<10){
        $RN="000".$RN;
      } else {
        if ($RN<100){
          $RN="00".$RN;
        } else {
          if ($RN<1000){
            $RN="0".$RN;
          }
        }
      };
      $PaymentType="CP";
      $OrderNumber=$PaymentType.$Year.$Month."-".$RN;
      $CPayment=$this->getCreditPayment($row->pType);
      $Coin=$CPayment->Credit;
      $Price=$CPayment->ThaiBaht;
	  if($PromoCode<>''){
		$PromotionCode=$PromoCode;
		$Coin=$PromoPoint;
		$this->usePromotion($PromoCode);
	  }else{
		$PromotionCode=$CPayment->PromotionCode;
	  }
      $Vat=round((7*$Price/107),2);
      $NetAfterVat=$Price-$Vat;
      $OmesiCharge=round(($Price*3.65/100),2);
      $OmesiVat=round(($OmesiCharge*7/100),2);
      $NetAfterOmesi=$NetAfterVat-$OmesiCharge-$OmesiVat;
      $email=$this->postemail->get_email_from_userid($row->user_id);
      $query4=$this->db->query('Select count(user_id) as TotalListing from Post where Active=1 and user_id="'.$row->user_id.'"');
      $TotalListing=$query4->row()->TotalListing;
      $SetInsert=array($row->user_id,$email,$row->pType,$PromotionCode,$Coin,$Price,$Vat,$NetAfterVat,
      $OmesiCharge,$OmesiVat,$NetAfterOmesi,$PaymentType,$Year,$Month,$RN,$RunningNumber,$OrderNumber,
      $DateTime,$TotalListing);
      $this->db->query('insert into cCoinTransaction set user_id=?, email=?, PType=?, PromotionCode=?, Coin=?,
      Price=?, Vat=?, NetAfterVat=?, OmesiCharge=?, OmesiVat=?, NetAfterOmesi=?, PaymentType=?, Year=?,
      Month=?, RN=?, RunningNumber=?, OrderNumber=?, DateTime=?, TotalListing=?',$SetInsert);
      error_log($this->db->last_query());
      $value[0]=$OrderNumber;
      $value[1]=$this->getCreditPayment($row->pType);
      return $value;
    }else{
      return 0;
    }
  }

	function getCreditPayment($PType){
		$query=$this->db->query('select * from cCreditPayment where PType="'.$PType.'" and Active=1 and now() between DateStart and DateEnd');
		$row=$query->row();
		return $row;
	}

  function findAllPhone($user_id){
    $query=$this->db->query('Select distinct(Telephone1) as Telephone from Post Where user_id="'.$user_id.'"');
    $Telephone="";
    foreach ($query->result() as $row) {
      $Telephone=$Telephone.",".$row->Telephone;
    }
    return $Telephone;
  }

  function CreditBanlanceUser($user_id){
    //$user_id=$this->session->userdata('user_id');
    $query=$this->db->query('select Credit from cCreditSummary where user_id=?',array($user_id));
    if ($query->num_rows()==0){
      $Credit=0;
      $this->db->query('insert into cCreditSummary set user_id=?, Credit=0, last_update=?',array($user_id,$this->dateMysql()));
    } else {
      $Credit=$query->row()->Credit;
    }
    return $Credit;
  }

  function CreditBanlanceUserID($user_id){
    $query=$this->db->query('select Credit from cCreditSummary where user_id=?',array($user_id));
    if ($query->num_rows()==0){
      $Credit=0;
      $this->db->query('insert into cCreditSummary set user_id=?, Credit=0, last_update=?',array($user_id,$this->dateMysql()));
    } else {
      $Credit=$query->row()->Credit;
    }
    return $Credit;
  }

  function AddCreditAdmin($user_id,$coin,$ref){
    $admin_id=$this->session->userdata('user_id');
    $query=$this->db->query('Select email from users where id="'.$admin_id.'"');
    $admin_email=$query->row()->email;
    $BeforeCreditSummary=$this->CreditBanlanceUserID($user_id);
    $Credit=$coin;
    $AfterCreditSummary=$BeforeCreditSummary+$Credit;
    if ($AfterCreditSummary<0){
      $TxtReturn=0;
    } else {
      $this->db->query('update cCreditSummary set Credit=?, last_update=? where user_id=?'
        ,array($AfterCreditSummary,$this->dateMysql(),$user_id));
      $this->db->query('insert into cCreditTransection set JobID=?, user_id=?, Name=?, Credit=?, BeforeCreditSummary=?, AfterCreditSummary=?, DateTime=?'
        ,array($JobID,$user_id,$row->PaymentName,$Credit,$BeforeCreditSummary,$AfterCreditSummary,$this->dateMysql()));
      $TxtReturn=1;
      $this->db->query('insert into LogAdminAddCoin set admin_id=?, admin_email=?, user_id=?, coin=?, ref_txt=?, update_datetime=?'
        ,array($admin_id,$admin_email,$user_id,$coin,$ref,$this->dateMysql()));
    }
    return $TxtReturn;
  }

  function ProjectName($POID){
    $query=$this->db->query('Select ProjectName from Post Where POID="'.$POID.'"');
    return $query->row()->ProjectName;
  }

  function PostExpire($POID){
    $query=$this->db->query('Select DateExpire from Post Where POID="'.$POID.'"');
    return $query->row()->DateExpire;
  }

  function TypeAdv($POID){
    $query=$this->db->query('Select TOAdvertising as TOAdver, (Select AName_th from TOAdvertising where TOAID=TOAdver) as TName from Post Where POID="'.$POID.'"');
    //echo $this->db->last_query();
    return $query->row()->TName;
  }

  function FindEmail($user_id){
    $query=$this->db->query('Select email from users where id="'.$user_id.'"');
    return $query->row()->email;
  }

  function blockboost($JobID){
    $end_job=$this->dateMysql();
    $query=$this->db->query('update cCreditJob set Active=5, end_job="'.$end_job.'" where JobID="'.$JobID.'"');
  }

  function unblockboost($JobID){
    $query=$this->db->query('Select POID from cCreditJob Where JobID="'.$JobID.'"');
    $POID=$query->row()->POID;
    $query=$this->db->query('Update ImagePost set AdImg=1 where POID="'.$POID.'" and order_sort="1"');
    $query=$this->db->query('update cCreditJob set Active=1, end_job="0000-00-00 00:00:00" where JobID="'.$JobID.'"');
    //echo $this->db->last_query();
  }

	function cancelBoostPost($JobID,$POID){
		$checkAdmin=$this->backend->checkAdmin();
		if($checkAdmin==1){
			$user_id=$this->user_idFromPOID($POID);
		}else{
			$user_id=$this->session->userdata('user_id');
		}
		//$this->db->query('set time_zone="Asia/Bangkok"');
		$query=$this->db->query('update cCreditJob set Active=6,end_job=now() where POID="'.$POID.'" and user_id="'.$user_id.'" and Active in(1,2)');
		return 1;
	}

	function user_idFromPOID($POID){
		$query=$this->db->query('Select user_id from Post Where POID="'.$POID.'"');
		$user_id=$query->row()->user_id;
		return $user_id;
	}
	
	function selectDateBoostPost($POID,$date_type){
		//date_type
		//1 - ตั้งแต่เริ่ม
		//2 - สัปดาห์นี้
		//3 - เดือนนี้
		//4 - 3 เดือน
		$nowdate=date('Y-m-d');
		$checkAdmin=$this->backend->checkAdmin();
		if($checkAdmin==1){
		  $user_id=$this->user_idFromPOID($POID);
		} else {
		  $user_id=$this->session->userdata('user_id');
		}
		if($date_type==1){
			$query=$this->db->query('select date(min(boost_date)) as boost_date from cCreditJob where POID="'.$POID.'" and user_id="'.$user_id.'" and Active<>0');
			$row=$query->row();
			$start_date=$row->boost_date;
		}else{
			$date_array=explode("-",$nowdate);
			//$this->db->query('set time_zone="Asia/Bangkok"');
			if($date_type==2){
				$queryDate=$this->db->query('select adddate(curdate(),- weekday(curdate())) as start_date');
				$rowDate=$queryDate->row();
				$start_date=$rowDate->start_date;
			}else if($date_type==3){
				$start_date=$date_array[0].'-'.$date_array[1].'-01';
			}else if($date_type==4){
				$queryDate=$this->db->query('select adddate(curdate(),interval -3 month) as start_date');
				$rowDate=$queryDate->row();
				//$start_date=$rowDate->start_date;
				$date_array2=explode("-",$rowDate->start_date);
				$start_date=$date_array2[0].'-'.$date_array2[1].'-01';
			}
			$query=$this->db->query('select if(datediff(boost_date,"'.$start_date.'")>0,boost_date,"'.$start_date.'") as start_date from (select date(min(boost_date)) as boost_date from cCreditJob where POID="'.$POID.'" and user_id="'.$user_id.'" and Active<>0) a');
			$row=$query->row();
			$start_date=$row->start_date;
		}
		return $start_date;
	}

	function resultBoostPost($POID,$start_date,$end_date){
		$checkAdmin=$this->backend->checkAdmin();
		if($checkAdmin==1){
			$user_id=$this->user_idFromPOID($POID);
		} else {
			$user_id=$this->session->userdata('user_id');
		}
		$result[1]=0;
		$result[2]=0;
		$result[3]=0;
		$result[4]=0;
		$result[5]=0;
		$result[6]=0;
		$result[7]=0;
		$result[8]=0;
		$result[9]=0;
		//Promote
		$query=$this->db->query('select if(sum(cCreditJobDetail.count_view) is null,0,sum(cCreditJobDetail.count_view)) as view_banner from cCreditJob,cCreditJobDetail where cCreditJob.JobID=cCreditJobDetail.JobID and cCreditJob.Active<>0 and cCreditJob.POID="'.$POID.'" and cCreditJob.user_id="'.$user_id.'" and cCreditJobDetail.operate_date between "'.$start_date.'" and "'.$end_date.'"');
		if($query->num_rows()>0){
			$row=$query->row();
			$result[1]=$row->view_banner;
		}
		$query2=$this->db->query('select count(ID) as click_banner,(select count(id) from LogViewTel where POID="'.$POID.'" and date(LastUpdate) between "'.$start_date.'" and "'.$end_date.'" and type="2") as click_banner_tel from LogViewBanner where POID="'.$POID.'" and date(LastUpdate) between "'.$start_date.'" and "'.$end_date.'"');
		if($query2->num_rows()>0){
			$row2=$query2->row();
			$result[2]=$row2->click_banner;
			if($result[1]>0){
				$percent_banner=($result[2]/$result[1])*100;
				$result[3]=$percent_banner;
			}
			$result[4]=$row2->click_banner_tel;
			if($result[1]>0){
				$percent_banner_tel=($result[4]/$result[1])*100;
				$result[5]=$percent_banner_tel;
			}
		}
		//Normal
		$query3=$this->db->query('select count(ID) as click_normal,(select count(id) from LogViewTel where POID="'.$POID.'" and date(LastUpdate) between "'.$start_date.'" and "'.$end_date.'" and type="1") as click_normal_tel from LogViewPostDaily where POID="'.$POID.'" and date(LastUpdate) between "'.$start_date.'" and "'.$end_date.'"');
		if($query3->num_rows()>0){
			$row3=$query3->row();
			$result[6]=$row3->click_normal;
			if($result[1]>0){
				$percent_normal=($result[6]/$result[1])*100;
				$result[7]=$percent_normal;
			}
			$result[8]=$row3->click_normal_tel;
			if($result[1]>0){
				$percent_normal_tel=($result[8]/$result[1])*100;
				$result[9]=$percent_normal_tel;
			}
		}

		return $result;
	}

	function historyBoostPost($POID){
		$checkAdmin=$this->backend->checkAdmin();
		if($checkAdmin==1){
			$user_id=$this->user_idFromPOID($POID);
		} else {
			$user_id=$this->session->userdata('user_id');
		}
		//$query=$this->db->query('select JobID as sJobID,POID,start_date,end_date,end_job,DateTime,Active,(select name_th from cfg_master where id=Active and type="active_boost") as ActiveName,credit_limit_pday,length_date as day_length from cCreditJob where POID="'.$POID.'" and user_id="'.$user_id.'" and Active<>0');
		$query=$this->db->query('select cCreditJob.JobID as sJobID,POID,start_date,end_date,end_job,cCreditJobAction.DateTime,Active,cCreditJobAction.ActionID,(select name_th from cfg_master where id=ActionID and type="action_boost") as ActionName,credit_limit_pday,length_date as day_length from cCreditJob,cCreditJobAction where cCreditJob.JobID=cCreditJobAction.JobID and POID="'.$POID.'" and user_id="'.$user_id.'" and Active<>0 order by sJobID ASC,cCreditJobAction.id DESC');
		return $query;
	}

	function recordActionBoostPost($JobID,$ActionID){
		$user_id=$this->session->userdata('user_id');
		//$this->db->query('set time_zone="Asia/Bangkok"');
		$this->db->query('insert into cCreditJobAction set JobID="'.$JobID.'",ActionID="'.$ActionID.'",DateTime=now()');
	}
}
?>
