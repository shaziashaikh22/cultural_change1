<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Question[]|\Cake\Collection\CollectionInterface $questions
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
            ['controller' => 'OnlineGameHistories', 'action' => 'index'],['class' => 'nav-link']
           
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
            ['controller' => 'Questions', 'action' => 'index'],['class' => 'nav-link active']
           
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
          <h1>Questions List</h1>
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
                <th scope="col"><?= $this->Paginator->sort('question_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('answer') ?></th>
                <th scope="col"><?= $this->Paginator->sort('question_group_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <!-- <th scope="col"><?= $this->Paginator->sort('modified') ?></th> -->
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>

        </thead>
        <tbody>
        <?php foreach ($questions as $question): ?>
                <tr>
                <td><?= $this->Number->format($question->id) ?></td>
                <td><?= h($question->question_type) ?></td>
                <td><?= h($question->description) ?></td>
                <td><?= h($question->answer) ?></td>
                <td><?= $question->has('question_group') ? $this->Html->link($question->question_group->id, ['controller' => 'QuestionGroups', 'action' => 'view', $question->question_group->id]) : '' ?></td>
                <td><?= h($question->status) ?></td>
                <td><?= h($question->created) ?></td>
                <!-- <td><?= h($question->modified) ?></td> -->
                <td class="actions">
                    <!-- <?= $this->Html->link(__('View'), ['action' => 'view', $question->id]) ?> -->
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $question->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $question->id], ['confirm' => __('Are you sure you want to delete # {0}?', $question->id)]) ?>
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
        <li><?= $this->Html->link(__('New Question'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Question Groups'), ['controller' => 'QuestionGroups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Question Group'), ['controller' => 'QuestionGroups', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="questions index large-9 medium-8 columns content">
    <h3><?= __('Questions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('question_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('answer') ?></th>
                <th scope="col"><?= $this->Paginator->sort('question_group_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($questions as $question): ?>
            <tr>
                <td><?= $this->Number->format($question->id) ?></td>
                <td><?= h($question->question_type) ?></td>
                <td><?= h($question->description) ?></td>
                <td><?= h($question->answer) ?></td>
                <td><?= $question->has('question_group') ? $this->Html->link($question->question_group->id, ['controller' => 'QuestionGroups', 'action' => 'view', $question->question_group->id]) : '' ?></td>
                <td><?= h($question->status) ?></td>
                <td><?= h($question->created) ?></td>
                <td><?= h($question->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $question->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $question->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $question->id], ['confirm' => __('Are you sure you want to delete # {0}?', $question->id)]) ?>
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
