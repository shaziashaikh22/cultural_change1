<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * JobDescriptions Controller
 *
 * @property \App\Model\Table\JobDescriptionsTable $JobDescriptions
 *
 * @method \App\Model\Entity\JobDescription[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class JobDescriptionsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Rounds', 'UserTypes', 'Phases'],
        ];
        $jobDescriptions = $this->paginate($this->JobDescriptions);

        $this->set(compact('jobDescriptions'));
    }

    /**
     * View method
     *
     * @param string|null $id Job Description id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $jobDescription = $this->JobDescriptions->get($id, [
            'contain' => ['Rounds', 'UserTypes', 'Phases'],
        ]);

        $this->set('jobDescription', $jobDescription);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $jobDescription = $this->JobDescriptions->newEntity();
        if ($this->request->is('post')) {
            $jobDescription = $this->JobDescriptions->patchEntity($jobDescription, $this->request->getData());
            if ($this->JobDescriptions->save($jobDescription)) {
                $this->Flash->success(__('The job description has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The job description could not be saved. Please, try again.'));
        }
        $rounds = $this->JobDescriptions->Rounds->find('list', ['limit' => 200]);
        $userTypes = $this->JobDescriptions->UserTypes->find('list', ['limit' => 200]);
        $phases = $this->JobDescriptions->Phases->find('list', ['limit' => 200]);
        $this->set(compact('jobDescription', 'rounds', 'userTypes', 'phases'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Job Description id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $jobDescription = $this->JobDescriptions->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $jobDescription = $this->JobDescriptions->patchEntity($jobDescription, $this->request->getData());
            if ($this->JobDescriptions->save($jobDescription)) {
                $this->Flash->success(__('The job description has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The job description could not be saved. Please, try again.'));
        }
        $rounds = $this->JobDescriptions->Rounds->find('list', ['limit' => 200]);
        $userTypes = $this->JobDescriptions->UserTypes->find('list', ['limit' => 200]);
        $phases = $this->JobDescriptions->Phases->find('list', ['limit' => 200]);
        $this->set(compact('jobDescription', 'rounds', 'userTypes', 'phases'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Job Description id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $jobDescription = $this->JobDescriptions->get($id);
        if ($this->JobDescriptions->delete($jobDescription)) {
            $this->Flash->success(__('The job description has been deleted.'));
        } else {
            $this->Flash->error(__('The job description could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
