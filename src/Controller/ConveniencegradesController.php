<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Conveniencegrades Controller
 *
 * @property \App\Model\Table\ConveniencegradesTable $Conveniencegrades
 *
 * @method \App\Model\Entity\Conveniencegrade[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ConveniencegradesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $conveniencegrades = $this->paginate($this->Conveniencegrades);

        $this->set(compact('conveniencegrades'));
    }

    /**
     * View method
     *
     * @param string|null $id Conveniencegrade id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $conveniencegrade = $this->Conveniencegrades->get($id, [
            'contain' => []
        ]);

        $this->set('conveniencegrade', $conveniencegrade);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $conveniencegrade = $this->Conveniencegrades->newEntity();
        if ($this->request->is('post')) {
            $conveniencegrade = $this->Conveniencegrades->patchEntity($conveniencegrade, $this->request->getData());
            if ($this->Conveniencegrades->save($conveniencegrade)) {
                $this->Flash->success(__('The conveniencegrade has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The conveniencegrade could not be saved. Please, try again.'));
        }
        $this->set(compact('conveniencegrade'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Conveniencegrade id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $conveniencegrade = $this->Conveniencegrades->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $conveniencegrade = $this->Conveniencegrades->patchEntity($conveniencegrade, $this->request->getData());
            if ($this->Conveniencegrades->save($conveniencegrade)) {
                $this->Flash->success(__('The conveniencegrade has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The conveniencegrade could not be saved. Please, try again.'));
        }
        $this->set(compact('conveniencegrade'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Conveniencegrade id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $conveniencegrade = $this->Conveniencegrades->get($id);
        if ($this->Conveniencegrades->delete($conveniencegrade)) {
            $this->Flash->success(__('The conveniencegrade has been deleted.'));
        } else {
            $this->Flash->error(__('The conveniencegrade could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
