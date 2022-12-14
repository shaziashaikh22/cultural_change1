<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Accesses Controller
 *
 * @property \App\Model\Table\AccessesTable $Accesses
 *
 * @method \App\Model\Entity\Access[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AccessesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->viewBuilder()->layout('adminlayout'); 

        $accesses = $this->paginate($this->Accesses);

        $this->set(compact('accesses'));
    }

    /**
     * View method
     *
     * @param string|null $id Access id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $access = $this->Accesses->get($id, [
            'contain' => ['UserTypes'],
        ]);

        $this->set('access', $access);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $access = $this->Accesses->newEntity();
        if ($this->request->is('post')) {
            $access = $this->Accesses->patchEntity($access, $this->request->getData());
            if ($this->Accesses->save($access)) {
                $this->Flash->success(__('The access has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The access could not be saved. Please, try again.'));
        }
        $this->set(compact('access'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Access id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->layout('adminlayout'); 

        $access = $this->Accesses->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $access = $this->Accesses->patchEntity($access, $this->request->getData());
            if ($this->Accesses->save($access)) {
                $this->Flash->success(__('The access has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The access could not be saved. Please, try again.'));
        }
        $this->set(compact('access'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Access id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $access = $this->Accesses->get($id);
        if ($this->Accesses->delete($access)) {
            $this->Flash->success(__('The access has been deleted.'));
        } else {
            $this->Flash->error(__('The access could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
