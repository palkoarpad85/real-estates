<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;
use Cake\I18n\Time;
use Cake\I18n\I18n;
/**
 * Phones Controller
 *
 * @property \App\Model\Table\PhonesTable $Phones
 *
 * @method \App\Model\Entity\Phone[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PhonesController extends AppController
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
        $userId["id"] = $this->Auth->user("id");     
       
        $tableValues = $this->Phones->find("UserPhones",$userId);       
               
      
        $tableValues = $this->paginate($tableValues);
        $this->set(compact('tableValues'));
    }

    /**
     * View method
     *
     * @param string|null $id Phone id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $entity = $this->Phones->get($id, [
            'contain' => ['Realestates','Users']
        ]);

         
        $this->set('entity', $entity);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $entity = $this->Phones->newEntity();
      
        if ($this->request->is('post')) {
            
        
            $entity = $this->Phones->patchEntity($entity, $this->request->getData());
            $entity->active      = 1;
            $entity->created_by  = $this->Auth->user("id");
            $entity->created     = $this->now;
            $entity->modified_by = $this->Auth->user("id");
            $entity->modified    = $this->now;

           
            if ($this->Phones->save($entity)) {                               
                $phonesUsers =  TableRegistry::get('PhonesUsers');
                $phonesUser  = $phonesUsers->newEntity();
                $phonesUser->phone_id = $entity->id;
                $phonesUser->user_id  = $this->Auth->user("id");
               
                if ($phonesUsers->save($phonesUser)) {
                    $this->Flash->success(__('The phone has been saved.'));
                    return $this->redirect(['action' => 'index']);
                }
                             
            }
            $this->Flash->error(__('The phone could not be saved. Please, try again.'));
        }
        
        $this->set(compact('entity'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Phone id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $entity = $this->Phones->get($id, [
            'contain' => ['Realestates']
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
           
            $entity = $this->Phones->patchEntity($entity, $this->request->getData());
            if ($this->Phones->save($entity)) {
                $this->Flash->success(__('The phone has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The phone could not be saved. Please, try again.'));
        }
        $realestates = $this->Phones->Realestates->find('list', ['limit' => 200]);
        
        $this->set(compact('entity', 'realestates'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Phone id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $phone = $this->Phones->get($id);
        $phone->active = 0;

        if ($this->Phones->save($phone)) {
            $this->Flash->success(__('The phone has been deleted.'));
        } else {
            $this->Flash->error(__('The phone could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
