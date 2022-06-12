import './ShortCodeInfo.scss';
import { __ } from '@wordpress/i18n';

const ShortCodeInfo = () => {
	return (
		<div className="wp-steam-shortcode-info">
			<small className="wp-steam-shortcode-info__explanation">
				{__(
					'To display the Steam Account Linker, you have to paste the following shortcode on the area that you decide:',
					'easy-steam-account-link'
				)}
			</small>
			<div className="wp-steam-shortcode-info__shortcode">
				[WSL_user_steam_vinculation][/WSL_user_steam_vinculation]
			</div>
            <small className="wp-steam-shortcode-info__explanation">
				{__(
					'To display the Steam Account Linker on your php code, you can use the following function:',
					'easy-steam-account-link'
				)}
			</small>
            <div className="wp-steam-shortcode-info__shortcode">
				{`<?php echo do_shortcode("[WSL_user_steam_vinculation][/WSL_user_steam_vinculation]"); ?>`}
			</div>
		</div>
	);
};
export default ShortCodeInfo;
