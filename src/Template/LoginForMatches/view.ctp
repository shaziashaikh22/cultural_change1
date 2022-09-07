<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\LoginForMatch $loginForMatch
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Login For Match'), ['action' => 'edit', $loginForMatch->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Login For Match'), ['action' => 'delete', $loginForMatch->id], ['confirm' => __('Are you sure you want to delete # {0}?', $loginForMatch->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Login For Matches'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Login For Match'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Online Games'), ['controller' => 'OnlineGames', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Online Game'), ['controller' => 'OnlineGames', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="loginForMatches view large-9 medium-8 columns content">
    <h3><?= h($loginForMatch->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $loginForMatch->has('user') ? $this->Html->link($loginForMatch->user->name, ['controller' => 'Users', 'action' => 'view', $loginForMatch->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Online Game') ?></th>
            <td><?= $loginForMatch->has('online_game') ? $this->Html->link($loginForMatch->online_game->id, ['controller' => 'OnlineGames', 'action' => 'view', $loginForMatch->online_game->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gamecode') ?></th>
            <td><?= h($loginForMatch->gamecode) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($loginForMatch->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($loginForMatch->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Round Number') ?></th>
            <td><?= $this->Number->format($loginForMatch->round_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($loginForMatch->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($loginForMatch->modified) ?></td>
        </tr>
    </table>
</div>
