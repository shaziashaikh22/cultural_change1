<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Result $result
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Result'), ['action' => 'edit', $result->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Result'), ['action' => 'delete', $result->id], ['confirm' => __('Are you sure you want to delete # {0}?', $result->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Results'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Result'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Types'), ['controller' => 'UserTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Type'), ['controller' => 'UserTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Phases'), ['controller' => 'Phases', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Phase'), ['controller' => 'Phases', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Rounds'), ['controller' => 'Rounds', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Round'), ['controller' => 'Rounds', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="results view large-9 medium-8 columns content">
    <h3><?= h($result->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $result->has('user') ? $this->Html->link($result->user->name, ['controller' => 'Users', 'action' => 'view', $result->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Type') ?></th>
            <td><?= $result->has('user_type') ? $this->Html->link($result->user_type->type_name, ['controller' => 'UserTypes', 'action' => 'view', $result->user_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Round') ?></th>
            <td><?= $result->has('round') ? $this->Html->link($result->round->id, ['controller' => 'Rounds', 'action' => 'view', $result->round->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phase') ?></th>
            <td><?= $result->has('phase') ? $this->Html->link($result->phase->id, ['controller' => 'Phases', 'action' => 'view', $result->phase->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Game Code') ?></th>
            <td><?= h($result->game_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Given Time') ?></th>
            <td><?= h($result->given_time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start Time') ?></th>
            <td><?= h($result->start_time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('End Time') ?></th>
            <td><?= h($result->end_time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($result->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($result->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Game Step Id') ?></th>
            <td><?= $this->Number->format($result->game_step_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Score') ?></th>
            <td><?= $this->Number->format($result->score) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($result->date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($result->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($result->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Canvas Image') ?></h4>
        <?= $this->Text->autoParagraph(h($result->canvas_image)); ?>
    </div>
</div>
