<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PlayerSurveyAnswer[]|\Cake\Collection\CollectionInterface $playerSurveyAnswers
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Player Survey Answer'), ['action' => 'add']) ?></li>
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
<div class="playerSurveyAnswers index large-9 medium-8 columns content">
    <h3><?= __('Player Survey Answers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('player_survey_question_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_type_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('answer_txt') ?></th>
                <th scope="col"><?= $this->Paginator->sort('online_game_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($playerSurveyAnswers as $playerSurveyAnswer): ?>
            <tr>
                <td><?= $this->Number->format($playerSurveyAnswer->id) ?></td>
                <td><?= $playerSurveyAnswer->has('player_survey_question') ? $this->Html->link($playerSurveyAnswer->player_survey_question->id, ['controller' => 'PlayerSurveyQuestions', 'action' => 'view', $playerSurveyAnswer->player_survey_question->id]) : '' ?></td>
                <td><?= $playerSurveyAnswer->has('user_type') ? $this->Html->link($playerSurveyAnswer->user_type->type_name, ['controller' => 'UserTypes', 'action' => 'view', $playerSurveyAnswer->user_type->id]) : '' ?></td>
                <td><?= $playerSurveyAnswer->has('user') ? $this->Html->link($playerSurveyAnswer->user->name, ['controller' => 'Users', 'action' => 'view', $playerSurveyAnswer->user->id]) : '' ?></td>
                <td><?= h($playerSurveyAnswer->answer_txt) ?></td>
                <td><?= $playerSurveyAnswer->has('online_game') ? $this->Html->link($playerSurveyAnswer->online_game->id, ['controller' => 'OnlineGames', 'action' => 'view', $playerSurveyAnswer->online_game->id]) : '' ?></td>
                <td><?= h($playerSurveyAnswer->status) ?></td>
                <td><?= h($playerSurveyAnswer->created) ?></td>
                <td><?= h($playerSurveyAnswer->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $playerSurveyAnswer->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $playerSurveyAnswer->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $playerSurveyAnswer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $playerSurveyAnswer->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
