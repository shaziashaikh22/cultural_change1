<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Types'), ['controller' => 'UserTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Type'), ['controller' => 'UserTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Online Game Histories'), ['controller' => 'OnlineGameHistories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Online Game History'), ['controller' => 'OnlineGameHistories', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($user->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Type') ?></th>
            <td><?= $user->has('user_type') ? $this->Html->link($user->user_type->id, ['controller' => 'UserTypes', 'action' => 'view', $user->user_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Role') ?></th>
            <td><?= $user->has('role') ? $this->Html->link($user->role->name, ['controller' => 'Roles', 'action' => 'view', $user->role->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Online Game Histories') ?></h4>
        <?php if (!empty($user->online_game_histories)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Online Game Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Score') ?></th>
                <th scope="col"><?= __('First Round Data') ?></th>
                <th scope="col"><?= __('Second Round Data') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->online_game_histories as $onlineGameHistories): ?>
            <tr>
                <td><?= h($onlineGameHistories->id) ?></td>
                <td><?= h($onlineGameHistories->online_game_id) ?></td>
                <td><?= h($onlineGameHistories->user_id) ?></td>
                <td><?= h($onlineGameHistories->score) ?></td>
                <td><?= h($onlineGameHistories->first_round_data) ?></td>
                <td><?= h($onlineGameHistories->second_round_data) ?></td>
                <td><?= h($onlineGameHistories->created) ?></td>
                <td><?= h($onlineGameHistories->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'OnlineGameHistories', 'action' => 'view', $onlineGameHistories->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'OnlineGameHistories', 'action' => 'edit', $onlineGameHistories->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'OnlineGameHistories', 'action' => 'delete', $onlineGameHistories->id], ['confirm' => __('Are you sure you want to delete # {0}?', $onlineGameHistories->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
