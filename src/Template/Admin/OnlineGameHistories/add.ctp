<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OnlineGameHistory $onlineGameHistory
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Online Game Histories'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Online Games'), ['controller' => 'OnlineGames', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Online Game'), ['controller' => 'OnlineGames', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="onlineGameHistories form large-9 medium-8 columns content">
    <?= $this->Form->create($onlineGameHistory) ?>
    <fieldset>
        <legend><?= __('Add Online Game History') ?></legend>
        <?php
            echo $this->Form->control('online_game_id', ['options' => $onlineGames, 'empty' => true]);
            echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->control('score');
            echo $this->Form->control('first_round_data');
            echo $this->Form->control('second_round_data');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
