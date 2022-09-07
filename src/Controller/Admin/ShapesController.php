<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Shapes Controller
 *
 * @property \App\Model\Table\ShapesTable $Shapes
 *
 * @method \App\Model\Entity\Shape[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ShapesController extends AppController
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
            'contain' => ['ShapeGroups'],
        ];
        $shapes = $this->paginate($this->Shapes);

        $this->set(compact('shapes'));
    }

    /**
     * View method
     *
     * @param string|null $id Shape id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $shape = $this->Shapes->get($id, [
            'contain' => ['ShapeGroups'],
        ]);

        $this->set('shape', $shape);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $shape = $this->Shapes->newEntity();
        if ($this->request->is('post')) {
            $shape = $this->Shapes->patchEntity($shape, $this->request->getData());
            if ($this->Shapes->save($shape)) {
                $this->Flash->success(__('The shape has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The shape could not be saved. Please, try again.'));
        }
        $shapeGroups = $this->Shapes->ShapeGroups->find('list', ['limit' => 200]);
        $this->set(compact('shape', 'shapeGroups'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Shape id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->layout('adminlayout'); 

        $shape = $this->Shapes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $shape = $this->Shapes->patchEntity($shape, $this->request->getData());
            if ($this->Shapes->save($shape)) {
                $this->Flash->success(__('The shape has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The shape could not be saved. Please, try again.'));
        }
        $shapeGroups = $this->Shapes->ShapeGroups->find('list', ['limit' => 200]);
        $this->set(compact('shape', 'shapeGroups'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Shape id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $shape = $this->Shapes->get($id);
        if ($this->Shapes->delete($shape)) {
            $this->Flash->success(__('The shape has been deleted.'));
        } else {
            $this->Flash->error(__('The shape could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
