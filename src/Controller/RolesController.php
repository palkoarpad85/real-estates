<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\I18n\Time;
use Cake\I18n\I18n;
/**
 * Roles Controller
 *
 * @property \App\Model\Table\RolesTable $Roles
 *
 * @method \App\Model\Entity\Role[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RolesController extends AppController
{



    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->now = new Time();        
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        if (null ==($this->request->query("reset"))) {
            if($this->request->query("name") || $this->request->query("username") || $this->request->query("active")){
                
            $name     = trim($this->request->query("name"));
            $username = trim($this->request->query("username"));
            $active   = trim($this->request->query("active"));
              
              if ($active == 1 || $active == 3) {
                if ($active == 1) {
                    $active2 = true;
                } else {
                    $active2 = false;
                }
                $tableValues = $this->Roles->find()
                ->select([
                    'id' => 'Roles.id',             
                    'name' => "Roles.name",            
                    'created' => "Roles.created",
                    'Ucreated_by' => "Users.username", 
                    'active' => "Roles.active"            
                ])
                ->join([
                    'Users' => [
                        'table' => 'users',
                        'type' => 'INNER',
                        'conditions' => [
                            'Roles.created_by = Users.id',
                        ],
                    ],            
                ])                 
                ->Orwhere(['Roles.active' => $active2])                 
                ->where(['name LIKE ' => '%'.$name.'%'])
                ->where(['Users.username LIKE ' => '%'.$username.'%'])
                ->contain(['Users']); 
              } 
                else{
                $tableValues = $this->Roles->find()
                ->select([
                    'id' => 'Roles.id',             
                    'name' => "Roles.name",            
                    'created' => "Roles.created",
                    'Ucreated_by' => "Users.username", 
                    'active' => "Roles.active"            
                ])
                ->join([
                    'Users' => [
                        'table' => 'users',
                        'type' => 'INNER',
                        'conditions' => [
                            'Roles.created_by = Users.id',
                        ],
                    ],            
                ])
                
                ->where(['name LIKE ' => '%'.$name.'%'])
                ->where(['Users.username LIKE ' => '%'.$username.'%'])
                ->contain(['Users']); 

                }      
        }
        else{
            $tableValues =$this->Roles->find()
                ->select([
                    'id' => 'Roles.id',             
                    'name' => "Roles.name",            
                    'created' => "Roles.created",
                    'Ucreated_by' => "Users.username", 
                    'active' => "Roles.active"            
                ])
                ->join([
                    'Users' => [
                        'table' => 'users',
                        'type' => 'INNER',
                        'conditions' => [
                            'Roles.created_by = Users.id',
                        ],
                    ],            
                ])
                ->contain('Users')
                ->limit('2');
                     
        }
     }
     else{
        $tableValues =$this->Roles->find()
        ->select([
            'id' => 'Roles.id',             
            'name' => "Roles.name",            
            'created' => "Roles.created",
            'Ucreated_by' => "Users.username", 
            'active' => "Roles.active"
            
        ])
         ->join([
            'Users' => [
                'table' => 'users',
                'type' => 'INNER',
                'conditions' => [
                    'Roles.created_by = Users.id',
                ],
            ],            
        ])
        ->contain('Users')
        ->limit('2');
        
  
        $name     = null;
        $username = null;
        $active   = null;

     }
        $this->set(compact('name'));
        $this->set(compact('username'));
        $this->set(compact('active'));
        $this->set('tableValues', $this->paginate($tableValues));
         
    }

    /**
     * View method
     *
     * @param string|null $id Role id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $role = $this->Roles->find()
        ->enableAutoFields(true)  
                ->select([
                    'id' => 'Roles.id',             
                    'name' => "Roles.name",            
                    'created' => "Roles.created",
                    'modified'=> "Roles.modified",
                    'Ucreated_by' => "Users.username", 
                    'Umodified_by' => "Users2.username", 
                    'active' => "Roles.active"
                     
                ])
                
                ->join([
                    'Users' => [
                        'table' => 'users',
                        'type' => 'INNER',
                        'conditions' => [
                            'Roles.created_by = Users.id',
                        ],
                    ],            
                ])
                ->join([
                    'Users2' => [
                        'table' => 'users',
                        'type' => 'INNER',
                        'conditions' => [
                            'Roles.modified_by = Users.id',
                        ],
                    ],            
                ])
                ->contain(['Permissions', 'Users'])
                
                ->where([
                    'Roles.id' => $id
                ])        
                ->toArray();
                $roles = $role[0];
                
        $this->set('role',$roles);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $entity = $this->Roles->newEntity();
         
        
        if ($this->request->is('post')) {

            $entity = $this->Roles->patchEntity($entity, $this->request->getData());
             
            $entity->created_by  = $this->Auth->user("id");
            $entity->created     = $this->now;
            $entity->modified_by = $this->Auth->user("id");
            $entity->modified    = $this->now;
            $entity->active      = 1;    

            if ($this->Roles->save($entity)) {
                $this->Flash->success(__('The role has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The role could not be saved. Please, try again.'));
        }
        $permissions = $this->Roles->Permissions->find('list', ['conditions'=>array('active'=>1),
                                                                 
                                                                 'limit' => 200]);
         
        $users = $this->Roles->Users->find('list', ['conditions'=>array('active'=>1),
                                                    'limit' => 200]);
         
        $this->set(compact('entity', 'permissions', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Role id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $entity = $this->Roles->get($id, [
            'contain' => ['Permissions', 'Users']
        ]);
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $entity = $this->Roles->patchEntity($entity, $this->request->getData());
              
            $entity->created_by  = $this->Auth->user("id");
            $entity->created     = $this->now;
            $entity->modified_by = $this->Auth->user("id");
            $entity->modified    = $this->now;
            $entity->active      = 1;   
            if ($this->Roles->save($entity)) {
                $this->Flash->success(__('The role has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The role could not be saved. Please, try again.'));
        }
        $permissions = $this->Roles->Permissions->find('list', ['conditions'=>array('active'=>1),                                           
        'limit' => 200]);
        $users = $this->Roles->Users->find('list', [                                 
        'limit' => 200]);
        
        $this->set(compact('entity', 'permissions', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Role id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        
        $entity = $this->Roles->get($id);
        $entity->modified_by   = $this->Auth->user("id");
        $entity->modified      = $this->now;
        $entity->active        = 0; 
        if ($this->Roles->save($entity)) {
            $this->Flash->success(__('The role has been deleted.'));
        } else {
            $this->Flash->error(__('The role could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Restore method
     *
     * @param string|null $id Role id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function restore($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        
        $entity = $this->Roles->get($id);
        $entity->modified_by   = $this->Auth->user("id");
        $entity->modified      = $this->now;
        $entity->active        = 1; 
        if ($this->Roles->save($entity)) {
            $this->Flash->success(__('The role has been restored.'));
        } else {
            $this->Flash->error(__('The role could not be restored. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
