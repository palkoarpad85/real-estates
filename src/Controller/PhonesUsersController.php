<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PhonesUsers Controller
 *
 * @property \App\Model\Table\PhonesUsersTable $PhonesUsers
 *
 * @method \App\Model\Entity\PhonesUser[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PhonesUsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Phones']
        ];
        $phonesUsers = $this->paginate($this->PhonesUsers);

        $this->set(compact('phonesUsers'));
    }

    /**
     * View method
     *
     * @param string|null $id Phones User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $phonesUser = $this->PhonesUsers->get($id, [
            'contain' => ['Users', 'Phones']
        ]);

        $this->set('phonesUser', $phonesUser);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $phonesUser = $this->PhonesUsers->newEntity();
        if ($this->request->is('post')) {
            $phonesUser = $this->PhonesUsers->patchEntity($phonesUser, $this->request->getData());
            if ($this->PhonesUsers->save($phonesUser)) {
                $this->Flash->success(__('The phones user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The phones user could not be saved. Please, try again.'));
        }
        $users = $this->PhonesUsers->Users->find('list', ['limit' => 200]);
        $phones = $this->PhonesUsers->Phones->find('list', ['limit' => 200]);
        $this->set(compact('phonesUser', 'users', 'phones'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Phones User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $phonesUser = $this->PhonesUsers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $phonesUser = $this->PhonesUsers->patchEntity($phonesUser, $this->request->getData());
            if ($this->PhonesUsers->save($phonesUser)) {
                $this->Flash->success(__('The phones user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The phones user could not be saved. Please, try again.'));
        }
        $users = $this->PhonesUsers->Users->find('list', ['limit' => 200]);
        $phones = $this->PhonesUsers->Phones->find('list', ['limit' => 200]);
        $this->set(compact('phonesUser', 'users', 'phones'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Phones User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $phonesUser = $this->PhonesUsers->get($id);
        if ($this->PhonesUsers->delete($phonesUser)) {
            $this->Flash->success(__('The phones user has been deleted.'));
        } else {
            $this->Flash->error(__('The phones user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
