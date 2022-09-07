<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * GameSteps Controller
 *
 * @property \App\Model\Table\GameStepsTable $GameSteps
 *
 * @method \App\Model\Entity\GameStep[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GameStepsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $gameSteps = $this->paginate($this->GameSteps);

        $this->set(compact('gameSteps'));
    }

    /**
     * View method
     *
     * @param string|null $id Game Step id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $gameStep = $this->GameSteps->get($id, [
            'contain' => ['Results'],
        ]);

        $this->set('gameStep', $gameStep);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $gameStep = $this->GameSteps->newEntity();
        if ($this->request->is('post')) {
            $gameStep = $this->GameSteps->patchEntity($gameStep, $this->request->getData());
            if ($this->GameSteps->save($gameStep)) {
                $this->Flash->success(__('The game step has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The game step could not be saved. Please, try again.'));
        }
        $this->set(compact('gameStep'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Game Step id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $gameStep = $this->GameSteps->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $gameStep = $this->GameSteps->patchEntity($gameStep, $this->request->getData());
            if ($this->GameSteps->save($gameStep)) {
                $this->Flash->success(__('The game step has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The game step could not be saved. Please, try again.'));
        }
        $this->set(compact('gameStep'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Game Step id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $gameStep = $this->GameSteps->get($id);
        if ($this->GameSteps->delete($gameStep)) {
            $this->Flash->success(__('The game step has been deleted.'));
        } else {
            $this->Flash->error(__('The game step could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
