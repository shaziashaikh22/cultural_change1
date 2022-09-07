<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PlayerSurveyQuestion $playerSurveyQuestion
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Player Survey Questions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Player Survey Answers'), ['controller' => 'PlayerSurveyAnswers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Player Survey Answer'), ['controller' => 'PlayerSurveyAnswers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="playerSurveyQuestions form large-9 medium-8 columns content">
    <?= $this->Form->create($playerSurveyQuestion) ?>
    <fieldset>
        <legend><?= __('Add Player Survey Question') ?></legend>
        <?php
            echo $this->Form->control('question_txt');
            echo $this->Form->control('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
