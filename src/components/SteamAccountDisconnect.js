import './SteamAccountDisconnect.scss';
import { URLs } from '../globalComponents/data/pluginData';
import SteamButton from '../globalComponents/UI/SteamButton';
import { __ } from '@wordpress/i18n';
import { useState } from '@wordpress/element';
import axios from 'axios';

const SteamAccountDisconnect = () => {
	const [status, setStatus] = useState('neutral');

	const DisconnectAccount = async () => {
		const params = new URLSearchParams();
		params.append('action', 'WSL_disconnect_user_steam_account');

		try {
			const response = await axios.post(URLs.ajax_url, params);
			setStatus('disconnected');
		} catch (error) {
			console.log(error);
		}
	};

	return (
		<div className="wp-steam-account-disconnect">
			{status === 'neutral' && (
				<SteamButton
					onClick={() => {
						setStatus('aware');
					}}
					tag="button"
				>
					{__('Disconnect', 'easy-steam-account-link')}
				</SteamButton>
			)}
			{status === 'aware' && (
				<div className="are-u-sure-form">
					<p>
						{__(
							'Disconnect your Steam Account?',
							'easy-steam-account-link'
						)}
						<button
							onClick={() => {
								setStatus('disconnecting');
								DisconnectAccount();
							}}
							className="are-u-sure-form__button"
						>
							{__('yes', 'easy-steam-account-link')}
						</button>
						<button
							onClick={() => {
								setStatus('neutral');
							}}
							className="are-u-sure-form__button"
						>
							{__('no', 'easy-steam-account-link')}
						</button>
					</p>
				</div>
			)}
			{status === 'disconnecting' && (
				<div className="disconnecting-container">
					<p>{__('Disconnecting...', 'easy-steam-account-link')}</p>
				</div>
			)}
			{status === 'disconnected' && (
				<div className="disconnecting-container">
					<p>
						{__(
							'Your account was successfully disconnectd',
							'easy-steam-account-link'
						)}
					</p>
				</div>
			)}
		</div>
	);
};
export default SteamAccountDisconnect;
