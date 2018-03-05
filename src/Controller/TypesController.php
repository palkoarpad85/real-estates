<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\I18n\Time;
use Cake\I18n\I18n;
/**
 * Types Controller
 *
 * @property \App\Model\Table\TypesTable $Types
 *
 * @method \App\Model\Entity\Category[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TypesController extends AppController
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
                $tableValues = $this->paginate($this->Types->find()
                ->select(['id', 'active', 'name','Users.username','created'])                     
                ->Orwhere(['Types.active' => $active2])                 
                ->where(['name LIKE ' => '%'.$name.'%'])
                ->where(['Users.username LIKE ' => '%'.$username.'%'])
                ->contain(['Users']),['limit' => 20]); 
              } 
                else{
                $tableValues = $this->paginate($this->Types->find()
                ->select(['id', 'active', 'name','Users.username','created'])
                ->where(['name LIKE ' => '%'.$name.'%'])
                ->where(['Users.username LIKE ' => '%'.$username.'%'])
                ->contain(['Users']),['limit' => 20]); 

                }      
        }
        else{
            $tableValues = $this->paginate($this->Types,[
                'contain' => ['Users'],
                'limit' => 20]);             
        }
     }
     else{
        $tableValues = $this->paginate($this->Types,[
            'contain' => [ 'Users'],
            'limit' => 20]);
        $name     = null;
        $username = null;
        $active   = null;

     }
        $this->set(compact('name'));
        $this->set(compact('username'));
        $this->set(compact('active'));
        $this->set(compact('tableValues'));
    }

    /**
     * View method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $entity = $this->Types->find()
        ->enableAutoFields(true)        
        ->select([
            'id' => 'Types.id',             
            'contoller' => "Types.name",
            'modified' => "Types.modified",
            'created' => "Types.created",
            'Ucreated_by' => "Users.username",
            'Umodified_by' => "Users2.username"
            
        ])
         ->join([
            'Users' => [
                'table' => 'users',
                'type' => 'INNER',
                'conditions' => [
                    'Types.created_by = Users.id',
                ],
            ],            
        ])
        ->join([
            'Users2' => [
                'table' => 'users',
                'type' => 'INNER',
                'conditions' => [
                    'Types.modified_by = Users2.id',
                ],
            ],            
        ])       
        ->find('translations')
        ->where([
            'Types.id' => $id
        ])        
        ->toArray();    
            
        $this->set('entity', $entity[0]);
       
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->Types->locale(I18n::defaultLocale());

        $entity = $this->Types->newEntity();
        
        if ($this->request->is('post')) {
            $userId = $this->Auth->user("id");
 
            $entity = $this->Types->patchEntity($entity, $this->request->getData());
            $data = $this->request->getData();
            $data["userId"] = $userId;          
            
            $entity->setTranslations($data);
            
            $entity->created_by  = $this->Auth->user("id");
            $entity->created     = $this->now;
            $entity->modified_by = $this->Auth->user("id");
            $entity->modified    = $this->now;
            $entity->active      = 1;            
            
            if ($this->Types->save($entity)) {
                $this->Flash->success(__('The '.$this->name.' has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The '.$this->name.' could not be saved. Please, try again.'));
        }
        $this->set(compact('entity'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {    
        $this->Types->locale(I18n::defaultLocale());

        $entity = $this->Types
                        ->find('translations')
                        ->where([
                            'Types.id' => $id
                        ])
                        ->first();
                    
        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->Types->locale("hu_HU");
            $entity = $this->Types->patchEntity($entity, $this->request->getData());
            $entity->setTranslations($this->request->getData());
          
            $entity->modified_by = $this->Auth->user("id");
            $entity->modified    = $this->now;
            $entity->active      = 1;

            if ($this->Types->save($entity)) {
                $this->Flash->success(__('The '.$this->name.' has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The '.$this->name.' could not be saved. Please, try again.'));
        }
        $this->set(compact('entity'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        $entity              = $this->Types->get($id);
        $entity->modified_by = $this->Auth->user("id");
        $entity->modified    = $this->now;
        $entity->active      = 0;

        if ($this->Types->save($entity)) {
            $this->Flash->success(__('The '.$this->name.' has been deleted.'));
        } else {
            $this->Flash->error(__('The '.$this->name.' could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function restore($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        $entity              = $this->Types->get($id);
        $entity->modified_by = $this->Auth->user("id");
        $entity->modified    = $this->now;
        $entity->active      = 1;

        if ($this->Types->save($entity)) {
            $this->Flash->success(__('The '.$this->name.' has been restore.'));
        } else {
            $this->Flash->error(__('The '.$this->name.' could not be restore. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    
}
