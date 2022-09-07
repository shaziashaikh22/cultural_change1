<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\QuestionGroup $questionGroup
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Question Groups'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Questions'), ['controller' => 'Questions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Question'), ['controller' => 'Questions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Surveys'), ['controller' => 'Surveys', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Survey'), ['controller' => 'Surveys', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="questionGroups form large-9 medium-8 columns content">
    <?= $this->Form->create($questionGroup) ?>
    <fieldset>
        <legend><?= __('Add Question Group') ?></legend>
        <?php
            echo $this->Form->control('question_group_name');
            echo $this->Form->control('question_group_description');
            echo $this->Form->control('question_status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
