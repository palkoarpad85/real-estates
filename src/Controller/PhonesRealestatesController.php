<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PhonesRealestates Controller
 *
 * @property \App\Model\Table\PhonesRealestatesTable $PhonesRealestates
 *
 * @method \App\Model\Entity\PhonesRealestate[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PhonesRealestatesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Phones', 'Realestates']
        ];
        $phonesRealestates = $this->paginate($this->PhonesRealestates);

        $this->set(compact('phonesRealestates'));
    }

    /**
     * View method
     *
     * @param string|null $id Phones Realestate id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $phonesRealestate = $this->PhonesRealestates->get($id, [
            'contain' => ['Phones', 'Realestates']
        ]);

        $this->set('phonesRealestate', $phonesRealestate);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $phonesRealestate = $this->PhonesRealestates->newEntity();
        if ($this->request->is('post')) {
            $phonesRealestate = $this->PhonesRealestates->patchEntity($phonesRealestate, $this->request->getData());
            if ($this->PhonesRealestates->save($phonesRealestate)) {
                $this->Flash->success(__('The phones realestate has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The phones realestate could not be saved. Please, try again.'));
        }
        $phones = $this->PhonesRealestates->Phones->find('list', ['limit' => 200]);
        $realestates = $this->PhonesRealestates->Realestates->find('list', ['limit' => 200]);
        $this->set(compact('phonesRealestate', 'phones', 'realestates'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Phones Realestate id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $phonesRealestate = $this->PhonesRealestates->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $phonesRealestate = $this->PhonesRealestates->patchEntity($phonesRealestate, $this->request->getData());
            if ($this->PhonesRealestates->save($phonesRealestate)) {
                $this->Flash->success(__('The phones realestate has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The phones realestate could not be saved. Please, try again.'));
        }
        $phones = $this->PhonesRealestates->Phones->find('list', ['limit' => 200]);
        $realestates = $this->PhonesRealestates->Realestates->find('list', ['limit' => 200]);
        $this->set(compact('phonesRealestate', 'phones', 'realestates'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Phones Realestate id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $phonesRealestate = $this->PhonesRealestates->get($id);
        if ($this->PhonesRealestates->delete($phonesRealestate)) {
            $this->Flash->success(__('The phones realestate has been deleted.'));
        } else {
            $this->Flash->error(__('The phones realestate could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
