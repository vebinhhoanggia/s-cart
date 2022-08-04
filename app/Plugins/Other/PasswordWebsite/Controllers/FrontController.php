<?php
#App\Plugins\Other\PasswordWebsite\Controllers\FrontController.php
namespace App\Plugins\Other\PasswordWebsite\Controllers;

use App\Plugins\Other\PasswordWebsite\AppConfig;
use SCart\Core\Front\Controllers\RootFrontController;
class FrontController extends RootFrontController
{
    public $plugin;

    public function __construct()
    {
        parent::__construct();
        $this->plugin = new AppConfig;
    }

    /**
     * Index 
     *
     * @return void
     */
    public function index() {
        return view($this->plugin->pathPlugin.'::Front',
            [
                'title' => sc_language_render($this->plugin->pathPlugin.'::lang.password_require'),
                'password_trans' => sc_language_render($this->plugin->pathPlugin.'::lang.password'),
            ]
        );
    }

    /**
     * Process password
     *
     * @return void
     */
    public function processPassword() {
        $password = request('password_website') ?? '';
        if ($password !== sc_config('PasswordWebsite_password')) {
            return redirect()->back()->with(['error' => 'Password incorrect!']);
        } else {
            session(['password_website' => sc_token('32')]);
            return redirect(sc_route('home'));
        }
    }
}
