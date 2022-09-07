<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * OnlineGameHistories Controller
 *
 * @property \App\Model\Table\OnlineGameHistoriesTable $OnlineGameHistories
 *
 * @method \App\Model\Entity\OnlineGameHistory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OnlineGameHistoriesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->viewBuilder()->layout('adminlayout'); 

        $this->paginate = [
            'contain' => ['OnlineGames', 'Users'],
        ];
        $onlineGameHistories = $this->paginate($this->OnlineGameHistories);

        $this->set(compact('onlineGameHistories'));
    }

    /**
     * View method
     *
     * @param string|null $id Online Game History id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        
        $onlineGameHistory = $this->OnlineGameHistories->get($id, [
            'contain' => ['OnlineGames', 'Users'],
        ]);

        $this->set('onlineGameHistory', $onlineGameHistory);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $onlineGameHistory = $this->OnlineGameHistories->newEntity();
        if ($this->request->is('post')) {
            $onlineGameHistory = $this->OnlineGameHistories->patchEntity($onlineGameHistory, $this->request->getData());
            if ($this->OnlineGameHistories->save($onlineGameHistory)) {
                $this->Flash->success(__('The online game history has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The online game history could not be saved. Please, try again.'));
        }
        $onlineGames = $this->OnlineGameHistories->OnlineGames->find('list', ['limit' => 200]);
        $users = $this->OnlineGameHistories->Users->find('list', ['limit' => 200]);
        $this->set(compact('onlineGameHistory', 'onlineGames', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Online Game History id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->layout('adminlayout'); 

        $onlineGameHistory = $this->OnlineGameHistories->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $onlineGameHistory = $this->OnlineGameHistories->patchEntity($onlineGameHistory, $this->request->getData());
            if ($this->OnlineGameHistories->save($onlineGameHistory)) {
                $this->Flash->success(__('The online game history has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The online game history could not be saved. Please, try again.'));
        }
        $onlineGames = $this->OnlineGameHistories->OnlineGames->find('list', ['limit' => 200]);
        $users = $this->OnlineGameHistories->Users->find('list', ['limit' => 200]);
        $this->set(compact('onlineGameHistory', 'onlineGames', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Online Game History id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $onlineGameHistory = $this->OnlineGameHistories->get($id);
        if ($this->OnlineGameHistories->delete($onlineGameHistory)) {
            $this->Flash->success(__('The online game history has been deleted.'));
        } else {
            $this->Flash->error(__('The online game history could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
