<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * LoginForMatches Controller
 *
 * @property \App\Model\Table\LoginForMatchesTable $LoginForMatches
 *
 * @method \App\Model\Entity\LoginForMatch[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LoginForMatchesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'OnlineGames'],
        ];
        $loginForMatches = $this->paginate($this->LoginForMatches);

        $this->set(compact('loginForMatches'));
    }

    /**
     * View method
     *
     * @param string|null $id Login For Match id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $loginForMatch = $this->LoginForMatches->get($id, [
            'contain' => ['Users', 'OnlineGames'],
        ]);

        $this->set('loginForMatch', $loginForMatch);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $loginForMatch = $this->LoginForMatches->newEntity();
        if ($this->request->is('post')) {
            $loginForMatch = $this->LoginForMatches->patchEntity($loginForMatch, $this->request->getData());
            if ($this->LoginForMatches->save($loginForMatch)) {
                $this->Flash->success(__('The login for match has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The login for match could not be saved. Please, try again.'));
        }
        $users = $this->LoginForMatches->Users->find('list', ['limit' => 200]);
        $onlineGames = $this->LoginForMatches->OnlineGames->find('list', ['limit' => 200]);
        $this->set(compact('loginForMatch', 'users', 'onlineGames'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Login For Match id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $loginForMatch = $this->LoginForMatches->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $loginForMatch = $this->LoginForMatches->patchEntity($loginForMatch, $this->request->getData());
            if ($this->LoginForMatches->save($loginForMatch)) {
                $this->Flash->success(__('The login for match has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The login for match could not be saved. Please, try again.'));
        }
        $users = $this->LoginForMatches->Users->find('list', ['limit' => 200]);
        $onlineGames = $this->LoginForMatches->OnlineGames->find('list', ['limit' => 200]);
        $this->set(compact('loginForMatch', 'users', 'onlineGames'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Login For Match id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $loginForMatch = $this->LoginForMatches->get($id);
        if ($this->LoginForMatches->delete($loginForMatch)) {
            $this->Flash->success(__('The login for match has been deleted.'));
        } else {
            $this->Flash->error(__('The login for match could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
