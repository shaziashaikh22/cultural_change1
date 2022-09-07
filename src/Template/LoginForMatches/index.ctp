<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\LoginForMatch[]|\Cake\Collection\CollectionInterface $loginForMatches
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Login For Match'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Online Games'), ['controller' => 'OnlineGames', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Online Game'), ['controller' => 'OnlineGames', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="loginForMatches index large-9 medium-8 columns content">
    <h3><?= __('Login For Matches') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('online_game_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('gamecode') ?></th>
                <th scope="col"><?= $this->Paginator->sort('round_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($loginForMatches as $loginForMatch): ?>
            <tr>
                <td><?= $this->Number->format($loginForMatch->id) ?></td>
                <td><?= $loginForMatch->has('user') ? $this->Html->link($loginForMatch->user->name, ['controller' => 'Users', 'action' => 'view', $loginForMatch->user->id]) : '' ?></td>
                <td><?= $loginForMatch->has('online_game') ? $this->Html->link($loginForMatch->online_game->id, ['controller' => 'OnlineGames', 'action' => 'view', $loginForMatch->online_game->id]) : '' ?></td>
                <td><?= h($loginForMatch->gamecode) ?></td>
                <td><?= $this->Number->format($loginForMatch->round_number) ?></td>
                <td><?= h($loginForMatch->status) ?></td>
                <td><?= h($loginForMatch->created) ?></td>
                <td><?= h($loginForMatch->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $loginForMatch->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $loginForMatch->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $loginForMatch->id], ['confirm' => __('Are you sure you want to delete # {0}?', $loginForMatch->id)]) ?>
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
</div>
