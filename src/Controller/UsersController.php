<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\I18n\Time;
use Cake\I18n\I18n;
use Cake\Mailer\MailerAwareTrait;
use Cake\Utility\Inflector;
use Cake\Core\Configure;
use Cake\Auth\DefaultPasswordHasher;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    use MailerAwareTrait;

    public function beforeFilter(Event $event)
    {
        $this->now = new Time();

      //      $this->Auth->allow(['login','register','add','index','verify','forgotPassword']);
    }


    /**
     * @return \Cake\Http\Response|null
     *
     */
    public function login()
    {

        $this->viewBuilder()->setLayout('login');
        if ($this->request->is('post')) {
            if (!isset($this->request->params['_csrfToken']) || ($this->request->params['_csrfToken'] != $this->request->cookies['csrfToken'])) {
                $this->Security->blackHoleCallback = '__blackhole';
            } else {

                $user = $this->Auth->identify();
                if ($user !=null && $user["active"] == true) {
                    $this->Auth->setUser($user);
                    return $this->redirect($this->Auth->redirectUrl());
                } else {
                    $this->Flash->error(__('Username or password is incorrect'));
                }
            }
        }

    }

    /**
     * register method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function register()
    {

        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $roles = $this->Users->Roles->get('1');
            $token = $this->request->data['username'].$this->request->data['email'].Configure::read('User.verify_token_length');
            $token = base64_encode((new DefaultPasswordHasher)->hash($token));

            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->username=$this->request->data["username"];
            $user->active=false;
            $user->created=$this->now;
            $user->created_by=null;
            $user->last_login=$this->now;
            $user->register_ip=$this->request->clientIp();
            $user->modified=$this->now;
            $user->modified_by=null;
            $user->token=$token;
            $user->password_reset_count=0;
            $user->language="hu_HU";
            $user->avatar="avatar.png";
            $roles1[0] = $roles;
            $user->roles = $roles1;

            if ($this->Users->save($user) && $this->sendEmail($user,"register")) {
                $user->created_by=$user->id;
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('The user has been saved.'));
                }
                return $this->redirect(['controller'=>'realestates','action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user', $user));

    }

    /**
     * verify
     */
    public function verify(){
        if ($this->request->is('get')) {

            if(!$this->request->getParam("pass")){
                $this->Flash->error(__('The verify token is incorrect'));
                return $this->redirect(['action' => 'login']);
            }
            $token['token'] = $this->request->getParam("pass")[0];

            if (strlen($token["token"]) == Configure::read('User.verify_token_length')) {
                if ($token) {
                    $UserLock = $this->Users->find('Token', $token)->first();
                    if ($UserLock == null) {
                        $this->Flash->error(__('Verify token is incorrect'));
                        return $this->redirect(['action' => 'login']);
                    }
                    $email = $UserLock['email'];
                    $username = $UserLock['username'];

                    $this->set('email', $email);
                    $this->set('username', $username);
                    $this->set('token', $token);

                } else {
                    return $this->redirect(['action' => 'login']);
                }
            } else {
                $this->Flash->error(__('The verify token is incorrect'));
                return $this->redirect(['action' => 'login']);
            }
        }
        elseif($this->request->is('post')){
            if (!isset($this->request->params['_csrfToken']) || ($this->request->params['_csrfToken'] != $this->request->cookies['csrfToken'])) {
                $this->Security->blackHoleCallback = '__blackhole';
            } else {
                $token["token"] = $this->request->params['pass'][0];
                $UserLock = $this->Users->find('Token', $token)->first();
                if ($UserLock != null)
                {
                    if($UserLock){
                        $UserLock->active=1;
                        $UserLock->last_login_ip=$this->request->clientIp();
                        $UserLock->token=null;
                        $UserLock->modified=$this->now;
                        $UserLock->modified_by=$UserLock->id;
                        $UserLock->tos_date=$this->now;

                        if ($this->Users->save($UserLock)) {
                            $UserLock->created_by=$UserLock->id;
                            if ($this->Users->save($UserLock)) {
                                $this->Flash->success(__('The registration succesfully.'));
                            }
                            return $this->redirect(['controller'=>'realestates','action' => 'index']);
                        }
                        $this->Flash->error(__('ERROR Please, try again.'));
                    }
                    else{
                        $this->Flash->error(__('Username or password is incorrect'));
                    }

                }
            }

        }
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Phones', 'Roles', 'Realestates']
        ]);

        $this->set('user', $user);
    }



    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Phones', 'Roles']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $phones = $this->Users->Phones->find('list', ['limit' => 200]);
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'phones', 'roles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * @param $user
     * @param $type
     * @return bool
     */
    private function sendEmail($user,$type)
    {
        $data["user"]     = $user;
        $data["form"]     = Configure::read('Site.send_email');
        $data["template"] = $type;
        $data["subject"]  = __('Ingatlan');


        if ($this->getMailer('User')->send($type, [$data]))
        {
         return true;
        }
         return false;
    }

}
