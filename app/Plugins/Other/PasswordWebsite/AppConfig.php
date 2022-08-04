<?php
/**
 * Plugin format 2.0
 */
#App\Plugins\Other\PasswordWebsite\AppConfig.php
namespace App\Plugins\Other\PasswordWebsite;

use App\Plugins\Other\PasswordWebsite\Models\PluginModel;
use SCart\Core\Admin\Models\AdminConfig;
use SCart\Core\Admin\Models\AdminMenu;
use App\Plugins\ConfigDefault;
class AppConfig extends ConfigDefault
{
    public function __construct()
    {
        //Read config from config.json
        $config = file_get_contents(__DIR__.'/config.json');
        $config = json_decode($config, true);
    	$this->configGroup = $config['configGroup'];
    	$this->configCode = $config['configCode'];
        $this->configKey = $config['configKey'];
        $this->scartVersion = $config['scartVersion'];
        //Path
        $this->pathPlugin = $this->configGroup . '/' . $this->configCode . '/' . $this->configKey;
        //Language
        $this->title = trans($this->pathPlugin.'::lang.title');
        //Image logo or thumb
        $this->image = $this->pathPlugin.'/'.$config['image'];
        //
        $this->version = $config['version'];
        $this->auth = $config['auth'];
        $this->link = $config['link'];
    }

    public function install()
    {
        $return = ['error' => 0, 'msg' => ''];
        $check = AdminConfig::where('key', $this->configKey)->first();
        if ($check) {
            //Check Plugin key exist
            $return = ['error' => 1, 'msg' =>  sc_language_render('admin.plugin.plugin_exist')];
        } else {

            $checkMenu = AdminMenu::where('key', $this->configKey)->first();
            if (!$checkMenu) {
                $menuSecurity = AdminMenu::where('key', 'ADMIN_SECURITY')->first();
                if (!$menuSecurity) {
                    $idSecurity = AdminMenu::insertGetId([
                        'parent_id' => 9,
                        'sort' => 6,
                        'title' => 'admin.menu_titles.security',
                        'icon' => 'fab fa-shirtsinbulk',
                        'key' => 'ADMIN_SECURITY',
                    ]);
                } else {
                    $idSecurity = $menuSecurity->id;
                }

                AdminMenu::insertGetId([
                    'parent_id' => $idSecurity,
                    'title' => $this->pathPlugin.'::lang.title',
                    'icon' => 'fa fa-lock',
                    'uri' => 'route::admin_passwordwebsite.index',
                    'key' => $this->configKey,
                ]);
            }

            //Insert plugin to config
            $dataInsert = [
                [
                    'group'  => $this->configGroup,
                    'code'   => $this->configCode,
                    'key'    => $this->configKey,
                    'store_id' => 0,
                    'sort'   => 0,
                    'value'  => self::ON, //Enable extension
                    'detail' => $this->pathPlugin.'::lang.title',
                ],
                [
                    'group'    => '',
                    'code'     => $this->configKey.'_config',
                    'key'      => $this->configKey.'_mode',
                    'store_id' => SC_ID_ROOT,
                    'sort'     => 0,
                    'value'    => self::OFF, 
                    'detail'   => $this->pathPlugin.'::lang.title',
                ],
                [
                    'group'    => '',
                    'code'     => $this->configKey.'_config',
                    'key'      => $this->configKey.'_password',
                    'store_id' => SC_ID_ROOT,
                    'sort'     => 0,
                    'value'    => '123456', 
                    'detail'   => $this->pathPlugin.'::lang.title',
                ],
            ];

            $process = AdminConfig::insert(
                $dataInsert
            );

            if (!$process) {
                $return = ['error' => 1, 'msg' => sc_language_render('admin.plugin.install_faild')];
            } else {
                $return = (new PluginModel)->installExtension();
            }
        }

        return $return;
    }

    public function uninstall()
    {
        $return = ['error' => 0, 'msg' => ''];
        //Please delete all values inserted in the installation step
        $process = (new AdminConfig)
            ->where('key', $this->configKey)
            ->orWhere('code', $this->configKey.'_config')
            ->delete();
        session()->forget('password_website');
        if (!$process) {
            $return = ['error' => 1, 'msg' => sc_language_render('admin.plugin.action_error', ['action' => 'Uninstall'])];
        }
        (new AdminMenu)->where('key', $this->configKey)->delete();
        (new PluginModel)->uninstallExtension();
        return $return;
    }
    
    public function enable()
    {
        $return = ['error' => 0, 'msg' => ''];
        $process = (new AdminConfig)->where('key', $this->configKey)->update(['value' => self::ON]);
        if (!$process) {
            $return = ['error' => 1, 'msg' => 'Error enable'];
        }
        return $return;
    }

    public function disable()
    {
        $return = ['error' => 0, 'msg' => ''];
        $process = (new AdminConfig)
            ->where('key', $this->configKey)
            ->update(['value' => self::OFF]);
        if (!$process) {
            $return = ['error' => 1, 'msg' => 'Error disable'];
        }
        return $return;
    }



    public function config()
    {
        //redirect to url config of plugin
        return redirect(sc_route_admin('admin_passwordwebsite.index'));
    }
 

    public function getData()
    {
        $arrData = [
            'title' => $this->title,
            'code' => $this->configCode,
            'key' => $this->configKey,
            'image' => $this->image,
            'permission' => self::ALLOW,
            'version' => $this->version,
            'auth' => $this->auth,
            'link' => $this->link,
            'value' => 0, // this return need for plugin shipping
            'pathPlugin' => $this->pathPlugin
        ];

        return $arrData;
    }

    /**
     * Process after order success
     *
     * @param   [array]  $data  
     *
     */
    public function endApp($data = []) {
        //action after end app
    }
}
