import './APIKeyForm.scss';
import { __ } from '@wordpress/i18n';
import SteamButton from '../globalComponents/UI/SteamButton';
import { useState } from '@wordpress/element';
import axios from 'axios';
import { URLs } from '../globalComponents/data/pluginData';
import TextFormLog from '../globalComponents/UI/TextFormLog';

const APIKeyForm = (props) => {
	const [APIKey, setAPIKey] = useState(props.currentAPIKey.api_key);
	const [APIInvalid, setAPIInvalid] = useState(true);
	const [APILoading, setAPILoading] = useState(false);
	const [APILoadStatus, setAPILoadStatus] = useState(null);

	const saveAPIKey = async (event) => {
		setAPILoading(true);
		event.preventDefault();
		setAPILoadStatus('saving');

		const params = new URLSearchParams();
		params.append('action', 'WSL_save_steam_api_key');
		params.append('apikey', APIKey);

		try {
			console.log(URLs.ajax_url);
			const response = await axios.post(URLs.ajax_url, params);
			console.log(response);
			if (response.data === APIKey) {
				setAPILoadStatus('saved');
			} else {
				setAPILoadStatus('unsaved');
			}
		} catch (error) {
			setAPILoadStatus('unsaved');
		}

		setAPILoading(false);
	};

	const testAPIKey = async () => {
		setAPILoading(true);
		setAPILoadStatus('testing');

		try {
			const response = await axios.get(
				`https://api.steampowered.com/ISteamUser/GetPlayerSummaries/v2/?key=${APIKey}&steamids=76561198060969369`
			);
			if (response.data.response.players.length > 0) {
				setAPILoadStatus('success');
				setAPIInvalid(false);
			}
		} catch (error) {
			setAPILoadStatus('failed');
		}

		setAPILoading(false);
	};

	return (
		<form className="api-key-form" onSubmit={saveAPIKey}>
			<div className="form-group">
				<label className="api-key-form__label">
					{__('Steam API Key', 'easy-steam-account-link')}
				</label>
				<input
					className="api-key-form__input"
					type="text"
					name="wp-steam-api-key"
					onChange={(event) => {
						setAPIKey(event.target.value);
					}}
					value={APIKey}
				/>
				{props.currentAPIKey.api_key == '' && (
					<small className="api-key-form__explanation">
						{__(
							"You haven't defined an Steam API Key yet. You have to set an API key for the correct plugin functioning",
							'easy-steam-account-link'
						)}{' '}
						<a
							target="_blank"
							href="https://steamcommunity.com/dev/apikey"
						>
							https://steamcommunity.com/dev/apikey
						</a>{' '}
						{__('to obtain one.', 'easy-steam-account-link')}
					</small>
				)}
				{props.currentAPIKey.api_key !== '' && (
					<small className="api-key-form__explanation">
						{__(
							'If you need to change your API Key, visit ',
							'easy-steam-account-link'
						)}{' '}
						<a
							target="_blank"
							href="https://steamcommunity.com/dev/apikey"
						>
							https://steamcommunity.com/dev/apikey
						</a>
					</small>
				)}
			</div>
			<div className="form-group form-group--buttons">
				<SteamButton
					disabled={APIKey.length <= 10 || APILoading}
					className="api-key-form__submit steam-button--secondary"
					type="button"
					onClick={testAPIKey}
				>
					{APILoading && __('Loading...', 'easy-steam-account-link')}
					{!APILoading && __('Test API Key', 'easy-steam-account-link')}
				</SteamButton>
				<SteamButton
					disabled={APIInvalid || APILoading || props.currentAPIKey.api_key === APIKey || APIKey.length <= 10}
					className="api-key-form__submit"
					type="submit"
				>
					{APILoading && __('Loading...', 'easy-steam-account-link')}
					{!APILoading && __('Save API Key', 'easy-steam-account-link')}
				</SteamButton>
			</div>
			<>
				{APILoadStatus === 'testing' && (
					<TextFormLog>
						{__('Testing your API Key...', 'easy-steam-account-link')}
					</TextFormLog>
				)}
				{APILoadStatus === 'success' && (
					<TextFormLog status="success">
						{__(
							'Your API key is a valid Steam API key',
							'easy-steam-account-link'
						)}
					</TextFormLog>
				)}
				{APILoadStatus === 'failed' && (
					<TextFormLog status="failed">
						{__(
							'Your key is not a valid Steam API key',
							'easy-steam-account-link'
						)}
					</TextFormLog>
				)}
				{APILoadStatus === 'saving' && (
					<TextFormLog>
						{__('Saving your API Key...', 'easy-steam-account-link')}
					</TextFormLog>
				)}
				{APILoadStatus === 'saved' && (
					<TextFormLog status="success">
						{__(
							'Your Steam API Key was successfully saved, you can now use this plugin properly',
							'easy-steam-account-link'
						)}
					</TextFormLog>
				)}
				{APILoadStatus === 'unsaved' && (
					<TextFormLog status="failed">
						{__(
							'There was an error saving your API Key, please try again',
							'easy-steam-account-link'
						)}
					</TextFormLog>
				)}
			</>
		</form>
	);
};
export default APIKeyForm;
