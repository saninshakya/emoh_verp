<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('file');
		$this->load->helper('directory');
		$this->load->helper('array');

		$this->load->library('tank_auth');
		$this->load->library('session');
		$this->load->library('user_agent');
		$this->load->library('googlemaps');

		$this->load->model('tank_auth/users');
		$this->load->model('usermenu');
		$this->load->model('post');
		$this->load->model('dashboard');
		$this->load->model('search');
		$this->load->model('backend');
		//Add 24-09-58
		$this->load->model('unitdetail');
		$this->load->model('credit');
    $this->load->model('Promotion');//for promotion code generate
}

function ChkLogin()
{
	if (!$this->tank_auth->is_logged_in()) {
		return 0;
	} else {
		return 1;
	}
}

function lang_check()
{
	if (!$this->session->userdata('lang')){
		$this->session->set_userdata('lang','th');
	};
}

function header_inc($ChkLogin)
{
	if ($ChkLogin==0) {
		$sess_id = $this->session->userdata('user_id');
		if(!empty($sess_id)){
			$this->session->sess_destroy();
		};
		$data="header_nonauth";
	} else {
		$data="header_auth";
	}
	return $data;
}

function user_profile($ChkLogin)
{
	if ($ChkLogin==0) {
		$data["Name"]="No_Profile";
		$sess_id = $this->session->userdata('user_id');
		if(!empty($sess_id)){
			$this->session->sess_destroy();
		};
	} else {
		$user_data = $this->users->get_user_by_id($this->tank_auth->get_user_id(),1);
		$data['firstname'] = $user_data->firstname;
		$data['lastname'] = $user_data->lastname;
		if( !$this->session->userdata('image') == '' ){
			$data['image'] = $this->session->userdata('image');
		}else{
			$data['image'] = '/images/blank_man.gif';
		};
		$data['lang'] = $this->session->userdata('lang');
		$user_id=$this->session->userdata('user_id');
		$query=$this->db->query('select count(PID) as CNumber from Post Where user_id="'.$user_id.'" and (Active=0 or Active=1 or Active=3 or Active=81 or Active=82 or Active=92 or Active=93)');
		$row=$query->row();
		$data['CNumber']=$row->CNumber;
	};
	return $data;
}

public function adminEditUnitDetail()
{
	$checkAdmin=$this->backend->checkAdmin();
	if ($checkAdmin==1){
		$Token=$this->uri->segment(3);
		$this->session->set_userdata('token',$Token);
		$user_data = $this->users->get_user_by_id($this->tank_auth->get_user_id(),1);
		$email=$user_data->email;
		$DateCreate=date("Y-m-d");
		$this->db->query('Update Post set AdminEdit="'.$email.'", AdminEditDate="'.$DateCreate.'" Where Token="'.$Token.'"');
		$this->postall();
	}
}

public function postall()
{
		//if (!$this->session->userdata('token')){
		//	$this->post->newPost();
		//};
	$this->post->newPost();
	$this->session->set_userdata('lastpage','/');
	$this->lang_check();
	$ChkLogin=$this->ChkLogin();
	$header=$this->header_inc($ChkLogin);
	$profile=$this->user_profile($ChkLogin);


	$map = $this->postMapChange();
	$data['map'] = $map;
	$profile['map'] = $map;
	$profile['HSNumber']=3;
	$S['1']='<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false&libraries=places"></script>';
	$S['2']='<script type="text/javascript">var centreGot = false;</script>';
	$profile['HSrc']=$S;

	$data['qProjectName']=$this->post->qProject();
	$data['qTOOwner']=$this->post->qTOOwner();
	$data['qTOProperty']=$this->post->qTOProperty();
	$data['qTOAdvertising']=$this->post->qTOAdvertising();
	$data['qPost']=$this->post->qPost();
	$data['TOCondoSpec1']=$this->post->TOCondoSpec(1);
	$data['TOCondoSpec2']=$this->post->TOCondoSpec(2);
	$data['TOCondoSpec3']=$this->post->TOCondoSpec(3);
	$data['txtMapChange']=$this->txtMapChange();
	$data['POID'] =  $this->post->AdminGetPOID();
	$this->post->ClearImgFail($data['POID']);
	$data['user_id'] = $this->post->AdminGetUID();
	$data['imgRoom'] = $this->post->qImg('room',$data['POID']);
	$data['imgView'] = $this->post->qImg('view',$data['POID']);
	$data['imgFac'] = $this->post->qImg('facilities',$data['POID']);
	$data['PID']= $this->post->qPID($data['POID']);
	$data['PName'] = $this->post->qProjectName($data['POID']);

	$data['imgProjShare'] = $this->findDirectory($data['PName']);
    //$profile['ipage']= 4;
	$this->load->view($header,$profile);
	$this->load->view('/admin/inputformall',$data);
	$this->load->view('/admin/footer_postall',$data);

}

public function post11()
{
		//if (!$this->session->userdata('token')){
		//	$this->post->newPost();
		//};
	$this->post->newPost();
	$this->session->set_userdata('lastpage','/');
	$this->lang_check();
	$ChkLogin=$this->ChkLogin();
	$header=$this->header_inc($ChkLogin);
	$profile=$this->user_profile($ChkLogin);


	$map = $this->postMapChange();
	$data['map'] = $map;
	$profile['map'] = $map;
	$profile['HSNumber']=3;
	$S['1']='<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false&libraries=places"></script>';
	$S['2']='<script type="text/javascript">var centreGot = false;</script>';
	$profile['HSrc']=$S;

	$data['qProjectName']=$this->post->qProject();
	$data['qTOOwner']=$this->post->qTOOwner();
	$data['qTOProperty']=$this->post->qTOProperty();
	$data['qTOAdvertising']=$this->post->qTOAdvertising();
	$data['qPost']=$this->post->qPost();
	$data['txtMapChange']=$this->txtMapChange();
	$this->load->view($header,$profile);
	$this->load->view('/admin/inputform1',$data);
	$this->load->view('/admin/footer_post1',$data);

}

public function post2()
{
	$this->post->newPost();
	$this->session->set_userdata('lastpage','/');
	$this->lang_check();
	$ChkLogin=$this->ChkLogin();
	$header=$this->header_inc($ChkLogin);
	$profile=$this->user_profile($ChkLogin);
	$profile['HSNumber']=2;
	$S['1']='<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false&libraries=places"></script>';
	$profile['HSrc']=$S;
	$data['qProjectName']=$this->post->qProject();
	$data['TOCondoSpec1']=$this->post->TOCondoSpec(1);
	$data['TOCondoSpec2']=$this->post->TOCondoSpec(2);
	$data['TOCondoSpec3']=$this->post->TOCondoSpec(3);
	$this->load->view($header,$profile);
	$this->load->view('/admin/inputform2',$data);
	$this->load->view('/admin/footer_post2',$data);
}

function postMapChange()
{
	$token=$this->session->userdata('token');
	$query=$this->db->query('Select Lat, Lng from Post Where Token="'.$token.'"');
	$row=$query->row();
	$Lat=$row->Lat;
	$Lng=$row->Lng;

	if ($Lat==0){
		if ($this->agent->is_browser('Safari'))
		{
			$config['geocodeCaching'] = false;
			$config['zoom'] = '16';
			$config['center'] = '13.764934,100.5382955';
			$config['map_height']= '300px';
			$this->googlemaps->initialize($config);
			$marker = array();
			$marker['position'] = '13.764934,100.5382955';
			$marker['draggable'] = true;
			$marker['ondragend'] = 'updateDatabase(event.latLng.lat(), event.latLng.lng());';
			$this->googlemaps->add_marker($marker);
				//echo 'You are using Safari.';
		} else {
			$config = array();
			$config['center'] = 'auto';
			$config['onboundschanged'] = 'if (!centreGot) {
				var mapCentre = map.getCenter();
				marker_0.setOptions({
					position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng())
				});
			}
			centreGot = true;';
			$config['geocodeCaching'] = TRUE;
			$config['zoom'] = '16';
			$config['map_height']= '300px';
			$this->googlemaps->initialize($config);
			$marker = array();
			$marker['draggable'] = true;
			$marker['ondragend'] = 'updateDatabase(event.latLng.lat(), event.latLng.lng());';
			$this->googlemaps->add_marker($marker);
		};
	} else {
		$config['geocodeCaching'] = false;
		$config['zoom'] = '16';
		$config['center'] = $Lat.','.$Lng;
		$config['map_height']= '300px';
		$this->googlemaps->initialize($config);
		$marker = array();
		$marker['position'] = $Lat.','.$Lng;
		$marker['draggable'] = true;
		$marker['ondragend'] = 'updateDatabase(event.latLng.lat(), event.latLng.lng());';
		$this->googlemaps->add_marker($marker);
	}
	$return=$this->googlemaps->create_map();
	return $return;
}

function txtMapChange()
{
	$token=$this->session->userdata('token');
	$query=$this->db->query('Select Lat, Lng from Post Where Token="'.$token.'"');
	$row=$query->row();
	$Lat=$row->Lat;
	$Lng=$row->Lng;
	if ($Lat!=0){
		$txt="disabled";
	} else {
		$txt="ไม่มีข้อมูลในฐานข้อมูลกรุณาปักหมุดเอง";
	}
	return $txt;
}

public function updatePost()
{
	$this->post->AdminUpdatePost($_POST);
}

public function updatePostStep($data)
{
	$checkAdmin=$this->backend->checkAdmin();
	if ($checkAdmin==1){
		$Token=$this->session->userdata('token');
		$this->db->query('update Post set Step'.$data.'="1" where Token="'.$Token.'"');
			//Insert This Line for Change TotalPrice to NetPrice
		$query=$this->db->query('select TOAdvertising from Post Where Token="'.$Token.'"');
		$rowCheck=$query->row();
		if ($rowCheck->TOAdvertising==1){
			$this->db->query('Update Post Set TotalPrice=NetPrice Where Token="'.$Token.'"');
				//$this->db->query('Update Post Set PricePerSq=TotalPrice/(useArea+terraceArea) Where Token="'.$Token.'"');
			$this->db->query('Update Post Set PricePerSq=TotalPrice/(useArea) Where Token="'.$Token.'"');
		}
	}


}

public function changePage1()
{
	$POID =  $this->post->AdminGetPOID();
	$checkAdmin=$this->backend->checkAdmin();
	if ($checkAdmin==1){
		if ($_POST['key_change']==0){
			$this->updatePostStep(1);
			$this->postall();
		}
		if ($_POST['key_change']==1){
			$this->updatePostStep(1);
			$this->postall();
		}
		if ($_POST['key_change']==2){
			$this->updatePostStep(1);
			$this->postall();
		}
		if ($_POST['key_change']==3){
			$this->updatePostStep(2);
			$this->post3();
		}
		if ($_POST['key_change']==4){
			$this->updatePostStep(3);
				//$this->post4();
			redirect('/zhome/adminViewUnitDetail/'.$POID, 'location');
		}
		if ($_POST['key_change']==5){
			$this->updatePostStep(4);
			$this->updatePostStep(5);
			$this->post5();
		}
	}
}

