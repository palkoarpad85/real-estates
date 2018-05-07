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
use Cake\ORM\TableRegistry;
use Intervention\Image\ImageManagerStatic as Image;



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
        parent::beforeFilter($event);
        $this->now = new Time();

        $this->Auth->allow(['login','register','resetpassword','changepassword','verify','forgotPassword']);
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
    public function register(){

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
                    $this->Flash->success(__('The register success'));
                }
                return $this->redirect(['controller'=>'realestates','action' => 'index']);
            }
            $this->Flash->error(__('The register could not be saved. Please, try again.'));
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
                        $UserLock->created=$this->now;
                        $UserLock->created_by=$UserLock->id;
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
    /**Forgot password */

    public function forgotpassword(){

        if($this->request->is('post')){
            $data["email"] = $this->request->getdata()["email"];
            $user = $this->Users->find('Email', $data)->first();
                if ($user != null)
                {
                    if($user){
                        $user->last_login_ip=$this->request->clientIp();
                        $user->last_login=$this->now;
                        $user->token=null;
                        $user->modified=$this->now;
                        $user->modified_by=$user->id;
                        $user->password_reset_count++;
                        $token = $user['username'].$user['email'].Configure::read('User.verify_token_length');
                        $user->password_code = base64_encode((new DefaultPasswordHasher)->hash($token));
                        if ($this->Users->save($user) && $this->sendEmail($user,"forgotpassword")) {
                            $this->Flash->success(__('The email was succesfully sent.'));
                        }
                        return $this->redirect(['controller'=>'realestates','action' => 'index']);
                    }
                    else{
                        $this->Flash->error(__('ERROR Please, try again.'));
                    }
                }
                else{
                    $this->Flash->error(__('The email address was not found in the database.'));
                }
        }
        

    }
    /** changepassword */

    public function changepassword($tok = null){
        if (!empty($tok)) {

           $token["token"] = $tok;
           $user  = $this->Users->find('PasswordToken', $token)->first();
            
            if ($user) {
                
                if (!empty($this->request->data)) {
                    $user = $this->Users->patchEntity($user, [
                        'password' => $this->request->data['new_password'],
                        'new_password' => $this->request->data['new_password'],
                        'confirm_password' => $this->request->data['confirm_password']
                            ]
                    );              

                    $user->last_login_ip=$this->request->clientIp();
                    $user->last_login=$this->now;
                    $user->password_code=null;
                    $user->modified=$this->now;
                    $user->modified_by=$user->id;
                    

                    if ($this->Users->save($user)) {
                        $this->Flash->success('Your password has been changed successfully');
                        $emaildata = ['name' => $user->first_name, 'email' => $user->email];
                        $this->sendEmail($user,"changePasswordEmail");
                        $this->redirect(['action' => 'index']);
                    } else {
                        $this->Flash->error('Error changing password. Please try again!');
                        return $this->redirect(['controller'=>'realestates','action' => 'index']);
                    }
                }
            } else {
                $this->Flash->error('Sorry your password token has been expired.');
                return $this->redirect(['controller'=>'realestates','action' => 'index']);
            }
        } else {
            $this->Flash->error('Error loading password reset.');
            return $this->redirect(['controller'=>'realestates','action' => 'index']);
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**Reset password */
    function resetpassword(){

        $user = $this->Users->get($this->Auth->user('id'));
        
        if(!empty($this->request->data))
        {
            $user = $this->Users->patchEntity($user, [
                    'old_password'      => $this->request->data['old_password'],
                    'password'          => $this->request->data['new_password'],
                    'new_password'      => $this->request->data['new_password'],
                    'confirm_password'  => $this->request->data['password_confirm']
                ]
                
            );
            
            if($this->Users->save($user))
            {
                $this->Flash->success('Your password has been changed successfully');
                //Email code
                $this->redirect(['action'=>'index']);
            }
            else
            {
                $this->Flash->error('Error changing password. Please try again!');
            }
            
        }
        
        $this->set('user',$user);

    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        if (null == ($this->request->query("reset"))) {
            if($this->request->query("name") || $this->request->query("role") ||$this->request->query("email") || $this->request->query("active")){
                
            
            $name       = trim($this->request->query("name"));
            $role       = trim($this->request->query("role"));
            $email      = trim($this->request->query("email"));
            $active     = trim($this->request->query("active"));
           
                if ($active == 1 || $active == 3) {
                    if ($active == 1) {
                        $active = true;
                    } else {
                        $active = false;
                    }
                    $tableValues = $this->paginate($this->Users->find()
                    ->contain(['Roles'])
                    ->select(['id', 'active', 'username','email','created'])                     
                    ->where(['Users.active' => $active])                 
                    ->where(['Users.username LIKE ' => '%'.$name.'%'])
                    ->where(['Users.email LIKE ' => '%'.$email.'%']),
                    [
                    'order' => [
                        'Users.username' => 'asc'                        
                    ],'limit' => 20]); 
                }
                
                else{
                    $tableValues = $this->paginate($this->Users->find()
                    ->contain(['Roles'])
                    ->select(['id', 'active', 'username','email','created'])
                    ->where(['Users.username LIKE ' => '%'.$name.'%'])
                    ->where(['Users.email LIKE ' => '%'.$email.'%']),
                    [
                    'order' => [
                        'Users.username' => 'asc'                        
                    ],'limit' => 20]);  
                }
        }
        else{
            $tableValues = $this->paginate($this->Users->find()
                    ->select(['id', 'active', 'username','email','created'])    
                    ->contain(['Roles']),
                    [
                    'order' => [
                        'Users.username' => 'asc'                        
                    ],'limit' => 20]);  
             
          
        }
     }
     else{
        $tableValues = $this->paginate($this->Users->find()
                    ->select(['id', 'active', 'username','email' ,'created'])    
                    ->contain(['Roles']),
                    [
                    'order' => [
                        'Users.username' => 'asc'                        
                    ],'limit' => 20]);  
        $name     = null;
        $username = null;
        $active   = null;

     }
            
        $this->set(compact('role'));
        $this->set(compact('email'));
        $this->set(compact('name'));
        $this->set(compact('active'));
        $this->set(compact('tableValues'));
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
        $opt["id"] = $id;
        
        $user = $this->Users->get($id, [
            'contain' => [ 'Realestates']]);

       
       $realEstatesCount       = count($user->realestates);      
       $realEstatesActiveCount = $this->Users->find("ActiveRealestatesCount",$opt)->first();  
       $realEstatesActive   = $this->Users->find("ActiveRealestates",$opt)->toArray();
        $this->set('entity', $user);
        $this->set('realEstatesCount', $realEstatesCount);
        $this->set('realEstatesActiveCount', $realEstatesActiveCount);
        $this->set('realEstatesActive', $realEstatesActive);
    }
     

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function profile()
    {
        $user = $this->request->session()->read('Auth.User');
        $opt["id"] = $user['id'];
        
        $user = $this->Users->get($user['id'], [
            'contain' => [ 'Realestates']]);
       
       $realEstatesCount       = count($user->realestates);      
       $realEstatesActiveCount = $this->Users->find("ActiveRealestatesCount",$opt)->first();  
       $realEstatesActive   = $this->Users->find("ActiveRealestates",$opt)->toArray();
        $this->set('entity', $user);
        $this->set('realEstatesCount', $realEstatesCount);
        $this->set('realEstatesActiveCount', $realEstatesActiveCount);
        $this->set('realEstatesActive', $realEstatesActive);
    }


    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null){

        $authUserId = $this->request->session()->read('Auth.User');
        if($id == $authUserId["id"]){

        $user = $this->Users->get($id, [
            'contain' => [ 'Realestates']]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->modified    = $this->now;
            $user->modified_by = $user->id;
            if(isset($this->request->data['avatar'])){
                $file = $this->request->data['avatar']; 
                    
                Image::configure();
                $image = Image::make($file["tmp_name"])->resize(150, 150)->save(WWW_ROOT . 'img/avatar/' . $file['name']);
                $fileName =$file['name'];               
                $user->avatar = $fileName;
            }
            
            if ($this->Users->save($user)) {
                if (isset($this->request->data['avatar'])) {
                    $this->Flash->success(__('Profile profile upload successfully.'));
                    return $this->redirect(['action' => 'edit',$id]);
                }else{
                    $this->Flash->success(__('The user has been saved.'));
                    return $this->redirect(['action' => 'edit',$id]);
                }
                
            }else{
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
            
        }
        $realEstatesCount       = count($user->realestates);
        $opt["id"] = $id; 
        $realEstatesActiveCount = $this->Users->find("ActiveRealestates",$opt)->first();  
        $realEstatesActive   = $this->Users->find("ActiveRealestates",$opt)->toArray();
        $this->set('realEstatesActive', count($realEstatesActive));
        $this->set('user', $user);
        $this->set('realEstatesCount', $realEstatesCount);
        $this->set('realEstatesActiveCount', $realEstatesActiveCount);
        }
        else{
        $this->Flash->error(__('You dont have access'));
        return $this->redirect(['action' => 'index']);
        }  
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null){

        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function uploadImage($file)
    {
        
        $file['name'] =   str_replace(' ', '_', $file['name']); // timestamp files to prevent clobber
        if (move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/avatar/' . $file['name'])) {
             
            return  $file['name'];            
        } else {
            
            $this->Flash->error(__('Could not upload the file'));
        }
    
    }

    /**
     * @param $user
     * @param $type
     * @return bool
     */
    private function sendEmail($user,$type){

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

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }
    
}
