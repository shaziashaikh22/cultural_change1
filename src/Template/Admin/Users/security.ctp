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
                            ['class' => 'nav-link', 'escape' => false]
                        ); ?></li>

                    <li class="nav-item">
                        <?php echo $this->Html->link(
                            '<img src=' . $this->request->webroot . 'img/security.png style = vertical-align:sub;width:20px;height:20px;>' . 'Security',
                            // '<i class="fa fa-lock"></i>'.'Security',
                            ['controller' => 'Users', 'action' => 'security'],
                            ['class' => 'nav-link active', 'escape' => false]
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
">Security</span>
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
                <div class="bottom" style="box-shadow: none;border-bottom: none;">
                    <div class="left">
                        <h1>Cultural Change - Buhler</h1>
                    </div>
                    <div class="right">
                    </div>
                </div>

                <!-- end head bottom -->
            </div>

            <div class="col-sm-12 security-main">
                <div class="row">
                    <!-- 1 -->
                    <div class="col-md-4"></div>
                    <div class="col-md-2" style="margin-bottom:7px;padding-right:0px;">
                        <div class="sec-txt">
                            USER NAME
                        </div>
                    </div>
                    <div class="col-md-1" style="margin-bottom:7px; padding-left:0px;">
                        <div class="sec-txt" style="text-align: center;">
                            <img src="<?php echo $this->request->webroot; ?>img/arrow-right.png" width="20px;">
                        </div>
                    </div>
                    <div class="col-md-4"></div>
                </div>

                <div class="row">
                    <!-- 1 -->
                    <div class="col-md-4"></div>
                    <div class="col-md-2" style="margin-bottom:7px;padding-right:0px;">
                        <div class="sec-txt">
                            EMAIL ADDRESSES
                        </div>
                    </div>
                    <div class="col-md-1" style="margin-bottom:7px; padding-left:0px;">
                        <div class="sec-txt" style="text-align: center;cursor:pointer;" id="email-txt-btn">
                            <img src="<?php echo $this->request->webroot; ?>img/arrow-right.png" width="20px;">
                        </div>
                    </div>
                    <div class="col-md-4"></div>
                </div>

                <div class="row">
                    <!-- 1 -->
                    <div class="col-md-4"></div>
                    <div class="col-md-2" style="margin-bottom:7px;padding-right:0px;">
                        <div class="sec-txt">
                            PASSWORD
                        </div>
                    </div>
                    <div class="col-md-1" style="margin-bottom:7px; padding-left:0px;">
                        <div class="sec-txt" style="text-align: center;cursor:pointer;" id="password-txt-btn">
                            <img src="<?php echo $this->request->webroot; ?>img/arrow-right.png" width="20px;">
                        </div>
                    </div>
                    <div class="col-md-4"></div>
                </div>

                <div class="row">
                    <!-- 1 -->
                    <div class="col-md-4"></div>
                    <div class="col-md-2" style="margin-bottom:7px;padding-right:0px;">
                        <div class="sec-txt">
                            TITLE
                        </div>
                    </div>
                    <div class="col-md-1" style="margin-bottom:7px; padding-left:0px;">
                        <div class="sec-txt" style="text-align: center;">
                            <img src="<?php echo $this->request->webroot; ?>img/arrow-right.png" width="20px;">
                        </div>
                    </div>
                    <div class="col-md-4"></div>
                </div>
            </div>

            <!-- edit email section -->
            <div class="col-sm-12 security-email-edit" style="display: none;">
                <div class="row">
                    <!-- 1 -->
                    <div class="col-md-4"></div>
                    <div class="col-md-2" style="margin-bottom:7px;padding-right:0px;">
                        <div style="padding: 15px;font-size: 15px;font-family: 'Nunito';font-weight: bold;">
                            EMAIL ADDED
                        </div>
                    </div>
                    <div class="col-md-4"></div>
                </div>

                <div class="row">
                    <!-- 1 -->
                    <div class="col-md-4"></div>
                    <div class="col-md-3" style="margin-bottom:7px;padding-right:0px;">
                        <div class="sec-txt" style="color: grey;">
                            <?= $user['email']; ?>
                        </div>
                    </div>
                    <div class="col-md-4"></div>
                </div>

                <div class="row">
                    <!-- 1 -->
                    <div class="col-md-4"></div>
                    <div class="col-md-2" style="margin-bottom:7px;padding-right:0px;">
                        <div style="color: #9eaab5fa;
                    font-size: 15px;font-family: 'Nunito';font-weight: bold;padding:15px 15px 5px 15px;">
                            Primary Email
                        </div>
                    </div>
                    <div class="col-md-4"></div>
                </div>

                <div class="row">
                    <!-- 1 -->
                    <div class="col-md-4"></div>
                    <div class="col-md-3" style="margin-bottom:7px;padding-right:0px;padding-left:60px;">
                        <button class="btn btn-primary edit-emailtxt" style="background-color: #009B91;border-radius: 0px;" id="addnewemailbtn">
                            Add Email Address
                        </button>
                    </div>
                    <div class="col-md-6"></div>
                </div>
                <?= $this->Form->create('', ['type' => 'POST', 'url' => ['action' => 'editEmail']]) ?>

                <div class="row" id="div-email" style="display: none;">
                    <!-- 1 -->
                    <div class="col-md-4"></div>
                    <div class="col-md-3" style="margin-top: 20px;padding-right:0px;">
                        <input type="text" class="form-control" name="edit_email" id="editEmailID" value="" placeholder="Enter Your New Email" required>
                    </div>
                    <div class="col-md-1" style="padding-left: 0px;margin-top: 20px;">
                        <button class="btn btn-primary" style="background-color: #009B91;box-shadow: 0px 6px 10px 0px rgb(0 0 0 / 48%);height:40px;">
                            Update
                        </button>
                    </div>
                </div>
            </div>
            <?= $this->Form->end(); ?>

            <!-- edit password             -->
            <div class="col-sm-12 security-password-edit" style="display: none;">
                <div class="row">
                    <!-- 1 -->
                    <div class="col-md-4"></div>
                    <div class="col-md-3" style="margin-bottom:7px;padding-right:0px;">
                        <div style="padding: 15px;font-size: 15px;font-family: 'Nunito';font-weight: bold;">
                            CHANGE PASSWORD
                        </div>
                    </div>
                    <div class="col-md-4"></div>
                </div>

                <div class="row">
                    <!-- old password field -->
                    <div class="col-md-4"></div>
                    <div class="col-md-3" style="margin-bottom:3px;padding-right:0px;">
                        <div class="sec-txt" style="color: grey;padding-top:5px;">
                            <span>Old Password</span>
                            <input type="hidden" id="old_passwordID" value="" />
                            <input type="text" name="old_password" id="old_password" value="" />
                        </div>
                    </div>
                    <div class="col-md-4"></div>
                </div>

                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4" id="passmatch_divID" style="display: none;">
                        <span style="color: lightseagreen;font-size: 12px;">Password Matched !</span>
                    </div>
                    <div class="col-md-4"></div>
                </div>

                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4" id="passnotmatch_divID" style="display: none;">
                        <span style="color: red;font-size: 12px;">Password not Matched !</span>
                    </div>
                    <div class="col-md-4"></div>
                </div>

                <?= $this->Form->create('', ['type' => 'POST', 'url' => ['action' => 'editpassword']]) ?>

                <div class="row">
                    <!-- new password field -->
                    <div class="col-md-4"></div>
                    <div class="col-md-3" style="margin-bottom:3px;padding-right:0px;">
                        <div class="sec-txt" style="color: grey;padding-top:5px;">
                            <span>New Password</span>
                            <input type="password" name="new_password" id="new_password" value="" />
                        </div>
                    </div>
                    <div class="col-md-4"></div>
                </div>

                <div class="row">
                    <!-- confirm password field -->
                    <div class="col-md-4"></div>
                    <div class="col-md-3" style="margin-bottom:3px;padding-right:0px;">
                        <div class="sec-txt" style="color: grey;padding-top:5px;">
                            <span>Confirm Password</span>
                            <input type="password" name="confirm_password" id="confirm_password" value="" />
                        </div>
                    </div>
                    <div class="col-md-4"></div>
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4" id="confpassmatch_divID" style="display: none;">
                        <span style="color: red;font-size: 12px;">Confirm password not Matched !</span>
                    </div>
                    <div class="col-md-4"></div>
                </div>
                <br>

                <div class="row">
                    <!-- Change Password Button -->
                    <div class="col-md-4"></div>
                    <div class="col-md-3">
                        <button typy="submit"  class="btn btn-primary changepass-btn" style="background-color: #009B91;box-shadow: 0px 6px 10px 0px rgb(0 0 0 / 48%);height:50px;margin-left:30px">
                            CHANGE PASSWORD
                        </button>
                    </div>
                    <div class="col-md-4"></div>
                </div>
                <?= $this->Form->end(); ?>

            </div>
            <!-- End edit password -->


        </div>
        <script>
            $(document).ready(function() {
                // $(".security-email-edit").css("display", "none");
                // $(".security-password-edit").css("display", "none");

                $('#email-txt-btn').on('click', function() {
                    $(".security-main").css("display", "none");
                    $(".security-email-edit").css("display", "block");

                });
                $('#addnewemailbtn').on('click', function() {
                    $('#addnewemailbtn').add().css("background-color", "lightgrey")
                    $('#addnewemailbtn').add().css("pointer-events", "none")
                    $('#div-email').show();
                });

                $('#password-txt-btn').on('click', function() {
                    $(".security-main").css("display", "none");
                    $(".security-password-edit").css("display", "block");

                });

                var localpassword = localStorage.getItem("password");
                $('#old_password').on('keyup', function() {
                    var enterpass = $(this).val();
                    if (enterpass == localpassword) {
                        $("#passmatch_divID").css("display", "block");
                        $("#passnotmatch_divID").css("display", "none");
                        // localStorage.removeItem("id");
                    } else {
                        $("#passnotmatch_divID").css("display", "block");
                        $("#passmatch_divID").css("display", "none");
                        // localStorage.removeItem("id");
                    }
                })
                $('#confirm_password').on('keyup', function() {
                    var newenteredpassword = $('#new_password').val();
                    var enteredconfirmpass = $(this).val();
                    if (newenteredpassword == enteredconfirmpass) {
                        $("#confpassmatch_divID").css("display", "none");
                        $('.changepass-btn').prop('disabled', false);
                    } else {
                        $("#confpassmatch_divID").css("display", "block");
                        $('.changepass-btn').prop('disabled', true);
                    }
                })

            })
        </script>
</body>

</html>