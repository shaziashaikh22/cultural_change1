<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
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
              //  '<i class="fa fa-puzzle-piece"></i>'. 'Planning & Building',
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
              ['class' => 'nav-link active', 'escape' => false]
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
            <button id="off" class="btn btn-info hide"><i class="fa fa-align-left"></i></button>
            <span style="font-weight: bold;font-size: 20px;">Create game</span>
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
        <div class="bottom">
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
    <div class="col-sm-4"></div>

    <!-- center form -->
    <div class="col-sm-4">
      <div class="row">
        <div class="col-sm-12">
          <input type="text" class="form-control hostgamebtn" id="setvalue" value="" name="game_code" />
          <button class='btn hostgamebtn' id="getcode" style="font-size: 15px;padding: 20px;">Click Here to create game code</button>
        </div>
      </div>
      <!-- <div class="row">
        <div class="col-sm-12">
          <select class="form-control hostgamebtn" id="status">
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
          </select>
        </div>
      </div> -->
      <!-- <div class="row">
        <div class="col-sm-12">
          <input type="text" name="start_time" id="start_time" value="02:00" class="form-control hostgamebtn" />
        </div>
      </div> -->
      <!-- <div class="row">
        <div class="col-sm-12">
          <input type="text" name="players_allowed" id="players_allowed" value="4" class="form-control hostgamebtn" />
        </div>
      </div> -->
      <div class="row">
        <div class="col-sm-6">
          <?php
          echo $this->Html->link(
            'Back',
            ['controller' => 'Users', 'action' => 'dashboard'],
            ['class' => 'btn hostgamebtn']
          );
          ?>
        </div>
        <div class="col-sm-6">
          <?php
          echo $this->Html->link(
            'Save',
            ['controller' => 'OnlineGames', 'action' => 'index'],
            ['class' => 'btn hostgamebtn savetbtn']
          );
          ?>
          <?php
          // echo $this->Html->link('Save',
          // ['controller' => 'Users', 'action' => 'generatecode'],['class' => 'btn hostgamebtn']);
          ?>
        </div>
      </div>



    </div>
    <!-- center form close -->

    <div class="col-sm-4"></div>
  </div>

      </div>


    </div>
  </section> 

  <script>
    $(document).ready(function() {
      var btntext = $('#getcode').text();
      $('#setvalue').hide();
    });

    function randomString(length, chars) {
      var result = '';
      for (var i = length; i > 0; --i) result += chars[Math.round(Math.random() * (chars.length - 1))];
      return result;
    }

    $("#getcode").click(function() {
      var codevalue = randomString(6, '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
      $('#getcode').hide();
      $('#setvalue').val(codevalue);
      $('#setvalue').show();

    });
  </script>

  <script>
    $('.savetbtn').on('click', function() {
      var code = $("#setvalue").val();
      // var time = $("#start_time").val();
      // var players = $("#players_allowed").val();
      // var status = $("#status").val();

      $.ajax({
        url: "creategames",
        type: "POST",
        data: {
          game_name: code,
          // start_time: time,
          // game_players_allowed: players,
          // status: status
        },
        success: function(data) {
          // alert(data);
          // $('.table-hover').html(data);

        }
      })
    })
  </script>
</body>

</html>