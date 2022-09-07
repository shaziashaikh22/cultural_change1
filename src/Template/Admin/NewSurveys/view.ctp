<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\NewSurvey $newSurvey
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit New Survey'), ['action' => 'edit', $newSurvey->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete New Survey'), ['action' => 'delete', $newSurvey->id], ['confirm' => __('Are you sure you want to delete # {0}?', $newSurvey->id)]) ?> </li>
        <li><?= $this->Html->link(__('List New Surveys'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New New Survey'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="newSurveys view large-9 medium-8 columns content">
    <h3><?= h($newSurvey->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Survey Title') ?></th>
            <td><?= h($newSurvey->survey_title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Survey Question') ?></th>
            <td><?= h($newSurvey->survey_question) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Survey Answer') ?></th>
            <td><?= h($newSurvey->survey_answer) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Survey Description') ?></th>
            <td><?= h($newSurvey->survey_description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Survey Status') ?></th>
            <td><?= h($newSurvey->survey_status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($newSurvey->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($newSurvey->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($newSurvey->modified) ?></td>
        </tr>
    </table>
</div>
