<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OnlineGame $onlineGame
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Online Game'), ['action' => 'edit', $onlineGame->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Online Game'), ['action' => 'delete', $onlineGame->id], ['confirm' => __('Are you sure you want to delete # {0}?', $onlineGame->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Online Games'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Online Game'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Types'), ['controller' => 'UserTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Type'), ['controller' => 'UserTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Surveys'), ['controller' => 'Surveys', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Survey'), ['controller' => 'Surveys', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Shape Groups'), ['controller' => 'ShapeGroups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Shape Group'), ['controller' => 'ShapeGroups', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Login For Matches'), ['controller' => 'LoginForMatches', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Login For Match'), ['controller' => 'LoginForMatches', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Online Game Histories'), ['controller' => 'OnlineGameHistories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Online Game History'), ['controller' => 'OnlineGameHistories', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="onlineGames view large-9 medium-8 columns content">
    <h3><?= h($onlineGame->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Game Name') ?></th>
            <td><?= h($onlineGame->game_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Game Players Allowed') ?></th>
            <td><?= h($onlineGame->game_players_allowed) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Survey') ?></th>
            <td><?= $onlineGame->has('survey') ? $this->Html->link($onlineGame->survey->id, ['controller' => 'Surveys', 'action' => 'view', $onlineGame->survey->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Shape Group') ?></th>
            <td><?= $onlineGame->has('shape_group') ? $this->Html->link($onlineGame->shape_group->id, ['controller' => 'ShapeGroups', 'action' => 'view', $onlineGame->shape_group->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($onlineGame->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start Time') ?></th>
            <td><?= h($onlineGame->start_time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($onlineGame->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Players Turn') ?></th>
            <td><?= $this->Number->format($onlineGame->players_turn) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($onlineGame->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($onlineGame->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Login For Matches') ?></h4>
        <?php if (!empty($onlineGame->login_for_matches)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Online Game Id') ?></th>
                <th scope="col"><?= __('Round Id') ?></th>
                <th scope="col"><?= __('Phase Id') ?></th>
                <th scope="col"><?= __('Gamecode') ?></th>
                <th scope="col"><?= __('Round Number') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($onlineGame->login_for_matches as $loginForMatches): ?>
            <tr>
                <td><?= h($loginForMatches->id) ?></td>
                <td><?= h($loginForMatches->user_id) ?></td>
                <td><?= h($loginForMatches->online_game_id) ?></td>
                <td><?= h($loginForMatches->round_id) ?></td>
                <td><?= h($loginForMatches->phase_id) ?></td>
                <td><?= h($loginForMatches->gamecode) ?></td>
                <td><?= h($loginForMatches->round_number) ?></td>
                <td><?= h($loginForMatches->status) ?></td>
                <td><?= h($loginForMatches->created) ?></td>
                <td><?= h($loginForMatches->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'LoginForMatches', 'action' => 'view', $loginForMatches->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'LoginForMatches', 'action' => 'edit', $loginForMatches->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'LoginForMatches', 'action' => 'delete', $loginForMatches->id], ['confirm' => __('Are you sure you want to delete # {0}?', $loginForMatches->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Online Game Histories') ?></h4>
        <?php if (!empty($onlineGame->online_game_histories)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Online Game Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Score') ?></th>
                <th scope="col"><?= __('First Round Data') ?></th>
                <th scope="col"><?= __('Second Round Data') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($onlineGame->online_game_histories as $onlineGameHistories): ?>
            <tr>
                <td><?= h($onlineGameHistories->id) ?></td>
                <td><?= h($onlineGameHistories->online_game_id) ?></td>
                <td><?= h($onlineGameHistories->user_id) ?></td>
                <td><?= h($onlineGameHistories->score) ?></td>
                <td><?= h($onlineGameHistories->first_round_data) ?></td>
                <td><?= h($onlineGameHistories->second_round_data) ?></td>
                <td><?= h($onlineGameHistories->created) ?></td>
                <td><?= h($onlineGameHistories->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'OnlineGameHistories', 'action' => 'view', $onlineGameHistories->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'OnlineGameHistories', 'action' => 'edit', $onlineGameHistories->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'OnlineGameHistories', 'action' => 'delete', $onlineGameHistories->id], ['confirm' => __('Are you sure you want to delete # {0}?', $onlineGameHistories->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
