import { render } from '@wordpress/element';
import App from './App';

if (document.getElementById('easy-steam-account-link-settings'))
	render(<App />, document.getElementById('easy-steam-account-link-settings'));
