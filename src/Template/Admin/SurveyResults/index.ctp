<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SurveyResult[]|\Cake\Collection\CollectionInterface $surveyResults
 */
?>
<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Cultural Change Admin';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="icon" href="img/log.png">

    <!--  <title>NutFlix - admin</title>-->
    <style>
        th a {
            /* cursor: pointer; */
            color: #009B91;
            pointer-events: none;
        }

        td a {
            color: black;
        }

        .spn-cls {
            padding: 20px;
            box-shadow: 0px 6px 10px 0px #c8d1d9;
            border-bottom: 1px solid #e3eaf1;
            width: 150px;
            display: flex;
            background: white;
            color: #009B91;
        }

        .close-btn {
            position: absolute;
            background: #009B91;
            color: white;
            border-radius: 50%;
            /* top: -10px; */
            right: 30px;
        }
    </style>
</head>

<body>
    <!-- start admin -->
    <section id="admin">
        <!-- start sidebar -->
        <div class="sidebar" style="overflow-x: hidden;">
            <!-- start with head -->
            <div class="head">
                <div class="logo">
                    <img src="<?php echo $this->request->webroot; ?>img/logomain.png" alt="">
                </div>
                <!-- <p class="btn btn-danger pointnone">Cultural Change Admin</p> -->
            </div>
            <!-- end with head -->
            <!-- start the list -->
            <div id="list">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <?php echo $this->Html->link(
                            '<img src=' . $this->request->webroot . 'img/dashboard.png style = vertical-align:sub;>' . 'Dashboard',
                            ['controller' => 'Users', 'action' => 'dashboard'],
                            ['class' => 'nav-link', 'escape' => false],
                        ); ?>
                    </li>

                    <li class="nav-item">
                        <?php echo $this->Html->link(
                            '<img src=' . $this->request->webroot . 'img/user.png style = vertical-align:sub;width:20px;height:20px;>' . 'Users',
                            ['controller' => 'Users', 'action' => 'index'],
                            ['class' => 'nav-link', 'escape' => false]
                        ); ?></li>

                    <li class="nav-item">
                        <?php echo $this->Html->link(
                            '<img src=' . $this->request->webroot . 'img/settings.png style = vertical-align:sub;width:20px;height:20px;>' . 'Settings',
                            ['controller' => 'Users', 'action' => 'settings'],
                            ['class' => 'nav-link', 'escape' => false]
                        ); ?></li>

                    <li class="nav-item">
                        <?php echo $this->Html->link(
                            '<img src=' . $this->request->webroot . 'img/adminprofile.png style = vertical-align:sub;width:20px;height:20px;>' . 'Admin Profile',
                            ['controller' => 'Users', 'action' => 'adminprofile'],
                            ['class' => 'nav-link', 'escape' => false]
                        ); ?></li>

                    <li class="nav-item">
                        <?php echo $this->Html->link(
                            '<img src=' . $this->request->webroot . 'img/security.png style = vertical-align:sub;width:20px;height:20px;>' . 'Security',
                            ['controller' => 'Users', 'action' => 'security'],
                            ['class' => 'nav-link', 'escape' => false]
                        ); ?></li>

                    <li class="nav-item">
                        <?php echo $this->Html->link(
                            '<img src=' . $this->request->webroot . 'img/planning&build.png style = vertical-align:sub;width:20px;height:20px;>' . 'Planning & Building',
                            ['controller' => 'UserTypes', 'action' => 'index'],
                            ['class' => 'nav-link', 'escape' => false]
                        ); ?></li>

                    <li class="nav-item">
                        <?php echo $this->Html->link(
                            '<img src=' . $this->request->webroot . 'img/analysis&Survey.png style = vertical-align:sub;width:15px;height:15px;>' . 'Analysis & Survey',
                            ['controller' => 'NewSurveys', 'action' => 'index'],
                            ['class' => 'nav-link', 'escape' => false]
                        ); ?></li>

                    <li class="nav-item">
                        <?php echo $this->Html->link(
                            '<img src=' . $this->request->webroot . 'img/creategames.png style = vertical-align:sub;width:15px;height:15px;>' . 'Create Games',
                            ['controller' => 'Users', 'action' => 'creategames'],
                            ['class' => 'nav-link', 'escape' => false]
                        ); ?></li>

                    <li class="nav-item">
                        <?php echo $this->Html->link(
                            '<img src=' . $this->request->webroot . 'img/report.png style = vertical-align:sub;width:15px;height:15px;>' . 'Overview',
                            ['controller' => 'Users', 'action' => 'dashboard'],
                            ['class' => 'nav-link', 'escape' => false]
                        ); ?></li>
                    <li class="nav-item">
                        <?php echo $this->Html->link(
                            '<img src=' . $this->request->webroot . 'img/report.png style = vertical-align:sub;width:15px;height:15px;>' . 'Survey Results',
                            ['controller' => 'SurveyResults', 'action' => 'index'],
                            ['class' => 'nav-link active', 'escape' => false]
                        ); ?></li>
