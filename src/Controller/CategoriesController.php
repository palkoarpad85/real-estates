<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\I18n\Time;
use Cake\I18n\I18n;
/**
 * Categories Controller
 *
 * @property \App\Model\Table\CategoriesTable $Categories
 *
 * @method \App\Model\Entity\Category[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CategoriesController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->now = new Time();
        $this->Auth->allow(['search','add','edit','view','delete']);  
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
                if ($active == "true") {
                    $active = 1;
                    
                }
                else{
                    $active = 1;
                }
                $tableValues = $this->paginate($this->Categories->find()
                ->select(['id', 'active', 'name','Users.username','created'])                     
                ->Orwhere(['Categories.active' => $active])                 
                ->where(['name LIKE ' => '%'.$name.'%'])
                ->where(['Users.username LIKE ' => '%'.$username.'%'])
                ->contain(['Users']),['limit' => 20]); 
      
        }

        else{
            $tableValues = $this->paginate($this->Categories,[
                'contain' => ['Realestates', 'Users'],
                'limit' => 20]);
             
        }
     }
     else{
        $tableValues = $this->paginate($this->Categories,[
            'contain' => ['Realestates', 'Users'],
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
        $category = $this->Categories->get($id, [
            'contain' => ['Realestates', 'Users']
        ]);
            
        $this->set('category', $category);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->Categories->locale(I18n::defaultLocale());

        $entity = $this->Categories->newEntity();
        
        if ($this->request->is('post')) {
            $entity = $this->Categories->patchEntity($entity, $this->request->getData());
            $entity->setTranslations($this->request->getData());
            $entity->created_by  = $this->Auth->user("id");
            $entity->created     = $this->now;
            $entity->modified_by = $this->Auth->user("id");
            $entity->modified    = $this->now;
            $entity->active      = 1;
            
            
            if ($this->Categories->save($entity)) {
                $this->Flash->success(__('The category has been saved.'));

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
        $this->Categories->locale(I18n::defaultLocale());

        $entity = $this->Categories
                        ->find('translations')
                        ->where([
                            'Categories.id' => $id
                        ])
                        ->first();
                    
        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->Categories->locale("hu_HU");
            $entity = $this->Categories->patchEntity($entity, $this->request->getData());
            $entity->setTranslations($this->request->getData());
          
            $entity->modified_by = $this->Auth->user("id");
            $entity->modified    = $this->now;
            $entity->active      = 1;

            if ($this->Categories->save($entity)) {
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

        $entity              = $this->Categories->get($id);
        $entity->modified_by = $this->Auth->user("id");
        $entity->modified    = $this->now;
        $entity->active      = 0;

        if ($this->Categories->save($entity)) {
            $this->Flash->success(__('The '.$this->name.' has been deleted.'));
        } else {
            $this->Flash->error(__('The '.$this->name.' could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    
}
