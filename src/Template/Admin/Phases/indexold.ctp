<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OnlineGame[]|\Cake\Collection\CollectionInterface $onlineGames
 */
?>

<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Cultural Change Admin';
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <link rel="icon" href="img/log.png">
 
<!--  <title>NutFlix - admin</title>-->
 <style>
     .pointnone{
  pointer-events: none;
}

 th {
    cursor: pointer;
        color: #007bff;

}
 </style>
</head>
<body>
<!-- start admin -->
<section id="admin">
  <!-- start sidebar -->
  <div class="sidebar" style="overflow-x: hidden;">
    <!-- start with head -->
    <div class="head">
      <div class="logo">
        <img src="<?php echo $this->request->webroot;?>img/logomain.png" alt="">
      </div>
    </div>
    <!-- end with head -->
    <!-- start the list -->
    <div id="list">
      <ul class="nav flex-column">   
      <li class="nav-item">
    <?php echo $this->Html->link(
        '<img src='.$this->request->webroot.'img/dashboard.png style = vertical-align:sub;>' . 'Dashboard' ,
  ['controller' => 'Users', 'action' => 'dashboard'],['class' => 'nav-link','escape' => false],
  );?>
          </li>

<li class="nav-item">
    <?php echo $this->Html->link(
              '<img src='.$this->request->webroot.'img/user.png style = vertical-align:sub;width:20px;height:20px;>' . 'Users' ,
            ['controller' => 'Users', 'action' => 'index'],['class' => 'nav-link','escape' => false]
            );?></li>


 <!-- <li class="nav-item">
    <?php echo $this->Html->link(
       '<img src='.$this->request->webroot.'img/report.png style = vertical-align:sub;width:20px;height:20px;>' . 'Report' ,
            ['controller' => 'Reports', 'action' => 'index'],['class' => 'nav-link','escape' => false]
            );?></li>  -->

<li class="nav-item">
    <?php echo $this->Html->link(
  '<img src='.$this->request->webroot.'img/settings.png style = vertical-align:sub;width:20px;height:20px;>' . 'Settings' ,
    // '<i class="fa fa-cog"></i>'.'Settings',
            ['controller' => 'Users', 'action' => 'settings'],['class' => 'nav-link','escape' => false]
            );?></li>

<li class="nav-item">
    <?php echo $this->Html->link(
      '<img src='.$this->request->webroot.'img/adminprofile.png style = vertical-align:sub;width:20px;height:20px;>' . 'Admin Profile' ,
    // '<i class="fa fa-user-circle"></i>'.'Admin Profile',
            ['controller' => 'Users', 'action' => 'adminprofile'],['class' => 'nav-link','escape' => false]
            );?></li>

<li class="nav-item">
    <?php echo $this->Html->link(
            '<img src='.$this->request->webroot.'img/security.png style = vertical-align:sub;width:20px;height:20px;>' . 'Security' ,
    // '<i class="fa fa-lock"></i>'.'Security',
            ['controller' => 'Users', 'action' => 'security'],['class' => 'nav-link','escape' => false]
            );?></li>

<li class="nav-item">
    <?php echo $this->Html->link(
'<img src='.$this->request->webroot.'img/planning&build.png style = vertical-align:sub;width:20px;height:20px;>' . 'Planning & Building' ,
  //  '<i class="fa fa-puzzle-piece"></i>'. 'Planning & Building',
            ['controller' => 'UserTypes', 'action' => 'index'],['class' => 'nav-link','escape' => false]
            );?></li>

<li class="nav-item">
    <?php echo $this->Html->link(
      '<img src='.$this->request->webroot.'img/analysis&Survey.png style = vertical-align:sub;width:15px;height:15px;>' . 'Analysis & Survey' ,
    // '<i class="fa fa-hashtag"></i>'.'Analysis & Survey',
            ['controller' => 'NewSurveys', 'action' => 'index'],['class' => 'nav-link','escape' => false]
            );?></li>

<li class="nav-item">
    <?php echo $this->Html->link(
'<img src='.$this->request->webroot.'img/creategames.png style = vertical-align:sub;width:15px;height:15px;>' . 'Create Games' ,
    // '<i class="fa fa-gamepad"></i>'.'Create Games',
            ['controller' => 'Users', 'action' => 'creategames'],['class' => 'nav-link','escape' => false]
            );?></li>

<li class="nav-item">
    <?php echo $this->Html->link(
  '<img src='.$this->request->webroot.'img/report.png style = vertical-align:sub;width:15px;height:15px;>' . 'Overview' ,
    // '<i class="fa fa-users"></i>'.'Overview',
            ['controller' => 'Users', 'action' => 'dashboard'],['class' => 'nav-link','escape' => false]
            );?></li>

