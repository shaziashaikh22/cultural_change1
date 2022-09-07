<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OnlineGameHistory[]|\Cake\Collection\CollectionInterface $onlineGameHistories
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
    <div class="head" style="padding-top: 50px;">
      <div class="logo">
        <img src="<?php echo $this->request->webroot;?>img/logomain.png" alt="">
      </div>
      <p class="btn btn-danger pointnone">Cultural Change Admin</p>
    </div>
    <!-- end with head -->
    <!-- start the list -->
    <div id="list">
      <ul class="nav flex-column">         
         <li class="nav-item">
    <?php echo $this->Html->link(
    'Home',
            ['controller' => 'Users', 'action' => 'dashboard'],['class' => 'nav-link']
           
            );?></li>
        
        <li class="nav-item">
    <?php echo $this->Html->link(
    'Users',
            ['controller' => 'Users', 'action' => 'index'],['class' => 'nav-link']
           
            );?></li>

        
        <li class="nav-item">
    <?php echo $this->Html->link(
    'Online Game History',
            ['controller' => 'OnlineGameHistories', 'action' => 'index'],['class' => 'nav-link active']
           
            );?></li>

        <li class="nav-item">
    <?php echo $this->Html->link(
    'Online Games',
            ['controller' => 'OnlineGames', 'action' => 'index'],['class' => 'nav-link']
           
            );?></li>
        <li class="nav-item">
    <?php echo $this->Html->link(
    'Question Group',
            ['controller' => 'QuestionGroups', 'action' => 'index'],['class' => 'nav-link']
           
            );?></li>
           <li class="nav-item">
    <?php echo $this->Html->link(
    'Questions',
            ['controller' => 'Questions', 'action' => 'index'],['class' => 'nav-link']
           
            );?></li>
           
           <li class="nav-item">
    <?php echo $this->Html->link(
    'Shape Groups',
            ['controller' => 'ShapeGroups', 'action' => 'index'],['class' => 'nav-link']
           
            );?></li>
            <li class="nav-item">
    <?php echo $this->Html->link(
    'Shapes',
            ['controller' => 'Shapes', 'action' => 'index'],['class' => 'nav-link']
           
            );?></li>
            
            <li class="nav-item">
    <?php echo $this->Html->link(
    'Survey',
            ['controller' => 'Surveys', 'action' => 'index'],['class' => 'nav-link']
           
            );?></li>

            <li class="nav-item">
    <?php echo $this->Html->link(
    'User Types',
            ['controller' => 'UserTypes', 'action' => 'index'],['class' => 'nav-link']
           
            );?></li>
            
<li class="nav-item">
    <?php echo $this->Html->link(
    'Access',
            ['controller' => 'Accesses', 'action' => 'index'],['class' => 'nav-link']
           
            );?></li>
            
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
          <h1>Online Games History List</h1>
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
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('online_game_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('score') ?></th>
                <th scope="col"><?= $this->Paginator->sort('first_round_data') ?></th>
                <th scope="col"><?= $this->Paginator->sort('second_round_data') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <!-- <th scope="col"><?= $this->Paginator->sort('modified') ?></th> -->
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>

        </thead>
        <tbody>
        <?php foreach ($onlineGameHistories as $onlineGameHistory): ?>
                <tr>
                <td><?= $this->Number->format($onlineGameHistory->id) ?></td>
                <td><?= $onlineGameHistory->has('online_game') ? $this->Html->link($onlineGameHistory->online_game->id, ['controller' => 'OnlineGames', 'action' => 'view', $onlineGameHistory->online_game->id]) : '' ?></td>
                <td><?= $onlineGameHistory->has('user') ? $this->Html->link($onlineGameHistory->user->name, ['controller' => 'Users', 'action' => 'view', $onlineGameHistory->user->id]) : '' ?></td>
                <td><?= $this->Number->format($onlineGameHistory->score) ?></td>
                <td><?= h($onlineGameHistory->first_round_data) ?></td>
                <td><?= h($onlineGameHistory->second_round_data) ?></td>
                <td><?= h($onlineGameHistory->created) ?></td>
                <!-- <td><?= h($onlineGameHistory->modified) ?></td> -->
                <td class="actions">
                    <!-- <?= $this->Html->link(__('View'), ['action' => 'view', $onlineGameHistory->id]) ?> -->
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $onlineGameHistory->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $onlineGameHistory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $onlineGameHistory->id)]) ?>
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
        <li><?= $this->Html->link(__('New Online Game History'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Online Games'), ['controller' => 'OnlineGames', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Online Game'), ['controller' => 'OnlineGames', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="onlineGameHistories index large-9 medium-8 columns content">
    <h3><?= __('Online Game Histories') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('online_game_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('score') ?></th>
                <th scope="col"><?= $this->Paginator->sort('first_round_data') ?></th>
                <th scope="col"><?= $this->Paginator->sort('second_round_data') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($onlineGameHistories as $onlineGameHistory): ?>
            <tr>
                <td><?= $this->Number->format($onlineGameHistory->id) ?></td>
                <td><?= $onlineGameHistory->has('online_game') ? $this->Html->link($onlineGameHistory->online_game->id, ['controller' => 'OnlineGames', 'action' => 'view', $onlineGameHistory->online_game->id]) : '' ?></td>
                <td><?= $onlineGameHistory->has('user') ? $this->Html->link($onlineGameHistory->user->name, ['controller' => 'Users', 'action' => 'view', $onlineGameHistory->user->id]) : '' ?></td>
                <td><?= $this->Number->format($onlineGameHistory->score) ?></td>
                <td><?= h($onlineGameHistory->first_round_data) ?></td>
                <td><?= h($onlineGameHistory->second_round_data) ?></td>
                <td><?= h($onlineGameHistory->created) ?></td>
                <td><?= h($onlineGameHistory->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $onlineGameHistory->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $onlineGameHistory->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $onlineGameHistory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $onlineGameHistory->id)]) ?>
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
