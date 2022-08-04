<?php
#App\Plugins\Other\PasswordWebsite\Admin\AdminController.php

namespace App\Plugins\Other\PasswordWebsite\Admin;

use SCart\Core\Admin\Controllers\RootAdminController;
use App\Plugins\Other\PasswordWebsite\AppConfig;

class AdminController extends RootAdminController
{
    public $plugin;

    public function __construct()
    {
        parent::__construct();
        $this->plugin = new AppConfig;
    }
    public function index()
    {
        
        $urlUpdateConfig = sc_route_admin('admin_config.update');

        return view($this->plugin->pathPlugin.'::Admin',
            [
                'code'            => $this->plugin->configCode,
                'key'             => $this->plugin->configKey,
                'title'           => $this->plugin->title,
                'pathPlugin'      => $this->plugin->pathPlugin,
                'urlUpdateConfig' => $urlUpdateConfig,
                'storeId' => session('adminStoreId'),
            ]
        );
    }
}
