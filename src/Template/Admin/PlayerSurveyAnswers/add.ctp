<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PlayerSurveyAnswer $playerSurveyAnswer
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Player Survey Answers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Player Survey Questions'), ['controller' => 'PlayerSurveyQuestions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Player Survey Question'), ['controller' => 'PlayerSurveyQuestions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Types'), ['controller' => 'UserTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Type'), ['controller' => 'UserTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Online Games'), ['controller' => 'OnlineGames', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Online Game'), ['controller' => 'OnlineGames', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="playerSurveyAnswers form large-9 medium-8 columns content">
    <?= $this->Form->create($playerSurveyAnswer) ?>
    <fieldset>
        <legend><?= __('Add Player Survey Answer') ?></legend>
        <?php
            echo $this->Form->control('player_survey_question_id', ['options' => $playerSurveyQuestions, 'empty' => true]);
            echo $this->Form->control('user_type_id', ['options' => $userTypes, 'empty' => true]);
            echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->control('answer_txt');
            echo $this->Form->control('online_game_id', ['options' => $onlineGames, 'empty' => true]);
            echo $this->Form->control('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
