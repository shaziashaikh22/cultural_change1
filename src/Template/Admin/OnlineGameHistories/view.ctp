<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OnlineGameHistory $onlineGameHistory
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Online Game History'), ['action' => 'edit', $onlineGameHistory->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Online Game History'), ['action' => 'delete', $onlineGameHistory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $onlineGameHistory->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Online Game Histories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Online Game History'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Online Games'), ['controller' => 'OnlineGames', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Online Game'), ['controller' => 'OnlineGames', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="onlineGameHistories view large-9 medium-8 columns content">
    <h3><?= h($onlineGameHistory->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Online Game') ?></th>
            <td><?= $onlineGameHistory->has('online_game') ? $this->Html->link($onlineGameHistory->online_game->id, ['controller' => 'OnlineGames', 'action' => 'view', $onlineGameHistory->online_game->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $onlineGameHistory->has('user') ? $this->Html->link($onlineGameHistory->user->name, ['controller' => 'Users', 'action' => 'view', $onlineGameHistory->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('First Round Data') ?></th>
            <td><?= h($onlineGameHistory->first_round_data) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Second Round Data') ?></th>
            <td><?= h($onlineGameHistory->second_round_data) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($onlineGameHistory->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Score') ?></th>
            <td><?= $this->Number->format($onlineGameHistory->score) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($onlineGameHistory->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($onlineGameHistory->modified) ?></td>
        </tr>
    </table>
</div>
