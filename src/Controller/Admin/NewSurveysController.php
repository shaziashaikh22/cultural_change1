<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * NewSurveys Controller
 *
 * @property \App\Model\Table\NewSurveysTable $NewSurveys
 *
 * @method \App\Model\Entity\NewSurvey[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class NewSurveysController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->viewBuilder()->layout('adminlayout');

        $newSurveys = $this->paginate($this->NewSurveys);

        $this->set(compact('newSurveys'));
    }

    /**
     * View method
     *
     * @param string|null $id New Survey id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $newSurvey = $this->NewSurveys->get($id, [
            'contain' => [],
        ]);

        $this->set('newSurvey', $newSurvey);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->layout('adminlayout');

        $newSurvey = $this->NewSurveys->newEntity();
        if ($this->request->is('post')) {
            $newSurvey = $this->NewSurveys->patchEntity($newSurvey, $this->request->getData());
            if ($this->NewSurveys->save($newSurvey)) {
                $this->Flash->success(__('The new survey has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The new survey could not be saved. Please, try again.'));
        }
        $this->set(compact('newSurvey'));
    }

    /**
     * Edit method
     *
     * @param string|null $id New Survey id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->layout('adminlayout');

        $newSurvey = $this->NewSurveys->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $newSurvey = $this->NewSurveys->patchEntity($newSurvey, $this->request->getData());
            if ($this->NewSurveys->save($newSurvey)) {
                $this->Flash->success(__('The new survey has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The new survey could not be saved. Please, try again.'));
        }
        $this->set(compact('newSurvey'));
    }

    /**
     * Delete method
     *
     * @param string|null $id New Survey id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $newSurvey = $this->NewSurveys->get($id);
        if ($this->NewSurveys->delete($newSurvey)) {
            $this->Flash->success(__('The new survey has been deleted.'));
        } else {
            $this->Flash->error(__('The new survey could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
