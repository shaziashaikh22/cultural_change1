<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;

/**
 * UserTypes Controller
 *
 * @property \App\Model\Table\UserTypesTable $UserTypes
 *
 * @method \App\Model\Entity\UserType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UserTypesController extends AppController
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
            'contain' => ['Accesses'],
        ];
        $userTypes = $this->paginate($this->UserTypes);

        $this->set(compact('userTypes'));
    }

    /**
     * View method
     *
     * @param string|null $id User Type id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

    public function uploadcutouts($id = null)
    {
        $this->viewBuilder()->layout('adminlayout');
        $userType = $this->UserTypes->get($id, [
            'contain' => [],
        ]);
        $accesses = $this->UserTypes->Accesses->find('list', ['limit' => 200]);
        $this->set(compact('userType', 'accesses'));

        // get shape groups for category select options
        $ShapeGroups = TableRegistry::get('ShapeGroups');
        $query = $ShapeGroups->find('all')
            ->where(['user_type_id' => $id]);
        $shape_group = $query->toList();

        $ShapesTable = TableRegistry::get('Shapes');
        if (!empty($shape_group)) {
            foreach ($shape_group as $key => $details) {
                $getimages = $ShapesTable->find()->contain([
                    'ShapeGroups', 'UserTypes'
                ])->select(['id','ShapeGroups.user_type_id', 'shape_group_id', 'shape_image','shape_name'])->where(['ShapeGroups.user_type_id' => $details['user_type_id'], 'shape_group_id' => $details['id']])->toArray();
                $shape_group[$key]['ShapeGroupName'] = $getimages;
            }
        }
        $this->set(compact("shape_group"));

        // Upload image
        if (isset($_POST['upload'])) {

            $filename = $_FILES["shape_image"]["name"];
            $tempname = $_FILES["shape_image"]["tmp_name"];
            $folder = WWW_ROOT . 'img/cutouts/' . $filename;
            $offer = $ShapesTable->newEntity();
            $offer['shape_image'] = $filename;
            $offer['shape_group_id'] = $_POST['shape_group_id'];
            $offer['user_type_id'] = $id;
            $offer['score'] = $_POST['score'];
            $offer['width'] = $_POST['width'].'px';
            $offer['height'] = $_POST['height'].'px';

            // get filename from path
            $path_parts = pathinfo($filename);
            $offer['shape_name'] = $path_parts['filename']; // get file name

            // Now let's move the uploaded image into the folder: image
            if (move_uploaded_file($tempname, $folder)) {
                echo "Image uploaded successfully";
            } else {
                echo "Failed to upload image";
            }

            if ($imgpath = $ShapesTable->save($offer)) {
                $this->Flash->success(__('The Cutout has been saved.'));
                return $this->redirect(['action' => 'uploadcutouts/'. $id]);
            }
            $this->Flash->error(__('The Cutout could not be saved. Please, try again.'));
        }
    }

public function deletecutout($id = null){

    // Delete Image
    $Shape = TableRegistry::get('Shapes');

    $this->request->allowMethod(['post', 'delete']);
    $cutout_id = $Shape->get($id);
    if ($Shape->delete($cutout_id)) {
        $this->Flash->success(__('The cutout has been deleted.'));
    } else {
        $this->Flash->error(__('The cutout could not be deleted. Please, try again.'));
    }
    return $this->redirect(['action' => 'uploadcutouts/'.$id]);
}

    public function beforeFilter(Event $event)
    {
        $this->Auth->allow(['uploadcutouts']);
    }



    public function view($id = null)
    {
        $userType = $this->UserTypes->get($id, [
            'contain' => ['Accesses', 'Users'],
        ]);

        $this->set('userType', $userType);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->layout('adminlayout');

        $userType = $this->UserTypes->newEntity();
        if ($this->request->is('post')) {
            $userType = $this->UserTypes->patchEntity($userType, $this->request->getData());
            if ($this->UserTypes->save($userType)) {
                $this->Flash->success(__('The user type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user type could not be saved. Please, try again.'));
        }
        $accesses = $this->UserTypes->Accesses->find('list', ['limit' => 200]);
        $this->set(compact('userType', 'accesses'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User Type id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->layout('adminlayout');

        $userType = $this->UserTypes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userType = $this->UserTypes->patchEntity($userType, $this->request->getData());
            if ($this->UserTypes->save($userType)) {
                $this->Flash->success(__('The user type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user type could not be saved. Please, try again.'));
        }
        $accesses = $this->UserTypes->Accesses->find('list', ['limit' => 200]);
        $this->set(compact('userType', 'accesses'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User Type id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userType = $this->UserTypes->get($id);
        if ($this->UserTypes->delete($userType)) {
            $this->Flash->success(__('The user type has been deleted.'));
        } else {
            $this->Flash->error(__('The user type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