public function updateCondoSpec()
{
	$this->post->AdminUpdateCondoSpec($_POST);
}

public function post3()
{
	$this->post->newPost();
	$this->session->set_userdata('lastpage','/');
	$this->lang_check();
	$ChkLogin=$this->ChkLogin();
	$header=$this->header_inc($ChkLogin);
	$profile=$this->user_profile($ChkLogin);
	$profile['HSNumber']=2;
	$S['1']='<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false&libraries=places"></script>';
	$profile['HSrc']=$S;
	$data['qProjectName']=$this->post->qProject();
	$data['TOCondoSpec1']=$this->post->TOCondoSpec(1);
	$data['TOCondoSpec2']=$this->post->TOCondoSpec(2);
	$data['TOCondoSpec3']=$this->post->TOCondoSpec(3);
	$this->load->view($header,$profile);
	$checkAdvertising=$this->post->checkAdvertising();
	if ($this->post->AdminCheckPost('useArea')==0){
		echo "<script>alert('กรุณาใส่พื้นที่ห้อง');window.location.href='/admin/changePage2/2';</script>";
	} else {
		if ($checkAdvertising==1){
			$this->load->view('/admin/inputform31',$data);
			$this->load->view('/admin/footer_post31',$data);
		};
		if ($checkAdvertising==3){
			$this->load->view('/admin/inputform33',$data);
			$this->load->view('/admin/footer_post33',$data);
		};
		if ($checkAdvertising==4){
			$this->load->view('/admin/inputform34',$data);
			$this->load->view('/admin/footer_post34',$data);
		};
		if ($checkAdvertising==5){
			$this->load->view('/admin/inputform35',$data);
			$this->load->view('/admin/footerstandard');
			$this->load->view('/admin/footer_post35',$data);
		};
		if ($checkAdvertising==2){
			$this->load->view('/admin/inputform32',$data);
			$this->load->view('/admin/footer_post32',$data);
		};
	};

}

public function post4(){
	$this->post->newPost();
	$this->session->set_userdata('lastpage','/');
	$this->lang_check();
	$ChkLogin=$this->ChkLogin();
	$header=$this->header_inc($ChkLogin);
	$profile=$this->user_profile($ChkLogin);
	$profile['HSNumber']=2;
	$S['1']='<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false&libraries=places"></script>';
	$profile['HSrc']=$S;
	$data['qProjectName']=$this->post->qProject();
	$data['TOCondoSpec1']=$this->post->TOCondoSpec(1);
	$data['TOCondoSpec2']=$this->post->TOCondoSpec(2);
	$data['TOCondoSpec3']=$this->post->TOCondoSpec(3);
	$data['POID'] =  $this->post->AdminGetPOID();
	$this->post->ClearImgFail($data['POID']);
	$data['user_id'] = $this->post->AdminGetUID();
	$data['imgRoom'] = $this->post->qImg('room',$data['POID']);
	$data['imgView'] = $this->post->qImg('view',$data['POID']);
	$data['imgFac'] = $this->post->qImg('facilities',$data['POID']);

		//$data['imgShare'] = $this->post->qImg_share($data['POID']);
	$data['PID']= $this->post->qPID($data['POID']);
	$data['PName'] = $this->post->qProjectName($data['POID']);

	$data['imgProjShare'] = $this->findDirectory($data['PName']);
	$profile['ipage']= 4;
	$this->load->view($header,$profile);
	$this->load->view('/admin/inputform4',$data);
	$this->load->view('/admin/footer_post4',$data);

		//$this->POST
}
private function findDirectory($pname){
		//echo "find directory";
		//echo "panme : ".$pname;
	$map = directory_map('projImg/'.$pname.'/Picture');
		//echo "map : ".$map;
	if ($map!=false){
		$total = sizeof($map);
		$file = array();
		for($i=0;$i<$total;$i++){
			$file[$i] = 'projImg/'.$pname.'/Picture/'.$map[$i];
		}
		return $file;
	} else {
		$file[0]='projImg/no-icon.gif';
		return $file;
	}

}

public function post5()
{
	$this->post->newPost();
	$this->session->set_userdata('lastpage','/');
	$this->lang_check();
	$ChkLogin=$this->ChkLogin();
	$header=$this->header_inc($ChkLogin);
	$profile=$this->user_profile($ChkLogin);
	$profile['HSNumber']=2;
	$S['1']='<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false&libraries=places"></script>';
	$profile['HSrc']=$S;
	$data['qProjectName']=$this->post->qProject();
	$data['TOCondoSpec1']=$this->post->TOCondoSpec(1);
	$data['TOCondoSpec2']=$this->post->TOCondoSpec(2);
	$data['TOCondoSpec3']=$this->post->TOCondoSpec(3);
	$this->load->view($header,$profile);
	$this->load->view('/admin/inputform5',$data);
	$this->load->view('/admin/footer_post5',$data);
}

public function postreport()
{
	$checkAdmin=$this->backend->checkAdmin();
	if ($checkAdmin==1){
		$reportType=$this->uri->segment(3);
		$data['reportType']=$reportType;
		$DetailType=$this->uri->segment(4);
		if ($DetailType==0){
			$data['reportDetail']='NULL';
			$data['reportDetailHeader']='NULL';
		};
		if ($DetailType==1){
			$DateCreate=$this->uri->segment(5);
			$data['reportDetailHeader']='New Post ('.$DateCreate.')';
			if ($reportType==0){
				$data['reportDetail']=$this->db->query('select Post.*,users.firstname,users.lastname from Post,users where Post.user_id=users.id and DateCreate="'.$DateCreate.'"');
			} else {
				$data['reportDetail']=$this->db->query('select Post.*,users.firstname,users.lastname from Post,users where Post.user_id=users.id and TOAdvertising="'.$reportType.'" and DateCreate="'.$DateCreate.'"');
			}

		};
		if ($DetailType==2){
			$DateCreate=$this->uri->segment(5);
			$data['reportDetailHeader']='Approve Post ('.$DateCreate.')';
			if ($reportType==0){
				$data['reportDetail']=$this->db->query('select Post.*,users.firstname,users.lastname from Post,users where Post.user_id=users.id and ApproveDate="'.$DateCreate.'"');
			} else {
				$data['reportDetail']=$this->db->query('select Post.*,users.firstname,users.lastname from Post,users where Post.user_id=users.id and TOAdvertising="'.$reportType.'" and ApproveDate="'.$DateCreate.'"');
			}
		};
		if ($DetailType==3){
			$DateCreate=$this->uri->segment(5);
			$data['reportDetailHeader']='Block Post ('.$DateCreate.')';
			if ($reportType==0){
				$data['reportDetail']=$this->db->query('select Post.*,users.firstname,users.lastname from Post,users where Post.user_id=users.id and BlockDate="'.$DateCreate.'"');
			} else {
				$data['reportDetail']=$this->db->query('select Post.*,users.firstname,users.lastname from Post,users where Post.user_id=users.id and TOAdvertising="'.$reportType.'" and BlockDate="'.$DateCreate.'"');
			}
		};
		if ($DetailType==4){
			$DateCreate=$this->uri->segment(5);
			$data['reportDetailHeader']='Delete Post ('.$DateCreate.')';
			if ($reportType==0){
				$data['reportDetail']=$this->db->query('select Post.*,users.firstname,users.lastname from Post,users where Post.user_id=users.id and DelDate="'.$DateCreate.'"');
			} else {
				$data['reportDetail']=$this->db->query('select Post.*,users.firstname,users.lastname from Post,users where Post.user_id=users.id and TOAdvertising="'.$reportType.'" and DelDate="'.$DateCreate.'"');
			}
		};
		$ChkLogin=$this->ChkLogin();
		$header=$this->header_inc($ChkLogin);
		$profile=$this->user_profile($ChkLogin);
		$data['report']=$this->db->query('Select * from ReportSummary');
		$this->load->view($header,$profile);
		$this->load->view('/admin/postreport',$data);
		$this->load->view('footerstandard');
		$this->load->view('footer_home');
	}
}

public function usermanage()
{
	$checkAdmin=$this->backend->checkAdmin();
	if ($checkAdmin==1){
		$ChkLogin=$this->ChkLogin();
		$header=$this->header_inc($ChkLogin);
		$profile=$this->user_profile($ChkLogin);
		$this->load->view($header,$profile);
		$data['nonactivated']=$this->db->query('Select * from users where activated=0');
		if (isset($_POST['email'])){
			if ($_POST['email']!=null and $_POST['email']!="" ){
				$email=$_POST['email'];
				$data['search']=$this->db->query('Select * from users where email like "%'.$email.'" or firstname like "%'.$email.'%" or lastname like "%'.$email.'"');
			} else {
				$data['search']="NULL";
			}
		} else {
			$data['search']="NULL";
		}
		$this->load->view('/admin/usermanage',$data);
		$this->load->view('footerstandard');
		$this->load->view('footer_home');
	};
}

public function activate_user()
{
	$checkAdmin=$this->backend->checkAdmin();
	if ($checkAdmin==1){
		$user_id=$this->uri->segment(3);
		$this->db->query('update users set activated=1 where id="'.$user_id.'"');
		$this->usermanage();
	};
}

public function deactivate_user()
{
	$checkAdmin=$this->backend->checkAdmin();
	if ($checkAdmin==1){
		$user_id=$this->uri->segment(3);
		$this->db->query('update users set activated=0 where id="'.$user_id.'"');
		$this->usermanage();
	};
}

public function reset_password()
{
	$checkAdmin=$this->backend->checkAdmin();
	if ($checkAdmin==1){
		$user_id=$this->uri->segment(3);
		$new_password=$_POST['new_password'];
		$hasher = new PasswordHash(
			$this->config->item('phpass_hash_strength', 'tank_auth'),
			$this->config->item('phpass_hash_portable', 'tank_auth'));
		$hashed_password = $hasher->HashPassword($new_password);
			//echo $hashed_password;
		$this->db->query('update users set password="'.$hashed_password.'" where id="'.$user_id.'"');
		$this->usermanage();
	};
}


