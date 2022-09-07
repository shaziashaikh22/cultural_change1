<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Results Controller
 *
 * @property \App\Model\Table\ResultsTable $Results
 *
 * @method \App\Model\Entity\Result[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ResultsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'UserTypes', 'Phases', 'Rounds'],
        ];
        $results = $this->paginate($this->Results);

        $this->set(compact('results'));
    }

    /**
     * View method
     *
     * @param string|null $id Result id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $result = $this->Results->get($id, [
            'contain' => ['Users', 'UserTypes', 'Phases', 'Rounds'],
        ]);

        $this->set('result', $result);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $result = $this->Results->newEntity();
        if ($this->request->is('post')) {
            $result = $this->Results->patchEntity($result, $this->request->getData());
            if ($this->Results->save($result)) {
                $this->Flash->success(__('The result has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The result could not be saved. Please, try again.'));
        }
        $users = $this->Results->Users->find('list', ['limit' => 200]);
        $userTypes = $this->Results->UserTypes->find('list', ['limit' => 200]);
        $phases = $this->Results->Phases->find('list', ['limit' => 200]);
        $rounds = $this->Results->Rounds->find('list', ['limit' => 200]);
        $this->set(compact('result', 'users', 'userTypes', 'phases', 'rounds'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Result id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $result = $this->Results->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $result = $this->Results->patchEntity($result, $this->request->getData());
            if ($this->Results->save($result)) {
                $this->Flash->success(__('The result has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The result could not be saved. Please, try again.'));
        }
        $users = $this->Results->Users->find('list', ['limit' => 200]);
        $userTypes = $this->Results->UserTypes->find('list', ['limit' => 200]);
        $phases = $this->Results->Phases->find('list', ['limit' => 200]);
        $rounds = $this->Results->Rounds->find('list', ['limit' => 200]);
        $this->set(compact('result', 'users', 'userTypes', 'phases', 'rounds'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Result id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $result = $this->Results->get($id);
        if ($this->Results->delete($result)) {
            $this->Flash->success(__('The result has been deleted.'));
        } else {
            $this->Flash->error(__('The result could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
