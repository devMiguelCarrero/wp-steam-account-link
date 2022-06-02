<?php
class WSL_User_Helper
{

    public function checkUserSteamInfo()
    {
        $log = (object)[
            'valid' => false,
            'status' => 'unlinked',
            'message' => esc_attr__('Sometinhg happened, please try again', 'wp-steam-account-link'),
        ];

        if (!is_user_logged_in()) {
            $log->message = esc_attr__('Please, login to link your Steam account', 'wp-steam-account-link');
            return $log;
        } else {
            $steamLinked = WSL_User_Model::instance()->getUserMeta(get_current_user_ID(), 'wp-steam-account-linked', null);
            if(!$steamLinked) {
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
