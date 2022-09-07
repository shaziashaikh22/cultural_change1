<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PlayerSurveyAnswer $playerSurveyAnswer
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Player Survey Answer'), ['action' => 'edit', $playerSurveyAnswer->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Player Survey Answer'), ['action' => 'delete', $playerSurveyAnswer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $playerSurveyAnswer->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Player Survey Answers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Player Survey Answer'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Player Survey Questions'), ['controller' => 'PlayerSurveyQuestions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Player Survey Question'), ['controller' => 'PlayerSurveyQuestions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Types'), ['controller' => 'UserTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Type'), ['controller' => 'UserTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Online Games'), ['controller' => 'OnlineGames', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Online Game'), ['controller' => 'OnlineGames', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="playerSurveyAnswers view large-9 medium-8 columns content">
    <h3><?= h($playerSurveyAnswer->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Player Survey Question') ?></th>
            <td><?= $playerSurveyAnswer->has('player_survey_question') ? $this->Html->link($playerSurveyAnswer->player_survey_question->id, ['controller' => 'PlayerSurveyQuestions', 'action' => 'view', $playerSurveyAnswer->player_survey_question->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Type') ?></th>
            <td><?= $playerSurveyAnswer->has('user_type') ? $this->Html->link($playerSurveyAnswer->user_type->type_name, ['controller' => 'UserTypes', 'action' => 'view', $playerSurveyAnswer->user_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $playerSurveyAnswer->has('user') ? $this->Html->link($playerSurveyAnswer->user->name, ['controller' => 'Users', 'action' => 'view', $playerSurveyAnswer->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Answer Txt') ?></th>
            <td><?= h($playerSurveyAnswer->answer_txt) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Online Game') ?></th>
            <td><?= $playerSurveyAnswer->has('online_game') ? $this->Html->link($playerSurveyAnswer->online_game->id, ['controller' => 'OnlineGames', 'action' => 'view', $playerSurveyAnswer->online_game->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($playerSurveyAnswer->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($playerSurveyAnswer->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($playerSurveyAnswer->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($playerSurveyAnswer->modified) ?></td>
        </tr>
    </table>
</div>
