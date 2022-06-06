<?php
class WSL_User_Helper
{

    public function checkUserSteamInfo($return_url)
    {
        $log = (object)[
            'valid' => false,
            'status' => 'logged-out',
            'message' => esc_attr__('Sometinhg happened, please try again', 'wp-steam-account-link'),
            'data' => (object)[]
        ];

        //Search for defined API Key
        $log->data->APIKey = WSL_Option_Model::instance()->getOption('wp-steam-api-key', null);

        if (!$log->data->APIKey) {
            $log->message = esc_attr__('Steam User API Key is not defined yet, you must to define an API Key in your wp-admin', 'wp-steam-account-link');
            return $log;
        }

        if (!is_user_logged_in()) {
            $log->message = esc_attr__('You must Login to connect with a Steam Account', 'wp-steam-account-link');
            return $log;
        } else {
            $userID = get_current_user_ID();
            $log->data->{'user-id'} = $userID;
            $steamLinked = WSL_User_Model::instance()->getUserMeta($userID, 'wp-steam-account-linked', null);
            $steamID = WSL_User_Model::instance()->getUserMeta($userID, 'wp-steam-account-id', null);
            if (!$steamLinked || !$steamID) {
                $log->status = 'unlinked';
                $auth = new SteamAuth();
                $auth->setReturnURL($return_url);

                $auth->Init();
                $log->data->{'link-url'} = $auth->GetLoginURL();
                return $log;
            } else {
                $log->status = 'linked';
                $log->data->{'steam-id'} = $steamID;
                return $log;
            }
        }
        return $log;
    }

    public static function instance()
    {
        return new WSL_User_Helper();
    }
}