public function userreport()
{
	$checkAdmin=$this->backend->checkAdmin();
	if ($checkAdmin==1){
		$ChkLogin=$this->ChkLogin();
		$header=$this->header_inc($ChkLogin);
		$profile=$this->user_profile($ChkLogin);
		$data['report']=$this->db->query('SELECT *, YEAR(GenDate) AS Gyear, MONTH(GenDate) AS Gmonth from ReportUser');
		$ReportSubType=$this->uri->segment(3);
		  //echo $ReportSubType;
		$data['ReportSubType']=$ReportSubType;
		if ($ReportSubType=="1"){
			$GenDate=$this->uri->segment(4);
			$FirstTime=$GenDate." 00:00:00";
			$EndTime=$GenDate." 23:59:59";
			$queryUserViewTelephone=$this->db->query('select * from LogViewPost Where ViewTelByUserID is not NULL and LastUpdate>="'.$FirstTime.'" and LastUpdate<="'.$EndTime.'" order by ViewTelByUserID');
			$data['UserViewTelephone']=$queryUserViewTelephone;
			$data['GenDate']=$GenDate;
		}
		if ($ReportSubType=="2"){
			$GenDate=$this->uri->segment(4);
			$FirstTime=$GenDate." 00:00:00";
			$EndTime=$GenDate." 23:59:59";
			$queryUserView=$this->db->query('select * from LogViewPost Where ViewByUserID not like "%.%" and LastUpdate>="'.$FirstTime.'" and LastUpdate<="'.$EndTime.'" order by ViewByUserID');
			$data['UserView']=$queryUserView;
			$data['GenDate']=$GenDate;
		}
		$data['myClass'] = $this;
		$this->load->view($header,$profile);
		$this->load->view('/admin/userreport',$data);
		$this->load->view('footerstandard');
		$this->load->view('footer_home');
	}
}

