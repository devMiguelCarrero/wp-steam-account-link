import SteamLoader from '../../globalComponents/loader/SteamLoader';
import './style.scss';
import axios from 'axios';
import { __ } from '@wordpress/i18n';
import { URLs } from '../../globalComponents/data/pluginData';
import { useEffect, useState } from '@wordpress/element';
import SteamButton from '../../globalComponents/UI/SteamButton';
import SteamUserCard from '../../components/SteamUserCard';
import SteamInfoUpdater from '../../components/SteamInfoUpdater';
import SteamAccountDisconnect from '../../components/SteamAccountDisconnect';

const SteamAccountApp = () => {
	const [userStatus, setUserStatus] = useState(null);
	const [steamUserInfo, setSteamUserInfo] = useState(null);

	const userInfoHandler = (userInfo) => {
		setSteamUserInfo(userInfo);
	};

	useEffect(async () => {
		const params = new URLSearchParams();
		params.append('action', 'WSL_get_user_steam_id');
		params.append(
			'return_url',
			location.protocol + '//' + location.host + location.pathname
		);
		const response = await axios.post(URLs.ajax_url, params);
		setUserStatus(response.data);
	}, []);

	return (
		<div className="wsl-steam-account-link">
			{userStatus ? (
				<>
					{userStatus.status === 'unlinked' && (
						<div className="wsl-steam-account-link__link-account">
							<p>{__('You have not a Steam account connected yet', 'wp-steam-account-link')}</p>
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
							<p>{userStatus.message}</p>
						</div>
					)}
					{userStatus.status === 'linked' && (
						<>
							<SteamUserCard
								onGetUserInfo={userInfoHandler}
								steamID={userStatus.data['steam-id']}
								APIKey={userStatus.data.APIKey}
							/>
							<SteamAccountDisconnect />
						</>
					)}
					{userStatus && (
						<>
							{steamUserInfo && userStatus.data['user-id'] && (
								<SteamInfoUpdater
									userID={userStatus.data['user-id']}
									userInfo={steamUserInfo}
								/>
							)}
						</>
					)}
				</>
			) : (
				<SteamLoader />
			)}
		</div>
	);
};
export default SteamAccountApp;
