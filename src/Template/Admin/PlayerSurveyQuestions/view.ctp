<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PlayerSurveyQuestion $playerSurveyQuestion
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Player Survey Question'), ['action' => 'edit', $playerSurveyQuestion->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Player Survey Question'), ['action' => 'delete', $playerSurveyQuestion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $playerSurveyQuestion->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Player Survey Questions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Player Survey Question'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Player Survey Answers'), ['controller' => 'PlayerSurveyAnswers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Player Survey Answer'), ['controller' => 'PlayerSurveyAnswers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="playerSurveyQuestions view large-9 medium-8 columns content">
    <h3><?= h($playerSurveyQuestion->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Question Txt') ?></th>
            <td><?= h($playerSurveyQuestion->question_txt) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($playerSurveyQuestion->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($playerSurveyQuestion->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($playerSurveyQuestion->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($playerSurveyQuestion->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Player Survey Answers') ?></h4>
        <?php if (!empty($playerSurveyQuestion->player_survey_answers)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Player Survey Question Id') ?></th>
                <th scope="col"><?= __('User Type Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Answer Txt') ?></th>
                <th scope="col"><?= __('Online Game Id') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($playerSurveyQuestion->player_survey_answers as $playerSurveyAnswers): ?>
            <tr>
                <td><?= h($playerSurveyAnswers->id) ?></td>
                <td><?= h($playerSurveyAnswers->player_survey_question_id) ?></td>
                <td><?= h($playerSurveyAnswers->user_type_id) ?></td>
                <td><?= h($playerSurveyAnswers->user_id) ?></td>
                <td><?= h($playerSurveyAnswers->answer_txt) ?></td>
                <td><?= h($playerSurveyAnswers->online_game_id) ?></td>
                <td><?= h($playerSurveyAnswers->status) ?></td>
                <td><?= h($playerSurveyAnswers->created) ?></td>
                <td><?= h($playerSurveyAnswers->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PlayerSurveyAnswers', 'action' => 'view', $playerSurveyAnswers->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PlayerSurveyAnswers', 'action' => 'edit', $playerSurveyAnswers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PlayerSurveyAnswers', 'action' => 'delete', $playerSurveyAnswers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $playerSurveyAnswers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
