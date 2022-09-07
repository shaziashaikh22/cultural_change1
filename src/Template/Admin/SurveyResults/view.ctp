<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SurveyResult $surveyResult
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Survey Result'), ['action' => 'edit', $surveyResult->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Survey Result'), ['action' => 'delete', $surveyResult->id], ['confirm' => __('Are you sure you want to delete # {0}?', $surveyResult->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Survey Results'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Survey Result'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Types'), ['controller' => 'UserTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Type'), ['controller' => 'UserTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List New Surveys'), ['controller' => 'NewSurveys', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New New Survey'), ['controller' => 'NewSurveys', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="surveyResults view large-9 medium-8 columns content">
    <h3><?= h($surveyResult->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $surveyResult->has('user') ? $this->Html->link($surveyResult->user->name, ['controller' => 'Users', 'action' => 'view', $surveyResult->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Type') ?></th>
            <td><?= $surveyResult->has('user_type') ? $this->Html->link($surveyResult->user_type->id, ['controller' => 'UserTypes', 'action' => 'view', $surveyResult->user_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('New Survey') ?></th>
            <td><?= $surveyResult->has('new_survey') ? $this->Html->link($surveyResult->new_survey->id, ['controller' => 'NewSurveys', 'action' => 'view', $surveyResult->new_survey->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Answer') ?></th>
            <td><?= h($surveyResult->answer) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($surveyResult->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($surveyResult->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($surveyResult->modified) ?></td>
        </tr>
    </table>
</div>
