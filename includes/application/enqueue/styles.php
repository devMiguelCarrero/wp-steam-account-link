<?php

class WSL_Enqueue_Styles
{

	function __construct()
	{
		$this->script_assets = include WSL_BUILD_PATH . 'script.asset.php';
		$this->admin_assets = include WSL_BUILD_PATH . 'admin.asset.php';
	}

	public function init()
	{
		add_action('enqueue_block_editor_assets', [$this, 'editor_styles']);
		add_action('admin_enqueue_scripts', [$this, 'admin_styles']);
		add_action('wp_enqueue_scripts', [$this, 'front_styles']);
	}

	public function editor_styles()
	{
	}

	public function front_styles()
	{

		$enqueue = new WSL_EnqueueBuilder();
		$enqueue->setType('style')
			->setName('font-awesome')
			->setPath('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css')
			->setVer('5.15.3')
			->setMedia('all')
			->enqueue();

		$enqueue = new WSL_EnqueueBuilder();
		$enqueue->setType('style')
			->setName(WSL_DOMAIN . '-course-edit-style')
			->setPath(WSL_PLUGIN_URL . 'build/script.css')
			->setVer($this->script_assets['version'])
			->setMedia('all')
			->enqueue();

		$enqueue = new WSL_EnqueueBuilder();
		$enqueue->setType('style')
			->setName(WSL_DOMAIN . '-style')
			->setPath(WSL_PLUGIN_URL . 'build/style-script.css')
			->setVer($this->script_assets['version'])
			->setMedia('all')
			->enqueue();
	}

	public function admin_styles()
	{
		
		$enqueue = new WSL_EnqueueBuilder();
		$enqueue->setType('style')
			->setName(WSL_DOMAIN . '-admin-style')
			->setPath(WSL_PLUGIN_URL . 'build/admin.css')
			->setVer($this->admin_assets['version'])
			->setMedia('all')
			->enqueue();

		$enqueue = new WSL_EnqueueBuilder();
		$enqueue->setType('style')
			->setName(WSL_DOMAIN . '-admin-edit-style')
			->setPath(WSL_PLUGIN_URL . 'build/style-admin.css')
			->setVer($this->admin_assets['version'])
			->setMedia('all')
			->enqueue();
	}

	public static function instance()
	{
		return new WSL_Enqueue_Styles();
	}
}

WSL_Enqueue_Styles::instance()->init();
