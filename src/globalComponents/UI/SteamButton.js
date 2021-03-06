import './SteamButton.scss';

const SteamButton = (props) => {
	switch (props.tag) {
		case 'link':
			return (
				<a
					href={props.href ? props.href : `#`}
					className={`${
						props.className && props.className
					} steam-button`}
				>
					{props.children}
				</a>
			);
			break;

		default:
			return (
				<button
					type={props.type ? props.type : `button`}
					className={`${
						props.className && props.className
					} steam-button`}
					disabled={props.disabled ? props.disabled : false}
					onClick={props.onClick !== null && props.onClick}
				>
					<span className="button-text">{props.children}</span>
				</button>
			);
			break;
	}
};
export default SteamButton;
