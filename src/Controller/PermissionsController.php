<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\I18n\Time;
use Cake\I18n\I18n;
/**
 * Permissions Controller
 *
 * @property \App\Model\Table\PermissionsTable $Permissions
 *
 * @method \App\Model\Entity\Permission[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PermissionsController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->now = new Time();
       // $this->Auth->allow(['add','edit','index','delete']);  
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
       

        if (null == ($this->request->query("reset"))) {
            if($this->request->query("view") || $this->request->query("controller") || $this->request->query("active")){
                
            $view       = trim($this->request->query("view"));
            $controller = trim($this->request->query("controller"));
            $active     = trim($this->request->query("active"));
           
                if ($active == 1 || $active == 3) {
                    if ($active == 1) {
                        $active = true;
                    } else {
                        $active = false;
                    }
                    $tableValues = $this->paginate($this->Permissions->find()
                    ->select(['id', 'active', 'view','contoller','Users.username','created'])                     
                    ->where(['Permissions.active' => $active])                 
                    ->where(['Permissions.contoller LIKE ' => '%'.$controller.'%'])
                    ->where(['Permissions.view LIKE ' => '%'.$view.'%'])
                   /* ->where(['Users.username LIKE ' => '%'.$username.'%'])*/
                    ->contain(['Users']),
                    [
                    'order' => [
                        'Permissions.contoller' => 'asc',
                        'Permissions.view' => 'asc'
                    ],'limit' => 20]); 
                }
                
                else{
                    $tableValues = $this->paginate($this->Permissions->find()
                    ->select(['id', 'active', 'view','contoller','Users.username','created'])
                    ->where(['Permissions.contoller LIKE ' => '%'.$controller.'%'])
                    ->where(['Permissions.view LIKE ' => '%'.$view.'%'])
                    /*->where(['Users.username LIKE ' => '%'.$username.'%'])*/
                    ->contain(['Users']),
                    [
                    'order' => [
                        'Permissions.contoller' => 'asc',
                        'Permissions.view' => 'asc'
                    ],'limit' => 20]); 
                }
        }
        else{
           $tableValues = $this->paginate($this->Permissions,[
                'contain' => [ 'Users'],              
                'limit' => 20,
                'order' => [
                    'Permissions.contoller' => 'asc',
                    'Permissions.view' => 'asc'
                ]]);
        }
     }
     else{
        $tableValues = $this->paginate($this->Permissions,[
            'contain' => [ 'Users'],
            
            'limit' => 20,
            'order' => [
                'Permissions.contoller' => 'asc',
                'Permissions.view' => 'asc'
            ]]);
        $name     = null;
        $username = null;
        $active   = null;

     }
                  
        $this->set(compact('view'));
        $this->set(compact('controller'));
        $this->set(compact('username'));
        $this->set(compact('active'));
        $this->set(compact('tableValues'));
    }

    /**
     * View method
     *
     * @param string|null $id Permission id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {      
        $permission = $this->Permissions->find()
        ->enableAutoFields(true)        
        ->select([
            'id' => 'Permissions.id',
            'view' => "Permissions.view",
            'contoller' => "Permissions.contoller",
            'modified' => "Permissions.modified",
            'created' => "Permissions.created",
            'Ucreated_by' => "Users.username",
            'Umodified_by' => "Users2.username"
        ])
         ->join([
            'Users' => [
                'table' => 'users',
                'type' => 'INNER',
                'conditions' => [
                    'Permissions.created_by = Users.id',
                ],
            ],            
        ])
        ->join([
            'Users2' => [
                'table' => 'users',
                'type' => 'INNER',
                'conditions' => [
                    'Permissions.modified_by = Users2.id',
                ],
            ],            
        ])        
        ->contain(['Roles'])
        ->where([
            'Permissions.id' => $id
        ])        
        ->toArray();        
        $this->set('permission', $permission[0]);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
      
        $entity = $this->Permissions->newEntity();
        
        if ($this->request->is('post')) {
            $entity = $this->Permissions->patchEntity($entity, $this->request->getData());
         
            $entity->created_by  = $this->Auth->user("id");
            $entity->created     = $this->now;
            $entity->modified_by = $this->Auth->user("id");
            $entity->modified    = $this->now;
            $entity->active      = 1;
            
            
            if ($this->Permissions->save($entity)) {
                $this->Flash->success(__('The Permissions has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The '.$this->name.' could not be saved. Please, try again.'));
        }
       
        $roles = $this->Permissions->Roles->find('list', ['limit' => 200])->where([
            'active' => 1
        ])  ;
        $this->set(compact('entity', 'roles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Permission id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $entity = $this->Permissions->get($id, [
            'contain' => ['Roles']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $entity = $this->Permissions->patchEntity($entity, $this->request->getData());
            if ($this->Permissions->save($entity)) {
                $this->Flash->success(__('The permission has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The permission could not be saved. Please, try again.'));
        }
        $roles = $this->Permissions->Roles->find('list', ['limit' => 200]);
        $this->set(compact('entity', 'roles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Permission id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $entity = $this->Permissions->get($id);
        $entity->modified_by = $this->Auth->user("id");
        $entity->modified    = $this->now;
        $entity->active      = 0;

        if ($this->Permissions->save($entity)) {
            $this->Flash->success(__('The permission has been deleted.'));
        } else {
            $this->Flash->error(__('The permission could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

 /**
     * Delete method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function restore($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        $entity              = $this->Permissions->get($id);
        $entity->modified_by = $this->Auth->user("id");
        $entity->modified    = $this->now;
        $entity->active      = 1;

        if ($this->Permissions->save($entity)) {
            $this->Flash->success(__('The '.$this->name.' has been restore.'));
        } else {
            $this->Flash->error(__('The '.$this->name.' could not be restore. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }



}
