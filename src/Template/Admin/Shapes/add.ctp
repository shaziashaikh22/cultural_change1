<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Shape $shape
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Shapes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Shape Groups'), ['controller' => 'ShapeGroups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Shape Group'), ['controller' => 'ShapeGroups', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="shapes form large-9 medium-8 columns content">
    <?= $this->Form->create($shape) ?>
    <fieldset>
        <legend><?= __('Add Shape') ?></legend>
        <?php
            echo $this->Form->control('shape_name');
            echo $this->Form->control('shape_image');
            echo $this->Form->control('shape_group_id', ['options' => $shapeGroups, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
