<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Zhome extends CI_Controller {

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
	}
						    
	public function index()
	{
		$this->session->set_userdata('last_page','/');
		$this->session->set_userdata('token'.'');
		$this->lang_check();
		$ChkLogin=$this->ChkLogin();
		$header=$this->header_inc($ChkLogin);
		$profile=$this->user_profile($ChkLogin);
		$this->load->view($header,$profile);
		$this->load->view('home');
		$this->load->view('footerstandard');
		$this->load->view('footer_home');
	}

	public function dashboard()
	{
		$this->session->set_userdata('token'.'');
		$this->post->DelTmpPost();
		$ChkLogin=$this->ChkLogin();
		$header=$this->header_inc($ChkLogin);
		$profile=$this->user_profile($ChkLogin);
		$this->load->view($header,$profile);
		$data['unlist']=$this->dashboard->check_unlist();
		$data['clist']=$this->dashboard->check_list();
		if ($ChkLogin==1){
			$this->load->view('dashboard',$data);
		};
		$this->load->view('footer');
	}

	public function AddDateExpire()
	{
		$Token=$this->uri->segment(3);
		$this->dashboard->AddDateExpire($Token);
		$this->dashboard();
	}

	public function EditPost2()
	{
		$Token=$this->uri->segment(3);
		$this->session->set_userdata('token',$Token);
		$this->post->deactive($Token);
		$this->post11();
	}

	public function EditPost()
	{
			$this->session->set_userdata('token',$_POST['Token']);
			$Token=$_POST['Token'];
			$this->post->deactive($Token);
			$query=$this->db->query('Select Step1, Step2, Step3, Step4, Step5 from Post Where Token="'.$Token.'"');
			$row=$query->row();
			if ($row->Step1==0){
				$this->post11();
			} else {
				if ($row->Step2==0){
					$this->post2();
				} else {
					if ($row->Step3==0){
						$this->post3();
					} else {
						if ($row->Step4==0){
							$this->post4();
						} else {
							$this->post5();
						}
					}
				}
			}
	}

	function ChkLogin()
	{
	    if (!$this->tank_auth->is_logged_in()) {
			return 0;
	    } else {
			return 1;
		}
	}

	public function index_2()
	{
	    if (!$this->tank_auth->is_logged_in()) {
		redirect('/auth/login/');
	    } else {
		//$data['user_id']	= $this->tank_auth->get_user_id();
		//$data['username']	= $this->tank_auth->get_username();
		$user_data = $this->users->get_user_by_id($this->tank_auth->get_user_id(),1);
		$data['firstname'] = $user_data->firstname;
		$data['lastname'] = $user_data->lastname;
		if( !$this->session->userdata('image') == '' ){
		    $data['image'] = $this->session->userdata('image');
		}else{
		    $data['image'] = '/images/blank_man.gif';
		}
		echo var_dump($user_data);
		echo var_dump($this->session->userdata());
		$this->load->view('welcome', $data);
		//echo $this->session->userdata('user_id');
	    }
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
		};
		return $data;
	}


	function lang_check()
	{
		if (!$this->session->userdata('lang')){
			$this->session->set_userdata('lang','th');
		};
	}
	
	public function change_lang()
	{
		if ($this->session->userdata('lang')=="th"){
			$this->session->set_userdata('lang','en');
		} else {
			$this->session->set_userdata('lang','th');
		}
		redirect($this->session->userdata('lastpage'));
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

	public function post1()
	{
		$KeyNewPost = $this->uri->segment(3);
		$this->post->DelTmpPost();
		if ($KeyNewPost=="newpost"){
			$this->post->newPost2();
		} else {
			$this->post->newPost();
		};
		$this->session->set_userdata('lastpage','/');
		$this->lang_check();
		$ChkLogin=$this->ChkLogin();
		$header=$this->header_inc($ChkLogin);
		$profile=$this->user_profile($ChkLogin);

		$map = $this->postMapChange();
		$data['map'] = $map;
		$profile['map'] = $map;
		$profile['HSNumber']=3;
		$S['1']='<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&libraries=places"></script>';
		$S['2']='<script type="text/javascript">var centreGot = false;</script>';
		$profile['HSrc']=$S;

		$data['qProjectName']=$this->post->qProject();
		$data['qTOOwner']=$this->post->qTOOwner();
		$data['qTOProperty']=$this->post->qTOProperty();
		$data['qTOAdvertising']=$this->post->qTOAdvertising();
		$data['qPost']=$this->post->qPost();
		//$data['txtMapChange']=$this->txtMapChange();
		$this->load->view($header,$profile);
		$this->load->view('inputform1',$data);
		$this->load->view('footer_post1',$data);

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
		$S['1']='<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&libraries=places"></script>';
		$S['2']='<script type="text/javascript">var centreGot = false;</script>';
		$profile['HSrc']=$S;

		$data['qProjectName']=$this->post->qProject();
		$data['qTOOwner']=$this->post->qTOOwner();
		$data['qTOProperty']=$this->post->qTOProperty();
		$data['qTOAdvertising']=$this->post->qTOAdvertising();
		$data['qPost']=$this->post->qPost();
		$data['txtMapChange']=$this->txtMapChange();
		$this->load->view($header,$profile);
		$this->load->view('inputform1',$data);
		$this->load->view('footer_post1',$data);

	}

	public function update_coords()
	{
		$this->db->query('SET NAMES utf8');
        $this->db->query('SET character_set_results=utf8');
		$lat=$_POST['newLat'];
		$lng=$_POST['newLng'];
		$token=$this->session->userdata('token');
        $query=$this->db->query('Update Post set Lat="'.$lat.'", Lng="'.$lng.'" Where Token="'.$token.'"');
	}

	public function update_TOOwner()
    {
		$this->post->update_TOOwner($_POST);
	}

	public function update_TOProperty()
	{
		$this->post->update_TOProperty($_POST);	
	}

	public function update_TOAdvertising()
	{
		$this->post->update_TOAdvertising($_POST);
	}

	public function update_OwnerName()
	{
		$this->post->update_OwnerName($_POST);
	}

	public function update_ProjectName()
	{
		$this->post->update_ProjectName($_POST);
	}

	public function changePage1()
	{
	if ($this->post->checkPost('Agree_Owner')==0){
		echo "<script>alert('คุณไม่ใช้คนที่มีอำนาจในการตัดสินใจ ไม่สามารถดำเนินการต่อได้');window.location.href='/zhome/post11';</script>";
	} else {
		//Update Post data into database
		if (!$_POST['last_page']){
			$last_page=$this->session->userdata('last_page');
		} else {
			$last_page=$_POST['last_page'];
		}
		if ($last_page==1){
			$this->post->updatePost1($_POST);
		}
		if ($last_page==2){
			$this->post->updatePost2($_POST);
		}
		if ($last_page==31){
			$this->post->updatePost31($_POST);
		}
		if ($last_page==32){
			$this->post->updatePost32($_POST);
		}
		if ($last_page==33){
			$this->post->updatePost33($_POST);
		}
		if ($last_page==34){
			$this->post->updatePost34($_POST);
		}
		if ($last_page==35){
			$this->post->updatePost35($_POST);
		}
		if ($last_page==4){
			$this->post->updatePost4();
		}
		if ($last_page==5){
			$this->post->updatePost5();
			if ($_POST['key_change']==6){
				$this->dashboard();
			}
		}

		//Redirect into other page.
		if ($_POST['key_change']==0){
			$this->post11();
		}
		if ($_POST['key_change']==1){
			$this->post11();
		}
		if ($_POST['key_change']==2){
			$this->post2();
		}
		if ($_POST['key_change']==3){
			$this->post3();
		}
		if ($_POST['key_change']==4){
			$this->post4();
		}
		if ($_POST['key_change']==5){
			$this->post5();
		}
	}
	}

	public function changePage2()
	{
		$postPage = $this->uri->segment(3);
		//echo $postPage;
		if ($postPage==1){
			$this->post11();
		}
		if ($postPage==2){
			$this->post2();
		}
		if ($postPage==3){
			$this->post3();
		}
		if ($postPage==4){
			$this->post4();
		}	
		if ($postPage==5){
			$this->post5();
		}	
	}

	public function LatLngProject()
	{
		$this->post->LatLngProject($_GET);
	}
	
	public function post2()
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
		$profile['HSNumber']=2;
		$S['1']='<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&libraries=places"></script>';
		$profile['HSrc']=$S;
		$data['qProjectName']=$this->post->qProject();
		$data['TOCondoSpec1']=$this->post->TOCondoSpec(1);
		$data['TOCondoSpec2']=$this->post->TOCondoSpec(2);
		$data['TOCondoSpec3']=$this->post->TOCondoSpec(3);
		$this->load->view($header,$profile);
		$this->load->view('inputform2',$data);
		$this->load->view('footer_post2',$data);
	}
	
	public function updateCondoSpec()
	{
		$this->post->updateCondoSpec($_POST);
	}

	public function updatePost()
	{
		$this->post->updatePost($_POST);
	}

	public function updatePostDCondo()
	{
		$this->post->updatePostDCondo($_POST);
	}

	public function post3()
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
		$profile['HSNumber']=2;
		$S['1']='<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&libraries=places"></script>';
		$profile['HSrc']=$S;
		$data['qProjectName']=$this->post->qProject();
		$data['TOCondoSpec1']=$this->post->TOCondoSpec(1);
		$data['TOCondoSpec2']=$this->post->TOCondoSpec(2);
		$data['TOCondoSpec3']=$this->post->TOCondoSpec(3);
		$this->load->view($header,$profile);
		$checkAdvertising=$this->post->checkAdvertising();
		if ($this->post->checkPost('useArea')==0){
			echo "<script>alert('ต้องใส่พื้นที่ของสินทรัพย์ก่อน');window.location.href='/zhome/changePage2/2';</script>";
		} else {
			if ($checkAdvertising==1){
				$this->load->view('inputform31',$data);
				$this->load->view('footer_post3',$data);
			};
			if ($checkAdvertising==3){
				$this->load->view('inputform33',$data);
				$this->load->view('footer_post33',$data);
			};
			if ($checkAdvertising==4){
				$this->load->view('inputform34',$data);
				$this->load->view('footer_post34',$data);
			};
			if ($checkAdvertising==5){
				$this->load->view('inputform35',$data);
				$this->load->view('footerstandard');
				$this->load->view('footer_post35',$data);
			};
			if ($checkAdvertising==2){
				$this->load->view('inputform32',$data);
				$this->load->view('footer_post32',$data);
			};
		};
				
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
		$S['1']='<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&libraries=places"></script>';
		$profile['HSrc']=$S;
		$data['qProjectName']=$this->post->qProject();
		$data['TOCondoSpec1']=$this->post->TOCondoSpec(1);
		$data['TOCondoSpec2']=$this->post->TOCondoSpec(2);
		$data['TOCondoSpec3']=$this->post->TOCondoSpec(3);
		$this->load->view($header,$profile);
		$this->load->view('inputform5',$data);
		$this->load->view('footer_post5',$data);
	}

