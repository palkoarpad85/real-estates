<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Parkings Controller
 *
 * @property \App\Model\Table\ParkingsTable $Parkings
 *
 * @method \App\Model\Entity\Parking[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ParkingsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $parkings = $this->paginate($this->Parkings);

        $this->set(compact('parkings'));
    }

    /**
     * View method
     *
     * @param string|null $id Parking id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $parking = $this->Parkings->get($id, [
            'contain' => ['Realestates']
        ]);

        $this->set('parking', $parking);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $parking = $this->Parkings->newEntity();
        if ($this->request->is('post')) {
            $parking = $this->Parkings->patchEntity($parking, $this->request->getData());
            if ($this->Parkings->save($parking)) {
                $this->Flash->success(__('The parking has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The parking could not be saved. Please, try again.'));
        }
        $this->set(compact('parking'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Parking id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $parking = $this->Parkings->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $parking = $this->Parkings->patchEntity($parking, $this->request->getData());
            if ($this->Parkings->save($parking)) {
                $this->Flash->success(__('The parking has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The parking could not be saved. Please, try again.'));
        }
        $this->set(compact('parking'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Parking id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $parking = $this->Parkings->get($id);
        if ($this->Parkings->delete($parking)) {
            $this->Flash->success(__('The parking has been deleted.'));
        } else {
            $this->Flash->error(__('The parking could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
