<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\GameStep $gameStep
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Game Step'), ['action' => 'edit', $gameStep->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Game Step'), ['action' => 'delete', $gameStep->id], ['confirm' => __('Are you sure you want to delete # {0}?', $gameStep->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Game Steps'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Game Step'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Results'), ['controller' => 'Results', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Result'), ['controller' => 'Results', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="gameSteps view large-9 medium-8 columns content">
    <h3><?= h($gameStep->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Step Name') ?></th>
            <td><?= h($gameStep->step_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($gameStep->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($gameStep->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($gameStep->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($gameStep->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Results') ?></h4>
        <?php if (!empty($gameStep->results)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('User Type Id') ?></th>
                <th scope="col"><?= __('Game Step Id') ?></th>
                <th scope="col"><?= __('Round Id') ?></th>
                <th scope="col"><?= __('Phase Id') ?></th>
                <th scope="col"><?= __('Game Code') ?></th>
                <th scope="col"><?= __('Score') ?></th>
                <th scope="col"><?= __('Given Time') ?></th>
                <th scope="col"><?= __('Start Time') ?></th>
                <th scope="col"><?= __('End Time') ?></th>
                <th scope="col"><?= __('Canvas Image') ?></th>
                <th scope="col"><?= __('Date') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($gameStep->results as $results): ?>
            <tr>
                <td><?= h($results->id) ?></td>
                <td><?= h($results->user_id) ?></td>
                <td><?= h($results->user_type_id) ?></td>
                <td><?= h($results->game_step_id) ?></td>
                <td><?= h($results->round_id) ?></td>
                <td><?= h($results->phase_id) ?></td>
                <td><?= h($results->game_code) ?></td>
                <td><?= h($results->score) ?></td>
                <td><?= h($results->given_time) ?></td>
                <td><?= h($results->start_time) ?></td>
                <td><?= h($results->end_time) ?></td>
                <td><?= h($results->canvas_image) ?></td>
                <td><?= h($results->date) ?></td>
                <td><?= h($results->status) ?></td>
                <td><?= h($results->created) ?></td>
                <td><?= h($results->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Results', 'action' => 'view', $results->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Results', 'action' => 'edit', $results->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Results', 'action' => 'delete', $results->id], ['confirm' => __('Are you sure you want to delete # {0}?', $results->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
