import SteamLoader from '../../globalComponents/loader/SteamLoader';
import './style.scss';
import axios from 'axios';
import { PostInfo, URLs } from '../../globalComponents/data/pluginData';
import { useEffect, useState } from '@wordpress/element';
import SteamButton from '../../globalComponents/UI/SteamButton';
import SteamUserCard from './components/SteamUserCard';

const SteamAccountApp = () => {
	const [userStatus, setUserStatus] = useState(null);

	useEffect(async () => {
		const params = new URLSearchParams();
		params.append('action', 'WSL_get_user_steam_id');
		const response = await axios.post(URLs.ajax_url, params);
		console.log(response.data);
		setUserStatus(response.data);
	}, []);

	return (
		<div className="wsl-steam-account-link">
			{userStatus ? (
				<>
					{userStatus.status === 'unlinked' && (
						<div className="wsl-steam-account-link__link-account">
							<p>You have not a Steam account linked yet</p>
							<SteamButton
								href={userStatus.data['link-url']}
								tag="link"
							>
								Link Account
							</SteamButton>
						</div>
					)}
					{userStatus.status === 'logged-out' && (
						<div className="wsl-steam-account-link__link-account">
							<p>You must Login to connect with a Steam Account</p>
						</div>
					)}
					{userStatus.status === 'linked' && (
						<SteamUserCard steamID={userStatus.data['steam-id']} />
					)}
				</>
			) : (
				<SteamLoader />
			)}
		</div>
	);
};
export default SteamAccountApp;
