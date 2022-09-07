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
  <style>
    .pointnone {
      pointer-events: none;
    }
  </style>
  <!--  <title>NutFlix - admin</title>-->
  <script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title:{
		// text: "Email Categories",
		horizontalAlign: "left"
	},
	data: [{
		type: "doughnut",
		startAngle: 60,
		innerRadius: 60,
		indexLabelFontSize: 17,
		indexLabel: "{label} - #percent%",
		toolTipContent: "<b>{label}:</b> {y} (#percent%)",
		dataPoints: [
			{ y: 7, label: "MANAGING EXECUTION"},
			{ y: 55, label: "CULTURE OF ENGAGEMENT" },
			{ y: 28, label: "MOTIVATING & RELATING" },
			{ y: 10, label: "STRETAGIC ALIGNMENT"}
		]
	}]
});
chart.render();

}
</script>
</head>

<body>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

  <!-- start admin -->
  <section id="admin">
    <!-- start sidebar -->
    <div class="sidebar" style="overflow-x: hidden;">
      <!-- start with head -->
      <div class="head">
        <div class="logo">
          <img src="<?php echo $this->request->webroot; ?>img/logomain.png" alt="">
        </div>
        <p></p>
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
              ['class' => 'nav-link active', 'escape' => false],
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



          <!-- <li class="nav-item">
    <?php echo $this->Html->link(
      'Users',
      ['controller' => 'Users', 'action' => 'index'],
      ['class' => 'nav-link']

    ); ?></li>
                    
        <li class="nav-item">
    <?php echo $this->Html->link(
      'Online Game History',
      ['controller' => 'OnlineGameHistories', 'action' => 'index'],
      ['class' => 'nav-link']

    ); ?></li>

        <li class="nav-item">
    <?php echo $this->Html->link(
      'Online Games',
      ['controller' => 'OnlineGames', 'action' => 'index'],
      ['class' => 'nav-link']

    ); ?></li>
        <li class="nav-item">
    <?php echo $this->Html->link(
      'Question Group',
      ['controller' => 'QuestionGroups', 'action' => 'index'],
      ['class' => 'nav-link']

    ); ?></li>
           <li class="nav-item">
    <?php echo $this->Html->link(
      'Questions',
      ['controller' => 'Questions', 'action' => 'index'],
      ['class' => 'nav-link']

    ); ?></li>
           
           <li class="nav-item">
    <?php echo $this->Html->link(
      'Shape Groups',
      ['controller' => 'ShapeGroups', 'action' => 'index'],
      ['class' => 'nav-link']

    ); ?></li>
            <li class="nav-item">
    <?php echo $this->Html->link(
      'Shapes',
      ['controller' => 'Shapes', 'action' => 'index'],
      ['class' => 'nav-link']

    ); ?></li>
            
            <li class="nav-item">
    <?php echo $this->Html->link(
      'Survey',
      ['controller' => 'Surveys', 'action' => 'index'],
      ['class' => 'nav-link']

    ); ?></li>

            <li class="nav-item">
    <?php echo $this->Html->link(
      'User Types',
      ['controller' => 'UserTypes', 'action' => 'index'],
      ['class' => 'nav-link']

    ); ?></li>

<li class="nav-item">
    <?php echo $this->Html->link(
      'Access',
      ['controller' => 'Accesses', 'action' => 'index'],
      ['class' => 'nav-link']

    ); ?></li> -->


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
">Dashboard</span>
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

        <div class="bottom">
          <div class="left">
            <h1>Cultural Change - Buhler</h1>
          </div>

        </div>

        <!-- end head bottom -->
      </div>
      <div class="col-sm-12">
      <div id="chartContainer"></div>
  

    <!-- <div id="chartContainer"></div>
  <div style="margin-top:16px;color:dimgrey;font-size:9px;font-family: Verdana, Arial, Helvetica, sans-serif;text-decoration:none;"></div> -->
      <!-- <div id="real">
        <div class="row">
          <div class="col-lg-4">
            <div class="regsterUsers">
              <div class="card">
                <div class="card-top">
                  <h1><?php echo "0"; ?></h1>
                  <i class="fa fa-users"></i>
                </div>
                <div class="card-bottom">
                  <p>Total Game Users</p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="regsterUsers">
              <div class="card">
                <div class="card-top">
                  <h1><?php echo "0"; ?></h1>
                  <i class="fa fa-users"></i>
                </div>
                <div class="card-bottom">
                  <p>Total User Types</p>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div> -->
    </div>

    </div>
  </section>

</body>

</html>