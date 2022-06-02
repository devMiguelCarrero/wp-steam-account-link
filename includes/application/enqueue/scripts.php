<?php

class WSL_Enqueue_Scripts
{

	function __construct()
	{
		$this->script_assets = include WSL_BUILD_PATH . 'script.asset.php';
		$this->admin_assets = include WSL_BUILD_PATH . 'admin.asset.php';
	}

	public function init()
	{
		add_action('enqueue_block_editor_assets', [$this, 'editor_scripts']);
		add_action('admin_enqueue_scripts', [$this, 'admin_scripts']);
		add_action('wp_enqueue_scripts', [$this, 'front_scripts']);
	}

	public function admin_scripts()
	{
	}

	public function editor_scripts()
	{
	}

	public function front_scripts()
	{
		$enqueue = new WSL_EnqueueBuilder();
		$enqueue->setType('script')
			->setName(WSL_DOMAIN . '-course-edit-control')
			->setPath(WSL_PLUGIN_URL . 'build/script.js')
			->setDependencies($this->script_assets['dependencies'])
			->setVer($this->script_assets['version'])
			->setInFooter(true)
			->enqueue();
		$enqueue->localizeScript(array(
			'WSL_URLs' => WSL_URLs::instance()->get_array(),
			'WSL_post_info' => WSL_Post::instance()->get_posts_info()
		));
	}

	public static function instance()
	{
		return new WSL_Enqueue_Scripts();
	}
}

WSL_Enqueue_Scripts::instance()->init();
