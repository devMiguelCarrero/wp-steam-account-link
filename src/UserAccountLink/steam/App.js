import SteamLoader from '../../globalComponents/loader/SteamLoader';
import './style.scss';
import axios from 'axios';
import { PostInfo, URLs } from '../../globalComponents/data/pluginData';
import { useEffect, useState } from '@wordpress/element';

const SteamAccountApp = () => {
	const [userStatus, setUserStatus] = useState(null);

	useEffect(async () => {
		const params = new URLSearchParams();
		params.append('action', 'WSL_get_user_steam_id');
		const response = await axios.post(URLs.ajax_url, params);
		setUserStatus(response.data);
	}, []);

	return (
		<div className="wsl-steam-account-link">
			{userStatus ? (
				<>
					{userStatus.status === 'unlinked' && (
						<div className="wsl-steam-account-link__link-account">
							<p>You have not a Steam account linked yet</p>
						</div>
					)}
				</>
			) : (
				<SteamLoader />
			)}
		</div>
	);
};
export default SteamAccountApp;
