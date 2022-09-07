<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\GameStep[]|\Cake\Collection\CollectionInterface $gameSteps
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Game Step'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Results'), ['controller' => 'Results', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Result'), ['controller' => 'Results', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="gameSteps index large-9 medium-8 columns content">
    <h3><?= __('Game Steps') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('step_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($gameSteps as $gameStep): ?>
            <tr>
                <td><?= $this->Number->format($gameStep->id) ?></td>
                <td><?= h($gameStep->step_name) ?></td>
                <td><?= h($gameStep->status) ?></td>
                <td><?= h($gameStep->created) ?></td>
                <td><?= h($gameStep->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $gameStep->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $gameStep->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $gameStep->id], ['confirm' => __('Are you sure you want to delete # {0}?', $gameStep->id)]) ?>
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
