<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Heatingtypes Controller
 *
 * @property \App\Model\Table\HeatingtypesTable $Heatingtypes
 *
 * @method \App\Model\Entity\Heatingtype[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class HeatingtypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $heatingtypes = $this->paginate($this->Heatingtypes);

        $this->set(compact('heatingtypes'));
    }

    /**
     * View method
     *
     * @param string|null $id Heatingtype id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $heatingtype = $this->Heatingtypes->get($id, [
            'contain' => []
        ]);

        $this->set('heatingtype', $heatingtype);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $heatingtype = $this->Heatingtypes->newEntity();
        if ($this->request->is('post')) {
            $heatingtype = $this->Heatingtypes->patchEntity($heatingtype, $this->request->getData());
            if ($this->Heatingtypes->save($heatingtype)) {
                $this->Flash->success(__('The heatingtype has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The heatingtype could not be saved. Please, try again.'));
        }
        $this->set(compact('heatingtype'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Heatingtype id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $heatingtype = $this->Heatingtypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $heatingtype = $this->Heatingtypes->patchEntity($heatingtype, $this->request->getData());
            if ($this->Heatingtypes->save($heatingtype)) {
                $this->Flash->success(__('The heatingtype has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The heatingtype could not be saved. Please, try again.'));
        }
        $this->set(compact('heatingtype'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Heatingtype id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $heatingtype = $this->Heatingtypes->get($id);
        if ($this->Heatingtypes->delete($heatingtype)) {
            $this->Flash->success(__('The heatingtype has been deleted.'));
        } else {
            $this->Flash->error(__('The heatingtype could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
