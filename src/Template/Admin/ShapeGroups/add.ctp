<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ShapeGroup $shapeGroup
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Shape Groups'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Online Games'), ['controller' => 'OnlineGames', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Online Game'), ['controller' => 'OnlineGames', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Shapes'), ['controller' => 'Shapes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Shape'), ['controller' => 'Shapes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="shapeGroups form large-9 medium-8 columns content">
    <?= $this->Form->create($shapeGroup) ?>
    <fieldset>
        <legend><?= __('Add Shape Group') ?></legend>
        <?php
            echo $this->Form->control('shape_group_name');
            echo $this->Form->control('shape_group_description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
