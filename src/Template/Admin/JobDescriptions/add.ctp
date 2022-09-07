<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\JobDescription $jobDescription
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Job Descriptions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Rounds'), ['controller' => 'Rounds', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Round'), ['controller' => 'Rounds', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Types'), ['controller' => 'UserTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Type'), ['controller' => 'UserTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Phases'), ['controller' => 'Phases', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Phase'), ['controller' => 'Phases', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="jobDescriptions form large-9 medium-8 columns content">
    <?= $this->Form->create($jobDescription) ?>
    <fieldset>
        <legend><?= __('Add Job Description') ?></legend>
        <?php
            echo $this->Form->control('round_id', ['options' => $rounds, 'empty' => true]);
            echo $this->Form->control('user_type_id', ['options' => $userTypes, 'empty' => true]);
            echo $this->Form->control('phase_id', ['options' => $phases, 'empty' => true]);
            echo $this->Form->control('description');
            echo $this->Form->control('project_info');
            echo $this->Form->control('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
