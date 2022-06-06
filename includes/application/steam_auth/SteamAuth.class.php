<?php

require_once(WSL_ACHIEVEMENTS_PATH_STEAM_AUTH . 'openid.php');

class SteamAuth
{

	private $OpenID;
	private $OnLoginCallback;
	private $OnLoginFailedCallback;
	private $OnLogoutCallback;

	public $SteamID;

	public function __construct($Server = 'DEFAULT')
	{
		if ($Server = 'DEFAULT') $Server = $_SERVER['SERVER_NAME'];
		$this->OpenID = new LightOpenID($Server);
		$this->OpenID->identity = 'https://steamcommunity.com/openid';

		$this->OnLoginCallback = function () {
		};
		$this->OnLoginFailedCallback = function () {
		};
		$this->OnLogoutCallback = function () {
		};
		$this->returnURL = '';
	}

	public function __call($closure, $args)
	{
		return call_user_func_array($this->$closure, $args);
	}

	public function Init()
	{
		if ($this->OpenID->mode == 'cancel') {
			$this->OnLoginFailedCallback();
		} else if ($this->OpenID->mode) {
			if ($this->OpenID->validate()) {
				$this->SteamID = basename($this->OpenID->identity);
				if ($this->OnLoginCallback($this->SteamID)) {
					WSL_User_Model::instance()->updateCurrentUserMeta('wp-steam-account-linked', 'true');
					WSL_User_Model::instance()->updateCurrentUserMeta('wp-steam-account-id', $this->SteamID);
					header("Location: " . $this->OpenID->getReturnUrl());
				}
			} else {
				$this->OnLoginFailedCallback();
			}
		}
	}

	public function RedirectLogin()
	{
		header("Location: " . $this->GetLoginURL());
	}

	public function setReturnURL($return_url) {
		$this->returnURL = $return_url;
	}

	public function GetLoginURL()
	{
		$this->OpenID->setReturnURL($this->returnURL);
		return $this->OpenID->authUrl();
	}

	public function SetOnLoginCallback($OnLoginCallback)
	{
		$this->OnLoginCallback = $OnLoginCallback;
	}

	public function SetOnLogoutCallback($OnLogoutCallback)
	{
		$this->OnLogoutCallback = $OnLogoutCallback;
	}

	public function SetOnLoginFailedCallback($OnLoginFailedCallback)
	{
		$this->OnLoginFailedCallback = $OnLoginFailedCallback;
	}
}
