import { render } from '@wordpress/element';
import App from './App';

if (document.getElementById('easy-steam-account-link-user'))
	render(<App />, document.getElementById('easy-steam-account-link-user'));
