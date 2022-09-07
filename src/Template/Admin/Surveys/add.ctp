<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Survey $survey
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Surveys'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Question Groups'), ['controller' => 'QuestionGroups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Question Group'), ['controller' => 'QuestionGroups', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Online Games'), ['controller' => 'OnlineGames', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Online Game'), ['controller' => 'OnlineGames', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="surveys form large-9 medium-8 columns content">
    <?= $this->Form->create($survey) ?>
    <fieldset>
        <legend><?= __('Add Survey') ?></legend>
        <?php
            echo $this->Form->control('survey_name');
            echo $this->Form->control('question_group_id', ['options' => $questionGroups, 'empty' => true]);
            echo $this->Form->control('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
