import SteamLoader from '../globalComponents/loader/SteamLoader';
import './SteamUserCard.scss';
import axios from 'axios';
import { useState, useEffect } from '@wordpress/element';

const SteamUserCard = (props) => {
	const [steamUserInfo, setSteamUserInfo] = useState(null);
	const [catchError, setCatchError] = useState(null);

	useEffect(async () => {
		try {
			const response = await axios.get(
				`https://api.steampowered.com/ISteamUser/GetPlayerSummaries/v2/?key=${props.APIKey}&steamids=${props.steamID}`
			);
			setSteamUserInfo(response.data.response.players[0]);
			if (props.onGetUserInfo) {
				props.onGetUserInfo(response.data.response.players[0]);
			}
		} catch (error) {
			setCatchError(error);
		}
	}, [props.steamID]);

	return (
		<>
			{steamUserInfo && (
				<div className="steam-user-card">
					<div className="steam-user-card__section steam-user-card__section--img">
						<a href={steamUserInfo.profileurl} target="_blank">
							<img
								className="steam-user-card__img"
								src={steamUserInfo.avatar}
							/>
						</a>
					</div>
					<div className="steam-user-card__section steam-user-card__section--info">
						<a href={steamUserInfo.profileurl} target="_blank">
							<h6 className="steam-name-info steam-name-info--personame">
								{steamUserInfo.personaname}
							</h6>
						</a>
						<h6 className="steam-name-info steam-name-info--realname">
							{steamUserInfo.realname}
						</h6>
					</div>
				</div>
			)}
			{catchError ? (
				<p className="error-message">{catchError.message}</p>
			) : (
				<>{!steamUserInfo && <SteamLoader />}</>
			)}
		</>
	);
};
export default SteamUserCard;
