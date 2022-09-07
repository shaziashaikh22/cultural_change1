<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Phase $phase
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Phases'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Job Descriptions'), ['controller' => 'JobDescriptions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Job Description'), ['controller' => 'JobDescriptions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="phases form large-9 medium-8 columns content">
    <?= $this->Form->create($phase) ?>
    <fieldset>
        <legend><?= __('Add Phase') ?></legend>
        <?php
            echo $this->Form->control('phase_name');
            echo $this->Form->control('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
