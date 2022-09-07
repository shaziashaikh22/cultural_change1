<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Phase $phase
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Phase'), ['action' => 'edit', $phase->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Phase'), ['action' => 'delete', $phase->id], ['confirm' => __('Are you sure you want to delete # {0}?', $phase->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Phases'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Phase'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Job Descriptions'), ['controller' => 'JobDescriptions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Job Description'), ['controller' => 'JobDescriptions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="phases view large-9 medium-8 columns content">
    <h3><?= h($phase->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Phase Name') ?></th>
            <td><?= h($phase->phase_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($phase->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($phase->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($phase->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($phase->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Job Descriptions') ?></h4>
        <?php if (!empty($phase->job_descriptions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Round Id') ?></th>
                <th scope="col"><?= __('User Type Id') ?></th>
                <th scope="col"><?= __('Phase Id') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Project Info') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($phase->job_descriptions as $jobDescriptions): ?>
            <tr>
                <td><?= h($jobDescriptions->id) ?></td>
                <td><?= h($jobDescriptions->round_id) ?></td>
                <td><?= h($jobDescriptions->user_type_id) ?></td>
                <td><?= h($jobDescriptions->phase_id) ?></td>
                <td><?= h($jobDescriptions->description) ?></td>
                <td><?= h($jobDescriptions->project_info) ?></td>
                <td><?= h($jobDescriptions->status) ?></td>
                <td><?= h($jobDescriptions->created) ?></td>
                <td><?= h($jobDescriptions->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'JobDescriptions', 'action' => 'view', $jobDescriptions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'JobDescriptions', 'action' => 'edit', $jobDescriptions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'JobDescriptions', 'action' => 'delete', $jobDescriptions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $jobDescriptions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
