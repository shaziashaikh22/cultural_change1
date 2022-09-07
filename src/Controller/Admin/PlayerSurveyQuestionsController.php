<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * PlayerSurveyQuestions Controller
 *
 * @property \App\Model\Table\PlayerSurveyQuestionsTable $PlayerSurveyQuestions
 *
 * @method \App\Model\Entity\PlayerSurveyQuestion[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PlayerSurveyQuestionsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $playerSurveyQuestions = $this->paginate($this->PlayerSurveyQuestions);

        $this->set(compact('playerSurveyQuestions'));
    }

    /**
     * View method
     *
     * @param string|null $id Player Survey Question id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $playerSurveyQuestion = $this->PlayerSurveyQuestions->get($id, [
            'contain' => ['PlayerSurveyAnswers'],
        ]);

        $this->set('playerSurveyQuestion', $playerSurveyQuestion);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $playerSurveyQuestion = $this->PlayerSurveyQuestions->newEntity();
        if ($this->request->is('post')) {
            $playerSurveyQuestion = $this->PlayerSurveyQuestions->patchEntity($playerSurveyQuestion, $this->request->getData());
            if ($this->PlayerSurveyQuestions->save($playerSurveyQuestion)) {
                $this->Flash->success(__('The player survey question has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The player survey question could not be saved. Please, try again.'));
        }
        $this->set(compact('playerSurveyQuestion'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Player Survey Question id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $playerSurveyQuestion = $this->PlayerSurveyQuestions->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $playerSurveyQuestion = $this->PlayerSurveyQuestions->patchEntity($playerSurveyQuestion, $this->request->getData());
            if ($this->PlayerSurveyQuestions->save($playerSurveyQuestion)) {
                $this->Flash->success(__('The player survey question has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The player survey question could not be saved. Please, try again.'));
        }
        $this->set(compact('playerSurveyQuestion'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Player Survey Question id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $playerSurveyQuestion = $this->PlayerSurveyQuestions->get($id);
        if ($this->PlayerSurveyQuestions->delete($playerSurveyQuestion)) {
            $this->Flash->success(__('The player survey question has been deleted.'));
        } else {
            $this->Flash->error(__('The player survey question could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
