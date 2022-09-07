<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\QuestionGroup $questionGroup
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Question Group'), ['action' => 'edit', $questionGroup->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Question Group'), ['action' => 'delete', $questionGroup->id], ['confirm' => __('Are you sure you want to delete # {0}?', $questionGroup->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Question Groups'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Question Group'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Questions'), ['controller' => 'Questions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Question'), ['controller' => 'Questions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Surveys'), ['controller' => 'Surveys', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Survey'), ['controller' => 'Surveys', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="questionGroups view large-9 medium-8 columns content">
    <h3><?= h($questionGroup->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Question Group Name') ?></th>
            <td><?= h($questionGroup->question_group_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Question Group Description') ?></th>
            <td><?= h($questionGroup->question_group_description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Question Status') ?></th>
            <td><?= h($questionGroup->question_status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($questionGroup->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($questionGroup->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($questionGroup->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Questions') ?></h4>
        <?php if (!empty($questionGroup->questions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Question Type') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Answer') ?></th>
                <th scope="col"><?= __('Question Group Id') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($questionGroup->questions as $questions): ?>
            <tr>
                <td><?= h($questions->id) ?></td>
                <td><?= h($questions->question_type) ?></td>
                <td><?= h($questions->description) ?></td>
                <td><?= h($questions->answer) ?></td>
                <td><?= h($questions->question_group_id) ?></td>
                <td><?= h($questions->status) ?></td>
                <td><?= h($questions->created) ?></td>
                <td><?= h($questions->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Questions', 'action' => 'view', $questions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Questions', 'action' => 'edit', $questions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Questions', 'action' => 'delete', $questions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $questions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Surveys') ?></h4>
        <?php if (!empty($questionGroup->surveys)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Survey Name') ?></th>
                <th scope="col"><?= __('Question Group Id') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($questionGroup->surveys as $surveys): ?>
            <tr>
                <td><?= h($surveys->id) ?></td>
                <td><?= h($surveys->survey_name) ?></td>
                <td><?= h($surveys->question_group_id) ?></td>
                <td><?= h($surveys->status) ?></td>
                <td><?= h($surveys->created) ?></td>
                <td><?= h($surveys->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Surveys', 'action' => 'view', $surveys->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Surveys', 'action' => 'edit', $surveys->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Surveys', 'action' => 'delete', $surveys->id], ['confirm' => __('Are you sure you want to delete # {0}?', $surveys->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
