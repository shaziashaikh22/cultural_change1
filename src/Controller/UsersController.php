<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */

    public function round1phase1()
    {
        $this->viewBuilder()->layout('adminlayout');
        $user = $this->Auth->user();
        $this->set(compact("user"));
        // current user type
        $UserTypesTable = TableRegistry::get('UserTypes');
        $query = $UserTypesTable->find('all')
            ->where(['id' => $user['user_type_id']]);
        $userType = $query->toList();
        $this->set(compact("userType"));

        // all users type
        $AlluserTypesTable = TableRegistry::get('UserTypes');
        $query = $AlluserTypesTable->find()->order(['type_name' => 'ASC']);
        $alluserType = $query->toList();
        $this->set(compact("alluserType"));

        // get time of game
        $OnlineGamesTable = TableRegistry::get('OnlineGames');
        $query = $OnlineGamesTable->find('all')
            ->where(['game_name' => $user['gamecode_name']]);
        $OnlineGames = $query->toList();
        $this->set(compact("OnlineGames"));

        // Get Job description and Project Info
        $JobDescriptionsTable = TableRegistry::get('JobDescriptions');
        $query3 = $JobDescriptionsTable->find('all')
            ->where(['user_type_id' => $user['user_type_id']])
            ->where(['round_id' => '1']);
        $JobDescriptions = $query3->toList();
        $this->set(compact("JobDescriptions"));
        
        // Get LoginforMatches table
        $LoginForMatchesTable = TableRegistry::get('LoginForMatches');

        // submit round 1 result
        $ResultsTable = TableRegistry::get('Results');

        $gamecodetable = TableRegistry::get('OnlineGames');

        if (isset($_POST['go_toround1phase2'])) {

            $resultDatadetails = $ResultsTable->newEntity();
            $resultDatadetails['user_id'] = $user['id'];
            $resultDatadetails['user_type_id'] = $user['user_type_id'];
            $resultDatadetails['game_code'] = $user['gamecode_name'];
            $resultDatadetails['round_id'] = '1';
            $resultDatadetails['phase_id'] = '1';
            $resultDatadetails['game_step_id'] = '1';
            $resultDatadetails['score'] = '';
            $resultDatadetails['given_time'] = '03:00';
            $resultDatadetails['canvas_image'] = $_POST['canvas_image'];
            $resultDatadetails['date'] = date("Y-m-d");
            $resultDatadetails['status'] = 'Completed';

            // check if result already exist with same user type, gamecode,phase_id,round_id
            $result_exist = $ResultsTable->find()
                ->where([
                    'user_id' => $resultDatadetails['user_id'],
                    'user_type_id' => $resultDatadetails['user_type_id'],
                    'game_code' => $resultDatadetails['game_code'],
                    'game_step_id' => '1'
                    // 'phase_id' => '1', 'round_id' => '1'
                ])
                ->first();

            //// check exixting players turn to update next players turn
            $exist_player_turn = $gamecodetable->find()
                ->where([
                    'game_name' => $user['gamecode_name'],
                ])
                ->first();
            $this->set(compact("exist_player_turn"));

            ////If resut already exist update result 
            if ($result_exist) {
                $ResultsTable->updateAll(['canvas_image' => $_POST['canvas_image'], 'status' => 'Completed'], ['user_id' => $resultDatadetails['user_id'], 'user_type_id' => $resultDatadetails['user_type_id'], 'game_code' => $resultDatadetails['game_code'], 'game_step_id' => '1']);
                //update status of loginformatches tables phase id 1 and round 2
                $LoginForMatchesTable->updateAll(['round_id' => '1', 'phase_id' => '2', 'round_number' => '1', 'status' => 'In Progress', 'game_status' => ''], ['user_id' => $resultDatadetails['user_id'], 'gamecode' => $resultDatadetails['game_code']]);

                // update plyers turn
                if ($user['user_type_id'] == '3') {  /// 3 is for architect
                    $gamecodetable->updateAll(['players_turn' => '2'], ['id' => $exist_player_turn['id']]); // second will be carpenter
                }
                if ($user['user_type_id'] == '2') {
                    $gamecodetable->updateAll(['players_turn' => '1'], ['id' => $exist_player_turn['id']]); // third will be Gardener
                }
                if ($user['user_type_id'] == '1') {
                    $gamecodetable->updateAll(['players_turn' => '4'], ['id' => $exist_player_turn['id']]); // fourth will be Designer
                }
                if ($user['user_type_id'] == '4') {
                    $gamecodetable->updateAll(['players_turn' => '3'], ['id' => $exist_player_turn['id']]); // fourth will be architect
                }

                $this->Flash->success(__('The result has been updated.'));
                return $this->redirect(['action' => 'jobdescround1p2']); // 3-3-2022 instruction2
            } else if ($result = $ResultsTable->save($resultDatadetails)) {
                //update status of loginformatches tables phase id and round 2
                $LoginForMatchesTable->updateAll(['round_id' => '1', 'phase_id' => '2', 'round_number' => '1', 'status' => 'In Progress', 'game_status' => ''], ['user_id' => $result['user_id'], 'gamecode' => $result['game_code']]);

                // update plyers turn
                if ($user['user_type_id'] == '3') {  /// 3 is for architect
                    $gamecodetable->updateAll(['players_turn' => '2'], ['id' => $exist_player_turn['id']]); // second will be carpenter
                }
                if ($user['user_type_id'] == '2') {
                    $gamecodetable->updateAll(['players_turn' => '1'], ['id' => $exist_player_turn['id']]); // third will be Gardener
                }
                if ($user['user_type_id'] == '1') {
                    $gamecodetable->updateAll(['players_turn' => '4'], ['id' => $exist_player_turn['id']]); // fourth will be Designer
                }
                if ($user['user_type_id'] == '4') {
                    $gamecodetable->updateAll(['players_turn' => '3'], ['id' => $exist_player_turn['id']]); // fourth will be architect
                }

                $this->Flash->success(__('The result has been saved.'));
                return $this->redirect(['action' => 'jobdescround1p2']); // 3-3-2022 instruction2
            } else {
                return $this->redirect(['action' => 'jobdescround1p2']); // 3-3-2022 instruction2
                //                $this->Flash->error(__('The result could not be saved. Please, try again.'));
            }
        }
    }

    public function getplayersturn()
    {
        $user = $this->Auth->user();
        $this->set(compact("user"));

        $gamecodetable = TableRegistry::get('OnlineGames');
        $exist_player_turn = $gamecodetable->find()
            ->where([
                'game_name' => $user['gamecode_name'],
                // 'players_turn !=' => 3
            ])

            ->first();
        echo json_encode($exist_player_turn);
        exit();
    }

    public function playerturn() // for bottom status and players turn 4-4-2022
    {
        $user = $this->Auth->user();
        $this->set(compact("user"));

        $gamecodetable = TableRegistry::get('OnlineGames');
        $exist_player_turn = $gamecodetable->find()
            ->where([
                'game_name' => $user['gamecode_name'],
            ])
            ->first();
        echo json_encode($exist_player_turn);
        exit();
    }

    public function turnOverPlayersCanvas()
    { // round 1 phase 1 

        $user = $this->Auth->user();
        $this->set(compact("user"));

        $ResultTable = TableRegistry::get('Results');
        if ($user['user_type_id'] == 1) {
            $query5 = $ResultTable->find()
                ->where(['user_type_id' => 2, 'game_code' => $user['gamecode_name'], 'game_step_id' => '1', 'status' => 'Completed'])
                ->order(['created' => 'ASC']);
            $turn_overplayer_canvas = $query5->toList();
            echo json_encode($turn_overplayer_canvas);
        }
        if ($user['user_type_id'] == 2) {
            $query5 = $ResultTable->find()
                ->where(['user_type_id' => 3, 'game_code' => $user['gamecode_name'], 'game_step_id' => '1', 'status' => 'Completed'])
                ->order(['created' => 'ASC']);
            $turn_overplayer_canvas = $query5->toList();
            echo json_encode($turn_overplayer_canvas);
        }
        if ($user['user_type_id'] == 4) {
            $query5 = $ResultTable->find()
                ->where(['user_type_id' => 1, 'game_code' => $user['gamecode_name'], 'game_step_id' => '1', 'status' => 'Completed'])
                ->order(['created' => 'ASC']);
            $turn_overplayer_canvas = $query5->toList();
            echo json_encode($turn_overplayer_canvas);
        }

        exit();
    }
    public function turnOverPlayersCanvas2()
    {
        // round 1 phase 2
        $user = $this->Auth->user();
        $this->set(compact("user"));
        // print_r($user);
        $ResultTable = TableRegistry::get('Results');
        if ($user['user_type_id'] == 1) {
            $query5 = $ResultTable->find()
                ->where(['user_type_id' => 2, 'game_code' => $user['gamecode_name'], 'game_step_id' => '2', 'status' => 'Completed'])
                ->order(['created' => 'ASC']);
            $turn_overplayer_canvas = $query5->toList();
            echo json_encode($turn_overplayer_canvas);
        }
        if ($user['user_type_id'] == 2) {
            $query5 = $ResultTable->find()
                ->where(['user_type_id' => 3, 'game_code' => $user['gamecode_name'], 'game_step_id' => '2', 'status' => 'Completed'])
                ->order(['created' => 'ASC']);
            $turn_overplayer_canvas = $query5->toList();
            echo json_encode($turn_overplayer_canvas);
        }
        if ($user['user_type_id'] == 4) {
            $query5 = $ResultTable->find()
                ->where(['user_type_id' => 1, 'game_code' => $user['gamecode_name'], 'game_step_id' => '2', 'status' => 'Completed'])
                ->order(['created' => 'ASC']);
            $turn_overplayer_canvas = $query5->toList();
            echo json_encode($turn_overplayer_canvas);
        }
        exit();
    }

   

    public function round1phase2()
    {
        $this->viewBuilder()->layout('adminlayout');
        $user = $this->Auth->user(); // get auth user
        $this->set(compact("user"));

        // type of user
        $UserTypesTable = TableRegistry::get('UserTypes');
        $query = $UserTypesTable->find('all')
            ->where(['id' => $user['user_type_id']]);
        $userType = $query->toList();
        $this->set(compact("userType"));

        // all users type
        $AlluserTypesTable = TableRegistry::get('UserTypes');
        $query = $AlluserTypesTable->find()->order(['type_name' => 'ASC']);
        $alluserType = $query->toList();
        $this->set(compact("alluserType"));

        // Get Job description and Project Info
        $JobDescriptionsTable = TableRegistry::get('JobDescriptions');
        $query3 = $JobDescriptionsTable->find('all')
            ->where(['user_type_id' => $user['user_type_id']])
            ->where(['round_id' => '1', 'phase_id' => '2']);
        $JobDescriptions = $query3->toList();
        $this->set(compact("JobDescriptions"));

        // get time of game
        $OnlineGamesTable = TableRegistry::get('OnlineGames');
        $query = $OnlineGamesTable->find('all')
            ->where(['game_name' => $user['gamecode_name']]);
        $OnlineGames = $query->toList();
        $this->set(compact("OnlineGames"));

        // Get LoginforMatches table
        $LoginForMatchesTable = TableRegistry::get('LoginForMatches');

        // get cutouts for logged in user type
        $ShapeGroups = TableRegistry::get('ShapeGroups');
        $query2 = $ShapeGroups->find('all')
            ->where(['user_type_id' => $user['user_type_id']]);
        $shape_group = $query2->toList();

        $ShapesTable = TableRegistry::get('Shapes');
        if (!empty($shape_group)) {
            foreach ($shape_group as $key => $details) {
                $getimages = $ShapesTable->find()->contain([
                    'ShapeGroups', 'UserTypes'
                ])->select(['id', 'ShapeGroups.user_type_id', 'shape_group_id', 'shape_image', 'width', 'height', 'shape_name', 'score'])->where(['ShapeGroups.user_type_id' => $details['user_type_id'], 'shape_group_id' => $details['id']])->toArray();
                $shape_group[$key]['ShapeGroupName'] = $getimages;
            }
        }
        $this->set(compact("shape_group"));

        //Get result table for canvas image preview
        $ResultsTable = TableRegistry::get('Results');
        $query4 = $ResultsTable->find()
            ->where(['user_type_id' => $user['user_type_id'], 'game_code' => $user['gamecode_name'], 'game_step_id' => '1', 'status' => 'Completed']);
        $p1_r1_result = $query4->toList();
        $this->set(compact("p1_r1_result"));

        ////Get Canvas image of Architect for other user work
        $ResultTable = TableRegistry::get('Results');
        $query5 = $ResultTable->find()
            ->where(['user_type_id' => '3', 'game_code' => $user['gamecode_name'], 'game_step_id' => '1', 'status' => 'Completed']);
        $p1_r2_Architect_result = $query5->toList();
        $this->set(compact("p1_r2_Architect_result"));

        ////Get Canvas image of Carpenter for other user work
        // $ResultTable = TableRegistry::get('Results');
        $query6 = $ResultTable->find()
            ->where(['user_type_id' => '2', 'game_code' => $user['gamecode_name'], 'game_step_id' => '1', 'status' => 'Completed']);
        $p1_r2_Carpenter_result = $query6->toList();
        $this->set(compact("p1_r2_Carpenter_result"));

        ////Get Canvas image of Gardener for other user work
        // $ResultTable = TableRegistry::get('Results');
        $query7 = $ResultTable->find()
            ->where(['user_type_id' => '1', 'game_code' => $user['gamecode_name'], 'game_step_id' => '1', 'status' => 'Completed']);
        $p1_r2_Gardener_result = $query7->toList();
        $this->set(compact("p1_r2_Gardener_result"));

        ////Get Canvas image of Designer for other user work
        // $ResultTable = TableRegistry::get('Results');
        $query8 = $ResultTable->find()
            ->where(['user_type_id' => '4', 'game_code' => $user['gamecode_name'], 'game_step_id' => '1', 'status' => 'Completed']);
        $p1_r2_Designer_result = $query8->toList();
        $this->set(compact("p1_r2_Designer_result"));

        $gamecodetable = TableRegistry::get('OnlineGames');

        // submit round 1 phase 2 result
        if (isset($_POST['submit_round1phase2'])) { //submit_round1phase2
            $resultDatadetails = $ResultsTable->newEntity();
            $resultDatadetails['user_id'] = $user['id'];
            $resultDatadetails['user_type_id'] = $user['user_type_id'];
            $resultDatadetails['game_code'] = $user['gamecode_name'];
            $resultDatadetails['round_id'] = '1';
            $resultDatadetails['phase_id'] = '2';
            $resultDatadetails['game_step_id'] = '2';
            $resultDatadetails['score'] = $_POST['score'];
            $resultDatadetails['given_time'] = '03:00';
            $resultDatadetails['canvas_image'] = $_POST['canvas_image'];
            $resultDatadetails['date'] = date("Y-m-d");
            $resultDatadetails['status'] = 'Completed';

            // check if result already exist with same user type, gamecode,phase_id,round_id
            $result_exist = $ResultsTable->find()
                ->where([
                    'user_id' => $resultDatadetails['user_id'],
                    'user_type_id' => $resultDatadetails['user_type_id'],
                    'game_code' => $resultDatadetails['game_code'],
                    //  'phase_id' => '2','round_id' => '1'
                    'game_step_id' => '2'
                ])
                ->first();
            //// check exixting players turn to update next players turn
            $exist_player_turn = $gamecodetable->find()
                ->where([
                    'game_name' => $user['gamecode_name'],
                ])
                ->first();
            $this->set(compact("exist_player_turn"));

            ////If resut already exist update result 
            if ($result_exist) {
                date_default_timezone_set('asia/kolkata');
                $ResultsTable->updateAll(['canvas_image' => $resultDatadetails['canvas_image'], 'score' => $result_exist['score'] + $_POST['score'], 'modified' => date('Y-m-d h:i:s'), 'status' => 'Completed'], ['user_id' => $resultDatadetails['user_id'], 'user_type_id' => $resultDatadetails['user_type_id'], 'game_code' => $resultDatadetails['game_code'], 'game_step_id' => '2']);

                //update status of loginformatches tables round 2 phase 1
                $LoginForMatchesTable->updateAll(['round_id' => '2', 'phase_id' => '1', 'round_number' => '2', 'status' => 'In Progress', 'game_status' => ''], ['user_id' => $resultDatadetails['user_id'], 'gamecode' => $resultDatadetails['game_code']]);

                // update plyers turn
                if ($user['user_type_id'] == '3') {  /// 3 is for architect
                    $gamecodetable->updateAll(['players_turn' => '2'], ['id' => $exist_player_turn['id']]); // second will be carpenter
                }
                if ($user['user_type_id'] == '2') {
                    $gamecodetable->updateAll(['players_turn' => '1'], ['id' => $exist_player_turn['id']]); // third will be Gardener
                }
                if ($user['user_type_id'] == '1') {
                    $gamecodetable->updateAll(['players_turn' => '4'], ['id' => $exist_player_turn['id']]); // fourth will be Designer
                }
                if ($user['user_type_id'] == '4') {
                    $gamecodetable->updateAll(['players_turn' => '3'], ['id' => $exist_player_turn['id']]); // fourth will be architect
                }
                return $this->redirect(['action' => 'beforeoutput1']); // jobdescround2

                $this->Flash->success(__('The result has been updated.'));
            } else if ($result = $ResultsTable->save($resultDatadetails)) {
                //update status of loginformatches tables phase id round id
                $LoginForMatchesTable->updateAll(['round_id' => '2', 'phase_id' => '1', 'round_number' => '2', 'status' => 'In Progress'], ['user_id' => $result['user_id'], 'gamecode' => $result['game_code']]);

                // update plyers turn
                if ($user['user_type_id'] == '3') {  /// 3 is for architect
                    $gamecodetable->updateAll(['players_turn' => '2'], ['id' => $exist_player_turn['id']]); // second will be carpenter
                }
                if ($user['user_type_id'] == '2') {
                    $gamecodetable->updateAll(['players_turn' => '1'], ['id' => $exist_player_turn['id']]); // third will be Gardener
                }
                if ($user['user_type_id'] == '1') {
                    $gamecodetable->updateAll(['players_turn' => '4'], ['id' => $exist_player_turn['id']]); // fourth will be Designer
                }
                if ($user['user_type_id'] == '4') {
                    $gamecodetable->updateAll(['players_turn' => '3'], ['id' => $exist_player_turn['id']]); // fourth will be architect
                }

                $this->Flash->success(__('The result has been saved.'));
                return $this->redirect(['action' => 'beforeoutput1']); // jobdescround2
            } else {
                return $this->redirect(['action' => 'beforeoutput1']); // jobdescround2
                //$this->Flash->error(__('The result could not be saved. Please, try again.'));
            }
        }
    }
    public function initialround1phase2()
    { // This for update score, we need to submit form on page load
        $user = $this->Auth->user(); // get auth user
        $this->set(compact("user"));
        // type of user
        $UserTypesTable = TableRegistry::get('UserTypes');
        $query = $UserTypesTable->find('all')
            ->where(['id' => $user['user_type_id']]);
        $userType = $query->toList();
        $this->set(compact("userType"));

        $ResultsTable = TableRegistry::get('Results');

        // submit round 1 phase 2 result
        if (isset($_POST['canvas_image_initl'])) { //submit_round1phase2
            $resultDatadetails = $ResultsTable->newEntity();
            $resultDatadetails['user_id'] = $user['id'];
            $resultDatadetails['user_type_id'] = $user['user_type_id'];
            $resultDatadetails['game_code'] = $user['gamecode_name'];
            $resultDatadetails['game_step_id'] = '2';
            $resultDatadetails['round_id'] = '1';
            $resultDatadetails['phase_id'] = '2';
            $resultDatadetails['score'] = 0;
            $resultDatadetails['given_time'] = '03:00';
            $resultDatadetails['canvas_image'] = $_POST['canvas_image_initl'];
            $resultDatadetails['date'] = date("Y-m-d");
            $resultDatadetails['status'] = 'In Progress';

            // check if result already exist with same user type, gamecode,phase_id,round_id
            $result_exist = $ResultsTable->find()
                ->where([
                    'user_id' => $resultDatadetails['user_id'],
                    'user_type_id' => $resultDatadetails['user_type_id'],
                    'game_code' => $resultDatadetails['game_code'],
                    //  'phase_id' => '2','round_id' => '1'
                    'game_step_id' => '2'
                ])
                ->first();

            ////If resut already exist update result 
            if ($result_exist) {
                date_default_timezone_set('asia/kolkata');
                $ResultsTable->updateAll(['canvas_image' => $_POST['canvas_image_initl'], 'score' => 0, 'status' => 'In Progress'], ['user_id' => $resultDatadetails['user_id'], 'user_type_id' => $resultDatadetails['user_type_id'], 'game_code' => $resultDatadetails['game_code'], 'game_step_id' => '2']);
            } else if ($result = $ResultsTable->save($resultDatadetails)) {
            } else {
                return $this->redirect(['action' => 'round2phase1']);
                //                $this->Flash->error(__('The result could not be saved. Please, try again.'));
            }
        }
        exit();
    }

    public function initialround2phase1()
    { 
        // reset score at starting round 1 phase 2
        $user = $this->Auth->user(); // get auth user
        $this->set(compact("user"));
        // type of user
        $UserTypesTable = TableRegistry::get('UserTypes');
        $query = $UserTypesTable->find('all')
            ->where(['id' => $user['user_type_id']]);
        $userType = $query->toList();
        $this->set(compact("userType"));

        $ResultsTable = TableRegistry::get('Results');

        // submit round 2 phase 2 result
        if (isset($_POST['canvas_image_initl3'])) { //submit_round1phase2
            $resultDatadetails = $ResultsTable->newEntity();
            $resultDatadetails['user_id'] = $user['id'];
            $resultDatadetails['user_type_id'] = $user['user_type_id'];
            $resultDatadetails['game_code'] = $user['gamecode_name'];
            $resultDatadetails['game_step_id'] = '3';
            $resultDatadetails['round_id'] = '2';
            $resultDatadetails['round_id'] = '1';
            $resultDatadetails['score'] = 0;
            $resultDatadetails['given_time'] = '03:00';
            $resultDatadetails['canvas_image'] = null;
            $resultDatadetails['date'] = date("Y-m-d");
            $resultDatadetails['status'] = null; //'In Progress'

            // check if result already exist with same user type, gamecode,phase_id,round_id
            $result_exist = $ResultsTable->find()
                ->where([
                    'user_id' => $resultDatadetails['user_id'],
                    'user_type_id' => $resultDatadetails['user_type_id'],
                    'game_code' => $resultDatadetails['game_code'],
                    'game_step_id' => '3',
                     'round_id' => '2','phase_id' => '1',
                    
                ])
                ->first();

            ////If resut already exist update result 
            if ($result_exist) {
                date_default_timezone_set('asia/kolkata');
                $ResultsTable->updateAll(
                    [
                        'canvas_image' => null,
                        'score' => 0, 'given_time' => '03:00',
                        // 'status' => 'In Progress'
                    ],
                    ['user_id' => $resultDatadetails['user_id'],
                     'user_type_id' => $resultDatadetails['user_type_id'],
                      'game_code' => $resultDatadetails['game_code'], 'game_step_id' => '3']
                );
            } else if ($result = $ResultsTable->save($resultDatadetails)) {
            } else {
                // return $this->redirect(['action' => 'login']);
            }
        }
        exit();
    }

    // public function updatecanvasR2p1() // canvas will update in every second round 2 phase 1
    // {
    //     $this->viewBuilder()->layout('adminlayout');
    //     $user = $this->Auth->user();
    //     $this->set(compact("user"));

    //     $ResultsTable = TableRegistry::get('Results');

    //     if (isset($_POST['canvas_image'])) {
    //         $resultDatadetails = $ResultsTable->newEntity();
    //         $resultDatadetails['user_id'] = $user['id'];
    //         $resultDatadetails['user_type_id'] = $user['user_type_id'];
    //         $resultDatadetails['game_code'] = $user['gamecode_name'];
    //         $resultDatadetails['round_id'] = '2';
    //         $resultDatadetails['phase_id'] = '1';
    //         $resultDatadetails['score'] = '';
    //         $resultDatadetails['game_step_id'] = '3';
    //         $resultDatadetails['given_time'] = '03:00';
    //         $resultDatadetails['canvas_image'] = $_POST['canvas_image'];
    //         $resultDatadetails['date'] = date("Y-m-d");
    //         $resultDatadetails['status'] = 'Completed';

    //         // check if result already exist with same user type, gamecode,phase_id,round_id
    //         $result_exist = $ResultsTable->find()
    //             ->where([
    //                 'user_id' => $resultDatadetails['user_id'],
    //                 'user_type_id' => $resultDatadetails['user_type_id'],
    //                 'game_code' => $resultDatadetails['game_code'],
    //                 // 'round_id' => '2', 'phase_id' => '1',
    //                 'game_step_id' => '3'
    //             ])
    //             ->first();

    //         ////If resut already exist update result 
    //         if ($result_exist) {
    //             $ResultsTable->updateAll(['canvas_image' => $_POST['canvas_image'], 'status' => 'Completed'], ['user_id' => $resultDatadetails['user_id'], 'user_type_id' => $resultDatadetails['user_type_id'], 'game_code' => $resultDatadetails['game_code'], 'game_step_id' => '3']);
    //         } else if ($result = $ResultsTable->save($resultDatadetails)) {
    //             echo json_encode($result);
    //         } else {
    //         }
    //     }
    //     exit();
    // }

    // public function updatecanvasR2p2() // canvas will update in every second round 2 phase 2
    // {
    //     $this->viewBuilder()->layout('adminlayout');
    //     $user = $this->Auth->user();
    //     $this->set(compact("user"));

    //     $ResultsTable = TableRegistry::get('Results');

    //     if (isset($_POST['canvas_image'])) { // submit_phase2roundtwo
    //         $resultDatadetails = $ResultsTable->newEntity();
    //         $resultDatadetails['user_id'] = $user['id'];
    //         $resultDatadetails['user_type_id'] = $user['user_type_id'];
    //         $resultDatadetails['game_code'] = $user['gamecode_name'];
    //         $resultDatadetails['phase_id'] = '2';
    //         $resultDatadetails['round_id'] = '2';
    //         $resultDatadetails['game_step_id'] = '4';
    //         $resultDatadetails['score'] = $_POST['score'];
    //         $resultDatadetails['given_time'] = '03:00';
    //         $resultDatadetails['canvas_image'] = $_POST['canvas_image'];
    //         $resultDatadetails['date'] = date("Y-m-d");
    //         $resultDatadetails['status'] = 'Completed';

    //         // check if result already exist with same user type, gamecode,phase_id,round_id
    //         $result_exist = $ResultsTable->find()
    //             ->where([
    //                 'user_id' => $resultDatadetails['user_id'],
    //                 'user_type_id' => $resultDatadetails['user_type_id'],
    //                 'game_code' => $resultDatadetails['game_code'],
    //                 // 'phase_id' => '2', 'round_id' => '2'
    //                 'game_step_id' => '4'
    //             ])
    //             ->first();

    //         ////If resut already exist update result 
    //         if ($result_exist) {

    //             $ResultsTable->updateAll(['canvas_image' => $_POST['canvas_image'], 'score' => $result_exist['score'] + $_POST['score'], 'status' => 'Completed', 'modified' => date('Y-m-d h:i:s')], ['user_id' => $resultDatadetails['user_id'], 'user_type_id' => $resultDatadetails['user_type_id'], 'game_code' => $resultDatadetails['game_code'], 'game_step_id' => '4']);
    //         } else if ($result = $ResultsTable->save($resultDatadetails)) {
    //         } else {
    //             return $this->redirect(['action' => 'login']);
    //         }
    //     }
    //     exit();
    // }

    // Update time, fetch time and get difference between time in seconds start Round 2 phase 1
    public function r2p1updateTime()
    { // update time if start time is empty at initial Round 2 phase 1
        $user = $this->Auth->user();
        $this->set(compact("user"));
        $LoginForMatchesTable = TableRegistry::get('LoginForMatches');
        date_default_timezone_set('asia/kolkata');

        if (isset($_POST['update_start_time'])) {
            $userdata_exist = $LoginForMatchesTable->find()
                ->where([
                    'gamecode' => $user['gamecode_name'],
                    'round_id' => '2',
                    'phase_id' => '1',
                    // 'status' => 'In progress',
                    'round_number' => '2',
                ])->first();

            $countEmptyTimeValue = $LoginForMatchesTable->find('all', [
                'conditions' => ['gamecode' => $user['gamecode_name']]
            ])
                ->where([
                    'round_id' => '2', 'phase_id' => '1', 'round_number' => '2',
                    // 'status' => 'In Progress',
                    'start_time IS NULL'
                ]);
            $emptyTimeValue = $countEmptyTimeValue->count();
            $this->set(compact("emptyTimeValue"));
            print_r($emptyTimeValue);
            if ($userdata_exist && $emptyTimeValue == 4) {
                $LoginForMatchesTable->updateAll(['start_time' => date("d-m-y h:i:s")], ['gamecode' => $user['gamecode_name'], 'round_id' => '2', 'phase_id' => '1']);
            } else {
                echo 'time already exist';
            }
        }
        exit();
    }

    public function fetchTimeR2p1()
    {
        $user = $this->Auth->user();
        $this->set(compact("user"));
        // fetch time from db
        $LoginForMatchesTable = TableRegistry::get('LoginForMatches');
        $fetchTime = $LoginForMatchesTable->find('all')
            ->where([
                'gamecode' => $user['gamecode_name'],
                'round_id' => '2',
                'phase_id' => '1',
                // 'status' => 'In progress',
                'round_number' => '2',
            ]);
        $gettime = $fetchTime->toList();
        //  $this->set(compact("gettime"));
        echo json_encode($gettime[0]['start_time']);
        exit();
    }

    public function timedifferenceR2p1()
    {
        date_default_timezone_set('asia/kolkata');
        $get_current_time = date("d-m-y h:i:s");
        if (isset($_POST['db_start_time'])) {
            $timeFirst  = strtotime($_POST['db_start_time']);
            $timeSecond = strtotime($get_current_time);
            $differenceInSeconds = $timeSecond - $timeFirst;
            // print_r($differenceInSeconds);
            echo json_encode($differenceInSeconds);
        }
        exit();
    }
    // Update time, fetch time and get difference between time in seconds End

    // Update time, fetch time and get difference between time in seconds start Round 2 phase 2
    public function r2p2updateTime() // update time if start time is empty at initial Round 2 phase 1
    {
        $user = $this->Auth->user();
        $this->set(compact("user"));
        $LoginForMatchesTable = TableRegistry::get('LoginForMatches');
        date_default_timezone_set('asia/kolkata');

        if (isset($_POST['update_start_time'])) {
            $userdata_exist = $LoginForMatchesTable->find()
                ->where([
                    'gamecode' => $user['gamecode_name'],
                    'round_id' => '2',
                    'phase_id' => '2',
                    'round_number' => '2',
                ])->first();

            $countEmptyTimeValue = $LoginForMatchesTable->find('all', [
                'conditions' => ['gamecode' => $user['gamecode_name']]
            ])
                ->where([
                    'round_id' => '2', 'phase_id' => '2', 'round_number' => '2',
                    'start_time IS NULL'
                ]);
            $emptyTimeValue = $countEmptyTimeValue->count();
            $this->set(compact("emptyTimeValue"));
            print_r($emptyTimeValue);
            if ($userdata_exist && $emptyTimeValue == 4) {
                $LoginForMatchesTable->updateAll(['start_time' => date("d-m-y h:i:s")], ['gamecode' => $user['gamecode_name'], 'round_id' => '2', 'phase_id' => '2']);
            } else {
                echo 'time already exist';
            }
        }
        exit();
    }

    public function fetchTimeR2p2()
    {
        $user = $this->Auth->user();
        $this->set(compact("user"));
        // fetch time from db
        $LoginForMatchesTable = TableRegistry::get('LoginForMatches');
        $fetchTime = $LoginForMatchesTable->find('all')
            ->where([
                'gamecode' => $user['gamecode_name'],
                'round_id' => '2',
                'phase_id' => '2',
                //  'status' => 'In progress',
                'round_number' => '2',
            ]);
        $gettime = $fetchTime->toList();
        //  $this->set(compact("gettime"));
        echo json_encode($gettime[0]['start_time']);
        exit();
    }

    public function timedifferenceR2p2()
    {
        date_default_timezone_set('asia/kolkata');
        $get_current_time = date("d-m-y h:i:s");
        if (isset($_POST['db_start_time'])) {
            $timeFirst  = strtotime($_POST['db_start_time']);
            $timeSecond = strtotime($get_current_time);
            $differenceInSeconds = $timeSecond - $timeFirst;
            // print_r($differenceInSeconds);
            echo json_encode($differenceInSeconds);
        }
        exit();
    }
    // Update time, fetch time and get difference between time in seconds End

    public function initialround2phase2()
    { // reset score at starting round 1 phase 2
        $user = $this->Auth->user(); // get auth user
        $this->set(compact("user"));
        // type of user
        $UserTypesTable = TableRegistry::get('UserTypes');
        $query = $UserTypesTable->find('all')
            ->where(['id' => $user['user_type_id']]);
        $userType = $query->toList();
        $this->set(compact("userType"));

        $ResultsTable = TableRegistry::get('Results');

        // submit round 2 phase 2 result
        if (isset($_POST['canvas_image_initl4'])) { //submit_round1phase2
            $resultDatadetails = $ResultsTable->newEntity();
            $resultDatadetails['user_id'] = $user['id'];
            $resultDatadetails['user_type_id'] = $user['user_type_id'];
            $resultDatadetails['game_code'] = $user['gamecode_name'];
            $resultDatadetails['game_step_id'] = '4';
            $resultDatadetails['round_id'] = '2';
            $resultDatadetails['phase_id'] = '2';
            $resultDatadetails['score'] = 0;
            $resultDatadetails['given_time'] = '03:00';
            $resultDatadetails['canvas_image'] = $_POST['canvas_image_initl4'];
            $resultDatadetails['date'] = date("Y-m-d");
            $resultDatadetails['status'] = 'In Progress';

            // check if result already exist with same user type, gamecode,phase_id,round_id
            $result_exist = $ResultsTable->find()
                ->where([
                    'user_id' => $resultDatadetails['user_id'],
                    'user_type_id' => $resultDatadetails['user_type_id'],
                    'game_code' => $resultDatadetails['game_code'],
                    //  'phase_id' => '2','round_id' => '1'
                    'game_step_id' => '4'
                ])
                ->first();

            ////If resut already exist update result 
            if ($result_exist) {
                date_default_timezone_set('asia/kolkata');
                $ResultsTable->updateAll(['canvas_image' => $_POST['canvas_image_initl4'], 'score' => 0, 'status' => 'In Progress'], ['user_id' => $resultDatadetails['user_id'], 'user_type_id' => $resultDatadetails['user_type_id'], 'game_code' => $resultDatadetails['game_code'], 'game_step_id' => '4']);
            } else if ($result = $ResultsTable->save($resultDatadetails)) {
            } else {
                return $this->redirect(['action' => 'login']);
            }
        }
        exit();
    }

    public function updatescoreStep2()
    {
        $user = $this->Auth->user();
        $this->set(compact("user"));
        $ResultsTable = TableRegistry::get('Results');

        if (isset($_POST['score_update'])) {
            // check if result already exist with same user type, gamecode,phase_id,round_id
            $result_exist = $ResultsTable->find()
                ->where([
                    'user_id' => $user['id'], 'user_type_id' => $user['user_type_id'], 'game_code' => $user['gamecode_name'], 'game_step_id' => '2'
                ])->first();

            ////If resut already exist update result 
            if ($result_exist) {
                $ResultsTable->updateAll(['score' => $result_exist['score'] + $_POST['score_update']], ['user_id' => $result_exist['user_id'], 'user_type_id' => $result_exist['user_type_id'], 'game_code' => $result_exist['game_code'], 'game_step_id' => '2']);
            }
        }
        exit();
    }

    public function deletescoreStep2() //round 1 delete or undo given score from existing scores 13-July-2022
    {
        $user = $this->Auth->user();
        $this->set(compact("user"));
        $ResultsTable = TableRegistry::get('Results');

        if (isset($_POST['score_delete'])) {
            // check if result already exist with same user type, gamecode,phase_id,round_id
            $result_exist = $ResultsTable->find()
                ->where([
                    'user_id' => $user['id'], 'user_type_id' => $user['user_type_id'], 'game_code' => $user['gamecode_name'], 'game_step_id' => '2'
                ])->first();

            ////If resut already exist update result 
            if ($result_exist) {
                $ResultsTable->updateAll(['score' => $result_exist['score'] - $_POST['score_delete']], ['user_id' => $result_exist['user_id'], 'user_type_id' => $result_exist['user_type_id'], 'game_code' => $result_exist['game_code'], 'game_step_id' => '2']);
            }
        }
        exit();
    }

    public function redoscoreStep2() // add/ redo score into existing score   round 1
    {
        $user = $this->Auth->user();
        $this->set(compact("user"));
        $ResultsTable = TableRegistry::get('Results');

        if (isset($_POST['score_redo'])) {
            // check if result already exist with same user type, gamecode,phase_id,round_id
            $result_exist = $ResultsTable->find()
                ->where([
                    'user_id' => $user['id'], 'user_type_id' => $user['user_type_id'], 'game_code' => $user['gamecode_name'], 'game_step_id' => '2'
                ])->first();

            ////If resut already exist update result 
            if ($result_exist) {
                $ResultsTable->updateAll(['score' => $result_exist['score'] + $_POST['score_redo']], ['user_id' => $result_exist['user_id'], 'user_type_id' => $result_exist['user_type_id'], 'game_code' => $result_exist['game_code'], 'game_step_id' => '2']);
            }
        }
        exit();
    }

    public function deletescoreStep4() //delete or undo given score from existing scores   round2   7-13-22
    {
        // $this->autoRender = false;
        $user = $this->Auth->user();
        $this->set(compact("user"));
        $ResultsTable = TableRegistry::get('Results');

        if (isset($_POST['score_delete'])) {
            // check if result already exist with same user type, gamecode,phase_id,round_id
            $result_exist = $ResultsTable->find()
                ->where([
                    'user_id' => $user['id'],
                    'user_type_id' => $user['user_type_id'],
                    'game_code' => $user['gamecode_name'],
                    // 'phase_id' => '2', 'round_id' => '2'
                    'game_step_id' => '4'
                ])
                ->first();

            ////If resut already exist update result 
            if ($result_exist) {
                $ResultsTable->updateAll(['score' => $result_exist['score'] - $_POST['score_delete']], ['user_id' => $result_exist['user_id'], 'user_type_id' => $result_exist['user_type_id'], 'game_code' => $result_exist['game_code'], 'game_step_id' => '4']);
            }
        }
        exit();
    }

    public function redoscoreStep4() // add/ redo score into existing score   round 2
    {
        // $this->autoRender = false;
        $user = $this->Auth->user();
        $this->set(compact("user"));
        $ResultsTable = TableRegistry::get('Results');

        if (isset($_POST['score_redo'])) {
            // check if result already exist with same user type, gamecode,phase_id,round_id
            $result_exist = $ResultsTable->find()
                ->where([
                    'user_id' => $user['id'],
                    'user_type_id' => $user['user_type_id'],
                    'game_code' => $user['gamecode_name'],
                    // 'phase_id' => '2', 'round_id' => '2'
                    'game_step_id' => '4'
                ])
                ->first();

            ////If resut already exist update result 
            if ($result_exist) {
                $ResultsTable->updateAll(['score' => $result_exist['score'] + $_POST['score_redo']], ['user_id' => $result_exist['user_id'], 'user_type_id' => $result_exist['user_type_id'], 'game_code' => $result_exist['game_code'], 'game_step_id' => '4']);
            }
        }
        exit();
    }

    

    // public function getscoreStep2(){
    //     $user = $this->Auth->user();
    //     $this->set(compact("user"));
    //     $ResultsTable = TableRegistry::get('Results');
    //     $query = $ResultsTable->find('all')
    //     ->where(['user_id' => $user['id'],'user_type_id' => $user['user_type_id'], 'game_code' => $user['gamecode_name'],'game_step_id'=>'2']);
    //     $get_score = $query->toList();
    //     echo json_encode($get_score[0]['score']);
    //     exit();
    // }

    // public function topscoreStep2(){
    //     $user = $this->Auth->user();
    //     $this->set(compact("user"));
    //     $ResultsTable = TableRegistry::get('Results');
    //     $query = $ResultsTable->find()->select(['game_code', 'game_step_id','score'])
    //     ->limit(4)
    //     ->where(['game_code' => $user['gamecode_name'],'game_step_id'=>'2'])
    //     ->order(['score' => 'DESC']);
    //     $top_score = $query->toList();

    //     echo json_encode($top_score);
    //     exit();
    // }
    public function getscoreStep4()
    {
        $user = $this->Auth->user();
        $this->set(compact("user"));
        $ResultsTable = TableRegistry::get('Results');
        $query = $ResultsTable->find('all')
            ->where(['user_id' => $user['id'], 'user_type_id' => $user['user_type_id'], 'game_code' => $user['gamecode_name'], 'game_step_id' => '4']);
        $get_score = $query->toList();
        echo json_encode($get_score[0]['score']);
        exit();
    }

    public function topscoreStep4()
    {
        $user = $this->Auth->user();
        $this->set(compact("user"));
        $ResultsTable = TableRegistry::get('Results');
        $query = $ResultsTable->find()->select(['game_code', 'game_step_id', 'score'])
            ->limit(4)
            ->where(['game_code' => $user['gamecode_name'], 'game_step_id' => '4'])
            ->order(['score' => 'DESC']);
        $top_score = $query->toList();

        echo json_encode($top_score);
        exit();
    }

    public function round2phase1()
    {
        $this->viewBuilder()->layout('adminlayout');
        $user = $this->Auth->user();
        $this->set(compact("user"));

        // type of user type
        $UserTypesTable = TableRegistry::get('UserTypes');
        $query = $UserTypesTable->find('all')
            ->where(['id' => $user['user_type_id']]);
        $userType = $query->toList();
        $this->set(compact("userType"));

        // Get Job description and Project Info (All 4 user type project info & description must for phase 2 round 1)
        $JobDescriptionsTable = TableRegistry::get('JobDescriptions');
        $query3 = $JobDescriptionsTable->find('all')->contain(['UserTypes'])
            ->where(['round_id' => '2', 'phase_id' => '1'])
            ->order(['UserTypes.type_name' => 'ASC']);

        $JobDescriptions = $query3->toList();
        $this->set(compact("JobDescriptions"));

        // get all user types
        $UserTypes_allTable = TableRegistry::get('UserTypes');
        $query2 = $UserTypes_allTable->find('all');
        $userType_detail = $query2->toList();

        //Ready waiting  player for round 2 phase 1
        $LoginForMatchesTable = TableRegistry::get('LoginForMatches');
        if (!empty($userType_detail)) {
            foreach ($userType_detail as $key => $details) {
                $joineduserwithsamegamecode = $LoginForMatchesTable->find()->contain([
                    'Users.UserTypes'
                ])->select(['user_id', 'gamecode'])->where([
                    'Users.user_type_id' => $details['id'], 'gamecode' => $user['gamecode_name'],
                     'round_id' => '2', 'phase_id' => '1'
                ])->toArray();
                $userType_detail[$key]['joined_gamecode'] = $joineduserwithsamegamecode;
            }
        }
        $this->set(compact("userType_detail"));


        // Get LoginforMatches table
        // $LoginForMatchesTable = TableRegistry::get('LoginForMatches');
        // submit round 2 phase 1 result
        $ResultsTable = TableRegistry::get('Results');

        if (isset($_POST['canvas_image'])) { //go_tophase2roundtwo
            // print_r($_POST['canvas_image']);

            $resultDatadetails = $ResultsTable->newEntity();
            $resultDatadetails['user_id'] = $user['id'];
            $resultDatadetails['user_type_id'] = $user['user_type_id'];
            $resultDatadetails['game_code'] = $user['gamecode_name'];
            $resultDatadetails['round_id'] = '2';
            $resultDatadetails['phase_id'] = '1';
            $resultDatadetails['score'] = 0;
            $resultDatadetails['game_step_id'] = '3';
            $resultDatadetails['given_time'] = '03:00';
            $resultDatadetails['canvas_image'] = $_POST['canvas_image'];
            $resultDatadetails['date'] = date("Y-m-d");
            $resultDatadetails['status'] = 'In Process';

            // check if result already exist with same user type, gamecode,phase_id,round_id
            $result_exist = $ResultsTable->find()
                ->where([
                    'user_id' => $resultDatadetails['user_id'],
                    'user_type_id' => $resultDatadetails['user_type_id'],
                    'game_code' => $resultDatadetails['game_code'],
                    // 'round_id' => '2', 'phase_id' => '1',
                    'game_step_id' => '3'
                ])
                ->first();

            ////If resut already exist update result 
            if ($result_exist) {
                $ResultsTable->updateAll(['canvas_image' => $_POST['canvas_image'], 'status' => 'In Process'], ['user_id' => $resultDatadetails['user_id'], 'user_type_id' => $resultDatadetails['user_type_id'], 'game_code' => $resultDatadetails['game_code'], 'game_step_id' => '3']);
                //update status of loginformatches tables phase id 2 and round 2
                // $LoginForMatchesTable->updateAll(['round_id' => '2', 'phase_id' => '2', 'round_number' => '2', 'status' => 'In Progress', 'game_status' => '', 'start_time' => null], ['user_id' => $resultDatadetails['user_id'], 'gamecode' => $resultDatadetails['game_code']]);
            } else if ($result = $ResultsTable->save($resultDatadetails)) {
                //update status of loginformatches tables phase id 2 and round 2
                // $LoginForMatchesTable->updateAll(['round_id' => '2', 'phase_id' => '2', 'round_number' => '2', 'status' => 'In Progress', 'game_status' => '', 'start_time' => null], ['user_id' => $result['user_id'], 'gamecode' => $result['game_code']]);
                echo json_encode($result);
            } else {
                // return $this->redirect(['action' => 'round2phase1']);
                // $this->Flash->error(__('The result could not be saved. Please, try again.'));
            }
        }
        // exit();
    }

    public function updateloginformatchesr2p1(){ // update loginformatches table for round2 phase2 after round2 phase 1 end
// update loginformatches table for round2 phase2 after round2 phase 1 end
$user = $this->Auth->user();
$this->set(compact("user"));
$LoginForMatchesTable = TableRegistry::get('LoginForMatches');
 $LoginForMatchesTable->updateAll(['round_id' => '2', 'phase_id' => '2', 'round_number' => '2', 'status' => 'In Progress', 'game_status' => '', 'start_time' => null,'waiting_screen' => ''], ['user_id' => $user['id'], 'gamecode' => $user['gamecode_name'],'round_id' => '2', 'phase_id' => '1', 'round_number' => '2']);
exit();    

if (isset($_POST['r2p1_status'])) {
    // check if result already exist with same user type, gamecode,phase_id,round_id
    $LoginForMatchesTable = TableRegistry::get('LoginForMatches');

    $result_exist = $LoginForMatchesTable->find()
        ->where([
            'user_id' => $user['id'],
             'gamecode' => $user['gamecode_name'],
             'round_id' => '2', 'phase_id' => '1', 
             'round_number' => '2'
        ])
        ->first();

    ////If resut already exist update result 
    if ($result_exist) {
        $LoginForMatchesTable->updateAll(['round_id' => '2', 'phase_id' => '2', 'round_number' => '2', 'status' => $_POST['r2p1_status'], 'game_status' => '', 'start_time' => null,'waiting_screen' => ''],
         ['user_id' => $user['id'], 'gamecode' => $user['gamecode_name'],'round_id' => '2', 'phase_id' => '1', 'round_number' => '2']);
    }
}
}