<li class="nav-item">
            <?php echo $this->Html->link(
              '<img src=' . $this->request->webroot . 'img/report.png style = vertical-align:sub;width:15px;height:15px;>' . 'Game codes',
              ['controller' => 'OnlineGames', 'action' => 'index'],
              ['class' => 'nav-link', 'escape' => false]
            ); ?></li>


                </ul>
            </div>
            <!-- end the list -->
        </div>
        <!-- end sidebar -->
        <!-- start content -->
        <div class="content">
            <!-- start content head -->
            <div class="head">
                <!-- head top -->
                <div class="top">
                    <div class="left">
                        <button id="on" class="btn btn-info"><i class="fa fa-bars"></i></button>
                        <button id="off" class="btn btn-info hide"><i class="fa fa-align-left"></i></button><span style="
    font-weight: bold;font-size: 20px;">Survey Results</span>
                    </div>
                    <div class="right">
                    </div>
                </div>
                <!-- end head top -->
                <!-- start head bottom -->
                <div class="bottom" style="box-shadow: none;border-bottom: none;">
                    <div class="left">
                        <h1>Cultural Change - Buhler</h1>
                    </div>
                    <div class="right">
                        <!-- <?= $this->Html->link(__('Add New User'), ['action' => 'add'], ["class" => "btn btn-primary"]) ?> -->
                    </div>
                </div>

                <!-- end head bottom -->
            </div>

            <div class="col-sm-12">

                <table class="table table-hover">
                    <thead>
                        <tr style="color:green">
                            <!-- <th scope="col"><?= $this->Paginator->sort('id') ?></th> -->
                            <th scope="col"><?= $this->Paginator->sort('DATE') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('GAME ID') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('USER ID') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('QUESTION') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('RESPONSE') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($surveyResults as $surveyResult) : ?>
                            <tr style="border-bottom: 2px solid #dee2e6;background:white">
                                <td><?= h($surveyResult->created) ?></td>
                                <td><?= h($surveyResult->game_code) ?></td>
                                <td><?= $surveyResult->has('user_type') ? $this->Html->link($surveyResult->user_type->type_name, ['controller' => 'UserTypes', 'action' => 'view', $surveyResult->user_type->id], ['style' => "pointer-events: none;"]) : '' ?></td>
                                <td><?= $surveyResult->has('new_survey') ? $this->Html->link($surveyResult->new_survey->survey_question, ['controller' => 'NewSurveys', 'action' => 'view', $surveyResult->new_survey->id], ['style' => "pointer-events: none;"]) : '' ?></td>
                                <td class="view" id="<?= $surveyResult->id; ?>" data-value="<?= $surveyResult->answer; ?>"><?= $this->Html->link(__('CLICK TO VIEW'), '#', ['id' => 'sami', 'style' => "color: #009B91;"]); ?>
                                    <div id="view-content<?= $surveyResult->id; ?>" class="view-content" style="display: none;">
                                        <!-- <button class="btn close-btn" id = "<?= $surveyResult->id; ?>"> 
                                        X
                                    </button> -->
                                        <span class="spn-cls">
                                            <?= $surveyResult->answer; ?></span>
                                    </div>
                                </td>

                                <!-- <td><?= $this->Html->link(__('CLICK TO VIEW'), ['action' => 'view', $surveyResult->id]) ?> -->
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="paginator">
                    <ul class="pagination">
                        <?= $this->Paginator->first('<< ' . __('first')) ?>
                        <?= $this->Paginator->prev('< ' . __('previous')) ?>
                        <?= $this->Paginator->numbers() ?>
                        <?= $this->Paginator->next(__('next') . ' >') ?>
                        <?= $this->Paginator->last(__('last') . ' >>') ?>
                    </ul>
                    <!-- <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p> -->
                </div>


            </div>

        </div>
        <script>
            $(document).ready(function() {
                $('.view').on('click', function() {
                    var id = $(this).attr('id');
                    if ($('#view-content' + id).css('display') == 'none') {
                        $(this).children('#view-content' + id).css("display", "block");
                    } else {
                        $(this).children('#view-content' + id).css("display", "none");
                    }
                });
            })
        </script>
</body>

</html>



<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Survey Result'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Types'), ['controller' => 'UserTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Type'), ['controller' => 'UserTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List New Surveys'), ['controller' => 'NewSurveys', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New New Survey'), ['controller' => 'NewSurveys', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="surveyResults index large-9 medium-8 columns content">
    <h3><?= __('Survey Results') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_type_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('new_survey_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('answer') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($surveyResults as $surveyResult) : ?>
            <tr>
                <td><?= $this->Number->format($surveyResult->id) ?></td>
                <td><?= $surveyResult->has('user') ? $this->Html->link($surveyResult->user->name, ['controller' => 'Users', 'action' => 'view', $surveyResult->user->id]) : '' ?></td>
                <td><?= $surveyResult->has('user_type') ? $this->Html->link($surveyResult->user_type->id, ['controller' => 'UserTypes', 'action' => 'view', $surveyResult->user_type->id]) : '' ?></td>
                <td><?= $surveyResult->has('new_survey') ? $this->Html->link($surveyResult->new_survey->id, ['controller' => 'NewSurveys', 'action' => 'view', $surveyResult->new_survey->id]) : '' ?></td>
                <td><?= h($surveyResult->answer) ?></td>
                <td><?= h($surveyResult->created) ?></td>
                <td><?= h($surveyResult->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $surveyResult->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $surveyResult->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $surveyResult->id], ['confirm' => __('Are you sure you want to delete # {0}?', $surveyResult->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div> -->