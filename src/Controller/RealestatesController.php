<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Realestates Controller
 *
 * @property \App\Model\Table\RealestatesTable $Realestates
 *
 * @method \App\Model\Entity\Realestate[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RealestatesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Types', 'Categories', 'ConvenienceGrades', 'HeatingTypes', 'ConditionOfProperties', 'Parkings']
        ];
        $realestates = $this->paginate($this->Realestates);

        $this->set(compact('realestates'));
    }

    /**
     * View method
     *
     * @param string|null $id Realestate id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $realestate = $this->Realestates->get($id, [
            'contain' => ['Users', 'Types', 'Categories', 'ConvenienceGrades', 'HeatingTypes', 'ConditionOfProperties', 'Parkings', 'Phones', 'Images']
        ]);

        $this->set('realestate', $realestate);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $realestate = $this->Realestates->newEntity();
        if ($this->request->is('post')) {
            $realestate = $this->Realestates->patchEntity($realestate, $this->request->getData());
            if ($this->Realestates->save($realestate)) {
                $this->Flash->success(__('The realestate has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The realestate could not be saved. Please, try again.'));
        }
        $users = $this->Realestates->Users->find('list', ['limit' => 200]);
        $types = $this->Realestates->Types->find('list', ['limit' => 200]);
        $categories = $this->Realestates->Categories->find('list', ['limit' => 200]);
        $convenienceGrades = $this->Realestates->ConvenienceGrades->find('list', ['limit' => 200]);
        $heatingTypes = $this->Realestates->HeatingTypes->find('list', ['limit' => 200]);
        $conditionOfProperties = $this->Realestates->ConditionOfProperties->find('list', ['limit' => 200]);
        $parkings = $this->Realestates->Parkings->find('list', ['limit' => 200]);
        $phones = $this->Realestates->Phones->find('list', ['limit' => 200]);
        $this->set(compact('realestate', 'users', 'types', 'categories', 'convenienceGrades', 'heatingTypes', 'conditionOfProperties', 'parkings', 'phones'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Realestate id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $realestate = $this->Realestates->get($id, [
            'contain' => ['Phones']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $realestate = $this->Realestates->patchEntity($realestate, $this->request->getData());
            if ($this->Realestates->save($realestate)) {
                $this->Flash->success(__('The realestate has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The realestate could not be saved. Please, try again.'));
        }
        $users = $this->Realestates->Users->find('list', ['limit' => 200]);
        $types = $this->Realestates->Types->find('list', ['limit' => 200]);
        $categories = $this->Realestates->Categories->find('list', ['limit' => 200]);
        $convenienceGrades = $this->Realestates->ConvenienceGrades->find('list', ['limit' => 200]);
        $heatingTypes = $this->Realestates->HeatingTypes->find('list', ['limit' => 200]);
        $conditionOfProperties = $this->Realestates->ConditionOfProperties->find('list', ['limit' => 200]);
        $parkings = $this->Realestates->Parkings->find('list', ['limit' => 200]);
        $phones = $this->Realestates->Phones->find('list', ['limit' => 200]);
        $this->set(compact('realestate', 'users', 'types', 'categories', 'convenienceGrades', 'heatingTypes', 'conditionOfProperties', 'parkings', 'phones'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Realestate id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $realestate = $this->Realestates->get($id);
        if ($this->Realestates->delete($realestate)) {
            $this->Flash->success(__('The realestate has been deleted.'));
        } else {
            $this->Flash->error(__('The realestate could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
