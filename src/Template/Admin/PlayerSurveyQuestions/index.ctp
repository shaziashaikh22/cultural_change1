<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PlayerSurveyQuestion[]|\Cake\Collection\CollectionInterface $playerSurveyQuestions
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Player Survey Question'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Player Survey Answers'), ['controller' => 'PlayerSurveyAnswers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Player Survey Answer'), ['controller' => 'PlayerSurveyAnswers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="playerSurveyQuestions index large-9 medium-8 columns content">
    <h3><?= __('Player Survey Questions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('question_txt') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($playerSurveyQuestions as $playerSurveyQuestion): ?>
            <tr>
                <td><?= $this->Number->format($playerSurveyQuestion->id) ?></td>
                <td><?= h($playerSurveyQuestion->question_txt) ?></td>
                <td><?= h($playerSurveyQuestion->status) ?></td>
                <td><?= h($playerSurveyQuestion->created) ?></td>
                <td><?= h($playerSurveyQuestion->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $playerSurveyQuestion->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $playerSurveyQuestion->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $playerSurveyQuestion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $playerSurveyQuestion->id)]) ?>
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
