<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ShapeGroup $shapeGroup
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Shape Group'), ['action' => 'edit', $shapeGroup->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Shape Group'), ['action' => 'delete', $shapeGroup->id], ['confirm' => __('Are you sure you want to delete # {0}?', $shapeGroup->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Shape Groups'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Shape Group'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Online Games'), ['controller' => 'OnlineGames', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Online Game'), ['controller' => 'OnlineGames', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Shapes'), ['controller' => 'Shapes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Shape'), ['controller' => 'Shapes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="shapeGroups view large-9 medium-8 columns content">
    <h3><?= h($shapeGroup->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Shape Group Name') ?></th>
            <td><?= h($shapeGroup->shape_group_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Shape Group Description') ?></th>
            <td><?= h($shapeGroup->shape_group_description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($shapeGroup->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($shapeGroup->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($shapeGroup->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Online Games') ?></h4>
        <?php if (!empty($shapeGroup->online_games)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Game Name') ?></th>
                <th scope="col"><?= __('Game Players Allowed') ?></th>
                <th scope="col"><?= __('Survey Id') ?></th>
                <th scope="col"><?= __('Shape Group Id') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Start Time') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($shapeGroup->online_games as $onlineGames): ?>
            <tr>
                <td><?= h($onlineGames->id) ?></td>
                <td><?= h($onlineGames->game_name) ?></td>
                <td><?= h($onlineGames->game_players_allowed) ?></td>
                <td><?= h($onlineGames->survey_id) ?></td>
                <td><?= h($onlineGames->shape_group_id) ?></td>
                <td><?= h($onlineGames->status) ?></td>
                <td><?= h($onlineGames->start_time) ?></td>
                <td><?= h($onlineGames->created) ?></td>
                <td><?= h($onlineGames->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'OnlineGames', 'action' => 'view', $onlineGames->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'OnlineGames', 'action' => 'edit', $onlineGames->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'OnlineGames', 'action' => 'delete', $onlineGames->id], ['confirm' => __('Are you sure you want to delete # {0}?', $onlineGames->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Shapes') ?></h4>
        <?php if (!empty($shapeGroup->shapes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Shape Name') ?></th>
                <th scope="col"><?= __('Shape Image') ?></th>
                <th scope="col"><?= __('Shape Group Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($shapeGroup->shapes as $shapes): ?>
            <tr>
                <td><?= h($shapes->id) ?></td>
                <td><?= h($shapes->shape_name) ?></td>
                <td><?= h($shapes->shape_image) ?></td>
                <td><?= h($shapes->shape_group_id) ?></td>
                <td><?= h($shapes->created) ?></td>
                <td><?= h($shapes->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Shapes', 'action' => 'view', $shapes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Shapes', 'action' => 'edit', $shapes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Shapes', 'action' => 'delete', $shapes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $shapes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
