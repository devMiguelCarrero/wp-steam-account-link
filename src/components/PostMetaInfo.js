import './PostMetaInfo.scss';
import { __ } from '@wordpress/i18n';

const PostMetaInfo = () => {
	return (
		<div className="wp-steam-post-meta-info">
			<small className="wp-steam-shortcode-info__explanation">
				{__(
					'This plugin stores the following user-meta fields and you can use it in the way that you like using the WordPress PHP Function get_user_meta()',
					'wp-steam-account-link'
				)}
			</small>
			<div className="wp-steam-post-meta-info__shortcode">
				wp-steam-account-id
			</div>
			<div className="wp-steam-post-meta-info__shortcode">
				wp-steam-account-summary
			</div>
			<div className="wp-steam-post-meta-info__shortcode">
				wp-steam-account-linked
			</div>
		</div>
	);
};
export default PostMetaInfo;
