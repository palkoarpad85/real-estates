<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use App\I18n\Language;
use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Core\Configure;
use Cake\I18n\I18n;
/**
 * 
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    public $components = array('Cookie');
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
        
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');       
        $this->loadComponent('Auth', [
            'authorize' => ['Controller'],
            'authError' => __('Did you really think you are allowed to see that?'),
            'authenticate' => [
                'Form' => [
                    'fields' => ['username' => 'username', 'password' => 'password'],

                ],
            ],
            'loginAction' => [
                'controller' => 'users',
                'action' => 'login',
            ],
            'loginRedirect' => [
                'controller' => 'Users', //ide ugrik ha bejelentkezett
                'action' => 'index',
            ],
            'logoutRedirect' => [
                'controller' => 'Users',
                'action' => 'login',
            ],
            'unauthorizedRedirect' => [
                'controller' => 'Users', //ide ugrik ha ninca jogosultága
                'action' => 'login',
            ],
            'storage' => 'Session',
        ]);

        /*
         * Enable the following components for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        $this->loadComponent('Security');
        $this->loadComponent('Csrf');
    }

    public function beforeFilter(Event $event)
    {
        Configure::write('I18n.locales', [
            'en_US' => __('English'),
            'hu_HU' => __('Magyar')
        ]);

        //lang
        $language = new Language($this);
        $language->setLanguage();
       
    }

   
    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return \Cake\Network\Response|null|void
     */
    public function beforeRender(Event $event)
    {

        if (isset($this->Auth)) {
            $this->set('current_user', $this->Auth->user());
        }

        //login check
        if ($this->request->session()->read('Auth.User')) {
            $this->set('loggedIn', true);
        } else {
            $this->set('loggedIn', false);
        }
    }

    public function isAuthorized($user)
    {
        // jogosultság kezelés
        $opt["id"] = $user['id'];
        $opt["view"] = $this->request->param("action");
        $opt["controller"] = $this->request->param("controller");
        $boolen = false;
        $users = TableRegistry::get('Users')->find('Roles', $opt)->first();
        
        $this->set('role', $users['_matchingData']['Roles']['name']);         
        if ($users["count"] >= 1) {
            return true;
            
        } else {
            return false;
            
        }
    }
}