// public function updateloginformatchesr2p2(){ // update loginformatches table staus(i.e completed) for round2 phase2 end
//     $user = $this->Auth->user();
//     $this->set(compact("user"));
//     $LoginForMatchesTable = TableRegistry::get('LoginForMatches');
//      $LoginForMatchesTable->updateAll(['status' =>'Completed', 'game_status' => '', 'start_time' => null,'waiting_screen' => ''], ['user_id' => $user['id'], 'gamecode' => $user['gamecode_name'],'round_id' => '2', 'phase_id' => '2', 'round_number' => '2']);
//     exit();    
//     }

    public function othercanvas()
    {
        // $this->autoRender = false;
        $user = $this->Auth->user();
        $this->set(compact("user"));
        if (isset($_POST['user_type_id'])) { //go_tophase2roundtwo
            //// Fecth other users canvas
            $ResultTable = TableRegistry::get('Results');
            $query6 = $ResultTable->find()
                ->where(['user_type_id !=' => $_POST['user_type_id'],
                  'game_step_id' => '3','game_code' => $user['gamecode_name']]);
            $other_user_canvas = $query6->toList();
            echo json_encode($other_user_canvas);
            // echo json_encode($other_user_canvas);
        }
        exit();
    }

    public function updatescoreStep4()
    {
        // $this->autoRender = false;
        $user = $this->Auth->user();
        $this->set(compact("user"));
        $ResultsTable = TableRegistry::get('Results');

        if (isset($_POST['score'])) {
            // check if result already exist with same user type, gamecode,phase_id,round_id
            $result_exist = $ResultsTable->find()
                ->where([
                    'user_id' => $user['id'],
                    'user_type_id' => $user['user_type_id'],
                    'game_code' => $user['gamecode_name'],
                    // 'phase_id' => '2', 'round_id' => '2'
                    'game_step_id' => '4'
                ])
                ->first();

            ////If resut already exist update result 
            if ($result_exist) {
                $ResultsTable->updateAll(['score' => $result_exist['score'] + $_POST['score']], ['user_id' => $result_exist['user_id'], 'user_type_id' => $result_exist['user_type_id'], 'game_code' => $result_exist['game_code'], 'game_step_id' => '4']);
            }
        }
        exit();
    }


    public function othercanvas2()
    {
        $user = $this->Auth->user();
        $this->set(compact("user"));
        if (isset($_POST['user_type_id'])) { //go_tophase2roundtwo
            //// Fecth other users canvas
            $ResultTable = TableRegistry::get('Results');
            $query6 = $ResultTable->find()
                ->where(['user_type_id !=' => $user['user_type_id'], 'game_code' => $user['gamecode_name'], 'game_step_id' => '4']);
            $other_user_canvas = $query6->toList();
            echo json_encode($other_user_canvas);
            // echo json_encode($other_user_canvas);
        }
        exit();
    }

    public function round2phase2()
    {
        $this->viewBuilder()->layout('adminlayout');
        $user = $this->Auth->user();
        $this->set(compact("user"));

        // type of user
        $UserTypesTable = TableRegistry::get('UserTypes');
        $query = $UserTypesTable->find('all')
            ->where(['id' => $user['user_type_id']]);
        $userType = $query->toList();
        $this->set(compact("userType"));

        // Get Job description and Project Info (All 4 user type project info & description must for phase 2 round 1)
        $JobDescriptionsTable = TableRegistry::get('JobDescriptions');
        $query3 = $JobDescriptionsTable->find('all')->contain(['UserTypes'])
            // ->where(['user_type_id' => $user['user_type_id']])
            ->where(['round_id' => '2', 'phase_id' => '2'])
            ->order(['UserTypes.type_name' => 'ASC']);
        $JobDescriptions = $query3->toList();
        $this->set(compact("JobDescriptions"));

        // get time of game
        $OnlineGamesTable = TableRegistry::get('OnlineGames');
        $query = $OnlineGamesTable->find('all')
            ->where(['game_name' => $user['gamecode_name']]);
        $OnlineGames = $query->toList();
        $this->set(compact("OnlineGames"));

        // get all user types
        $UserTypes_allTable = TableRegistry::get('UserTypes');
        $query2 = $UserTypes_allTable->find('all');
        $userType_detail = $query2->toList();

        //Ready waiting  player for round 2 phase 2
        $LoginForMatchesTable = TableRegistry::get('LoginForMatches');
        if (!empty($userType_detail)) {
            foreach ($userType_detail as $key => $details) {
                $joineduserwithsamegamecode = $LoginForMatchesTable->find()->contain([
                    'Users.UserTypes'
                ])->select(['user_id', 'gamecode'])
                    ->where([
                        'Users.user_type_id' => $details['id'],
                        'gamecode' => $user['gamecode_name'], 'round_id' => '2', 'phase_id' => '2',
                        'status' => 'In Progress'
                    ])->toArray();
                $userType_detail[$key]['joined_gamecode'] = $joineduserwithsamegamecode;
            }
        }
        $this->set(compact("userType_detail"));

        // Get LoginforMatches table
        $LoginForMatchesTable = TableRegistry::get('LoginForMatches');

        // get cutouts for logged in user type
        $ShapeGroups = TableRegistry::get('ShapeGroups');
        $query2 = $ShapeGroups->find('all')
            ->where(['user_type_id' => $user['user_type_id']]);
        $shape_group = $query2->toList();

        $ShapesTable = TableRegistry::get('Shapes');
        if (!empty($shape_group)) {
            foreach ($shape_group as $key => $details) {
                $getimages = $ShapesTable->find()->contain([
                    'ShapeGroups', 'UserTypes'
                ])->select(['id', 'ShapeGroups.user_type_id', 'shape_group_id', 'shape_image', 'width', 'height', 'shape_name', 'score', 'score_round2'])->where(['ShapeGroups.user_type_id' => $details['user_type_id'], 'shape_group_id' => $details['id']])->toArray();
                $shape_group[$key]['ShapeGroupName'] = $getimages;
            }
        }
        $this->set(compact("shape_group"));

        //Get result table for canvas image preview
        $ResultsTable = TableRegistry::get('Results');
        //         $query4 = $ResultsTable->find()
        //             ->where(['user_type_id' => $user['user_type_id'], 'game_code' => $user['gamecode_name'], 'game_step_id' => '3', 'status' => 'Completed']);
        // // ->where(['user_type_id' => '4', 'game_code' => $user['gamecode_name'], 'game_step_id' => '3', 'status' => 'Completed']);
        //             $p2_r1_result = $query4->toList();
        //         $this->set(compact("p2_r1_result")); // edited 5-7-2022
        $ResultTable = TableRegistry::get('Results');
        $query5 = $ResultTable->find()
            ->where(['user_type_id' => '3', 'game_step_id' => '3', 'game_code' => $user['gamecode_name']]); //,'status' =>'Completed'
        $r2_p1_Architect_result = $query5->toList();
        $this->set(compact("r2_p1_Architect_result"));

        ////Get Canvas image of Carpenter
        $query6 = $ResultTable->find()
            ->where(['user_type_id' => '2', 'game_step_id' => '3', 'game_code' => $user['gamecode_name']]); //,'status' =>'Completed'
        $r2_p1_Carpenter_result = $query6->toList();
        $this->set(compact("r2_p1_Carpenter_result"));

        ////Get Canvas image of Gardener
        $query7 = $ResultTable->find()
            ->where(['user_type_id' => '1', 'game_step_id' => '3', 'game_code' => $user['gamecode_name']]); //,'status' =>'Completed'
        $r2_p1_Gardener_result = $query7->toList();
        $this->set(compact("r2_p1_Gardener_result"));

        ////Get Canvas image of Designer
        $query8 = $ResultTable->find()
            ->where(['user_type_id' => '4', 'game_step_id' => '3', 'game_code' => $user['gamecode_name']]); //,'status' =>'Completed'
        $r2_p1_Designer_result = $query8->toList();
        $this->set(compact("r2_p1_Designer_result"));


        // submit Phase 2 round 2 result
        if (isset($_POST['canvas_image'])) { // submit_phase2roundtwo
            $resultDatadetails = $ResultsTable->newEntity();
            $resultDatadetails['user_id'] = $user['id'];
            $resultDatadetails['user_type_id'] = $user['user_type_id'];
            $resultDatadetails['game_code'] = $user['gamecode_name'];
            $resultDatadetails['phase_id'] = '2';
            $resultDatadetails['round_id'] = '2';
            $resultDatadetails['game_step_id'] = '4';
            $resultDatadetails['score'] = 0;
            $resultDatadetails['given_time'] = '03:00';
            $resultDatadetails['canvas_image'] = $_POST['canvas_image'];
            $resultDatadetails['date'] = date("Y-m-d");
            $resultDatadetails['status'] = 'In Progress';

            // check if result already exist with same user type, gamecode,phase_id,round_id
            $result_exist = $ResultsTable->find()
                ->where([
                    'user_id' => $resultDatadetails['user_id'],
                    'user_type_id' => $resultDatadetails['user_type_id'],
                    'game_code' => $resultDatadetails['game_code'],
                    // 'phase_id' => '2', 'round_id' => '2'
                    'game_step_id' => '4'
                ])
                ->first();

            ////If resut already exist update result 
            if ($result_exist) {
                $ResultsTable->updateAll(['canvas_image' => $_POST['canvas_image'], 'score' => $result_exist['score'] + $_POST['score'], 'status' => 'Completed', 'modified' => date('Y-m-d h:i:s')], ['user_id' => $resultDatadetails['user_id'], 'user_type_id' => $resultDatadetails['user_type_id'], 'game_code' => $resultDatadetails['game_code'], 'game_step_id' => '4']);
                // $LoginForMatchesTable->updateAll(['round_id' => '2', 'phase_id' => '2', 'round_number' => '2', 'status' => 'Completed', 'game_status' => '', 'start_time' => null,'waiting_screen'=>null], ['user_id' => $resultDatadetails['user_id'], 'gamecode' => $resultDatadetails['game_code']]);
                $LoginForMatchesTable->updateAll(['round_id' => '2', 'phase_id' => '2', 'round_number' => '2', 'status' => 'Completed', 'game_status' => '','waiting_screen'=>null], ['user_id' => $resultDatadetails['user_id'], 'gamecode' => $resultDatadetails['game_code']]);

                // $this->Flash->success(__('The result has been updated.'));
                // return $this->redirect(['action' => 'login']);
            } else if ($result = $ResultsTable->save($resultDatadetails)) {
                // $LoginForMatchesTable->updateAll(['round_id' => '2', 'phase_id' => '2', 'round_number' => '2', 'status' => 'Completed', 'game_status' => '', 'start_time' => null,'waiting_screen'=>null], ['user_id' => $result['user_id'], 'gamecode' => $result['game_code']]);
                $LoginForMatchesTable->updateAll(['round_id' => '2', 'phase_id' => '2', 'round_number' => '2', 'status' => 'Completed', 'game_status' => '','waiting_screen'=>null], ['user_id' => $result['user_id'], 'gamecode' => $result['game_code']]);
               } else {
                return $this->redirect(['action' => 'login']);
                //$this->Flash->error(__('The result could not be saved. Please, try again.'));
            }
        }
    }

    

    public function beforeFilter(Event $event)
    {
        // $this->Auth->allow(['lastvideo']);
        //$this->Auth->allow(['video']);
        //$this->Auth->allow(['startgameround1']);
        $this->Auth->allow(['round1phase1']);
        // $this->Auth->allow(['instruction']);
        $this->Auth->allow(['instruction2']);
        $this->Auth->allow(['jobdescround1']);
        //$this->Auth->allow(['surveyquestion']);
        $this->Auth->allow(['summary']);
        // $this->Auth->allow(['waiting']);
        $this->Auth->allow(['outputround1']);
        $this->Auth->allow(['outputround2']);
        // $this->Auth->allow(['waiting2']);
        // $this->Auth->allow(['waiting3']);
        // $this->Auth->allow(['waiting4']);
        //$this->Auth->allow(['videolink']);
        $this->Auth->allow(['jobdescround4']);
        // $this->Auth->allow(['video4']);
        $this->Auth->allow(['round2p1started']);
        $this->Auth->allow(['beforeoutput1']);
        $this->Auth->allow(['register']);
        $this->Auth->allow(['selectrole']);
        $this->Auth->allow(['fetchRole']);

        $this->Auth->allow(['r2p1updateTime']);
        $this->Auth->allow(['r2p2updateTime']);

        $this->Auth->allow(['updatecanvasR2p1']);
        $this->Auth->allow(['updatecanvasR2p2']);

        $this->Auth->allow(['fetchTimeR2p1']);
        $this->Auth->allow(['fetchTimeR2p2']);

        $this->Auth->allow(['updateloginformatchesr2p1']);
        $this->Auth->allow(['updateloginformatchesr2p2']);


        $this->Auth->allow(['timedifferenceR2p1']);
        $this->Auth->allow(['timedifferenceR2p2']);

        $this->Auth->allow(['dragdrop']);
        $this->Auth->allow(['checkuserrole']);

    }

    public function checkuserrole() //6-23-2022 check if role already selected, append dropdown and text field selectrole
    {
        if (isset($_POST['user_type_id'])) {
            $usersTable = TableRegistry::get('Users');
            $query= $usersTable->find()
                ->where(['user_type_id' => $_POST['user_type_id'],
                  'gamecode_name' => $_POST['gamecode_name']]);
            $check_post_role = $query->toList();
            echo json_encode($check_post_role);
        }
        exit();
    }

    public function dragdrop() // demo to check images drop and drop
{
    $this->viewBuilder()->layout('adminlayout');
    $user = $this->Auth->user();
    $this->set(compact("user"));
}

    public function beforeoutput1()
    {
        $this->viewBuilder()->layout('adminlayout');
        $user = $this->Auth->user();
        $this->set(compact("user"));

        // get logged in users user type
        $UserTypesTable = TableRegistry::get('UserTypes');
        $query = $UserTypesTable->find('all')
            ->where(['id' => $user['user_type_id']]);
        $userType = $query->toList();
        $this->set(compact("userType"));

        // get all user types
        $UserTypes_allTable = TableRegistry::get('UserTypes');
        $query2 = $UserTypes_allTable->find('all')
            ->order(['type_name' => 'ASC']);
        $userType_detail = $query2->toList();

        $LoginForMatchesTable = TableRegistry::get('LoginForMatches');
        if (!empty($userType_detail)) {
            foreach ($userType_detail as $key => $details) {
                $joineduserwithsamegamecode = $LoginForMatchesTable->find()->contain([
                    'Users.UserTypes'
                ])->select(['user_id', 'gamecode'])
                    ->where([
                        'Users.user_type_id' => $details['id'],
                        'gamecode' => $user['gamecode_name'],
                        'round_id' => '2', 'phase_id' => '1', 'round_number' => '2', 'status' => 'In Progress'
                    ])->toArray();
                $userType_detail[$key]['joined_gamecode'] = $joineduserwithsamegamecode;
            }
        }
        $this->set(compact("userType_detail"));
    }

    public function checkr1p2done()
    {
        $user = $this->Auth->user();
        $this->set(compact("user"));
        // count game code        
        $LoginForMatchesTable = TableRegistry::get('LoginForMatches');
        $countgamecode = $LoginForMatchesTable->find('all', [
            'conditions' => ['gamecode' => $user['gamecode_name']]
        ])
            ->where(['round_id' => '2', 'phase_id' => '1', 'round_number' => '2', 'status' => 'In Progress']);
        $totaldone = $countgamecode->count();
        echo json_encode($totaldone);
        exit();
        // $this->set(compact("totalgamecode"));
    }

   

    public function summary()
    {
        $this->viewBuilder()->layout('adminlayout');
        $user = $this->Auth->user();
        $this->set(compact("user"));
    }

    public function logout()
    {
        $user = $this->Auth->user();
        $this->set(compact("user"));

        // It will delete login record and all reselts on logout
        $connection = ConnectionManager::get('default');
        $connection->execute('DELETE FROM login_for_matches WHERE user_id =' . $user['id']);
        $connection->execute('DELETE FROM results WHERE user_id =' . $user['id']);

        // update tern if admin logout
        $OnlineGamesTable = TableRegistry::get('OnlineGames');
        if ($user['user_type_id'] == '3') {
            $OnlineGamesTable->updateAll(['players_turn' => '3'], ['game_name' => $user['gamecode_name']]);
        }

        //echo 'you are logout';
        $this->Flash->error('you are logged out');
        return $this->redirect($this->Auth->logout());
    }

    public function getr1p1playerStatus()
    { // Get ready player for round 1 phase 1
        $user = $this->Auth->user();
        $this->set(compact("user"));

        $LoginForMatchesTable = TableRegistry::get('LoginForMatches');
        $countgamecode = $LoginForMatchesTable->find('all', [
            'conditions' => ['gamecode' => $user['gamecode_name']]
        ])
            ->where(['round_id' => '1', 'phase_id' => '1', 'round_number' => '1', 'status' => 'In Progress']);
        $totalgamecode = $countgamecode->count();
        echo json_encode($totalgamecode);
        // $this->set(compact("totalgamecode"));
        exit();
    }
    public function getr1p2playerStatus()
    { // Get ready player for round 1 phase 2
        $user = $this->Auth->user();
        $this->set(compact("user"));

        $LoginForMatchesTable = TableRegistry::get('LoginForMatches');
        $countgamecode = $LoginForMatchesTable->find('all', [
            'conditions' => ['gamecode' => $user['gamecode_name']]
        ])
            ->where(['round_id' => '1', 'phase_id' => '2', 'round_number' => '1', 'status' => 'In Progress']);
        $totalgamecode = $countgamecode->count();
        echo json_encode($totalgamecode);
        // $this->set(compact("totalgamecode"));
        exit();
    }
    public function getr2p1playerStatus()
    { // Get ready player for round 2 phase 1
        $user = $this->Auth->user();
        $this->set(compact("user"));

        $LoginForMatchesTable = TableRegistry::get('LoginForMatches');
        $countgamecode = $LoginForMatchesTable->find('all', [
            'conditions' => ['gamecode' => $user['gamecode_name']]
        ])
            ->where(['round_id' => '2', 'phase_id' => '1', 'round_number' => '2', 'status' => 'In Progress']);
        $totalgamecode = $countgamecode->count();
        echo json_encode($totalgamecode);
        // $this->set(compact("totalgamecode"));
        exit();
    }

    public function getr2p2playerStatus()
    {
        $user = $this->Auth->user();
        $this->set(compact("user"));

        $LoginForMatchesTable = TableRegistry::get('LoginForMatches');
        $countgamecode = $LoginForMatchesTable->find('all', [
            'conditions' => ['gamecode' => $user['gamecode_name']]
        ])
            ->where(['round_id' => '2', 'phase_id' => '2', 'round_number' => '2']);
        $totalgamecode = $countgamecode->count();
        echo json_encode($totalgamecode);
        // $this->set(compact("totalgamecode"));
        exit();
    }

    public function round1p1started()  // round 1 phase 1 get game status
    {
        $user = $this->Auth->user();
        $this->set(compact("user"));

        $LoginForMatchesTable = TableRegistry::get('LoginForMatches');
        $gamestatus = $LoginForMatchesTable->find('all', [
            'conditions' => ['gamecode' => $user['gamecode_name']]
        ])
            ->where(['round_id' => '1', 'phase_id' => '1', 'round_number' => '1', 'status' => 'In Progress', 'game_status' => 'Started']);
        $round2p1gamestatus = $gamestatus->count(); // cound game status for round1 phase1
        echo json_encode($round2p1gamestatus);
        // $this->set(compact("totalgamecode"));
        exit();
    }
    public function updater1p1gamestatus()
    {
        $user = $this->Auth->user();
        $this->set(compact("user"));

        $LoginForMatchesTable = TableRegistry::get('LoginForMatches');

        if (isset($_POST['game_status'])) {
            $LoginForMatchesTable->updateAll(['game_status' => $_POST['game_status']], ['round_id' => '1', 'phase_id' => '1', 'round_number' => '1','gamecode' => $user['gamecode_name'], 'status' => 'In Progress']);
        }
        exit();
    }

    public function round1p2started()  // round 1 phase 1 get game status
    {
        $user = $this->Auth->user();
        $this->set(compact("user"));

        $LoginForMatchesTable = TableRegistry::get('LoginForMatches');
        $gamestatus = $LoginForMatchesTable->find('all', [
            'conditions' => ['gamecode' => $user['gamecode_name']]
        ])
            ->where(['round_id' => '1', 'phase_id' => '2', 'round_number' => '1', 'status' => 'In Progress', 'game_status' => 'Started']);
        $round2p1gamestatus = $gamestatus->count(); // cound game status for round1 phase1
        echo json_encode($round2p1gamestatus);
        // $this->set(compact("totalgamecode"));
        exit();
    }
    public function updater1p2gamestatus()
    {
        $user = $this->Auth->user();
        $this->set(compact("user"));

        $LoginForMatchesTable = TableRegistry::get('LoginForMatches');

        if (isset($_POST['game_status'])) {
            $LoginForMatchesTable->updateAll(['game_status' => $_POST['game_status']], ['round_id' => '1', 'phase_id' => '2', 'round_number' => '1','gamecode' => $user['gamecode_name'], 'status' => 'In Progress']);
        }
        exit();
    }

    public function round2p1started()
    {
        $user = $this->Auth->user();
        $this->set(compact("user"));

        $LoginForMatchesTable = TableRegistry::get('LoginForMatches');
        $gamestatus = $LoginForMatchesTable->find('all', [
            'conditions' => ['gamecode' => $user['gamecode_name']]
        ])
        ->where(['round_id' => '2', 'phase_id' => '1', 'round_number' => '2','gamecode' => $user['gamecode_name'], 'game_status' => 'Started']);
        $round2p1gamestatus = $gamestatus->count(); // cound game status for round1 phase1
        echo json_encode($round2p1gamestatus);
        // $this->set(compact("totalgamecode"));
        exit();
    }
    public function updater2p1gamestatus()
    {
        $user = $this->Auth->user();
        $this->set(compact("user"));
        $LoginForMatchesTable = TableRegistry::get('LoginForMatches');

        if (isset($_POST['game_status'])) {
            // $logintable = $LoginForMatchesTable->find();
            $LoginForMatchesTable->updateAll(['game_status' => $_POST['game_status']], ['round_id' => '2', 'phase_id' => '1', 'round_number' => '2','gamecode' => $user['gamecode_name']]);
        }
        exit();
    }

    public function round2p2started()
    {
        $user = $this->Auth->user();
        $this->set(compact("user"));

        $LoginForMatchesTable = TableRegistry::get('LoginForMatches');
        $gamestatus = $LoginForMatchesTable->find('all', [
            'conditions' => ['gamecode' => $user['gamecode_name']]
        ])
            ->where(['round_id' => '2', 'phase_id' => '2', 'round_number' => '2','gamecode' => $user['gamecode_name'], 'game_status' => 'Started']);
        $round2p1gamestatus = $gamestatus->count(); // cound game status for round1 phase1
        echo json_encode($round2p1gamestatus);
        // $this->set(compact("totalgamecode"));
        exit();
    }
    public function updater2p2gamestatus()
    {
        $user = $this->Auth->user();
        $this->set(compact("user"));
        $LoginForMatchesTable = TableRegistry::get('LoginForMatches');

        if (isset($_POST['game_status'])) {
            // $logintable = $LoginForMatchesTable->find();
            $LoginForMatchesTable->updateAll(['game_status' => $_POST['game_status']], ['round_id' => '2', 'phase_id' => '2', 'round_number' => '2','gamecode' => $user['gamecode_name']]);
        }
        exit();
    }


    public function login()
    {
        $this->viewBuilder()->layout('adminlayout');

        if ($this->request->is(['post'])) {
            $user = $this->Users->find()
                ->where(['email' => $_POST['email']])
                ->where(['role_id' => '2'])
                ->first();

            // check game code
            $gamecode = TableRegistry::get('OnlineGames');
            $gamecode = $gamecode->find()
                ->where(['game_name' => $_POST['password']])
                ->first();
            
            if (!$user) {
                $this->Flash->success(__('User not found !'));
                return $this->redirect(['controller' => 'users', 'action' => 'register']);
            } elseif (!$gamecode) {
                $this->Flash->success(__('Wrong or Invalid gamecode!'));
                return $this->redirect(['controller' => 'users', 'action' => 'login']);
            }
            elseif (empty($user['user_type_id'])){ // check if user_type_id/ or player role not assigned

         $this->Auth->setUser($user);
         $this->Flash->success(__('Player role not found !'));
         return $this->redirect(['controller' => 'users', 'action' => 'selectrole']);
    

}
            else {
                //Get gamecode if from online_games table
                $OnlineGamesTable = TableRegistry::get('OnlineGames');
                $query = $OnlineGamesTable->find('all')
                    ->where(['game_name' => $this->request->data['password']]);
                $OnlineGames = $query->toList();
                $this->set(compact("OnlineGames"));

                //update gamecode as password and loggedin
                $user->password = $this->request->data['password'];
                $user->gamecode_name = $this->request->data['password'];
                if ($this->Users->save($user)) {
                    $user = $this->Auth->identify();
                    if ($user['role_id'] == 2) {
                        $this->Auth->setUser($user);

                        // update players turn if logged in user is architect
                        if ($user['user_type_id'] == 3) {
                            $OnlineGamesTable->updateAll(['players_turn' => '3'], ['game_name' => $this->request->data['password']]);
                        }
                        // check if gamecode already exist with same user type
                        $LoginForMatchesTable = TableRegistry::get('LoginForMatches');
                        $gamecode_exitwithsameuser = $LoginForMatchesTable->find()
                            ->contain(['Users'])
                            ->where(['Users.user_type_id' => $user['user_type_id']])
                            ->where(['gamecode' => $_POST['password']])
                            ->first();

                        if ($gamecode_exitwithsameuser) {
                            $LoginForMatchesTable->updateAll(['round_id' => '1', 'phase_id' => '1', 'round_number' => '1', 'status' => 'In Progress','game_status' => '', 'start_time' => null,'waiting_screen' =>''], ['user_id' => $user['id']]);
                            $this->Flash->success(__('Login details updated.'));
                            return $this->redirect(['controller' => 'users', 'action' => 'video']);
                        }
                        // count game code        
                        $countgamecode = $LoginForMatchesTable->find('all', [
                            'conditions' => ['gamecode' => $_POST['password']]
                        ])
                            ->where(['round_id' => '1', 'phase_id' => '1']);
                        $totalgamecode = $countgamecode->count();
                        $this->set(compact("totalgamecode"));
                        if ($totalgamecode == 4) {
                            $this->Flash->success(__('Already 4 players exist.'));
                            return $this->redirect(['controller' => 'users', 'action' => 'login']);
                        } else {
                            // save logged in user detail in LoginForMatches table // new usertype with new gamecode
                            $loginForMatch = $LoginForMatchesTable->newEntity();
                            $loginForMatch->user_id = $user['id'];
                            $loginForMatch->online_game_id = $OnlineGames[0]['id'];
                            $loginForMatch->gamecode = $OnlineGames[0]['game_name'];
                            $loginForMatch->round_number = "1";
                            $loginForMatch->round_id = "1";
                            $loginForMatch->phase_id = "1";
                            $loginForMatch->status = "In Progress";
                            
                            if ($LoginForMatchesTable->save($loginForMatch)) {
                                return $this->redirect(['controller' => 'users', 'action' => 'video']);
                            }
                        }
                    }
                }
            }
        }
    }
    
    public function register()
    {
        $this->viewBuilder()->layout('adminlayout');

        if ($this->request->is(['post'])) {
            $user = $this->Users->find()
                ->where(['email' => $_POST['email']])
                ->first();

                // check game code
            $gamecode = TableRegistry::get('OnlineGames');
            $gamecode = $gamecode->find()
                ->where(['game_name' => $_POST['gamecode_name']])
                ->first();

                 // count game code        
             $countgamecode = $this->Users->find('all', [
                'conditions' => ['gamecode_name' => $_POST['gamecode_name']]
            ])
                ->where(['user_type_id IS NOT NULL']);
            $totalgamecode = $countgamecode->count();
            $this->set(compact("totalgamecode"));

            if ($user) {
                $this->Flash->success(__('Email already exist !'));
                return $this->redirect(['controller' => 'users', 'action' => 'login']);
            } elseif (!$gamecode) {
                $this->Flash->success(__('Wrong or Invalid gamecode!'));
                return $this->redirect(['controller' => 'users', 'action' => 'register']);
            }
            
            elseif ($totalgamecode >= 4) {
                $this->Flash->success(__('Already 4 players registered with this Game code.'));
                return $this->redirect(['controller' => 'users', 'action' => 'login']);
            }
            
            else {
                $user = $this->Users->newEntity();
                $user['role_id'] = '2';
                $user['password'] = $_POST['gamecode_name'];

                $user = $this->Users->patchEntity($user, $this->request->data);
                if ($user = $this->Users->save($user)) {
                        if ($user) {
                            $this->Auth->setUser($user);
                            return $this->redirect(['action' => 'selectrole']);
                        }
                } else {
                    $this->Flash->error('You are not registerd.');
                }
            }
            $this->set(compact('user'));
            $this->set('_serialize', ['user']);
        }
    }
   
    public function selectrole()
    {

        $user = $this->Auth->user();
        $this->set(compact("user"));
        $this->viewBuilder()->layout('adminlayout');

        if ($this->request->is(['post'])) {
            $role_exist = $this->Users->find()
            ->where([
                'user_type_id' => $_POST['user_type_id'], 'gamecode_name' => $_POST['gamecode_name'],
            ])->first();

            if($_POST['user_type_id'] == ""){
                $this->Flash->error('Please select role.');
                return $this->redirect(['controller' => 'users', 'action' => 'selectrole']);
            }
            else if ($role_exist) {
                $this->Flash->error('Role already exist. Please select another role.');
                return $this->redirect(['controller' => 'users', 'action' => 'selectrole']);
            }
            else{
            $this->Users->updateAll(['user_type_id' => $_POST['user_type_id'], 'gamecode_name' => $_POST['gamecode_name']], ['email' => $_POST['email']]);
            // update players turn if logged in user is architect
            //  if ($_POST['user_type_id'] == 3) {
                $OnlineGamesTable = TableRegistry::get('OnlineGames');
                $OnlineGamesTable->updateAll(['players_turn' => '3'], ['game_name' =>  $_POST['gamecode_name']]);
            // }
            $user = $this->Auth->identify();
            if ($user['role_id'] == 2) {
                $this->Auth->setUser($user);

                //Get gamecode id from online_games table
                $query = $OnlineGamesTable->find('all')
                    ->where(['game_name' => $_POST['gamecode_name']]);
                $OnlineGames = $query->toList();
                $this->set(compact("OnlineGames"));

                 // save logged in user detail in LoginForMatches table
                 $LoginForMatchesTable = TableRegistry::get('LoginForMatches');
                 $loginForMatch = $LoginForMatchesTable->newEntity();
                 $loginForMatch->user_id = $user['id'];
                 $loginForMatch->online_game_id = $OnlineGames[0]['id'];
                 $loginForMatch->gamecode = $_POST['gamecode_name'];
                 $loginForMatch->round_number = "1";
                 $loginForMatch->round_id = "1";
                 $loginForMatch->phase_id = "1";
                 $loginForMatch->status = "In Progress";
                 
                 if ($LoginForMatchesTable->save($loginForMatch)) {
                     return $this->redirect(['controller' => 'users', 'action' => 'video']);
                 }
            }
        }
        }
    }

    public function fetchRole() // get gamecode from inputfield and fetch user type into dropdown
    {
        $UserTypes_allTable = TableRegistry::get('UserTypes');
        $query2 = $UserTypes_allTable->find('all')
            ->order(['type_name' => 'ASC']);
        $userType_detail = $query2->toList();

        if (isset($_POST['gamecode_name'])) {
            $LoginForMatchesTable = TableRegistry::get('Users');
            if (!empty($userType_detail)) {
                foreach ($userType_detail as $key => $details) {
                    $check_exist_role = $LoginForMatchesTable->find()->contain([
                        'UserTypes'
                    ])->select(['user_type_id', 'gamecode_name'])
                        ->where([
                            'user_type_id' => $details['id'],
                            'gamecode_name' =>  $_POST['gamecode_name']
                        ])->count();
                    $userType_detail[$key]['check_usertype'] = $check_exist_role;
                }
            }
            // $this->set(compact("userType_detail"));
            echo json_encode($userType_detail);
            exit();
        }
    }

    // Other pages start
    public function lastvideo()
    {
        $this->viewBuilder()->layout('adminlayout');
        $user = $this->Auth->user();
        $this->set(compact("user"));

        $userid = $user['role_id'];
        // print_r($userid);
        if ($userid == 1) {
            return $this->redirect(['action' => 'login']);
        }
    }

    public function video()
    {
        $this->viewBuilder()->layout('adminlayout');
        $user = $this->Auth->user();
        $this->set(compact("user"));
        $userid = $user['role_id'];
        // print_r($userid);
        if ($userid == 1) {
            return $this->redirect(['action' => 'login']);
        }
    }

    public function round1phase2video()
    {
        $this->viewBuilder()->layout('adminlayout');
        $user = $this->Auth->user();
        $this->set(compact("user"));
    }

    public function tutorialround2()
    {
        $this->viewBuilder()->layout('adminlayout');
        $user = $this->Auth->user();
        $this->set(compact("user"));
    }

    public function demo()
    {
        $this->viewBuilder()->layout('adminlayout');
    }

    public function dummy()
    {
        $this->viewBuilder()->layout('adminlayout');
    }

    public function jobdescround1()
    {
        $this->viewBuilder()->layout('adminlayout');
        $user = $this->Auth->user();
        $this->set(compact("user"));

        // type of user
        $UserTypesTable = TableRegistry::get('UserTypes');
        $query = $UserTypesTable->find('all')
            ->where(['id' => $user['user_type_id']]);
        $userType = $query->toList();
        $this->set(compact("userType"));
        // Get Job description and Project Info
        $JobDescriptionsTable = TableRegistry::get('JobDescriptions');
        $query3 = $JobDescriptionsTable->find('all')
            ->where(['user_type_id' => $user['user_type_id']])
            ->where(['round_id' => '1', 'phase_id' => '1']);
        $JobDescriptions = $query3->toList();
        $this->set(compact("JobDescriptions"));
    }

    public function jobdescround1p2()
    {
        $this->viewBuilder()->layout('adminlayout');
        $user = $this->Auth->user();
        $this->set(compact("user"));

        // type of user
        $UserTypesTable = TableRegistry::get('UserTypes');
        $query = $UserTypesTable->find('all')
            ->where(['id' => $user['user_type_id']]);
        $userType = $query->toList();
        $this->set(compact("userType"));
        // Get Job description and Project Info
        $JobDescriptionsTable = TableRegistry::get('JobDescriptions');
        $query3 = $JobDescriptionsTable->find('all')
            ->where(['user_type_id' => $user['user_type_id']])
            ->where(['round_id' => '1', 'phase_id' => '2']);
        $JobDescriptions = $query3->toList();
        $this->set(compact("JobDescriptions"));
    }

    public function jobdescround2()
    {
        $this->viewBuilder()->layout('adminlayout');
        $user = $this->Auth->user();
        $this->set(compact("user"));

        // type of user
        $UserTypesTable = TableRegistry::get('UserTypes');
        $query = $UserTypesTable->find('all')
            ->where(['id' => $user['user_type_id']]);
        $userType = $query->toList();
        $this->set(compact("userType"));
        // Get Job description and Project Info
        $JobDescriptionsTable = TableRegistry::get('JobDescriptions');
        $query3 = $JobDescriptionsTable->find('all')
            ->where(['user_type_id' => $user['user_type_id']])
            ->where(['round_id' => '2', 'phase_id' => '1']);
        $JobDescriptions = $query3->toList();
        $this->set(compact("JobDescriptions"));

        // Get Job description and Project Info (All 4 user type project info & description must for round2 phase1)
        // $JobDescriptionsTable = TableRegistry::get('JobDescriptions');
        $query4 = $JobDescriptionsTable->find('all')->contain(['UserTypes'])
            // ->where(['user_type_id' => $user['user_type_id']])
            ->where(['round_id' => '2', 'phase_id' => '1'])
            ->order(['UserTypes.type_name' => 'ASC']);
        $allJobDescriptions = $query4->toList();
        $this->set(compact("allJobDescriptions"));
    }

    public function jobdescround4()
    {
        $this->viewBuilder()->layout('adminlayout');
        $user = $this->Auth->user();
        $this->set(compact("user"));

        // type of user
        $UserTypesTable = TableRegistry::get('UserTypes');
        $query = $UserTypesTable->find('all')
            ->where(['id' => $user['user_type_id']]);
        $userType = $query->toList();
        $this->set(compact("userType"));
        // Get Job description and Project Info
        $JobDescriptionsTable = TableRegistry::get('JobDescriptions');
        $query3 = $JobDescriptionsTable->find('all')
            ->where(['user_type_id' => $user['user_type_id']])
            ->where(['round_id' => '2', 'phase_id' => '2']);
        $JobDescriptions = $query3->toList();
        $this->set(compact("JobDescriptions"));
    }

    public function instruction()
    {
        $this->viewBuilder()->layout('adminlayout');
        $user = $this->Auth->user();
        $this->set(compact("user"));
        $userid = $user['role_id'];
        // print_r($userid);
        if ($userid == 1) {
            return $this->redirect(['action' => 'login']);
        }
    }

    public function instruction2()
    {
        $this->viewBuilder()->layout('adminlayout');
        $user = $this->Auth->user();
        $this->set(compact("user"));
    }


    public function updatewaitingscreenr1p1()
    {
        $user = $this->Auth->user();
        $this->set(compact("user"));
        $LoginForMatchesTable = TableRegistry::get('LoginForMatches');

        if (isset($_POST['waiting_screen'])) {
            // check if  already exist with same user type, gamecode,phase_id,round_id
            $userdata_exist = $LoginForMatchesTable->find()
                ->where([
                    'user_id' => $user['id'], 'gamecode' => $user['gamecode_name'], 'round_id' => '1', 'phase_id' => '1', 'status' => 'In progress'
                ])->first();

            if ($userdata_exist) {
                $LoginForMatchesTable->updateAll(['waiting_screen' => $_POST['waiting_screen']], ['user_id' => $user['id'], 'gamecode' => $user['gamecode_name'], 'round_id' => '1', 'phase_id' => '1', 'status' => 'In progress']);
            }
        }
        exit();
    }
    public function updatewaitingscreenr1p2()
    {
        $user = $this->Auth->user();
        $this->set(compact("user"));
        $LoginForMatchesTable = TableRegistry::get('LoginForMatches');

        if (isset($_POST['waiting_screen'])) {
            // check if  already exist with same user type, gamecode,phase_id,round_id
            $userdata_exist = $LoginForMatchesTable->find()
                ->where([
                    'user_id' => $user['id'], 'gamecode' => $user['gamecode_name'], 'round_id' => '1', 'phase_id' => '2', 'status' => 'In progress'
                ])->first();

            if ($userdata_exist) {
                $LoginForMatchesTable->updateAll(['waiting_screen' => $_POST['waiting_screen']], ['user_id' => $user['id'], 'gamecode' => $user['gamecode_name'], 'round_id' => '1', 'phase_id' => '2', 'status' => 'In progress']);
            }
        }
        exit();
    }

    public function updatewaitingscreenr2p1()
    {
        $user = $this->Auth->user();
        $this->set(compact("user"));
        $LoginForMatchesTable = TableRegistry::get('LoginForMatches');

        if (isset($_POST['waiting_screen'])) {
            // check if  already exist with same user type, gamecode,phase_id,round_id
            $userdata_exist = $LoginForMatchesTable->find()
                ->where([
                    'user_id' => $user['id'], 'gamecode' => $user['gamecode_name'], 'round_id' => '2', 'phase_id' => '1',
                ])->first();

            if ($userdata_exist) {
                $LoginForMatchesTable->updateAll(['waiting_screen' => $_POST['waiting_screen']], 
            ['user_id' => $user['id'], 'gamecode' => $user['gamecode_name'], 'round_id' => '2', 'phase_id' => '1']);
            }
        }
        exit();
    }

    public function updatewaitingscreenr2p2()
    {
        $user = $this->Auth->user();
        $this->set(compact("user"));
        $LoginForMatchesTable = TableRegistry::get('LoginForMatches');

        if (isset($_POST['waiting_screen'])) {
            // check if  already exist with same user type, gamecode,phase_id,round_id
            $userdata_exist = $LoginForMatchesTable->find()
                ->where([
                    'user_id' => $user['id'], 'gamecode' => $user['gamecode_name'], 'round_id' => '2', 'phase_id' => '2'
                ])->first();

            if ($userdata_exist) {
                $LoginForMatchesTable->updateAll(['waiting_screen' => $_POST['waiting_screen']],
         ['user_id' => $user['id'], 'gamecode' => $user['gamecode_name'], 'round_id' => '2', 'phase_id' => '2']);
            }
        }
        exit();
    }

    public function startgameround1()
    {
        $this->viewBuilder()->layout('adminlayout');
        $user = $this->Auth->user();
        $this->set(compact("user"));

        $userid = $user['role_id'];
        // print_r($userid);
        if ($userid == 1) {
            return $this->redirect(['action' => 'login']);
        }

        // get logged in users user type
        $UserTypesTable = TableRegistry::get('UserTypes');
        $query = $UserTypesTable->find('all')
            ->where(['id' => $user['user_type_id']]);
        $userType = $query->toList();
        $this->set(compact("userType"));

        // get all user types
        $UserTypes_allTable = TableRegistry::get('UserTypes');
        $query2 = $UserTypes_allTable->find('all')
            ->order(['type_name' => 'ASC']);
        $userType_detail = $query2->toList();

        $LoginForMatchesTable = TableRegistry::get('LoginForMatches');
        if (!empty($userType_detail)) {
            foreach ($userType_detail as $key => $details) {
                $joineduserwithsamegamecode = $LoginForMatchesTable->find()->contain([
                    'Users.UserTypes'
                ])->select(['user_id', 'gamecode', 'waiting_screen'])
                    ->where([
                        'Users.user_type_id' => $details['id'],
                        'gamecode' => $user['gamecode_name'],
                        'round_id' => '1', 'phase_id' => '1', 'round_number' => '1', 'status' => 'In Progress', 'waiting_screen' => '11'
                    ])->toArray();
                $userType_detail[$key]['joined_gamecode'] = $joineduserwithsamegamecode;
            }
        }
        $this->set(compact("userType_detail"));
        // count game code        
        $countgamecode = $LoginForMatchesTable->find('all', [
            'conditions' => ['gamecode' => $user['gamecode_name']]
        ])
            ->where(['round_id' => '1', 'phase_id' => '1', 'round_number' => '1', 'status' => 'In Progress']);
        $totalgamecode = $countgamecode->count();
        $this->set(compact("totalgamecode"));

        //get waiting screen count
        $count_r1p1waiting = $LoginForMatchesTable->find('all', [
            'conditions' => ['gamecode' => $user['gamecode_name']]
        ])
            ->where(['round_id' => '1', 'phase_id' => '1', 'round_number' => '1', 'status' => 'In Progress', 'waiting_screen' => '11']);
        $total_r1p1_waitingcnt = $count_r1p1waiting->count();
        // echo json_encode($total_r1p1_waitingcnt);
        $this->set(compact("total_r1p1_waitingcnt"));
        // // get existing logged in user type
        // $LoginForMatchesTable = TableRegistry::get('LoginForMatches');
        // $query3 = $LoginForMatchesTable->find('all')
        // ->where(['gamecode' => $user['gamecode_name']]); // check loggedin user gamecode_name with loggedin data
        // $loggedinuser = $query3->toList();
        // $this->set(compact("loggedinuser"));
    }
    public function startgameround2()
    {
        $this->viewBuilder()->layout('adminlayout');
        $user = $this->Auth->user();
        $this->set(compact("user"));

        // get logged in users user type
        $UserTypesTable = TableRegistry::get('UserTypes');
        $query = $UserTypesTable->find('all')
            ->where(['id' => $user['user_type_id']]);
        $userType = $query->toList();
        $this->set(compact("userType"));

        // get all user types
        $UserTypes_allTable = TableRegistry::get('UserTypes');
        $query2 = $UserTypes_allTable->find('all')
            ->order(['type_name' => 'ASC']);
        $userType_detail = $query2->toList();

        $LoginForMatchesTable = TableRegistry::get('LoginForMatches');
        if (!empty($userType_detail)) {
            foreach ($userType_detail as $key => $details) {
                $joineduserwithsamegamecode = $LoginForMatchesTable->find()->contain([
                    'Users.UserTypes'
                ])->select(['user_id', 'gamecode'])
                    ->where([
                        'Users.user_type_id' => $details['id'],
                        'gamecode' => $user['gamecode_name'],
                        'round_id' => '2', 'phase_id' => '1', 'round_number' => '2','waiting_screen' => '21'
                    ])->toArray();
                $userType_detail[$key]['joined_gamecode'] = $joineduserwithsamegamecode;
            }
        }
        $this->set(compact("userType_detail"));
        // count game code        
        $countgamecode = $LoginForMatchesTable->find('all', [
            'conditions' => ['gamecode' => $user['gamecode_name']]
        ])
            ->where(['round_id' => '2', 'phase_id' => '1', 'round_number' => '2']);
        $totalgamecode = $countgamecode->count();
        $this->set(compact("totalgamecode"));

        //get waiting screen count
        $count_r2p1waiting = $LoginForMatchesTable->find('all', [
            'conditions' => ['gamecode' => $user['gamecode_name']]
        ])
            ->where(['round_id' => '2', 'phase_id' => '1', 'round_number' => '2', 'waiting_screen' => '21']);
        $total_r2p1_waitingcnt = $count_r2p1waiting->count();
        // echo json_encode($total_r1p1_waitingcnt);
        $this->set(compact("total_r2p1_waitingcnt"));
    }

    public function startgameround1phase2()
    {
        $this->viewBuilder()->layout('adminlayout');
        $user = $this->Auth->user();
        $this->set(compact("user"));

        // get logged in users user type
        $UserTypesTable = TableRegistry::get('UserTypes');
        $query = $UserTypesTable->find('all')
            ->where(['id' => $user['user_type_id']]);
        $userType = $query->toList();
        $this->set(compact("userType"));

        // get all user types
        $UserTypes_allTable = TableRegistry::get('UserTypes');
        $query2 = $UserTypes_allTable->find('all')
            ->order(['type_name' => 'ASC']);
        $userType_detail = $query2->toList();

        $LoginForMatchesTable = TableRegistry::get('LoginForMatches');
        if (!empty($userType_detail)) {
            foreach ($userType_detail as $key => $details) {
                $joineduserwithsamegamecode = $LoginForMatchesTable->find()->contain([
                    'Users.UserTypes'
                ])->select(['user_id', 'gamecode'])
                    ->where([
                        'Users.user_type_id' => $details['id'],
                        'gamecode' => $user['gamecode_name'],
                        'round_id' => '1', 'phase_id' => '2', 'round_number' => '1', 'status' => 'In Progress', 'waiting_screen' => '12'
                    ])->toArray();
                $userType_detail[$key]['joined_gamecode'] = $joineduserwithsamegamecode;
            }
        }
        $this->set(compact("userType_detail"));
        // count game code        
        $countgamecode = $LoginForMatchesTable->find('all', [
            'conditions' => ['gamecode' => $user['gamecode_name']]
        ])
            ->where(['round_id' => '1', 'phase_id' => '2', 'round_number' => '1', 'status' => 'In Progress']);
        $totalgamecode = $countgamecode->count();
        $this->set(compact("totalgamecode"));

        //get waiting screen count
        $count_r1p2waiting = $LoginForMatchesTable->find('all', [
            'conditions' => ['gamecode' => $user['gamecode_name']]
        ])
            ->where(['round_id' => '1', 'phase_id' => '2', 'round_number' => '1', 'status' => 'In Progress', 'waiting_screen' => '12']);
        $total_r1p2_waitingcnt = $count_r1p2waiting->count();
        // echo json_encode($total_r1p1_waitingcnt);
        $this->set(compact("total_r1p2_waitingcnt"));
    }


    public function startgameround4()
    {
        $this->viewBuilder()->layout('adminlayout');
        $user = $this->Auth->user();
        $this->set(compact("user"));

        // get logged in users user type
        $UserTypesTable = TableRegistry::get('UserTypes');
        $query = $UserTypesTable->find('all')
            ->where(['id' => $user['user_type_id']]);
        $userType = $query->toList();
        $this->set(compact("userType"));

        // get all user types
        $UserTypes_allTable = TableRegistry::get('UserTypes');
        $query2 = $UserTypes_allTable->find('all')
            ->order(['type_name' => 'ASC']);
        $userType_detail = $query2->toList();

        $LoginForMatchesTable = TableRegistry::get('LoginForMatches');
        if (!empty($userType_detail)) {
            foreach ($userType_detail as $key => $details) {
                $joineduserwithsamegamecode = $LoginForMatchesTable->find()->contain([
                    'Users.UserTypes'
                ])->select(['user_id', 'gamecode'])
                    ->where([
                        'Users.user_type_id' => $details['id'],
                        'gamecode' => $user['gamecode_name'],
                        'round_id' => '2', 'phase_id' => '2', 'round_number' => '2', 'waiting_screen' => '22'
                    ])->toArray();
                $userType_detail[$key]['joined_gamecode'] = $joineduserwithsamegamecode;
            }
        }
        $this->set(compact("userType_detail"));
        // count game code        
        $countgamecode = $LoginForMatchesTable->find('all', [
            'conditions' => ['gamecode' => $user['gamecode_name']]
        ])
            ->where(['round_id' => '2', 'phase_id' => '2', 'round_number' => '2']);
        $totalgamecode = $countgamecode->count();
        $this->set(compact("totalgamecode"));

        //get waiting screen count
        $count_r2p2waiting = $LoginForMatchesTable->find('all', [
            'conditions' => ['gamecode' => $user['gamecode_name']]
        ])
            ->where(['round_id' => '2', 'phase_id' => '2', 'round_number' => '2','waiting_screen' => '22']);
        $total_r2p2_waitingcnt = $count_r2p2waiting->count();
        // echo json_encode($total_r1p1_waitingcnt);
        $this->set(compact("total_r2p2_waitingcnt"));
    }

    public function p2round1startscreen()
    {
        $this->viewBuilder()->layout('adminlayout');
        $user = $this->Auth->user();
        $this->set(compact("user"));

        // type of user
        $UserTypesTable = TableRegistry::get('UserTypes');
        $query = $UserTypesTable->find('all')
            ->where(['id' => $user['user_type_id']]);
        $userType = $query->toList();
        $this->set(compact("userType"));
    }

    public function waiting()
    {
        $this->viewBuilder()->layout('adminlayout');
        $user = $this->Auth->user();
        $this->set(compact("user"));
        $userid = $user['role_id'];
        // print_r($userid);
        if ($userid == 1) {
            return $this->redirect(['action' => 'login']);
        }
    }

    public function waiting2()
    {
        $this->viewBuilder()->layout('adminlayout');
        $user = $this->Auth->user();
        $this->set(compact("user"));
        $userid = $user['role_id'];
        // print_r($userid);
        if ($userid == 1) {
            return $this->redirect(['action' => 'login']);
        }
    }
    public function waiting3()
    {
        $this->viewBuilder()->layout('adminlayout');
        $user = $this->Auth->user();
        $this->set(compact("user"));
        $userid = $user['role_id'];
        // print_r($userid);
        if ($userid == 1) {
            return $this->redirect(['action' => 'login']);
        }
    }
    public function waiting4()
    {
        $this->viewBuilder()->layout('adminlayout');
        $user = $this->Auth->user();
        $this->set(compact("user"));
        $userid = $user['role_id'];
        // print_r($userid);
        if ($userid == 1) {
            return $this->redirect(['action' => 'login']);
        }
    }

    public function outputround1()
    {
        $this->viewBuilder()->layout('adminlayout');
        $user = $this->Auth->user();
        $this->set(compact("user"));

        // type of user
        $UserTypesTable = TableRegistry::get('UserTypes');
        $query = $UserTypesTable->find('all')
            ->where(['id' => $user['user_type_id']]);
        $userType = $query->toList();
        $this->set(compact("userType"));

        $ResultTable = TableRegistry::get('Results');
        $query5 = $ResultTable->find()
            ->where(['user_type_id' => '3', 'game_step_id' => '2','game_code'=>$user['gamecode_name']]); //,'status' =>'Completed'
        $r1_p2_Architect_result = $query5->toList();
        $this->set(compact("r1_p2_Architect_result"));

        ////Get Canvas image of Carpenter
        $query6 = $ResultTable->find()
            ->where(['user_type_id' => '2', 'game_step_id' => '2','game_code'=>$user['gamecode_name']]); //,'status' =>'Completed'
        $r1_p2_Carpenter_result = $query6->toList();
        $this->set(compact("r1_p2_Carpenter_result"));

        ////Get Canvas image of Gardener
        $query7 = $ResultTable->find()
            ->where(['user_type_id' => '1', 'game_step_id' => '2','game_code'=>$user['gamecode_name']]); //,'status' =>'Completed'
        $r1_p2_Gardener_result = $query7->toList();
        $this->set(compact("r1_p2_Gardener_result"));

        ////Get Canvas image of Designer
        $query8 = $ResultTable->find()
            ->where(['user_type_id' => '4', 'game_step_id' => '2','game_code'=>$user['gamecode_name']]); //,'status' =>'Completed'
        $r1_p2_Designer_result = $query8->toList();
        $this->set(compact("r1_p2_Designer_result"));

        $query9 = $ResultTable->find('all');
        $query9->select(['sum' => $query9->func()->sum('Results.score')])
            ->where(['game_step_id' => '2', 'game_code' => $user['gamecode_name']]);
        $totalscorer1p2 = $query9->toList();
        $this->set(compact("totalscorer1p2"));


        // $countround1phase2score = $ResultTable->find('all')
        // ->where(['game_step_id' => '2', 'game_code' => $user['gamecode_name']]);
        // $totalscorer1p2 = $countround1phase2score->sum();
        // $this->set(compact("totalscorer1p2"));


    }

    public function outputround2()
    {
        $this->viewBuilder()->layout('adminlayout');
        $user = $this->Auth->user();
        $this->set(compact("user"));

        // type of user
        $UserTypesTable = TableRegistry::get('UserTypes');
        $query = $UserTypesTable->find('all')
            ->where(['id' => $user['user_type_id']]);
        $userType = $query->toList();
        $this->set(compact("userType"));

        $ResultTable = TableRegistry::get('Results');
        $query5 = $ResultTable->find()
            ->where(['user_type_id' => '3', 'game_step_id' => '4','game_code'=>$user['gamecode_name']]); //,'status' =>'Completed'
        $r1_p2_Architect_result = $query5->toList();
        $this->set(compact("r1_p2_Architect_result"));

        ////Get Canvas image of Carpenter
        $query6 = $ResultTable->find()
            ->where(['user_type_id' => '2', 'game_step_id' => '4','game_code'=>$user['gamecode_name']]); //,'status' =>'Completed'
        $r1_p2_Carpenter_result = $query6->toList();
        $this->set(compact("r1_p2_Carpenter_result"));

        ////Get Canvas image of Gardener
        $query7 = $ResultTable->find()
            ->where(['user_type_id' => '1', 'game_step_id' => '4','game_code'=>$user['gamecode_name']]); //,'status' =>'Completed'
        $r1_p2_Gardener_result = $query7->toList();
        $this->set(compact("r1_p2_Gardener_result"));

        ////Get Canvas image of Designer
        $query8 = $ResultTable->find()
            ->where(['user_type_id' => '4', 'game_step_id' => '4','game_code'=>$user['gamecode_name']]); //,'status' =>'Completed'
        $r1_p2_Designer_result = $query8->toList();
        $this->set(compact("r1_p2_Designer_result"));

        $query9 = $ResultTable->find('all'); // round 1 group score
        $query9->select(['sum' => $query9->func()->sum('Results.score')])
            ->where(['game_step_id' => '2', 'game_code' => $user['gamecode_name']]);
        $totalscorer1p2 = $query9->toList();
        $this->set(compact("totalscorer1p2"));

        $query10 = $ResultTable->find('all'); // round 2 group score
        $query10->select(['sum' => $query10->func()->sum('Results.score')])
            ->where(['game_step_id' => '4', 'game_code' => $user['gamecode_name']]);
        $totalscorer2p2 = $query10->toList();
        $this->set(compact("totalscorer2p2"));

        // get joined player names   
        // $LoginForMatchesTable = TableRegistry::get('LoginForMatches');
        // $joinedplayers = $LoginForMatchesTable->find('all', [
        //     'conditions' => ['gamecode' => $user['gamecode_name']]
        // ])
        // ->contain(['Users','Users.UserTypes']);
        // // ->order(['Users.UserTypes' =>'DESC']);
        // // ->where(['round_id' => '2', 'phase_id' => '1', 'round_number' => '2', 'status' => 'In Progress']);
        // $playersname = $joinedplayers->toArray();
        // $this->set(compact("playersname"));

        $UserTypes_allTable = TableRegistry::get('UserTypes');
        $query2 = $UserTypes_allTable->find('all')
            ->order(['type_name' => 'ASC']);
        $userType_detail = $query2->toList();

        $LoginForMatchesTable = TableRegistry::get('LoginForMatches');
        if (!empty($userType_detail)) {
            foreach ($userType_detail as $key => $details) {
                $joineduserwithsamegamecode = $LoginForMatchesTable->find()->contain([
                    'Users.UserTypes'
                ])->select(['user_id', 'gamecode', 'Users.name'])
                    ->where([
                        'Users.user_type_id' => $details['id'],
                        'gamecode' => $user['gamecode_name'],
                        // 'round_id' => '1', 'phase_id' => '1', 'round_number' => '1', 'status' => 'In Progress', 'waiting_screen' => '11'
                    ])->toArray();
                $userType_detail[$key]['players_name'] = $joineduserwithsamegamecode;
            }
        }
        $this->set(compact("userType_detail")); // got players name
    }

    public function videolink()
    {
        $this->viewBuilder()->layout('adminlayout');
        $user = $this->Auth->user();
        $this->set(compact("user"));
        $userid = $user['role_id'];
        // print_r($userid);
        if ($userid == 1) {
            return $this->redirect(['action' => 'login']);
        }
    }

    public function video4()
    {
        $this->viewBuilder()->layout('adminlayout');
        $user = $this->Auth->user();
        $this->set(compact("user"));
        $userid = $user['role_id'];
        // print_r($userid);
        if ($userid == 1) {
            return $this->redirect(['action' => 'login']);
        }
    }


    public function surveyquestion()
    {
        $this->viewBuilder()->layout('adminlayout');
        $user = $this->Auth->user();
        $this->set(compact("user"));
        $userid = $user['role_id'];
        // print_r($userid);
        if ($userid == 1) {
            return $this->redirect(['action' => 'login']);
        }

        $plyers_surveyQuestionsTable = TableRegistry::get('playerSurveyQuestions');
        $questions = $plyers_surveyQuestionsTable->find('all');
        $plyers_surveyQuestionsList = $questions->toList();
        $this->set(compact("plyers_surveyQuestionsList"));
        // print_r($plyers_surveyQuestionsList);


        $i = 0;
        $plyers_surveyAnswersTable = TableRegistry::get('playerSurveyAnswers');

        if ($this->request->is(['post'])) {
            $answer_txt = $_POST['answer_txt'];
            $player_survey_question_id = $_POST['player_survey_question_id'];

            foreach ($player_survey_question_id as $question_id) {
                $plyers_surveyAnswers = $plyers_surveyAnswersTable->newEntity();
                $plyers_surveyAnswers->player_survey_question_id = $question_id;
                $plyers_surveyAnswers->user_type_id = $user['user_type_id'];
                $plyers_surveyAnswers->user_id = $user['id'];
                $plyers_surveyAnswers->answer_txt = $answer_txt[$i++];
                $plyers_surveyAnswers->game_name = $user['gamecode_name'];
                $plyers_surveyAnswers->status = "Completed";

                if ($plyers_surveyAnswersTable->save($plyers_surveyAnswers)) {
                }
            }

            return $this->redirect(['controller' => 'users', 'action' => 'summary']);
        }
        // exit();

    }


    public function index()
    {
        $this->paginate = [
            'contain' => ['UserTypes', 'Roles'],
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['UserTypes', 'Roles', 'OnlineGameHistories'],
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $userTypes = $this->Users->UserTypes->find('list', ['limit' => 200]);
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'userTypes', 'roles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $userTypes = $this->Users->UserTypes->find('list', ['limit' => 200]);
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'userTypes', 'roles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
