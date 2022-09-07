<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\GameStep $gameStep
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Game Steps'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Results'), ['controller' => 'Results', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Result'), ['controller' => 'Results', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="gameSteps form large-9 medium-8 columns content">
    <?= $this->Form->create($gameStep) ?>
    <fieldset>
        <legend><?= __('Add Game Step') ?></legend>
        <?php
            echo $this->Form->control('step_name');
            echo $this->Form->control('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
