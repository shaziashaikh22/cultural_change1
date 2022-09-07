<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * ShapeGroups Controller
 *
 * @property \App\Model\Table\ShapeGroupsTable $ShapeGroups
 *
 * @method \App\Model\Entity\ShapeGroup[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ShapeGroupsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->viewBuilder()->layout('adminlayout'); 

        $shapeGroups = $this->paginate($this->ShapeGroups);

        $this->set(compact('shapeGroups'));
    }

    /**
     * View method
     *
     * @param string|null $id Shape Group id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $shapeGroup = $this->ShapeGroups->get($id, [
            'contain' => ['OnlineGames', 'Shapes'],
        ]);

        $this->set('shapeGroup', $shapeGroup);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $shapeGroup = $this->ShapeGroups->newEntity();
        if ($this->request->is('post')) {
            $shapeGroup = $this->ShapeGroups->patchEntity($shapeGroup, $this->request->getData());
            if ($this->ShapeGroups->save($shapeGroup)) {
                $this->Flash->success(__('The shape group has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The shape group could not be saved. Please, try again.'));
        }
        $this->set(compact('shapeGroup'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Shape Group id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->layout('adminlayout'); 

        $shapeGroup = $this->ShapeGroups->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $shapeGroup = $this->ShapeGroups->patchEntity($shapeGroup, $this->request->getData());
            if ($this->ShapeGroups->save($shapeGroup)) {
                $this->Flash->success(__('The shape group has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The shape group could not be saved. Please, try again.'));
        }
        $this->set(compact('shapeGroup'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Shape Group id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $shapeGroup = $this->ShapeGroups->get($id);
        if ($this->ShapeGroups->delete($shapeGroup)) {
            $this->Flash->success(__('The shape group has been deleted.'));
        } else {
            $this->Flash->error(__('The shape group could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
