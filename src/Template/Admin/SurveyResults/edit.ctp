<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SurveyResult $surveyResult
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $surveyResult->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $surveyResult->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Survey Results'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Types'), ['controller' => 'UserTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Type'), ['controller' => 'UserTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List New Surveys'), ['controller' => 'NewSurveys', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New New Survey'), ['controller' => 'NewSurveys', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="surveyResults form large-9 medium-8 columns content">
    <?= $this->Form->create($surveyResult) ?>
    <fieldset>
        <legend><?= __('Edit Survey Result') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->control('game_code');

            echo $this->Form->control('user_type_id', ['options' => $userTypes, 'empty' => true]);
            echo $this->Form->control('new_survey_id', ['options' => $newSurveys, 'empty' => true]);
            echo $this->Form->control('answer');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
