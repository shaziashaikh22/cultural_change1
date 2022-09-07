<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Shape $shape
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Shape'), ['action' => 'edit', $shape->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Shape'), ['action' => 'delete', $shape->id], ['confirm' => __('Are you sure you want to delete # {0}?', $shape->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Shapes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Shape'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Shape Groups'), ['controller' => 'ShapeGroups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Shape Group'), ['controller' => 'ShapeGroups', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="shapes view large-9 medium-8 columns content">
    <h3><?= h($shape->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Shape Name') ?></th>
            <td><?= h($shape->shape_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Shape Image') ?></th>
            <td><?= h($shape->shape_image) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Shape Group') ?></th>
            <td><?= $shape->has('shape_group') ? $this->Html->link($shape->shape_group->id, ['controller' => 'ShapeGroups', 'action' => 'view', $shape->shape_group->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($shape->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($shape->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($shape->modified) ?></td>
        </tr>
    </table>
</div>
