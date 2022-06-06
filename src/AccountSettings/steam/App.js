import SteamLoader from '../../globalComponents/loader/SteamLoader';
import './style.scss';
import axios from 'axios';
import { __ } from '@wordpress/i18n';
import { URLs } from '../../globalComponents/data/pluginData';
import { useEffect, useState } from '@wordpress/element';
import SteamButton from '../../globalComponents/UI/SteamButton';
import APIKeyForm from '../../components/APIKeyForm';
import ShortCodeInfo from '../../components/ShortCodeInfo';
import PostMetaInfo from '../../components/PostMetaInfo';

const SteamSettingsApp = () => {
	const [currentAPIKey, setCurrentAPIKey] = useState(null);

	useEffect(async () => {
		const params = new URLSearchParams();
		params.append('action', 'WSL_get_steam_api_key');
		try {
			const response = await axios.post(URLs.ajax_url, params);
			setCurrentAPIKey(response.data);
		} catch (error) {
			console.log(error);
		}
	}, []);

	return (
		<>
			{currentAPIKey ? (
				<>
					<div className="wsl-steam-account-settings">
						<APIKeyForm currentAPIKey={currentAPIKey} />
					</div>
					<div className="wsl-steam-account-settings">
						<ShortCodeInfo />
						<PostMetaInfo />
					</div>
				</>
			) : (
				<div className="wsl-steam-account-settings">
					<SteamLoader />
				</div>
			)}
		</>
	);
};
export default SteamSettingsApp;
