<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\LoginForMatch $loginForMatch
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $loginForMatch->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $loginForMatch->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Login For Matches'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Online Games'), ['controller' => 'OnlineGames', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Online Game'), ['controller' => 'OnlineGames', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="loginForMatches form large-9 medium-8 columns content">
    <?= $this->Form->create($loginForMatch) ?>
    <fieldset>
        <legend><?= __('Edit Login For Match') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->control('online_game_id', ['options' => $onlineGames, 'empty' => true]);
            echo $this->Form->control('gamecode');
            echo $this->Form->control('round_number');
            echo $this->Form->control('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
