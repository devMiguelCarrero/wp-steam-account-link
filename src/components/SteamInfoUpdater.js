import './SteamInfoUpdater.scss';
import { __ } from '@wordpress/i18n';
import { useEffect, useState } from '@wordpress/element';
import axios from 'axios';
import { URLs } from '../globalComponents/data/pluginData';

const SteamInfoUpdater = (props) => {
	const [infoUpdated, setInfoUpdated] = useState(false);

	useEffect(async () => {
		const params = new URLSearchParams();
		params.append('action', 'WSL_update_user_info');
		params.append('user-id', props.userID);
		params.append('user-info', JSON.stringify(props.userInfo));

		try {
			const response = await axios.post(URLs.ajax_url, params);

			setInfoUpdated(true);
		} catch (error) {}
	});

	return (
		<>
			{infoUpdated && <></>}
			{!infoUpdated && (
				<div className="steam-info-updater">
					<p>
						{__('Updating User Info...', 'wp-steam-account-link')}
					</p>
				</div>
			)}
		</>
	);
};
export default SteamInfoUpdater;