<li class="nav-item">
            <?php echo $this->Html->link(
              '<img src=' . $this->request->webroot . 'img/report.png style = vertical-align:sub;width:15px;height:15px;>' . 'Survey Results',
              ['controller' => 'SurveyResults', 'action' => 'index'],
              ['class' => 'nav-link', 'escape' => false]
            ); ?></li>
      
      <li class="nav-item">
            <?php echo $this->Html->link(
              '<img src=' . $this->request->webroot . 'img/report.png style = vertical-align:sub;width:15px;height:15px;>' . 'Game codes',
              ['controller' => 'OnlineGames', 'action' => 'index'],
              ['class' => 'nav-link active', 'escape' => false]
            ); ?></li>
         
  </ul>
    </div>
    <!-- end the list -->
  </div>
  <!-- end sidebar -->
  <!-- start content -->
  <div class="content">
    <!-- start content head -->
    <div class="head">
      <!-- head top -->
      <div class="top">
        <div class="left">
          <button id="on" class="btn btn-info"><i class="fa fa-bars"></i></button>
          <button id="off" class="btn btn-info hide"><i class="fa fa-align-left"></i></button>
        </div>
        <div class="right">

          <div class="dropdown">
            <?php 
                echo $this->Html->link(
    'Log out',
            ['controller' => 'Users', 'action' => 'logout'],['class' => 'btn btn-info']
           
            );
                ?>
          </div>
        </div>
      </div>
      <!-- end head top -->
      <!-- start head bottom -->
      <div class="bottom">
        <div class="left">
          <h1>Online Games List</h1>
        </div>
        <div class="right">
<!--            <input type="text" id="search" name="search" class="form-control" value="" placeholder="Search Name"/>-->
<!--    <input id="filter" type="text" class="form-control" placeholder="Search Here ...">-->

        </div>
      </div>
      
      <!-- end head bottom -->
    </div>

    <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col"></th>
            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('game_name') ?></th>
                <!-- <th scope="col"><?= $this->Paginator->sort('game_players_allowed') ?></th> -->
                <!-- <th scope="col"><?= $this->Paginator->sort('survey_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('shape_group_id') ?></th> -->
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('start_time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <!-- <th scope="col"><?= $this->Paginator->sort('modified') ?></th> -->
                <!-- <th scope="col" class="actions"><?= __('Actions') ?></th> -->
            </tr>

        </thead>
        <tbody>
        <?php foreach ($onlineGames as $onlineGame): ?>
                <tr>
                <td></td>
                <td><?= $this->Number->format($onlineGame->id) ?></td>
                <td><?= h($onlineGame->game_name) ?></td>
                <!-- <td><?= h($onlineGame->game_players_allowed) ?></td> -->
                <!-- <td><?= $onlineGame->has('survey') ? $this->Html->link($onlineGame->survey->id, ['controller' => 'Surveys', 'action' => 'view', $onlineGame->survey->id]) : '' ?></td>
                <td><?= $onlineGame->has('shape_group') ? $this->Html->link($onlineGame->shape_group->id, ['controller' => 'ShapeGroups', 'action' => 'view', $onlineGame->shape_group->id]) : '' ?></td> -->
                <td><?= h($onlineGame->status) ?></td>
                <td><?= h($onlineGame->start_time) ?></td>
                <td><?= h($onlineGame->created) ?></td>
                <!-- <td><?= h($onlineGame->modified) ?></td> -->
                <td class="actions">
                    <!-- <?= $this->Html->link(__('View'), ['action' => 'view', $onlineGame->id]) ?> -->
                    <!-- <?= $this->Html->link(__('Edit'), ['action' => 'edit', $onlineGame->id]) ?> -->
                    <!-- <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $onlineGame->id], ['confirm' => __('Are you sure you want to delete # {0}?', $onlineGame->id)]) ?> -->
                </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
     <div class="paginator" style="
    font-size: 12px; padding-left: 5%;
">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>

</div>
</body>
</html>



<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Online Game'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Surveys'), ['controller' => 'Surveys', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Survey'), ['controller' => 'Surveys', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Shape Groups'), ['controller' => 'ShapeGroups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Shape Group'), ['controller' => 'ShapeGroups', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Online Game Histories'), ['controller' => 'OnlineGameHistories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Online Game History'), ['controller' => 'OnlineGameHistories', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="onlineGames index large-9 medium-8 columns content">
    <h3><?= __('Online Games') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('game_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('game_players_allowed') ?></th>
                <th scope="col"><?= $this->Paginator->sort('survey_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('shape_group_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('start_time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($onlineGames as $onlineGame): ?>
            <tr>
                <td><?= $this->Number->format($onlineGame->id) ?></td>
                <td><?= h($onlineGame->game_name) ?></td>
                <td><?= h($onlineGame->game_players_allowed) ?></td>
                <td><?= $onlineGame->has('survey') ? $this->Html->link($onlineGame->survey->id, ['controller' => 'Surveys', 'action' => 'view', $onlineGame->survey->id]) : '' ?></td>
                <td><?= $onlineGame->has('shape_group') ? $this->Html->link($onlineGame->shape_group->id, ['controller' => 'ShapeGroups', 'action' => 'view', $onlineGame->shape_group->id]) : '' ?></td>
                <td><?= h($onlineGame->status) ?></td>
                <td><?= h($onlineGame->start_time) ?></td>
                <td><?= h($onlineGame->created) ?></td>
                <td><?= h($onlineGame->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $onlineGame->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $onlineGame->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $onlineGame->id], ['confirm' => __('Are you sure you want to delete # {0}?', $onlineGame->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div> -->
