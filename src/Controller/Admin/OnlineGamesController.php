<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * OnlineGames Controller
 *
 * @property \App\Model\Table\OnlineGamesTable $OnlineGames
 *
 * @method \App\Model\Entity\OnlineGame[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OnlineGamesController extends AppController
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
            'contain' => ['Surveys', 'ShapeGroups'],
        ];
        $onlineGames = $this->paginate($this->OnlineGames);

        $this->set(compact('onlineGames'));
    }

    /**
     * View method
     *
     * @param string|null $id Online Game id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $onlineGame = $this->OnlineGames->get($id, [
            'contain' => ['Surveys', 'ShapeGroups', 'LoginForMatches', 'OnlineGameHistories'],
        ]);

        $this->set('onlineGame', $onlineGame);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $onlineGame = $this->OnlineGames->newEntity();
        if ($this->request->is('post')) {
            $onlineGame = $this->OnlineGames->patchEntity($onlineGame, $this->request->getData());
            if ($this->OnlineGames->save($onlineGame)) {
                $this->Flash->success(__('The online game has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The online game could not be saved. Please, try again.'));
        }
        $userTypes = $this->OnlineGames->UserTypes->find('list', ['limit' => 200]);
        $surveys = $this->OnlineGames->Surveys->find('list', ['limit' => 200]);
        $shapeGroups = $this->OnlineGames->ShapeGroups->find('list', ['limit' => 200]);
        $this->set(compact('onlineGame','surveys', 'shapeGroups'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Online Game id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $onlineGame = $this->OnlineGames->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $onlineGame = $this->OnlineGames->patchEntity($onlineGame, $this->request->getData());
            if ($this->OnlineGames->save($onlineGame)) {
                $this->Flash->success(__('The online game has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The online game could not be saved. Please, try again.'));
        }
        // $userTypes = $this->OnlineGames->UserTypes->find('list', ['limit' => 200]);
        $surveys = $this->OnlineGames->Surveys->find('list', ['limit' => 200]);
        $shapeGroups = $this->OnlineGames->ShapeGroups->find('list', ['limit' => 200]);
        $this->set(compact('onlineGame','surveys', 'shapeGroups'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Online Game id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $onlineGame = $this->OnlineGames->get($id);
        if ($this->OnlineGames->delete($onlineGame)) {
            $this->Flash->success(__('The online game has been deleted.'));
        } else {
            $this->Flash->error(__('The online game could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