/// add by tas on 17 Aug 15 ///
	public function post4(){
		$this->post->newPost();
		$this->session->set_userdata('lastpage','/');
		$this->lang_check();
		$ChkLogin=$this->ChkLogin();
		$header=$this->header_inc($ChkLogin);
		$profile=$this->user_profile($ChkLogin);
		$profile['HSNumber']=2;
		$S['1']='<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&libraries=places"></script>';
		$profile['HSrc']=$S;
		$data['qProjectName']=$this->post->qProject();
		$data['TOCondoSpec1']=$this->post->TOCondoSpec(1);
		$data['TOCondoSpec2']=$this->post->TOCondoSpec(2);
		$data['TOCondoSpec3']=$this->post->TOCondoSpec(3);
		$data['POID'] =  $this->post->getPOID();
		$data['imgRoom'] = $this->post->qImg('room',$data['POID']);
		$data['imgView'] = $this->post->qImg('view',$data['POID']);		
		$data['imgFac'] = $this->post->qImg('facilities',$data['POID']);
		
		//$data['imgShare'] = $this->post->qImg_share($data['POID']);
		$data['PID']= $this->post->qPID($data['POID']);
		$data['PName'] = $this->post->qProjectName($data['POID']);
		
		$data['imgProjShare'] = $this->findDirectory($data['PName']);
		
		$this->load->view($header,$profile);
		$this->load->view('inputform4',$data);
		$this->load->view('footer_post4',$data);
		
		//$this->POST
	}

	public function submit_img(){
			//$this->load->helper('file');
			
			
			$imgData = $this->input->post('img');
			$userid = $this->input->post('userid');
			$postid = $this->input->post('postid');
			$type = $this->input->post('type');
			
			 define('IMG_DIR', 'userImg/'.$userid.'/'); 
             if(!is_dir(IMG_DIR)) //create the folder if it's not already exists 
             { 
               mkdir(IMG_DIR,0755,TRUE); 
             } 
             
        	
        	 
			// 
			 	$file = IMG_DIR . uniqid() . $postid.$userid.".png"; 
			 	
             	$imgData =$this->input->post('img');
				$sfile = "/".$file;
				$presult = $this->post->insertImgPost($_POST,$sfile); 
        	 if($presult){
             	$imgD = base64_decode(stripslashes(substr($imgData,22))); 
             	$success = write_file($file, $imgD); 
			 }
			
			
              echo json_encode($success ? $presult : 'Unable to save the file.');
              //echo json_encode($success ? $file : 'Unable to save the file.');
              //echo json_encode(print_r($presult));
             
           
                      
	}
	public function submit_imgshare(){
			$postid = $this->input->post('postid');
			$src = $this->input->post('src');
			
			$rImgShare = $this->post->insertImgShare($src,$postid);
			
			echo json_encode($cresult?'Save':'Fail to Save');
			
	}
	public function delete_imgshare(){
		$src = $this->input->post('src');
		$postid = $this->input->post('postid');
		$rdelImg = $this->post->delImgShare($src,$postid);
		
		echo json_encode($rdelImg?'Save':'Fail to Save');
	}
	
	public function update_imgCap(){
		$desc = $this->input->post('cap');
		$id = $this->input->post('id');
		$cresult = $this->post->update_description($desc,$id);
		
		echo json_encode($cresult?'Save':'Fail to Save');
	}
	public function update_imgAllow(){
		$check = $this->input->post('allow');
		$tid = $this->input->post('id');
		
		if($check=="true"){
			$check = TRUE;
		}else{
			 $check=FALSE;
		}
		
		$aresult = $this->post->update_allow($check,$tid);
		echo json_encode($check?'Allow other people to use this image':'Do not allow anyone to use this image');
	}/**/
	public function remove_img(){
		$imgid = $this->input->post('id');
		$del = $this->post->delImg($imgid);
		
		echo json_encode($del?'remove this image':'cannot remove this image');
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

	public function getFirstPoint(){
		$namePoint=$_GET['namePoint'];
		$TOAdvertising=$_GET['TOAdvertising'];
		
		//$this->session->set_userdata('np',$namePoint);
		
		$this->search->getFirstPoint($namePoint,$TOAdvertising);
		
	}
	//// add by tas 31 Aug /////
	public function searchResult()
	{
		
		$this->session->set_userdata('last_page','/');
		$this->lang_check();
		$ChkLogin=$this->ChkLogin();
		$header=$this->header_inc($ChkLogin);
		$profile=$this->user_profile($ChkLogin);
		
		
		
		$data['qProjectName']=$this->post->qProject();
		$data['qTOOwner']=$this->post->qTOOwner();
		$data['qTOProperty']=$this->post->qTOProperty();
		$data['qTOAdvertising']=$this->post->qTOAdvertising();
		$data['qPost']=$this->post->qPost();
		if ($_POST){
			$data['namePoint'] = $_POST['namePoint'];
			$data['TOAdvertising'] = $_POST['TOAdvertising'];
		} else {
			$data['namePoint'] = "";
			$data['TOAdvertising'] = "";
		};
		
		$this->load->view($header,$profile);
		$this->load->view('searchMap',$data);
		

	}
	//getPoint
	public function getUpdateMarker(){
		
		$namePoint=$_GET['namePoint'];
		$distance = $_GET['distance'];
		$TOProperty = $_GET['TOProperty'];
		$Bedroom = $_GET['Bedroom'];
		$Year = $_GET['Year'];
		$TOAdvertising=$_GET['TOAdvertising'];
		$minPrice = $_GET['minPrice'];
		$maxPrice = $_GET['maxPrice'];
		
		
		
	$this->search->getPoint($distance,$namePoint,$TOProperty,$Bedroom,$Year,$TOAdvertising,$minPrice,$maxPrice);
		//$r = $this->search->getPoint(0,$namePoint,1,0,0,1,0,0);
		//$this->session->set_userdata('np',$namePoint);
		//$this->session->set_userdata('testMarker',$r);
		//echo decode_json($r);

	}
	/// q unit search ////
public function getImgUnit(){
		$PID = $_GET['PID'];
		$TOProperty = $_GET['TOProperty'];
		$Bedroom = $_GET['Bedroom'];
		$Year = $_GET['Year'];
		$TOAdvertising=$_GET['TOAdvertising'];
		$minPrice = $_GET['minPrice'];
		$maxPrice = $_GET['maxPrice'];
		
		
		$r = $this->search->getPostFromPoint($PID,$TOProperty,$Bedroom,$Year,$TOAdvertising,$minPrice,$maxPrice);
		$this->session->set_userdata('imgUnits',$r);
		
}

	public function searchPage()
	{
		echo $_POST['namePoint']."</br>";
		echo $_POST['TOAdvertising']."</br>";
	}

	public function unitDetail()
	{
		//Hard Code for Checking
		//$POID='88';
		$POID = $_POST['POID'];
		$this->search->updateViewPost($POID);
		$data['unit']=$this->search->getUnitFromPOID($POID);
		$TOAdvertising=$this->search->checkTypeAdvertising($POID);
		$ChkLogin=$this->ChkLogin();
		$header=$this->header_inc($ChkLogin);
		$profile=$this->user_profile($ChkLogin);
		$this->load->view($header,$profile);
		if ($TOAdvertising=="2"){
			$this->load->view('unitdetail',$data);
		};
//		$this->load->view('footer');
	}

	public function listKeyMarker()
	{
		$checkAdmin=$this->backend->checkAdmin();
		if ($checkAdmin==1){
			$Type=$this->uri->segment(3);
			$ChkLogin=$this->ChkLogin();
			$header=$this->header_inc($ChkLogin);
			$profile=$this->user_profile($ChkLogin);
			$data['listKeyMarker']=$this->backend->listKeyMarker($Type);
			$this->load->view($header,$profile);
			$this->load->view('listKeyMarker',$data);
			$this->load->view('footer');
		}
	}

	function postMapChange2($txt){
				$config['geocodeCaching'] = false;
				$config['zoom'] = '17';
				if ($txt==""){
					$config['center'] = '13.764934,100.5382955';
				} else {
					$config['center'] = $txt;
				}
				$config['map_height']= '300px';
				$this->googlemaps->initialize($config);
				$marker = array();
				if ($txt==""){
					$marker['position'] = '13.764934,100.5382955';
				} else {
					$marker['position'] = $txt;
				}
				$marker['draggable'] = true;
				$marker['ondragend'] = 'updateDatabase(event.latLng.lat(), event.latLng.lng());';
				$this->googlemaps->add_marker($marker);
				$return=$this->googlemaps->create_map();
				return $return;
	}

	public function addMarker()
	{
		$checkAdmin=$this->backend->checkAdmin();
		if ($checkAdmin==1){
			$ChkLogin=$this->ChkLogin();
			$header=$this->header_inc($ChkLogin);
			$profile=$this->user_profile($ChkLogin);
			if (!isset($_POST['PID'])){
				$map = $this->postMapChange2("");
			} else {
				$queryProject=$this->db->query('Select Lat,Lng from Project Where PID="'.$_POST['PID'].'"');
				$rowProject=$queryProject->row();
				$Lat=$rowProject->Lat;
				$Lng=$rowProject->Lng;
				$txt=$Lat.','.$Lng;
				$map = $this->postMapChange2($txt);
			};
			$data['map'] = $map;
			$profile['map'] = $map;
			$profile['HSNumber']=3;
			$S['1']='<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&libraries=places"></script>';
			$S['2']='<script type="text/javascript">var centreGot = false;</script>';
			$profile['HSrc']=$S;
			$this->load->view($header,$profile);
			$this->load->view('addMarker',$data);
			$this->load->view('footeraddmarker');
		}		
	}
	
	public function addMarker2()
	{
		$checkAdmin=$this->backend->checkAdmin();
		if ($checkAdmin==1){
			if (isset($_POST['Old_ID']) and $_POST['Old_ID']!=""){
				$this->backend->delMarker($_POST['Old_ID']);
			};
			$this->backend->inputKeyMarker($_POST);
			$this->listKeyMarker();
		}
	}

	public function delMarker()
	{
		$checkAdmin=$this->backend->checkAdmin();
		if ($checkAdmin==1){
			$this->backend->delMarker($_POST['Old_ID2']);
			$this->listKeyMarker();
		}
	}

	public function editKeyMarker(){
		$checkAdmin=$this->backend->checkAdmin();
		if ($checkAdmin==1){
			$ID=$this->uri->segment(3);
			$query=$this->db->query('Select * from KeyMarker Where ID="'.$ID.'"');
			$data['query']=$query;
			$row=$query->row();
			$Lat=$row->Lat;
			$Lng=$row->Lng;
			$txt=$Lat.','.$Lng;
			//$this->backend->delMarker($ID);
			$ChkLogin=$this->ChkLogin();
			$header=$this->header_inc($ChkLogin);
			$profile=$this->user_profile($ChkLogin);
			$map = $this->postMapChange2($txt);
			$data['map'] = $map;
			$profile['map'] = $map;
			$profile['HSNumber']=3;
			$S['1']='<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&libraries=places"></script>';
			$S['2']='<script type="text/javascript">var centreGot = false;</script>';
			$profile['HSrc']=$S;
			$this->load->view($header,$profile);
			$this->load->view('editMarker',$data);
			$this->load->view('footeraddmarker');
		}
	}

	public function listProject()
	{
		$checkAdmin=$this->backend->checkAdmin();
		if ($checkAdmin==1){
			$ChkLogin=$this->ChkLogin();
			$header=$this->header_inc($ChkLogin);
			$profile=$this->user_profile($ChkLogin);
			$data['listProject']=$this->backend->listProject();
			$this->load->view($header,$profile);
			$this->load->view('listProject',$data);
			$this->load->view('footer');
		}
	}

	public function editProject()
	{
		$checkAdmin=$this->backend->checkAdmin();
		if ($checkAdmin==1){
			$PID=$this->uri->segment(3);
			$query=$this->db->query('Select * from Project Where PID="'.$PID.'"');
			$data['query']=$query;
			$row=$query->row();
			$Lat=$row->Lat;
			$Lng=$row->Lng;
			$txt=$Lat.','.$Lng;
			$ChkLogin=$this->ChkLogin();
			$header=$this->header_inc($ChkLogin);
			$profile=$this->user_profile($ChkLogin);
			$map = $this->postMapChange2($txt);
			$data['map'] = $map;
			$profile['map'] = $map;
			$profile['HSNumber']=3;
			$S['1']='<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&libraries=places"></script>';
			$S['2']='<script type="text/javascript">var centreGot = false;</script>';
			$profile['HSrc']=$S;
			$this->load->view($header,$profile);
			$this->load->view('editProject',$data);
			$this->load->view('footeraddmarker');
		}
	}

	public function addProject()
	{
		$checkAdmin=$this->backend->checkAdmin();
		if ($checkAdmin==1){
			$ChkLogin=$this->ChkLogin();
			$header=$this->header_inc($ChkLogin);
			$profile=$this->user_profile($ChkLogin);
			$map = $this->postMapChange2("");
			$data['map'] = $map;
			$profile['map'] = $map;
			$profile['HSNumber']=3;
			$S['1']='<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&libraries=places"></script>';
			$S['2']='<script type="text/javascript">var centreGot = false;</script>';
			$profile['HSrc']=$S;
			$this->load->view($header,$profile);
			$this->load->view('addProject',$data);
			$this->load->view('footeraddmarker');
		}		
	}

	public function addProject2()
	{
		$checkAdmin=$this->backend->checkAdmin();
		if ($checkAdmin==1){
			$this->backend->addProject($_POST);
			$this->listProject();
		}
	}

	public function editProject2()
	{
		$checkAdmin=$this->backend->checkAdmin();
		if ($checkAdmin==1){
			$this->backend->editProject($_POST);
			$this->listProject();
		}
	}

	public function listApprovePost()
	{
		$checkAdmin=$this->backend->checkAdmin();
		if ($checkAdmin==1){
			$ChkLogin=$this->ChkLogin();
			$header=$this->header_inc($ChkLogin);
			$profile=$this->user_profile($ChkLogin);
			$data['listProject']=$this->backend->listProject();
			$this->load->view($header,$profile);
			$this->load->view('listPost',$data);
			$this->load->view('footer');
		}
	}

	public function adminViewUnitDetail()
	{
		$checkAdmin=$this->backend->checkAdmin();
		if ($checkAdmin==1){
			$POID = $this->uri->segment(3);
			$data2['POID']=$POID;
			$TOAdvertising=$this->search->checkTypeAdvertising($POID);
			$data['unit']=$this->search->getUnitFromPOID($POID);
			$ChkLogin=$this->ChkLogin();
			$header=$this->header_inc($ChkLogin);
			$profile=$this->user_profile($ChkLogin);
			$this->load->view($header,$profile);
			if ($TOAdvertising=="2"){
				$this->load->view('activatePost',$data2);
				$this->load->view('unitdetail',$data);
			}
		}
	}

	public function activatePost()
	{
		$checkAdmin=$this->backend->checkAdmin();
		if ($checkAdmin==1){
			$this->backend->activatePost($_POST['POID']);
			$this->listApprovePost();
		}
	}

	public function blockPost()
	{
		$checkAdmin=$this->backend->checkAdmin();
		if ($checkAdmin==1){
			$this->backend->blockPost($_POST);
			$this->listApprovePost();
		}
	}

	public function unitDetailOwner()
	{
		$POID=$this->uri->segment(3);
		if ($POID==""){
			$POID = $this->post->getPOID();
		};
		$data['unit']=$this->search->getUnitFromPOID($POID);
		$TOAdvertising=$this->search->checkTypeAdvertising($POID);
		$ChkLogin=$this->ChkLogin();
		$header=$this->header_inc($ChkLogin);
		$profile=$this->user_profile($ChkLogin);
		$this->load->view($header,$profile);
		if ($TOAdvertising=="2"){
			$this->load->view('unitdetail',$data);
		};
//		$this->load->view('footer');
	}
	
	public function howItWork(){
		$this->session->set_userdata('last_page','/');
		$this->session->set_userdata('token'.'');
		$this->lang_check();
		$ChkLogin=$this->ChkLogin();
		$header=$this->header_inc($ChkLogin);
		$profile=$this->user_profile($ChkLogin);
		$this->load->view($header,$profile);
		$this->load->view('howitwork');
		$this->load->view('footerstandard');
		$this->load->view('footer_home');

	}
}