public function DetailListView()
{
	$checkAdmin=$this->backend->checkAdmin();
	if ($checkAdmin==1){
		$ChkLogin=$this->ChkLogin();
		$header=$this->header_inc($ChkLogin);
		$profile=$this->user_profile($ChkLogin);
		$POID=$this->uri->segment(3);
		$data['POID']=$POID;
		$data['report']=$this->db->query('Select * from LogViewPost Where POID="'.$POID.'" Order By LastUpdate');
		$this->load->view($header,$profile);
		$this->load->view('/admin/viewpostreport',$data);
		$this->load->view('footerstandard');
		$this->load->view('footer_home');
	}
}
public function uploadResized()
{
	if ($_POST) {
			 //$userid=$this->session->userdata('user_id');
		$userid=$_POST['user_id'];
		$token=$this->session->userdata('token');
		define('IMG_DIR', 'userImg/'.$userid.'/');
             if(!is_dir(IMG_DIR)) //create the folder if it's not already exists
             {
             	mkdir(IMG_DIR,0755,TRUE);
             }
             define('UPLOAD_DIR', 'userImg/'.$userid.'/');
             $img = $_POST['image'];
             $imgType= $_POST['imgType'];
             $orit=$_POST['orit'];
             $img = str_replace('data:image/jpeg;base64,', '', $img);
             $img = str_replace(' ', '+', $img);
             $data = base64_decode($img);
             $file = UPLOAD_DIR . uniqid() . '.jpg';
             $success = file_put_contents($file, $data);
             print $success ? $file : 'Unable to save the file.';
             $record=$file;
             $inFile = $file;
             $outFile = UPLOAD_DIR . uniqid() . '.jpg';
             $image = new Imagick($inFile);
             if ($orit==3){
             	$image->rotateImage(new ImagickPixel('none'), 180);
             }
             if ($orit==6){
             	$image->rotateImage(new ImagickPixel('none'), 90);
             }
             if ($orit==8){
             	$image->rotateImage(new ImagickPixel('none'), -90);
             }
             $width=$image->getImageWidth();
             $ratio=$width/600;
             if ($ratio>2.1){
             	$center_width=round($width/2);
             	$start_width=$center_width-630;
             	$image->cropImage(1260,600,$start_width,0);
//				$image->writeImage($outFile);
//				$record=$outFile;
             }
             $watermark = new Imagick();
             $watermark->readImage("img/water.png");
			// how big are the images?
             $iWidth = $image->getImageWidth();
             $iHeight = $image->getImageHeight();
             if ($iWidth>=$iHeight){
             	$Horizental=1;
             } else {
             	$Horizental=0;
             }
             $wWidth = $watermark->getImageWidth();
             $wHeight = $watermark->getImageHeight();

             if ($iHeight < $wHeight || $iWidth < $wWidth) {
				// resize the watermark
             	$watermark->scaleImage($iWidth, $iHeight);

				// get new size
             	$wWidth = $watermark->getImageWidth();
             	$wHeight = $watermark->getImageHeight();
             }

			// calculate the position
             $x = ($iWidth - $wWidth) / 2;
             $y = ($iHeight - $wHeight) / 2;

             $image->compositeImage($watermark, imagick::COMPOSITE_OVER, $x, $y);
             $image->writeImage($outFile);
             $record=$outFile;
             $query=$this->db->query('select POID from Post Where Token="'.$token.'"');
             $row=$query->row();
             $POID=$row->POID;
             $this->db->query('insert into ImagePost set POID="'.$POID.'", file="/'.$record.'", type="'.$imgType.'", Horizental="'.$Horizental.'"');
             $this->db->query('insert into checkUpload set user_id="'.$userid.'", token="'.$token.'"');
         }
     }

     public function report_email_respond(){
     	$checkAdmin=$this->backend->checkAdmin();
     	if ($checkAdmin==1){
     		$ChkLogin=$this->ChkLogin();
     		$header=$this->header_inc($ChkLogin);
     		$profile=$this->user_profile($ChkLogin);
     		$data['report']=$this->db->query('Select Count(RenewPost) as RenewPost, Count(ClosePost) as ClosePost, Count(RentPost) as RentPost, Count(HidePost) as HidePost, Date from ActivePostByEmail Group By Date');
     		$this->load->view($header,$profile);
     		$this->load->view('/admin/email_respond_report',$data);
     		$this->load->view('footerstandard');
     		$this->load->view('footer_home');
     	}
     }

     public function newpostreport()
     {
     	$checkAdmin=$this->backend->checkAdmin();
     	if ($checkAdmin==1){
     		$reportType=$this->uri->segment(3);
     		$data['reportType']=$reportType;
     		$DetailType=$this->uri->segment(4);
     		$data['DetailType']=$DetailType;
     		if ($DetailType==0){
     			$data['reportDetail']='NULL';
     			$data['reportDetailHeader']='NULL';
     		};
			//DetailType=1 == NewPost , DateCreate= Segment(5)
     		if ($DetailType==1){
     			$DateCreate=$this->uri->segment(5);
     			$data['reportDetailHeader']='New Post ('.$DateCreate.')';
     			if ($reportType==0){
     				$data['reportDetail']=$this->db->query('select Post.*,users.firstname,users.lastname,TOAdvertising.AName_th,AName_en from Post,users,TOAdvertising where Post.user_id=users.id and DateCreate="'.$DateCreate.'" and TOAdvertising<>0 and Post.TOAdvertising=TOAdvertising.TOAID');
     				$data['reportDetailNotAdminPost']=$this->db->query('select Post.*,users.firstname,users.lastname,TOAdvertising.AName_th,AName_en from Post,users,TOAdvertising where Post.user_id=users.id and Post.AdminPost is null and DateCreate="'.$DateCreate.'" and TOAdvertising<>0 and Post.TOAdvertising=TOAdvertising.TOAID');
     				$data['reportDetailAdminPost']=$this->db->query('select Post.*,users.firstname,users.lastname,TOAdvertising.AName_th,AName_en from Post,users,TOAdvertising where Post.user_id=users.id and Post.AdminPost=1 and DateCreate="'.$DateCreate.'" and TOAdvertising<>0 and Post.TOAdvertising=TOAdvertising.TOAID');
     			} else {
     				$data['reportDetail']=$this->db->query('select Post.*,users.firstname,users.lastname,TOAdvertising.AName_th,AName_en from Post,users,TOAdvertising where Post.user_id=users.id and TOAdvertising="'.$reportType.'" and DateCreate="'.$DateCreate.'" and Post.TOAdvertising=TOAdvertising.TOAID');
     				$data['reportDetailNotAdminPost']=$this->db->query('select Post.*,users.firstname,users.lastname,TOAdvertising.AName_th,AName_en from Post,users,TOAdvertising where Post.user_id=users.id and Post.AdminPost is null and TOAdvertising="'.$reportType.'" and DateCreate="'.$DateCreate.'" and Post.TOAdvertising=TOAdvertising.TOAID');
     				$data['reportDetailAdminPost']=$this->db->query('select Post.*,users.firstname,users.lastname,TOAdvertising.AName_th,AName_en from Post,users,TOAdvertising where Post.user_id=users.id and Post.AdminPost=1 and TOAdvertising="'.$reportType.'" and DateCreate="'.$DateCreate.'" and Post.TOAdvertising=TOAdvertising.TOAID');
     			}

     		};
			//DetailType=2 == ApproveDate
     		if ($DetailType==2){
     			$DateCreate=$this->uri->segment(5);
     			$data['reportDetailHeader']='Approve Post ('.$DateCreate.')';
     			if ($reportType==0){
     				$data['reportDetail']=$this->db->query('select Post.*,users.firstname,users.lastname,TOAdvertising.AName_th,AName_en from Post,users,TOAdvertising where Post.user_id=users.id and ApproveDate="'.$DateCreate.'" and Post.TOAdvertising=TOAdvertising.TOAID');
     				$data['reportDetailNotAdminPost']=$this->db->query('select Post.*,users.firstname,users.lastname,TOAdvertising.AName_th,AName_en from Post,users,TOAdvertising where Post.user_id=users.id and Post.AdminPost is null and ApproveDate="'.$DateCreate.'" and Post.TOAdvertising=TOAdvertising.TOAID');
     				$data['reportDetailAdminPost']=$this->db->query('select Post.*,users.firstname,users.lastname,TOAdvertising.AName_th,AName_en from Post,users,TOAdvertising where Post.user_id=users.id and Post.AdminPost=1 and ApproveDate="'.$DateCreate.'" and Post.TOAdvertising=TOAdvertising.TOAID');
     			} else {
     				$data['reportDetail']=$this->db->query('select Post.*,users.firstname,users.lastname,TOAdvertising.AName_th,AName_en from Post,users,TOAdvertising where Post.user_id=users.id and TOAdvertising="'.$reportType.'" and ApproveDate="'.$DateCreate.'" and Post.TOAdvertising=TOAdvertising.TOAID');
     				$data['reportDetailNotAdminPost']=$this->db->query('select Post.*,users.firstname,users.lastname,TOAdvertising.AName_th,AName_en from Post,users,TOAdvertising where Post.user_id=users.id and Post.AdminPost is null and TOAdvertising="'.$reportType.'" and ApproveDate="'.$DateCreate.'" and Post.TOAdvertising=TOAdvertising.TOAID');
     				$data['reportDetailAdminPost']=$this->db->query('select Post.*,users.firstname,users.lastname,TOAdvertising.AName_th,AName_en from Post,users,TOAdvertising where Post.user_id=users.id and Post.AdminPost=1 and TOAdvertising="'.$reportType.'" and ApproveDate="'.$DateCreate.'" and Post.TOAdvertising=TOAdvertising.TOAID');
     			}
     		};
			//DetailType=3 == Block Non Approve
     		if ($DetailType==3){
     			$DateCreate=$this->uri->segment(5);
     			$data['reportDetailHeader']='Block Post ('.$DateCreate.')';
     			if ($reportType==0){
     				$data['reportDetail']=$this->db->query('select Post.*,users.firstname,users.lastname,TOAdvertising.AName_th,AName_en from Post,users,TOAdvertising where Post.user_id=users.id and BlockDate="'.$DateCreate.'" and ApproveDate<>"000-00-00" and Post.TOAdvertising=TOAdvertising.TOAID');
     			} else {
     				$data['reportDetail']=$this->db->query('select Post.*,users.firstname,users.lastname,TOAdvertising.AName_th,AName_en from Post,users,TOAdvertising where Post.user_id=users.id and TOAdvertising="'.$reportType.'" and BlockDate="'.$DateCreate.'" and ApproveDate<>"000-00-00" and Post.TOAdvertising=TOAdvertising.TOAID');
     			}
     		};
			//DetailType=4 == Expire Post
     		if ($DetailType==4){
     			$DateCreate=$this->uri->segment(5);
     			$data['reportDetailHeader']='Expire Post ('.$DateCreate.')';
     			if ($reportType==0){
     				$data['reportDetail']=$this->db->query('select Post.*,users.firstname,users.lastname,TOAdvertising.AName_th,AName_en from Post,users,TOAdvertising where Post.user_id=users.id and DateExpire="'.$DateCreate.'" and ApproveDate<>"000-00-00" and Active=92 and Post.TOAdvertising=TOAdvertising.TOAID');
     			} else {
     				$data['reportDetail']=$this->db->query('select Post.*,users.firstname,users.lastname,TOAdvertising.AName_th,AName_en from Post,users,TOAdvertising where Post.user_id=users.id and TOAdvertising="'.$reportType.'" and DateExpire="'.$DateCreate.'" and ApproveDate<>"000-00-00" and Active=92 and Post.TOAdvertising=TOAdvertising.TOAID');
     			}
     		};
			//DetailType=5 ==> Post Wait ReApprove
     		if ($DetailType==5){
     			$DateCreate=$this->uri->segment(5);
     			$data['reportDetailHeader']='ประกาศรอตรวจสอบอีกครั้ง';
     			if ($reportType==0){
     				$data['reportDetail']=$this->db->query('select Post.*,users.firstname,users.lastname,TOAdvertising.AName_th,AName_en from Post,users,TOAdvertising where Post.user_id=users.id and Active=0 and ApproveDate<>"0000-00-00" and Post.TOAdvertising=TOAdvertising.TOAID');
     			} else {
     				$data['reportDetail']=$this->db->query('select Post.*,users.firstname,users.lastname,TOAdvertising.AName_th,AName_en from Post,users,TOAdvertising where Post.user_id=users.id and Active=0 and ApproveDate<>"0000-00-00" and TOAdvertising="'.$reportType.'" and Post.TOAdvertising=TOAdvertising.TOAID');
     			}
     		};
			//DetailType=6 == Re Approve Post
     		if ($DetailType==6){
     			$DateCreate=$this->uri->segment(5);
     			$data['reportDetailHeader']='Reapprove Post ('.$DateCreate.')';
     			if ($reportType==0){
     				$data['reportDetail']=$this->db->query('select Post.*,users.firstname,users.lastname,TOAdvertising.AName_th,AName_en from Post,users,TOAdvertising where Post.user_id=users.id and ReApproveDate="'.$DateCreate.'" and Post.TOAdvertising=TOAdvertising.TOAID');
     			} else {
     				$data['reportDetail']=$this->db->query('select Post.*,users.firstname,users.lastname,TOAdvertising.AName_th,AName_en from Post,users,TOAdvertising where Post.user_id=users.id and TOAdvertising="'.$reportType.'" and ReApproveDate="'.$DateCreate.'" and Post.TOAdvertising=TOAdvertising.TOAID');
     			}
     		};
     		if ($DetailType==7){
     			$data['reportDetailHeader']='All Post';
     			$this->db->cache_off();
     			$data['reportDetail']=$this->db->query('select Post.*,users.firstname,users.lastname,TOAdvertising.AName_th,AName_en from Post,users,TOAdvertising where Post.user_id=users.id and Post.TOAdvertising!=0 and Post.TOAdvertising=TOAdvertising.TOAID');
     		};
     		if ($DetailType==8){
     			$ApproveDate=$this->uri->segment(5);
     			$data['reportDetailHeader']='All Approve Post';
     			$data['reportDetail']=$this->db->query('select Post.*,users.firstname,users.lastname,TOAdvertising.AName_th,AName_en from Post,users,TOAdvertising where Post.user_id=users.id and ApproveDate<>"000-00-00" and ApproveDate<"'.$ApproveDate.'" and Post.TOAdvertising=TOAdvertising.TOAID');
     		};
     		if ($DetailType==10){
     			$CloseDate=$this->uri->segment(5);
     			$data['reportDetailHeader']='All Sold Post';
     			$data['reportDetail']=$this->db->query('select Post.*,users.firstname,users.lastname,TOAdvertising.AName_th,AName_en from Post,users,TOAdvertising where Post.user_id=users.id and ApproveDate<>"000-00-00" and Active=82 and CloseDate<="'.$CloseDate.'" and Post.TOAdvertising=TOAdvertising.TOAID');
     		};
     		if ($DetailType==11){
     			$CloseDate=$this->uri->segment(5);
     			$data['reportDetailHeader']='All Rent Post';
     			$data['reportDetail']=$this->db->query('select Post.*,users.firstname,users.lastname,TOAdvertising.AName_th,AName_en from Post,users,TOAdvertising where Post.user_id=users.id and ApproveDate<>"000-00-00" and Active=81 and CloseDate<="'.$CloseDate.'" and Post.TOAdvertising=TOAdvertising.TOAID');
     		};
     		$ChkLogin=$this->ChkLogin();
     		$header=$this->header_inc($ChkLogin);
     		$profile=$this->user_profile($ChkLogin);
     		$data['report']=$this->db->query('Select * ,YEAR(Date) AS Gyear, MONTH(Date) AS Gmonth from ReportNewSummaryPost');
     		$this->load->view($header,$profile);
     		$this->load->view('/admin/newpostreport',$data);
     		$this->load->view('footerstandard');
     		$this->load->view('footer_home');
     	}
     }

     public function postexpire()
     {
     	$checkAdmin=$this->backend->checkAdmin();
     	if ($checkAdmin==1){
     		if (isset($_POST['POID'])){
     			if ($_POST['POID']!="null"){
     				$query=$this->db->query('Select * from Post where POID="'.$_POST['POID'].'"');
     				$data['GetPOID']=$query;
     			} else {
     				$data['GetPOID']="null";
     			}
     		} else {
     			$data['GetPOID']="null";
     		}
     		$reportType=$this->uri->segment(3);
     		$data['reportType']=$reportType;
     		$DetailType=$this->uri->segment(4);
     		if ($DetailType==0){
     			$data['reportDetail']='NULL';
     			$data['reportDetailHeader']='NULL';
     		};
     		$ChkLogin=$this->ChkLogin();
     		$header=$this->header_inc($ChkLogin);
     		$profile=$this->user_profile($ChkLogin);
     		$ThisDate=date("Y-m-d",mktime(0, 0, 0, date("m")  , date("d"), date("Y")));
     		if ($reportType==0){
     			$data['report']=$this->db->query('Select * from Post Where Active=92 and DateExpire<"'.$ThisDate.'" order by DateExpire');
     			$data['reportTypeHeader']="ข้อมูลหมดอายุทั้งหมด";
     		};
     		if ($reportType==1){
     			$ThisDate2=date("Y-m-d",mktime(0, 0, 0, date("m")  , date("d")-7, date("Y")));
     			$data['report']=$this->db->query('Select * from Post Where Active=92 and DateExpire<"'.$ThisDate.'" and DateExpire>="'.$ThisDate2.'"  order by DateExpire');
     			$data['reportTypeHeader']="ข้อมูลหมดอายุไม่เกิน 7วัน";
     		};
     		if ($reportType==2){
     			$ThisDate2=date("Y-m-d",mktime(0, 0, 0, date("m")  , date("d")-30, date("Y")));
     			$data['report']=$this->db->query('Select * from Post Where Active=92 and DateExpire<"'.$ThisDate.'" and DateExpire>="'.$ThisDate2.'"  order by DateExpire');
     			$data['reportTypeHeader']="ข้อมูลหมดอายุไม่เกิน 30วัน";
     		};
     		$this->load->view($header,$profile);
     		$this->load->view('/admin/postexpire',$data);
     		$this->load->view('footerstandard');
     		$this->load->view('footer_home');
     	}
     }

     public function renewpost()
     {
     	$checkAdmin=$this->backend->checkAdmin();
     	if ($checkAdmin==1){
     		$POID=$this->uri->segment(3);
     		$DateExpire=date("Y-m-d",mktime(0, 0, 0, date("m")  , date("d")+45, date("Y")));
     		$Date=date("Y-m-d");
     		$this->db->query('update Post Set DateExpire="'.$DateExpire.'", Active=1 Where POID="'.$POID.'"');
     		$this->db->query('Insert into LogRenewPost set POID="'.$POID.'", ByAdmin=1, NewExpDate="'.$DateExpire.'", RenewDate="'.$Date.'"');
     		redirect('/admin/postexpire/0/0', 'refresh');
     	}
     }

     public function renewpost2()
     {
     	$checkAdmin=$this->backend->checkAdmin();
     	if ($checkAdmin==1){
     		$POID=$this->uri->segment(3);
     		$DateExpire=date("Y-m-d",mktime(0, 0, 0, date("m")  , date("d")+90, date("Y")));
     		$Date=date("Y-m-d");
     		$this->db->query('update Post Set DateExpire="'.$DateExpire.'", Active=1 Where POID="'.$POID.'"');
     		$this->db->query('Insert into LogRenewPost set POID="'.$POID.'", ByAdmin=1, NewExpDate="'.$DateExpire.'", RenewDate="'.$Date.'"');
     		redirect('/admin/postexpire/0/0', 'refresh');
     	}
     }

     public function rentpost()
     {
     	$checkAdmin=$this->backend->checkAdmin();
     	if ($checkAdmin==1){
     		$POID=$this->uri->segment(3);
     		$TOAdvertising=$this->uri->segment(4);
     		$ChkLogin=$this->ChkLogin();
     		$header=$this->header_inc($ChkLogin);
     		$profile=$this->user_profile($ChkLogin);
     		if ($TOAdvertising==5){
     			$this->db->query('update Post Set Active=81 Where POID="'.$POID.'"');
     			$data['POID']=$POID;
     			$this->load->view($header,$profile);
     			$this->load->view('/admin/updateRentMonth',$data);
     			$this->load->view('footerstandard');
     			$this->load->view('footer_home');
     		} else {
     			$this->db->query('update Post Set Active=82 Where POID="'.$POID.'"');
     			redirect('/admin/postexpire/0/0', 'refresh');
     		}
     	}
     }

     public function update_rent_month()
     {
     	$checkAdmin=$this->backend->checkAdmin();
     	if ($checkAdmin==1){
     		$POID=$_POST['POID'];
     		$date=date("d-M-Y", mktime(0, 0, 0, $_POST['month'], 30, $_POST['year']));
     		$this->db->query('update Post set PRentEnd="'.$date.'" Where POID="'.$POID.'"');
     		redirect('/admin/postexpire/0/0', 'refresh');
     	}
     }

     public function rentpost2()
     {

     }

     public function hidepost()
     {
     	$checkAdmin=$this->backend->checkAdmin();
     	if ($checkAdmin==1){
     		$POID=$this->uri->segment(3);
     		$this->db->query('update Post Set Active=93 Where POID="'.$POID.'"');
     		redirect('/admin/postexpire/0/0', 'refresh');
     	}
     }

     public function cancelpost()
     {
     	$checkAdmin=$this->backend->checkAdmin();
     	if ($checkAdmin==1){
     		$POID=$this->uri->segment(3);
     		$this->db->query('update Post Set Active=90 Where POID="'.$POID.'"');
     		redirect('/admin/postexpire/0/0', 'refresh');
     	}
     }

     function list_developer()
     {
     	$result=$this->db->query('Select * from users Where Developer=1');
     	return $result;
     }

     public function add_developer()
     {
     	$checkAdmin=$this->backend->checkAdmin();
     	if ($checkAdmin==1){
     		if ($_POST["user_id"]!="" or $_POST["user_id"]!=null){
     			$this->db->query('update users set developer=1,developer_remark="'.$_POST["developer_remark"].'" where id="'.$_POST["user_id"].'"');
     		} else {
     			if ($_POST["email"]!="" or $_POST["email"]!=null){
     				$this->db->query('update users set developer=1, developer_remark="'.$_POST["developer_remark"].'" where email="'.$_POST["email"].'"');
     			}
     		}
     		$this->set_developer();
     	};
     }

     public function remove_developer()
     {
     	$checkAdmin=$this->backend->checkAdmin();
     	if ($checkAdmin==1){
     		$user_id=$this->uri->segment(3);
     		$this->db->query('update users set developer=0, developer_remark="" where id="'.$user_id.'"');
     	};
     	$this->set_developer();
     }

     public function set_developer()
     {
     	$checkAdmin=$this->backend->checkAdmin();
     	if ($checkAdmin==1){
     		$ChkLogin=$this->ChkLogin();
     		$header=$this->header_inc($ChkLogin);
     		$profile=$this->user_profile($ChkLogin);
     		$this->load->view($header,$profile);
     		$data['list_developer']=$this->list_developer();
     		$this->load->view('/admin/set_developer',$data);
     		$this->load->view('footerstandard');
     		$this->load->view('footer_home');
     	};
     }

     function list_project()
     {
     	$result=$this->db->query("Select * from ProjectDeveloper");
     	return $result;
     }

     function list_all_project()
     {
     	$result=$this->db->query('Select * from Project');
     	return $result;
     }

     public function list_project_name($PID)
     {
     	$query=$this->db->query('Select PName_th from Project Where PID="'.$PID.'"');
     	$result=$query->row();
     	return $result->PName_th;
     }

     public function list_email($id)
     {
     	$query=$this->db->query('Select email from users Where id="'.$id.'"');
     	$result=$query->row();
     	return $result->email;
     }

     public function project_developer()
     {
     	$checkAdmin=$this->backend->checkAdmin();
     	if ($checkAdmin==1){
     		$ChkLogin=$this->ChkLogin();
     		$header=$this->header_inc($ChkLogin);
     		$profile=$this->user_profile($ChkLogin);
     		$this->load->view($header,$profile);
     		$data['list_project']=$this->list_project();
     		$data['list_developer']=$this->list_developer();
     		$data['list_all_project']=$this->list_all_project();
     		$data['myClass'] = $this;
     		$this->load->view('/admin/project_developer',$data);
     		$this->load->view('footerstandard');
     		$this->load->view('footer_home');
     	};
     }

     public function add_project_developer()
     {
     	$checkAdmin=$this->backend->checkAdmin();
     	if ($checkAdmin==1){
     		$user_id=$_POST['user_id'];
     		$PID=$_POST['PID'];
     		$Telephone=$_POST['Telephone'];
     		$result=$this->db->query('Select * from ProjectDeveloper Where user_id="'.$user_id.'" and PID="'.$PID.'"');
     		if ($result->num_rows()==0){
     			$this->db->query('Insert into ProjectDeveloper set user_id="'.$user_id.'", PID="'.$PID.'", Telephone="'.$Telephone.'"');
     		}
     		$this->project_developer();
     	}
     }

     public function remove_project_developer()
     {
     	$id=$this->uri->segment(3);
     	$checkAdmin=$this->backend->checkAdmin();
     	if ($checkAdmin==1){
     		$this->db->query('delete from ProjectDeveloper Where id="'.$id.'"');
     	}
     	$this->project_developer();
     }

     function list_room()
     {
     	$result=$this->db->query('Select * from ProjectDeveloperRoom Order By PID');
     	return $result;
     }

     public function group_picture()
     {
     	$checkAdmin=$this->backend->checkAdmin();
     	if ($checkAdmin==1){
     		$ChkLogin=$this->ChkLogin();
     		$header=$this->header_inc($ChkLogin);
     		$profile=$this->user_profile($ChkLogin);
     		$this->load->view($header,$profile);
     		$data['list_project']=$this->list_project();
     		$data['list_room']=$this->list_room();
     		$data['myClass'] = $this;
     		$this->load->view('/admin/group_picture',$data);
     		$this->load->view('footerstandard');
     		$this->load->view('footer_home');
     	};
     }

     public function add_group_picture()
     {
     	$checkAdmin=$this->backend->checkAdmin();
     	if ($checkAdmin==1){
     		$PID=$_POST['PID'];
     		$RoomName=$_POST['RoomName'];
     		$result=$this->db->query('Select * from ProjectDeveloperRoom Where PID="'.$PID.'" and RoomName="'.$RoomName.'"');
     		$CheckRow=$result->num_rows();
     		if ($CheckRow==0){
     			$this->db->query('insert into ProjectDeveloperRoom set PID="'.$PID.'", RoomName="'.$RoomName.'"');
     		};
     	};
     	$this->group_picture();
     }

     public function delete_RoomName()
     {
     	$checkAdmin=$this->backend->checkAdmin();
     	if ($checkAdmin==1){
     		$id=$this->uri->segment(3);
     		$this->db->query('delete from ProjectDeveloperRoom Where id="'.$id.'"');
     		$this->group_picture();
     	}
     }

     public function add_room_picture()
     {
     	$checkAdmin=$this->backend->checkAdmin();
     	if ($checkAdmin==1){
     		$ChkLogin=$this->ChkLogin();
     		$header=$this->header_inc($ChkLogin);
     		$profile=$this->user_profile($ChkLogin);
     		$PID=$this->uri->segment(3);
     		$id=$this->uri->segment(4);
     		$query=$this->db->query('Select RoomName from ProjectDeveloperRoom Where id="'.$id.'"');
     		$row=$query->row();
     		$RoomName=$row->RoomName;
     		$data['queryImgRoom']=$this->backend->queryImgRoom($PID,$RoomName);
     		$data['PID']=$PID;
     		$data['RoomName']=$RoomName;

      //BreakCodeing Wait when home

     		$this->load->view($header,$profile);
     		$this->load->view('/admin/addRoomPicture',$data);
     		$this->load->view('/admin/footeraddroom');
     	}
     }

     public function uploadResizedRoom()
     {
     	if ($_POST) {
     		$userid=$this->session->userdata('user_id');
     		$token=$this->session->userdata('token');
     		$PID=$_POST['PID'];
     		$RoomName=$_POST['RoomName'];
     		define('IMG_DIR', 'projImg/'.$PID.'/'.$RoomName.'/');
             if(!is_dir(IMG_DIR)) //create the folder if it's not already exists
             {
             	mkdir(IMG_DIR,0755,TRUE);
             }
             define('UPLOAD_DIR', 'projImg/'.$PID.'/'.$RoomName.'/');
             $img = $_POST['image'];
			//$imgType= $_POST['imgType'];

             $orit=$_POST['orit'];
             $img = str_replace('data:image/jpeg;base64,', '', $img);
             $img = str_replace(' ', '+', $img);
             $data = base64_decode($img);
             $file = UPLOAD_DIR . uniqid() . '.jpg';
             $success = file_put_contents($file, $data);
             print $success ? $file : 'Unable to save the file.';
             $record=$file;
             $inFile = $file;
             $outFile = UPLOAD_DIR .'A'. uniqid() . '.jpg';
             $image = new Imagick($inFile);
             if ($orit==3){
             	$image->rotateImage(new ImagickPixel('none'), 180);
             }
             if ($orit==6){
             	$image->rotateImage(new ImagickPixel('none'), 90);
             }
             if ($orit==8){
             	$image->rotateImage(new ImagickPixel('none'), -90);
             }
             $width=$image->getImageWidth();
             $height=$image->getImageHeight();
             if ($height<600){
             	$width=$width*600/$height;
             	$image->scaleImage($width, 600);
             }
             $ratio=$width/600;
             if ($ratio>2.1){
             	$center_width=round($width/2);
             	$start_width=$center_width-630;
             	$image->cropImage(1260,600,$start_width,0);
//				$image->writeImage($outFile);
//				$record=$outFile;
             }
             $watermark = new Imagick();
             $watermark->readImage("img/water.png");
			// how big are the images?
             $iWidth = $image->getImageWidth();
             $iHeight = $image->getImageHeight();
             $wWidth = $watermark->getImageWidth();
             $wHeight = $watermark->getImageHeight();

             if ($iHeight < $wHeight || $iWidth < $wWidth) {
				// resize the watermark
             	$watermark->scaleImage($iWidth, $iHeight);

				// get new size
             	$wWidth = $watermark->getImageWidth();
             	$wHeight = $watermark->getImageHeight();
             }

			// calculate the position
             $x = ($iWidth - $wWidth) / 2;
             $y = ($iHeight - $wHeight) / 2;

             $image->compositeImage($watermark, imagick::COMPOSITE_OVER, $x, $y);
             $image->writeImage($outFile);
             $record=$outFile;
			//$query=$this->db->query('select POID from Post Where Token="'.$token.'"');
			//$row=$query->row();
			//$POID=$row->POID;
			//$this->db->query('insert into ImagePost set POID="'.$POID.'", file="/'.$record.'", type="'.$imgType.'"');
             $this->db->query('insert into checkUpload set user_id="'.$userid.'", token="'.$token.'"');
             unlink($file);
      //error_log($outFile,0);
         }
     }

     public function delImgRoomProject()
     {
     	$checkAdmin=$this->backend->checkAdmin();
     	if ($checkAdmin==1){
     		$PID=$this->uri->segment(4);
     		$RoomName=$this->uri->segment(5);
     		$Img=$this->uri->segment(6);
			//echo $PID." ".$Img;
     		$this->backend->delImg2($PID,$RoomName,$Img);
     		$this->group_picture();
     	};
     }

     public function movepost()
     {
     	$checkAdmin=$this->backend->checkAdmin();
     	if ($checkAdmin==1){
     		$ChkLogin=$this->ChkLogin();
     		$header=$this->header_inc($ChkLogin);
     		$profile=$this->user_profile($ChkLogin);
      //check $_POST before query users
     		$queryUser="null";
     		if ($_POST['search_poid']!="null" && $_POST['search_poid']!=""){
     			$POID=$_POST['search_poid'];
     			$queryUserID=$this->db->query('Select user_id from Post Where POID="'.$POID.'"');
     			$UserID=$queryUserID->row()->user_id;
     			$queryUser=$this->db->query('Select * from users where id="'.$UserID.'"');
     		}
     		if ($_POST['search_telphone']!="null" && $_POST['search_telphone']!=""){
     			$Telephone=$_POST['search_telphone'];
     			$queryUserID=$this->db->query('Select DISTINCT user_id from Post Where Telephone1="'.$Telephone.'" or Telephone2="'.$Telephone.'" or BackupTelephone="'.$Telephone.'"');
     			$i=1;
     			foreach ($queryUserID->result() as $row) {
     				if ($i==1){
     					$UserID=$row->user_id;
     				} else {
     					$UserID=$UserID.",".$row->user_id;
     				}
     				$i++;
     			}
     			$queryUser=$this->db->query('Select * from users where id in ('.$UserID.')');
     		}
     		if ($_POST['search_email']!="null" && $_POST['search_email']!=""){
     			$email=$_POST['search_email'];
     			$queryUser=$this->db->query('Select * from users Where email like "%'.$email.'%"');
     		}
     		if ($_POST['search_firstname']!="null" && $_POST['search_firstname']!=""){
     			$firstname=$_POST['search_firstname'];
     			$queryUser=$this->db->query('Select * from users Where firstname like "%'.$firstname.'%"');
     		}
     		if ($_POST['search_lastname']!="null" && $_POST['search_lastname']!=""){
     			$lastname=$_POST['search_lastname'];
     			$queryUser=$this->db->query('Select * from users Where lastname like "%'.$lastname.'%"');
     		}
      //Move post
     		if ($_POST['POID']!="null" && $_POST['user_id']!="null" && isset($_POST['user_id'])){
     			$user_id=$_POST['user_id'];
     			$POID=$_POST['POID'];
     			$this->db->query('update Post set user_id="'.$user_id.'" where POID="'.$POID.'"');
     			$data['txtSus']="ย้ายประกาศ ".$POID." ไปให้  user_id ".$user_id." เรียบร้อย";
     		} else {
     			$data['txtSus']="null";
     		}
      //BreakCodeing Wait when home
     		$data['User']=$queryUser;
     		$this->load->view($header,$profile);
     		$this->load->view('/admin/movepost',$data);
     		$this->load->view('footerstandard');
     		$this->load->view('footer_home');
     	}

     }

     public function userAnalysis(){
     	$checkAdmin=$this->backend->checkAdmin();
     	$nowdate=date('Y-m-d');
     	if ($checkAdmin==1){
     		$ChkLogin=$this->ChkLogin();
     		$header=$this->header_inc($ChkLogin);
     		$profile=$this->user_profile($ChkLogin);
     		$data['nowdate'] = $nowdate;
     		$data['StartDate'] = $nowdate;
     		$data['EndDate'] = $nowdate;
     		$this->load->view($header,$profile);
     		$this->load->view('/admin/userAnalysis',$data);
     		$this->load->view('footer_search');
     	}
     }

     public function userAnalysisList(){
     	$checkAdmin=$this->backend->checkAdmin();
     	$nowdate=date('Y-m-d');
     	if ($checkAdmin==1){
     		$ChkLogin=$this->ChkLogin();
     		$header=$this->header_inc($ChkLogin);
     		$profile=$this->user_profile($ChkLogin);
     		$data['listUser']=$this->backend->userAnalysisList($_POST);
     		$data['nowdate'] = $nowdate;
     		if ($_POST){
     			$data['Email'] = $_POST['Email'];
     			$data['FirstName'] = $_POST['FirstName'];
     			$data['LastName'] = $_POST['LastName'];
     			$data['Telephone'] = $_POST['Telephone'];
     			$data['SelYear'] = $_POST['SelYear'];
     			$data['SelMonth'] = $_POST['SelMonth'];
				//$data['StartDate'] = $_POST['StartDate'];
				//$data['EndDate'] = $_POST['EndDate'];
     			$data['SortPost'] = $_POST['SortPost'];
     		} else {
     			$data['Email'] = "";
     			$data['FirstName'] = "";
     			$data['LastName'] = "";
     			$data['Telephone'] = "";
     			$data['SelYear'] = "";
     			$data['SelMonth'] = "";
				//$data['StartDate'] = "";
				//$data['EndDate'] = "";
     			$data['SortPost'] = 1;
     		}
     		$this->load->view($header,$profile);
     		$this->load->view('/admin/userAnalysis',$data);
     		$this->load->view('/admin/userAnalysisList',$data);
     		$this->load->view('footer_search');
     	}
     }

     public function userAnalysisListUnit(){
     	$checkAdmin=$this->backend->checkAdmin();
     	if ($checkAdmin==1){
     		$ChkLogin=$this->ChkLogin();
     		$header=$this->header_inc($ChkLogin);
     		$profile=$this->user_profile($ChkLogin);
     		$data['type']=$this->uri->segment(3);
     		$data['user_id']=$this->uri->segment(4);
     		$data['SelYear']=$this->uri->segment(5);
     		$data['SelMonth']=$this->uri->segment(6);
     		$data['start_day']=$this->uri->segment(7);
     		$data['end_day']=$this->uri->segment(8);
     		$data['listUnit']=$this->backend->userAnalysisListUnit($data);
     		$this->load->view($header,$profile);
     		$this->load->view('/admin/userAnalysisListUnit',$data);
     		$this->load->view('footer_search');
     	}
     }

     public function transferUnit(){
     	$checkAdmin=$this->backend->checkAdmin();
     	if ($checkAdmin==1){
     		$ChkLogin=$this->ChkLogin();
     		$header=$this->header_inc($ChkLogin);
     		$profile=$this->user_profile($ChkLogin);
     		$this->load->view($header,$profile);
     		$this->load->view('/admin/transferUnit');
     		$this->load->view('footer_search');
     	}
     }

     public function transferUnitList(){
     	$checkAdmin=$this->backend->checkAdmin();
     	if ($checkAdmin==1){
     		$ChkLogin=$this->ChkLogin();
     		$header=$this->header_inc($ChkLogin);
     		$profile=$this->user_profile($ChkLogin);
     		$data['listUnit']=$this->backend->transferUnitList($_POST);
     		if ($_POST){
     			$data['MsgID'] = $_POST['MsgID'];
     			$data['EmailType'] = $_POST['EmailType'];
     			$data['Email'] = $_POST['Email'];
     		} else {
     			$data['MsgID'] = "";
     			$data['EmailType'] = "";
     			$data['Email'] = "";
     		}
     		$this->load->view($header,$profile);
     		$this->load->view('/admin/transferUnit',$data);
     		$this->load->view('/admin/transferUnitList',$data);
     		$this->load->view('footer_search');
     	}
     }

     public function transferUnitUpdate(){
     	$checkAdmin=$this->backend->checkAdmin();
     	if ($checkAdmin==1){
     		$ChkLogin=$this->ChkLogin();
     		$header=$this->header_inc($ChkLogin);
     		$profile=$this->user_profile($ChkLogin);
     		$success=$this->backend->transferUnitUpdate($_POST);
     		if($success==1){
     			$data['Alert']="Update Success";
     		}else{
     			$data['Alert']="ไม่พบ MsgID : ".$_POST['SelMsgID'];
     		}
     		$this->load->view($header,$profile);
     		$this->load->view('/admin/transferUnit',$data);
     		$this->load->view('footer_search');
     	}
     }

     public function addcoin()
     {
     	$checkAdmin=$this->backend->checkAdmin();
     	if ($checkAdmin==1){
     		$ChkLogin=$this->ChkLogin();
     		$header=$this->header_inc($ChkLogin);
     		$profile=$this->user_profile($ChkLogin);
      //BreakCodeing Wait when home
      //check $_POST before query users
     		$queryUser="null";
     		if ($_POST['search_poid']!="null" && $_POST['search_poid']!=""){
     			$POID=$_POST['search_poid'];
     			$queryUserID=$this->db->query('Select user_id from Post Where POID="'.$POID.'"');
     			$UserID=$queryUserID->row()->user_id;
     			$queryUser=$this->db->query('Select * from users where id="'.$UserID.'"');
     		}
     		if ($_POST['search_user_id']!="null" && $_POST['search_user_id']!=""){
     			$queryUser=$this->db->query('Select * from users where id="'.$_POST['search_user_id'].'"');
     		}
     		if ($_POST['search_messenger_id']!="null" && $_POST['search_messenger_id']!=""){
     			$queryUser=$this->db->query('Select * from users where messengerID="'.$_POST['search_messenger_id'].'"');
     		}
     		if ($_POST['search_telphone']!="null" && $_POST['search_telphone']!=""){
     			$Telephone=$_POST['search_telphone'];
     			$queryUserID=$this->db->query('Select DISTINCT user_id from Post Where Telephone1="'.$Telephone.'" or Telephone2="'.$Telephone.'" or BackupTelephone="'.$Telephone.'"');
     			$i=1;
     			foreach ($queryUserID->result() as $row) {
     				if ($i==1){
     					$UserID=$row->user_id;
     				} else {
     					$UserID=$UserID.",".$row->user_id;
     				}
     				$i++;
     			}
     			$queryUser=$this->db->query('Select * from users where id in ('.$UserID.')');
     		}
     		if ($_POST['search_email']!="null" && $_POST['search_email']!=""){
     			$email=$_POST['search_email'];
     			$queryUser=$this->db->query('Select * from users Where email like "%'.$email.'%"');
     		}
     		if ($_POST['search_firstname']!="null" && $_POST['search_firstname']!=""){
     			$firstname=$_POST['search_firstname'];
     			$queryUser=$this->db->query('Select * from users Where firstname like "%'.$firstname.'%"');
     		}
     		if ($_POST['search_lastname']!="null" && $_POST['search_lastname']!=""){
     			$lastname=$_POST['search_lastname'];
     			$queryUser=$this->db->query('Select * from users Where lastname like "%'.$lastname.'%"');
     		}
     		if ($_POST['AddCoin']==1){
     			$this->credit->AddCreditAdmin($_POST['user_id'],$_POST['coin'],$_POST['RefNumber']);
     		}
     		$data['User']=$queryUser;
     		$this->load->view($header,$profile);
     		$this->load->view('/admin/addcoin',$data);
     		$this->load->view('footerstandard');
     		$this->load->view('footer_home');
     	}
     }

     public function blockboostpost()
     {
     	$checkAdmin=$this->backend->checkAdmin();
     	if ($checkAdmin==1){
     		$query=$this->db->query('Select * from cCreditJob where Active=1');
     		if ($query->num_rows()==0){
     			$data['ListActive']="null";
     		} else {
     			$data['ListActive']=$query;
     		}
     		$query=$this->db->query('Select * from cCreditJob where Active=5 and POID not in (Select POID from cCreditJob Where Active=7) and POID not in (Select POID from cCreditJob where Active=1) order by POID');
     		if ($query->num_rows()==0){
     			$data['ListBlock']="null";
     		} else {
     			$data['ListBlock']=$query;
     		}
     		$query=$this->db->query('Select * from cCreditJob where Active=7');
     		if ($query->num_rows()==0){
     			$data['ListWait']="null";
     		} else {
     			$data['ListWait']=$query;
     		}
     		$ChkLogin=$this->ChkLogin();
     		$header=$this->header_inc($ChkLogin);
     		$profile=$this->user_profile($ChkLogin);
     		$this->load->view($header,$profile);
     		$this->load->view('/admin/blockboostpost',$data);
     		$this->load->view('footerstandard');
     		$this->load->view('footer_home');
     	}
     }

     public function blockboost()
     {
     	$checkAdmin=$this->backend->checkAdmin();
     	if ($checkAdmin==1){
     		$ChkLogin=$this->ChkLogin();
     		$header=$this->header_inc($ChkLogin);
     		$profile=$this->user_profile($ChkLogin);
     		$data['JobID']=$this->uri->segment(3);
     		$this->load->view($header,$profile);
     		$this->load->view('/admin/remarkblock',$data);
     		$this->load->view('footerstandard');
     		$this->load->view('footer_home');
     	}
     }

     public function blockboost2()
     {
     	$checkAdmin=$this->backend->checkAdmin();
     	if ($checkAdmin==1){
     		$JobID=$_POST['JobID'];
     		$this->db->query('Update cCreditJob set Remark="'.$_POST['Remark'].'" where JobID="'.$JobID.'"');
     		$this->credit->blockboost($JobID);
     		$this->blockboostpost();
     	}
     }

     public function unblockboost()
     {
     	$checkAdmin=$this->backend->checkAdmin();
     	if ($checkAdmin==1){
     		$JobID=$this->uri->segment(3);
     		$this->credit->unblockboost($JobID);
     		$this->blockboostpost();
     	}
     }

     public function logrenewpost()
     {
     	$checkAdmin=$this->backend->checkAdmin();
     	if ($checkAdmin==1){
     		$data['LogRenewPost']=$this->db->query('Select RenewDate, sum(ByEmail) as ByEmail, sum(ByMessenger) as ByMessenger, sum(ByAdmin) as ByAdmin from LogRenewPost Group by RenewDate');
     		$ChkLogin=$this->ChkLogin();
     		$header=$this->header_inc($ChkLogin);
     		$profile=$this->user_profile($ChkLogin);
     		$this->load->view($header,$profile);
     		$this->load->view('/admin/logrenewpost',$data);
     		$this->load->view('footerstandard');
     		$this->load->view('footer_home');
     	}
     }

     public function ctr()
     {
     	$checkAdmin=$this->backend->checkAdmin();
     	if ($checkAdmin==1){
     		$data['cCoinTransaction']=$this->db->query('Select * from cCoinTransaction');
     		$ChkLogin=$this->ChkLogin();
     		$header=$this->header_inc($ChkLogin);
     		$profile=$this->user_profile($ChkLogin);
     		$this->load->view($header,$profile);
     		$this->load->view('/admin/ctr',$data);
     		$this->load->view('footerstandard');
     		$this->load->view('footer_home');
     	}
     }

     public function newboostpost(){
     	$checkAdmin=$this->backend->checkAdmin();
     	if ($checkAdmin==1){
     		$ChkLogin=$this->ChkLogin();
     		$header=$this->header_inc($ChkLogin);
     		$profile=$this->user_profile($ChkLogin);
     		$this->load->view($header,$profile);
     		$this->load->view('/admin/boostpostnew');
     		$this->load->view('footerstandard');
     		$this->load->view('footer_home');
     	}
     }

     function boostPost(){
     	$this->session->set_userdata('lastpage','/');
     	$this->lang_check();
     	$checkAdmin=$this->backend->checkAdmin();
     	if($checkAdmin==1){
     		$query=$this->db->query('Select user_id from Post Where POID="'.$data['POID'].'"');
     		$user_id=$query->row()->user_id;
     		$data['ListPostType1']=$this->credit->ListPost($data['POID']);
     		$data['ListUnPost']=$this->dashboard->ListUnPost($user_id);
			//query data from old dashboard
			//$data['unlist']=$this->dashboard->check_unlist();
     		$data['clist']=$this->dashboard->check_list();
     		$data['qProblem']=$this->post->qProblem();
     		$data['qLineAlert']=$this->dashboard->qLineAlert();
     		$header=$this->header_inc($ChkLogin);
     		$profile=$this->user_profile($ChkLogin);
     		$this->load->view($header,$profile);
     		$queryJob=$this->db->query('select JobID from cCreditJob where POID="'.$data['POID'].'" and user_id="'.$user_id.'"');
     		if($queryJob->num_rows()==0){
     			$this->load->view('boostpost',$data);
     		}else{
     			$this->load->view('boostpost_edit',$data);
     		}
     		$this->load->view('dashboard_footer',$data);
     	}
     }

     function boostPostEdit(){
     	$this->session->set_userdata('lastpage','/');
     	$this->lang_check();
     	$ChkLogin=$this->ChkLogin();
     	$checkAdmin=$this->backend->checkAdmin();
     	if($checkAdmin==1){
			//$user_id=$this->session->userdata('user_id');
     		$data['POID']=$this->uri->segment(3);
     		$POID=$data['POID'];
     		$query=$this->db->query('Select user_id from Post Where POID="'.$POID.'"');
     		$user_id=$query->row()->user_id;
     		$data['date_type']=$this->uri->segment(4);
			//$this->credit->addlogbutton($user_id,$data['POID'],2);
     		$data['ListPostType1']=$this->credit->ListPost($data['POID']);
     		$data['ListUnPost']=$this->dashboard->ListUnPost($user_id);
			//query data from old dashboard
     		$data['unlist']=$this->dashboard->check_unlist();
     		$data['clist']=$this->dashboard->check_list();
     		$data['qProblem']=$this->post->qProblem();
     		$data['qLineAlert']=$this->dashboard->qLineAlert();
     		$header=$this->header_inc($ChkLogin);
     		$profile=$this->user_profile($ChkLogin);
     		$this->load->view($header,$profile);
     		$this->load->view('boostpost_edit',$data);
     		$this->load->view('dashboard_footer',$data);
     	}
     }

     public function viewCreditUse(){
     	$checkAdmin=$this->backend->checkAdmin();
     	$nowdate=date('Y-m-d');
     	if ($checkAdmin==1){
     		$ChkLogin=$this->ChkLogin();
     		$header=$this->header_inc($ChkLogin);
     		$profile=$this->user_profile($ChkLogin);
     		$data['nowdate'] = $nowdate;
     		$data['StartDate'] = $nowdate;
     		$data['EndDate'] = $nowdate;
     		$this->load->view($header,$profile);
     		$this->load->view('/admin/creditUse',$data);
     		$this->load->view('footerstandard');
     		$this->load->view('footer_home');
     	}
     }

     public function viewCreditUseList(){
     	$checkAdmin=$this->backend->checkAdmin();
     	if ($checkAdmin==1){
     		$data['start_date']=$_POST['start_date'];
     		$data['end_date']=$_POST['end_date'];
     		$data2['listCredit']=$this->backend->viewCreditUse($data['start_date'],$data['end_date']);
     		$ChkLogin=$this->ChkLogin();
     		$header=$this->header_inc($ChkLogin);
     		$profile=$this->user_profile($ChkLogin);
     		$this->load->view($header,$profile);
     		$this->load->view('/admin/creditUse',$data);
     		$this->load->view('/admin/creditUseList',$data2);
     		$this->load->view('footerstandard');
     		$this->load->view('footer_home');
     	}
     }

     public function viewCreditUseListDetail(){
     	$checkAdmin=$this->backend->checkAdmin();
     	if ($checkAdmin==1){
     		$data['operate_date']=$this->uri->segment(3);
     		$data['user']=$this->uri->segment(4);
     		$data['POID']=$this->uri->segment(5);
     		$data['listDetail']=$this->backend->viewCreditUseDetail($data['operate_date'],$data['user'],$data['POID']);
     		$ChkLogin=$this->ChkLogin();
     		$header=$this->header_inc($ChkLogin);
     		$profile=$this->user_profile($ChkLogin);
     		$this->load->view($header,$profile);
     		$this->load->view('/admin/creditUseListDetail',$data);
     		$this->load->view('footerstandard');
     		$this->load->view('footer_home');
     	}
     }

     public function viewUnitBoostPost(){
     	$checkAdmin=$this->backend->checkAdmin();
     	if ($checkAdmin==1){
     		$data['viewType']='default';
     		$ChkLogin=$this->ChkLogin();
     		$header=$this->header_inc($ChkLogin);
     		$profile=$this->user_profile($ChkLogin);
     		$this->load->view($header,$profile);
     		$this->load->view('/admin/unitBoostPost',$data);
     		$this->load->view('footerstandard');
     		$this->load->view('footer_home');
     	}
     }

     public function viewUnitBoostPostList(){
     	$checkAdmin=$this->backend->checkAdmin();
     	if ($checkAdmin==1){
     		$viewType=$_POST['viewType'];
     		$data['viewType']=$viewType;
     		$data2['queryPost']=$this->backend->viewUnitBoostPost($viewType);
     		$ChkLogin=$this->ChkLogin();
     		$header=$this->header_inc($ChkLogin);
     		$profile=$this->user_profile($ChkLogin);
     		$this->load->view($header,$profile);
     		$this->load->view('/admin/unitBoostPost',$data);
     		$this->load->view('/admin/unitBoostPostList',$data2);
     		$this->load->view('footerstandard');
     		$this->load->view('footer_home');
     	}
     }

     public function viewDailyAdSummary(){
     	$checkAdmin=$this->backend->checkAdmin();
     	$nowdate=date('Y-m-d');
     	if ($checkAdmin==1){
     		$ChkLogin=$this->ChkLogin();
     		$header=$this->header_inc($ChkLogin);
     		$profile=$this->user_profile($ChkLogin);
     		$data['nowdate'] = $nowdate;
     		$data['StartDate'] = $nowdate;
     		$data['EndDate'] = $nowdate;
     		$this->load->view($header,$profile);
     		$this->load->view('/admin/dailyAdSummary',$data);
     		$this->load->view('footerstandard');
     		$this->load->view('footer_home');
     	}
     }

     public function viewDailyAdSummaryList(){
     	$checkAdmin=$this->backend->checkAdmin();
     	if ($checkAdmin==1){
     		$data['start_date']=$_POST['start_date'];
     		$data['end_date']=$_POST['end_date'];
     		$data2['listCredit']=$this->backend->dailyAdSummary($data['start_date'],$data['end_date']);
     		$ChkLogin=$this->ChkLogin();
     		$header=$this->header_inc($ChkLogin);
     		$profile=$this->user_profile($ChkLogin);
     		$this->load->view($header,$profile);
     		$this->load->view('/admin/dailyAdSummary',$data);
     		$this->load->view('/admin/dailyAdSummaryList',$data2);
     		$this->load->view('footerstandard');
     		$this->load->view('footer_home');
     	}
     }

     public function viewDailyAdSummaryListDetail(){
     	$checkAdmin=$this->backend->checkAdmin();
     	if ($checkAdmin==1){
     		$data['operate_date']=$this->uri->segment(3);
     		$data['listDetail']=$this->backend->dailyAdSummaryDetail($data['operate_date'],$data['operate_date']);
     		$ChkLogin=$this->ChkLogin();
     		$header=$this->header_inc($ChkLogin);
     		$profile=$this->user_profile($ChkLogin);
     		$this->load->view($header,$profile);
     		$this->load->view('/admin/dailyAdSummaryListDetail',$data);
     		$this->load->view('footerstandard');
     		$this->load->view('footer_home');
     	}
     }

     public function copypost(){
     	$checkAdmin=$this->backend->checkAdmin();
     	if ($checkAdmin==1){
     		$ChkLogin=$this->ChkLogin();
     		$header=$this->header_inc($ChkLogin);
     		$profile=$this->user_profile($ChkLogin);
     		$this->load->view($header,$profile);
     		$this->load->view('/admin/copypostform');
     		$this->load->view('footerstandard');
     		$this->load->view('footer_home');
     	}
     }

     public function dupsellrent(){
     	$checkAdmin=$this->backend->checkAdmin();
     	if ($checkAdmin==1){
     		$POID=$_POST['POID'];
     		$TOAdvertising=$_POST['TOAdvertising'];
     		$queryPost=$this->db->query('select TOAdvertising from Post where POID="'.$POID.'"');
     		$TOAdvertising=$queryPost->row()->TOAdvertising;
     		if($TOAdvertising==1){
     			$new_Advertising=5;
     		}else if($TOAdvertising==5){
     			$new_Advertising=1;
     		}else{
     			$new_Advertising=$_POST['TOAdvertising'];
     		}
     		$this->db->query('CREATE TEMPORARY TABLE tmp SELECT * from Post WHERE POID="'.$POID.'"');
     		$this->db->query('ALTER TABLE tmp drop POID');
     		$token=time();
     		$token=md5($token);
     		$this->db->query('Update tmp set TOAdvertising="'.$new_Advertising.'", Active=0, Token="'.$token.'"');
     		$this->db->query('INSERT INTO Post SELECT 0,tmp.* FROM tmp;');
     		$this->db->query('Drop TEMPORARY TABLE tmp');
     		$query=$this->db->query('Select POID from Post Where Token="'.$token.'"');
     		$new_POID=$query->row()->POID;
     		$this->db->query('CREATE TEMPORARY TABLE tmp SELECT * from ImagePost WHERE POID="'.$POID.'"');
     		$this->db->query('ALTER TABLE tmp drop ImgID');
     		$this->db->query('update tmp Set POID="'.$new_POID.'"');
     		$this->db->query('INSERT INTO ImagePost SELECT 0,tmp.* FROM tmp;');
     		$this->db->query('Drop TEMPORARY TABLE tmp');
     		$this->db->query('CREATE TEMPORARY TABLE tmp SELECT * from PostCondoSpec WHERE POID="'.$POID.'"');
     		$this->db->query('ALTER TABLE tmp drop ID');
     		$this->db->query('update tmp Set POID="'.$new_POID.'"');
     		$this->db->query('INSERT INTO PostCondoSpec SELECT 0,tmp.* FROM tmp;');
     		$this->db->query('Drop TEMPORARY TABLE tmp');
     		redirect('/zhome/adminViewUnitDetail/'.$new_POID, 'location');
     	}
     }

     public function addPromoCode(){
     	$checkAdmin=$this->backend->checkAdmin();
     	if ($checkAdmin==1){
			//$data['promotionCode'] = Promotion::generatePromotionCode();
     		$data['promotionCode']='';
     		$data['qPromoType']=$this->backend->qPromoType();
     		$data['qPromoUserType']=$this->backend->qPromoUserType();
     		$data['qPromoReuseType']=$this->backend->qPromoReuseType();
     		$data2['listDetail']=$this->backend->listPromoCode('');
     		$ChkLogin=$this->ChkLogin();
     		$header=$this->header_inc($ChkLogin);
     		$profile=$this->user_profile($ChkLogin);
     		$this->load->view($header,$profile);
     		$this->load->view('/admin/addPromoCode', $data);
     		$this->load->view('/admin/listPromoCode',$data2);
     		$this->load->view('footerstandard');
     		$this->load->view('footer_home');
     	}
     }
     public function savePromoCode(){
     	$data = array(
     		'PromoCode'=>$_REQUEST['PromoCode'],
     		'PromoType'=>$_REQUEST['PromoType'],
     		'user_type'=>$_REQUEST['qPromoUserType'],
     		'user_quantity'=>isset($_REQUEST['noOfUsers']) ? $_REQUEST['noOfUsers'] : null,
     		'reuse' =>$_REQUEST['qPromoReuseType'],
     		'reuse_quantity'=>isset($_REQUEST['reuseLimit']) ? $_REQUEST['reuseLimit'] : null,
     		'value' =>$_REQUEST['PromotionValue'],
     		'start_date'=>$_REQUEST['start_date'],
     		'end_date'=>$_REQUEST['end_date'],
     		'Active'=>1
     		);
     	$this->db->insert('cCreditPromotion',$data);
     	redirect('/admin/listPromoCode/'.$_REQUEST['PromoCode']);
     }

     public function listPromoCode(){
     	$checkAdmin=$this->backend->checkAdmin();
     	if ($checkAdmin==1){
     		$PromoCode=$this->uri->segment(3);
     		if(isset($PromoCode) and $PromoCode<>null){
     			$data['PromoCode']=$PromoCode;
     		}else{
     			$data['PromoCode']='';
     		}
     		$data['promotionCode']='';
     		$data['qPromoType']=$this->backend->qPromoType();
     		$data['qPromoUserType']=$this->backend->qPromoUserType();
     		$data['qPromoReuseType']=$this->backend->qPromoReuseType();
     		$data2['listDetail']=$this->backend->listPromoCode($data['PromoCode']);
     		$ChkLogin=$this->ChkLogin();
     		$header=$this->header_inc($ChkLogin);
     		$profile=$this->user_profile($ChkLogin);
     		$this->load->view($header,$profile);
     		$this->load->view('/admin/addPromoCode', $data);
     		$this->load->view('/admin/listPromoCode',$data2);
     		$this->load->view('footerstandard');
     		$this->load->view('footer_home');
     	}
     }

	//ad control 
     public function adControl(){
     	$checkAdmin=$this->backend->checkAdmin();
     	if ($checkAdmin==1){
     		$ChkLogin=$this->ChkLogin();
     		$header=$this->header_inc($ChkLogin);
     		$profile=$this->user_profile($ChkLogin);
     		$this->load->view($header,$profile);
     		$this->load->view('/admin/adControl', $data);
     		$this->load->view('footerstandard');
     		$this->load->view('footer_home');
     	}
     }

     public function updateAdControl(){
     	if($this->input->post('upload')) {
     		$config['upload_path']= './img/';
     		$config['allowed_types']= 'gif|jpg|png|jpeg';
     		$config['overwrite'] = FALSE;
     		$config['max_size']= 8000;
     		$config['max_width']= 1024;
     		$config['max_height']= 768;
     		$this->load->library('upload', $config);
     		foreach($_FILES as $fieldname => $file){
     			if(!empty($file['name'])){
     				try {
     					$deviceType = strpos($fieldname, '_')?2:1;
     					if (!empty($file['name'])){
     						$this->upload->initialize($config);
     						if ( ! $this->upload->do_upload($fieldname)){
     							$error = array('error' => $this->upload->display_errors());
     							print_r($error);
     						}else{
     							$data = array('upload_data' => $this->upload->data());
     						}
     					}

     					$data = array(
     						'page'=>$fieldname,
     						'device_type'=>$deviceType,
     						'filepath'=> $config['upload_path'].$file['name'],
     						'filename'=>$file['name'],
     						'Active'=>1,
     						'DateTime'=>date("Y-m-d h:i:sa")
     						);

     					$this->db->insert('ImageAd',$data);
     				} catch (Exception $e) {
     					$error = $e->getMessage();
     				}
     			}
     		}
     	}
     }

     public function listAdControl(){
     	$checkAdmin=$this->backend->checkAdmin();
     	if ($checkAdmin==1){
     		$ChkLogin=$this->ChkLogin();
     		$header=$this->header_inc($ChkLogin);
     		$profile=$this->user_profile($ChkLogin);
     		$this->load->view($header,$profile);
     		$data['listAdControl']=$this->backend->listAdControl();
     		$header=$this->header_inc($ChkLogin);
     		$profile=$this->user_profile($ChkLogin);
     		$this->load->view('listAdControl',$data);
     		$this->load->view('footerstandard');
     		$this->load->view('footer_home');
     	}
     } 

     public function adControlActive(){
     	$object =$_POST['data'];
     	$array = json_decode($object);
     	$pieces = explode(",", $object);
     	$query=$this->db->query('update ImageAd set Active= "'.$array[1].'" Where id="'.$array[0].'"');
     	$array = array('success' => 'true');
     	echo json_encode($array);
     }

     // public function adControlInActive(){
     // 	$object =$_POST['data'];
     // 	$array = json_decode($object);
     // 	$pieces = explode(",", $object);
     // 	$query=$this->db->query('update ImageAd set Active= "'.$array[1].'" Where id="'.$array[0].'"');
     // 	$array = array('success' => 'true');
     // 	echo json_encode($array);
     // }
//End Line CI_Controller Admin
 }
 ?>
