<?php
namespace App\I18n;

use Cake\Controller\Controller;
use Cake\Core\Configure;
use Cake\I18n\I18n;
use Cake\I18n\Time;

class Language
{

    protected $_session;
    protected $_cookie;
    protected $_controller;
    protected $_locales = [];
    protected $_locale;

    public function __construct(Controller $controller)
    {

        $this->_controller = $controller;
        $this->_session = $controller->request->session();
        $this->_cookie = $controller->Cookie;
        $this->_locales = Configure::read('I18n.locales');
        $this->_locale = I18n::locale();
        $this->now = new Time();
        $this->_cookie->configKey('language', [
            'expires' => '+2 year',
        ]);
    }

    public function setLanguage()
    {

        if ($this->_controller->Auth->user()) {

            if ($this->_session->read('Auth.User.language') && isset($this->_locales[$this->_session->read('Auth.User.language')])) {
                //If the user has not the cookie, we set the cookie.
                if (!$this->_cookie->check('language') || $this->_cookie->read('language') != $this->_session->read('Auth.User.language')) {
                    $this->_cookie->write('language', $this->_session->read('Auth.User.language'));
                }

                $this->_locale = $this->_session->read('Auth.User.language');
            }
        } else {

            if ($this->_cookie->check('language') && isset($this->_locales[$this->_cookie->read('language')])) {
                $this->_locale = $this->_cookie->read('language');
            }
        }

        if (!is_null($this->_controller->request->getParam('lang')) && isset($this->_locales[$this->_controller->request->getParam('lang')])) {

            if ($this->_controller->Auth->user()) {
                $this->_controller->loadModel('Users');

                $user = $this->_controller->Users
                    ->find()
                    ->where(['id' => $this->_session->read('Auth.User.id')])
                    ->where(['active' => 1])
                    ->first();

                $user->language = $this->_controller->request->getParam('lang');
                $user->modified_by = $user->id;
                $user->modified = $this->now;
                $this->_controller->Users->save($user);
                $this->_session->write('Auth.User.language', $this->_controller->request->getParam('lang'));
            }

            $this->_cookie->write('language', $this->_controller->request->getParam('lang'));
            $this->_locale = $this->_controller->request->getParam('lang');
        }

        I18n::locale($this->_locale);
    }
}
