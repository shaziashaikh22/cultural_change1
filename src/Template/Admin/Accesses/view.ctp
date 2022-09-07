<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Access $access
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Access'), ['action' => 'edit', $access->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Access'), ['action' => 'delete', $access->id], ['confirm' => __('Are you sure you want to delete # {0}?', $access->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Accesses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Access'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Types'), ['controller' => 'UserTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Type'), ['controller' => 'UserTypes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="accesses view large-9 medium-8 columns content">
    <h3><?= h($access->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Access Name') ?></th>
            <td><?= h($access->access_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Access Description') ?></th>
            <td><?= h($access->access_description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($access->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($access->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($access->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($access->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related User Types') ?></h4>
        <?php if (!empty($access->user_types)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Type Name') ?></th>
                <th scope="col"><?= __('Access Id') ?></th>
                <th scope="col"><?= __('Type Description') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($access->user_types as $userTypes): ?>
            <tr>
                <td><?= h($userTypes->id) ?></td>
                <td><?= h($userTypes->type_name) ?></td>
                <td><?= h($userTypes->access_id) ?></td>
                <td><?= h($userTypes->type_description) ?></td>
                <td><?= h($userTypes->created) ?></td>
                <td><?= h($userTypes->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'UserTypes', 'action' => 'view', $userTypes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'UserTypes', 'action' => 'edit', $userTypes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserTypes', 'action' => 'delete', $userTypes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userTypes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
