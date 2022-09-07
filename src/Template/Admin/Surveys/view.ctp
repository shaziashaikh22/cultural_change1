<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Survey $survey
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Survey'), ['action' => 'edit', $survey->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Survey'), ['action' => 'delete', $survey->id], ['confirm' => __('Are you sure you want to delete # {0}?', $survey->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Surveys'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Survey'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Question Groups'), ['controller' => 'QuestionGroups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Question Group'), ['controller' => 'QuestionGroups', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Online Games'), ['controller' => 'OnlineGames', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Online Game'), ['controller' => 'OnlineGames', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="surveys view large-9 medium-8 columns content">
    <h3><?= h($survey->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Survey Name') ?></th>
            <td><?= h($survey->survey_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Question Group') ?></th>
            <td><?= $survey->has('question_group') ? $this->Html->link($survey->question_group->id, ['controller' => 'QuestionGroups', 'action' => 'view', $survey->question_group->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($survey->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($survey->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($survey->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($survey->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Online Games') ?></h4>
        <?php if (!empty($survey->online_games)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Game Name') ?></th>
                <th scope="col"><?= __('Game Players Allowed') ?></th>
                <th scope="col"><?= __('Survey Id') ?></th>
                <th scope="col"><?= __('Shape Group Id') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Start Time') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($survey->online_games as $onlineGames): ?>
            <tr>
                <td><?= h($onlineGames->id) ?></td>
                <td><?= h($onlineGames->game_name) ?></td>
                <td><?= h($onlineGames->game_players_allowed) ?></td>
                <td><?= h($onlineGames->survey_id) ?></td>
                <td><?= h($onlineGames->shape_group_id) ?></td>
                <td><?= h($onlineGames->status) ?></td>
                <td><?= h($onlineGames->start_time) ?></td>
                <td><?= h($onlineGames->created) ?></td>
                <td><?= h($onlineGames->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'OnlineGames', 'action' => 'view', $onlineGames->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'OnlineGames', 'action' => 'edit', $onlineGames->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'OnlineGames', 'action' => 'delete', $onlineGames->id], ['confirm' => __('Are you sure you want to delete # {0}?', $onlineGames->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
