<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OnlineGame $onlineGame
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Online Games'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List User Types'), ['controller' => 'UserTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Type'), ['controller' => 'UserTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Surveys'), ['controller' => 'Surveys', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Survey'), ['controller' => 'Surveys', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Shape Groups'), ['controller' => 'ShapeGroups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Shape Group'), ['controller' => 'ShapeGroups', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Login For Matches'), ['controller' => 'LoginForMatches', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Login For Match'), ['controller' => 'LoginForMatches', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Online Game Histories'), ['controller' => 'OnlineGameHistories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Online Game History'), ['controller' => 'OnlineGameHistories', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="onlineGames form large-9 medium-8 columns content">
    <?= $this->Form->create($onlineGame) ?>
    <fieldset>
        <legend><?= __('Add Online Game') ?></legend>
        <?php
            echo $this->Form->control('game_name');
            echo $this->Form->control('game_players_allowed');
            echo $this->Form->control('players_turn');
            echo $this->Form->control('survey_id', ['options' => $surveys, 'empty' => true]);
            echo $this->Form->control('shape_group_id', ['options' => $shapeGroups, 'empty' => true]);
            echo $this->Form->control('status');
            echo $this->Form->control('start_time');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
