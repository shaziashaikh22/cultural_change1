<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
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
        .pointnone {
            pointer-events: none;
        }

        th {
            cursor: pointer;
            color: #007bff;

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
                            //  '<i class="fa fa-home"></i>'.'Dashboard',
                            ['controller' => 'Users', 'action' => 'dashboard'],
                            ['class' => 'nav-link', 'escape' => false],
                        ); ?>
                    </li>

                    <li class="nav-item">
                        <?php echo $this->Html->link(
                            '<img src=' . $this->request->webroot . 'img/user.png style = vertical-align:sub;width:20px;height:20px;>' . 'Users',
                            // '<i class="fa fa-users"></i>'.'User',
                            ['controller' => 'Users', 'action' => 'index'],
                            ['class' => 'nav-link', 'escape' => false]
                        ); ?></li>


                    <!-- <li class="nav-item">
    <?php echo $this->Html->link(
        '<img src=' . $this->request->webroot . 'img/report.png style = vertical-align:sub;width:20px;height:20px;>' . 'Report',
        // '<i class="fa fa-clone"></i>'.'Report',
        ['controller' => 'Reports', 'action' => 'index'],
        ['class' => 'nav-link', 'escape' => false]
    ); ?></li> -->

                    <li class="nav-item">
                        <?php echo $this->Html->link(
                            '<img src=' . $this->request->webroot . 'img/settings.png style = vertical-align:sub;width:20px;height:20px;>' . 'Settings',
                            // '<i class="fa fa-cog"></i>'.'Settings',
                            ['controller' => 'Users', 'action' => 'settings'],
                            ['class' => 'nav-link', 'escape' => false]
                        ); ?></li>

                    <li class="nav-item">
                        <?php echo $this->Html->link(
                            '<img src=' . $this->request->webroot . 'img/adminprofile.png style = vertical-align:sub;width:20px;height:20px;>' . 'Admin Profile',
                            // '<i class="fa fa-user-circle"></i>'.'Admin Profile',
                            ['controller' => 'Users', 'action' => 'adminprofile'],
                            ['class' => 'nav-link active', 'escape' => false]
                        ); ?></li>

                    <li class="nav-item">
                        <?php echo $this->Html->link(
                            '<img src=' . $this->request->webroot . 'img/security.png style = vertical-align:sub;width:20px;height:20px;>' . 'Security',
                            // '<i class="fa fa-lock"></i>'.'Security',
                            ['controller' => 'Users', 'action' => 'security'],
                            ['class' => 'nav-link', 'escape' => false]
                        ); ?></li>

                    <li class="nav-item">
                        <?php echo $this->Html->link(
                            '<img src=' . $this->request->webroot . 'img/planning&build.png style = vertical-align:sub;width:20px;height:20px;>' . 'Planning & Building',
                            //  '<i class="fa fa-puzzle-piece"></i>'. 'Planning & Building',
                            ['controller' => 'UserTypes', 'action' => 'index'],
                            ['class' => 'nav-link', 'escape' => false]
                        ); ?></li>

                    <li class="nav-item">
                        <?php echo $this->Html->link(
                            '<img src=' . $this->request->webroot . 'img/analysis&Survey.png style = vertical-align:sub;width:15px;height:15px;>' . 'Analysis & Survey',
                            // '<i class="fa fa-hashtag"></i>'.'Analysis & Survey',
                            ['controller' => 'NewSurveys', 'action' => 'index'],
                            ['class' => 'nav-link', 'escape' => false]
                        ); ?></li>

                    <li class="nav-item">
                        <?php echo $this->Html->link(
                            '<img src=' . $this->request->webroot . 'img/creategames.png style = vertical-align:sub;width:15px;height:15px;>' . 'Create Games',
                            // '<i class="fa fa-gamepad"></i>'.'Create Games',
                            ['controller' => 'Users', 'action' => 'creategames'],
                            ['class' => 'nav-link', 'escape' => false]
                        ); ?></li>

                    <li class="nav-item">
                        <?php echo $this->Html->link(
                            '<img src=' . $this->request->webroot . 'img/report.png style = vertical-align:sub;width:15px;height:15px;>' . 'Overview',
                            // '<i class="fa fa-users"></i>'.'Overview',
                            ['controller' => 'Users', 'action' => 'dashboard'],
                            ['class' => 'nav-link', 'escape' => false]
                        ); ?></li>
                    <li class="nav-item">
                        <?php echo $this->Html->link(
                            '<img src=' . $this->request->webroot . 'img/report.png style = vertical-align:sub;width:15px;height:15px;>' . 'Survey Results',
                            ['controller' => 'SurveyResults', 'action' => 'index'],
                            ['class' => 'nav-link', 'escape' => false]
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
    font-weight: bold;
    font-size: 20px;
">Admin Profile</span>
                    </div>
                    <div class="right">
                        <div class="dropdown">
                            <input type="date" class="form-control" value="<?= date('Y-m-d'); ?>">
                        </div>
                    </div>
                    <div class="right">&nbsp;&nbsp;
                        <?php
                        echo $this->Html->link(
                            'Log out',
                            ['controller' => 'Users', 'action' => 'logout'],
                            ['class' => 'btn btn-info']

                        );
                        ?>
                    </div>


                </div>
                <!-- end head top -->
                <!-- start head bottom -->
                <div class="bottom" style="box-shadow: none;
    border-bottom: none;">
                    <div class="left">
                        <h1>Cultural Change - Buhler</h1>
                    </div>
                    <div class="right">
                    </div>
                </div>

                <!-- end head bottom -->
            </div>
            <div class="col-sm-12">

                <div class="row">
                    <!-- 1 -->
                    <div class="col-md-2"></div>
                    <div class="col-md-3">
                        <span class="protxt">
                            Profile
                        </span>
                    </div>
                    <div class="col-md-3"></div>
                    <div class="col-md-3"></div>
                </div><br>
                <div class="row">
                    <!-- 1 -->
                    <div class="col-md-3"></div>
                    <div class="col-md-3" style="padding-right: 0px;">
                        <div class="adminsetngtxt">
                            User Name
                        </div>
                    </div>
                    <div class="col-md-3" style="padding-left: 0px;">
                        <div class="adminsetngtxt2">
                            <?= $user['name']; ?>
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                </div>

                <div class="row">
                    <!-- 2 -->
                    <div class="col-md-3"></div>
                    <div class="col-md-3" style="padding-right: 0px;">
                        <div class="adminsetngtxt">
                            Email Address
                        </div>
                    </div>
                    <div class="col-md-3" style="padding-left: 0px;">
                        <div class="adminsetngtxt2">
                            <?= $user['email']; ?>
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                </div>

                <div class="row">
                    <!-- 2 -->
                    <div class="col-md-3"></div>
                    <div class="col-md-3" style="padding-right: 0px;">
                        <div class="adminsetngtxt">
                            Password
                        </div>
                    </div>
                    <div class="col-md-3" style="padding-left: 0px;">
                        <div class="adminsetngtxt2">
                            *****
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                </div>

                <div class="row">
                    <!-- 2 -->
                    <div class="col-md-3"></div>
                    <div class="col-md-3" style="padding-right: 0px;">
                        <div class="adminsetngtxt">
                            Full Name
                        </div>
                    </div>
                    <div class="col-md-3" style="padding-left: 0px;">
                        <div class="adminsetngtxt2">
                            <?= $user['name']; ?>
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                </div>

                <div class="row">
                    <!-- 2 -->
                    <div class="col-md-3"></div>
                    <div class="col-md-3" style="padding-right: 0px;">
                        <div class="adminsetngtxt">
                            Title
                        </div>
                    </div>
                    <div class="col-md-3" style="padding-left: 0px;">
                        <div class="adminsetngtxt2">
                            Administrator
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                </div>

            </div>
        </div>
</body>

</html>