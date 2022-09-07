<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\JobDescription[]|\Cake\Collection\CollectionInterface $jobDescriptions
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Job Description'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Rounds'), ['controller' => 'Rounds', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Round'), ['controller' => 'Rounds', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Types'), ['controller' => 'UserTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Type'), ['controller' => 'UserTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Phases'), ['controller' => 'Phases', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Phase'), ['controller' => 'Phases', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="jobDescriptions index large-9 medium-8 columns content">
    <h3><?= __('Job Descriptions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('round_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_type_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('phase_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($jobDescriptions as $jobDescription): ?>
            <tr>
                <td><?= $this->Number->format($jobDescription->id) ?></td>
                <td><?= $jobDescription->has('round') ? $this->Html->link($jobDescription->round->id, ['controller' => 'Rounds', 'action' => 'view', $jobDescription->round->id]) : '' ?></td>
                <td><?= $jobDescription->has('user_type') ? $this->Html->link($jobDescription->user_type->type_name, ['controller' => 'UserTypes', 'action' => 'view', $jobDescription->user_type->id]) : '' ?></td>
                <td><?= $jobDescription->has('phase') ? $this->Html->link($jobDescription->phase->id, ['controller' => 'Phases', 'action' => 'view', $jobDescription->phase->id]) : '' ?></td>
                <td><?= h($jobDescription->status) ?></td>
                <td><?= h($jobDescription->created) ?></td>
                <td><?= h($jobDescription->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $jobDescription->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $jobDescription->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $jobDescription->id], ['confirm' => __('Are you sure you want to delete # {0}?', $jobDescription->id)]) ?>
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
