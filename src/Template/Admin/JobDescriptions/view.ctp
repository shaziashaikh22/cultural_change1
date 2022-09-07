<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\JobDescription $jobDescription
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Job Description'), ['action' => 'edit', $jobDescription->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Job Description'), ['action' => 'delete', $jobDescription->id], ['confirm' => __('Are you sure you want to delete # {0}?', $jobDescription->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Job Descriptions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Job Description'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Rounds'), ['controller' => 'Rounds', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Round'), ['controller' => 'Rounds', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Types'), ['controller' => 'UserTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Type'), ['controller' => 'UserTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Phases'), ['controller' => 'Phases', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Phase'), ['controller' => 'Phases', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="jobDescriptions view large-9 medium-8 columns content">
    <h3><?= h($jobDescription->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Round') ?></th>
            <td><?= $jobDescription->has('round') ? $this->Html->link($jobDescription->round->id, ['controller' => 'Rounds', 'action' => 'view', $jobDescription->round->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Type') ?></th>
            <td><?= $jobDescription->has('user_type') ? $this->Html->link($jobDescription->user_type->type_name, ['controller' => 'UserTypes', 'action' => 'view', $jobDescription->user_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phase') ?></th>
            <td><?= $jobDescription->has('phase') ? $this->Html->link($jobDescription->phase->id, ['controller' => 'Phases', 'action' => 'view', $jobDescription->phase->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($jobDescription->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($jobDescription->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($jobDescription->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($jobDescription->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($jobDescription->description)); ?>
    </div>
    <div class="row">
        <h4><?= __('Project Info') ?></h4>
        <?= $this->Text->autoParagraph(h($jobDescription->project_info)); ?>
    </div>
</div>
