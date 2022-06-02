<?php

class WSL_View
{

	public static function get($view, $data = null)
	{
		if (is_array($data)) {
			foreach ($data as $key => $value) {
				${$key} = $value;
			}
		}
		require_once WSL_ACHIEVEMENTS_PATH_VIEW . $view . '.php';
	}

	public static function render($view, $data = null)
	{
		if ($data) :
			extract($data);
		endif;

		ob_start();
		include(WSL_ACHIEVEMENTS_PATH_VIEW . $view . '.php');
		$content = ob_get_contents();
		ob_end_clean();

		return $content;
	}
}
