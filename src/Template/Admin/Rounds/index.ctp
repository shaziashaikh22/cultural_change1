<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Round[]|\Cake\Collection\CollectionInterface $rounds
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Round'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Job Descriptions'), ['controller' => 'JobDescriptions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Job Description'), ['controller' => 'JobDescriptions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="rounds index large-9 medium-8 columns content">
    <h3><?= __('Rounds') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('round_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rounds as $round): ?>
            <tr>
                <td><?= $this->Number->format($round->id) ?></td>
                <td><?= $this->Number->format($round->round_no) ?></td>
                <td><?= h($round->status) ?></td>
                <td><?= h($round->created) ?></td>
                <td><?= h($round->deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $round->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $round->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $round->id], ['confirm' => __('Are you sure you want to delete # {0}?', $round->id)]) ?>
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
