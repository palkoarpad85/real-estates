<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Conditionofproperties Controller
 *
 * @property \App\Model\Table\ConditionofpropertiesTable $Conditionofproperties
 *
 * @method \App\Model\Entity\Conditionofproperty[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ConditionofpropertiesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $conditionofproperties = $this->paginate($this->Conditionofproperties);

        $this->set(compact('conditionofproperties'));
    }

    /**
     * View method
     *
     * @param string|null $id Conditionofproperty id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $conditionofproperty = $this->Conditionofproperties->get($id, [
            'contain' => []
        ]);

        $this->set('conditionofproperty', $conditionofproperty);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $conditionofproperty = $this->Conditionofproperties->newEntity();
        if ($this->request->is('post')) {
            $conditionofproperty = $this->Conditionofproperties->patchEntity($conditionofproperty, $this->request->getData());
            if ($this->Conditionofproperties->save($conditionofproperty)) {
                $this->Flash->success(__('The conditionofproperty has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The conditionofproperty could not be saved. Please, try again.'));
        }
        $this->set(compact('conditionofproperty'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Conditionofproperty id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $conditionofproperty = $this->Conditionofproperties->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $conditionofproperty = $this->Conditionofproperties->patchEntity($conditionofproperty, $this->request->getData());
            if ($this->Conditionofproperties->save($conditionofproperty)) {
                $this->Flash->success(__('The conditionofproperty has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The conditionofproperty could not be saved. Please, try again.'));
        }
        $this->set(compact('conditionofproperty'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Conditionofproperty id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $conditionofproperty = $this->Conditionofproperties->get($id);
        if ($this->Conditionofproperties->delete($conditionofproperty)) {
            $this->Flash->success(__('The conditionofproperty has been deleted.'));
        } else {
            $this->Flash->error(__('The conditionofproperty could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
