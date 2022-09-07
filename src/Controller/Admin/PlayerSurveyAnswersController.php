<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * PlayerSurveyAnswers Controller
 *
 * @property \App\Model\Table\PlayerSurveyAnswersTable $PlayerSurveyAnswers
 *
 * @method \App\Model\Entity\PlayerSurveyAnswer[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PlayerSurveyAnswersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['PlayerSurveyQuestions', 'UserTypes', 'Users', 'OnlineGames'],
        ];
        $playerSurveyAnswers = $this->paginate($this->PlayerSurveyAnswers);

        $this->set(compact('playerSurveyAnswers'));
    }

    /**
     * View method
     *
     * @param string|null $id Player Survey Answer id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $playerSurveyAnswer = $this->PlayerSurveyAnswers->get($id, [
            'contain' => ['PlayerSurveyQuestions', 'UserTypes', 'Users', 'OnlineGames'],
        ]);

        $this->set('playerSurveyAnswer', $playerSurveyAnswer);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $playerSurveyAnswer = $this->PlayerSurveyAnswers->newEntity();
        if ($this->request->is('post')) {
            $playerSurveyAnswer = $this->PlayerSurveyAnswers->patchEntity($playerSurveyAnswer, $this->request->getData());
            if ($this->PlayerSurveyAnswers->save($playerSurveyAnswer)) {
                $this->Flash->success(__('The player survey answer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The player survey answer could not be saved. Please, try again.'));
        }
        $playerSurveyQuestions = $this->PlayerSurveyAnswers->PlayerSurveyQuestions->find('list', ['limit' => 200]);
        $userTypes = $this->PlayerSurveyAnswers->UserTypes->find('list', ['limit' => 200]);
        $users = $this->PlayerSurveyAnswers->Users->find('list', ['limit' => 200]);
        $onlineGames = $this->PlayerSurveyAnswers->OnlineGames->find('list', ['limit' => 200]);
        $this->set(compact('playerSurveyAnswer', 'playerSurveyQuestions', 'userTypes', 'users', 'onlineGames'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Player Survey Answer id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $playerSurveyAnswer = $this->PlayerSurveyAnswers->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $playerSurveyAnswer = $this->PlayerSurveyAnswers->patchEntity($playerSurveyAnswer, $this->request->getData());
            if ($this->PlayerSurveyAnswers->save($playerSurveyAnswer)) {
                $this->Flash->success(__('The player survey answer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The player survey answer could not be saved. Please, try again.'));
        }
        $playerSurveyQuestions = $this->PlayerSurveyAnswers->PlayerSurveyQuestions->find('list', ['limit' => 200]);
        $userTypes = $this->PlayerSurveyAnswers->UserTypes->find('list', ['limit' => 200]);
        $users = $this->PlayerSurveyAnswers->Users->find('list', ['limit' => 200]);
        $onlineGames = $this->PlayerSurveyAnswers->OnlineGames->find('list', ['limit' => 200]);
        $this->set(compact('playerSurveyAnswer', 'playerSurveyQuestions', 'userTypes', 'users', 'onlineGames'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Player Survey Answer id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $playerSurveyAnswer = $this->PlayerSurveyAnswers->get($id);
        if ($this->PlayerSurveyAnswers->delete($playerSurveyAnswer)) {
            $this->Flash->success(__('The player survey answer has been deleted.'));
        } else {
            $this->Flash->error(__('The player survey answer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
