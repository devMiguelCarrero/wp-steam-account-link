import './TextFormLog.scss';

const TextFormLog = (props) => {
	return (
		<p
			className={`wsl-text-form-log ${
				props.status === 'success' && 'wsl-text-form-log--success'
			} ${props.status === null && ''} ${
				props.status === 'failed' && 'wsl-text-form-log--failed'
			}`}
		>
			{props.children}
		</p>
	);
};
export default TextFormLog;
