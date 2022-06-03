import SteamLoader from '../../../globalComponents/loader/SteamLoader';
import './SteamUserCard.scss';
import axios from 'axios';
import { useState, useEffect } from '@wordpress/element';

const SteamUserCard = (props) => {
	const [steamUserInfo, setSteamUserInfo] = useState(null);
	useEffect(async () => {
		const response = await axios.get(
			`https://api.steampowered.com/ISteamUser/GetPlayerSummaries/v2/?key=CD9215B63C2E3A2BFF91B7957227BF04&steamids=${props.steamID}`
		);
		setSteamUserInfo(response.data.response.players[0]);
	}, [props.steamID]);

	console.log(steamUserInfo);

	return (
		<>
			{steamUserInfo && (
				<div className="steam-user-card">
					<img
						className="steam-user-card__img"
						src={steamUserInfo.avatar}
					/>
				</div>
			)}
			{!steamUserInfo && <SteamLoader />}
		</>
	);
};
export default SteamUserCard;
