<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_oa2 extends CI_Controller
{
    public function session($provider_name)
    {
        $this->load->library('session');
        $this->load->helper('url_helper');

        $this->load->library('oauth2/OAuth2');
				$this->load->library('tank_auth');
				$this->load->model('tank_auth/users');
				$this->load->config('oauth2', TRUE);
        $this->load->model('debug');

        $provider = $this->oauth2->provider($provider_name, array(
            'id' => $this->config->item($provider_name.'_id', 'oauth2'),
            'secret' => $this->config->item($provider_name.'_secret', 'oauth2'),
        ));


        if ( ! $this->input->get('code'))
        {
            // By sending no options it'll come back here
            $provider->authorize();
        }
        else
        {
            // Howzit?
            try
            {
                //$token = $provider->access($_GET['code']);
                $token = $provider->access($this->input->get('code'));

                $user = $provider->get_user_info($token);

                if ($provider_name=="facebook"){
                  $facebookID=$user['facebookID'];
                  //Get Image File Name for compare with Facebook messenger bot ID
                  $urlImage=$user['image'];
                  $ch = curl_init();
                  curl_setopt($ch, CURLOPT_URL, $urlImage);
                  curl_setopt($ch, CURLOPT_HEADER, true);
                  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                  curl_exec($ch);
                  $urlResult = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
                  curl_close($ch);
                  $FileNameResult=basename($urlResult);
                  $FileNameResultA=explode("?", $FileNameResult);
                  $FileNameImage=$FileNameResultA[0];
                  //error_log($FileNameImage);
                  //$this->debug->var_error_log($objImage);
                  //$this->debug->var_error_log($user['image']);
                } else {
                  $facebookID=NULL;
                  $FileNameImage=NULL;
                }
                //error_log($facebookID);

                // Here you should use this information to A) look for a user B) help a new user sign up with existing data.
                // If you store it all in a cookie and redirect to a registration page this is crazy-simple.
                //echo "<pre>Tokens: ";
                //var_dump($token);

                //echo "\n\nUser Info: ";
                //var_dump($user);


							if ($this->tank_auth->is_logged_in()) {									// logged in
								redirect('');

							}elseif( !is_null($this->users->get_user_by_email($provider_name.'|'.$user['email'], $facebookID, $FileNameImage))) { //already registered
								//echo 'already';

								if ($this->tank_auth->login_oa2( $provider_name.'|'.$user['email'], $user['image'], $facbookID, $FileNameImage ) ) {								// success
									$chkType=$this->uri->segment(4);
									if($chkType=='clickTel'){$this->session->set_userdata('clickTel','1');}
									$referred_from = $this->session->userdata('referred_from');
									if($referred_from=='' or $referred_from=='null'){
										redirect('/');
									}else{
										redirect($referred_from, 'refresh');
									}

								} else {
									$errors = $this->tank_auth->get_error_message();
									if (isset($errors['banned'])) {								// banned user
										$this->_show_message($this->lang->line('auth_message_banned').' '.$errors['banned']);

									} elseif (isset($errors['not_activated'])) {				// not activated user
										redirect('/auth/send_again/');

									} else {													// fail
										foreach ($errors as $k => $v)	$data['errors'][$k] = $this->lang->line($v);
									}
								}


							}else{
                if ($provider_name=="facebook"){
                  $facebookID=$user['facebookID'];
                  //Get Image File Name for compare with Facebook messenger bot ID
                  $urlImage=$user['image'];
                  $ch = curl_init();
                  curl_setopt($ch, CURLOPT_URL, $urlImage);
                  curl_setopt($ch, CURLOPT_HEADER, true);
                  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                  curl_exec($ch);
                  $urlResult = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
                  curl_close($ch);
                  $FileNameResult=basename($urlResult);
                  $FileNameResultA=explode("?", $FileNameResult);
                  $FileNameImage=$FileNameResultA[0];
                  //error_log($FileNameImage);
                  //$this->debug->var_error_log($objImage);
                  //$this->debug->var_error_log($user['image']);
                } else {
                  $facebookID=NULL;
                  $FileNameImage=NULL;
                }
								if (!is_null($data = $this->tank_auth->create_user_oa2($user['email'],$provider_name,$user['first_name'],$user['last_name'],$facebookID,$FileNameImage))) {
									// success
									$data['site_name'] = $this->config->item('website_name', 'tank_auth');

										if ($this->config->item('email_account_details', 'tank_auth')) {	// send "welcome" email

											$this->_send_email('welcome', $data['email'], $data);
										}

										redirect('/auth_oa2/session/'.$provider_name);

								} else {
									$errors = $this->tank_auth->get_error_message();
									foreach ($errors as $k => $v)	$data['errors'][$k] = $this->lang->line($v);
								}

							}


            }

            catch (OAuth2_Exception $e)
            {
                show_error('That didnt work: '.$e);
            }

        }
    }


	/**
	 * Send email message of given type (activate, forgot_password, etc.)
	 *
	 * @param	string
	 * @param	string
	 * @param	array
	 * @return	void
	 */
	function _send_email($type, $email, &$data)
	{
		$this->load->library('email');
		$this->email->from($this->config->item('webmaster_email', 'tank_auth'), $this->config->item('website_name', 'tank_auth'));
		$this->email->reply_to($this->config->item('webmaster_email', 'tank_auth'), $this->config->item('website_name', 'tank_auth'));
		$this->email->to($email);
		$this->email->subject(sprintf($this->lang->line('auth_subject_'.$type), $this->config->item('website_name', 'tank_auth')));
		$this->email->message($this->load->view('email/'.$type.'-html', $data, TRUE));
		$this->email->set_alt_message($this->load->view('email/'.$type.'-txt', $data, TRUE));
		$this->email->send();
	}

}

/* End of file auth_oa2.php */
/* Location: ./application/controllers/auth_oa2.php */
