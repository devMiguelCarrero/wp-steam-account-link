import { render } from '@wordpress/element';
import App from './App';

if (document.getElementById('wp-steam-account-link-settings'))
	render(<App />, document.getElementById('wp-steam-account-link-settings'));