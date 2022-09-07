<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * SurveyResults Controller
 *
 * @property \App\Model\Table\SurveyResultsTable $SurveyResults
 *
 * @method \App\Model\Entity\SurveyResult[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SurveyResultsController extends AppController
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
            'contain' => ['Users', 'UserTypes', 'NewSurveys'],
        ];
        $surveyResults = $this->paginate($this->SurveyResults);

        $this->set(compact('surveyResults'));
    }

    /**
     * View method
     *
     * @param string|null $id Survey Result id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $surveyResult = $this->SurveyResults->get($id, [
            'contain' => ['Users', 'UserTypes', 'NewSurveys'],
        ]);

        $this->set('surveyResult', $surveyResult);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $surveyResult = $this->SurveyResults->newEntity();
        if ($this->request->is('post')) {
            $surveyResult = $this->SurveyResults->patchEntity($surveyResult, $this->request->getData());
            if ($this->SurveyResults->save($surveyResult)) {
                $this->Flash->success(__('The survey result has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The survey result could not be saved. Please, try again.'));
        }
        $users = $this->SurveyResults->Users->find('list', ['limit' => 200]);
        $userTypes = $this->SurveyResults->UserTypes->find('list', ['limit' => 200]);
        $newSurveys = $this->SurveyResults->NewSurveys->find('list', ['limit' => 200]);
        $this->set(compact('surveyResult', 'users', 'userTypes', 'newSurveys'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Survey Result id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $surveyResult = $this->SurveyResults->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $surveyResult = $this->SurveyResults->patchEntity($surveyResult, $this->request->getData());
            if ($this->SurveyResults->save($surveyResult)) {
                $this->Flash->success(__('The survey result has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The survey result could not be saved. Please, try again.'));
        }
        $users = $this->SurveyResults->Users->find('list', ['limit' => 200]);
        $userTypes = $this->SurveyResults->UserTypes->find('list', ['limit' => 200]);
        $newSurveys = $this->SurveyResults->NewSurveys->find('list', ['limit' => 200]);
        $this->set(compact('surveyResult', 'users', 'userTypes', 'newSurveys'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Survey Result id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $surveyResult = $this->SurveyResults->get($id);
        if ($this->SurveyResults->delete($surveyResult)) {
            $this->Flash->success(__('The survey result has been deleted.'));
        } else {
            $this->Flash->error(__('The survey result could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
