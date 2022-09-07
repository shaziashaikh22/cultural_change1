<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */

    public function login()
    {
        $this->viewBuilder()->layout('loginlayout');

        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user['role_id'] == 1) {
                $this->Auth->setUser($user);
                return $this->redirect(['controller' => 'users', 'action' => 'dashboard']);
            } else
                $this->Flash->error('Incorrect login');
        }
    }

    public function dashboard()
    {
        $this->viewBuilder()->layout('adminlayout');
    }

    public function creategames()
    {
        $this->viewBuilder()->layout('adminlayout');
        if ($this->request->is('post')) {
            $online_gamesTable = TableRegistry::get('online_games');
            $online_gamesTableData = $online_gamesTable->newEntity();
    
            $online_gamesTableData['game_name'] = $_POST['game_name'];
            $online_gamesTableData['start_time'] = '04:00';// $_POST['start_time'];
            $online_gamesTableData['game_players_allowed'] = '4';//$_POST['game_players_allowed'];
            $online_gamesTableData['status'] = 'Active';//$_POST['status'];
            $online_gamesTableData['players_turn'] = '3';//$_POST['players_turn'];
            if ($notification = $online_gamesTable->save($online_gamesTableData)) {
                $this->Flash->success(__('The game code has been saved.'));
                return $this->redirect(['controller' => 'OnlineGames','action'=>'index']);
    
            }
        }
    }

    public function generatecode()
    {
        $this->viewBuilder()->layout('adminlayout');

    //     if ($this->request->is('post')) {
    //     $online_gamesTable = TableRegistry::get('online_games');
    //     $online_gamesTableData = $online_gamesTable->newEntity();

    //     $online_gamesTableData['game_name'] = $_POST['game_name'];
    //     $online_gamesTableData['start_time'] = '02:00';
    //     $online_gamesTableData['game_players_allowed'] = "4";
    //     $online_gamesTableData['status'] = "Active";
    //     if ($notification = $online_gamesTable->save($online_gamesTableData)) {
    //         $this->Flash->success(__('The game code has been saved.'));
    //         return $this->redirect(['action' => 'dashboard']);

    //     }
    // }
    }

    public function dashboard2()
    {
        $this->viewBuilder()->layout('newadmin');
    }

    public function report()
    {
        $this->viewBuilder()->layout('adminlayout');
    }

    public function settings()
    {
        $this->viewBuilder()->layout('adminlayout');
    }
    public function adminprofile()
    {
        $this->viewBuilder()->layout('adminlayout');
        $user = $this->Auth->user();
        $this->set(compact('user'));
    }
    public function security()
    {
        $this->viewBuilder()->layout('adminlayout');
        $user = $this->Auth->user();
        $this->set(compact('user'));
    }

    public function editEmail(){
        $id = $this->Auth->user(['id']);
        $query = $this->Users->query();
        $result = $query->update()
                ->set(['email' => $_POST['edit_email']])
                ->where(['id' => $id])
                ->execute();
                return $this->redirect(['controller' => 'users', 'action' => 'index']);

    }

    public function editpassword(){
        $id = $this->Auth->user(['id']);
        $user = $this->Users->get($id, [
          'contain' => [],
      ]);

                if ($this->request->is(['patch', 'post', 'put'])) {
                  // $user->password = $this->request->data['new_password'];
                  $user = $this->Users->patchEntity($user, $this->request->getData());
                  $user->password = $_POST['new_password'];

                  if ($this->Users->save($user)) {
                    return $this->redirect(['controller' => 'users', 'action' => 'logout']);
                  } else {
                    return $this->redirect(['controller' => 'users', 'action' => 'security']);
                  }
                }


  }
   public function imageupload(){

   }
    public function beforeFilter(Event $event)
    {
        $this->Auth->allow(['report']);
        $this->Auth->allow(['settings']);
        $this->Auth->allow(['adminprofile']);
        $this->Auth->allow(['security']);
        $this->Auth->allow(['editpassword']);
        $this->Auth->allow(['imageupload']);
    }

    public function logout()
    {

        $this->Flash->error('you are logged out');
        return $this->redirect($this->Auth->logout());
    }
    public function index()
    {
        $this->viewBuilder()->layout('adminlayout');

        $this->paginate = [
            'contain' => ['UserTypes', 'Roles'],
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['UserTypes', 'Roles', 'OnlineGameHistories'],
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->layout('adminlayout');

        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->password = $_POST['gamecode_name'];
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $userTypes = $this->Users->UserTypes->find('list', ['limit' => 200]);
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'userTypes', 'roles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->layout('adminlayout');

        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $userTypes = $this->Users->UserTypes->find('list', ['limit' => 200]);
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'userTypes', 'roles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
