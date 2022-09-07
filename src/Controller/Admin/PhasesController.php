<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Phases Controller
 *
 * @property \App\Model\Table\PhasesTable $Phases
 *
 * @method \App\Model\Entity\Phase[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PhasesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $phases = $this->paginate($this->Phases);

        $this->set(compact('phases'));
    }

    /**
     * View method
     *
     * @param string|null $id Phase id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $phase = $this->Phases->get($id, [
            'contain' => ['JobDescriptions'],
        ]);

        $this->set('phase', $phase);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $phase = $this->Phases->newEntity();
        if ($this->request->is('post')) {
            $phase = $this->Phases->patchEntity($phase, $this->request->getData());
            if ($this->Phases->save($phase)) {
                $this->Flash->success(__('The phase has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The phase could not be saved. Please, try again.'));
        }
        $this->set(compact('phase'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Phase id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $phase = $this->Phases->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $phase = $this->Phases->patchEntity($phase, $this->request->getData());
            if ($this->Phases->save($phase)) {
                $this->Flash->success(__('The phase has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The phase could not be saved. Please, try again.'));
        }
        $this->set(compact('phase'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Phase id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $phase = $this->Phases->get($id);
        if ($this->Phases->delete($phase)) {
            $this->Flash->success(__('The phase has been deleted.'));
        } else {
            $this->Flash->error(__('The phase could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
